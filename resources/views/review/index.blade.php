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
        .checked {
            color: orange;
        }

        .star-rating {
            display: inline-block;
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
                        <h4 class="m-0 text-dark">Kelola Data Ulasan Pengunjung</h4>
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
                                    <form method="GET" action="{{ route('review.show') }}" class="form-inline mb-3">
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
                                    <table class="table table-hover table-bordered text-sm">
                                        <thead class="table-primary" style="font-size: 12px;">
                                            <tr style="text-align:center; font-size: 12px;">
                                                <th>No</th>
                                                <th>Cek Status</th>
                                                <th>Nama Tempat Wisata</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th style="width: 100px;">Rating</th>
                                                <th>Review</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 10px;">
                                            @if($review->count() > 0)
                                            @foreach($review as $rw)
                                            <tr style="font-size: 10px;">
                                                <th style="text-align: center;">
                                                    @if($review instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $loop->iteration + ($review->currentPage() - 1) * $review->perPage() }}
                                                    @else
                                                    {{ $loop->iteration }}
                                                    @endif
                                                </th>
                                                <td style="text-align: center;">
                                                    @if($rw->status == 1)
                                                    <a href="{{ route('review.status', $rw->id) }}" class="btn btn-success btn-xs" style="font-size: 5px;">Tampilkan</a>
                                                    @else
                                                    <a href="{{ route('review.status', $rw->id) }}" class="btn btn-danger btn-xs" style="font-size:5px;">Disable</a>
                                                    @endif
                                                </td>
                                                <td style="font-size: 12px;">{{ $rw->datawist->title }}</td>
                                                <td style="font-size: 12px;">{{ $rw->name }}</td>
                                                <td style="font-size: 12px;">{{ $rw->email }}</td>
                                                <td style="text-align: center;">
                                                    @for ($i = 0; $i < $rw->rating; $i++)
                                                        <span class="fa fa-star checked" style="font-size: 9px;"></span>
                                                        @endfor
                                                        @for ($i = $rw->rating; $i < 5; $i++) <span class="fa fa-star" style="font-size: 9px;"></span>
                                                            @endfor
                                                </td>
                                                <td style="font-size: 12px;">{{ $rw->review }}</td>
                                                <td style="font-size: 12px; text-align:center">
                                                    <label class="badge {{ ( $rw->status == 0) ?  'badge-success' :  'badge-danger' }}">
                                                        {{ ( $rw->status == 0) ? 'Di Tampilkan' : 'Disable' }}
                                                    </label>
                                                </td>
                                                <td style="text-align: center;">
                                                    <!-- @can('ulasan-delete')
                                                    <a href="{{ route('review.destroy', $rw->id) }}" class="btn btn-danger btn-sm" style="font-size:11px">Delete</a>
                                                    @endcan -->
                                                    <p style="font-size: 8px;" class="wkt mt-3">{{ $rw->created_at->diffForHumans() }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="9">Data Belum Tersedia</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <div class="float-left" style="font-size: 12px; font-weight:bold">
                                            @if ($pagination)
                                            Showing
                                            {{$review->firstItem() }}
                                            to
                                            {{$review->lastItem() }}
                                            of
                                            {{ $review->total() }}
                                            entries
                                        </div>
                                        <div class="float-right">
                                            {!! $review->appends(['perPage' => request('perPage'), 'search' => request('search')])->render() !!}
                                        </div>
                                        @else
                                        Showing all {{ $review->count() }} entries
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