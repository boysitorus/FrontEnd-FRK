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

        <div class = "bg-white mt-2 pb-4">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Riwayat Kegiatan - Tahun Ajaran {{ $tahun_ajaran }} Semester {{ $semester }}</h4>
            </div>
            <hr/>

            {{-- <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Info untuk dosen </u> </b> </h5>
                <p><b>Periode Pengisian</b> dari {{ date("d F Y", strtotime($periode['tgl_awal_pengisian'])) }} sampai {{ date("d F Y", strtotime($periode['tgl_akhir_pengisian'])) }}</p>
                <p><b>Periode Penilaian</b> dari {{ date("d F Y", strtotime($periode['periode_awal_approve_assesor_1'])) }}  sampai {{ date("d F Y", strtotime($periode['periode_akhir_approve_assesor_2'])) }}</p>
            </div> --}}

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Str::startsWith(request()->path(),'riwayat-kerja/list-tahun/detail-pendidikan/') ? ' active' : '' }}" href="{{ route('detail-pendidikan-riwayat-kerja-saya', ['id_ta' => $id_ta]) }}" ><b>Pendidikan</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Str::startsWith(request()->path(),'riwayat-kerja/list-tahun/detail-penelitian/') ? ' active' : '' }}" href="{{ route('detail-penelitian-riwayat-kerja-saya', ['id_ta' => $id_ta]) }} " ><b>Penelitian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(),'riwayat-kerja/list-tahun/detail-pengabdian/') ? ' active' : '' }}" href="{{ route('detail-pengabdian-riwayat-kerja-saya', ['id_ta' => $id_ta]) }} "><b>Pengabdian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(),'riwayat-kerja/list-tahun/detail-penunjang/') ? ' active' : '' }}" href="{{ route('detail-penunjang-riwayat-kerja-saya', ['id_ta' => $id_ta]) }} "><b>Penunjang Lainnya</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(),'riwayat-kerja/list-tahun/detail-simpulan/') ? ' active' : '' }}" href="{{ route('detail-simpulan-riwayat-kerja-saya', ['id_ta' => $id_ta]) }}"><b>Simpulan</b></a>
                    </li>
                </ul>
            </div>

            @yield('content-kegiatan')
        </div>
    <div>

@endsection
