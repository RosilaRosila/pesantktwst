@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>
<div class="card mt-5" style="width:85%; margin:0 auto">
    <div class="card-header">
        <p style="font-size: 18px; font-weight:bold">
            Pembayaran & Upload Bukti Pembayaran
        <p>
    </div>
    <div class="card-body">
        <br>
        <div class="card">
            <div class="card-body text-white bg-danger">
                <p style="font-size: 10px; font-weight:bold"><u>Cara Melakukan Pembayaran :</u> </p>
                <ol class="list mt-2">
                    <li style="font-size: 9px;"><b>Transfer Bank :</b>
                        <ol type='a'>
                            <li>BANK BCA : 987547389 [ A.N PANGANDARAN ]</li>
                            <li>BANK MANDIRI : 987547389 [ A.N PANGANDARAN ]</li>
                            <li>BANK BRI : 987547389 [ A.N PANGANDARAN ]</li>
                        </ol>
                    </li>
                    <li class="list mt-3" style="font-size: 9px;"><b>Transfer E-Wallet :</b>
                        <ol type='a'>
                            <li>OVO : 0987547389 [ A.N PANGANDARAN ]</li>
                            <li>GOPAY : 0987547389 [ A.N PANGANDARAN ]</li>
                            <li>LINK AJA : 0987547389 [ A.N PANGANDARAN ]</li>
                        </ol>
                    </li>
                    <li class="list mt-3" style="font-size: 9px;"><b>Isi form dan upload bukti pembayaran</b></li>
                </ol>
            </div>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "PEMBAYARAN") ? 'active' : '' }} " href="{{ route('pengunjung_pembayaran_pesanan', $pesan->kode_transaksi) }}">Isi Form dan Upload Bukti Pembayaran</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link {{ ($title === "BUKTI UPLOAD") ? 'active' : '' }}" href="{{ route('bukti_pembayaran_pesanan', $detail_pesanan->kode_transaksi) }}">Bukti Upload</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="mt-3">
                    <label for="txtkode" class="form-label" style=" font-weight:normal">Kode Transaksi</label>
                    <input type="text" class="form-control" id="txtkode" name="kode" value=" {{ $detail_pesanan->dataorder->kode_transaksi }}">
                </div>
                <div class="mt-4">
                    <label for="txttiket" class="form-label">Pilih Metode Pembayaran</label>
                    <input type="text" class="form-control" id="txtname" name="metodeid" value=" {{ $detail_pesanan->datametode->name }}">
                </div>
                <div class="mt-4">
                    <label for="txtimage" class="form-label" style=" font-weight:normal">Total Pembayaran</label>
                    <input type="text" name="imgicon" id="txtimage" class="form-control" value="Rp. {{ $detail_pesanan->datatiket->harga*$pesan->qty  }}">
                </div>
                <div class="mt-4">
                    <label for="txtimage" class="form-label" style=" font-weight:normal">Tambahkan Gambar Icon Fasilitas</label>
                    <div class="form-control" style="height: 70px;" id="imagemodal">
                        <img src="{{ asset($detail_pesanan->imagepembayaran) }}" alt="" height="50px">
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>
<br>
</div>
<br>
@endsection