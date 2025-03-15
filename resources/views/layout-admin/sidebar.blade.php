<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('images/logokp.png') }}" alt="Logo" class="brand-image" style="opacity: .8 ">
        <span class="brand-text font-weight-light">KelolaAdmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-sm">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()-> name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ ($title === "Dashboard") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- ------------------ MENU ADMINISTRASI ------------------ -->
                @can('user-list')
                <li class="nav-header">ADMINISTRATOR</li>
                @endcan

                <!-- -------- Menu User Management -------- -->
                @can('user-list')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ ($title === "User Management") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Role Management -------- -->
                @can('role-list')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ ($title === "Role Management") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Role Management
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Menu Permissions Management -------- -->
                @can('menu-list')
                <li class="nav-item">
                    <a href="{{ route('menu.index') }}" class="nav-link {{ ($title === "Menu Management") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Menu Management
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Menu Permissions Management -------- -->
                @can('pengunjung-list')
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="{{ route('datapengunjung.index') }}" class="nav-link {{ ($title === "Pengunjung Management") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            Pengunjung Management
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Menu Permissions Management -------- -->
                @can('ulasan-list')
                <li class="nav-item">
                    <a href="{{ route('review.show') }}" class="nav-link {{ ($title === "Ulasan Pengunjung") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Ulasan Pengunjung
                        </p>
                    </a>
                </li>
                @endcan

                @can('metodepembayaran-list')
                <li class="nav-item">
                    <a href="{{ route('metodepembayaran.index') }}" class="nav-link {{ ($title === "Data Metode Pembayaran") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Metode Pembayaran
                        </p>
                    </a>
                </li>
                @endcan

                <!-- ------------------ MENU DATA DATA WISATA ------------------ -->
                @can('wisata-list')
                <li class="nav-header">DATA - DATA WISATA</li>
                @endcan

                <!-- -------- Menu Data Wisata -------- -->
                @can('wisata-list')
                <li class="nav-item">
                    <a href="{{ route('datawisata.index') }}" class="nav-link {{ ($title === "Data Wisata") ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            Data Wisata
                        </p>
                    </a>
                </li>
                @endcan

                @can('alamat-list')
                <li class="nav-item">
                    <a href="{{ route('alamat.index') }}" class="nav-link {{ ($title === "Alamat Tempat Wisata") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Maps Tempat Wisata
                        </p>
                    </a>
                </li>
                @endcan

                @can('foto-list')
                <li class="nav-item">
                    <a href="{{ route('dataphoto.index') }}" class="nav-link {{ ($title === "Galeri Foto") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Galeri Foto
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Data Fasilitas -------- -->
                @can('fasilitas-list')
                <li class="nav-item">
                    <a href="{{ route('fasilitas.index') }}" class="nav-link {{ ($title === "Data Fasilitas") ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Fasilitas
                        </p>
                    </a>
                </li>
                @endcan

                <!-- -------- Menu Harga Tiket -------- -->
                @can('tiket-list')
                <li class="nav-item">
                    <a href="{{ route('datatiket.index') }}" class="nav-link {{ ($title === "Data Tiket") ? 'active' : '' }} ">
                        <i class="nav-icon  fas fa-wallet"></i>
                        <p>
                            Harga Tiket
                        </p>
                    </a>
                </li>
                @endcan

                @can('cek-tiket')
                <li class="nav-header">DATA WISATA</li>

                <li class="nav-item">
                    <a href="{{ route('pengunjung.cektiket') }}" class="nav-link {{ ($title === "Cek Tiket Pengunjung") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Cek Tiket Pengunjung
                        </p>
                    </a>
                </li>
                @endcan

                @can('pesantiket-list')
                <li class="nav-item">
                    <a href="{{ route('pesantiket.index') }}" class="nav-link {{ ($title === "Data Pesan Tiket") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Pesan Tiket Pengunjung
                        </p>
                    </a>
                </li>
                @endcan

                <!-- ------------------ MENU DATA LAPORAN------------------ -->
                @can('laporan-print')
                <li class="nav-header">KELOLA LAPORAN</li>


                <!-- -------- Menu Data Wisata -------- -->
                <li class="nav-item">
                    <a href="{{ route('index_laporan') }}" class="nav-link {{ ($title === "Laporan Pendapatan") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Laporan Pendapatan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pengunjung_laporan') }}" class="nav-link {{ ($title === "Laporan Pengunjung") ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan Pengunjung
                        </p>
                    </a>
                </li>
                @endcan

                <li class="nav-header">AUTHENTICATE</li>
                <li class="nav-item has-treeview">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>