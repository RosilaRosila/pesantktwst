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

    <style>
        .icon-unread {
            color: grey;
            cursor: pointer;
        }

        .icon-read {
            color: gold;
        }

        .mark-as-read {
            text-decoration: none;
            color: inherit;
        }

        .text-link:hover {
            color: blue !important;
        }

        /* .scrollable-container {
            max-height: 50px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #888 #f5f5f5;
        }

        
        .scrollable-container::-webkit-scrollbar {
            width: 8px;
        }

        .scrollable-container::-webkit-scrollbar-track {
            background-color: #f5f5f5;
        }

        .scrollable-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        } */
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- Navbar -->
        @include('layout-admin.navbar')
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
                        <h4 class="m-0 text-dark">Kelola Data Pesan Tiket Pengunjung</h4>
                        <br>
                        <br>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif


                        <section class="content">
                            <div class="card">
                                <div class="card-header">
                                    <!-- SEARCH FORM -->
                                    <div class="container-fluid  ">
                                        <form class="form-inline ml-3 float-right" method="GET">
                                            <div class="input-group input-group-sm ">
                                                <input class="form-control me-2 " type="text" placeholder="Search" name="search" autofocus value="{{ request('search') }}">
                                                <button class="btn btn-outline-info btn-sm" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Dropdown untuk memilih jumlah entri yang ditampilkan -->
                                    <form method="GET" action="{{ route('pesantiket.index') }}" class="form-inline mb-3">
                                        <label for="perPage" class="mr-2" style="font-size: 12px;">Show </label>
                                        <select name="perPage" id="perPage" class="custom-select custom-select-sm form-control form-control-sm" onchange="this.form.submit()">
                                            <option value="3" {{ request('perPage') == 3 ? 'selected' : '' }}>3</option>
                                            <option value="6" {{ request('perPage') == 6 ? 'selected' : '' }}>6</option>
                                            <option value="12" {{ request('perPage') == 12 ? 'selected' : '' }}>12</option>
                                            <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>all</option>
                                        </select>
                                        <span style="font-size: 12px; font-weight:bold"> &nbsp entries</span>
                                    </form>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover text-sm">
                                        <thead class="table-primary">
                                            <tr style="text-align: center; font-size:11px">
                                                <th>No</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama</th>
                                                <th style="width: 120px;">No Hp</th>
                                                <th>Nama Wisata</th>
                                                <th>Jumlah Orang</th>
                                                <th>Total Pembayaran</th>
                                                <th>Tanggal Kunjungan</th>
                                                <th>Status Pembayaran</th>
                                                <th>Tanggal Pemesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($tiket->count() > 0)
                                            @foreach($tiket as $tkt)
                                            <tr style="font-size: 10px;">
                                                <td style="text-align: center;">
                                                    @if($tiket instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $loop->iteration + ($tiket->currentPage() - 1) * $tiket->perPage() }}
                                                    @else
                                                    {{ $loop->iteration }}
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $tkt->kode_transaksi }}</td>
                                                <td>{{$tkt->name }}</td>
                                                <td style="text-align: center;">
                                                    <a href="https://wa.me/{{ ltrim($tkt->nohp, '+') }}" target="_blank">
                                                        <i class='fas fa-phone-square-alt mr-1'></i>{{ $tkt->nohp }}
                                                    </a>
                                                </td>
                                                <td>{{ $tkt->datatiket->namawst }}</td>
                                                <td style="text-align: center;">{{ $tkt->qty }}</td>
                                                <td style="text-align: center;">{{ formatRupiah($tkt->totalharga) }}</td>
                                                <td style="text-align: center;">{{$tkt->tanggal }}</td>
                                                <td style="text-align: center; font-size: 10px;">
                                                    <label class="badge {{ ( $tkt->status == 'Unpaid') ? 'badge-danger' : 'badge-success' }}">
                                                        {{ ( $tkt-> status=='Unpaid') ? 'Unpaid' : 'Paid' }}
                                                    </label>
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ Carbon\Carbon::parse($tkt->created_at)->format('d-m-Y ') }}<br />
                                                    <i class="far fa-clock mr-1" style="font-size: 8px;"></i><span style="font-size: 8px;">{{ $tkt->created_at->diffForHumans() }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="10">Data Riwayat Pesanan Belum Tersedia</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <div class="float-left" style="font-size: 12px; font-weight:bold">
                                            @if ($pagination)
                                            Showing
                                            {{ $tiket->firstItem() }}
                                            to
                                            {{ $tiket->lastItem() }}
                                            of
                                            {{ $tiket->total() }}
                                            entries
                                        </div>
                                        <div class="float-right">
                                            {!! $tiket->appends(['perPage' => request('perPage'), 'search' => request('search')])->render() !!}
                                        </div>
                                        @else
                                        Showing all {{ $tiket->count() }} entries
                                        @endif
                                    </div>
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