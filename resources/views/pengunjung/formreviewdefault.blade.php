@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>


<br>
<div class="card mt-5" style="width:50%; margin:0 auto; font-size:12px">

    @if ($message = Session::get('success'))
    <div class="mt-4 mb-4">
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    <div class="card-header">
        <a class="navbar-brand" href="{{ route('pesanan_selesai') }}/" style="font-size: 3vh; ">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <span class="hdr">Beri Penilaian dan Review</span>
    </div>
    <div class="card-body">
        <br>
        <div class="card">
            <div class="card-body">
                <p>Data Pesanan Tidak Ditemukan</p>
            </div>
        </div>
        <br>
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Saat bintang diklik
            $('.star-rating .fa-star').on('click', function() {
                var rating = $(this).data('value');
                $('#rating-value').val(rating);

                // Reset tampilan bintang
                $('.fa-star').removeClass('checked');

                // Tambahkan class 'checked' pada bintang yang dipilih
                $(this).addClass('checked');
                $(this).prevAll().addClass('checked');
            });
        });
    </script>
    @endsection