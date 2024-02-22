@extends('Template.app')

@section('content')
    <!-- ROLE -->

    <div class="mt-3 d-flex align-items-center justify-content-end">
        <span class="role">Peran Saat ini : Dosen Program Studi S1 Informatika</span>
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
                WILONA DIVA ARTHA SIMBOLON
            </h3>
            <span class="d-block">
                Fakultas Informatika dan Teknik Elektro - Informatika
            </span>
        </span>
    </div>

    {{-- END OF NAME --}}

    {{-- DATA --}}

    <div class="bg-white w-100 mt-5 d-flex align-items-center justify-content-start ps-4 p-3">
    
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
