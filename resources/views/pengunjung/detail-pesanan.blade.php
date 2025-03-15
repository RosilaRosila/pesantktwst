<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/halaman-pengunjung/detail-pesanan.css">

    <!-- Link Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/logokp.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/') }}fontawesome/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <title>{{ $title }}</title>
</head>

<body>

    <div class="card-body">
        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        {{ $detail_pesanan->kode_transaksi }}
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <a class="btn bg-white btn-light mx-1px text-95" href="{{ route('pengunjung_print_code', $detail_pesanan->kode_transaksi) }}" data-title="Print" target="_blank">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            &nbsp Cetak Tiket Wisata
                        </a>
                        <!-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print Barcode
                    </a> -->
                        <!-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Print PDF
                    </a> -->
                    </div>
                </div>
            </div>

            <div class="container px-0" style="font-size: 12px;">
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <img src="{{ asset('/') }}images/logokp.png" height="30">
                                    <span class="text-default-d3">Wisata Pangandaran</span>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle">{{ $detail_pesanan->name }}</span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"> &nbsp {{ $detail_pesanan->nohp }}</b></div>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status Pembayaran:</span> <span class="badge badge-warning badge-pill px-25"><label class="label {{ ( $detail_pesanan->status == 0) ? 'text-danger' : 'text-success' }}">
                                                {{ ( $detail_pesanan-> status==0) ? 'Unpaid' : 'Paid' }}
                                            </label> {{ $detail_pesanan->status}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Pemesanan:</span> {{ Carbon\Carbon::parse($detail_pesanan->created_at)->format('d-m-Y ') }}</div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Kunjungan:</span> {{ Carbon\Carbon::parse($detail_pesanan->tanggal)->format('d-m-Y ') }}</div>


                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4" style="font-size: 10px;">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">Nama Wisata</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Harga</div>
                                <div class="d-none d-sm-block col-sm-2 text-center">Jumlah Orang</div>
                                <div class="col-2">Total</div>
                            </div>

                            <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">1</div>
                                    <div class="col-9 col-sm-5">{{ $detail_pesanan->datatiket->namawst }}</div>
                                    <div class="d-none d-sm-block col-2">{{ formatRupiah($detail_pesanan->datatiket->harga) }}</div>
                                    <div class="d-none d-sm-block col-2 text-95 text-center">{{ $detail_pesanan->qty }}</div>
                                    <div class="col-2 text-secondary-d2" style="font-size: 10px;">{{ formatRupiah($detail_pesanan->datatiket->harga*$detail_pesanan->qty ) }}</div>
                                </div>
                            </div>

                            <div class="row border-b-2 brc-default-l2"></div>


                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last" style="font-size: 12px;">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">{{ formatRupiah( $detail_pesanan->datatiket->harga*$detail_pesanan->qty) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <br>
                            <div>
                                <a class="btn btn-warning " href="{{ route('pengunjung_daftarriwayat') }}" style="color: white;">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>

</html>