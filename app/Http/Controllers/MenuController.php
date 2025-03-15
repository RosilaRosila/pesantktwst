<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource [ Permission Data Menu Permissin Admin ].
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:menu-list|menu-create|menu-edit|menu-delete');
        $this->middleware('permission:menu-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:menu-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->query('search');
        $perPage = $request->input('perPage', 5); // Default 3 entries per page

        $query = Permission::query();

        if (!empty($search)) {
            $query = $query->where('permissions.id', 'like', '%' . $search . '%')
                ->orWhere('permissions.name', 'like', '%' . $search . '%');
        }

        if ($perPage === 'all') {
            $getMenu = $query->get(); // Get all entries
            $pagination = false;
        } else {
            $getMenu = $query->paginate($perPage); // Paginate based on $perPage
            $pagination = true;
        }



        $notifications = Auth::user()->unreadNotifications()->limit(2)->get();
        $title = "Menu Management";
        return view('menu.index', compact('getMenu', 'title', 'search', 'notifications', 'perPage', 'pagination'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Menu Management";
        return view('menu.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table("permissions")->insert([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return redirect()->route('menu.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::table("permissions")->where('id', '=', $id)->first();
        $title = "Menu Management";
        return view('menu.show', compact('title', 'menu'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Menu Management";
        $datamenu = DB::table("permissions")->where('id', $id)->first();
        return view('menu.edit', compact('title', 'datamenu'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table("permissions")->where('id', $id)->update([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);


        return redirect()->route('menu.index')
            ->with('success', 'Data Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table("permissions")->where('id', $id)->delete();

        return redirect()->route('menu.index')->with('success', 'Data Berhasil Dihapus');
    }
}
