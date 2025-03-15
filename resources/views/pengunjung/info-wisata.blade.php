@extends('layout-pengunjung.dashboard-info_wisata')
@section('container')
<br>
<br>
<br>
<div class="card-body mt-4">
    <p class="card-title">Wisata - Wisata Kabupaten Pangandaran</p>
    <p class="card-text">Terdapat 12 wisata yang berada di kabupaten pangandaran.</p>
</div>
<br>
<div class="container">

    <main class="grid">
        @foreach($datawisatas as $dwisata)
        <article>
            <img src="{{ asset($dwisata->image) }}" height="200vh" class="imageresponsive">
            <div class="content">
                <p>{{ $dwisata->title }}</p>
                <div class="card-body">
                    <a href="{{ route('halaman_pengunjung_detailwisata', $dwisata->id) }}" class="btn border-dark center-block">Lihat Detail Informasi</a>
                    {{-- Hitung rata-rata rating --}}
                    <div class="star-rating" style="font-size:12px">
                        @php
                        $averageRating = $dwisata->reviews->avg('rating'); // Calculate average rating from active reviews
                        @endphp
                        @if ($averageRating)
                        @for ($i = 0; $i < floor($averageRating); $i++)
                            <!-- Full star -->
                            <span class="fa fa-star checked"></span>
                            @endfor

                            @if ($averageRating - floor($averageRating) >= 0.5)
                            <!-- Half star -->
                            <span class="fa fa-star-half checked"></span>
                            @endif

                            @for ($i = ceil($averageRating); $i < 5; $i++)
                                <!-- Empty star -->
                                <span class="fa fa-star"></span>
                                @endfor

                                &nbsp <b>({{ number_format($averageRating, 1) }})</b>
                                @else
                                <span style="color: red;">Rating Belum Tersedia</span>
                                @endif
                    </div>
                </div>

            </div>
        </article>
        @endforeach
    </main>
</div>
<a class="wafixed" href="https://wa.me/6285603539603" target="_blank">
    <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x text-success"></i>
        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
    </span>
</a>


<br>
@endsection