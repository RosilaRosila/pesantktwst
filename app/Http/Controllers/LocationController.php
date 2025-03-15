<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = Location::query();

        if (!empty($search)) {
            $query = $query->whereHas('datawst', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        }

        if ($perPage === 'all') {
            $koordinat = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $koordinat = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }



        $title = "Alamat Tempat Wisata";
        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $wisata = DataWisata::all();
        // $koordinat = Location::paginate(5);

        return view('lokasi.index', compact('title', 'notifications', 'wisata', 'koordinat', 'perPage', 'pagination'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $lokasi = new Location();
        $lokasi->datawisataid = $request->input('datawisataid');
        $lokasi->latitude = $request->input('latitude');
        $lokasi->longitude = $request->input('longitude');
        $lokasi->save();

        return redirect()->route('alamat.index')->with('success', 'Data Koordinat Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Alamat Tempat Wista";
        $data = Location::where('id', $id)->first();

        return view('lokasi.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $dakor = Location::where('id', $id)->first();

        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $dakor->latitude = $request->latitude;
        $dakor->longitude = $request->longitude;
        $dakor->update();

        return redirect()->route('alamat.index')->with('success', 'Data Koordinat Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $dakor = Location::where('id', $id)->first();

        $dakor->delete();

        return redirect()->route('alamat.index')->with('success', 'Data Koordinat Berhasil Dihapus');
    }
}
