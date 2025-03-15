@extends('layout-pengunjung.dashboard-pembayaran')
@section('container')
<br>
<br>
<br>
<div class="card mt-5" style="width:85%; margin:0 auto">
    <div class="card-header">
        <a class="navbar-brand" href="{{ route('pengunjung_riwayat')  }}/" style="font-size: 3vh; ">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <span style="font-weight:bold">
            Detail Pembayaran Pesanan
        </span>
    </div>
    <div class="card-body">
        <br>
        <div class="card">
            <!-- <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "PEMBAYARAN") ? 'active' : '' }} " href="{{ route('pengunjung_pembayaran_pesanan', $pesan->kode_transaksi) }}">Pilih Metode Pembayaran</a>
                    </li>
                </ul>
            </div> -->
            <div class="card-body" style="font-size: 12px;">
                <div class="mt-2">
                    <label for="txtkode" class="form-label" style=" font-weight:normal">Kode Transaksi</label>
                    <input type="text" name="kode_transaksi" id="txtkode" class="form-control" value="{{ $pesan->kode_transaksi}}" readonly style="font-size: 12px;">
                </div>
                <div class="mt-4">
                    <label for="txtpesan" class="form-label" style=" font-weight:normal">Nama</label>
                    <input name="name" class="form-control" aria-label="Default select example" id="txtpesan" readonly style="font-size: 12px;" value="{{ $pesan->name }} "></input>
                </div>
                <div class="mt-4">
                    <label for="txtwstwn" class="form-label" style=" font-weight:normal">Kategori Wisatawan</label>
                    <input type="text" name="wisatawan" id="txtwstwn" class="form-control" value="{{ $pesan->wisatawan }}" readonly style="font-size: 12px;">
                </div>
                <div class="mt-4">
                    <label for="txttiket" class="form-label" style=" font-weight:normal">Tujuan Tempat Wisata</label>
                    <input type="text" name="tujuanwisata" id="txttiket" class="form-control" value="{{ $pesan->datatiket->namawst }}" readonly style="font-size: 12px;">
                </div>
                <div class="mt-4">
                    <label for="txtqty" class="form-label" style=" font-weight:normal">Jumlah Orang</label>
                    <input type="text" name="qty" id="txtqty" class="form-control" value="{{ $pesan->qty }}" readonly style="font-size: 12px;">
                </div>
                <div class="mt-4">
                    <label for="txttotal" class="form-label" style=" font-weight:normal">Total Pembayaran</label>
                    <input type="text" name="total" id="txttotal" class="form-control" value="{{ formatRupiah($pesan->totalharga) }}" readonly style="font-size: 12px;">
                </div>
                <div class="mt-4">
                    <label for="txttgl" class="form-label" style=" font-weight:normal">Tanggal Kunjungan</label>
                    <input type="text" name="tanggal" id="txttgl" class="form-control" value="{{ Carbon\Carbon::parse($pesan->tanggal)->format('d-m-Y ') }}" readonly style="font-size: 12px;">
                </div>
                <!-- <div class="mt-4">
                        <label for="txtimage" class="form-label" style=" font-weight:normal">Upload Bukti Transfer</label>
                        <img class="img-preview img-fluid">
                        <input type="file" name="imagepembayaran" id="txtimage" class="form-control" onchange="previewImage()">
                    </div> -->
                <br>
                <br>
                <!-- <a class="btn btn-warning " href="{{ route('pengunjung_riwayat') }}" style="color: white;">
                    Kembali
                    </a> -->
                <form action="{{ route('pembayaran_proses', $pesan->kode_transaksi) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="font-size: 12px;">Bayar Sekarang</button>
                </form>
                <!-- <button type="submit" class="btn btn-primary" style="font-size: 12px;" id="pay-button">Bayar Sekarang</button> -->
                <br>
            </div>
        </div>
    </div>
    <br>
</div>
<br>

<script>
    function previewImage() {
        const txtimage = document.querySelector('#txtimage');
        const imgPreview = document.querySelector('.img-preview');

        // imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(txtimage.file[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection