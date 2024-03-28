@extends('Template.app')


@section('content')
    
    <div class = "mt-5 flex-wrap ml-4 mr-4">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Evaluasi Diri / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : Dosen Program Studi S1 Informatika </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Info untuk dosen </u> </b> </h5>
                <p><b>Penarikan Kinerja</b> dari 01 Januari 2024  sampai xx xxxxx xxxxx</p>
                <p><b>Periode Pengisian</b> dari 05 Februari 2024 sampai xx xxxxx xxxxx</p>
                <p><b>Periode Penilaian</b> dari 01 Januari 2024  sampai xx xxxxx xxxxx</p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150">
                        <a class="nav-link active fw-bold" href="#">Evaluasi Pendidikan</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link fw-bold" href="#">Evaluasi Penelitian</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link fw-bold" href="#">Evaluasi Pengabdian</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link fw-bold" href="#">Evaluasi Penunjang</a>
                    </li>
                    <li class="nav-item nav-item-150">
                        <a class="nav-link fw-bold" href="#">Simpulan</a>
                    </li>
                </ul>
            </div>
            
            @yield('content-kegiatan')

        </div>
    <div>
    
    

@endsection