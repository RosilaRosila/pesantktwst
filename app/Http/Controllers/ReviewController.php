<?php

namespace App\Http\Controllers;

use App\Models\DataTiket;
use App\Models\DataWisata;
use App\Models\Pengunjung;
use App\Models\PesanTiket;
use App\Models\Review;
use App\Models\User;
use App\Notifications\UlasanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    /**
     * Resource halaman Form Review -> [ Halaman Pengunjung ].
     */
    public function index($kode_transaksi, $datatiketid)
    {
        $title = "REVIEW PENGUNJUNG";
        // Fetch DataWisata based on datatiketid [Pesan Tiket 1 ]
        $wisata = DataWisata::where('id', 1)->first(); // Pantai Pangandaran
        $wisata2 = DataWisata::where('id', 3)->first(); // Pantai Batuhiu

        // Fetch DataWisata based on datatiketid [Pesan Tiket 2 ]
        $wisata3 = DataWisata::where('id', 4)->first(); // Pantai Batukaras
        $wisata4 = DataWisata::where('id', 10)->first(); // Pantai Madasari

        // Fetch DataWisata based on datatiketid [Pesan Tiket 3 ]
        $wisata5 = DataWisata::where('id', 5)->first(); // Green Canyon

        // Fetch DataWisata based on datatiketid [Pesan Tiket 4 ]
        $wisata6 = DataWisata::where('id', 2)->first(); // Pantai Karapyak

        // Fetch DataWisata based on datatiketid [Pesan Tiket 5 ]
        $wisata7 = DataWisata::where('id', 9)->first(); // Curug Bojong

        // Fetch DataWisata based on datatiketid [Pesan Tiket 6 ]
        $wisata8 = DataWisata::where('id', 8)->first(); // Pantai Karangnini

        // Fetch DataWisata based on datatiketid [Pesan Tiket 7 ]
        $wisata9 = DataWisata::where('id', 11)->first(); // Body Rafting Santirah

        // Fetch DataWisata based on datatiketid [Pesan Tiket 8 ]
        $wisata10 = DataWisata::where('id', 12)->first(); // Body Rafting Ciwayang

        // Fetch DataWisata based on datatiketid [Pesan Tiket 9 ]
        $wisata11 = DataWisata::where('id', 7)->first(); // Cagar Alam

        // Fetch DataWisata based on datatiketid [Pesan Tiket 10 ]
        $wisata12 = DataWisata::where('id', 6)->first(); // Body Rafting Citumang


        $pengunjung = Pengunjung::all();

        // Find the ticket by kode_transaksi
        $tiket = PesanTiket::where('kode_transaksi', $kode_transaksi)->first();

        if (!$tiket) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan');
        }

        // Route to different views based on datatiketid
        switch ($datatiketid) {
            case 1:
                return view('pengunjung.formreview', compact('title', 'tiket', 'pengunjung', 'wisata', 'wisata2'));
            case 2:
                return view('pengunjung.formreview2', compact('title', 'tiket', 'pengunjung', 'wisata3', 'wisata4'));
            case 3:
                return view('pengunjung.formreview3', compact('title', 'tiket', 'pengunjung', 'wisata5'));
            case 4:
                return view('pengunjung.formreview4', compact('title', 'tiket', 'pengunjung', 'wisata6'));
            case 5:
                return view('pengunjung.formreview5', compact('title', 'tiket', 'pengunjung', 'wisata7'));
            case 6:
                return view('pengunjung.formreview6', compact('title', 'tiket', 'pengunjung', 'wisata8'));
            case 7:
                return view('pengunjung.formreview7', compact('title', 'tiket', 'pengunjung', 'wisata9'));
            case 8:
                return view('pengunjung.formreview8', compact('title', 'tiket', 'pengunjung', 'wisata10'));
            case 9:
                return view('pengunjung.formreview9', compact('title', 'tiket', 'pengunjung', 'wisata11'));
            case 10:
                return view('pengunjung.formreview10', compact('title', 'tiket', 'pengunjung', 'wisata12'));
            default:
                return view('pengunjung.formreviewdefault', compact('title', 'tiket', 'pengunjung'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // Validate the form inputs
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'datawisataid' => 'required|exists:data_wisatas,id',
        ]);

        // Prepare the review data
        $datareview = [
            'datawisataid' => $request->input('datawisataid'),
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'status' => 0
        ];

        // Save the review
        $review = Review::create($datareview);


        // Notify the admin
        $userreview = User::role('Admin')->get();
        Notification::send($userreview, new UlasanNotification($review));

        // Redirect back with a success message
        return redirect()->route('pesanan_selesai')->with('success', 'Ulasan Berhasil dikirim');
    }

    public function store2(Request $request)
    {
        //

        // Validate the form inputs
        $request->validate([
            'review2' => 'required|string',
            'rating2' => 'required|integer|min:1|max:5',
            'datawisataid2' => 'required|exists:data_wisatas,id',
        ]);

        $datareview = [
            'datawisataid' => $request->input('datawisataid2'),
            'name' => $request->name2,
            'email' => $request->email2,
            'review' => $request->input('review2'),
            'rating' => $request->input('rating2'),
            'status' => 0,
        ];

        $review = Review::create($datareview);


        // Notify the admin
        $userreview = User::role('Admin')->get();
        Notification::send($userreview, new UlasanNotification($review));

        // Redirect back with a success message
        return redirect()->route('pesanan_selesai')->with('success', 'Ulasan Berhasil dikirim');
    }

    /**
     * Resource Review Pengunjung [ Halaman Admin ].
     */
    public function show(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 3); // Default 3 entries per page

        $query = Review::query();

        if (!empty($search)) {
            $query = $query->where('reviews.email', 'like', '%' . $search . '%')
                ->orWhere('reviews.name', 'like', '%' . $search . '%');
        }


        // Order by 'created_at' column to get the most recent records first
        $query = $query->orderBy('created_at', 'desc');


        if ($perPage === 'all') {
            $review = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $review = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $title = "Ulasan Pengunjung";
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();

        return view('review.index', compact('title', 'notifications', 'review', 'perPage', 'pagination'));
    }

    public function status($id)
    {
        $data = Review::where('id', $id)->first();

        $status_sekarang = $data->status;

        if ($status_sekarang == 0) {
            Review::where('id', $id)->update([
                'status' => 1
            ]);
        } else {
            Review::where('id', $id)->update([
                'status' => 0
            ]);
        }

        return redirect()->route('review.show')->with('success', 'Data Ulasan Telah Diupdate di Halaman Pengunjung');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datareview = Review::where('id', $id)->first();


        $datareview->delete();

        return redirect()->route('review.show')->with('success', 'Data Ulasan Pengunjung Berhasil Dihapus');
    }
}
