@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENELITIAN --}}

    {{-- BAGIAN A --}}
    <div id="penelitian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya 
                seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-3">Status</th>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan tercatat)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
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
                                    data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
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
                                    data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Menulis 1 judul naskah buku yang akan diterbitkan  dalam waktu sebanyak-banyaknya \
                4 semester (disetujui  oleh pimpinan dan tercatat)sama dengan 3 sks.</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_C"><i class="bi bi-pencil-square"></i></button>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_C"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional  
                (berbahasa dan diedarkan secara internasional minimal  tiga negara), 
                disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" 
                style="border: 2px;">
                <thead>
                     <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" 
                                data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_D"><i class="bi bi-pencil-square"></i></button>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" 
                                data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_D"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan 
                dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama  dengan 2 sks</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Editor/ Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_E"><i class="bi bi-pencil-square"></i></button>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_E"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu 
                sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat) sama dengan 2 sks</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Ketua/ Editor/ Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_F"><i class="bi bi-pencil-square"></i></button>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_F"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen  yang sesuai dengan 
                bidang ilmu dan tidak diterbitkan,  tetapi digunakan oleh mahasiswa</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_G"><i class="bi bi-pencil-square"></i></button>
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
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_G"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. PEKERTI/AA</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                                    data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
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
                                    data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
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
    <div id="penelitian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b><h6>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Banyaknya BKD yang di Evaluasi</th>
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
                                    data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
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
                                    data-bs-target="#modalEditPenelitian_I"><i class="bi bi-pencil-square"></i></button>
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
        <div id="penelitian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>J. Menulis jurnal ilmiah</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tablePenelitian-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kategori</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Peran</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jumlah Anggota</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                                <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Aksi</th>
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
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian_J"><i class="bi bi-pencil-square"></i></button>
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
        <div id="penelitian-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>K. Memperoleh hak paten</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tablePenelitian-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Kategori</th>
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
                                        data-bs-target="#modalEditPenelitian_K"><i class="bi bi-pencil-square"></i></button>
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
                                        data-bs-target="#modalEditPenelitian_K"><i class="bi bi-pencil-square"></i></button>
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
        <div id="penelitian-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>L. Menulis di media massa (Koran/majalah: tulisan berupa opini, 
                    form diskusi, kritik, kajian ilmiah, ulasan ahli/pakar yang terkait dengan keahlian bidang ilmunya)</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tablePenelitian-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                                        data-bs-target="#modalEditPenelitian_L"><i class="bi bi-pencil-square"></i></button>
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
                                        data-bs-target="#modalEditPenelitian_L"><i class="bi bi-pencil-square"></i></button>
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
        <div id="penelitian-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>M. Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tablePenelitian-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                        style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold">Kategori</th>
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
                                        data-bs-target="#modalEditPenelitian_M"><i class="bi bi-pencil-square"></i></button>
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
                                        data-bs-target="#modalEditPenelitian_M"><i class="bi bi-pencil-square"></i></button>
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
        <div id="penelitian-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>N. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tablePenelitian-N" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                     style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kategori</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Kegiatan</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jumlah Anggota</th>
                                <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian_N"><i class="bi bi-pencil-square"></i></button>
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
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian_N"><i class="bi bi-pencil-square"></i></button>
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

    <!-- {{-- TEMPAT MODAL TAMBAH KEGIATAN A--}}
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
                            <h6 class="modal-title" id="exampleModalLabel">K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI, assesor BAN-PT</h6>
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
                                    <label class="form-label">Jabatan</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tingkatan</label>
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

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN L}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN M--}}
            <div class="modal fade modal-lg" id="modalPenunjang_M" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">M. Peserta seminar/workshop/kursus berdasar penugasan pimpinan</h6>
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
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN M}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN N--}}
            <div class="modal fade modal-lg" id="modalPenunjang_N" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">N. Reviewer jurnal ilmiah , proposal Hibah dll</h6>
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

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN N}} -->

    {{-- TEMPAT MODAL EDIT CONFIRM A--}}
    <div class="modal fade" id="modalEditPenelitian_A" tabindex="-1" aria-labelledby="modalEditPenelitianALabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPenelitianALabel">Edit Penelitian A</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Choose a file or drag it here</h3>
                            <!-- File input -->
                            <input type="file" id="fileInput" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Attachment</button>
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