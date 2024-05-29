@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENGABDIAN --}}

    {{-- BAGIAN A --}}

    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Durasi Kegiatan</th>
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
                        @if (isset($kegiatan) && sizeof($kegiatan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($kegiatan as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                            <div class="badge text-bg-warning">
                                                Lampiran belum diupload.
                                            </div>
                                            @else
                                            <div class="badge text-bg-success   ">
                                                Lampiran sudah diisi.
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_durasi'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEditEvaluasiPengabdian_A_{{ $item['id_rencana'] }}">Tambah
                                                Lampiran</button>

                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE A --}}
                                <div class="modal fade" id="modalEditEvaluasiPengabdian_A_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianALabel">A. Satu kegiatan yang setara dengan 50 jam kerja</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-pengabdian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_pengabdian"
                                                        value="kegiatan">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Permohonan/undangan atau surat penerimaan dari lembaga yang menjadi sasaran pengabdian masyarakat</li>
                                                                    <li>Surat tugas/ijin/persetujuan dari pimpinan</li>
                                                                    <li>Laporan kegiatan</li>
                                                                    <li>Materi yang disampaikan</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPengabdianA-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPengabdianA-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>

                                                                <div id="existsFiles">
                                                                    {{-- Menampilkan file lampiran yang sudah ada --}}
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $i)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $i,
                                                                                    PATHINFO_EXTENSION,
                                                                                );

                                                                                $extension = '';

                                                                                // Determine the icon filename based on the extension
                                                                                switch ($checkExtension) {
                                                                                    case 'pdf':
                                                                                        $extension = 'pdf.png';
                                                                                        break;
                                                                                    case 'doc':
                                                                                    case 'docx':
                                                                                        $extension = 'word.png';
                                                                                        break;
                                                                                    case 'xls':
                                                                                    case 'xlsx':
                                                                                        $extension = 'sheets.png';
                                                                                        break;
                                                                                    case 'png':
                                                                                    case 'PNG':
                                                                                    case 'jpg':
                                                                                    case 'jpeg':
                                                                                        $extension = 'photo.png';
                                                                                        break;
                                                                                    default:
                                                                                        $extension = 'document.png';
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="file-item d-flex align-items-center mb-2 border rounded p-3">
                                                                                <img src="{{ '/assets/img/' . $extension }}"
                                                                                    alt="File Icon" width="30" />
                                                                                <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
                                                                                    class="ms-2">{{ $i }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFilePengabdian('{{ $item['id_rencana'] }}', '{{ base64_encode($i) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2"><i
                                                                                            class="bi bi-x"></i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>

                                                                <input type="file"
                                                                    id="fileInputPengabdianA-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" id="btnUploadPengabdianA-{{ $item['id_rencana'] }}" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE A --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPengabdianA-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPengabdianA-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPengabdianA-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPengabdianA-{{ $item['id_rencana'] }}");
                                        fileInput.click();
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
    <div id="pengabdian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Memberikan penyuluhan/penataran kepada masyarakat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Jumlah</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($penyuluhan) && sizeof($penyuluhan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($penyuluhan as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                            <div class="badge text-bg-warning">
                                                Lampiran belum diupload.
                                            </div>
                                            @else
                                            <div class="badge text-bg-success   ">
                                                Lampiran sudah diisi.
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_durasi'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEditEvaluasiPengabdian_B_{{ $item['id_rencana'] }}">Tambah
                                                Lampiran</button>

                                    </td>
                                </tr>

                                {{-- TEMPAT MODAL ADD FILE B --}}
                                <div class="modal fade" id="modalEditEvaluasiPengabdian_B_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianALabel">B. Memberikan penyuluhan/penataran kepada masyarakat</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-pengabdian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_pengabdian"
                                                        value="penyuluhan">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Permohonan/undangan atau surat penerimaan dari lembaga yang menjadi sasaran pengabdian masyarakat</li>
                                                                    <li>Surat tugas/ijin/persetujuan dari pimpinan</li>
                                                                    <li>Laporan kegiatan</li>
                                                                    <li>Materi yang disampaikan</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPengabdianB-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFilesPengabdianB-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>

                                                                <div id="existsFiles">
                                                                    {{-- Menampilkan file lampiran yang sudah ada --}}
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $i)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $i,
                                                                                    PATHINFO_EXTENSION,
                                                                                );

                                                                                $extension = '';

                                                                                // Determine the icon filename based on the extension
                                                                                switch ($checkExtension) {
                                                                                    case 'pdf':
                                                                                        $extension = 'pdf.png';
                                                                                        break;
                                                                                    case 'doc':
                                                                                    case 'docx':
                                                                                        $extension = 'word.png';
                                                                                        break;
                                                                                    case 'xls':
                                                                                    case 'xlsx':
                                                                                        $extension = 'sheets.png';
                                                                                        break;
                                                                                    case 'png':
                                                                                    case 'PNG':
                                                                                    case 'jpg':
                                                                                    case 'jpeg':
                                                                                        $extension = 'photo.png';
                                                                                        break;
                                                                                    default:
                                                                                        $extension = 'document.png';
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="file-item d-flex align-items-center mb-2 border rounded p-3">
                                                                                <img src="{{ '/assets/img/' . $extension }}"
                                                                                    alt="File Icon" width="30" />
                                                                                <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
                                                                                    class="ms-2">{{ $i }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFilePengabdian('{{ $item['id_rencana'] }}', '{{ base64_encode($i) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2"><i
                                                                                            class="bi bi-x"></i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>

                                                                <input type="file"
                                                                    id="fileInputPengabdianB-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE B --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPengabdianB-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPengabdianB-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPengabdianB-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPengabdianB-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="pengabdian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Memberikan jasa konsultan yang relavan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Proyek</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Jumlah</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($konsultan) && sizeof($konsultan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($konsultan as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                            <div class="badge text-bg-warning">
                                                Lampiran belum diupload.
                                            </div>
                                            @else
                                            <div class="badge text-bg-success   ">
                                                Lampiran sudah diisi.
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['posisi'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                                data-bs-target="#modalEditEvaluasiPengabdian_C_{{ $item['id_rencana'] }}">Tambah
                                                Lampiran</button></td>
                                </tr>

                                {{-- TEMPAT MODAL ADD FILE C --}}
                                <div class="modal fade" id="modalEditEvaluasiPengabdian_C_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianALabel">C. Memberikan jasa konsultan yang relavan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-pengabdian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_pengabdian"
                                                        value="konsultan">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Permohonan/Persetujuan/ Keputusan/Penunjukkan sebagai Konsultan/ Tenaga Ahli/Staf Ahli dari institusi terkait</li>
                                                                    <li>Laporan progres layanan konsultasi, bagi yang sedang berjalan</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPengabdianC-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFilesPengabdianC-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>

                                                                <div id="existsFiles">
                                                                    {{-- Menampilkan file lampiran yang sudah ada --}}
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $i)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $i,
                                                                                    PATHINFO_EXTENSION,
                                                                                );

                                                                                $extension = '';

                                                                                // Determine the icon filename based on the extension
                                                                                switch ($checkExtension) {
                                                                                    case 'pdf':
                                                                                        $extension = 'pdf.png';
                                                                                        break;
                                                                                    case 'doc':
                                                                                    case 'docx':
                                                                                        $extension = 'word.png';
                                                                                        break;
                                                                                    case 'xls':
                                                                                    case 'xlsx':
                                                                                        $extension = 'sheets.png';
                                                                                        break;
                                                                                    case 'png':
                                                                                    case 'PNG':
                                                                                    case 'jpg':
                                                                                    case 'jpeg':
                                                                                        $extension = 'photo.png';
                                                                                        break;
                                                                                    default:
                                                                                        $extension = 'document.png';
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="file-item d-flex align-items-center mb-2 border rounded p-3">
                                                                                <img src="{{ '/assets/img/' . $extension }}"
                                                                                    alt="File Icon" width="30" />
                                                                                <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
                                                                                    class="ms-2">{{ $i }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFilePengabdian('{{ $item['id_rencana'] }}', '{{ base64_encode($i) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2"><i
                                                                                            class="bi bi-x"></i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>

                                                                <input type="file"
                                                                    id="fileInputPengabdianC-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE C --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPengabdianC-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPengabdianC-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPengabdianC-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPengabdianC-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="pengabdian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber-ISBN</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePengabdian-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahapan</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold col-1">Asesor 1</th>
                        <th scope="col" class="fw-bold col-1">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($karya) && sizeof($karya) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($karya as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>
                                    <div>
                                        {{ $item['nama_kegiatan'] }}
                                    </div>
                                    @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success   ">
                                            Lampiran sudah diisi.
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item['jenis_terbit'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#modalEditEvaluasiPengabdian_D_{{ $item['id_rencana'] }}">Tambah Lampiran</button></td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE D --}}
                                <div class="modal fade" id="modalEditEvaluasiPengabdian_D_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianALabel">D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber-ISBN</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-pengabdian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_pengabdian"
                                                        value="karya_pengabdian">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Permohonan/Persetujuan/ Keputusan/Penunjukkan sebagai Konsultan/ Tenaga Ahli/Staf Ahli dari institusi terkait</li>
                                                                    <li>Laporan progres layanan konsultasi, bagi yang sedang berjalan</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPengabdianD-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFilesPengabdianD-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>

                                                                <div id="existsFiles">
                                                                    {{-- Menampilkan file lampiran yang sudah ada --}}
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $i)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $i,
                                                                                    PATHINFO_EXTENSION,
                                                                                );

                                                                                $extension = '';

                                                                                // Determine the icon filename based on the extension
                                                                                switch ($checkExtension) {
                                                                                    case 'pdf':
                                                                                        $extension = 'pdf.png';
                                                                                        break;
                                                                                    case 'doc':
                                                                                    case 'docx':
                                                                                        $extension = 'word.png';
                                                                                        break;
                                                                                    case 'xls':
                                                                                    case 'xlsx':
                                                                                        $extension = 'sheets.png';
                                                                                        break;
                                                                                    case 'png':
                                                                                    case 'PNG':
                                                                                    case 'jpg':
                                                                                    case 'jpeg':
                                                                                        $extension = 'photo.png';
                                                                                        break;
                                                                                    default:
                                                                                        $extension = 'document.png';
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="file-item d-flex align-items-center mb-2 border rounded p-3">
                                                                                <img src="{{ '/assets/img/' . $extension }}"
                                                                                    alt="File Icon" width="30" />
                                                                                <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
                                                                                    class="ms-2">{{ $i }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFilePengabdian('{{ $item['id_rencana'] }}', '{{ base64_encode($i) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2"><i
                                                                                            class="bi bi-x"></i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>

                                                                <input type="file"
                                                                    id="fileInputPengabdianD-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE D --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPengabdianD-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPengabdianD-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPengabdianD-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPengabdianD-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>

                        @endforeach
                    @endif
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    <!-- Modal hapus -->
    <div class="modal fade" id="modalDeleteConfirmPenelitian" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <h1><i class="bi bi-x-circle text-danger"></i></h1>
                    <h5>Yakin untuk menghapus Lampiran ini?</h5>
                    <p class="text-muted small">Proses ini tidak dapat diurungkan bila
                        Anda sudah menekan tombol 'Yakin'.</p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <form id="formDeleteLampiranPengabdian" action="{{ route('ed-delete-lampiran-pengabdian') }}"
                        method="POST" style="display: inline;">
                        @csrf

                        <input type="hidden" name="id_rencana" id="idRencana">
                        <input type="hidden" name="fileName" id="fileName">
                    </form>
                </div>
            </div>
        </div>
    </div>

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

<script src="{{ asset('js/app.js') }}"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteButtons = document.querySelectorAll('.btn-danger[data-bs-toggle="modal"]');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let targetModalId = button.getAttribute('data-bs-target');
                    let modal = new bootstrap.Modal(document.querySelector(targetModalId));
                    modal.show();
                });
            });
        });
    </script>
@endsection
