@extends('Template.asesorDetail')

@section('content-kegiatan')

{{-- BAGIAN A --}}
<div id="penelitian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tabelpenelitian-A" class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                style="border: 2px;">

                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Anggota)</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jumlah Anggota</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                    </tr>
                </thead>

                <tbody class="align-middle">
                    <tr>
                        <td scope="row">1</td>
                        <td>Kegiatan 1</td>
                        <td>Kegiatan 1</td>
                        <td>Kegiatan 1</td>
                        <td>Kegiatan 1</td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal" data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                            <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                        </div>
                        </td>
                    </tr>

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
                <table id="tablepenelitian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi(Ketua/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
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
            <h6><b>C. Menulis 1 judul naskah buku yang akan diterbitkan  dalam waktu sebanyak-banyaknya 4 semester (disetujui  oleh pimpinan dan tercatat)sama dengan 3 sks.</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{-- AKHIR BAGIAN C --}}

{{-- BAGIAN D --}}

<div id="penelitian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional  (berbahasa dan diedarkan secara internasional minimal  tiga negara), disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepenelitian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{-- AKHIR BAGIAN D --}}


{{--BAGIAN E --}}
<div id="penelitian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama  dengan 2 sks</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Ketua/ Editor/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{--AKHIR BAGIAN E --}}

{{-- BAGIAN F --}}
<div id="penelitian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat) sama dengan 2 sks</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepenelitian-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Penulis Utama/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{--AKHIR BAGIAN F --}}

{{-- BAGIAN G --}}
<div id="penelitian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen  yang sesuai dengan bidang ilmu dan tidak diterbitkan,  tetapi digunakan oleh mahasiswa</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah anggota tim</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{-- AKHIR BAGIAN G--}}

{{-- BAGIAN H --}}
<div id="penelitian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. PEKERTI/AA</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{--AKHIR BAGIAN H --}}

{{-- BAGIAN I --}}
<div id="penelitian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Banyaknya BKD yang Dievaluasi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{-- AKHIR BAGIAN I --}}

{{-- BAGIAN J --}}
<div id="penelitian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Menulis jurnal ilmiah</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
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
                <table id="tablepenelitian-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
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
            <h6><b>L. Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
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
            <h6><b>M. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"data-bs-target="#modalSetuju"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal"data-bs-target="#staticBackdrop"><i class="bi bi-x-lg"></i></button>
                            </td>
                            <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tambahkan Komentar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
{{-- AKHIR BAGIAN M --}}


{{-- MODAL SETUJU --}}
<div class="modal fade text-center" id="modalSetuju" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1><i class="bi bi-check-circle text-success"></i></h1>
        <h5>Yakin untuk menyetujui kegiatan ini?</h5>
        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success">Yakin</button>
      </div>
    </div>
  </div>
</div>
{{--AKHIR MODAL SETUJUI --}}

{{--MODAL TOLAK--}}
<div class="modal fade text-center" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1><i class="bi bi-x-circle text-danger"></i></h1>
        <h5>Yakin untuk menolak kegiatan ini?</h5>
        <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-danger">Yakin</button>
      </div>
    </div>
  </div>
</div>
{{-- AKHIR MODAL TOLAK --}}

@endsection
