@extends('Template.evaluasi')

@section('content-kegiatan')

{{-- BAGIAN A --}}
<div id="ed-penunjang-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
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
                @if (isset($akademik) && sizeof($akademik) > 0)
                    @php
                        $counter = 1;
                    @endphp

                    @foreach ($akademik as $item)
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
                            <td>
                                @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                            @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#modalEditEvaluasiPenunjang-{{ $item['id_rencana'] }}">
                                    Tambah Lampiran
                                </button>
                            </td>
                        </tr>
                        
                        {{-- TEMPAT MODAL ADD FILE A--}}
                        <div class="modal fade" id="modalEditEvaluasiPenunjang-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangALabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data" >
                                        @csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalEditEvaluasiPenunjangALabel">
                                                {{ $counter++ }}. {{ $item['nama_kegiatan'] }}
                                            </h6>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>

                                            <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_penunjang"
                                                value="Akademik" />
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <h6>
                                                            *Jenis Dokumen yang harus dilengkapi : 
                                                        </h6>

                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                            <li>Bukti Bimbingan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                        </ol>

                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">
                                                            Add Files
                                                        </button>

                                                        <p style="color: #808080;">
                                                            Maximum file size: 5MB, maximum number of files: 50
                                                        </p>

                                                        <p class="mb-4">
                                                            *Dokumen yang dilengkapi dapat lebih dari 1 
                                                        </p>

                                                        <div class="mt-3 mb-3"> 
                                                            <div id="selectedFiles-{{ $item['id_rencana'] }}">
                                                            </div>

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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <button type="submit" class="btn btn-primary" id="btnUploadPenunjangA-{{ $item['id_rencana'] }}">
                                                Upload Lampiran
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- AKHIR MODAL ADD FILE A--}}
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN A --}}


{{-- BAGIAN B --}}
<div id="ed-penunjang-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>B.Bimbingan dan Konseling</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">
                            No.
                        </th>

                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">
                            Kegiatan
                        </th>

                        <th scope="col" rowspan="2" class="align-middle fw-bold">
                            Jumlah Mahasiswa
                        </th>

                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">
                            SKS Terhitung
                        </th>

                        <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">
                            Status
                        </th>

                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">
                            Aksi
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold">
                            Asesor 1
                        </th>

                        <th scope="col" class="fw-bold">
                            Asesor 2
                        </th>
                    </tr>
                </thead>

                <tbody>
                @if (isset($bimbingan) && sizeof($bimbingan))
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
                                    <div class="badge text-bg-success">
                                        Lampiran sudah diupload.
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item['jumlah_mahasiswa'] }}</td>
                            <td>{{ $item['sks_terhitung'] }}</td>
                            <td>
                            @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                            @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#modalEditEvaluasiPenunjangB-{{ $item['id_rencana'] }}">
                                    Tambah Lampiran
                                </button>
                            </td>
                        </tr>
                        
                        {{-- TEMPAT MODAL ADD FILE B--}}
                        <div class="modal fade" id="modalEditEvaluasiPenunjangB-{{$item['id_rencana']}}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangBLabel"
                        aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalEditEvaluasiPenunjangBLabel">
                                                {{ $counter++ }}. {{ $item['nama_kegiatan'] }}
                                            </h6>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>

                                            <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_penunjang"
                                                value="Bimbingan" />
                                        </div>

                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>

                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari Pimpinan</li>
                                                            <li>Bukti Bimbingan</li>
                                                            <li>Presensi mahasiswa yang memperoleh bimbingan dan konseling</li>
                                                        </ol>

                                                        <button type="button" id="addFilesBtn-{{$item['id_rencana']}}" class="btn btn-secondary">
                                                            Add Files
                                                        </button>

                                                        <p style="color: #808080;">
                                                            Maximum file size: 5MB, maximum number of files: 50
                                                        </p>

                                                        <p class="mb-4">
                                                            *Dokumen yang dilengkapi dapat lebih dari 1 
                                                        </p>

                                                        <div class="mt-3 mb-3">
                                                            <div id="selectedFiles-{{$item['id_rencana']}}">
                                                            </div>

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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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

                                                        <input type="file" name="fileInput[]" id="fileInput-{{$item['id_rencana']}}" style="display: none;" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <button type="submit" class="btn btn-primary">
                                                Upload Lampiran
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- AKHIR MODAL ADD FILE B--}}
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN B --}}

{{-- BAGIAN C --}}
<div id="ed-penunjang-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa),
                Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa),
                BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian),
                Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
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
                    @if (isset($ukm) && sizeof($ukm) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($ukm as $item)
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
                                <td>{{ $item['jumlah_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjangC-{{ $item['id_rencana'] }}">Tambah Lampiran
                                    </button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE C--}}
                            <div class="modal fade" id="modalEditEvaluasiPenunjangC-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangCLabel"
                            aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h6
                                                class="modal-title" id="modalEditEvaluasiPenunjangCLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                >
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                <input type="hidden" name="id_rencana"
                                                value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penunjang"
                                                value="Ukm" />
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>Surat Tugas/Surat  Keputusan/ Surat  Pengangkatan dari  Pimpinan</li>
                                                                <li>Bukti pembinaan,  misal; kehadiran  dalam kegiatan  organisasi mahasiswa</li>
                                                            </ol>
                                                        
                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL ADD FILE C--}}
                        @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--AKHIR BAGIAN C --}}

{{-- BAGIAN D --}}
<div id="ed-penunjang-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal
                a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-4">Kegiatan</th>
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
                    <tr>
                        @if (isset($sosial) && sizeof($sosial) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($sosial as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangD-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE D--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangD-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangDLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang"
                                                    value="Sosial" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/ Surat Keputusan  Pimpinan</li> 
                                                                    <li>Laporan kegiatan atau  daftar hadir rapat  organisasi internal  tersebut</li>
                                                                </ol>
                                                                
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE D--}}
                            @endforeach 
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN D --}}

{{-- BAGIAN E --}}
<div id="ed-penunjang-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                    @if (isset($struktural) && sizeof($struktural) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($struktural as $item)
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
                                <td>{{ $item['jenis_jabatan_struktural'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjangE-{{ $item['id_rencana'] }}">Tambah Lampiran
                                    </button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE E--}}
                            <div class="modal fade" id="modalEditEvaluasiPenunjangE-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangELabel"
                            aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h6
                                                class="modal-title" id="modalEditEvaluasiPenunjangELabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                >
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penunjang" value="Struktural" />
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                            <ol>
                                                                <li>SK Pengangkatan / Surat  Tugas dari Pejabat yang  berwenang</li>
                                                            </ol>
                                                             
                                                            <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                <button type="submit" class="btn btn-primary" >Upload Lampiran</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL ADD FILE E--}}
                        @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN E --}}

{{-- BAGIAN F --}}
<div id="ed-penunjang-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>F. Jabatan non struktural</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                    @if (isset($nonstruktural) && sizeof($nonstruktural) > 0)
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($nonstruktural as $item)
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
                                <td>{{ $item['jenis_jabatan_nonstruktural'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjangF-{{ $item['id_rencana'] }}">Tambah Lampiran
                                    </button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL ADD FILE F--}}
                            <div class="modal fade" id="modalEditEvaluasiPenunjangF-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangFLabel"
                            aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h6
                                            class="modal-title" id="modalEditEvaluasiPenunjangFLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                            >
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                            <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_penunjang" value="Nonstruktural" />
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>SK Pengangkatan / Surat  Tugas dari Pejabat yang  berwenang</li>
                                                        </ol>
                                                         
                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                        <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                        <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                            <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL ADD FILE F--}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- BAGIAN G --}}
<div id="ed-penunjang-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                        @if (isset($redaksi) && sizeof($redaksi) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($redaksi as $item)
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
                                    <td>{{ $item['jabatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangG-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE G --}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangG-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangGLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Redaksi" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/ Surat Keputusan  Pimpinan</li> 
                                                                    <li>Bukti jurnal yang sudaH terbit</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE G--}}
                            @endforeach
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN G --}}

{{-- BAGIAN H --}}
<div id="ed-penunjang-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2 semester), 
            seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                    @if (isset($adhoc) && sizeof($adhoc) > 0)
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($adhoc as $item)
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
                                <td>{{ $item['jabatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPenunjangH-{{ $item['id_rencana'] }}">Tambah Lampiran
                                    </button>
                                </td>
                            </tr>              
                            {{-- TEMPAT MODAL ADD FILE H--}}
                            <div class="modal fade" id="modalEditEvaluasiPenunjangH-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                            aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalEditEvaluasiPenunjangHLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                            <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_penunjang" value="Adhoc" />
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                                            <li>Laporan Kegiatan</li>
                                                        </ol>
                                                         
                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                            <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                            <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                        </button>
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
                            {{-- AKHIR MODAL ADD FILE H--}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN H --}}

{{-- BAGIAN I --}}
<div id="ed-penunjang-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body"><b><h6>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
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
                    @if (isset($ketuapanitia) && sizeof($ketuapanitia) > 0)
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($ketuapanitia as $item)
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
                            <td>{{ $item['jenis_tingkatan'] }}</td>
                            <td>{{ $item['sks_terhitung'] }}</td>
                            <td>
                            @if ($item['asesor1_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor1_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                            @if ($item['asesor2_fed'] === null)
                                    <span class="badge bg-secondary">Menunggu</span>
                                @elseif ($item['asesor2_fed'] === 'setuju')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    <span
                                        class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPenunjangI-{{ $item['id_rencana'] }}">Tambah Lampiran
                                </button>
                            </td>
                        </tr>
                        {{-- TEMPAT MODAL ADD FILE I--}}
                        <div class="modal fade" id="modalEditEvaluasiPenunjangI-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                        aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h6
                                            class="modal-title" id="modalEditEvaluasiPenunjangILabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                            >
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                            <input type="hidden" name="jenis_penunjang" value="Ketua_Panitia" />
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas/ Surat Keputusan  Pimpinan</li> 
                                                        </ol>
                                                         
                                                        <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                        <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                        <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                            <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    {{-- AKHIR MODAL ADD FILE I--}}
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN I --}}

{{-- BAGIAN J--}}
<div id="ed-penunjang-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
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
                        @if (isset($anggotapanitia) && sizeof($anggotapanitia) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($anggotapanitia as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['jenis_tingkatan']}}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangJ-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE J--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangJ-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangJLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Anggota_Panitia" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                                                    <li>Laporan Kegiatan</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE J--}}
                            @endforeach
                        @endif
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN J --}}

{{-- BAGIAN K--}}
<div id="ed-penunjang-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-K" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
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
                        @if (isset($pengurusyayasan) && sizeof($pengurusyayasan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($pengurusyayasan as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['jabatan']}}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangK-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE K--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangK-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangFLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangKLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Pengurus_Yayasan" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/Surat Keputusan/ Surat Persetujuan/Surat Ijin dari Pimpinan</li>
                                                                    <li>Laporan Kegiatan</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary" >Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE K--}}
                            @endforeach
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN K --}}

    {{-- BAGIAN L--}}
    <div id="ed-penunjang-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-L" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan(Ketua/Anggota)</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
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
                        @if (isset($asosiasi) && sizeof($asosiasi) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($asosiasi as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['jabatan']}}</td>
                                    <td>{{ $item['jenis_tingkatan']}}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangL-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE L--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangL-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangLLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Asosiasi" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                                                    <li>Kartu Anggota</li>
                                                                    <li>Laporan Kegiatan</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE L--}}
                            @endforeach
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN L --}}

{{-- BAGIAN M--}}
<div id="ed-penunjang-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>M. Peserta Seminar/Workshop/Kursus Berdasar Penugasan Pimpinan</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-M" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
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
                        @if (isset($seminar) && sizeof($seminar) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($seminar as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['jenis_tingkatan']}}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangM-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE M--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangM-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangFLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangMLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Seminar" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                                                    <li>Sertifikasi atau bukti lain kehadiran di kegiatan tersebut</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary" >Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE M--}}
                            @endforeach
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN M--}}

{{-- BAGIAN N--}}
<div id="ed-penunjang-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
        <hr />

        <div class="text-sm">
            <table id="tableEvaluasiPenunjang-N" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                        @if (isset($reviewer) && sizeof($reviewer) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($reviewer as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
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
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td>
                                    @if ($item['asesor1_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor1_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor1_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if ($item['asesor2_fed'] === null)
                                        <span class="badge bg-secondary">Menunggu</span>
                                    @elseif ($item['asesor2_fed'] === 'setuju')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                        <span
                                            class="bg-alert-info mt-1 d-block text-komentar">{{ $item['asesor2_fed'] }}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenunjangN-{{ $item['id_rencana'] }}">Tambah Lampiran
                                        </button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE N--}}
                                <div class="modal fade" id="modalEditEvaluasiPenunjangN-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditEvaluasiPenunjangDLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('ed-add-lampiran-penunjang') }}" method="POST" enctype = "multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h6
                                                    class="modal-title" id="modalEditEvaluasiPenunjangNLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6
                                                    >
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penunjang" value="Reviewer" />
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas/Surat Keputusan Pimpinan</li>
                                                                    <li>Bukti hasil telaah artikel/proposal yang direview</li>
                                                                </ol>
                                                                 
                                                                <button type="button" id="addFilesBtn-{{ $item['id_rencana'] }}" class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>   
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
                                                                                    <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($lampiran) }}
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
                                                    <button type="submit" class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE N--}}
                            @endforeach
                        @endif
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN N--}}

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
                <form id="formDeleteLampiranPenunjang" action="{{ route('ed-delete-lampiran-penunjang') }}"
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

{{-- TEMPAT TOAST --}}

{{-- TOAST EDIT --}}
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

    <script>
        @if (isset($akademik) && sizeof($akademik) > 0)
            @foreach ($akademik as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($ukm) && sizeof($ukm) > 0)
            @foreach ($ukm as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($sosial) && sizeof($sosial) > 0)
            @foreach ($sosial as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($struktural) && sizeof($struktural) > 0)
            @foreach ($struktural as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($nonstruktural) && sizeof($nonstruktural) > 0)
            @foreach ($nonstruktural as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($redaksi) && sizeof($redaksi) > 0)
            @foreach ($redaksi as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($adhoc) && sizeof($adhoc) > 0)
            @foreach ($adhoc as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif
        
        @if (isset($ketuapanitia) && sizeof($ketuapanitia) > 0)
            @foreach ($ketuapanitia as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($anggotapanitia) && sizeof($anggotapanitia) > 0)
            @foreach ($anggotapanitia as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif
        
        @if (isset($pengurusyayasan) && sizeof($pengurusyayasan) > 0)
            @foreach ($pengurusyayasan as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($asosiasi) && sizeof($asosiasi) > 0)
            @foreach ($asosiasi as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
                    });
                })();
            @endforeach
        @endif

        @if (isset($reviewer) && sizeof($reviewer) > 0)
            @foreach ($reviewer as $item)
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
                        var filesToAdd = Array.from(this.files); // Mengonversi FileList menjadi array
                        displayFilesWithIcons(filesToAdd, selectedFilesDiv, fileArray);
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
            const form = document.getElementById("formDeleteLampiranPenunjang");

            var idRencanaInput = form.querySelector('input[name="id_rencana"]');
            var fileNameInput = form.querySelector('input[name="fileName"]');

            idRencanaInput.value = idRencanaValue;
            fileNameInput.value = fileNameValue;

            // Submit the form
            form.submit();
        }
    </script>

@endsection