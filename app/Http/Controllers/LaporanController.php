<?php

namespace App\Http\Controllers;

use App\Models\DataTiket;
use App\Models\PesanTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = PesanTiket::where('status', 'Paid');


        if ($perPage === 'all') {
            $pendapatantiket = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $pendapatantiket = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }

        $title = "Laporan Pendapatan";
        // $pendapatantiket = PesanTiket::where('status', 1)->paginate(5);
        $notifications = Auth::user()->unreadNotifications()->get();
        $jumlah_pendapatan = PesanTiket::where('status', 'Paid')->sum('totalharga');
        $data_tiket = DataTiket::all();

        return view('laporan.laporanpendapatan', compact(
            'title',
            'pendapatantiket',
            'notifications',
            'jumlah_pendapatan',
            'data_tiket',
            'perPage',
            'pagination'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function printpendapatan(Request $request)
    {
        //
        $path = base_path('logoprint.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataimg = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

        $request->validate([
            'datatiketid' => 'required|exists:data_tikets,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $categoryId = $request->input('datatiketid');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = PesanTiket::where('datatiketid', $categoryId)->whereBetween('tanggal', [$startDate, $endDate])->get();

        if ($data->isEmpty()) {
            // If no data is found, return a view with a message
            return view('laporan.nodatafound', compact('pic', 'startDate', 'endDate'));
        }

        $total = $data->sum('totalharga');
        $total_pengunjung = $data->sum('qty');

        $dataakhir = $data->first();
        $tanggalawal = $startDate;
        $tanggalakhir = $endDate;

        // dd($data);


        return view('laporan.printlpendapatan', compact('pic', 'data', 'total', 'tanggalawal', 'tanggalakhir', 'total_pengunjung', 'dataakhir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function printpertanggal(Request $request)
    {
        //
        $path = base_path('logoprint.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataimg = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = PesanTiket::whereBetween('tanggal', [$startDate, $endDate])->get();

        if ($data->isEmpty()) {
            // If no data is found, return a view with a message
            return view('laporan.nodatafound', compact('pic', 'startDate', 'endDate'));
        }

        $total = $data->sum('totalharga');
        $total_pengunjung = $data->sum('qty');

        $tanggalawal = $startDate;
        $tanggalakhir = $endDate;

        // dd($data);

        return view('laporan.printlaporanpertanggal', compact('pic', 'data', 'total', 'tanggalawal', 'tanggalakhir', 'total_pengunjung'));
    }

    /* -------------------------- RESOURCE LAPORA PENGUNJUNG --------------------------------- */
    public function lpengunjung(Request $request)
    {
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = PesanTiket::where('status', 'Paid');


        if ($perPage === 'all') {
            $pendapatantiket = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $pendapatantiket = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }

        $wisatawan = [
            'mancanegara' => 'Manacanegara',
            'domestik' => 'Domestik',
        ];

        $title = "Laporan Pengunjung";
        // $pendapatantiket = PesanTiket::where('status', 1)->paginate(5);
        $notifications = Auth::user()->unreadNotifications()->get();
        $jumlah_pendapatan = PesanTiket::where('status', 'Paid')->sum('totalharga');
        $jumlah_pengunjung = PesanTiket::where('status', 'Paid')->sum('qty');
        $data_tiket = DataTiket::all();

        return view('laporan.laporanpengunjung', compact(
            'title',
            'pendapatantiket',
            'notifications',
            'jumlah_pendapatan',
            'data_tiket',
            'jumlah_pengunjung',
            'wisatawan',
            'perPage',
            'pagination'
        ));
    }

    public function printpengunjung(Request $request)
    {
        $path = base_path('logoprint.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataimg = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

        $request->validate([
            'wisatawan' => 'required',
            'datatiketid' => 'required|exists:data_tikets,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $categorywst = $request->input('wisatawan');
        $categoryId = $request->input('datatiketid');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = PesanTiket::where('datatiketid', $categoryId)->where('wisatawan', $categorywst)
            ->whereBetween('tanggal', [$startDate, $endDate])->get();

        if ($data->isEmpty()) {
            // If no data is found, return a view with a message
            return view('laporan.nodatafound', compact('pic', 'startDate', 'endDate'));
        }

        $total = $data->sum('totalharga');
        $total_pengunjung = $data->sum('qty');

        $dataakhir = $data->first();
        $tanggalawal = $startDate;
        $tanggalakhir = $endDate;

        // dd($data);


        return view('laporan.printpengunjung', compact('pic', 'data', 'total', 'tanggalawal', 'tanggalakhir', 'total_pengunjung', 'dataakhir'));
    }

    public function lpengunjungtanggal(Request $request)
    {
        $path = base_path('logoprint.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataimg = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

        $request->validate([
            'wisatawan' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $categorywst = $request->input('wisatawan');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = PesanTiket::where('wisatawan', $categorywst)->whereBetween('tanggal', [$startDate, $endDate])->get();

        if ($data->isEmpty()) {
            // If no data is found, return a view with a message
            return view('laporan.nodatafound', compact('pic', 'startDate', 'endDate'));
        }

        $total = $data->sum('totalharga');
        $total_pengunjung = $data->sum('qty');

        $tanggalawal = $startDate;
        $tanggalakhir = $endDate;
        $kwst = $categorywst;

        // dd($data);


        return view('laporan.laporantanggalpengunjung', compact('pic', 'data', 'total', 'tanggalawal', 'tanggalakhir', 'total_pengunjung', 'kwst'));
    }
}
