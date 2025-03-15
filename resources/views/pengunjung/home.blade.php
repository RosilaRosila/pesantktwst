@extends('layout-pengunjung.dashboard-home')
@section('container')
<br>
<br>

<div id="carouselExampleSlidesOnly" class="carousel slide mt-3" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/') }}images/image-header-1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/') }}images/image-header-2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/') }}images/image-header-4.png" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<div class="card-header" style="background-color: #5f9ea0;"></div>

<br>
<br>
<div class="card">
    <div class="card-header">
        <p>Kabupaten Pangandaran</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>Kabupaten pangandaran merupakan sebuah wilayah kabupaten yang terletak di Provinsi Jawa Barat, Indonesia.
                Ibu kotanya adalah Kecamatan Parigi. Kabupaten Pangandaran memiliki luas wilayah sekira 1.011,04 km.
                Kabupaten Pangandaran berbatasan dengan Kabupaten Ciamis di sebelah utara, Kabupaten Cilacap (Provinsi Jawa Tengah)
                di sebelah timur, Samudra Hindia di sebelah selatan, serta Kabupaten Tasikmalaya di sebelah barat.
                Kabupaten Pangandaran terletak di bagian ujung tenggara dari wilayah Provinsi Jawa Barat yang berbatasan langsung dengan
                Provinsi Jawa Tengah di sebelah timur. Kabupaten ini merupakan buah pemekaran dari Kabupaten Ciamis.</p>
        </blockquote>
    </div>
</div>

<br>
<br>
<div class="card">
    <div class="card-header">
        <p>Pembentukan Kabupaten Pangandaran</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>Pangandaran resmi menjadi kabupaten setelah pengukuhan Undang-Undang Republik Indonesia Nomor 21 Tahun 2012 dan
                hari jadinya ditetapkan pada tanggal 25 Oktober 2012. Kabupaten ini merupakan buah pemekaran dari Kabupaten Ciamis.
                Dengan tanggal pemekaran tersebut, kabupaten ini menjadi yang paling muda dari seluruh kabupaten di Jawa Barat.</p>
        </blockquote>
    </div>
</div>

<br>
<br>
<div class="card">
    <div class="card-header">
        <p>Pariwisata Kabupaten Pangandaran</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>Pariwisata merupakan salah satu sektor yang cukup esensial bagi Kabupaten Pangandaran. Objek wisata yang terdapat di Kabupaten Pangandaran antara lain adalah:</p>
            <ul class="list-group ">
                <li class="list-group-item">1. &nbsp Pantai Pangandaran</li>
                <li class="list-group-item">2. &nbsp Pantai Karapyak</li>
                <li class="list-group-item">3. &nbsp Pantai Batuhiu</li>
                <li class="list-group-item">4. &nbsp Pantai Batukaras</li>
                <li class="list-group-item">5. &nbsp Cukang Taneuh / Green Canyon</li>
                <li class="list-group-item">6. <i>&nbsp Body Rafting</i> Citumang</li>
                <li class="list-group-item">7. &nbsp Taman Wisata Alam Pangandaran (Cagar Alam)</li>
                <li class="list-group-item">8. &nbsp Pantai Karangnini</li>
                <li class="list-group-item">9. &nbsp Curug Bojong</li>
                <li class="list-group-item">10. Pantai Madasari</li>
                <li class="list-group-item">11. <i>Body Rafting Santirah</i></li>
                <li class="list-group-item">12. <i>Body Rafting Ciwayang</i></li>
            </ul>
        </blockquote>
    </div>
</div>

<br>
<br>
<div class="card">
    <div class="card-header">
        <p>Transportasi Kabupaten Pangandaran</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <div class="card">
                <p class="card-header" style="font-weight: bold;">Angkutan Umum</p>
                <div class="card-body">
                    <p class="card-text">
                        Akses menuju Kabupaten Pangandaran dimulai dari Kota Banjar, melewati jalan raya ke arah selatan menuju wilayah Kabupaten Pangandaran.
                        Jalan raya ini dilalui oleh bus-bus antarkota, pariwisata, dan angkudes. Tujuan akhirnya adalah Terminal Pangandaran.
                    </p>
                </div>
            </div>

            <br>
            <div class="card">
                <p class="card-header" style="font-weight: bold;">Angkutan Kereta Api</p>
                <div class="card-body">
                    <p class="card-text">
                        Akses menggunakan kereta api dilayani dari Stasiun Banjar. Dahulu terdapat percabangan dari stasiun ini menuju Pangandaran,
                        tetapi sekarang sudah dinonaktifkan. Jalur ini masuk dalam daftar reaktivasi, tetapi sampai saat ini belum ada progres.
                    </p>
                </div>
            </div>

            <br>
            <div class="card">
                <p class="card-header" style="font-weight: bold;">Transportasi Udara</p>
                <div class="card-body">
                    <p class="card-text">
                        Kabupaten Pangandaran memiliki sebuah bandar udara yakni Bandar Udara Nusawiru yang terletak berada di Kecamatan Cijulang.
                    </p>
                </div>
            </div>
        </blockquote>
    </div>
</div>
<br>
@endsection