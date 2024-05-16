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
                        @if (isset($penelitian_kelompok) && sizeof($penelitian_kelompok) > 0)
                            @php
                                $counter = 1;
                                $apiUrl = env('API_FED_SERVICE') . '/penelitian/penelitian-kelompok';
                            @endphp
                            @foreach ($penelitian_kelompok as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['posisi'] }}</td>
                                    <td>{{ $item['jumlah_anggota'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE A --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">A. Kuliah (Teori) pada tingkat Diploma
                                                    dan S1 terhadap setiap kelompok</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form id="uploadForm-A-{{ $item['id_rencana'] }}" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>Surat Keterangan dari Pimpinan/Ka LPPM atau Surat Kontrak Penelitian</li>
                                                                <li>Proposal</li>
                                                                <li>Laporan progress report bila belum selesai</li>
                                                                <li>Surat pernyataan dari Ka LPPM bahwa penelitian sudah selesai</li>
                                                                <li>Laporan akhir penelitian (termasuklog book)</li>
                                                                <li>Foto karya seni / bukti lain yang relevan jika terkait dengan pengembangan teknologi
                                                                </li>
                                                            </ol>
                                                            <!-- File input -->
                                                            <button  type="button" id="addFilesBtnPenelitianA" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                            <!-- tambahkan jarak bawah -->
                                                            <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                <div id="selectedFilesPenelitianA"></div>
                                                            </div>
                                                            <input type="file" id="fileInputPenelitianA" name="fileInputPenelitianA[]" style="display: none;" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" id="buttonUpload-A-{{ $item['id_rencana'] }}" class="btn btn-primary">Upload Lampiran</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE A --}}
                                <script>
                                    const id_rencana = "{{ $item['id_rencana'] }}"
                                    const formId = "uploadForm-A-{{ $item['id_rencana'] }}"
                                    document.getElementById(`buttonUpload-A-${id_rencana}`).addEventListener('click', function() {
                                        uploadFiles(formId, "{{ $apiUrl }}");
                                    });
                                </script>
                            @endforeach
                        @endif
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
                                    data-bs-target="#modalEditPenelitian_B"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- MODAL UPLOAD B--}}
    <div class="modal fade" id="modalEditPenelitian_B" tabindex="-1" aria-labelledby="modalEditPenelitian_B_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_B_label">B. Pelaksanaan penelitian mandiri atau pembuatan
                            karya seni atau teknologi (disetujui oleh pimpinan dan tercatat) </h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Surat Keterangan dari Pimpinan
                                        / Ka LPPM atau Surat Kontrak Penelitian</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Proposal</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Laporan progress report bila belum selesai</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Surat pernyataan dari Ka LPPM
                                        bahwa penelitian sudah selesai</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Laporan akhir penelitian (termasuk
                                        log book)</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Foto karya seni / bukti lain yang
                                        relevan jika terkait dengan pengembangan teknologi</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD B --}}

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
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenelitian_C">Tambah Lampiran</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--AKHIR BAGIAN C --}}

    {{-- TEMPAT MODAL ADD FILE C--}}
    <div class="modal fade" id="modalEditEvaluasiPenelitian_C" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPenelitianCLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya \ 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Buku yang sudah terbit</li>
                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                    <li>Surat Keterangan Sedang Menulis
                                        Buku dari Pimpinan bagi yang sedang menulis buku, dengan mencantumkan akan selesai dalam
                                        berapa lama, bagi yang sedang menulis.</li>
                                    <li>Progres penulisan buku dll., bagi yang sedang dalam proses</li>
                                </ol>
                                <!-- File input -->
                                <button id="addFilesBtnC" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFilesC"></div>
                                </div>
                                <input type="file" id="fileInputC" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE C--}}

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
                    @if (isset($buku_internasional) && sizeof($buku_internasional) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($buku_internasional as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{$item['nama_kegiatan']}}</td>
                                <td>{{$item['status_tahapan']}}</td>
                                <td>{{$item['jenis_pengerjaan']}}</td>
                                <td>{{$item['peran']}}</td>
                                <td>{{$item['sks_terhitung']}}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_D">Tambah Lampiran</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- TEMPAT MODAL ADD FILE D--}}
    <div class="modal fade" id="modalEditEvaluasiPenelitian_D" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">D. Menulis satu judul naskah buku internasional
                        (berbahasa dan diedarkan secara internasional minimal  tiga negara),
                        disetujui oleh pimpinan dan tercatat</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('ed-add-buku-internasional') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                    <ol>
                                        <li>Buku yang sudah terbit</li>
                                        <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                        <li>Surat Keterangan Sedang Menulis
                                            Buku dari Pimpinan bagi yang sedang menulis buku, dengan mencantumkan akan selesai dalam
                                            berapa lama, bagi yang sedang menulis.</li>
                                        <li>Progres penulisan buku dll., bagi yang sedang dalam proses</li>
                                    </ol>
                                    <!-- File input -->
                                    <button type="button" id="addFilesBtnD" class="btn btn-secondary">Add Files</button>
                                    <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                    <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                    <!-- tambahkan jarak bawah -->
                                    <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                        <div id="selectedFilesD"></div>
                                    </div>
                                    <input type="file" id="fileInputD" name="fileInputD[]" style="display: none;" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL ADD FILE D--}}

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
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_E">Tambah Lampiran</button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- MODAL UPLOAD E --}}
    <div class="modal fade" id="modalEditPenelitian_E" tabindex="-1" aria-labelledby="modalEditPenelitian_E_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditPenelitian_E_label">E.Menterjemahkan atau menyadur naskah buku teks yang
                        akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks </h6>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Buku yang sudah terbit</li>
                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                    <li>Surat Keterangan Sedang Menulis Buku dari Pimpinan bagi yang sedang menulis buku, dengan mencantumkan akan selesai dalam
                                        berapa lama, bagi yang sedang menulis</li>
                                    <li>Progres penulisan buku dll., bagi yang sedang dalam proses</li>
                                </ol>
                                <!-- File input -->
                                <button id="addFilesBtnE" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <div class="mt-3 mb-3">
                                    <div id="selectedFilesE"></div>
                                </div>
                                <input type="file" id="fileInputE" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD E --}}

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
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_F">Tambah Lampiran</button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- MODAL UPLOAD F --}}
    <div class="modal fade" id="modalEditPenelitian_F" tabindex="-1" aria-labelledby="modalEditPenelitian_F_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_F_label">F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu
                            sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat) sama dengan 2 sks </h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas atau Surat Keterangan Telah Menyunting Buku dari Pimpinan dengan
                                        mencantumkan akan selesai dalam berapa lama.</li>
                                    <li>Buku yang sudah terbit</li>
                                    <li>bukti kontrak penerbitan jika masih naik cetak</li>
                                    <li>Progres penyuntingan naskah buku</li>
                                </ol>
                                <!-- File input -->
                                <button id="addFilesBtnF" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <div class="mt-3 mb-3">
                                    <div id="selectedFilesF"></div>
                                </div>
                                <input type="file" id="fileInputF" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD F --}}

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
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenelitian_G">Tambah Lampiran</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- MODAL UPLOAD G --}}
    <div class="modal fade" id="modalEditPenelitian_G" tabindex="-1" aria-labelledby="modalEditPenelitian_G_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_G_label">G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen  yang sesuai dengan
                            bidang ilmu dan tidak diterbitkan,  tetapi digunakan oleh mahasiswa</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat Tugas atau Surat Keputusan Mengajar (mata kuliah yang dimodulkan) dari Pimpinan</li>
                                    <li>Modul/Diktat/Bahan Ajar yang sudah jadi</li>
                                    <li>Bukti lain yang menunjukkan bahwa modul/diktat/bahan ajar
                                        sudah dipergunakan oleh mahasiswa</li>
                                </ol>
                                <!-- File input -->
                                <button id="addFilesBtnG" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <div class="mt-3 mb-3">
                                    <div id="selectedFilesG"></div>
                                </div>
                                <input type="file" id="fileInputG" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD G --}}

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
                                    data-bs-target="#modalEditPenelitian_H"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- MODAL UPLOAD H --}}
    <div class="modal fade" id="modalEditPenelitian_H" tabindex="-1" aria-labelledby="modalEditPenelitian_H_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_H_label">H. PEKERTI/AA</h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Surat Tugas Mengikuti Program Pekerti dari Pimpinan </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Sertifikat </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Tugas yang diselesaikan selama pelatihan seperti RKPSS yang
                                        sudah siap dll.  </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD H --}}

    {{-- BAGIAN I --}}
    <div id="penelitian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b>
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
                                    data-bs-target="#modalEditPenelitian_I"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- MODAL UPLOAD I --}}
    <div class="modal fade" id="modalEditPenelitian_I" tabindex="-1" aria-labelledby="modalEditPenelitian_I_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_I_label">I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Surat Tugas Mengikuti Program Pekerti dari Pimpinan </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>vSurat permohonan dari institusi lain </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Lembar Pengesahan/bukti kegiatan yg disahkan atasan </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD I --}}

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
                                    data-bs-target="#modalEditPenelitian_J"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- MODAL UPLOAD J --}}
    <div class="modal fade" id="modalEditPenelitian_J" tabindex="-1" aria-labelledby="modalEditPenelitian_J_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_J_label">J. Menulis jurnal ilmiah</h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Jurnal yang sudah diterbitkan atau surat
                                        keterangan/penerimaan dr redaksi & naskah, bagi yang belum diterbitkan. </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD J --}}

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
                                    data-bs-target="#modalEditPenelitian_K"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- MODAL UPLOAD K --}}
    <div class="modal fade" id="modalEditPenelitian_K" tabindex="-1" aria-labelledby="modalEditPenelitian_K_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_K_label">K. Memperoleh hak paten</h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Surat/sertifikat paten atau surat
                                        keterangan dari Pimpinan  </b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD K --}}

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
                                    data-bs-target="#modalEditPenelitian_L"><i class="bi bi-plus-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN L --}}

    {{-- MODAL UPLOAD L --}}
    <div class="modal fade" id="modalEditPenelitian_L" tabindex="-1" aria-labelledby="modalEditPenelitian_L_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenelitian_L_label">L. Menulis di media massa (Koran/majalah: tulisan berupa opini,
                            form diskusi, kritik, kajian ilmiah, ulasan ahli/pakar yang terkait dengan keahlian bidang ilmunya)</h5>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b> Foto kopi tulisan yang dimuat di
                                        Koran/majalah</b></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#modalBatal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD L --}}

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
                            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenelitian_M">Tambah Lampiran</button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN M --}}

    {{-- MODAL UPLOAD M --}}
    <div class="modal fade" id="modalEditEvaluasiPenelitian_M" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditEvaluasiPendidikanMLabel">M. Menyampaikan orasi ilmiah, pembicara dalam seminar,
                            narasumber terkait dengan bidang keilmuannya</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi: </h6>
                                <ol>
                                    <li>Surat Permohonan sebagai  Pembicara/Nara Sumber</li>
                                    <li>Surat tugas/ijin/persetujuan dari  Pimpinan</li>
                                    <li>Naskah/ materi yang diberikan</li>
                                    <li>Sertifikat (jika ada)</li>
                                </ol>
                                <!-- File Input -->
                                <button id="addFileBtn" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p> <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3">
                                    <div id="selecteedFiles"></div>
                                </div>
                                <input type="file" id="fileInput" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD M --}}

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
                            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenelitian_N">Tambah Lampiran</button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN N --}}

    {{-- MODAL UPLOAD N --}}
    <div class="modal fade" id="modalEditEvaluasiPenelitian_N" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditEvaluasiPendidikanNLabel">N. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="mol-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi: </h6>
                                <ol>
                                    <li>Surat Penerimaan untuk disajkina dari Panitia</li>
                                    <li>Surat tugas/ijin/persetujuan dari Pimpinan</li>
                                    <li>Naskah/materi yang diberikan</li>
                                    <li>Sertifikat (jika ada)</li>
                                </ol>
                                <!-- File Input -->
                                <button id="addFilesBtnN" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- Tambahkan jarak bawah -->
                                <div class="mt-3 mb-3">
                                    <div id="selectedFilesN"></div>
                                </div>
                                <input type="file" id="fileInputN" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadFiles()">Upload Lampiran</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL UPLOAD N --}}


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

    {{-- MODAL BATAL UPLOAD --}}
    <div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="modalBatal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center" style="padding: 8%;">
                    <h5 class="modal-title" id="modalBatal_label py-5">Apakah anda yakin untuk membatalkan pengumpulan lampiran?</h5>
                    <div class="my-4">
                        <button type="button" class="btn btn-primary mx-3" data-bs-dismiss="modal">Yakin</button>
                        <button type="button" class="btn btn-secondary mx-3">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN MODAL BATAL UPLOAD --}}

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



        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya A
        function displayFilesWithIconsPenelitianA(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesPenelitianA');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesPenelitianA = selectedFilesPenelitianA.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesPenelitianA.length; i++) {
                var file = selectedFilesPenelitianA[i];
                if (!file) continue; // Lewati file yang telah dihapus

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
                var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

                var fileListItem = document.createElement('div');
                fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

                // Tambahkan ikon/gambar
                var fileIconImg = document.createElement('img');
                fileIconImg.src = '/assets/img/' + fileIcon;
                fileIconImg.alt = 'File Icon';
                fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
                fileListItem.appendChild(fileIconImg);

                // Tambahkan nama file
                var fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = fileName;
                fileListItem.appendChild(fileNameSpan);

                // Tambahkan tombol hapus
                var deleteBtn = document.createElement('button');
                deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesPenelitianA.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesPenelitianA.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya B
        function displayFilesWithIconsB(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesB');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesB = selectedFilesB.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesB.length; i++) {
                var file = selectedFilesB[i];
                if (!file) continue; // Lewati file yang telah dihapus

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
                var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

                var fileListItem = document.createElement('div');
                fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

                // Tambahkan ikon/gambar
                var fileIconImg = document.createElement('img');
                fileIconImg.src = '/assets/img/' + fileIcon;
                fileIconImg.alt = 'File Icon';
                fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
                fileListItem.appendChild(fileIconImg);

                // Tambahkan nama file
                var fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = fileName;
                fileListItem.appendChild(fileNameSpan);

                // Tambahkan tombol hapus
                var deleteBtn = document.createElement('button');
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'ms-2');
                // deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesB.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesD.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya C
        function displayFilesWithIcons(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesC');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFiles = selectedFiles.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFiles.length; i++) {
                var file = selectedFiles[i];
                if (!file) continue; // Lewati file yang telah dihapus

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
                var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

                var fileListItem = document.createElement('div');
                fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

                // Tambahkan ikon/gambar
                var fileIconImg = document.createElement('img');
                fileIconImg.src = '/assets/img/' + fileIcon;
                fileIconImg.alt = 'File Icon';
                fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
                fileListItem.appendChild(fileIconImg);

                // Tambahkan nama file
                var fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = fileName;
                fileListItem.appendChild(fileNameSpan);

                // Tambahkan tombol hapus
                var deleteBtn = document.createElement('button');
                deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFiles.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFiles.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya D
        function displayFilesWithIcons(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesD');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFiles = selectedFiles.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFiles.length; i++) {
                var file = selectedFiles[i];
                if (!file) continue; // Lewati file yang telah dihapus

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
                var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

                var fileListItem = document.createElement('div');
                fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

                // Tambahkan ikon/gambar
                var fileIconImg = document.createElement('img');
                fileIconImg.src = '/assets/img/' + fileIcon;
                fileIconImg.alt = 'File Icon';
                fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
                fileListItem.appendChild(fileIconImg);

                // Tambahkan nama file
                var fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = fileName;
                fileListItem.appendChild(fileNameSpan);

                // Tambahkan tombol hapus
                var deleteBtn = document.createElement('button');
                deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFiles.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFiles.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        function getFileIcon(extension) {
            switch (extension.toLowerCase()) {
                case 'pdf':
                    return 'pdf.png';
                case 'doc':
                case 'docx':
                    return 'word.png';
                case 'xls':
                case 'xlsx':
                    return 'sheets.png';
                case 'png':
                case 'jpg':
                case 'jpeg':
                    return 'photo.png';
                default:
                    return 'document.png';
            }
        }

        // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
        document.getElementById('fileInputPenelitianA').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsPenelitianA(files);
        });
        document.getElementById('fileInputB').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsB(files);
        });
        document.getElementById('fileInputC').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIcons(files);
        });
        document.getElementById('fileInputD').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIcons(files);
        });

        // Fungsi untuk menambah file A
        document.getElementById('addFilesBtnPenelitianA').addEventListener('click', function() {
            var fileInput = document.getElementById('fileInputPenelitianA');
            fileInput.click();
        });
        document.getElementById('addFilesBtnC').addEventListener('click', function() {
            var fileInput = document.getElementById('fileInputC');
            fileInput.click();
        });
        document.getElementById('addFilesBtnD').addEventListener('click', function() {
            var fileInput = document.getElementById('fileInputD');
            fileInput.click();
        });

        var selectedFilesPenelitianA = [];
        var selectedFilesB = [];
        var selectedFilesC = [];
        var selectedFilesD = [];
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editButton = document.querySelector("#modalEditButton");

            editButton.addEventListener("click", function() {
                var modalEdit = new bootstrap.Modal(document.querySelector("#modalEditPenelitian_A"));
                modalEdit.show();
            });
        });
    </script>

@endsection
