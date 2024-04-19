@extends('Template.asesorDetail')

@section('content-kegiatan')

{{-- BAGIAN A --}}
<div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tabelpengabdian-A" class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
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
<div id="pengabdian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
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
{{-- AKHIR BAGIAN B --}}

{{-- BAGIAN C --}}

<div id="pengabdian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa), Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa), BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian), Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
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
{{-- AKHIR BAGIAN C --}}

{{-- BAGIAN D --}}

<div id="pengabdian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a. Koperasi fakultas, b. Dharma wanita, c.  Takmir Masjid/Pastoran</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
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
{{-- AKHIR BAGIAN D --}}


{{--BAGIAN E --}}
<div id="pengabdian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
{{--AKHIR BAGIAN E --}}

{{-- BAGIAN F --}}
<div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan</th>
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
{{--AKHIR BAGIAN F --}}

{{-- BAGIAN G --}}
<div id="pengabdian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
{{-- AKHIR BAGIAN G--}}

{{-- BAGIAN H --}}
<div id="pengabdian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2  semester), seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan</th>
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
{{--AKHIR BAGIAN H --}}

{{-- BAGIAN I --}}
<div id="pengabdian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
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
<div id="pengabdian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Tingkat Jabatan</th>
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
<div id="pengabdian-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan (Ketua/Anggota)</th>
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
<div id="pengabdian-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan (Ketua/Anggota)</th>
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
<div id="pengabdian-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>M. Peserta seminar/workshop/kursus berdasar penugasan  pimpinan</b></h6>
            <hr />
            <div class="text-sm">
                <table id="pengabdian-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Tingkatan</th>
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
