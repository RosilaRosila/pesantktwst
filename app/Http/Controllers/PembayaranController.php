<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\MetodePembayaran;
use App\Models\PesanTiket;
use App\Models\User;
use App\Notifications\PembayaranNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource. ( BELUM DIGUNAKAN ATAU TIDAK DIAPLIKASIKAN )
     */
    public function index($kode_transaksi)
    {
        //
        // $detail_pesanan = Pembayaran::where('kode_transaksi', Auth::guard('pengunjung')->user()->kode_transaksi)->first();
        // $detail_pesanan = Pembayaran::where('id', $kode_transaksi)->get();

        // $title = "BUKTI UPLOAD";
        // $data_pengunjung = Pengunjung::where('name', $name)->first();

        $pesan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        // $metode = MetodePembayaran::all();
        $title = "PEMBAYARAN";

        return view('pengunjung.buktiupload', compact('title', 'detail_pesanan'));
    }


    /**
     * resource Halaman Pembayaran -> [ Halaman Pengunjung ].
     */
    public function bayar($kode_transaksi)
    {
        //

        $pesan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        // $metode = MetodePembayaran::all();
        $title = "PEMBAYARAN";

        // $dataPembayaran = [
        //     'name' => $pesan->name,
        //     'kode_transaksi' => $pesan->kode_transaksi,
        //     'wisatawan' => $pesan->wisatawan,
        //     'tujuanwisata' => $pesan->tujuanwisata,
        //     'qty' => $pesan->qty,
        //     'total' => $pesan->total,
        //     'tanggal' => $pesan->tanggal,
        //     'status' => 'Unpaid',
        // ];

        // $pembayaran = Pembayaran::create($dataPembayaran);
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // // Generate Snap Token if not already generated

        // $params = [
        //     'transaction_details' => [
        //         'order_id' => $pesan->kode_transaksi,
        //         'gross_amount' => $pesan->totalharga,
        //     ],
        //     'customer_details' => [
        //         'first_name' => $pesan->name,
        //         'phone' => $pesan->nohp,
        //     ],
        // ];

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
        // $pesan->snap_token = $snapToken;
        // $pesan->save();

        return view('pengunjung.pembayaran', compact('title', 'pesan'));
    }


    /**
     * Store a newly created resource in storage Form Pembayaran -> [ Halaman Pengunjung ].
     */
    public function store($kode_transaksi)
    {
        //
        $pesan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();
        $title = "PEMBAYARAN";

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' =>  $pesan->kode_transaksi,
                'gross_amount' =>  $pesan->total,
            ),
            'customer_details' => array(
                'name' =>  $pesan->name,
                'nohp' =>  $pesan->nohp,
                'tanggal' =>  $pesan->tanggal,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('pengunjung.prosespembayaran', compact('title', 'snapToken', 'pesan'));
    }

    public function proses($kode_transaksi)
    {
        $pesan = PesanTiket::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        $title = "PEMBAYARAN";

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' =>  $pesan->kode_transaksi . '-' . time(),
                'gross_amount' => $pesan->totalharga,
            ),
            'customer_details' => array(
                'name' =>  $pesan->name,
                'nohp' =>  $pesan->nohp,
                'tanggal' =>  $pesan->tanggal,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('pengunjung.prosespembayaran', compact('title', 'snapToken', 'pesan'));
    }

    public function complete($kode_transaksi)
    {
        $pesan = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();

        // Update status pembayaran
        $pesan->status = 'Paid';
        $pesan->save();

        return redirect()->route('pengunjung_daftarriwayat')->with('success', 'Pembayaran berhasil!');
    }

    /**
     * resource Halaman Detail Upload Pembayaran -> [ Halaman Admin ].
     */
    public function show($kode_transaksi)
    {
        //
        // $pby = Pembayaran::where('id', $id)->get();
        // $detail_pesanan = $pby->dataorder()->select('kode_transaksi')->get();
        $detail_pesanan = Pembayaran::where('kode_transaksi', $kode_transaksi)->get();
        $title = "Detail Pembayaran";

        return view('pesan-tiket.show', compact('title', 'detail_pesanan'));
    }
}
