<?php

namespace App\Http\Controllers\Pengunjung;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use App\Models\PengunjungAuth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePengunjungAuthRequest;
use App\Http\Requests\UpdatePengunjungAuthRequest;
use App\Models\PesanTiket;

class PengunjungDashboardController extends Controller
{


    /**
     * resource Halaman Pengunjung Management -> [ Halaman Admin ].
     */
    public function index(Request $request)
    {
        //

        $search = $request->query('search');
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = Pengunjung::query();

        if (!empty($search)) {
            $query = $query->where('pengunjungs.name', 'like', '%' . $search . '%')
                ->orWhere('pengunjungs.email', 'like', '%' . $search . '%')
                ->orWhere('pengunjungs.country', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $datapengunjung = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $datapengunjung = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }

        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Pengunjung Management";

        return view('pengunjung.index', compact('title', 'search', 'datapengunjung', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * resource Halaman Show Profil Pengunjung -> [ Halaman Pengunjung ].
     */
    public function showprofil()
    {
        $title = "PROFIL PENGUNJUNG";

        return view('pengunjung.profil', compact('title'));
    }


    /**
     * resource Halaman Riwayat Pesanan Tiket -> [ Halaman Pengunjung ].
     */
    public function riwayat(Request $request)
    {

        $title = "RIWAYAT TRANSAKSI";
        $tiket = PesanTiket::where('name', Auth::guard('pengunjung')->user()->name)
            ->where('status', 'Unpaid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pengunjung.riwayat', compact('title', 'tiket'));
    }

    /**
     * resource Halaman Riwayat Pesanan Tiket -> [ Halaman Pengunjung ].
     */
    public function daftarriwayat(Request $request)
    {

        $title = "DAFTAR RIWAYAT PEMESANAN";
        $pesan = PesanTiket::where('name', Auth::guard('pengunjung')->user()->name)
            ->where('status', 'Paid')
            ->where('kehadiran', 0)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('pengunjung.daftarriwayat', compact('title', 'pesan'));
    }

    public function selesai(Request $request)
    {

        $title = "TIKET SELESAI";
        $selesai = PesanTiket::where('name', Auth::guard('pengunjung')->user()->name)
            ->where('kehadiran', 1)
            ->where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('pengunjung.pesananselesai', compact('title', 'selesai'));
    }
}
