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
                        <h4 class="m-0 text-dark">Kelola Laporan Pengunjung</h4>
                        <br>
                        <br>

                        <section class="content">
                            <div class="card">
                                <!-- <div class="card-header">
                                    
                                </div> -->
                                <div class="card-body table-responsive">
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-header text-bold" style="font-size: 12px;">Print Laporan Berdasarkan Kategori Wisatawan, Tiket dan Tanggal</p>
                                                    <br>
                                                    <form action="{{ route('print_lpengunjung') }}" method="GET">
                                                        <div>
                                                            <label for="wisatawan" style="font-size: 12px;">Kategori Wisatawan</label>
                                                            <select name="wisatawan" class="col-sm-12 form-select form-control custom-select" id="wisatawan">
                                                                <option value="" selected>Pilih Kategori Wisatawan</option>
                                                                @foreach($wisatawan as $value => $text)
                                                                <option value="{{ $value }}">{{ $text }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mt-4">
                                                            <label for="category" style="font-size: 12px;">Kategori Tiket : </label><br>
                                                            <select name="datatiketid" id="datatiketid" class="col-sm-12 form-select form-control custom-select">
                                                                <option value="" selected> -- Pilih Kategori Tiket Wisata --</option>
                                                                @foreach ($data_tiket as $category)
                                                                <option value="{{ $category->id }}">{{ $category->namawst }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col-sm-6" style="font-size: 12px;">
                                                                <label for="start_date" style="font-size: 12px;">Start Date:</label><br>
                                                                <input type="date" name="start_date" id="start_date" required class="form-control">
                                                            </div>
                                                            <div class="col-sm-6" style="font-size: 12px;">
                                                                <label for="end_date">End Date:</label><br>
                                                                <input type="date" name="end_date" id="end_date" required class="form-control">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-info mt-5"> <i class="mr-1 fa fa-print"></i>&nbsp Print Laporan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ROW -->
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-header text-bold" style="font-size: 12px;">Print Laporan Berdasarkan Kategoti wisatawan dan Tanggal</p>
                                                    <br>
                                                    <form action="{{ route('print_lpengunjung_tanggal') }}" method="GET">
                                                        <div>
                                                            <label for="wisatawan" style="font-size: 12px;">Kategori Wisatawan</label>
                                                            <select name="wisatawan" class="form-select form-control custom-select" id="wisatawan">
                                                                <option value="" selected>Pilih Kategori Wisatawan</option>
                                                                @foreach($wisatawan as $value => $text)
                                                                <option value="{{ $value }}">{{ $text }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <div class="w-250 mt-3">
                                                                <label for="start_date" style="font-size: 12px;">Start Date:</label><br>
                                                                <input type="date" name="start_date" id="start_date" required class="form-control">
                                                            </div>
                                                            <div class="w-250 mt-3">
                                                                <label for="end_date" style="font-size: 12px;">End Date:</label><br>
                                                                <input type="date" name="end_date" id="end_date" required class="form-control">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-warning mt-5" style="color: white;"> <i class="mr-1 fa fa-print"></i>&nbsp Print Laporan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <form method="GET" action="{{ route('pengunjung_laporan') }}" class="form-inline mb-3">
                                                <label for="perPage" class="mr-2" style="font-size: 12px;">Show </label>
                                                <select name="perPage" id="perPage" class="custom-select custom-select-sm form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                                                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
                                                    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                                                    <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>all</option>
                                                </select>
                                                <span style="font-size: 12px; font-weight:bold"> &nbsp entries</span>
                                            </form>
                                        </div>
                                        <div class="col-sm-4">
                                            <p style="font-size: 14px;" class="card-header"><b>Jumlah Pendapatan : {{ formatRupiah($jumlah_pendapatan) }}</b></p>
                                        </div>
                                    </div>
                                    <br>
                                    <table class="table table-hover table-bordered text-sm">
                                        <thead class="table-primary">
                                            <tr style="text-align:center">
                                                <th>No</th>
                                                <th>Nama Wisata</th>
                                                <th>Wisatawan</th>
                                                <th>Tanggal Kunjungan</th>
                                                <th>Jumlah Pengunjung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($pendapatantiket->count() > 0)
                                            @foreach($pendapatantiket as $fs)
                                            <tr>
                                                <th style="text-align: center;">
                                                    @if($pendapatantiket instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $loop->iteration + ($pendapatantiket->currentPage() - 1) * $pendapatantiket->perPage() }}
                                                    @else
                                                    {{ $loop->iteration }}
                                                    @endif
                                                </th>
                                                <td>{{ $fs->datatiket->namawst }}</td>
                                                <td style="text-align:center;">{{ $fs->wisatawan }}</td>
                                                <td style="text-align:center;">{{ Carbon\Carbon::parse($fs->tanggal)->format('d-m-Y') }}</td>
                                                <td style="text-align: center;">{{ $fs->qty }}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="5">Data Belum Tersedia</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="text-right text-bold" colspan="4">Total Pengunjung</td>
                                                <td class="text-center text-bold">{{ $jumlah_pengunjung }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <div class="float-left" style="font-size: 12px; font-weight:bold">
                                            @if ($pagination)
                                            Showing
                                            {{ $pendapatantiket->firstItem() }}
                                            to
                                            {{ $pendapatantiket->lastItem() }}
                                            of
                                            {{ $pendapatantiket->total() }}
                                            entries
                                        </div>
                                        <div class="float-right">
                                            {!! $pendapatantiket->appends(['perPage' => request('perPage'), 'search' => request('search')])->render() !!}
                                        </div>
                                        @else
                                        Showing all {{ $pendapatantiket->count() }} entries
                                        @endif
                                    </div>
                                    <br>
                                    <br>
                                    <br>
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