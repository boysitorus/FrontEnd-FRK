@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENDIDIKAN --}}
<style>
  .border-hijau {
    border: 2px solid #008000; /* Border berwarna hijau */
    padding: 3px; /* Padding untuk memberi ruang di sekitar teks */
    border-radius: 5px; /* Untuk memberikan sudut-sudut yang melengkung pada border */
    display: inline-block; /* Mengatur agar border memenuhi ruang yang tersedia */
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
                <table id="tableEvaluasiPendidikan-A" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_kelas'] }}</td>
                                    <td>{{ $item['jumlah_evaluasi'] }}</td>
                                    <td>{{ $item['sks_matakuliah'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_A">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- TEMPAT MODAL ADD FILE A--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_A" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtn" class="btn btn-secondary">Add Files</button>
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFiles"></div>
                                </div>
                                <input type="file" id="fileInput" style="display: none;" multiple>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p> <!-- tambahkan jarak bawah -->
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
    {{-- AKHIR MODAL ADD FILE A--}}

    {{-- BAGIAN B --}}
    <div id="ed-pendidikan-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Asistensi tugas atau praktikum terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-B" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_kelas'] }}</td>
                                    <td>{{ $item['sks_matakuliah'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_B">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- TEMPAT MODAL ADD FILE B--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_B" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanBLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanBLabel">B. Asistensi tugas atau praktikum terhadap setiap kelompok</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button id="addFilesBtn" class="btn btn-secondary">Add Files</button>
                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                    <div id="selectedFiles"></div>
                                </div>
                                <input type="file" id="fileInput" style="display: none;" multiple>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari 1 </p> <!-- tambahkan jarak bawah -->
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
    {{-- AKHIR MODAL ADD FILE B--}}

    {{-- BAGIAN C --}}
    <div id="ed-pendidikan-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan,
                    dan DPL (Dosen Pembimbing lapangan)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-C" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan
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
                        @if (isset($bimbingan) && sizeof($bimbingan) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($bimbingan as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_C">Tambah Lampiran</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--AKHIR BAGIAN C --}}

    {{-- TEMPAT MODAL ADD FILE C--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_C" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanCLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanCLabel">C. Bimbingan kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek Klinik/Lapangan,
                    dan DPL (Dosen Pembimbing lapangan)</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                <ol>
                                    <li>Surat  Tugas atau  Surat  Keputusan  Mengajar  dari  Pimpinan</li>
                                    <li>Presensi Mahasiswa</li>
                                    <li>Berita Acara  bimbingan</li> 
                                    <li>Daftar Nilai  tugas atau  laporan hasil  praktek</li>
                                    <li>Berita Acara  bimbingan</li>
                                    <li>Daftar Nilai  tugas atau  laporan hasil  praktek</li>
                                    <li>Daftar nilai atau  laporan KKN</li>
                                </ol>
                                <!-- File input -->
                                <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    <div id="ed-pendidikan-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional  
                (berbahasa dan diedarkan secara internasional minimal  tiga negara), 
                disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-D" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle" 
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
                    @if (isset($seminar) && sizeof($seminar) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($seminar as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_kelompak'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_D">Tambah Lampiran</button>
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
    <div class="modal fade" id="modalEditEvaluasiPendidikan_D" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanDLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanDLabel">D. Menulis satu judul naskah buku internasional  
                        (berbahasa dan diedarkan secara internasional minimal  tiga negara), disetujui oleh pimpinan dan tercatat</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE D--}}

    {{-- BAGIAN E --}}
    <div id="ed-pendidikan-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan
                    pembimbing penyerta dinilai sama</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-E" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelompok'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditEvaluasiPendidikan_E">Tambah Lampiran</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- TEMPAT MODAL ADD FILE E--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_E" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanELabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanELabel">E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan
                    pembimbing penyerta dinilai sama</h6>
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
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE E--}}

    {{-- BAGIAN F --}}
    <div id="ed-pendidikan-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menguji proposal S1, S2, S3, Kualifikasi</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-F" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_F">Tambah Lampiran</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- TEMPAT MODAL ADD FILE F--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_F" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanFLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanFLabel">F. Menguji proposal S1, S2, S3, Kualifikasi</h6>
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
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE F--}}

    {{-- BAGIAN G --}}
    <div id="ed-pendidikan-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-G" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_G">Tambah Lampiran</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- TEMPAT MODAL ADD FILE G--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_G" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanGLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanGLabel">G. Membimbing dosen yang lebih rendah Jenjang Jabatan Akademiknya</h6>
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
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE G--}}

    {{-- BAGIAN H --}}
    <div id="ed-pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                    yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-H" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_H">Tambah Lampiran</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- TEMPAT MODAL ADD FILE H--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_H" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanHLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanHLabel">H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
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
                                    <li>Bukti hasil(Silabus,  SAP/RKPSS,  GBPP) yang baru  dan silabus,  SAP/RKPSS. GBPP  yang sebelumnya</li>
                                </ol>
                                 <!-- File input -->
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE H--}}

    {{-- BAGIAN I --}}
    <div id="ed-pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b><h6>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tableEvaluasiPendidikan-I" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
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
                            <td>
                                <div class="border-hijau">
                                    <p>Lampiran sudah di upload</p>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_I">Tambah Lampiran</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- TEMPAT MODAL ADD FILE I--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_I" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanILabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanILabel">I. Melaksanakan kegiatan detasering dan pencangkokan 
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
                                    <li>Bukti yang  relevan  (laporan  kegiatan)</li>
                                </ol>
                                 <!-- File input -->
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE I--}}

    {{-- BAGIAN J--}}
    <div id="ed-pendidikan-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
            <div class="card-body">
                <h6><b>J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</b></h6>
                <hr />

                <div class="text-sm">
                    <table id="tableEvaluasiPendidikan-J" class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="border-hijau">
                                        <p>Lampiran sudah di upload</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditEvaluasiPendidikan_J">Tambah Lampiran</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- TEMPAT MODAL ADD FILE J--}}
    <div class="modal fade" id="modalEditEvaluasiPendidikan_J" tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanJLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalEditEvaluasiPendidikanJLabel">J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</h6>
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
                                 <input type="file" id="fileInput" multiple>
                            </br>
                            </br>
                                <p style="color: #808080;">Maximum file size: 5MB, maximum number of files: 50</p>
                                <p>*Dokumen yang dilengkapi dapat lebih dari 1 </p>
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
    {{-- AKHIR MODAL ADD FILE J--}}

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

            // document.getElementById('confirmEditBtnB').addEventListener('click', function() {
            //     showEditToast();
            // });

            // document.getElementById('confirmEditBtnC').addEventListener('click', function() {
            //     showEditToast();
            // });

            // document.getElementById('confirmEditBtnD').addEventListener('click', function() {
            //     showEditToast();
            // });

            // document.getElementById('confirmEditBtnE').addEventListener('click', function() {
            //     showEditToast();
            // });

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

            // document.getElementById('confirmDeleteBtnB').addEventListener('click', function() {
            //     showDeleteToast();
            // });

            // document.getElementById('confirmDeleteBtnC').addEventListener('click', function() {
            //     showDeleteToast();
            // });

            // document.getElementById('confirmDeleteBtnD').addEventListener('click', function() {
            //     showDeleteToast();
            // });

            // document.getElementById('confirmDeleteBtnE').addEventListener('click', function() {
            //     showDeleteToast();
            // });

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

            // Fungsi untuk menampilkan file yang dipilih beserta ikonnya
            function displayFilesWithIcons(files) {
                var selectedFilesDiv = document.getElementById('selectedFiles');
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
                    deleteBtn.classList.add('btn', 'btn-secondary', 'btn-sm', 'btn-circle', 'ms-2');
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
            document.getElementById('fileInput').addEventListener('change', function() {
                var files = this.files;
                displayFilesWithIcons(files);
            });

            // document.getElementById('fileInputB').addEventListener('change', function() {
            //     var files = this.files;
            //     displayFilesWithIcons(files);
            // });

            // document.getElementById('fileInputC').addEventListener('change', function() {
            //     var files = this.files;
            //     displayFilesWithIcons(files);
            // });

            // document.getElementById('fileInputD').addEventListener('change', function() {
            //     var files = this.files;
            //     displayFilesWithIcons(files);
            // });

            // document.getElementById('fileInputE').addEventListener('change', function() {
            //     var files = this.files;
            //     displayFilesWithIcons(files);
            // });

            // Fungsi untuk menambah file
            document.getElementById('addFilesBtn').addEventListener('click', function() {
                var fileInput = document.getElementById('fileInput');
                fileInput.click();
            });

            // document.getElementById('addFilesBtnB').addEventListener('click', function() {
            //     var fileInput = document.getElementById('fileInput');
            //     fileInput.click();
            // });

            // document.getElementById('addFilesBtnC').addEventListener('click', function() {
            //     var fileInput = document.getElementById('fileInput');
            //     fileInput.click();
            // });

            // document.getElementById('addFilesBtnD').addEventListener('click', function() {
            //     var fileInput = document.getElementById('fileInput');
            //     fileInput.click();
            // });

            // document.getElementById('addFilesBtnE').addEventListener('click', function() {
            //     var fileInput = document.getElementById('fileInput');
            //     fileInput.click();
            // });

            // Variabel global untuk menyimpan file-file yang dipilih
            var selectedFiles = [];
        </script>

        <script>
            //fileInput.addEventListener('change', function() {
            
                // Bersihkan konten sebelumnya dari div yang menampilkan file yang dipilih
            //selectedFilesDiv.innerHTML = '';

            // Periksa apakah pengguna sudah memilih file atau belum
            //if (fileInput.files.length > 0) {
                
                // Jika pengguna sudah memilih file, tampilkan file yang dipilih
                //for (let i = 0; i < fileInput.files.length; i++) {
                    //const file = fileInput.files[i];
                    //const fileName = file.name;
                    //const fileListItem = document.createElement('div');
                    //fileListItem.textContent = fileName;
                    //fileListItem.classList.add('border-hijau', 'p-1', 'mb-1'); // Tambahkan kelas CSS untuk border hijau
                    //selectedFilesDiv.appendChild(fileListItem);
                //}
                
                // Tambahkan kelas CSS untuk border hijau pada tabel kegiatan
                //document.querySelectorAll('#tableEvaluasiPendidikan-A tbody td:nth-child(2)').forEach(function(td) {
                    //td.classList.add('border-hijau');
                //});
            //} else {
                
                // Jika pengguna belum memilih file, tampilkan pesan bahwa belum ada file yang dipilih
                //const noFilesMessage = document.createElement('p');
                //noFilesMessage.textContent = 'Belum ada file yang dipilih';
                //noFilesMessage.classList.add('border-kuning', 'p-1', 'mb-1'); // Tambahkan kelas CSS untuk border kuning
                //selectedFilesDiv.appendChild(noFilesMessage);
                
                // Hapus kelas CSS untuk border hijau dari tabel kegiatan
                //document.querySelectorAll('#tableEvaluasiPendidikan-A tbody td:nth-child(2)').forEach(function(td) {
                    //td.classList.remove('border-hijau');
                //});
            //}
        //});

        </script>

@endsection