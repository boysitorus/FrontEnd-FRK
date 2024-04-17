@extends('Template.asesorDetail')

@section('content-kegiatan')

{{-- BAGIAN A --}}
<div id="pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</b></h6>
        <hr />
    
        <div class="text-sm">
            <table id="tabelPendidikan-A" class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                style="border: 2px;">

                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Tatap Muka</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Evaluasi</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Mata Kuliah</th>
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
                        <td>Kegiatan 1</td>
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
<div id="pendidikan-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Asistensi tugas atau praktikum terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePendidikan-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Praktikum (1 SKS =
                                2
                                jam)</th>
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
                            <td>Kegiatan 1</td>
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

<div id="pendidikan-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan,
                    dan DPL (Dosen Pembimbing lapangan)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan
                            </th>
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

<div id="pendidikan-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Seminar yang terjadwal terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePendidikan-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
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
                            <td>Kegiatan 1</td>
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
<div id="pendidikan-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan
                    pembimbing penyerta dinilai sama</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
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
<div id="pendidikan-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menguji proposal S1, S2, S3, Kualifikasi</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePendidikan-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
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
<div id="pendidikan-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen Bimbingan</th>
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
<div id="pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                    yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah SAP</th>
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
<div id="pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen (Maks. 2/smt)
                            </th>
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
<div id="pendidikan-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="allign-middle fw-bold col-3">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Kegiatan 1</td>
                            <td>Kegiatan 1</td>
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