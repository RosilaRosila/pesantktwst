<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/halaman-pengunjung/dashboard-home.css">

    <!-- Link Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/logokp.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>ERRORS</title>
</head>

<body>
    <br>
    <br>
    <div class="card mt-5" style="width: 70%; margin:0 auto">
        <div class="card-header" style="font-weight: bold;">
            ERRORS
        </div>
        <div class="card-body">
            <div class="alert alert-danger">
                {{ $exception }}
            </div>
        </div>
    </div>


</body>

</html>