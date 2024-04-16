@extends('Template.app')

@section('content')
    <!-- ROLE -->

    <div class="mt-3 d-flex align-items-center justify-content-end">
        <span class="role">Peran Saat ini : {{ json_decode(json_encode($auth->user->data_lengkap->pegawai),true)['posisi '] }} Program Studi {{ $auth->user->data_lengkap->dosen->prodi }}</span>
    </div>

    <!-- END OF ROLE -->

    {{-- NOTIFICATION --}}

    <div class="notif w-100 mt-5 d-flex align-items-center justify-content-start ps-4 p-3">
        <img class="me-4" src="{{ asset('assets/icon/Warn.svg') }}" alt="warn-icon">
        <span>
            <h5>
                Menunggu Persetujuan dari Asesor
            </h5>
            <span class="d-block">
                Rencana kerja yang anda susun sedang menunggu persetujuan dari asesor. Anda dapat mengedit rencana kerja
                sebelum
                disetujui oleh asesor. <br>
                Silahkan hubungi asesor anda untuk meminta persetujuan asesor
            </span>
        </span>
    </div>

    {{-- END OF NOTIFICATION --}}

    {{-- NAME --}}

    <div class="bg-white w-100 mt-5 d-flex align-items-center justify-content-start ps-4 p-3">
        <img class="profile" src="/assets/img/tes-img.jpg" width="120" height="120" alt="">
        <span class="ms-5">
            <span class="">
                Selamat Datang
            </span>
            <h3 style="font-weight: 700">
                {{$auth->user->data_lengkap->dosen->nama}}
            </h3>
            <span class="d-block">
                {{-- untuk fakultas --}}
                @switch($auth->user->data_lengkap->dosen->prodi)
                    {{-- FITE --}}
                    @case('S1 Informatika')
                        Fakultas Informatika dan Teknik Elektro & Informatika
                        @break
                    @case('S1 Sistem Informasi')
                        Fakultas Informatika dan Teknik Elektro & Informatika
                        @break
                    @case('S1 Teknik Elektro')
                        Fakultas Informatika dan Teknik Elektro & Informatika
                        @break

                        {{-- Vokasi --}}
                    @case('D3 Teknologi Informasi')
                        Fakultas Vokasi
                        @break
                    @case('D3 Teknologi Komputer')
                        Fakultas Vokasi
                        @break
                    @case('D4 (Sarjana Terapan) Teknologi Rekayasa Perangkat Lunak')
                        Fakultas Vokasi
                        @break

                        {{-- FTI --}}
                    @case('S1 Manajemen Rekayasa')
                        Fakultas Teknologi Industri
                        @break
                    @case('S1 Teknik Metalurgi')
                        Fakultas Teknologi Industri
                        @break

                        {{-- FB --}}
                    @case('S1 Teknik Bioproses')
                        Fakultas Bioteknologi
                        @break
                @endswitch
            </span>
        </span>
    </div>

    {{-- END OF NAME --}}

    {{-- DATA --}}

    <div class="bg-white w-100 mt-5 d-flex align-items-center justify-content-start ps-4 p-2">

        <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="judul-data">Data Pokok</div>
                    <div>Jika ingin mengubah data, silahkan lakukan melalui menu terkait</div>
                    <div class="empty-box"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="judul-data">Data Pokok</div>
                    <div>Jika ingin mengubah data, silahkan lakukan melalui menu terkait</div>
                    <div class="empty-box"></div>
                    </div>
                </div>
            </div>
    </div>

    {{-- END OF DATA --}}

@endsection
