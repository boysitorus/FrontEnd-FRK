@extends('Template.rencana')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN PENUNJANG --}}

    {{-- BAGIAN A --}}
    <div id="penunjang-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangA" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_A">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_A"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_A"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN B --}}
    <div id="penunjang-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling.</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangB" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_B">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_B"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_B"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="penunjang-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa), 
                Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa), 
                BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian), 
                Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangC" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_C">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_C"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_C"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="penunjang-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal 
                a. Koperasi fakultas, b. Dharma wanita, c.  Takmir Masjid/Pastoran</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangD" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_D">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" 
                style="border: 2px;">
                <thead>
                     <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-4">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                        <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold col-1">Asesor 1</th>
                        <th scope="col" class="fw-bold col-1">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row1">1</td>
                        <td>Lorem ipsum dolor sit amet consectetur.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" 
                                data-bs-toggle="modal" data-bs-target="#modalEditPenunjang_D"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" 
                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" 
                                data-bs-toggle="modal" data-bs-target="#modalEditPenunjang_D"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" 
                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="penunjang-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangE" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_E">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_E"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_E"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="penunjang-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangF" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_F">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- BAGIAN G --}}
    <div id="penunjang-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangG" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_G">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_G"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_G"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- BAGIAN H --}}
    <div id="penunjang-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2  semester), 
                seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangH" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_H">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="penunjang-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangI" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_I">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_I"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- BAGIAN J--}}
        <div id="penunjang-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
                <hr />

                <div class="row justify-content-end mr-0">
                    <button id="btnFrkPenunjangJ" type="button" class="btn btn-success col-md-auto m-1"
                        data-bs-toggle="modal" data-bs-target="#modalPenunjang_J">
                        Tambah Kegiatan
                    </button>
                </div>

                <div class="text-sm">
                    <table id="tablePenunjang-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_J"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                    arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_J"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K --}}
        <div id="penunjang-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
                <hr />

                <div class="row justify-content-end mr-0">
                    <button id="btnFrkPenunjangK" type="button" class="btn btn-success col-md-auto m-1"
                        data-bs-toggle="modal" data-bs-target="#modalPenunjang_K">
                        Tambah Kegiatan
                    </button>
                </div>

                <div class="text-sm">
                    <table id="tablePenunjang-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_K"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                    arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_K"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- BAGIAN L --}}
        <div id="penunjang-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
                <hr />

                <div class="row justify-content-end mr-0">
                    <button id="btnFrkPenunjangL" type="button" class="btn btn-success col-md-auto m-1"
                        data-bs-toggle="modal" data-bs-target="#modalPenunjang_L">
                        Tambah Kegiatan
                    </button>
                </div>

                <div class="text-sm">
                    <table id="tablePenunjang-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan(Ketua/Anggota)</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_L"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                    arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_L"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN L --}}

    {{-- BAGIAN M --}}
        <div id="penunjang-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>M. Peserta seminar/workshop/kursus berdasar penugasan  pimpinan</b></h6>
                <hr />

                <div class="row justify-content-end mr-0">
                    <button id="btnFrkPenunjangM" type="button" class="btn btn-success col-md-auto m-1"
                        data-bs-toggle="modal" data-bs-target="#modalPenunjang_M">
                        Tambah Kegiatan
                    </button>
                </div>

                <div class="text-sm">
                    <table id="tablePenunjang-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_M"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                    arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_M"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN M --}}

    {{-- BAGIAN N --}}
        <div id="penunjang-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
                <hr />

                <div class="row justify-content-end mr-0">
                    <button id="btnFrkPenunjangN" type="button" class="btn btn-success col-md-auto m-1"
                        data-bs-toggle="modal" data-bs-target="#modalPenunjang_N">
                        Tambah Kegiatan
                    </button>
                </div>

                <div class="text-sm">
                    <table id="tablePenunjang-N" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                       style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" class="fw-bold">Asesor 1</th>
                                <th scope="col" class="fw-bold">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_N"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                    arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenunjang_N"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN N --}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN A--}}
            <div class="modal fade modal-lg" id="modalPenunjang_A" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">A. Bimbingan Akademik 
                                (perwalian/penasehat akademik)</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Mahasiswa:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN A}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN B--}}
            <div class="modal fade modal-lg" id="modalPenunjang_B" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">B. Bimbingan dan Konseling</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Mahasiswa:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN B}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN C--}}
            <div class="modal fade modal-lg" id="modalPenunjang_C" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">C. Pimpinan Pembina Unit Kegiatan Mahasiswa</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Kegiatan</label>
                                    <label class="form-label">Jumlah Kegiatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN C}}

    
    {{-- TEMPAT MODAL TAMBAH KEGIATAN D--}}
            <div class="modal fade modal-lg" id="modalPenunjang_D" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN D}}
    
    {{-- TEMPAT MODAL TAMBAH KEGIATAN E--}}
            <div class="modal fade modal-lg" id="modalPenunjang_E" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">E. Jabatan struktural (berdasarkan beban/semester)</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>

                                    <label class="form-label">Jabatan:</label>

                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN E}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN F--}}
            <div class="modal fade modal-lg" id="modalPenunjang_F" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">F. Jabatan non struktural</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN F}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN G--}}
            <div class="modal fade modal-lg" id="modalPenunjang_G" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN G}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN H--}}
            <div class="modal fade modal-lg" id="modalPenunjang_H" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h6 class="modal-title" id="exampleModalLabel">H. Ketua Panitia Ad Hoc</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN H}}

   {{-- TEMPAT MODAL TAMBAH KEGIATAN I--}}
            <div class="modal fade modal-lg" id="modalPenunjang_I" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">I. Ketua Panitia Tetap</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkat Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN I}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN J--}}
            <div class="modal fade modal-lg" id="modalPenunjang_J" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkat Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN J}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN K--}}
            <div class="modal fade modal-lg" id="modalPenunjang_K" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI, Assesor BAN-PT</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN K}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN L--}}
    <div class="modal fade modal-lg" id="modalPenunjang_L" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">L. Menjadi Pengurus/Anggota Asosiasi Profesi</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <select class="form-control" id="jenis_jabatan" name="jenis_jabatan">
                                        <option value="anggota">Anggota</option>
                                        <option value="ketua">Ketua</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkatan:</label>
                                    <select class="form-control" id="jenis_tingkatan" name="jenis_tingkatan">
                                        <option value="regional">Regional</option>
                                        <option value="Nasional">Nasional</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN L}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN M--}}
            <div class="modal fade modal-lg" id="modalPenunjang_M" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">M. Peserta Meminar/Workshop/Kursus Berdasar Penugasan Pimpinan</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkatan:</label>
                                    <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                        <option value="regional">Regional</option>
                                        <option value="nasional">Nasional</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN M}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN N--}}
            <div class="modal fade modal-lg" id="modalPenunjang_N" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">N. Reviewer Jurnal Ilmiah , Proposal Hibah dll</h6>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN N}}

    {{-- TEMPAT MODAL EDIT CONFIRM A--}}
        <div class="modal fade" id="modalEditPenunjang_A" tabindex="-1" aria-labelledby="modalEditPenunjangALabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangALabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Mahasiswa:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM B--}}
        <div class="modal fade" id="modalEditPenunjang_B" tabindex="-1" aria-labelledby="modalEditPenunjangBLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangBLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Mahasiswa:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM C--}}
        <div class="modal fade" id="modalEditPenunjang_C" tabindex="-1" aria-labelledby="modalEditPenunjangCLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangCLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Kegiatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM D--}}
        <div class="modal fade" id="modalEditPenunjang_D" tabindex="-1" aria-labelledby="modalEditPenunjangDLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangDLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form>
                            <div class="mb-3">
                                <label for="editKegiatan" class="form-label">Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="editKegiatan">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM E--}}
        <div class="modal fade" id="modalEditPenunjang_E" tabindex="-1" aria-labelledby="modalEditPenunjangELabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangELabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM F--}}
        <div class="modal fade" id="modalEditPenunjang_F" tabindex="-1" aria-labelledby="modalEditPenunjangFLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangFLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM G--}}
        <div class="modal fade" id="modalEditPenunjang_G" tabindex="-1" aria-labelledby="modalEditPenunjangGLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangGLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM H--}}
        <div class="modal fade" id="modalEditPenunjang_H" tabindex="-1" aria-labelledby="modalEditPenunjangHLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangHLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM I--}}
        <div class="modal fade" id="modalEditPenunjang_I" tabindex="-1" aria-labelledby="modalEditPenunjangILabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangILabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkat Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM J--}}
        <div class="modal fade" id="modalEditPenunjang_J" tabindex="-1" aria-labelledby="modalEditPenunjangJLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangJLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkat Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM K--}}
        <div class="modal fade" id="modalEditPenunjang_K" tabindex="-1" aria-labelledby="modalEditPenunjangKLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangKLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM L--}}
        <div class="modal fade" id="modalEditPenunjang_L" tabindex="-1" aria-labelledby="modalEditPenunjangLLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangLLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM M--}}
        <div class="modal fade" id="modalEditPenunjang_M" tabindex="-1" aria-labelledby="modalEditPenunjangMLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangMLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkatan:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM N--}}
        <div class="modal fade" id="modalEditPenunjang_N" tabindex="-1" aria-labelledby="modalEditPenunjangNLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPenunjangNLabel">Edit Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form>
                            <div class="mb-3">
                                <label for="editKegiatan" class="form-label">Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="editKegiatan">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- AKHIR MODAL EDIT --}}

        {{-- TEMPAT MODAL DELETE CONFIRM --}}
        <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                        </p>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Yakin</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- TEMPAT TOAST --}}

        {{-- TOAS EDIT --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="editToast" class="toast bg-success-subtle" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body">
                    <i class="bi bi-check2-circle"></i>
                    Berhasil Mengubah Kegiatan
                </div>
            </div>
        </div>

        {{-- TOAST DELETE --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="deleteToast" class="toast bg-success-subtle" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body">
                    <i class="bi bi-check2-circle"></i>
                    Berhasil Menghapus Kegiatan
                </div>
            </div>
        </div>

        {{-- TEMPAT JAVASCRIPT --}}
        <script>
            document.getElementById('confirmEditBtn').addEventListener('click', function() {
                showEditToast();
            });

            function showEditToast() {
                // Menutup modal
                $('#modalEditConfirm').modal('hide');

                // Menambahkan kelas 'show' ke elemen toast
                $('#editToast').addClass('show');

                // Menghapus kelas 'show' setelah beberapa detik (sesuaikan dengan durasi animasi toast)
                setTimeout(function() {
                    $('#editToast').removeClass('show');
                }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
            }
        </script>

        <script>
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                showDeleteToast();
            });

            function showDeleteToast() {
                // Menutup modal
                $('#modalDeleteConfirm').modal('hide');

                // Menambahkan kelas 'show' ke elemen toast
                $('#deleteToast').addClass('show');

                // Menghapus kelas 'show' setelah beberapa detik (sesuaikan dengan durasi animasi toast)
                setTimeout(function() {
                    $('#deleteToast').removeClass('show');
                }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
            }
        </script>




@endsection