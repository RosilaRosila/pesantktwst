<?php

namespace App\Http\Controllers;

use App\Models\PesanTiket;
use App\Http\Requests\StorePesanTiketRequest;
use App\Http\Requests\UpdatePesanTiketRequest;
use Illuminate\Support\Facades\DB;
use App\Models\MetodePembayaran;
use App\Models\Pembayaran;
use App\Models\Pengunjung;
use App\Models\User;
use App\Notifications\PesanTiket as NotificationsPesanTiket;
use App\Notifications\PesanTiketNotification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;

class PesanTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 3); // Default 3 entries per page

        $query = PesanTiket::query();

        if (!empty($search)) {
            $query = $query->where('kode_transaksi', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('kehadiran', 'like', '%' . $search . '%');
        }

        // Order by 'created_at' column to get the most recent records first
        $query = $query->orderBy('created_at', 'desc');

        if ($perPage === 'all') {
            $tiket = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $tiket = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Data Pesan Tiket";
        return view('pesan-tiket.index', compact('title', 'tiket', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * resource Cek Status Pembayaran.
     */
    public function status($kode_transaksi)
    {
        $data = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();

        $status_sekarang = $data->status;

        if ($status_sekarang == 0) {
            PesanTiket::where('kode_transaksi', $kode_transaksi)->update([
                'status' => 1
            ]);
        } else {
            PesanTiket::where('kode_transaksi', $kode_transaksi)->update([
                'status' => 0
            ]);
        }

        return redirect()->route('pesantiket.index')->with('success', 'Bukti Pembayaran Telah di Verifikasi');
    }


    /**
     * resource Cek Kehadiran Pengunjung -> [ Halaman Petugas Tiket ].
     */
    public function kehadiran($kode_transaksi, Request $request)
    {
        // Get the current search query
        $search = $request->query('search');

        // Find the ticket based on transaction code
        $data = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();

        // Toggle the attendance status
        $kehadiran_sekarang = $data->kehadiran;

        PesanTiket::where('kode_transaksi', $kode_transaksi)->update([
            'kehadiran' => $kehadiran_sekarang == 0 ? 1 : 0
        ]);

        // Redirect back to the ticket check page, preserving the search query
        return redirect()->route('pengunjung.cektiket', ['search' => $search])->with('success', 'Pengunjung Telah Masuk Tempat Wisata');
    }



    /**
     * resource Cek Tiket Pemesanan -> Halaman Petugas Tiket.
     */
    public function cektiket(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            // Search by transaction code or name
            $tiket = PesanTiket::where('kode_transaksi', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->paginate(3); // Paginate results
        } else {
            // Display all tickets with status 1 if no search is applied
            $tiket = PesanTiket::where('status', 1)->get();
        }

        $title = "Cek Tiket Pengunjung";
        return view('pesan-tiket.cek-tiket', compact('title', 'tiket', 'search'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $number = mt_rand(1000000000, 9999999999);

        if ($this->productCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        $request->validate([
            'wisatawan' => 'required',
            'tanggal' => 'required|date|after_or_equal:today',
        ]);

        $dataPesantiket = [
            'kode_transaksi' => $number,
            'name' => $request->name,
            'nohp' => $request->nohp,
            // 'country' => $request->country,
            // 'address' => $request->address,
            'wisatawan' => $request->input('wisatawan'),
            'datatiketid' => $request->input('datatiketid'),
            // Bersihkan format Rupiah sebelum menyimpan ke database
            'hargatiket' => floatval(str_replace('.', '', str_replace('Rp ', '', $request->hargatiket))),
            'qty' => $request->qty,
            'totalharga' => floatval(str_replace('.', '', str_replace('Rp ', '', $request->totalharga))),
            'tanggal' => $request->tanggal,
            'status' => 'Unpaid',
            'kehadiran' => 0
        ];



        $pesantiket = PesanTiket::create($dataPesantiket);
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $number,
        //         'gross_amount' => $request->hargatiket * $request->qty,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => $request->name,
        //         'tanggal' => $request->tanggal,
        //         'phone' => $request->nohp,
        //     ),
        // );


        // $snapToken = \Midtrans\Snap::getSnapToken($params);

        // $pesantiket->snap_token = $snapToken;
        // $pesantiket->save();

        $userAdmin =   User::role('Admin')->get();
        Notification::send($userAdmin, new PesanTiketNotification($pesantiket));

        return redirect()->route('pengunjung_riwayat')->with('success', 'Pemesanan Tiket Berhasil Dilakukan Silahkan Lakukan Pembayaran !');
    }


    /**
     * resource Barcode Pesan Tiket.
     */
    public function productCodeExists($number)
    {
        return PesanTiket::whereKodeTransaksi($number)->exists();
    }


    /**
     * Display the specified resource.
     */
    public function show($kode_transaksi)
    {
        //
        $detail_pesanan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        $title = "DETAIL PESANAN";
        // $data_pengunjung = Pengunjung::where('name', $name)->first();

        return view('pengunjung.detail-pesanan', compact('title', 'detail_pesanan'));
    }


    /**
     * resource Print Barcode.
     */
    public function printcode($kode_transaksi)
    {
        // $pesanan_detail = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        // // $title = "BARCODE";


        // $path = base_path('logoprint.png');
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $dataimg = file_get_contents($path);
        // $pic = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

        // $pdf = PDF::setOption(['isHtml5ParseEnabled' => true, 'isRemoteEnabled' => true])->loadview('pengunjung.print-barcode', ['pesanan_detail' => $pesanan_detail], compact('pic'))->setOptions(['defaultFont' => 'Courier']);
        // return $pdf->stream('TIKET WISATA PANGANDARAN.pdf');

        $pesanan_detail = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();

        // Gunakan gambar dari folder public (URL-based)
        $pic = public_path('logoprint.png');

        // Simpan data pesanan_detail di cache untuk 60 menit
        $cacheKey = 'pdf-data-' . $kode_transaksi;
        $cachedData = Cache::remember($cacheKey, 60, function () use ($pesanan_detail) {
            return $pesanan_detail;  // Hanya cache data yang dibutuhkan
        });

        // Mengonversi gambar ke Base64
        $picBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($pic));

        // Gunakan data dari cache untuk membuat PDF
        $pdf = PDF::loadview('pengunjung.print-barcode', ['pesanan_detail' => $cachedData, 'pic' => $picBase64])
            ->setPaper([0, 0, 283.5, 425.2], 'portrait') // Set the paper size to 10 cm x 15 cm
            ->setOptions(['defaultFont' => 'arial', 'isHtml5ParseEnabled' => true, 'isRemoteEnabled' => true]);

        // Kembalikan PDF untuk di-stream (tidak menyimpan objek PDF di cache)
        return $pdf->stream('TIKET WISATA PANGANDARAN.pdf');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_transaksi)
    {
        //
        $detail_pesanan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        $detail_pesanan->delete();
        return redirect()->route('pengunjung_riwayat')->with('success', 'Data Pesanan Tiket Berhasil Dihapus');
        // $detail_pembayaran = Pembayaran::where('id', $kode_transaksi)->first();
        // if ($detail_pesanan) {
        //     $destination = 'pembayaran' . $detail_pesanan->imagepembayaran;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $detail_pesanan->posts()->delete();
        //     $detail_pesanan->delete();

        //     return redirect()->route('pengunjung_riwayat')->with('success', 'Data Pesanan Tiket Berhasil Dihapus');
        // } else {
        //     return redirect()->route('pengunjung_riwayat')->with('danger', 'Data gagal Dihapus');
        // }
    }
}
