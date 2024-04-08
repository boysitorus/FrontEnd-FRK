@extends('Template.app')


@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 " >
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Simpulan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : Dosen Program Studi S1 Informatika </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2">
            <div class = "ml-2 mr-2 pt-4" >
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Profil dosen </u> </b> </h5>
                <p><b>Wilona Diva Artha Simbolon S.Kom</b></p>
                <p>12AS356</p>
                <p>Dosen Fakultas Informatika dan Teknik Elektro</p>
            </div>


            @yield('content-FEDsimpulanpenelitian')
        </div>
    <div>



@endsection
