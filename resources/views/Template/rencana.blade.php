@extends('Template.app')


@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  : {{ json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['posisi '] }} Program Studi {{ $auth->user->data_lengkap->dosen->prodi }} </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2 pb-3">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kerja - {{ $periode['tahun_ajaran'] }}</h4>
            </div>
            <hr/>

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Info untuk dosen </u> </b> </h5>
                <p><b>Periode Pengisian</b> dari {{ date("d F Y", strtotime($periode['tgl_awal_pengisian'])) }} sampai {{ date("d F Y", strtotime($periode['tgl_akhir_pengisian'])) }}</p>
                <p><b>Periode Penilaian</b> dari {{ date("d F Y", strtotime($periode['periode_awal_approve_assesor_1'])) }}  sampai
                    {{ date("d F Y", strtotime($periode['periode_akhir_approve_assesor_2'])) }}</p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Request::is('formRencanaKerja/pendidikan') ? ' active' : '' }}" href="{{ route('rk-pendidikan') }}" ><b>Rencana Pendidikan</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Request::is('formRencanaKerja/penelitian') ? ' active' : '' }}" href="{{ route('rk-penelitian') }} " ><b>Rencana Penelitian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formRencanaKerja/pengabdian') ? ' active' : '' }}" href="{{ route('rk-pengabdian') }} "><b>Rencana Pengabdian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formRencanaKerja/penunjang') ? ' active' : '' }}" href="{{ route('rk-penunjang') }} "><b>Tunjangan Lainnya</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formRencanaKerja/simpulan') ? ' active' : '' }}" href="{{ route('rk-simpulan') }}"><b>Simpulan</b></a>
                    </li>
                </ul>
            </div>


            @yield('content-kegiatan')
        </div>
    <div>



        </div>
    <div>



@endsection

