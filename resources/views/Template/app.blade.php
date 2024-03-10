<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRK & FED</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-nav-utama">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-5">
                    <a href="#" class="list-group-item bg-abu list-group-item-action py-2 ripple mt-5"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Profil</span>
                    </a>

                    <div class="dropend">
                        <a type="button" class="list-group-item list-group-item-action py-2 ripple active"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-caret-right-fill me-2"></i>Rencana Kerja
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="list-group-item list-group-item-action py-2 ripple active">
                                    <span>Rekap Kegiatan</span>
                                </a></li>
                        </ul>
                    </div>

                    <div class="dropend">
                        <a type="button" class="list-group-item list-group-item-action py-2 ripple"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-caret-right-fill me-2"></i>Evaluasi Diri
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="list-group-item list-group-item-action py-2 ripple active">
                                    <span>Rekap Kegiatan</span>
                                </a>
                            </li>
                        </ul>
                    </div>



                    <a href="#" class="list-group-item bg-abu list-group-item-action py-2 ripple"><i
                            class="fas fa-lock fa-fw me-3"></i><span>Evaluasi Diri</span></a>

                    <a href="#" class="list-group-item bg-abu list-group-item-action py-2 ripple"><i
                            class="fas fa-lock fa-fw me-3"></i><span>Riwayat Kegiatan</span></a>

                    <div class="dropend">
                        <a type="button" class="list-group-item list-group-item-action py-2 ripple"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-caret-right-fill me-2"></i>Asesor
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a type="button" class="list-group-item list-group-item-action py-2 ripple active"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-caret-right-fill me-2"></i>Evaluasi Diri
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                            <span>Rekap Kegiatan</span>
                                        </a></li>
                                    <li><a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                            <span>Rekap Kegiatan Disetujui</span>
                                        </a></li>

                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a type="button" class="list-group-item list-group-item-action py-2 ripple active"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-caret-right-fill me-2"></i>Rencana Kerja
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                            <span>Rekap Kegiatan</span>
                                        </a></li>
                                    <li><a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                            <span>Rekap Kegiatan Disetujui</span>
                                        </a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-header fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/img/Logo.png') }}" width ="44" height="44" alt="IT Del Logo"
                        loading="lazy" />
                </a>

                <span class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 class="pt-1 text-dark" style="font-weight: 700">Form Rencana Kerja - Form Evaluasi Diri</h3>
                    <h6 style="color: #3C3C3C; font-style: italic">Institut Teknologi Del</h6>
                </span>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right elements -->
                    {{-- <div class="ms-auto d-flex align-items-center justify-content-start">
                        <img class="d-inline" src="{{ asset('assets/icon/Logout.svg') }}" alt="">
                        <a class="text-reset me-3 text-decoration-none" href="#">
                            <h5 class="ms-2 pt-2 " style="font-weight: 700;">Keluar</h5>
                        </a>

                        
                    </div> --}}
                    <!-- Right elements -->

                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 74px">
        <div class="bg-abu container-fluid pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>

</html>
