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

    <title>LAPORAN PENDAPATAN</title>

    <style>
        /* CSS untuk gaya umum */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            /* text-align: left; */
        }

        th {
            background-color: #f2f2f2;
        }

        /* CSS untuk media cetak */
        @media print {
            @page {
                size: A4;
                /* Anda dapat mengganti ukuran kertas, misalnya A3, Letter, dll. */
                margin: 5mm;
                /* Atur margin halaman cetak */
            }

            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
                /* Untuk memastikan warna latar belakang dicetak */
            }

            .no-print {
                display: none;
                /* Menyembunyikan elemen dengan kelas 'no-print' saat dicetak */
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            th,
            td {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <br>
        <button onclick="window.print()" class="no-print btn btn-danger"><i class="mr-1 fa fa-print"></i>&nbsp Cetak Laporan</button>
        <br>
        <div class="navbar-brand text-blue-d2">
            <div class=" table text-center">
                <tr>
                    <td width=" 25" align="center">
                        <img src="{{ $pic }}" height="60px" class="d-inline-block align-top mb-4">
                    </td>
                    <td width="75" align="center">
                        <p><b>LAPORAN PENDAPATAN</b></p>
                        <P><b>WISATA KABUPATEN PANGANDARAN</b></P>
                    </td>
                </tr>
            </div>
        </div>
        <hr style="height: 2px; color:black" noshade>
        <hr style="height: 2px; color:black" noshade>
        <br>
        <br>
        <div>
            <div class="container">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Data Tidak Tersedia</h4>
                    <p>Tidak ada data yang ditemukan untuk rentang tanggal yang dipilih: {{ Carbon\Carbon::parse($startDate)->format('d-m-Y') }} to {{ Carbon\Carbon::parse($endDate)->format('d-m-Y') }}.</p>
                    <hr>
                    <p class="mb-0">Silakan coba memilih rentang tanggal atau kategori lain.</p>
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