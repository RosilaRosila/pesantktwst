<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = Photo::query();

        if (!empty($search)) {
            $query = $query->whereHas('fotowst', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        }

        if ($perPage === 'all') {
            $galeri  = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $galeri = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }



        $title = "Galeri Foto";
        $datawisata = DataWisata::all();
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();

        return view('photo.index', compact('title', 'datawisata', 'notifications', 'galeri', 'perPage', 'pagination'));
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
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        $filename = Null;
        $path = Null;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;

            $path = 'galeri/';
            $file->move($path, $filename);
        }

        $gf = new Photo();
        $gf->datawisataid =  $request->input('datawisataid');
        $gf->photo = $path . $filename;
        $gf->save();

        return redirect()->route('dataphoto.index')->with('success', 'Photo Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datagaleri = Photo::where('id', $id)->first();

        if (File::exists($datagaleri->photo)) {
            File::delete($datagaleri->photo);
        }

        $datagaleri->delete();

        return redirect()->route('dataphoto.index')->with('success', 'Photo Berhasil Dihapus');
    }
}
