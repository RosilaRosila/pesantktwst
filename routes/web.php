<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactControlle;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTiketController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\DataWisataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PesanTiketController;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\Pengunjung\PengunjungAuthController;
use App\Http\Controllers\Pengunjung\PengunjungDashboardController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReviewController;
use App\Models\MetodePembayaran;
use App\Models\Review;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



/*
|---------------------------------------------------------------------------------------------------------------------------|
| WEB ROUTE HALAMAN AWAL AUTHENTICATION ADMIN DAN PETUGAS TIKET                                                             |
|---------------------------------------------------------------------------------------------------------------------------|
*/
/* ------------------ Route Authentication Halaman Admin ------------------ */

Route::get('/', function () {
    return view('admin');
});
Route::get('/login', function () {
    return view('auth.login');
});
// Route::get('/register', function () {
//     return view('auth.register');
// });

//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Auth::routes();
Auth::routes(['verify' => false]);

/* ---------- Route Reset Password --------- */
Route::post('/password/reset/direct', [ForgotPasswordController::class, 'resetDirect'])->name('password.reset.direct');



/*
|---------------------------------------------------------------------------------------------------------------------------|
| WEB ROUTE USER SUPER ADMIN, ADMIN DAN PETUGAS TIKET                                                                                    |
|---------------------------------------------------------------------------------------------------------------------------|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


        /* --------------------------------------------- Menu Roles --------------------------------------------- */
        Route::resource('roles', RoleController::class);


        /* --------------------------------------------- Menu User --------------------------------------------- */
        Route::resource('users', UserController::class);


        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
        //Route::post('/fasilitas/store', 'FasilitasController@store');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
        Route::get('/menu/show/{id}', [MenuController::class, 'show'])->name('menu.show');


        /* --------------------------------------------- Menu Fasilitas --------------------------------------------- */
        /* ------------ Create, Read, Update & Delete Data Fasilitas ------------ */
        Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
        Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
        Route::post('/fasilitas/store', [FasilitasController::class, 'store'])->name('fasilitas.store');
        Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
        Route::post('/fasilitas/update/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
        Route::get('/fasilitas/delete/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');


        /* --------------------------------------------- Menu Data Wisata --------------------------------------------- */
        // Route::resource('dataswisata', DataWisataController::class);
        /* ------------ Create, Read, Update & Delete Data Wisata ------------ */
        Route::get('/datawisata', [DataWisataController::class, 'index'])->name('datawisata.index');
        Route::get('/datawisata/create', [DataWisataController::class, 'create'])->name('datawisata.create');
        //Route::post('/datawisata/store', 'DataWisataController@store');
        Route::post('/datawisata/store', [DataWisataController::class, 'store'])->name('datawisata.store');
        Route::get('/datawisata/edit/{id}', [DataWisataController::class, 'edit'])->name('datawisata.edit');
        Route::post('/datawisata/update/{id}', [DataWisataController::class, 'update'])->name('datawisata.update');
        Route::get('/datawisata/delete/{id}', [DataWisataController::class, 'destroy'])->name('datawisata.destroy');
        Route::get('/datawisata/show/{id}', [DataWisataController::class, 'show'])->name('datawisata.show');

        /* --------------------------------------------- Menu Data Tiket--------------------------------------------- */
        /* ------------ Create, Read, Update & Delete Data Wisata ------------ */
        Route::get('/datatiket', [DataTiketController::class, 'index'])->name('datatiket.index');
        Route::get('/datatiket/create', [DataTiketController::class, 'create'])->name('datatiket.create');
        Route::post('/datatiket/store', [DataTiketController::class, 'store'])->name('datatiket.store');
        Route::get('/datatiket/edit/{id}', [DataTiketController::class, 'edit'])->name('datatiket.edit');
        Route::post('/datatiket/update/{id}', [DataTiketController::class, 'update'])->name('datatiket.update');
        Route::get('/datatiket/delete/{id}', [DataTiketController::class, 'destroy'])->name('datatiket.destroy');


        /* --------------------------------------------- Menu Data Pengunjung--------------------------------------------- */
        Route::get('/datapengunjung', [PengunjungDashboardController::class, 'index'])->name('datapengunjung.index');
        Route::get('/datapengunjung/delete/{id}', [PengunjungAuthController::class, 'destroy'])->name('datapengunjung.destroy');


        /* --------------------------------------------- Menu Data Metode Pembayaran--------------------------------------------- */
        /* ------------ Create, Read, Update & Delete Data Metode Pembayaran ------------ */
        Route::get('/metodepembayaran', [MetodePembayaranController::class, 'index'])->name('metodepembayaran.index');
        Route::get('/metodepembayaran/create', [MetodePembayaranController::class, 'create'])->name('metodepembayaran.create');
        Route::post('/metodepembayaran/store', [MetodePembayaranController::class, 'store'])->name('metodepembayaran.store');
        Route::get('/metodepembayaran/edit/{id}', [MetodePembayaranController::class, 'edit'])->name('metodepembayaran.edit');
        Route::post('/metodepembayaran/update/{id}', [MetodePembayaranController::class, 'update'])->name('metodepembayaran.update');
        Route::get('/metodepembayaran/delete/{id}', [MetodePembayaranController::class, 'destroy'])->name('metodepembayaran.destroy');


        /* --------------------------------------------- Menu Data Pesan Tiket Pengunjung--------------------------------------------- */
        Route::get('/pesantiket', [PesanTiketController::class, 'index'])->name('pesantiket.index');
        Route::get('/pesantiket/status/{kode_transaksi}', [PesanTiketController::class, 'status'])->name('pesantiket.status');
        Route::get('pesantiket/pembayaran/detail/{kode_transaksi}', [PembayaranController::class, 'show'])->name('pesantiket.show');


        /* --------------------------------------------- Menu Titik Koordinat Tempat Wisata --------------------------------------------- */
        Route::get('/alamat-wisata', [LocationController::class, 'index'])->name('alamat.index');
        Route::post('/alamat-wisata/store', [LocationController::class, 'store'])->name('alamat.store');
        Route::get('/alamat-wisata/edit/{id}', [LocationController::class, 'edit'])->name('alamat.edit');
        Route::post('/alamat-wisata/update/{id}', [LocationController::class, 'update'])->name('alamat.update');
        Route::get('/alamat-wisata/delete/{id}', [LocationController::class, 'destroy'])->name('alamat.destroy');


        /* --------------------------------------------- Menu Data Photo Wista --------------------------------------------- */
        Route::get('/galeri-photo', [PhotoController::class, 'index'])->name('dataphoto.index');
        Route::post('/galeri-photo/store', [PhotoController::class, 'store'])->name('dataphoto.store');
        Route::get('/galeri-photo/delete/{id}', [PhotoController::class, 'destroy'])->name('dataphoto.destroy');


        /* --------------------------------------------- Route Nitifications --------------------------------------------- */
        // Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notifications/all', [HomeController::class, 'all'])->name('notifications.all');
        Route::post('/notifications//markAsRead/{id}', [HomeController::class, 'markAsRead'])->name('markAsRead');


        /* --------------------------------------------- Menu Review Pengunjung --------------------------------------------- */
        Route::get('/reviewpengunjung', [ReviewController::class, 'show'])->name('review.show');
        Route::get('/reviiews/status/{id}', [ReviewController::class, 'status'])->name('review.status');
        Route::get('/review/delete/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');


        /* --------------------------------------------- Dashboard Dialog Box Admin --------------------------------------------- */
        Route::get('/detail-pendapatan', [AdminDashboardController::class, 'pendapatan'])->name('admin_pendapatan');
        Route::get('/detail-jumlahpengunjung', [AdminDashboardController::class, 'pengunjung'])->name('admin_pengunjung');
        Route::get('/detail-pesantiket', [AdminDashboardController::class, 'pesantiket'])->name('admin_detailpesan');
        Route::get('/detail-unkonfirbayar', [AdminDashboardController::class, 'unkonfirbayar'])->name('admin_unkonfirbayar');
        Route::get('/detail/unkonfirhadir', [AdminDashboardController::class, 'unkonfirhadir'])->name('admin_unkonfirhadir');
        Route::get('/detail-pengunjungdomestik', [AdminDashboardController::class, 'domestik'])->name('admin_domestik');
        Route::get('/detail-pengunjungmancanegara', [AdminDashboardController::class, 'mancanegara'])->name('admin_mancanegara');


        /* --------------------------------------------- Route Menu Print Laporan Pendapatan --------------------------------------------- */
        Route::get('/laporan-pendapatan', [LaporanController::class, 'index'])->name('index_laporan');
        Route::get('/print-laporan-pendapatan', [LaporanController::class, 'printpendapatan'])->name('print_laporan_pendapatan');
        Route::get('/print-laporan-pertanggl', [LaporanController::class, 'printpertanggal'])->name('print-laporan_pertanggal');


        /* --------------------------------------------- Route Menu Print Laporan Pendapatan --------------------------------------------- */
        Route::get('/laporan-pengunjung', [LaporanController::class, 'lpengunjung'])->name('pengunjung_laporan');
        Route::get('/print-laporan-pengunjung', [LaporanController::class, 'printpengunjung'])->name('print_lpengunjung');
        Route::get('/print-laporan-pengunjung-pertanggal', [LaporanController::class, 'lpengunjungtanggal'])->name('print_lpengunjung_tanggal');
    });


    /* 
        |---------------------------------------------------------------------------------------------------------------------------------| 
        |--------------------------------------- Menu Cek Tiket Pengunjung [ Halaman Petugas Tiket ] -------------------------------------| 
        |---------------------------------------------------------------------------------------------------------------------------------|  
        */
    Route::prefix('petugas-tiket')->group(function () {
        Route::get('/cek-tiket', [PesanTiketController::class, 'cektiket'])->name('pengunjung.cektiket');
        Route::get('/pesantiket/kehadiran/{kode_transaksi}', [PesanTiketController::class, 'kehadiran'])->name('pesantiket.kehadiran');
    });
});



/*
|---------------------------------------------------------------------------------------------------------------------------------------|
| WEB ROUTE HALAMAN PENGUNJUNG AUTHENTICATION                                                                                           |
|---------------------------------------------------------------------------------------------------------------------------------------|
*/
/* ------------------------------------------ Route Halaman Auth Pengunjung atau Customer ----------------------------------------- */
Route::middleware('pengunjung')->prefix('pengunjung')->group(function () {
    Route::get('/pesan-tiket', [DashboardController::class, 'ptiket'])->name('halaman_pengunjung_pesantiket');
    Route::post('/pesan-tiket/post', [PesanTiketController::class, 'store'])->name('pesantiket.store');
    Route::get('/detail-pesanan/{kode_transaksi}', [PesanTiketController::class, 'show'])->name('pengunjung_detail_pesanan');
    // Route::get('/pembayaran/{kode_transaksi}', [PesanTiketController::class, 'bayar'])->name('pengunjung_pembayaran_pesanan');
    Route::get('/cetak-code/{kode_transaksi}', [PesanTiketController::class, 'printcode'])->name('pengunjung_print_code');
    Route::get('/riwayat/delete/{kode_transaksi}', [PesanTiketController::class, 'destroy'])->name('pengunjung_riwayat.destroy');

    Route::get('/pembayaran/{kode_transaksi}', [PembayaranController::class, 'bayar'])->name('pengunjung_pembayaran_pesanan'); //form pembayaran
    Route::post('/pembayaran/proses/{kode_transaksi}', [PembayaranController::class, 'proses'])->name('pembayaran_proses');
    Route::post('/pembayaran/complete/{kode_transaksi}', [PembayaranController::class, 'complete'])->name('pembayaran_complete');

    Route::get('/bayar/{kode_transaksi}', [PembayaranController::class, 'index'])->name('bukti_pembayaran_pesanan');
    Route::post('/bukti-upload/store/{kode_transaksi}', [PembayaranController::class, 'store'])->name('bukti_pembayaran_store');

    Route::get('/profil', [PengunjungDashboardController::class, 'showprofil'])->name('pengunjung_profil');
    Route::get('/riwayat', [PengunjungDashboardController::class, 'riwayat'])->name('pengunjung_riwayat');
    Route::get('/daftar-riwayat-pemesanan', [PengunjungDashboardController::class, 'daftarriwayat'])->name('pengunjung_daftarriwayat');
    Route::get('/pesanan-selesai', [PengunjungDashboardController::class, 'selesai'])->name('pesanan_selesai');

    Route::get('/review/{kode_transaksi}/{datatiketid}', [ReviewController::class, 'index'])->name('pengunjung_review');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::post('/review/store2', [ReviewController::class, 'store2'])->name('review.store2');

    Route::get('/hubungikami', [ContactController::class, 'index'])->name('pengunjung_contact');
    Route::post('/hubungikami/store', [ContactController::class, 'store'])->name('contact_store');
});



/*
|---------------------------------------------------------------------------------------------------------------------------------------|
| WEB ROUTE HALAMAN PENGUNJUNG                                                                                                          |
|---------------------------------------------------------------------------------------------------------------------------------------|
*/
/* ------------------------------------------ Route Halaman Pengunjung atau Customer ----------------------------------------- */
Route::prefix('pengunjung')->group(function () {

    /* ------------ Route Login ------------ */
    Route::get('/login', [PengunjungAuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [PengunjungAuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::post('/logout', [PengunjungAuthController::class, 'lgout'])->name('auth.logout');

    /* ------------ Route Register ------------ */
    Route::get('/register', [PengunjungAuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [PengunjungAuthController::class, 'store'])->name('auth.store');

    Route::get('/lupapassword', [PengunjungAuthController::class, 'lpassword'])->name('auth.lpassword');
    Route::post('/lupapassword/reset', [PengunjungAuthController::class, 'rstpassword'])->name('auth.forgotpassword');

    /* ------------------------------------------ Route Halaman Menu Pengunjung atau Customer ----------------------------------------- */
    Route::get('/home', [DashboardController::class, 'home'])->name('halaman_pengunjung_home');
    Route::get('/info-wisata', [DashboardController::class, 'info'])->name('halaman_pengunjung_infowisata');
    Route::get('/info-wisata/detail/{id}', [DashboardController::class, 'detail'])->name('halaman_pengunjung_detailwisata');
    Route::get('/ulasan', [DashboardController::class, 'ulasan'])->name('halaman_pengunjung_ulasan');
});
