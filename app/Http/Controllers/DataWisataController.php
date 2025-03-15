<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataWisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataWisataRequest;
use App\Http\Requests\UpdateDataWisataRequest;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class DataWisataController extends Controller
{

    /**
     * Display a listing of the resource [ Permission Data Wisata Admin ].
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:wisata-list|wisata-create|wisata-edit|wisata-delete');
        $this->middleware('permission:wisata-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:wisata-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:wisata-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permissionwisata-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $perPage = $request->input('perPage', 2); // Default 3 entries per page

        $query = DataWisata::query();

        if (!empty($search)) {
            $query = $query->where('data_wisatas.id', 'like', '%' . $search . '%')
                ->orWhere('data_wisatas.title', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $datawisatas = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $datawisatas = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }


        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Data Wisata";
        return view('wisata.index', compact('title', 'datawisatas', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_fasilitas = Fasilitas::get();
        $title = "Data Wisata";
        return view('wisata.create', compact('title', 'all_fasilitas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fasilitas = '';
        $i = 0;
        if (isset($request->arr_fasilitas)) {
            foreach ($request->arr_fasilitas as $fs) {
                if ($i == 0) {
                    $fasilitas .= $fs;
                } else {
                    $fasilitas .= ',' . $fs;
                }
                $i++;
            }
        }

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'deskripsi' => 'required',
            'readmore' => 'required',
            'imgheader' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'alamat' => 'required',
        ]);

        /* ----- Filename Image ----- */
        $ext = Null;
        $final_name = Null;

        if ($request->has('image')) {
            $file_img = $request->file('image');
            $extention_img = $file_img->getClientOriginalExtension();
            $ext = time() . '.' . $extention_img;

            $final_name = 'uploads/';
            $file_img->move($final_name, $ext);
        }

        /* ----- Filename Image Header ----- */
        $ext_hdr = Null;
        $final_hdr = Null;

        if ($request->has('imgheader')) {
            $file_hdr = $request->file('imgheader');
            $extention_hdr = $file_hdr->getClientOriginalExtension();
            $ext_hdr = time() . '.' . $extention_hdr;

            $final_hdr = 'uploads/';
            $file_hdr->move($final_hdr, $ext_hdr);
        }

        $obj = new DataWisata();
        $obj->title = $request->title;
        $obj->image = $final_name . $ext;
        $obj->deskripsi = $request->deskripsi;
        $obj->fasilitas = $fasilitas;
        $obj->readmore = $request->readmore;
        $obj->imgheader = $final_hdr . $ext_hdr;
        $obj->alamat = $request->alamat;
        $obj->save();

        return redirect()->route('datawisata.index')->with('success', 'Data Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data_detail = DataWisata::where('id', $id)->first();
        $title = "Data Wisata";

        return view('wisata.show', compact('title', 'data_detail'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $all_fasilitas = Fasilitas::get();
        $datawisatas =  DataWisata::where('id', $id)->first();
        $title = "Data Wisata";

        $existing_fasilitas = array();
        if ($datawisatas->fasilitas != '') {
            $existing_fasilitas = explode(',', $datawisatas->fasilitas);
        }

        return view('wisata.edit', compact('title', 'datawisatas', 'all_fasilitas', 'existing_fasilitas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $obj = DataWisata::where('id', $id)->first();

        $fasilitas = '';
        $i = 0;
        if (isset($request->arr_fasilitas)) {
            foreach ($request->arr_fasilitas as $fs) {
                if ($i == 0) {
                    $fasilitas .= $fs;
                } else {
                    $fasilitas .= ',' . $fs;
                }
                $i++;
            }
        }

        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'readmore' => 'required',
            'alamat' => 'required',
        ]);


        if ($request->has('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            $file_img = $request->file('image');
            $extention_img = $file_img->getClientOriginalExtension();
            $ext = time() . '.' . $extention_img;

            $final_name = 'uploads/';
            $file_img->move($final_name, $ext);

            if (File::exists($obj->image)) {
                File::delete($obj->image);
            }

            $obj->image = $final_name . $ext;
        }


        if ($request->has('imgheader')) {
            $request->validate([
                'imgheader' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            ]);
            $file_hdr = $request->file('imgheader');
            $extention_hdr = $file_hdr->getClientOriginalExtension();
            $ext_hdr = time() . '.' . $extention_hdr;

            $final_hdr = 'uploads/';
            $file_hdr->move($final_hdr, $ext_hdr);

            if (File::exists($obj->imgheader)) {
                File::delete($obj->imgheader);
            }

            $obj->imgheader = $final_hdr . $ext_hdr;
        }


        $obj->title = $request->title;
        $obj->deskripsi = $request->deskripsi;
        $obj->fasilitas = $fasilitas;
        $obj->readmore = $request->readmore;
        $obj->alamat = $request->alamat;
        $obj->update();

        return redirect()->route('datawisata.index')->with('success', 'Data Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $datawisatas = DataWisata::where('id', $id)->first();

        if (File::exists($datawisatas->image)) {
            File::delete($datawisatas->image);
        }

        if (File::exists($datawisatas->imgheader)) {
            File::delete($datawisatas->imgheader);
        }

        $datawisatas->delete();

        return redirect()->route('datawisata.index')->with('success', 'Data Berhasil Dihapus');
    }
}
