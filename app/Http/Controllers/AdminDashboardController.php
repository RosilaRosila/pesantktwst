<?php

namespace App\Http\Controllers;

use App\Models\PesanTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    /**
     * Resource Dialog Box Total Pendapatan -> [ Halaman Admin ].
     *
    
     */
    public function pendapatan()
    {

        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $pendapatan = PesanTiket::where('kehadiran', 1)->paginate(5);
        $jumlah_pendapatan = PesanTiket::where('kehadiran', 1)->sum('totalharga');
        $title = "Kelola Detail Pendapatan";

        return view('dashboard-admin.totalpendapatan', compact('notifications', 'pendapatan', 'jumlah_pendapatan', 'title'));
    }

    public function pengunjung()
    {
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $pengunjung = PesanTiket::where('kehadiran', 1)->paginate(5);
        $jumlah_pengunjung = PesanTiket::where('kehadiran', 1)->sum('qty');
        $title = "Kelola Pengunjung";

        return view('dashboard-admin.jumlahpengunjung', compact('notifications', 'pengunjung', 'jumlah_pengunjung', 'title'));
    }

    public function pesantiket()
    {
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $jumlah_pesanan = PesanTiket::where('status', 'Paid')->count();
        $pesantiket = PesanTiket::where('status', 'Paid')->paginate(5);
        $title = "Kelola Pesan Tiket";

        return view('dashboard-admin.jumlahpesantiket', compact('notifications', 'jumlah_pesanan', 'pesantiket', 'title'));
    }

    public function unkonfirbayar()
    {
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $jumlah_unkonfirmasi = PesanTiket::where('status', 0)->count();
        $unkonfirbayar = PesanTiket::where('status', 0)->paginate(5);
        $title = "Kelola Konfirmasi Bayar Tiket";

        return view('dashboard-admin.unkonfirmasipembayaran', compact('notifications', 'jumlah_unkonfirmasi', 'unkonfirbayar', 'title'));
    }

    public function unkonfirhadir()
    {
        $jumlah_unkehadiran = PesanTiket::where('status', 'Paid')->where('kehadiran', 0)->count(); // Konfirmasi belum Hadir
        $jumlah_kehadiran = PesanTiket::where('status', 'Paid')->where('kehadiran', 1)->count(); // Konfirmasi Hadir
        $hadir = PesanTiket::where('status', 1)->where('kehadiran', 0)->paginate(5);
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Kelola Konfirmasi Kehadiran Tiket";

        return view('dashboard-admin.unkonfirkehadirantiket', compact('jumlah_unkehadiran', 'jumlah_kehadiran', 'hadir', 'notifications', 'title'));
    }

    public function domestik()
    {
        $jumlah_wisatadomestik = PesanTiket::where('wisatawan', 'domestik')->where('kehadiran', 1)->sum('qty');
        $domestik = PesanTiket::where('wisatawan', 'domestik')->where('kehadiran', 1)->paginate(5);
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Kelola Pengunjung Domestik";

        return view('dashboard-admin.wisatawandomestik', compact('jumlah_wisatadomestik', 'domestik', 'notifications', 'title'));
    }

    public function mancanegara()
    {
        $jumlah_wisatamanca = PesanTiket::where('wisatawan', 'mancanegara')->where('kehadiran', 1)->sum('qty');
        $mancanegara = PesanTiket::where('wisatawan', 'mancanegara')->where('kehadiran', 1)->paginate(5);
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Kelola Pengunjung Mancanegara";

        return view('dashboard-admin.wisatawanmancanegara', compact('jumlah_wisatamanca', 'mancanegara', 'notifications', 'title'));
    }
}
