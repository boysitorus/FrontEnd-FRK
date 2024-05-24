@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENDIDIKAN --}}
    <style>
        .border-hijau {
            border: 2px solid #008000;
            /* Border berwarna hijau */
            padding: 3px;
            /* Padding untuk memberi ruang di sekitar teks */
            border-radius: 5px;
            /* Untuk memberikan sudut-sudut yang melengkung pada border */
            display: inline-block;
            /* Mengatur agar border memenuhi ruang yang tersedia */
            background-color: #008000;
            color: #FFFFFF;
        }

        .border-kuning {
            border: 2px solid #FFFF00;
            padding: 3px;
            border-radius: 5px;
            display: inline-block;
            background-color: #FFD700;
        }
    </style>

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
                                            <div class="border-kuning">
                                                Lampiran belum diupload.
                                            </div>
                                            @else
                                            <div class="border-hijau">
                                                Lampiran sudah diisi.
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
                                        <div class="border-kuning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="border-hijau">
                                            Lampiran sudah diisi.
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
                                        <div class="border-kuning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="border-hijau">
                                            Lampiran sudah diisi.
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
                                        <div class="border-kuning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="border-hijau">
                                            Lampiran sudah diisi.
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
                                        <div class="border-kuning">
                                            Lampiran belum diupload.
                                        </div>
                                        @else
                                        <div class="border-hijau">
                                            Lampiran sudah diisi.
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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan_F">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- TEMPAT MODAL ADD FILE F --}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_F" tabindex="-1"
        aria-labelledby="modalEditEvaluasiPendidikanFLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanFLabel">F. Menguji proposal S1, S2, S3,
                        Kualifikasi</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtnF" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
    {{-- AKHIR MODAL ADD FILE F --}}

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
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_dosen'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_G">Tambah Lampiran</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- TEMPAT MODAL ADD FILE G --}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_G" tabindex="-1"
        aria-labelledby="modalEditEvaluasiPendidikanGLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanGLabel">G. Membimbing dosen yang lebih rendah
                        Jenjang Jabatan Akademiknya</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    {{-- AKHIR MODAL ADD FILE G --}}

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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_sap'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan_H">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- TEMPAT MODAL ADD FILE H --}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_H" tabindex="-1"
        aria-labelledby="modalEditEvaluasiPendidikanHLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanHLabel">H. Mengembangkan program
                        perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                        yang hasilnya dipakai untuk kegiatan perkuliahan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtnH" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFilesH"></div>
                                </div>
                                <input type="file" id="fileInputH" style="display: none;" multiple>
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
    {{-- AKHIR MODAL ADD FILE H --}}

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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_dosen'] }}</td>    
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan_I">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- TEMPAT MODAL ADD FILE I --}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_I" tabindex="-1"
        aria-labelledby="modalEditEvaluasiPendidikanILabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanILabel">I. Melaksanakan kegiatan detasering dan
                        pencangkokan
                        dosen dalam 1 semester</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtnI" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFilesI"></div>
                                </div>
                                <input type="file" id="fileInputI" style="display: none;" multiple>
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
    {{-- AKHIR MODAL ADD FILE I --}}

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
                        @if (isset($cangkok) && sizeof($cangkok) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($cangkok as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>  
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPendidikan_J">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- TEMPAT MODAL ADD FILE J --}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_J" tabindex="-1"
        aria-labelledby="modalEditEvaluasiPendidikanJLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanJLabel">J. Koordinator Tugas Akhir/Skripsi,
                        Proyek Akhir atau KP</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtnJ" class="btn btn-secondary">Add Files</button>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p>
                                <!-- tambahkan jarak bawah -->
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFilesJ"></div>
                                </div>
                                <input type="file" id="fileInputJ" style="display: none;" multiple>
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
    {{-- AKHIR MODAL ADD FILE J --}}

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

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya A
        // function displayFilesWithIcons(files) {
        //     var selectedFilesDiv = document.getElementById('selectedFiles');
        //     // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
        //     selectedFiles = selectedFiles.concat(Array.from(files));

        //     // Menghapus konten sebelumnya
        //     selectedFilesDiv.innerHTML = '';

        //     // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
        //     for (var i = 0; i < selectedFiles.length; i++) {
        //         var file = selectedFiles[i];
        //         if (!file) continue; // Lewati file yang telah dihapus

        //         var fileName = file.name;
        //         var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
        //         var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        //         var fileListItem = document.createElement('div');
        //         fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

        //         // Tambahkan ikon/gambar
        //         var fileIconImg = document.createElement('img');
        //         fileIconImg.src = '/assets/img/' + fileIcon;
        //         fileIconImg.alt = 'File Icon';
        //         fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
        //         fileListItem.appendChild(fileIconImg);

        //         // Tambahkan nama file
        //         var fileNameSpan = document.createElement('span');
        //         fileNameSpan.textContent = fileName;
        //         fileListItem.appendChild(fileNameSpan);

        //         // Tambahkan tombol hapus
        //         var deleteBtn = document.createElement('button');
        //         deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-circle', 'ms-2');
        //         deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
        //         deleteBtn.addEventListener('click', (function(fileToRemove) {
        //             return function() {
        //                 // Hapus file dari array file-file yang dipilih
        //                 var index = selectedFiles.indexOf(fileToRemove);
        //                 if (index > -1) {
        //                     selectedFiles.splice(index, 1);
        //                 }
        //                 // Hapus elemen file dari tampilan
        //                 this.parentElement.remove();
        //             };
        //         })(file)); // Closure untuk menyimpan file yang benar
        //         fileListItem.appendChild(deleteBtn);

        //         selectedFilesDiv.appendChild(fileListItem);
        //     }
        // }


        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya B
        // function displayFilesWithIconsB(files) {
        //     var selectedFilesDiv = document.getElementById('selectedFilesB');
        //     // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
        //     selectedFilesB = selectedFilesB.concat(Array.from(files));

        //     // Menghapus konten sebelumnya
        //     selectedFilesDiv.innerHTML = '';

        //     // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
        //     for (var i = 0; i < selectedFilesB.length; i++) {
        //         var file = selectedFilesB[i];
        //         if (!file) continue; // Lewati file yang telah dihapus

        //         var fileName = file.name;
        //         var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
        //         var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        //         var fileListItem = document.createElement('div');
        //         fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

        //         // Tambahkan ikon/gambar
        //         var fileIconImg = document.createElement('img');
        //         fileIconImg.src = '/assets/img/' + fileIcon;
        //         fileIconImg.alt = 'File Icon';
        //         fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
        //         fileListItem.appendChild(fileIconImg);

        //         // Tambahkan nama file
        //         var fileNameSpan = document.createElement('span');
        //         fileNameSpan.textContent = fileName;
        //         fileListItem.appendChild(fileNameSpan);

        //         // Tambahkan tombol hapus
        //         var deleteBtn = document.createElement('button');
        //         deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
        //         deleteBtn.addEventListener('click', (function(fileToRemove) {
        //             return function() {
        //                 // Hapus file dari array file-file yang dipilih
        //                 var index = selectedFilesB.indexOf(fileToRemove);
        //                 if (index > -1) {
        //                     selectedFilesB.splice(index, 1);
        //                 }
        //                 // Hapus elemen file dari tampilan
        //                 this.parentElement.remove();
        //             };
        //         })(file)); // Closure untuk menyimpan file yang benar
        //         fileListItem.appendChild(deleteBtn);

        //         selectedFilesDiv.appendChild(fileListItem);
        //     }
        // }

        // // Fungsi untuk menampilkan file yang dipilih beserta ikonnya C
        // function displayFilesWithIconsC(files) {
        //     var selectedFilesDiv = document.getElementById('selectedFilesC');
        //     // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
        //     selectedFilesC = selectedFilesC.concat(Array.from(files));

        //     // Menghapus konten sebelumnya
        //     selectedFilesDiv.innerHTML = '';

        //     // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
        //     for (var i = 0; i < selectedFilesC.length; i++) {
        //         var file = selectedFilesC[i];
        //         if (!file) continue; // Lewati file yang telah dihapus

        //         var fileName = file.name;
        //         var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
        //         var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        //         var fileListItem = document.createElement('div');
        //         fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

        //         // Tambahkan ikon/gambar
        //         var fileIconImg = document.createElement('img');
        //         fileIconImg.src = '/assets/img/' + fileIcon;
        //         fileIconImg.alt = 'File Icon';
        //         fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
        //         fileListItem.appendChild(fileIconImg);

        //         // Tambahkan nama file
        //         var fileNameSpan = document.createElement('span');
        //         fileNameSpan.textContent = fileName;
        //         fileListItem.appendChild(fileNameSpan);

        //         // Tambahkan tombol hapus
        //         var deleteBtn = document.createElement('button');
        //         deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
        //         deleteBtn.addEventListener('click', (function(fileToRemove) {
        //             return function() {
        //                 // Hapus file dari array file-file yang dipilih
        //                 var index = selectedFilesC.indexOf(fileToRemove);
        //                 if (index > -1) {
        //                     selectedFilesC.splice(index, 1);
        //                 }
        //                 // Hapus elemen file dari tampilan
        //                 this.parentElement.remove();
        //             };
        //         })(file)); // Closure untuk menyimpan file yang benar
        //         fileListItem.appendChild(deleteBtn);

        //         selectedFilesDiv.appendChild(fileListItem);
        //     }
        // }

        // // Fungsi untuk menampilkan file yang dipilih beserta ikonnya D
        // function displayFilesWithIconsD(files) {
        //     var selectedFilesDiv = document.getElementById('selectedFilesD');
        //     // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
        //     selectedFilesD = selectedFilesD.concat(Array.from(files));

        //     // Menghapus konten sebelumnya
        //     selectedFilesDiv.innerHTML = '';

        //     // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
        //     for (var i = 0; i < selectedFilesD.length; i++) {
        //         var file = selectedFilesD[i];
        //         if (!file) continue; // Lewati file yang telah dihapus

        //         var fileName = file.name;
        //         var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
        //         var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        //         var fileListItem = document.createElement('div');
        //         fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

        //         // Tambahkan ikon/gambar
        //         var fileIconImg = document.createElement('img');
        //         fileIconImg.src = '/assets/img/' + fileIcon;
        //         fileIconImg.alt = 'File Icon';
        //         fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
        //         fileListItem.appendChild(fileIconImg);

        //         // Tambahkan nama file
        //         var fileNameSpan = document.createElement('span');
        //         fileNameSpan.textContent = fileName;
        //         fileListItem.appendChild(fileNameSpan);

        //         // Tambahkan tombol hapus
        //         var deleteBtn = document.createElement('button');
        //         deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
        //         deleteBtn.addEventListener('click', (function(fileToRemove) {
        //             return function() {
        //                 // Hapus file dari array file-file yang dipilih
        //                 var index = selectedFilesD.indexOf(fileToRemove);
        //                 if (index > -1) {
        //                     selectedFilesD.splice(index, 1);
        //                 }
        //                 // Hapus elemen file dari tampilan
        //                 this.parentElement.remove();
        //             };
        //         })(file)); // Closure untuk menyimpan file yang benar
        //         fileListItem.appendChild(deleteBtn);

        //         selectedFilesDiv.appendChild(fileListItem);
        //     }
        // }

        // // Fungsi untuk menampilkan file yang dipilih beserta ikonnya E
        // function displayFilesWithIconsE(files) {
        //     var selectedFilesDiv = document.getElementById('selectedFilesE');
        //     // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
        //     selectedFilesE = selectedFilesE.concat(Array.from(files));

        //     // Menghapus konten sebelumnya
        //     selectedFilesDiv.innerHTML = '';

        //     // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
        //     for (var i = 0; i < selectedFilesE.length; i++) {
        //         var file = selectedFilesE[i];
        //         if (!file) continue; // Lewati file yang telah dihapus

        //         var fileName = file.name;
        //         var fileExtension = fileName.split('.').pop(); // Dapatkan ekstensi file
        //         var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        //         var fileListItem = document.createElement('div');
        //         fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

        //         // Tambahkan ikon/gambar
        //         var fileIconImg = document.createElement('img');
        //         fileIconImg.src = '/assets/img/' + fileIcon;
        //         fileIconImg.alt = 'File Icon';
        //         fileIconImg.width = 20; // Sesuaikan lebar gambar sesuai kebutuhan
        //         fileListItem.appendChild(fileIconImg);

        //         // Tambahkan nama file
        //         var fileNameSpan = document.createElement('span');
        //         fileNameSpan.textContent = fileName;
        //         fileListItem.appendChild(fileNameSpan);

        //         // Tambahkan tombol hapus
        //         var deleteBtn = document.createElement('button');
        //         deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
        //         deleteBtn.addEventListener('click', (function(fileToRemove) {
        //             return function() {
        //                 // Hapus file dari array file-file yang dipilih
        //                 var index = selectedFilesE.indexOf(fileToRemove);
        //                 if (index > -1) {
        //                     selectedFilesE.splice(index, 1);
        //                 }
        //                 // Hapus elemen file dari tampilan
        //                 this.parentElement.remove();
        //             };
        //         })(file)); // Closure untuk menyimpan file yang benar
        //         fileListItem.appendChild(deleteBtn);

        //         selectedFilesDiv.appendChild(fileListItem);
        //     }
        // }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya F
        function displayFilesWithIconsF(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesF');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesF = selectedFilesF.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesF.length; i++) {
                var file = selectedFilesF[i];
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
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesF.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesF.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya G
        function displayFilesWithIconsG(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesG');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesG = selectedFilesG.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesG.length; i++) {
                var file = selectedFilesG[i];
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
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesG.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesG.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya H
        function displayFilesWithIconsH(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesH');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesH = selectedFilesH.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesH.length; i++) {
                var file = selectedFilesH[i];
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
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesH.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesH.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya I
        function displayFilesWithIconsI(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesI');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesI = selectedFilesI.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesI.length; i++) {
                var file = selectedFilesI[i];
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
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesI.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesI.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
        }

        // Fungsi untuk menampilkan file yang dipilih beserta ikonnya J
        function displayFilesWithIconsJ(files) {
            var selectedFilesDiv = document.getElementById('selectedFilesJ');
            // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
            selectedFilesJ = selectedFilesJ.concat(Array.from(files));

            // Menghapus konten sebelumnya
            selectedFilesDiv.innerHTML = '';

            // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
            for (var i = 0; i < selectedFilesJ.length; i++) {
                var file = selectedFilesJ[i];
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
                deleteBtn.classList.add('btn', 'btn-close', 'btn-sm', 'btn-circle', 'ms-2');
                deleteBtn.addEventListener('click', (function(fileToRemove) {
                    return function() {
                        // Hapus file dari array file-file yang dipilih
                        var index = selectedFilesJ.indexOf(fileToRemove);
                        if (index > -1) {
                            selectedFilesJ.splice(index, 1);
                        }
                        // Hapus elemen file dari tampilan
                        this.parentElement.remove();
                    };
                })(file)); // Closure untuk menyimpan file yang benar
                fileListItem.appendChild(deleteBtn);

                selectedFilesDiv.appendChild(fileListItem);
            }
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

        // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
        // document.getElementById('fileInput').addEventListener('change', function() {
        //     var files = this.files;
        //     displayFilesWithIcons(files);
        // });

        // document.getElementById('fileInputB').addEventListener('change', function() {
        //     var files = this.files;
        //     displayFilesWithIconsB(files);
        // });

        // document.getElementById('fileInputC').addEventListener('change', function() {
        //     var files = this.files;
        //     displayFilesWithIconsC(files);
        // });

        // document.getElementById('fileInputD').addEventListener('change', function() {
        //     var files = this.files;
        //     displayFilesWithIconsD(files);
        // });

        // document.getElementById('fileInputE').addEventListener('change', function() {
        //     var files = this.files;
        //     displayFilesWithIconsE(files);
        // });

        //bagian f hingga j

        document.getElementById('fileInputF').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsF(files);
        });

        document.getElementById('fileInputG').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsG(files);
        });

        document.getElementById('fileInputH').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsH(files);
        });

        document.getElementById('fileInputI').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsI(files);
        });

        document.getElementById('fileInputJ').addEventListener('change', function() {
            var files = this.files;
            displayFilesWithIconsJ(files);
        });


        // Fungsi untuk menambah file A
        // document.getElementById('addFilesBtn').addEventListener('click', function() {
        //     var fileInput = document.getElementById('fileInput');
        //     fileInput.click();
        // });

        // Fungsi untuk menambah file B
        // document.getElementById('addFilesBtnB').addEventListener('click', function() {
        //     var fileInputB = document.getElementById('fileInputB');
        //     fileInputB.click();
        // });

        // // Fungsi untuk menambah file C
        // document.getElementById('addFilesBtnC').addEventListener('click', function() {
        //     var fileInputC = document.getElementById('fileInputC');
        //     fileInputC.click();
        // });

        // // Fungsi untuk menambah file D
        // document.getElementById('addFilesBtnD').addEventListener('click', function() {
        //     var fileInputD = document.getElementById('fileInputD');
        //     fileInputD.click();
        // });

        // // Fungsi untuk menambah file E
        // document.getElementById('addFilesBtnE').addEventListener('click', function() {
        //     var fileInputE = document.getElementById('fileInputE');
        //     fileInputE.click();
        // });

        // Fungsi untuk menambah file F
        document.getElementById('addFilesBtnF').addEventListener('click', function() {
            var fileInputF = document.getElementById('fileInputF');
            fileInputF.click();
        });

        // Fungsi untuk menambah file G
        document.getElementById('addFilesBtnG').addEventListener('click', function() {
            var fileInputG = document.getElementById('fileInputG');
            fileInputG.click();
        });

        // Fungsi untuk menambah file H
        document.getElementById('addFilesBtnH').addEventListener('click', function() {
            var fileInputH = document.getElementById('fileInputH');
            fileInputH.click();
        });

        // Fungsi untuk menambah file I
        document.getElementById('addFilesBtnI').addEventListener('click', function() {
            var fileInputI = document.getElementById('fileInputI');
            fileInputI.click();
        });

        // Fungsi untuk menambah file J
        document.getElementById('addFilesBtnJ').addEventListener('click', function() {
            var fileInputJ = document.getElementById('fileInputJ');
            fileInputJ.click();
        });

        // Variabel global untuk menyimpan file-file yang dipilih
        // var selectedFiles = [];
        // var selectedFilesB = [];
        // var selectedFilesC = [];
        // var selectedFilesD = [];
        // var selectedFilesE = [];
        var selectedFilesF = [];
        var selectedFilesG = [];
        var selectedFilesH = [];
        var selectedFilesI = [];
        var selectedFilesJ = [];
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

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv);
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

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv);
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

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv);
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

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv);
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

                    addFilesBtn.addEventListener('click', function() {
                        fileInput.click();
                    });

                    fileInput.addEventListener('change', function() {
                        var files = this.files;
                        displayFilesWithIcons(files, selectedFilesDiv);
                    });
                })();
            @endforeach
        @endif

        function displayFilesWithIcons(files, selectedFilesDiv) {
                var selectedFiles = [];
                selectedFiles = selectedFiles.concat(Array.from(files));

                selectedFilesDiv.innerHTML = '';

                for (var i = 0; i < selectedFiles.length; i++) {
                    var file = selectedFiles[i];
                        if (!file) continue; 

                    var fileName = file.name;
                    var fileExtension = fileName.split('.').pop();
                    var fileIcon = getFileIcon(fileExtension);

                    var fileListItem = document.createElement('div');
                    fileListItem.classList.add('file-item', 'd-flex', 'align-items-center', 'mb-2');

                    var fileIconImg = document.createElement('img');
                    fileIconImg.src = '/assets/img/' + fileIcon;
                    fileIconImg.alt = 'File Icon';
                    fileIconImg.width = 20;
                    fileListItem.appendChild(fileIconImg);

                    var fileNameSpan = document.createElement('span');
                    fileNameSpan.textContent = fileName;
                    fileListItem.appendChild(fileNameSpan);

                    var deleteBtn = document.createElement('button');
                    deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-circle', 'ms-2');
                    deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
                    deleteBtn.addEventListener('click', (function(fileToRemove) {
                        return function() {
                            var index = selectedFiles.indexOf(fileToRemove);
                            if (index > -1) {
                                selectedFiles.splice(index, 1);
                            }
                            this.parentElement.remove();
                        };
                    })(file));
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
    </script>
@endsection
