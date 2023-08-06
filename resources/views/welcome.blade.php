<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Selamat Datang di web PPDB SMK Muhammadiyah Kandanghaur" />
        <meta name="author" content="Nikko Adrian" />
        <title>PPDB SMK MUH KDH</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/welcome/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <header style="background-image: url('assets/welcome/img/bg.png');" class="masthead">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Penerimaan Peserta Didik Baru ( PPDB )</h5>
                                <h1 class="display-3 text-white animated slideInDown">SMK Muhammadiyah Kandanghaur</h1>
                                <p class="fs-5 text-white mb-4 pb-2">SMK Muhammadiyah Kandanghaur adalah sekolah PK ( Pusat Keunggulan ) yang
                                    beralamatkan di JL Raya Karanganyar No 28/A Kandanghaur Indramayu</p>
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Sudah Daftar</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn btn-light py-md-3 px-md-5">Daftar Baru</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/welcome/js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

