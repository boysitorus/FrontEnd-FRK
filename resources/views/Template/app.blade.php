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
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr.min.css') }}">

    <style>
        /* Remove inner borders */
        table.outer-border-only-table td,
        table.outer-border-only-table th {
            border: none;
        }

        /* Add outer border */
        table.outer-border-only-table {
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid black;
            /* Adjust the border style as needed */
        }

        table.outer-border-only-table th,
        table.outer-border-only-table td {
            border-left: none;
            border-right: none;
            border-top: none;
        }

        table.outer-border-only-table thead th,
        table.outer-border-only-table tbody tr:last-child td {
            border-bottom: 1px solid black;
        }

        .toast-top-right {
            top: 130px;
            right: 12px;
        }
    </style>
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
                            <a href="{{ route('profile') }}"
                                class="{{ request()->routeIs('profile') ? 'active' : '' }} list-group-item bg-abu list-group-item-action py-2 ripple">
                                <i class="bi bi-person-fill me-1"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li>
                            <a type="button"
                                class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed
                                {{ Str::startsWith(request()->path(), 'formRencanaKerja') ? 'active' : '' }}
                                d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#frk-collapse" aria-expanded="false">
                                <i class="bi bi-person-workspace me-2"></i>
                                <div class="me-auto"><span>Rencana Kerja</span></div>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="frk-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="{{ route('rk-pendidikan') }}"
                                            class="text-decoration-none sub-menu list-group-item-action py-2 ripple">
                                            Rekap Kegiatan
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <a type="button"
                                class="btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed
                                {{ Str::startsWith(request()->path(), 'formEvaluasiDiri') ? 'active' : '' }}
                                d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#fed-collapse" aria-expanded="false">
                                <i class="bi bi-pencil-square me-2"></i>
                                <div class="me-auto"><span>Evaluasi Diri</span></div>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="fed-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a href="{{ route('ed-pendidikan') }}"
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
                            <a href="{{ route('lk-tahunAjaranAsesor') }}"
                                class="
                                {{ Str::startsWith(request()->path(), 'Asesor/LihatKerja/') ? 'active' : '' }}
                                list-group-item bg-abu list-group-item-action py-2 ripple {{ request()->routeIs('lk-tahunAjaran') ? 'active' : '' }}">
                                <i class="bi bi-eye me-2"></i>
                                <span>Lihat Kerja</span>
                            </a>
                        </li>

                        @php
                            use App\Utils\Tools;
                            $check = Tools::checkAsesor(
                                json_decode(json_encode($auth->user->data_lengkap->dosen), true)['pegawai_id'],
                            );
                        @endphp

                        @if ($check['result'])
                            <li>
                                <a type="button"
                                    class="
                                    {{ Str::startsWith(request()->path(), 'Asesor/Rencana') || Str::startsWith(request()->path(), 'Asesor/Evaluasi') ? 'active' : '' }}
                                    btn-toggle list-group-item bg-abu list-group-item-action py-2 ripple collapsed d-flex justify-content-between align-items-center"
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
                                                        <a href="{{ route('rk-asesor') }}"
                                                            class="text-decoration-none sub-menu list-group-item-action py-2 ripple"
                                                            style="margin-bottom:0.1px">
                                                            Rekap Kegiatan
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
                                                        <a href="{{ route('ed-asesor') }}"
                                                            class="text-decoration-none sub-menu list-group-item-action py-2 ripple margin"
                                                            style="margin-bottom:0.1px">
                                                            Rekap Kegiatan
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
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
                    <img src="{{ asset('assets/img/Logo.png') }}" width="74" height="74" alt="IT Del Logo"
                        loading="lazy" />
                </a>

                <span class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 class="pt-1 text-dark" style="font-weight: 700">Form Rencana Kerja - Form Evaluasi Diri</h3>
                    <h6 style="color: #3C3C3C; font-style: italic">Institut Teknologi Del</h6>
                </span>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="ms-auto d-flex align-items-center justify-content-start">
                        <img class="d-inline" src="{{ asset('assets/icon/Logout.svg') }}" alt="">
                        <a class="text-reset me-3 text-decoration-none" href="{{ route('logout.get') }}">
                            <h5 class="ms-2 pt-2 " style="font-weight: 700;">Keluar</h5>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main id="contentPage" style="margin-top: 74px;">
        <div class="bg-abu container-fluid pt-4 ">
            @yield('content')
        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content text-center">
                    <h3 class="modal-title w-100 fw-bolder mt-5" id="logoutModalLabel">Logout</h3>
                    <div class="modal-body mt-3">
                        Anda yakin ingin keluar?
                    </div>
                    <div class="justify-content-center mt-3 mb-5">
                        <div>
                            <a href="{{ route('logout.get') }}" class="fw-bolder"
                                style="text-decoration: none; color: red;">Ya, Saya Yakin</a>
                        </div>
                        <div class="mt-2">
                            <a class="fw-bolder" href="" data-bs-dismiss="modal"
                                style="text-decoration: none; color: grey;">Tidak, Saya ingin kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebarMenu').toggleClass('active');
                $('#contentPage').toggleClass('active');
                $('li > div.collapse').removeClass('show');
            });

        });
    </script>

    <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.min.js') }}"></script>

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ Session::get('message') }}", 'Success!', {
                timeOut: 12000
            })
            toastr.options.progressBar = true;
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ Session::get('error') }}", 'Error!', {
                timeOut: 12000
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#pend_nama_kegiatan_A').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var sksValue = selectedOption.data('sks');
                $('#pend_sks_A').val(sksValue);
            });
        });
    </script>
</body>

</html>
