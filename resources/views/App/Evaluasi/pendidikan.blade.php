@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- BAGIAN A --}}
    <div id="ed-pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-A"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                        @if (isset($teori) && sizeof($teori) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($teori as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                            <div class="badge text-bg-warning">
                                                Lampiran belum diupload.
                                            </div>
                                            @else
                                            <div class="badge text-bg-success">
                                                Lampiran sudah diupload.
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_kelas'] }}</td>
                                    <td>{{ $item['jumlah_evaluasi'] }}</td>
                                    <td>{{ $item['sks_matakuliah'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE A --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype = "multipart/form-data">
                                            @csrf
                                            @method('POST')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_pendidikan"
                                                        value="Teori" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keputusan Mengajar dari Pimpinan</li>
                                                                    <li>BAP/Berita Acara Perkuliahan (presensi/jurnal kehadiran dosen)</li>
                                                                    <li>Presensi Mahasiswa</li>
                                                                    <li>Daftar Nilai UAS Mahasiswa</li>
                                                                    <li>Daftar Nilai Akhir Mahasiswa</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                    <div id="existsFiles">
                                                                        @if (!is_null($item['lampiran']))
                                                                            @php
                                                                                $iteration = 1;
                                                                            @endphp
                                                                            @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                                @php
                                                                                    $checkExtension = pathinfo(
                                                                                        $lampiran,
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                        class="ms-2">{{ $lampiran }}</a>
                                                                                    <div style="margin-left: auto;">
                                                                                        <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                            class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                            <i class="bi bi-x"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE A --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN B --}}
    <div id="ed-pendidikan-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Asistensi tugas atau praktikum terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Praktikum (1 SKS = 2 jam)</th>
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
                        @if (isset($praktikum) && sizeof($praktikum) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($praktikum as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>
                                    <div>
                                        {{ $item['nama_kegiatan'] }}
                                    </div>
                                    @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item['jumlah_kelas'] }}</td>
                                <td>{{ $item['sks_matakuliah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE B --}}
                            <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                aria-labelledby="modalEditEvaluasiPendidikanBLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype = "multipart/form-data">
                                            @csrf
                                            @method('POST')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanBLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_pendidikan"
                                                        value="Praktikum" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                            <li>Berita Acara Praktikum atau Asistensi</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Daftar Nilai tugas</li>
                                                        </ol>
                                                        <!-- File input -->
                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                    <div id="existsFiles">
                                                                        @if (!is_null($item['lampiran']))
                                                                            @php
                                                                                $iteration = 1;
                                                                            @endphp
                                                                            @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                                @php
                                                                                    $checkExtension = pathinfo(
                                                                                        $lampiran,
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                        class="ms-2">{{ $lampiran }}</a>
                                                                                    <div style="margin-left: auto;">
                                                                                        <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                            class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                            <i class="bi bi-x"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            {{-- AKHIR MODAL ADD FILE B --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="ed-pendidikan-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan,
                    dan DPL (Dosen Pembimbing lapangan)</b></h6>
            <hr />
            
            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                        @if (isset($bimbingan) && sizeof($bimbingan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                    
                            @foreach ($bimbingan as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-warning">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE C --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanCLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanCLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_pendidikan"
                                                        value="Bimbingan" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keputusan Mengajar dari Pimpinan</li>
                                                                    <li>Presensi Mahasiswa</li>
                                                                    <li>Berita Acara bimbingan</li>
                                                                    <li>Daftar Nilai tugas atau laporan hasil praktek</li>
                                                                    <li>Berita Acara bimbingan</li>
                                                                    <li>Daftar Nilai tugas atau laporan hasil praktek</li>
                                                                    <li>Daftar nilai atau laporan KKN</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3">
                                                                    <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                    <div id="existsFiles">
                                                                        @if (!is_null($item['lampiran']))
                                                                            @php
                                                                                $iteration = 1;
                                                                            @endphp
                                                                            @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                                @php
                                                                                    $checkExtension = pathinfo(
                                                                                        $lampiran,
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                        class="ms-2">{{ $lampiran }}</a>
                                                                                    <div style="margin-left: auto;">
                                                                                        <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                            class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                            <i class="bi bi-x"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE C --}}
                            @endforeach
                        @endif
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="ed-pendidikan-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Seminar yang terjadwal terhadap setiap kelompok</b></b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                            <th scope="col" class="fw-bold col-1">Asesor 1</th>
                            <th scope="col" class="fw-bold col-1">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($seminar) && sizeof($seminar) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($seminar as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_kelompok'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE D --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanDLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanDLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_pendidikan"
                                                        value="Seminar" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                                    <li>Membimbing Seminar dan Pimpinan</li>
                                                                    <li>Presensi Mahasiswa</li>
                                                                    <li>Berita acara bimbingan</li>
                                                                    <li>Daftar Nilai Akhir</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3">
                                                                    <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                    <div id="existsFiles">
                                                                        @if (!is_null($item['lampiran']))
                                                                            @php
                                                                                $iteration = 1;
                                                                            @endphp
                                                                            @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                                @php
                                                                                    $checkExtension = pathinfo(
                                                                                        $lampiran,
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                        class="ms-2">{{ $lampiran }}</a>
                                                                                    <div style="margin-left: auto;">
                                                                                        <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                            class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                            <i class="bi bi-x"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE D --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="ed-pendidikan-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan
                    pembimbing penyerta dinilai sama</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok Dibimbing</th>
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
                        @if (isset($tugasAkhir) && sizeof($tugasAkhir) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($tugasAkhir as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_kelompok'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE E --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanCLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanCLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_pendidikan"
                                                        value="TugasAkhir" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                                    <li>Presensi Mahasiswa</li>
                                                                    <li>Bukti pembimbingan</li>
                                                                    <li>Berita acara ujian skripsi</li>
                                                                    <li>Daftar Nilai</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3">
                                                                    <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                    <div id="existsFiles">
                                                                        @if (!is_null($item['lampiran']))
                                                                            @php
                                                                                $iteration = 1;
                                                                            @endphp
                                                                            @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                                @php
                                                                                    $checkExtension = pathinfo(
                                                                                        $lampiran,
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                        class="ms-2">{{ $lampiran }}</a>
                                                                                    <div style="margin-left: auto;">
                                                                                        <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                            class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                            <i class="bi bi-x"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE E --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="ed-pendidikan-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menguji proposal S1, S2, S3, Kualifikasi</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                        @if (isset($proposal) && sizeof($proposal) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($proposal as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE F --}}
                                    <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanFLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanFLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_pendidikan"
                                                value="Proposal" />
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                                <li>Presensi Mahasiswa</li>
                                                                <li>Bukti pembimbingan</li>
                                                                <li>Berita acara ujian skripsi</li>
                                                                <li>Daftar Nilai</li>
                                                            </ol>
                                                            <!-- File input -->
                                                            <button type="button" id="addFilesBtnF" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                            <!-- tambahkan jarak bawah -->
                                                            <div class="mt-3 mb-3">
                                                                <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                <div id="existsFiles">
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $lampiran,
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                    class="ms-2">{{ $lampiran }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                        <i class="bi bi-x"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE F --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    

    {{-- BAGIAN G --}}
    <div id="ed-pendidikan-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                    @if (isset($rendah) && sizeof($rendah) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($rendah as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>
                                    <div>
                                        {{ $item['nama_kegiatan'] }}
                                    </div>
                                    @if (is_null($item['lampiran']) )
                                    <div class="badge text-bg-warning">
                                        Lampiran belum diupload.
                                    </div>
                                    @else
                                    <div class="badge text-bg-success">
                                        Lampiran sudah diupload.
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $item['jumlah_dosen'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE G --}}
                            <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                aria-labelledby="modalEditEvaluasiPendidikanGLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalEditEvaluasiPendidikanGLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_pendidikan"
                                                value="Rendah" />
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Bukti pembimbingan</li>
                                                            <li>Berita acara ujian skripsi</li>
                                                            <li>Daftar Nilai</li>
                                                        </ol>
                                                        <!-- File input -->
                                                        <button id="addFilesBtnG" class="btn btn-secondary">Add Files</button>
                                                        <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                        <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                        <!-- tambahkan jarak bawah -->
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                            <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                            <div id="existsFiles">
                                                                @if (!is_null($item['lampiran']))
                                                                    @php
                                                                        $iteration = 1;
                                                                    @endphp
                                                                    @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                        @php
                                                                            $checkExtension = pathinfo(
                                                                                $lampiran,
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                class="ms-2">{{ $lampiran }}</a>
                                                                            <div style="margin-left: auto;">
                                                                                <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                    class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                    <i class="bi bi-x"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL ADD FILE G --}}
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    

    {{-- BAGIAN H --}}
    <div id="ed-pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                    yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-H"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                        @if (isset($kembang) && sizeof($kembang) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($kembang as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_sap'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>    
                                {{-- TEMPAT MODAL ADD FILE H --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanHLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanHLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_pendidikan"
                                                value="Kembang" />
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                                <li>Bukti hasil(Silabus, SAP/RKPSS, GBPP) yang baru dan silabus, SAP/RKPSS. GBPP yang
                                                                    sebelumnya</li>
                                                            </ol>
                                                            <!-- File input -->
                                                            <button type="button" id="addFilesBtnH" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                            <!-- tambahkan jarak bawah -->
                                                            <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                <div id="existsFiles">
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $lampiran,
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                    class="ms-2">{{ $lampiran }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                        <i class="bi bi-x"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE H --}}
                            
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}



    {{-- BAGIAN I --}}
    <div id="ed-pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b>
                <h6>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester
            </b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen (Maks. 2/smt)
                            </th>
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
                        @if (isset($cangkok) && sizeof($cangkok) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($cangkok as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="badge text-bg-success">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $item['jumlah_dosen'] }}</td>    
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE I --}}
                            <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                            aria-labelledby="modalEditEvaluasiPendidikanILabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalEditEvaluasiPendidikanILabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <input type="hidden" name="id_rencana"
                                        value="{{ $item['id_rencana'] }}">
                                    <input type="hidden" name="jenis_pendidikan"
                                        value="Cangkok" />
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                    <ol>
                                                        <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                        <li>Bukti yang relevan (laporan kegiatan)</li>
                                                    </ol>
                                                    <!-- File input -->
                                                    <button type="button" id="addFilesBtnI" class="btn btn-secondary">Add Files</button>
                                                    <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                    <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                    <!-- tambahkan jarak bawah -->
                                                    <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                        <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                        <div id="existsFiles">
                                                            @if (!is_null($item['lampiran']))
                                                                @php
                                                                    $iteration = 1;
                                                                @endphp
                                                                @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                    @php
                                                                        $checkExtension = pathinfo(
                                                                            $lampiran,
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
                                                                        <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                            class="ms-2">{{ $lampiran }}</a>
                                                                        <div style="margin-left: auto;">
                                                                            <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                <i class="bi bi-x"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                            {{-- AKHIR MODAL ADD FILE I --}}
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}



    {{-- BAGIAN J --}}
    <div id="ed-pendidikan-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                        @if (isset($koordinator) && sizeof($koordinator) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($koordinator as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>
                                        <div>
                                            {{ $item['nama_kegiatan'] }}
                                        </div>
                                        @if (is_null($item['lampiran']) )
                                        <div class="badge text-bg-warning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="">
                                            Lampiran sudah diupload.
                                        </div>
                                        @endif
                                    </td>  
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}">Tambah Lampiran</button>
                                    </td>
                                </tr>    
                                {{-- TEMPAT MODAL ADD FILE J --}}
                                <div class="modal fade" id="modalEditEvaluasiPendidikan-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditEvaluasiPendidikanJLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-pendidikan') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanJLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_pendidikan"
                                                value="Koordinator" />
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>Surat Tugas</li>
                                                                <li>Daftar Nilai</li>
                                                            </ol>
                                                            <!-- File input -->
                                                            <button type="button" id="addFilesBtnJ" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                                            <!-- tambahkan jarak bawah -->
                                                            <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                <div id="selectedFiles-{{ $item['id_rencana'] }}"></div>

                                                                <div id="existsFiles">
                                                                    @if (!is_null($item['lampiran']))
                                                                        @php
                                                                            $iteration = 1;
                                                                        @endphp
                                                                        @foreach (json_decode($item['lampiran'], true) as $lampiran)
                                                                            @php
                                                                                $checkExtension = pathinfo(
                                                                                    $lampiran,
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($lampiran) }}
                                                                                    class="ms-2">{{ $lampiran }}</a>
                                                                                <div style="margin-left: auto;">
                                                                                    <a onclick="event.preventDefault(); deleteFile('{{ $item['id_rencana'] }}', '{{ base64_encode($lampiran) }}')"
                                                                                        class="btn btn-danger btn-sm btn-circle ms-2">
                                                                                        <i class="bi bi-x"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <input type="file" name="fileInput[]" id="fileInput-{{ $item['id_rencana'] }}" style="display: none;" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Upload Lampiran</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE J --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}


    <!-- Modal hapus -->
    <div class="modal fade" id="modalDeleteConfirmPendidikan" tabindex="-1" role="dialog"
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
                    <form id="formDeleteLampiranPendidikan" action="{{ route('ed-delete-lampiran-pendidikan') }}"
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
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    {{-- TOAST EDIT --}}
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

        // Fungsi untuk mendapatkan gambar/logo berdasarkan ekstensi file
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
    </script>

    <script>
        // Script Add Files Bagian A
        @if (isset($teori) && sizeof($teori) > 0)
            @foreach ($teori as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        // Script Add Files bagian B
        @if (isset($praktikum) && sizeof($praktikum) > 0)
            @foreach ($praktikum as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        // Script Add Files bagian C
        @if (isset($bimbingan) && sizeof($bimbingan) > 0)
            @foreach ($bimbingan as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        // Script Add Files bagian D
        @if (isset($seminar) && sizeof($seminar) > 0)
            @foreach ($seminar as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script Add Files bagian E
        @if (isset($tugasAkhir) && sizeof($tugasAkhir) > 0)
            @foreach ($tugasAkhir as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script add Files bagian F
        @if (isset($proposal) && sizeof($proposal) > 0)
            @foreach ($proposal as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script add Files bagian G
        @if (isset($rendah) && sizeof($rendah) > 0)
            @foreach ($rendah as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script add Files bagian H
        @if (isset($kembang) && sizeof($kembang) > 0)
            @foreach ($kembang as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script add Files bagian I
        @if (isset($cangkok) && sizeof($cangkok) > 0)
            @foreach ($cangkok as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        //Script add Files bagian J
        @if (isset($koordinator) && sizeof($koordinator) > 0)
            @foreach ($koordinator as $item)
                (function() {
                    var itemId = {{ $item['id_rencana'] }};

                    var addFilesBtn = document.getElementById('addFilesBtn-' + itemId);
                    var selectedFilesDiv = document.getElementById('selectedFiles-' + itemId);
                    var fileInput = document.getElementById('fileInput-' + itemId);
                    var fileArray = [];

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        function displayFilesWithIcons(files, selectedFilesDiv, selectedFiles) {
            selectedFilesDiv.innerHTML = '';

            selectedFiles = selectedFiles.concat(Array.from(files));
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file) continue; 

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop();
                var fileIcon = getFileIcon(fileExtension);

                var fileListItem = document.createElement('div');
                fileListItem.classList.add(
                    'file-item', 
                    'd-flex', 
                    'align-items-center', 
                    'mb-2', 
                    'border', 
                    'rounded', 
                    'p-3',
                    'bg-abu'
                );

                // Tambahkan ikon/gambar
                var fileIconImg = document.createElement('img');
                fileIconImg.src = '/assets/img/' + fileIcon;
                fileIconImg.alt = 'File Icon';
                fileIconImg.width = 30;
                fileListItem.appendChild(fileIconImg);

                // Tambahkan nama file
                var fileNameSpan = document.createElement('span');
                fileNameSpan.classList.add('ms-2');
                fileNameSpan.textContent = fileName;
                fileListItem.appendChild(fileNameSpan);

                // Buat elemen div untuk tombol hapus
                var divDelete = document.createElement('div');
                divDelete.style.marginLeft = 'auto';

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
    </script>

    <script>
        function deleteFile(idRencanaValue, fileNameValue) {
            const form = document.getElementById("formDeleteLampiranPendidikan");

            var idRencanaInput = form.querySelector('input[name="id_rencana"]');
            var fileNameInput = form.querySelector('input[name="fileName"]');

            idRencanaInput.value = idRencanaValue;
            fileNameInput.value = fileNameValue;

            // Submit the form
            form.submit();
        }
    </script>
@endsection
