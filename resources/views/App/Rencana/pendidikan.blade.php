@extends('Template.rencana')


@section('content')

{{-- TAMPILAN BAGIAN PENDIDIKAN --}}

{{-- BAGIAN A --}}
<div id="pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap  setiap kelompok</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitian-A" type="button" class="btn btn-success col-md-auto m-3" data-bs-toggle="modal" data-bs-target="#modalPendidikan_A">
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
                        <td></td>
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
                        <td></td>
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
            <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto m-3" data-bs-toggle="modal" data-bs-target="#modalPendidikan_B">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-B" class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
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
                        <td></td>
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
                        <td></td>
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
            <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto m-3" data-bs-toggle="modal" data-bs-target="#modalPendidikan_C">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table id="tablePendidikan-C" class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan</th>
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
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN C --}}




{{-- TEMPAT MODAL --}}

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

@endsection