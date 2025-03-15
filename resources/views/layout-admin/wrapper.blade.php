<!-- Content Wrapper. Contains page content -->
<br>
<br>
<br>
<div class="content-wrapper mt-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">

        <!-- Main content -->


        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <br>
                    <h1 class="m-0 text-dark">Dashboard Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6"></div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ------------ BOX TOTAL PENDAPATAN -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p style="font-size: small;">Total Pendapatan</p>
                            <h5>{{ formatRupiah($jumlah_pendapatan) }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_pendapatan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
                <!-- ./col -->

                <!-- ------------ BOX JUMLAH PENGUNJUNG -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p style="font-size: small;">Jumlah Pengunjung</p>
                            <h5>{{ $jumlah_pengunjung }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_pengunjung') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
                <!-- ./col -->

                <!-- ------------ BOX TOTAL WISATAWAN DOMESTIK -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <p style="font-size: small;">Total Wisatawan Domestik</p>
                            <h5>{{ $jumlah_wisatadomestik }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_domestik') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>

                <!-- ------------ BOX TOTAL WISATAWAN MANCANEGARA -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p style="font-size: small;">Total Wisatawan Mancanegara</p>
                            <h5>{{ $jumlah_wisatamanca  }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_mancanegara') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>

                <!-- ------------ BOX jUMLAH PESANAN TIKET -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p style="font-size: small;">Jumlah Pesan Tiket</p>
                            <h5>{{ $jumlah_pesanan }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_detailpesan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
                <!-- ./col -->

                <!-- ------------ BOX BELUM KONFIRMASI KEHADIRAN TIKET-------------- -->
                <!-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner mb-3">
                            <table style="font-size: small; height:70px">
                                <tr style="font-size: 10px;">
                                    <td>Jumlah Tiket Masuk</td>
                                    <td style="width: 10px;"></td>
                                    <td>Jumlah Tiket Belum Masuk</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>{{ $jumlah_kehadiran }} </h5>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h5>{{ $jumlah_unkehadiran }} </h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_unkonfirhadir') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div> -->

                <!-- ------------ BOX KONFIRMASI PESAN TIKET -------------- -->
                @can('pesantiket-list')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p style="font-size:small">Jumlah Tiket Belum Bayar</p>
                            <h5>{{ $jumlah_unkonfirmasi }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('admin_unkonfirbayar') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
                @endcan





                <!-- ------------ BOX TOTAL SUBSCRIBE -------------- -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p style="font-size: small;">Total Subscribe Pengunjung</p>
                            <h5>{{ $jumlah_subscribe }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        @can('wrapper-list')
                        <a href="{{ route('datapengunjung.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <br>
            <br>
            <br>

            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line mr-1"></i>
                                Grafik Pemesanan Tiket
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="highchart" style="position: relative; height: 300px;">
                                    <canvas id="highchart" height="300" style="height: 300px;"></canvas>
                                </div>
                                <b>Total Pendapatan : {{ formatRupiah($jumlah_pendapatan) }}</b>
                            </div>
                        </div><!-- /.card-body -->
                    </div>


                    <!-- Custom tabs (Charts with tabs BAR CHART)-->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title" style="font-size: 14px;">
                                <i class="fas fa-user-plus mr-1"></i>
                                Data Akun Pengunjung Terakhir
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-bordered text-sm">
                                <thead class="table-primary">
                                    <tr style="text-align:center; font-size:smaller">
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($akun_pengunjung)
                                    <tr style="font-size: smaller;">
                                        <td>{{ $akun_pengunjung->name }}</td>
                                        <td>{{ $akun_pengunjung->email }}</td>
                                        <td style="text-align: center;">
                                            {{ $akun_pengunjung->created_at->format('d-m-Y' ) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ $akun_pengunjung->created_at->diffForHumans() }}</p>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="6">Data Belum Tersedia</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Custom tabs CARD DATA PESAN tIKET WISATA TERAKHIR-->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-list-ul mr-1"></i>
                                Data Pesan Tiket Terakhir
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <br>
                            <table class="table table-bordered table-hover text-sm">
                                <thead class="table-primary">
                                    <tr style="text-align: center; font-size:10px">
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama</th>
                                        <th>No Handphone</th>
                                        <th>Nama Wisata</th>
                                        <th>Jumlah Orang</th>
                                        <th>Wisatawan</th>
                                        <th>Total Pembayaran</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Status Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($latesttiket->isEmpty())
                                    <tr>
                                        <td class="text-center" colspan="8">
                                            Data Riwayat Pesanan Belum Tersedia
                                        </td>
                                    </tr>
                                    @else
                                    @foreach($latesttiket as $tkt)
                                    <tr style="font-size: 8px;">
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;"> {{ $tkt->kode_transaksi }}</td>
                                        <td>{{$tkt->name }}</td>
                                        <td>{{$tkt->nohp }}</td>
                                        <td>{{ $tkt->datatiket->namawst }}</td>
                                        <td style="text-align: center;">{{ $tkt->qty }}</td>
                                        <td style="text-align: center;">{{ $tkt->wisatawan }}</td>
                                        <td style="text-align: center;">{{ formatRupiah($tkt->totalharga) }}</td>
                                        <td style="text-align: center;">{{$tkt->tanggal }}</td>
                                        <td style="text-align: center; font-size: 10px;">
                                            <label class="badge {{ ( $tkt->status == 'Unpaid') ? 'badge-danger' : 'badge-success' }}">
                                                {{ ( $tkt-> status=='Unpaid') ? 'Unpaid' : 'Paid' }}
                                            </label>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1" style="font-size: 8px;"></i><span style="font-size: 8px;">{{ $tkt->created_at->diffForHumans() }}</span></p>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->


                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- CARD PIE CHART -->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title" style="font-size: 14px;">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Grafik Jumlah Pengunjung Per Tempat Wisata
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas class="chart" id="piechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <br>
                            <b>Jumlah Pengunjung : {{ $jumlah_pengunjung }}</b>
                        </div>
                    </div>

                    <!-- CARD CHART PENGUNJUNG WISATAWAN -->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title" style="font-size: 14px;">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Grafik Jumlah Wisatawan
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas class="chart" id="barchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <br>
                            <b>Jumlah Pengunjung : {{ $jumlah_pengunjung }}</b>
                        </div>
                    </div>

                    <!-- CARD CHART REVIEW PENGUNJUNG  -->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title" style="font-size: 14px;">
                                <i class="fas fa-pen mr-1"></i>
                                Data Review Pengunjung Terakhir
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-light btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-bordered text-sm">
                                <thead class="table-primary">
                                    <tr style="text-align:center; font-size:9px">
                                        <th>Nama</th>
                                        <th>Nama Tempat Wisata</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($datareview->isNotEmpty())
                                    @foreach($datareview as $review)
                                    <tr style="font-size: 8px;">
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->datawist->title }}</td>
                                        <td>
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <span class="fa fa-star checked" style="font-size: 3px;"></span>
                                                @endfor
                                                @for ($i = $review->rating; $i < 5; $i++)
                                                    <span class="fa fa-star" style="font-size: 3px;"></span>
                                                    @endfor
                                        </td>
                                        <td>{{ $review->review }}</td>
                                        <td style="text-align: center;">
                                            <i class="far fa-clock mr-1"></i>{{ $review->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="6">Data Belum Tersedia</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>




                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
        </div><!-- /.container-fluid -->
        <br>
    </section>
    <!-- /.content -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js') }}"></script>

    <!-- JAVA SCRIPT LINE CHART -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('highchart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik Pendapatan Pesanan Tiket'

                },
                xAxis: {
                    categories: @json($vlabels),
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Pendapatan'
                    }
                },
                series: [{
                    name: 'Bulan',
                    data: @json($vtotals),
                }]
            });
        });
    </script>

    <!-- JAVA SCRIPT PIE CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('piechart').getContext('2d');
            var totalData = @json($totals).reduce((a, b) => a + b, 0);
            var chart = new Chart(ctx, {
                // plugins: [ChartDataLabels]
                type: 'pie',
                data: {
                    labels: @json($labels), // Nama Wisata
                    datasets: [{
                        label: 'Jumlah Produk',
                        data: @json($totals), // Data jumlah produk
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', //Pink
                            'rgba(235, 127, 54, 0.2)',
                            'rgba(191, 255, 166, 0.2)', // Hijau
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(191, 166, 255, 0.2)', // Violet
                            'rgba(255, 242, 166, 0.2)', // Skin 162, 162, 162
                            'rgba(162, 162, 162, 0.2)' // Grey
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', //Pink
                            'rgba(235, 127, 54, 1)',
                            'rgba(191, 255, 166, 1)', // Hijau
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(191, 166, 255, 1)', // Violet
                            'rgba(255, 242, 166, 1)', // Skin 162, 162, 162
                            'rgba(162, 162, 162, 1)' // Grey
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        },
                        datalabels: {
                            formatter: (value, context) => {
                                let percentage = (value / totalData * 100).toFixed(2) + '%';
                                return value + ' (' + percentage + ')';
                            },
                            color: '#fff',
                        },
                    }
                },
            });
            plugins: [ChartDataLabels]
        });
    </script>


    <!-- JAVA SCRIPT BAR CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('barchart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($xlabels), // Labels dari kategori
                    datasets: [{
                        label: 'Jumlah pengunjung',
                        data: @json($xtotals), // Data jumlah produk terjual
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(235, 127, 54, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(235, 127, 54, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Kategori'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Terjual'
                            },
                            ticks: {
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : null;
                                },
                                stepSize: 1
                            },
                        }
                    }
                }
            });
        });
    </script>

</div>


<!-- /.content-wrapper -->