<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #5f9ea0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('halaman_pengunjung_home') }}" style="font-size: 3vh; ">
            <img src="{{ asset('/') }}images/logokp.png" width="40" height="40" class="imglogo d-inline-block align-top" alt="">
            <span class="hdr">WISATA KABUPATEN PANGANDARAN</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link {{ ($title === "HOME") ? 'active' : '' }} " href="{{ route('halaman_pengunjung_home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "INFO WISATA") ? 'active' : '' }} " href=" {{ route('halaman_pengunjung_infowisata') }}">Info Wisata</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link {{ ($title === "PESAN TIKET") ? 'active' : '' }} " href="http://127.0.0.1:8000/pesan-tiket">Pesan Tiket</a>
            </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link {{ ($title === "ULASAN") ? 'active' : '' }} " href="{{ route('halaman_pengunjung_ulasan') }}">Ulasan</a>
                </li> -->

                @auth('pengunjung')
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "PESAN TIKET") ? 'active' : '' }} " href="{{ route('halaman_pengunjung_pesantiket') }}">Pesan Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "RIWAYAT TRANSAKSI") ? 'active' : '' }}" href="{{ route('pengunjung_riwayat') }}">Pesanan</a>
                </li>
                <li class="nav-item dropdown" style="min-width: 10rem;">
                    <a class="nav-link dropdown-toggle {{ ($title === "PROFIL PENGUNJUNG") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>&nbsp {{ Auth::guard('pengunjung')->user()->name }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 20rem;">
                        <li><a class="dropdown-item" href="{{ route('pengunjung_profil') }}"><i class="fas fa-user"></i>&nbsp Profil</a></li>
                        <!-- <li><a class="dropdown-item {{ ($title === "RIWAYAT TRANSAKSI") ? 'active' : '' }}" href="{{ route('pengunjung_riwayat') }}"><i class="fas fa-th-list"></i>&nbsp Riwayat</a></li>
                        
                        <li><a class="dropdown-item {{ ($title === "HUBUNGI KAMI") ? 'active' : '' }}" href="{{ route('pengunjung_contact') }}"><i class="fas fa-phone-square"></i>&nbsp Hubungi Kami</a></li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                    &nbsp Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "PESAN TIKET") ? 'active' : '' }}  " href="{{ route('auth.login') }}">Pesan Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "LOGIN | PENGUNJUNG") ? 'active' : '' }} " href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "REGISTER | PENGUNJUNG") ? 'active' : '' }} " href="{{ route('auth.register') }}">Register</a>
                </li>


                <!-- <span class="navbar-text mr-3">
                    Silahkan login atau daftar akun
                </span>

                <a href="#" class="btn btn-outline-success mr-2">Login</a>
                <a href="#" class="btn btn-outline-danger">Daftar</a> -->
                @endauth
            </ul>

        </div>
    </div>
</nav>