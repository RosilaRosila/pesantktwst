<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/halaman-admin/halaman-user.css">

    <!-- Link Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/logokp.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>AUTHENTICATION | HALAMAN ADMIN</title>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #5f9ea0;">
        <a class="navbar-brand" href="http://127.0.0.1:8000/" style="font-size: 3vh; ">
            <img src="{{ asset('/') }}images/logokp.png" width="40" height="40" class="d-inline-block align-top" alt="">
            <span style="font-size: 2.5vh; font-weight:bold;">WISATA KABUPATEN PANGANDARAN</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('login') }}" style="font-weight: bold;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('register') }}" style="font-weight: bold;">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="gambar" style="background-image: url( {{ asset('images/pnd.png') }} )">
        <h4>Selamat Datang Di Website Halaman Admin</h4>
    </section>



    <!-- ------ FOOTER ------ -->
    <footer class="footer">
        <p>Copyright &copy 2024 Wisata Kabupaten Pangandaran</p>
    </footer>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->


</body>

</html>