<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DASHBOARD | HALAMAN ADMIN</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.cs') }}s">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Link Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/logokp.png" />

    <!-- Style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/halaman_admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout-admin.sidebar')
        <!-- /.sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <br>
        <br>
        <div class="content-wrapper">
            <div class="content-header">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <h4 class="m-0 text-dark">Cek Tiket Pengunjung</h4>
                        <br>
                        <br>


                        <section class="content">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('/') }}images/ptiket.png" alt="Card image cap">
                                <div class="card-body">
                                    <br>
                                    <div class="card text-center">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;margin-top:20px">SELAMAT DATANG, SILAHKAN CEK TIKET PENGUNJUNG DISINI !</h5>
                                        </div>
                                        <br>



                                        <br>
                                        <!-- SEARCH FORM -->
                                        <div class="container-fluid  ">
                                            <div class="card">

                                                <form class="form-inlin" method="GET" action="{{ route('pengunjung.cektiket') }}">
                                                    <div class="input-group input-group-sm ">
                                                        <input class="form-control " type="text" placeholder="Search" name="search" autofocus value="{{ request('search') }}">
                                                        <button class="btn btn-outline-info btn-sm" type="submit">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="card-body">
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                        <br>
                                        <?php
                                        if (isset($_GET['search'])) {
                                            $cari = $_GET['search'];
                                            echo "<b>Hasil pencarian Kode Transaksi : " . $search . "</b>";
                                        }
                                        ?>
                                        <br>
                                        <table class="table table-bordered table-hover text-sm mt-5">
                                            <thead class="table-primary">
                                                <tr style="text-align: center; font-size:11px">
                                                    <th>No</th>
                                                    <th>Verifikasi Hadir</th>
                                                    <th style="width: 70px;">Kode Transaksi</th>
                                                    <th>Nama Wisata</th>
                                                    <th>Jumlah Orang</th>
                                                    <th style="width: 50px;">Total Pembayaran</th>
                                                    <th style="width: 50px;">Tanggal Kunjungan</th>
                                                    <th>Status</th>
                                                    <!-- <th style="width: 150px;">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($_GET['search']))
                                                @foreach($tiket as $tkt)
                                                <tr style="font-size: 10px;">
                                                    <td style="text-align: center;">{{ $loop->iteration}}</td>
                                                    <td style="text-align: center;">
                                                        @if($tkt->kehadiran == 0)
                                                        <a href="{{ route('pesantiket.kehadiran', ['kode_transaksi' => $tkt->kode_transaksi, 'search' => request('search')]) }}" class="btn btn-danger btn-xs" style="font-size: x-small;">Verifikasi</a>
                                                        @else
                                                        <p style="font-size: 12px; color:green; font-weight:bold">Tiket Sudah Digunakan</p>
                                                        @endif

                                                    </td>
                                                    <td style=" text-align:center">{{ $tkt->kode_transaksi }}</td>
                                                    <td>{{ $tkt->datatiket->namawst }}</td>
                                                    <td style="text-align: center;">{{ $tkt->qty }}</td>
                                                    <td style=" text-align:center">{{ formatRupiah($tkt->datatiket->harga*$tkt->qty) }}</td>
                                                    <td>{{ Carbon\Carbon::parse($tkt->tanggal)->format('d-m-Y') }}</td>
                                                    <td style="text-align: center; font-size: 10px;">
                                                        <label class="label {{ ( $tkt->kehadiran == 0) ? 'badge-danger' : 'badge-success' }}">
                                                            {{ ( $tkt-> kehadiran==0) ? 'Belum Masuk' : 'Sudah Masuk' }}
                                                        </label>
                                                    </td>
                                                    <!-- <td style="text-align: center; ">
                                                        {{ $tkt->updated_at }}
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td class="text-center" colspan="9">Belum ada data yang dicari</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Wrapper. Contains page content -->
    </div>


    <!-- Footer -->
    <footer class="main-footer text-center ">
        <p>Copyright &copy 2024 Wisata Kabupaten Pangandaran</p>
    </footer>
    <!-- End Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js ') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
</body>

</html>