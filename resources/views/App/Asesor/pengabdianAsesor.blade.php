@extends('Template.asesorDetail')

@section('content-kegiatan')


{{-- BAGIAN A --}}
<div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
        <hr/>
        <div class="text-sm">
            <table id="tabelpengabdian-A" class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                style="border: 2px;">

                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
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
            <h6><b>B. Memberikan penyuluhan/penataran kepada masyarakat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
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
            <h6><b>C. Memberikan jasa konsultan yang relevan dengan  kepakarannya atas persetujuan/penugasan pimpinan PT</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
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
            <h6><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber – ISBN</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahapan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Penulis Utama/Penulis lainnya)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
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
            <h6><b>E. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, ada editor, tiap chapter ada kontributor</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahapan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Editor/Kontributor)</th>
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
<div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis karya pengabdian yang dipakai sebagai Modul Pelatihan oleh seorang Dosen (Tidak diterbitkan, tetapi digunakan oleh siswa mahasiswa</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahapan</th>
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
