@extends('Template.rencana')


@section('content-kegiatan')

{{-- TAMPILAN BAGIAN PENDIDIKAN --}}

{{-- BAGIAN A --}}
<div id="pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap  setiap kelompok</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitian-A" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_A">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tabelPendidikan-A" class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Tatap Muka</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Evaluasi</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Mata Kuliah</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                        <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold">Asesor 1</th>
                        <th scope="col" class="fw-bold">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row">1</td>
                        <td>Lorem ipsum dolor sit amet consectetur. </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_A"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN A --}}

{{-- BAGIAN B --}}
<div id="pendidikan-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>B. Asistensi tugas atau praktikum terhadap setiap kelompok</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_B">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-B" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah K (*K=30 orang mhs selama 1 semester) </th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah kelompok yang dibimbing</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Matakuliah (1 SKS = 2 jam)</th>
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
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_B"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN B --}}

{{-- BAGIAN C --}}
<div id="pendidikan-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan, dan DPL (Dosen Pembimbing lapangan)</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_C">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-C" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan</th>
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
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_C"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN C --}}


{{-- BAGIAN D --}}
<div id="pendidikan-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>D. Seminar yang terjadwal terhadap setiap kelompok</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianD" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_D">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-D" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                        <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN D --}}

{{-- BAGIAN E --}}
<div id="pendidikan-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO  (Diploma) dan S1 Dosen Pembimbing utama dan pembimbing penyerta dinilai sama</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianE" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_D">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-E" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Dibimbing</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN E --}}

{{-- BAGIAN F --}}
<div id="pendidikan-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>F. Menguji proposal S1, S2, S3, Kualifikasi</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianF" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_F">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-F" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN F --}}

{{-- BAGIAN G --}}
<div id="pendidikan-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_G">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-G" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen Bimbingan</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN G --}}


{{-- BAGIAN H --}}
<div id="pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus,  SAP/RPP, GBPP, dll) dalam kelompok atau mandiri yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianH" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_H">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-H" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah SAP</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN H --}}


{{-- BAGIAN I --}}
<div id="pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>I. Melaksanakan kegiatan detasering dan pencangkokan  dosen dalam 1 semester</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianI" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_I">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-I" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen (Maks. 2/smt)</th>
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
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN I --}}

{{-- BAGIAN J --}}
<div id="pendidikan-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>J. Koordinator Tugas  Akhir/Skripsi, Proyek Akhir  atau KP</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianJ" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_J">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-J" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-4">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-4">SKS Terhitung</th>
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
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN J --}}

{{-- BAGIAN K --}}
<div id="pendidikan-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>K. Asistensi tugas atau praktikum terhadap setiap kelompok.</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianK" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal" data-bs-target="#modalPendidikan_K">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-K" class="table table-striped table-bordered mt-2 text-center align-middle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan</th>
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
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td class="text-start">Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <button type="button" class="btn btn-secondary mr-1"><i class="bi bi-eyedropper"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-trash3-fill"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN K --}}

{{-- TEMPAT MODAL TAMBAH KEGIATAN--}}

{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalPendidikan_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kelas Tatap Muka</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jumlah Kelas Evaluasi</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Mata Kuliah</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL A --}}

{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalPendidikan_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Asistensi tugas atau praktikum terhadap setiap kelompok</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah K (*K=30 orang mhs selama 1 semester) </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jumlah kelompok yang dibimbing :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Matakuliah (1 SKS = 2 jam)</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL B --}}

{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalPendidikan_C" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan, dan DPL (Dosen Pembimbing lapangan)</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Mahasiswa Bimbingan</label>
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
{{-- AKHIR MODAL C --}}

{{-- MULAI MODAL D --}}
<div class="modal fade modal-lg" id="modalPendidikan_D" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">D. Seminar yang terjadwal terhadap setiap kelompok</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kelompok</label>
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
{{-- AKHIR MODAL D --}}

{{-- MULAI MODAL E --}}
<div class="modal fade modal-lg" id="modalPendidikan_E" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO  (Diploma) dan S1 Dosen Pembimbing utama dan pembimbing penyerta dinilai sama</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kelompok Dibimbing</label>
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
{{-- AKHIR MODAL E --}}

{{-- MULAI MODAL F --}}
<div class="modal fade modal-lg" id="modalPendidikan_F" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">F. Menguji proposal S1, S2, S3, Kualifikasi</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Mahasiswa Dibimbing</label>
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
{{-- AKHIR MODAL F --}}


{{-- MULAI MODAL G --}}
<div class="modal fade modal-lg" id="modalPendidikan_G" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Dosen Bimbingan</label>
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
{{-- AKHIR MODAL G -}}


{{-- MULAI MODAL H --}}
<div class="modal fade modal-lg" id="modalPendidikan_H" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">H. Mengembangkan program perkuliahan/pengajaran (Silabus,  SAP/RPP, GBPP, dll) dalam kelompok atau mandiri yang hasilnya dipakai untuk kegiatan perkuliahan</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah SAP</label>
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
{{-- AKHIR MODAL H --}}


{{-- MULAI MODAL I --}}
<div class="modal fade modal-lg" id="modalPendidikan_I" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">I. Melaksanakan kegiatan detasering dan pencangkokan  dosen dalam 1 semester</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Dosen (Maks. 2/smt)</label>
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
{{-- AKHIR MODAL I --}}

{{-- MULAI MODAL J --}}
<div class="modal fade modal-lg" id="modalPendidikan_J" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
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
{{-- AKHIR MODAL J --}}

{{-- MULAI MODAL K --}}
<div class="modal fade modal-lg" id="modalPendidikan_K" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">K. Asistensi tugas atau praktikum terhadap setiap kelompok.</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Mhasiswa Bimbingan :</label>
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
{{-- AKHIR MODAL K --}}


{{--TEMPAT MODAL EDIT --}}
{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalEditPendidikan_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kelas Tatap Muka</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jumlah Kelas Evaluasi</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Mata Kuliah</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditConfirm">Simpan  Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL A --}}

{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalEditPendidikan_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Asistensi tugas atau praktikum terhadap setiap kelompok</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah K (*K=30 orang mhs selama 1 semester) </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jumlah kelompok yang dibimbing :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Matakuliah (1 SKS = 2 jam)</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL B --}}

{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalEditPendidikan_C" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan, dan DPL (Dosen Pembimbing lapangan)</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Mahasiswa Bimbingan</label>
                        <input class="form-control" type="text">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL C --}}


{{-- TEMPAT MODAL EDIT CONFIRM --}}
<div class="modal fade" id="modalEditConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-question-circle text-warning"></i></h1>
                <h5>Yakin untuk menyimpan perubahan kegiatan ini?</h5>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <button id="confirmEditBtn" type="button" class="btn btn-primary">Yakin</button>
            </div>
        </div>
    </div>
</div>

{{-- TEMPAT MODAL DELETE CONFIRM --}}
<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-x-circle text-danger"></i></h1>
                <h5>Yakin untuk menghapus kegiatan ini?</h5>
                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'</p>
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
  <div id="editToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
        <i class="bi bi-check2-circle"></i>
        Berhasil Mengubah Kegiatan
    </div>
  </div>
</div>

{{-- TOAST DELETE --}}
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="deleteToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
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
        setTimeout(function () {
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
        setTimeout(function () {
            $('#deleteToast').removeClass('show');
        }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
    }
</script>

@endsection
