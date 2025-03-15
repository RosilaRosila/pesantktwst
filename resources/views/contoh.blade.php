public function index()
{

/* -------------------- BOX INFORMATIONS -------------------- */
$notifications = Auth::user()->unreadNotifications()->limit(2)->get();
$jumlah_wisatadomestik = PesanTiket::where('wisatawan', 'domestik')->where('kehadiran', 1)->sum('qty');
$jumlah_wisatamanca = PesanTiket::where('wisatawan', 'mancanegara')->where('kehadiran', 1)->sum('qty');
$jumlah_unkonfirmasi = PesanTiket::where('status', 0)->count(); // Konfirmasi Kehadiran
$jumlah_pengunjung = PesanTiket::where('kehadiran', 1)->sum('qty');
$jumlah_pesanan = PesanTiket::where('status', 1)->count();
$jumlah_unkehadiran = PesanTiket::where('status', 1)->where('kehadiran', 0)->count();
$jumlah_pendapatan = PesanTiket::where('kehadiran', 1)->sum('totalharga');
$jumlah_subscribe = Pengunjung::count();

/* ---------- Halaman Wrapper Admin ----------*/
$akun_pengunjung = Pengunjung::orderBy('created_at', 'desc')->first();
$latesttiket = PesanTiket::orderBy('created_at', 'desc')->take(3)->get();


/* -------------------- Mengambil data pendapatan berdasarkan bulan dan tahun [ LINE CHART ) -------------------- */
$datat = DB::table('pesantikets')
->select(
DB::raw('YEAR(tanggal) as year'),
DB::raw('MONTH(tanggal) as month'),
DB::raw("CAST(SUM(totalharga) as int) as totalharga ")
)
->where('kehadiran', 1)
->groupBy('year', 'month')
->orderBy('year', 'asc')
->orderBy('month', 'asc')
->get();

// Memformat data untuk Chart.js
$vlabels = [];
$vtotals = [];

foreach ($datat as $entry) {
$date = Carbon::createFromDate($entry->year, $entry->month, 1)->format('F Y');
$vlabels[] = $date;
$vtotals[] = $entry->totalharga;
}



/* -------------------- Mengambil data jumlah pengunjung berdasarkan tempat wisata [ PIE CHART ) -------------------- */
// Mengambil data Tiket Berdasarkan Data Pesan Tiket
$data = PesanTiket::join('data_tikets', 'pesantikets.datatiketid', '=', 'data_tikets.id')
->select(DB::raw('data_tikets.namawst as tiket, CAST(SUM(pesantikets.qty) as int) as total '))
->where('kehadiran', 1)
->groupBy('data_tikets.namawst')
->get();

// Menyiapkan data untuk chart
$labels = $data->pluck('tiket')->toArray();
$totals = $data->pluck('total')->toArray();



/* -------------------- Mengambil data jumlah wisatawan berdasarkan jenis wisatawan [ BAR CHART ) -------------------- */
$dataw = DB::table('pesantikets')
->select(
DB::raw('wisatawan'),
DB::raw("CAST(SUM(qty) as int) as totalwisatawan")
)
->where('kehadiran', 1)
->groupBy('wisatawan')
->get();

// Memformat data untuk Chart.js
$xlabels = [];
$xtotals = [];

foreach ($dataw as $entry) {
$category = DB::table('pesantikets')->where('wisatawan', $entry->wisatawan)->first();
$xlabels[] = $category->wisatawan;
$xtotals[] = $entry->totalwisatawan;
}



$title = "Dashboard";
return view('home', compact(
'title',
'jumlah_pesanan',
'jumlah_pengunjung',
'jumlah_unkonfirmasi',
'jumlah_pendapatan',
'notifications',
'jumlah_unkehadiran',
'jumlah_wisatadomestik',
'jumlah_wisatamanca',
'jumlah_subscribe',
'akun_pengunjung',
'latesttiket',
'labels',
'totals',
'vlabels',
'vtotals',
'xlabels',
'xtotals'
));
}