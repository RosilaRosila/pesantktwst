<?php

namespace App\Http\Controllers;

use App\Models\DataTiket;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataTiketRequest;
use App\Http\Requests\UpdateDataTiketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataTiketController extends Controller
{
    /**
     * Display a listing of the resource [ Permission Data Tiket Admin ].
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tiket-list|tiket-create|tiket-edit|tiket-delete');
        $this->middleware('permission:tiket-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:tiket-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tiket-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tiket-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 3); // Default 3 entries per page

        $query = DataTiket::query();

        if (!empty($search)) {
            $query = $query->where('data_tikets.id', 'like', '%' . $search . '%')
                ->orWhere('data_tikets.namawst', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $datatikets = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $datatikets = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Data Tiket";
        return view('tiket.index', compact('title', 'datatikets', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Data Tiket";
        return view('tiket.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namawst' => 'required',
            'harga' => 'required'
        ]);

        DataTiket::create([
            'namawst' => $request->namawst,
            'harga' => $request->harga
        ]);

        return redirect()->route('datatiket.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    /**
     * Display the specified resource.
     */
    public function show(DataTiket $dataTiket)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $datatikets =  DataTiket::where('id', $id)->first();
        $title = "Data Tiket";
        return view('tiket.edit', compact('title', 'datatikets'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'namawst' => 'required',
            'harga' => 'required'
        ]);

        $datatikets = DataTiket::where('id', $id)->first();

        $datatikets->update([
            'namawst' => $request->namawst,
            'harga' => $request->harga
        ]);

        return redirect()->route('datatiket.index')->with(['success' => 'Data Berhasil Diupdate']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datatikets = DataTiket::where('id', $id)->first();

        $datatikets->delete();

        return redirect()->route('datatiket.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
