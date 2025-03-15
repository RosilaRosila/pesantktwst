<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengunjungAuthController extends Controller
{

    /**
     * resource Halaman Login Pengunjung.
     */
    public function login()
    {
        $title = "LOGIN | PENGUNJUNG";
        return view('pengunjung.auth.login', compact('title'));
    }


    /**
     * resource Halaman Register Pengunjung.
     */
    public function register()
    {
        $title = "REGISTER | PENGUNJUNG";
        return view('pengunjung.auth.register', compact('title'));
    }


    /**
     * resource Halaman Authentication Login Pengunjung.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if (Auth::guard('pengunjung')->attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/pengunjung/pesan-tiket');
        } else {
            return redirect()->route('auth.login')->with('error', 'Information is not correct!');
        }
    }


    /**
     * resource Store Register Pengunjung.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengunjungs',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);


        $password = Hash::make($request->password);

        $obj = new Pengunjung();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->save();

        return redirect()->route('auth.login')->with('success', 'Akun Berhasil Dibuat');
    }


    /**
     * resource Logout Pengunjung.
     */
    public function lgout(Request $request)
    {

        Auth::guard('pengunjung')->logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/pengunjung/login');
    }

    public function lpassword()
    {
        $title = "LUPA PASSWORD";

        return view('pengunjung.auth.lupapassword', compact('title'));
    }

    public function rstpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:pengunjungs,email',
            'password' => 'required|string|confirmed',
        ]);

        $datapengunjung = Pengunjung::where('email', $request->email)->first();

        if ($datapengunjung) {
            $datapengunjung->password = Hash::make($request->password);
            $datapengunjung->save();

            return redirect()->route('auth.login')->with('status', 'Password berhasil direset.');
        }

        return back()->withErrors(['email' => 'Email tidak ditemukan.']);
    }

    /* ----- Resource Delete Data Pengunjung -----*/
    public function destroy($id)
    {
        $datapengunjung = Pengunjung::where('id', $id)->first();

        $datapengunjung->delete();

        return redirect()->route('datapengunjung.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
