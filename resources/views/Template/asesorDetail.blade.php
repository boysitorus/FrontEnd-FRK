@extends('Template.app')


@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 pb-3">
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
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Info untuk dosen </u> </b> </h5>
                <p><b>Nama : {{ $dataDosen["nama"] }}</b></p>
                <p><b>NIDN : {{ $dataDosen["nidn"] }}</b></p>
                <p><b>Jabatan : {{ "Dosen Program Studi " . $dataDosen["prodi"] }}</b></p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link
                        {{ Str::startsWith(request()->path(), 'Asesor/Rekap-Kegiatan-Asesor-pendidikan') ? 'active' : '' }}"
                        href="{{ route('rk-asesor-detail-pendidikan', ['id' => $id]) }}"
                        ><b>Rencana Pendidikan</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link
                        {{ Str::startsWith(request()->path(), 'Asesor/Rekap-Kegiatan-Asesor-penelitian') ? 'active' : '' }}"
                        href="{{ route('rk-asesor-detail-penelitian', ['id' => $id]) }} "
                        ><b>Rencana Penelitian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link
                        {{ Str::startsWith(request()->path(), 'Asesor/Rekap-Kegiatan-Asesor-pengabdian') ? 'active' : '' }}"
                        href="{{ route('rk-asesor-detail-pengabdian', ['id' => $id]) }} "
                        ><b>Rencana Pengabdian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link
                        {{ Str::startsWith(request()->path(), 'Asesor/Rekap-Kegiatan-Asesor-penunjang') ? 'active' : '' }}"
                        href="{{ route('rk-asesor-detail-penunjang', ['id' => $id]) }} "
                        ><b>Tunjangan Lainnya</b></a>
                    </li>
                </ul>
            </div>

            @yield('content-kegiatan')

        </div>
    <div>



        </div>
    <div>



@endsection

