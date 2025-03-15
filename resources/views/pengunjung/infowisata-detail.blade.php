@extends('layout-pengunjung.dashboardinfo-detail')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<style>
    #map {
        height: 200px;
    }

    .wafixed {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 999;
    }

    .checked {
        color: orange;
    }

    .fa-star {
        cursor: pointer;
    }

    .fa-star-half:before {
        content: "\f089";
        /* icon bintang setengah */
    }

    .star-rating {
        display: inline-block;
    }

    .jdl-ulasan {
        font-size: 20px;
    }

    .scrollable-container {
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        /* Firefox */
        scrollbar-color: #888 #f5f5f5;
        /* Firefox */
    }

    /* Webkit Browsers (Chrome, Safari) */
    .scrollable-container::-webkit-scrollbar {
        width: 8px;
    }

    .scrollable-container::-webkit-scrollbar-track {
        background-color: #f5f5f5;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .scrollable-container-foto {
        max-height: 270px;
        overflow-y: auto;
        scrollbar-width: thin;
        /* Firefox */
        scrollbar-color: #888 #f5f5f5;
        /* Firefox */
    }

    /* Webkit Browsers (Chrome, Safari) */
    .scrollable-container-foto::-webkit-scrollbar {
        width: 8px;
    }

    .scrollable-container-foto::-webkit-scrollbar-track {
        background-color: #f5f5f5;
    }

    .scrollable-container-foto::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .scrollable-container-tiket {
        max-height: 100px;
        overflow-y: auto;
        scrollbar-width: thin;
        /* Firefox */
        scrollbar-color: #888 #f5f5f5;
        /* Firefox */
    }

    /* Webkit Browsers (Chrome, Safari) */
    .scrollable-container-tiket::-webkit-scrollbar {
        width: 8px;
    }

    .scrollable-container-tiket::-webkit-scrollbar-track {
        background-color: #f5f5f5;
    }

    .scrollable-container-tiket::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .progress-bar {
        background-color: orange;
        /* Gold color to match the star icon */
    }

    .progress {
        background-color: #e0e0e0;
        /* Light grey for the background */
        border-radius: 5px;
    }



    @media only screen and (max-width: 575px) {
        .form-inline {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-inline label,
        .form-inline select,
        .form-inline span {
            margin-bottom: 10px;
        }
    }

    @media only screen and (max-width: 800px) {
        .jdl-ulasan {
            font-size: 14px;
        }
    }
</style>

@endsection

@section('container')
<br>
<br>
<br>
<div class="image-header mt-4">
    <div class="card mb-3">
        <img class="card-img-top" src="{{ asset($wisata_detail->imgheader) }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-title" style="font-weight: bold; ">{{ $wisata_detail->title }}</p>
            <p class="card-text" style="text-align: justify;">
                {{ $wisata_detail->deskripsi }}
                <span id="dots">...</span><span id="more">
                    {{ $wisata_detail->readmore }}
                </span>
            </p>
            <button onclick="myFunction()" id="myBtn">Read more</button>
        </div>
    </div>
    <br>
    <br>
    <!-- ---------- ALAMAT ---------- -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <p class="card-header" style="font-size: 16px; font-weight:bold;">Alamat</p>
                        <div class="card-body">
                            <p style="font-size: 13px; font-weight:bold;">{{ $wisata_detail->title }}</p>
                            <img src="{{ asset('/') }}images/place-marker.png" style="height:30px;">
                            <span style="font-size: 12px;">&nbsp {{ $wisata_detail->alamat }}</span>
                        </div>
                    </div>
                    <br>
                    <!-- ---------- FASILITAS ---------- -->
                    <div class="card">
                        <p class="card-header" style="font-size: 16px; font-weight:bold;">Fasilitas</p>
                        <div class="card-body">
                            <div class="header-fasilitas">
                                <main class="grid ">
                                    @php
                                    $arr = explode(',', $wisata_detail->fasilitas);
                                    for($j=0;$j<count($arr);$j++) { $temp_row=\App\Models\Fasilitas::where('id', $arr[$j])->first();
                                        echo ' <article>';
                                            echo '<div class="content" style="font-size: 12px;">';
                                                echo' <img src="'.asset($temp_row->imgicon).'" height="20px"> &nbsp; '.$temp_row->namaicon.'
                                            </div>';
                                            echo'</article>';
                                        }
                                        @endphp
                                </main>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 16px; font-weight:bold;">Rating dan Review</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="review-summary">
                                        <b>
                                            <p style="font-size: 14px;">Review Summary</p>
                                        </b>
                                        @if($datareviews > 0)
                                        @for ($star = 5; $star >= 1; $star--)
                                        @php
                                        $count = $reviewsByStars->get($star, 0); // Get count for each star rating
                                        $percentage = ($count / $datareviews) * 100;
                                        @endphp

                                        <div class="d-flex align-items-center mb-2" style="font-size: 8px;">
                                            <!-- Star icons -->
                                            <span style="font-size:5px">
                                                @for ($i = 0; $i < $star; $i++)
                                                    <i class="fa fa-star" style="color: gold;"></i>
                                                    @endfor
                                            </span>

                                            <!-- Progress bar -->
                                            <div class="progress" style="width: 65%; height: 5px; margin-left: 10px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"
                                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>

                                            <!-- Count of reviews per star -->
                                            <span style="margin-left: 10px;">{{ $count }}</span>
                                        </div>
                                        @endfor
                                        @else
                                        <p>No reviews available</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="star-rating" style="font-size: 12px;">
                                        <div class="d-flex justify-content-center align-items-center mt-2"><b>
                                                <p style="font-size: 25px;">{{ number_format($averageRating, 1) }}</p>
                                            </b>
                                        </div>

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

                                                <br /> <b class="d-flex justify-content-center align-items-center mt-3">{{ $datareviews }} &nbsp Reviews</b>
                                                @else
                                                <span style="color: red;">Rating Belum Tersedia</span>
                                                @endif
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="card-body">
                            <div class="card">
                                <div class="scrollable-container">
                                    @foreach ($datareview as $review)
                                    <div class="card" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-2 d-flex justify-content-center align-items-center">
                                                <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="card-body">
                                                    <h5 class="card-text" style="font-size: 12px; font-weight:bold">{{ $review->name }}</h5>
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <span class="fa fa-star checked" style="font-size: 10px;"></span>
                                                        @endfor
                                                        @for ($i = $review->rating; $i < 5; $i++)
                                                            <span class="fa fa-star" style="font-size: 10px;"></span>
                                                            @endfor
                                                            <small class="text-muted" style="font-size: 10px;">&nbsp;&nbsp;{{ $review->created_at->diffForHumans() }}</small>
                                                            <p class="card-text mt-3" style="font-size: 10px;">{{ $review->review }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ---------- INFO HARGA TIKET ---------- -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <p class="card-header" style="font-size: 16px; font-weight:bold;">Info Harga Tiket</p>
                        <div class="card-body">
                            <p style="text-align: justify; font-size:12px;">
                                Tiket Masuk Pangandaran <span style="font-weight: bold;">Per 05 Januari 2024 </span>
                                tarif Zonasi sesuai dengan Peraturan Pemerintah Daerah <span style="font-weight: bold;">08 Tahun 2023</span> tentang
                                Pajak Daerah dan Retribusi Daerah Dan yang sebelumnya di hitung per jenis kendaraan
                                kini di hitung tarif Perorangan.
                            </p>
                            <div class="judul-header">
                                <p style="font-weight: bold; font-size:12px">Tiket Obyek Wisata Pangandaran</p>
                            </div>
                            <div class="scrollable-container-tiket mt-3">
                                <div class="grid-isi">

                                    @foreach($harga_tiket as $ht)
                                    <div class="isi-no" width="5px">
                                        <p>{{ $loop->iteration  }}</p>
                                    </div>
                                    <div class="isi">
                                        <p>{{ $ht->namawst }}</p>
                                    </div>
                                    <div class="isi-harga">
                                        <p>{{ formatRupiah($ht->harga) }} /orang</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <div class="row mt-3">
                                <div class="col-sm-12">
                                    <div class="pagint" style="float: right;">

                                    </div>
                                </div>
                            </div> -->
                            <div class="judul-header"></div>
                            <br>
                            <div class="d-grid gap-1">
                                @auth('pengunjung')
                                <a class="btn btn-primary " href="{{ route('halaman_pengunjung_pesantiket') }}" style="color: white;">
                                    Pesan Tiket Sekarang
                                </a>
                                @else
                                <a class="btn btn-primary " href="{{ route('auth.login') }}" style="color: white;">
                                    Pesan Tiket Sekarang
                                </a>
                                @endauth
                            </div>
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <p style="color: red; font-size:12px"><b><u>Catatan Penting *</u></b></p>
                                    <p style="font-size: 12px; text-align:justify">Untuk Melakukan Pesan Tiket Pengunjung Harus Membuat Akun Terlebih Dahulu dan Melakukan Login</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 16px; font-weight:bold;">Maps</p>
                        </div>
                        @if ($datalokasi->isNotEmpty())
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                        @else
                        <div class="card-body">Tidak Ada Data Lokasi</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <p style="font-size: 16px; font-weight:bold;">Galeri Foto</p>
        </div>
        <div class="scrollable-container-foto">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @if($datagaleri->isNotEmpty())
                    @foreach($datagaleri as $dg)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset($dg->photo) }}" class="card-img-top">
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="card-body">Galeri Belum Tersedia</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
<a class="wafixed" href="https://wa.me/6285603539603" target="_blank">
    <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x text-success"></i>
        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
    </span>
</a>
@endsection

@push('javascript')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    var datalokasi = @json($datalokasi);
    var map = L.map('map').setView([0, 0], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 100,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);


    datalokasi.forEach(function(coordinate) {
        var marker = L.marker([coordinate.latitude, coordinate.longitude]).addTo(map)
            .bindPopup('Location: ' + coordinate.latitude + ', ' + coordinate.longitude)
            .openPopup();

        marker.on('click', function() {
            window.open(`https://www.google.com/maps/search/?api=1&query=${coordinate.latitude},${coordinate.longitude}`, '_blank');
        });
    });

    if (datalokasi.length > 0) {
        var firstCoordinate = datalokasi[0];
        map.setView([firstCoordinate.latitude, firstCoordinate.longitude], 16);
    }
</script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<img src="https://i.imgur.com/6RMhx.gif" alt="Loading" />', // Optional loading animation
        padding: 20,
        nextSelector: '.pagination li.active + li a', // Selector for the next page link
        contentSelector: 'div.infinite-scroll', // Where the content will be appended
        callback: function() {
            $('ul.pagination').remove(); // Hide the pagination once it's loaded
        }
    });
</script>


@endpush