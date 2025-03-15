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
                        <h4 class="m-0 text-dark">Kelola Data Maps Tempat Wisata</h4>
                        <br>
                        <br>
                        <div class="text-end mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-header" style="font-size: 14; font-weight:bold">Inputkan Koordinat Maps Tempat Wisata</p>
                                    <br>
                                    <form action="{{ route('alamat.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="datawisata" style="font-size: 12px;">Pilih Tempat Wisata:</label><br>
                                                <select name="datawisataid" class="form-select form-control custom-select custom-select" aria-label="Default select example" id="datawisataid">
                                                    <option value="" selected>-- Pilih tempat Wisata --</option>
                                                    @foreach($wisata as $value)
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="latitude" style="font-size: 12px;">Latitude:</label>
                                                <input type="text" id="latitude" name="latitude" required class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="longitude" style="font-size: 12px;">Longitude:</label>
                                                <input type="text" id="longitude" name="longitude" required class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Simpan Koordinat</button>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                                    <form method="GET" action="{{ route('alamat.index') }}" class="form-inline mb-3">
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
                                <div class="card-body table-responsive">
                                    <table class="table table-hover table-bordered text-sm">
                                        <thead class="table-primary">
                                            <tr style="text-align:center">
                                                <th>No</th>
                                                <th>Nama Tempat Wisata</th>
                                                <th>latitude</th>
                                                <th>longitude</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($koordinat->count() > 0)
                                            @foreach($koordinat as $dm)
                                            <tr>
                                                <th style="text-align: center;">
                                                    @if($koordinat instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $loop->iteration + ($koordinat->currentPage() - 1) * $koordinat->perPage() }}
                                                    @else
                                                    {{ $loop->iteration }}
                                                    @endif
                                                </th>
                                                <td style="font-size: 12px;">{{ $dm->datawst->title }}</td>
                                                <td style="text-align: center;">{{ $dm->latitude }}</td>
                                                <td style="text-align: center;">{{ $dm->longitude }} </td>
                                                <td style="text-align: center;">
                                                    <a href="{{ route('alamat.edit', $dm->id) }}" class=" btn btn-primary btn-sm" style="color: white; font-size:11px">Edit</a>
                                                    <a href="{{ route('alamat.destroy', $dm->id) }}" class=" btn btn-danger btn-sm" style="color: white; font-size:11px">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="5">Data Belum Tersedia</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <div class="float-left" style="font-size: 12px; font-weight:bold">
                                            @if ($pagination)
                                            Showing
                                            {{ $koordinat->firstItem() }}
                                            to
                                            {{ $koordinat->lastItem() }}
                                            of
                                            {{ $koordinat->total() }}
                                            entries
                                        </div>
                                        <div class="float-right">
                                            {!! $koordinat->appends(['perPage' => request('perPage'), 'search' => request('search')])->render() !!}
                                        </div>
                                        @else
                                        Showing all {{ $koordinat->count() }} entries
                                        @endif
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