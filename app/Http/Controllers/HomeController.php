<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengunjung;
use App\Models\PesanTiket;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\select;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /* -------------------- BOX INFORMATIONS -------------------- */
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $jumlah_wisatadomestik = PesanTiket::where('wisatawan', 'domestik')->where('status', 'Paid')->sum('qty');
        $jumlah_wisatamanca = PesanTiket::where('wisatawan', 'mancanegara')->where('status', 'Paid')->sum('qty');
        $jumlah_unkonfirmasi = PesanTiket::where('status', 'Unpaid')->count(); // Tiket Belum Bayar
        $jumlah_pengunjung = PesanTiket::where('Status', 'Paid')->sum('qty');
        $jumlah_pesanan = PesanTiket::where('status', 'Paid')->count();
        $jumlah_unkehadiran = PesanTiket::where('status', 'Paid')->where('kehadiran', 0)->count(); // Konfirmasi belum Hadir
        $jumlah_kehadiran = PesanTiket::where('status', 'Paid')->where('kehadiran', 1)->count(); // Konfirmasi Hadir
        $jumlah_pendapatan = PesanTiket::where('status', 'Paid')->sum('totalharga');
        $jumlah_subscribe = Pengunjung::count();

        /* ---------- Halaman Wrapper Admin ----------*/
        $akun_pengunjung = Pengunjung::orderBy('created_at', 'desc')->first();
        $datareview = Review::orderBy('created_at', 'desc')->take(3)->get();
        $latesttiket = PesanTiket::orderBy('created_at', 'desc')->take(3)->get();


        /* -------------------- Mengambil data pendapatan berdasarkan bulan dan tahun [ LINE CHART ) -------------------- */
        $datat = DB::table('pesantikets')
            ->select(
                DB::raw('YEAR(tanggal) as year'),
                DB::raw('MONTH(tanggal) as month'),
                DB::raw("CAST(SUM(totalharga) as int) as totalharga ")
            )
            ->where('status', 'Paid')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Memformat data untuk Chart.js
        $vlabels = [];
        $vtotals = [];

        foreach ($datat as $entry) {
            $date = Carbon::createFromDate($entry->year, $entry->month, 1)->format('F Y');
            $vlabels[] = $date;
            $vtotals[] = $entry->totalharga;
        }



        /* -------------------- Mengambil data jumlah pengunjung berdasarkan tempat wisata [ PIE CHART ) -------------------- */
        // Mengambil data Tiket Berdasarkan Data Pesan Tiket 
        $data = PesanTiket::join('data_tikets', 'pesantikets.datatiketid', '=', 'data_tikets.id')
            ->select(DB::raw('data_tikets.namawst as tiket, CAST(SUM(pesantikets.qty) as int) as total '))
            ->where('status', 'Paid')
            ->groupBy('data_tikets.namawst')
            ->get();

        // Menyiapkan data untuk chart
        $labels = $data->pluck('tiket')->toArray();
        $totals = $data->pluck('total')->toArray();



        /* -------------------- Mengambil data jumlah wisatawan berdasarkan jenis wisatawan [ BAR CHART ) -------------------- */
        $dataw = DB::table('pesantikets')
            ->select(
                DB::raw('wisatawan'),
                DB::raw("CAST(SUM(qty) as int) as totalwisatawan")
            )
            ->where('status', 'Paid')
            ->groupBy('wisatawan')
            ->get();

        // Memformat data untuk Chart.js
        $xlabels = [];
        $xtotals = [];

        foreach ($dataw as $entry) {
            $category = DB::table('pesantikets')->where('wisatawan', $entry->wisatawan)->first();
            $xlabels[] = $category->wisatawan;
            $xtotals[] = $entry->totalwisatawan;
        }



        $title = "Dashboard";
        return view('home', compact(
            'title',
            'jumlah_pesanan',
            'jumlah_pengunjung',
            'jumlah_unkonfirmasi',
            'jumlah_pendapatan',
            'notifications',
            'jumlah_unkehadiran',
            'jumlah_kehadiran',
            'jumlah_wisatadomestik',
            'jumlah_wisatamanca',
            'jumlah_subscribe',
            'akun_pengunjung',
            'datareview',
            'latesttiket',
            'labels',
            'totals',
            'vlabels',
            'vtotals',
            'xlabels',
            'xtotals'
        ));
    }

    public function all()
    {
        // Ambil semua notifikasi
        $title = "Dashboard";
        $notifications = Auth::user()->unreadNotifications()->get();
        return view('notifikasi.all', compact('notifications', 'title'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('dashboard');
    }
}
