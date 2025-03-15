@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>
<div class="card mt-5 mb-3" style="width:85%; margin:0 auto">
    <div class="card-header" style="font-size: 12px;">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link {{ ($title === "RIWAYAT TRANSAKSI") ? 'active' : '' }}" aria-current="true" href="{{ route('pengunjung_riwayat') }}" style="color:black">Belum Bayar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "DAFTAR RIWAYAT PEMESANAN") ? 'active' : '' }}" aria-current="true"" href=" {{ route('pengunjung_daftarriwayat') }}" style="color:black">Riwayat Pesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "TIKET SELESAI") ? 'active' : '' }}" aria-current="true"" href=" {{ route('pesanan_selesai') }}" style="color:black">Tiket Selesai</a>
            </li>
        </ul>
    </div>
    <div class="card-body table-responsive">

        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <section class="content mt-3">

            @if($tiket->count() > 0)
            @foreach($tiket as $tiket)
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <p style="font-size: 12px; font-weight: bold;">Kode Transaksi : {{ $tiket->kode_transaksi }}</p>
                        <p style="font-size: 12px; font-weight: bold;">
                            <label class="label {{ ( $tiket->status == 'Unpaid') ? 'text-danger' : 'text-success' }}">
                                <i class="fas fa-check-circle"></i>
                                {{ ( $tiket-> status=='Unpaid') ? 'Unpaid' : 'Paid' }}
                            </label>
                        </p>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text" style="font-size: 12px;">Nama : {{ $tiket->name }}</p>
                            <p class="card-text" style="font-size: 12px;">Tujuan Tempat Wisata : {{ $tiket->datatiket->namawst }}</p>
                            <p class="card-text" style="font-size: 12px;">Jumlah Orang : {{ $tiket->qty }}</p>
                            <p class="card-text" style="font-size: 12px;">Tanggal kunjungan : {{ Carbon\Carbon::parse($tiket->tanggal)->format('d-m-Y ') }}</p>
                            <p class="card-text" style="font-size: 12px;">Total Pembayaran : {{ formatRupiah($tiket->totalharga) }}</p>
                            <p class="card-text"><small class="text-muted" style="font-size: 9px;"><i class="far fa-clock mr-1"></i>Tanggal Pemesanan {{ Carbon\Carbon::parse($tiket->created_at)->format('d-m-Y ') }}</small></p>
                            <div style="display: flex; justify-content: flex-end;">
                                @if($tiket->status == 'Unpaid')
                                <a href="{{ route('pengunjung_pembayaran_pesanan', $tiket->kode_transaksi) }}" class=" btn btn-warning btn-sm text-light" style="font-size:10px; margin-right: 5px;">Pembayaran</a>
                                @endif

                                @if($tiket->status == 'Paid' && $tiket->kehadiran == 1)
                                <a href="{{ route('pengunjung_review', ['kode_transaksi' => $tiket->kode_transaksi, 'datatiketid' => $tiket->datatiketid]) }}"
                                    class="btn btn-dark btn-sm text-light"
                                    style="font-size:10px; margin-right: 5px;">
                                    Beri Penilaian
                                </a>
                                @endif


                                @if($tiket->status == 'Paid' && $tiket->kehadiran == 0)
                                <a href="{{ route('pengunjung_detail_pesanan', $tiket->kode_transaksi) }}" class=" btn btn-primary btn-sm text-light" style="font-size:10px; margin-right: 5px;">Detail Pemesanan</a>
                                @endif

                                @if($tiket->status == 'Unpaid')
                                <a href="{{ route('pengunjung_riwayat.destroy', $tiket->kode_transaksi) }}" class="btn btn-danger btn-sm text-light" style="font-size:10px">Batalkan Pemesanan</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
            @else
            <div class="card text-center">
                <div class="card-body">
                    <!-- Anda Belum Melakukan Pemesanan Tiket -->
                    Anda Belum Melakukan Pemesanan Tiket
                </div>
            </div>
            @endif
            <br>

        </section>
        <br>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection