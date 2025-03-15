<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Http\Requests\StoreMetodePembayaranRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMetodePembayaranRequest;
use Illuminate\Support\Facades\Auth;

class MetodePembayaranController extends Controller
{

    /**
     * Resource Halaman Index Metode Pembayaran -> [ Halaman Admin ]
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 3); // Default 3 entries per page

        $query = MetodePembayaran::query();

        if (!empty($search)) {
            $query = $query->where('metode_pembayarans.id', 'like', '%' . $search . '%')
                ->orWhere('metode_pembayarans.name', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $datametode = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $datametode = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Data Metode Pembayaran";
        return view('metode-pembayaran.index', compact('title', 'datametode', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Data Metode Pembayaran";
        return view('metode-pembayaran.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $data = new MetodePembayaran();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('metodepembayaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $datametode = MetodePembayaran::where('id', $id)->first();
        $title = "Data Metode Pembayaran";

        return view('metode-pembayaran.edit', compact('datametode', 'title'));
    }

    public function update(Request $request, $id)
    {
        //
        $dmp = MetodePembayaran::where('id', $id)->first();

        $request->validate([
            'name' => 'required',

        ]);

        $dmp->name = $request->name;
        $dmp->update();

        return redirect()->route('metodepembayaran.index')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datametode = MetodePembayaran::where('id', $id)->first();

        $datametode->delete();

        return redirect()->route('metodepembayaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
