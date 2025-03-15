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
                        <h4 class="m-0 text-dark">Kelola Data Wisata</h4>
                        <br>
                        <br>
                        <div class="text-end mb-5">
                            @can('wisata-create')
                            <a class="btn btn-primary" href="{{ route('datawisata.create') }}">
                                <i class=" nav-icon fas fa-plus-circle"></i>&nbsp Tambah Data Wisata
                            </a>
                            @endcan
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
                                    <div class="container-fluid ">
                                        <form class="form-inline ml-3 float-right" method="get">
                                            <div class="input-group input-group-sm ">
                                                <input class="form-control me-2 " type="text" placeholder="Search" name="search" autofocus value="{{ request('search') }}">
                                                <button class="btn btn-outline-info btn-sm" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Dropdown untuk memilih jumlah entri yang ditampilkan -->
                                    <form method="GET" action="{{ route('datawisata.index') }}" class="form-inline mb-3">
                                        <label for="perPage" class="mr-2" style="font-size: 12px;">Show </label>
                                        <select name="perPage" id="perPage" class="custom-select custom-select-sm form-control form-control-sm" onchange="this.form.submit()">
                                            <option value="2" {{ request('perPage') == 2 ? 'selected' : '' }}>2</option>
                                            <option value="4" {{ request('perPage') == 4 ? 'selected' : '' }}>4</option>
                                            <option value="8" {{ request('perPage') == 8 ? 'selected' : '' }}>8</option>
                                            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                            <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>all</option>
                                        </select>
                                        <span style="font-size: 12px; font-weight:bold"> &nbsp entries</span>
                                    </form>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover table-bordered text-sm">
                                        <thead class="table-primary">
                                            <tr style="text-align: center;">
                                                <th style="font-size: 12px;">No</th>
                                                <th style="font-size: 12px;">Nama Wisata</th>
                                                <th style="font-size: 12px; ">Image</th>
                                                <th style="font-size: 12px; width:150px">Deskripsi</th>
                                                <th style="font-size: 12px; width:30px">Alamat</th>
                                                <th style="font-size: 12px; width:210px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($datawisatas->count() > 0)
                                            @foreach($datawisatas as $dwisata)
                                            <tr>
                                                <th style="font-size: 12px; text-align:center">
                                                    @if($datawisatas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $loop->iteration + ($datawisatas->currentPage() - 1) * $datawisatas->perPage() }}
                                                    @else
                                                    {{ $loop->iteration }}
                                                    @endif
                                                </th>
                                                <td style="font-size: 12px;">{{ $dwisata->title }}</td>
                                                <td style="text-align: center;">
                                                    <img src="{{ asset($dwisata->image) }}" alt="" height="80px">
                                                </td>
                                                <td style="font-size: 8px;">{{ $dwisata->deskripsi }}</td>
                                                <td style="font-size: 8px;">{{ $dwisata->alamat }}</td>
                                                <td style="text-align: center">
                                                    @can('wisata-show')
                                                    <a href="{{ route('datawisata.show', $dwisata->id) }}" class="btn btn-info btn-sm" style="font-size:9px">Show</a>
                                                    @endcan

                                                    @can('wisata-edit')
                                                    <a href="{{ route('datawisata.edit', $dwisata->id) }}" class=" btn btn-primary btn-sm" style="font-size:9px; color:white">Edit</a>
                                                    @endcan

                                                    @can('wisata-delete')
                                                    <a href="{{ route('datawisata.destroy', $dwisata->id) }}" class="btn btn-danger btn-sm" style="font-size:9px">Delete</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="7">Data Belum Tersedia</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <div class="float-left" style="font-size: 12px; font-weight:bold">
                                            @if ($pagination)
                                            Showing
                                            {{ $datawisatas->firstItem() }}
                                            to
                                            {{ $datawisatas->lastItem() }}
                                            of
                                            {{ $datawisatas->total() }}
                                            entries
                                        </div>
                                        <div class="float-right">
                                            {!! $datawisatas->appends(['perPage' => request('perPage'), 'search' => request('search')])->render() !!}
                                        </div>
                                        @else
                                        Showing all {{ $datawisatas->count() }} entries
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