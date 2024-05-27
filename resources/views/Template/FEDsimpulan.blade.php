@extends('Template.app')


@section('content')
    <div class = "mt-5 flex-wrap ml-4 mr-4 pb-4">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <p class = "breadcrumbs">Rencana Kerja / Simpulan</p>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini : Dosen Program Studi S1 Informatika </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2 pb-3">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr />

            <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
                <h5> <b> <u> Profil dosen </u> </b> </h5>
                <p><b>{{ $nama_dosen }}</b></p>
                <p><b>{{ $nidn_dosen }}</b></p>
                <p><b>{{ $role_dosen }}</b></p>
            </div>

            <div class = "mt-5 mb-5">
                <ul class="nav nav-pills justify-content-center text-center">
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Request::is('formEvaluasiDiri/pendidikan') ? ' active' : '' }}"
                            href="{{ route('ed-pendidikan') }}"><b>Evaluasi Pendidikan</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link {{ Request::is('formEvaluasiDiri/penelitian') ? ' active' : '' }}"
                            href="{{ route('ed-penelitian') }} "><b>Evaluasi Penelitian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formEvaluasiDiri/pengabdian') ? ' active' : '' }}"
                            href="{{ route('ed-pengabdian') }} "><b>Evaluasi Pengabdian</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formEvaluasiDiri/penunjang') ? ' active' : '' }}"
                            href="{{ route('ed-penunjang') }} "><b>Evaluasi Penunjang Lainnya</b></a>
                    </li>
                    <li class="nav-item nav-item-150 bg-abu-nav">
                        <a class="nav-link{{ Request::is('formEvaluasiDiri/simpulan') ? ' active' : '' }}"
                            href="{{ route('ed-simpulan') }}"><b>Simpulan</b></a>
                    </li>
                </ul>
            </div>

            @yield('content-FEDsimpulan')
        </div>
        {{-- TEMPAT MODAL SUBMIT CONFIRM --}}
        <div class="modal fade" id="modalSubmitConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                        <h1><i class="bi bi-question-circle text-primary"></i></h1>
                        <h5>Yakin untuk menyimpan permanen kegiatan ini?</h5>
                        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol
                            'Yakin'
                        </p>
                    </div>

                    <form action="{{ route('ed-simpan-evaluasi') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_dosen" value={{ $id_dosen }} />

                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button id="confirmDeleteBtn" type="submit" class="btn btn-primary">Yakin</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
