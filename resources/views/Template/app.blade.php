<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRK & FED</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

                    <ul class="mt-5 list-unstyled ps-0">
                        <li style="border-bottom: solid black 1px">
                            <a id="sidebarCollapse" type="button"
                                class="list-group-item bg-abu list-group-item-action py-2 ripple d-flex justify-content-end">
                                <i class="bi bi-arrow-left-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="list-group-item bg-abu list-group-item-action py-2 ripple">
                                <i class="bi bi-person-fill me-1"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li>
                            <a type="button"
                                class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed 
                                {{ request()->routeIs('rk-pendidikan') ? 'active' : '' }}
                                d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#frk-collapse" aria-expanded="false">
                                <i class="bi bi-person-workspace me-2"></i>
                                <div class="me-auto"><span>Rencana Kerja</span></div>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="frk-collapse">
                                <ul
                                    class="btn-toggle-nav list-unstyled fw-normal pb-1 small {{ request()->routeIs('rk-pendidikan') ? 'active' : '' }}">
                                    <li>
                                        <a href="{{ route('rk-pendidikan.all') }}"
                                            class="text-decoration-none sub-menu list-group-item-action py-2 ripple">
                                            Rekap Kegiatan
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <a type="button"
                                class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#fed-collapse" aria-expanded="false">
                                <i class="bi bi-pencil-square me-2"></i>
                                <div class="me-auto"><span>Evaluasi Diri</span></div>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="fed-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="#"
                                            class="text-decoration-none sub-menu list-group-item-action py-2 ripple">
                                            Rekap Kegiatan
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="" class="list-group-item bg-abu list-group-item-action py-2 ripple">
                                <i class="bi bi-clock-fill me-1"></i>
                                <span>Riwayat Kegiatan</span>
                            </a>
                        </li>

                        <li>
                            <a type="button"
                                class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#asesor-collapse" aria-expanded="false">
                                <i class="bi bi-people-fill me-2"></i>
                                <div class="me-auto"><span>Asesor</span></div>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="asesor-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a type="button"
                                            class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed d-flex justify-content-between align-items-center"
                                            data-bs-toggle="collapse" data-bs-target="#asesor-frk-collapse"
                                            aria-expanded="false">

                                            <div class="me-auto">Rencana Kerja</div>
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="collapse" id="asesor-frk-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li>
                                                    <a href="#"
                                                        class="text-decoration-none sub-menu list-group-item-action py-2 ripple"
                                                        style="margin-bottom:0.1px">
                                                        Rekap Kegiatan
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="text-decoration-none sub-menu list-group-item-action py-2 ripple">
                                                        Rekap Kegiatan yang Disetujui
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a type="button"
                                            class="btn-toggle list-group-item blist-group-item-action py-2 ripple collapsed d-flex justify-content-between align-items-center"
                                            data-bs-toggle="collapse" data-bs-target="#asesor-fed-collapse"
                                            aria-expanded="false">

                                            <div class="me-auto">Evaluasi Diri</div>
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="collapse" id="asesor-fed-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li>
                                                    <a href="#"
                                                        class="text-decoration-none sub-menu list-group-item-action py-2 ripple margin"
                                                        style="margin-bottom:0.1px">
                                                        Rekap Kegiatan
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="text-decoration-none sub-menu list-group-item-action py-2 ripple">
                                                        Rekap Kegiatan yang Disetujui
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>

                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-header fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/img/Logo.png') }}" width ="74" height="74" alt="IT Del Logo"
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
    <main id="contentPage" style="margin-top: 74px;">
        <div class="bg-abu container-fluid pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebarMenu').toggleClass('active');
                $('#contentPage').toggleClass('active');
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


</body>

</html>
