<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Http\Requests\StoreFasilitasRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateFasilitasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FasilitasController extends Controller
{

    /**
     * Display a listing of the resource [ Permissin Data Fasilitas Admin ].
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:fasilitas-list|fasilitas-create|fasilitas-edit|fasilitas-delete');
        $this->middleware('permission:fasilitas-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:fasilitas-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fasilitas-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fasilitas-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = Fasilitas::query();

        if (!empty($search)) {
            $query = $query->where('fasilitas.id', 'like', '%' . $search . '%')
                ->orWhere('fasilitas.namaicon', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $datafasilitas = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $datafasilitas = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Data Fasilitas";
        return view('fasilitas.index', compact('title', 'datafasilitas', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Data Fasilitas";
        return view('fasilitas.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namaicon' => 'required',
            'imgicon' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        $filename = Null;
        $path = Null;

        if ($request->has('imgicon')) {
            $file = $request->file('imgicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;

            $path = 'icons/';
            $file->move($path, $filename);
        }

        $dfs = new Fasilitas();
        $dfs->namaicon = $request->namaicon;
        $dfs->imgicon = $path . $filename;
        $dfs->save();

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Data Fasilitas";
        $datafasilitas = Fasilitas::where('id', $id)->first();
        return view('fasilitas.edit', compact('title', 'datafasilitas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $dfs = Fasilitas::where('id', $id)->first();

        $request->validate([
            'namaicon' => 'required',

        ]);


        if ($request->has('imgicon')) {
            $request->validate([
                'imgicon' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            $file = $request->file('imgicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;

            $path = 'icons/';
            $file->move($path, $filename);

            if (File::exists($dfs->imgicon)) {
                File::delete($dfs->imgicon);
            }

            $dfs->imgicon = $path . $filename;
        }

        $dfs->namaicon = $request->namaicon;
        $dfs->update();

        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil di update');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datafasilitas = Fasilitas::where('id', $id)->first();

        if (File::exists($datafasilitas->imgicon)) {
            File::delete($datafasilitas->imgicon);
        }

        $datafasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
