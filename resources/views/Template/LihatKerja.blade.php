@extends($isHumanResources ? 'Template.admin' : 'Template.app')

@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Rekap Kegiatan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : Asesor Program Studi
                        {{ $auth->user->data_lengkap->dosen->prodi }} </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2 pb-4">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Riwayat Kegiatan - Tahun Ajaran {{ $tahun_ajaran }} Semester
                    {{ $semester }}</h4>
            </div>
            <hr />

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Data Dosen </u> </b> </h5>
                <p><b>Nama : {{ $data_dosen['nama'] }}</b></p>
                <p><b>NIDN : {{ $data_dosen['nidn'] }}</b></p>
                <p><b>Jabatan : {{ 'Dosen Program Studi ' . $data_dosen['prodi'] }}</b></p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Str::startsWith(request()->path(), 'LihatKerja/ViewDetailPendidikan/') ? ' active' : '' }}"
                            href="{{ route('lk-viewDetailPendidikan', ['id' => $id_dosen, 'id_ta' => $id_ta]) }}"><b>Pendidikan</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Str::startsWith(request()->path(), 'LihatKerja/ViewDetailPenelitian/') ? ' active' : '' }}"
                            href="{{ route('lk-viewDetailPenelitian', ['id' => $id_dosen, 'id_ta' => $id_ta]) }} "><b>Penelitian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(), 'LihatKerja/ViewDetailPengabdian/') ? ' active' : '' }}"
                            href="{{ route('lk-viewDetailPengabdian', ['id' => $id_dosen, 'id_ta' => $id_ta]) }} "><b>Pengabdian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(), 'LihatKerja/ViewDetailPenunjang/') ? ' active' : '' }}"
                            href="{{ route('lk-viewDetailPenunjang', ['id' => $id_dosen, 'id_ta' => $id_ta]) }} "><b>Penunjang
                                Lainnya</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Str::startsWith(request()->path(), 'LihatKerja/ViewDetailSimpulan/') ? ' active' : '' }}"
                            href="{{ route('lk-viewDetailSimpulan', ['id' => $id_dosen, 'id_ta' => $id_ta]) }}"><b>Simpulan</b></a>
                    </li>
                </ul>
            </div>

            @yield('content-kegiatan')
        </div>
        <div>
        @endsection
