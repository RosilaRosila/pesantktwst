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

    <title>INVOICE - {{ $pesanan_detail->kode_transaksi }}</title>

    <style>
        .table {
            width: 100%;
        }

        .table th,
        .table td {
            padding: 4px;
            /* Reduce padding to fit content */
            font-size: 10px;
            /* Adjust font size to fit within the page */
        }

        .content {
            margin-bottom: 10px;
            /* Reduce margin for smaller paper size */
        }

        /* .page-content {
            padding: 10px;
            Adjust page padding 
        }

        */
    </style>

</head>

<body>

    <div class="page-content container">


        <div class="page-header text-dark">
            <a class="navbar-brand" style="font-size: 15px; ">
                <img src="{{ $pic }}" height="30" class="d-inline-block align-top">
                <span class="page-info" style="font-size: 15px; font-weight:bold; color:black">
                    Tiket Wisata Pangandaran
                </span>
            </a>
        </div>
        <hr />


        <div>
            <div class="content">
                <p style="font-size: 11px; font-weight: bold;">Tanggal Kunjungan: {{ Carbon\Carbon::parse($pesanan_detail->tanggal)->format('d-m-Y') }}</p>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Tempat Kunjungan</td>
                        <th>:</th>
                        <td>{{$pesanan_detail->datatiket->namawst}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Wisatawan</td>
                        <th>:</th>
                        <td style="text-transform: capitalize;">{{ $pesanan_detail->wisatawan }}</td>
                    </tr>
                    <tr>
                        <td>Harga Tiket Perorang</td>
                        <th>:</th>
                        <td>{{ formatRupiah($pesanan_detail->datatiket->harga) }} /orang</td>
                    </tr>

                    <tr>
                        <td>Jumlah Orang</td>
                        <th>:</th>
                        <td>{{$pesanan_detail->qty}}</td>
                    </tr>
                </tbody>
            </table>

        </div>

        <!-- <div class="row">
            <div class="col-sm-8 text-grey-m2 mt-2">
                <div class="form-group">
                    <label class="form-label">Tempat Wisata Tujuan</label>
                    <input type="text" class="form-control" style="font-size: 12px; border: none; border-bottom: 1px solid #ccc;" value="{{ $pesanan_detail->datatiket->namawst }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Wisatawan</label>
                    <input type="text" class="form-control" style="font-size: 12px; border: none; border-bottom: 1px solid #ccc;" value="{{ $pesanan_detail->wisatawan  }}">
                </div>
            </div>

            <div class="col-sm-4 text-grey-m2 mt-2">
                <div class="form-group">
                    <label class="form-label">Harga Tiket Perorang</label>
                    <input type="text" class="form-control" style="font-size: 12px; border: none; border-bottom: 1px solid #ccc;" value="{{ formatRupiah($pesanan_detail->datatiket->harga) }} /orang }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Jumlah Orang</label>
                    <input type="text" class="form-control" style="font-size: 12px; border: none; border-bottom: 1px solid #ccc;" value="{{ $pesanan_detail->qty }}">
                </div>
            </div>

            <div class="col-sm-6">

                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tempat Wisata yang Dikunjungi : </span> {{ $pesanan_detail->datatiket->namawst }}</div>
                    <div class="my-2" style="text-transform: capitalize;"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Kategori Wisatawan : </span> {{ $pesanan_detail->wisatawan }}</div>

                </div>

           
        </div> -->


        <div class="row mt-3">
            <div class="col-sm-6">
                <div class="text-grey-m2">
                    <div class="my-2"><span class="text-600 text-90"><span class="text-secondary-d1 text-85" style="margin:auto; font-size:8px">{!! DNS1D::getBarcodeHTML("$pesanan_detail->kode_transaksi", 'CODABAR',2,25) !!}</span>
                            <p style="font-size: 12px;">{{ $pesanan_detail->kode_transaksi }}</p>
                    </div>

                </div>
            </div>

            <div class="text-85 col-sm-6 align-self-start d-sm-flex justify-content-end">
                <hr />
                <div class="text-grey-m2">
                    <div class="my-2" style="font-size: 12px; font-weight:bold"><span class="text-600 text-80">Total Pembayaran:</span>{{ formatRupiah($pesanan_detail->datatiket->harga*$pesanan_detail->qty) }}</div>
                </div>
            </div>
        </div>
        <!-- /.col -->


        <hr />

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