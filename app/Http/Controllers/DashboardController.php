<?php

namespace App\Http\Controllers;

use App\Models\DataTiket;
use App\Models\DataWisata;
use App\Models\Location;
use App\Models\Pengunjung;
use App\Models\Photo;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * resource Halaman Utama Pengunjung -> [ Halaman Pengunjung ].
     */
    public function home()
    {
        $title = "HOME";
        return view('pengunjung.home', compact('title'));
    }


    /**
     * resource Halaman Info Wisata -> [ Halaman Pengunjung ].
     */
    public function info()
    {
        // $datawisatas = DataWisata::all();
        //$datawisatas = DataWisata::with('reviews')->get(); // Mengambil data wisata beserta ulasannya
        $title = "INFO WISATA";
        $averageRating = Review::where('status', 0)->avg('rating');
        $datawisatas = DataWisata::with(['reviews' => function ($query) {
            $query->where('status', 0); // Only fetch active reviews
        }])->get();
        // $averageRating = Review::avg('rating');
        $review = Review::all();
        return view('pengunjung.info-wisata', compact('title', 'datawisatas', 'averageRating', 'review'));
    }


    /**
     * resource Halaman Detail Wisata -> [ Halaman Pengunjung ].
     */
    public function detail($id)
    {

        $harga_tiket = DB::table('data_tikets')->get();
        // $wisata_detail =  Datawisata::with('loction')->where('id', $id)->first();

        $wisata_detail = DataWisata::where('id', $id)->first();
        $datalokasi = Location::where('datawisataid', $id)->get();
        $datagaleri = Photo::where('datawisataid', $id)->get();
        $averageRating = Review::where('status', 0)
            ->where('datawisataid', $id)
            ->avg('rating');
        $datareview = Review::where('datawisataid', $id)
            ->where('status', 0)
            ->get();
        $datareviews = Review::where('datawisataid', $id)
            ->where('status', 0)
            ->count();
        // Breakdown of reviews by star rating
        $reviewsByStars = Review::where('datawisataid', $id)
            ->where('status', 0)
            ->select('rating', DB::raw('count(*) as total'))
            ->groupBy('rating')
            ->pluck('total', 'rating');

        //dd($datalokasi, $wisata_detail, $datagaleri);



        $title = "INFO WISATA";
        return view('pengunjung.infowisata-detail', compact(
            'title',
            'wisata_detail',
            'harga_tiket',
            'datalokasi',
            'datagaleri',
            'datareview',
            'averageRating',
            'datareviews',
            'reviewsByStars'
        ));
    }


    /**
     * resource Halaman Pesan Tiket Wisata -> [ Halaman Pengunjung ].
     */
    public function ptiket()
    {
        $wisatawan = [
            'mancanegara' => 'Mancanegara',
            'domestik' => 'Domestik',
        ];

        $datatiket = DataTiket::all();
        $title = "PESAN TIKET";
        return view('pengunjung.pesan-tiket', compact('title', 'datatiket', 'wisatawan'));
    }


    /**
     * resource Halaman Ulasan Pengunjung -> [ Halaman Pengunjung ].
     */
    public function ulasan()
    {

        $title = "ULASAN";
        // Menghitung rata-rata rating dari semua ulasan
        $averageRating = Review::where('status', 1)->avg('rating');
        // $averageRating = Review::avg('rating');
        $review = Review::all();
        return view('pengunjung.ulasan', compact('title', 'review', 'averageRating'));
    }
}
