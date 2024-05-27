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
                {{ $keanggotaan }}
            </span>
        </span>
    </div>

    {{-- END OF NAME --}}

    {{-- DATA --}}

    <div class="bg-white w-100 mt-5 d-flex align-items-center justify-content-start ps-4 p-2">

        <div class="container">
                <div class="row">
                    <div class="col-sm-12 judul-data">
                        <center>
                            Data Pokok
                        </center>
                    </div>

                    <div class="col-sm-12">
                        <center>Jika ingin mengubah data, silahkan lakukan melalui menu terkait</center>
                    </div>

                    <div class="col-sm-6">


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">NIDN</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->dosen->nidn }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">NIP</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->dosen->nip }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Nama</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->dosen->nama }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Inisial (Alias)</p></div>
                                    <div class="col-lg-6">{{ json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['alias '] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Email</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->pegawai->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Jenjang pendidikan</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->dosen->jenjang_pendidikan }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Status</p></div>
                                    <div class="col-lg-6">{{ ($auth->user->status == "1") ? "Aktif" : "Tidak Aktif"}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Role</p></div>
                                    <div class="col-lg-6">{{ $auth->user->role }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Jabatan</p></div>
                                    <div class="col-lg-6">
                                        <div class="card-text">
                                            @if(count($auth->user->jabatan) > 1)
                                                    <ol>
                                                @foreach($auth->user->jabatan as $jabatan)
                                                        <li>{{ $jabatan->jabatan }}</li>
                                                @endforeach
                                                    </ol>
                                            @else
                                                @foreach($auth->user->jabatan as $jabatan)
                                                    {{ $jabatan->jabatan }}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Jabatan akademik</p></div>
                                    <div class="col-lg-6">{{ $auth->user->data_lengkap->dosen->jabatan_akademik_desc }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><p class="card-text">Posisi</p></div>
                                    <div class="col-lg-6">{{ json_decode(json_encode($auth->user->data_lengkap->pegawai), true)['posisi '] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    {{-- END OF DATA --}}

@endsection
