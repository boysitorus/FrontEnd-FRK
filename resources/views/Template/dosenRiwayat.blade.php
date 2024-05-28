@extends('Template.app')


@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Dosen</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : {{ json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['posisi '] }} Program Studi {{ $auth->user->data_lengkap->dosen->prodi }} </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2 mb-5">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Riwayat Kegiatan</h4>
            </div>
            <hr/>

            @yield('content-riwayat')

        </div>
    <div>



        </div>
    <div>



@endsection

