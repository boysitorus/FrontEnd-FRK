@extends('Template.RiwayatKegiatan')

@section('content-kegiatan')

    {{-- BAGIAN A --}}
    <div id="pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPendidikan-A"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle" style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Tatap Muka</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas Evaluasi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Mata Kuliah</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>

                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($teori as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelas'] }}</td>
                                <td>{{ $item['jumlah_evaluasi'] }}</td>
                                <td>{{ $item['sks_matakuliah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_A-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>

                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_A-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanALabel">A. Kuliah
                                                (Teori)
                                                pada tingkat Diploma
                                                dan S1 terhadap setiap kelompok</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Keterangan dari Pimpinan/Ka LPPM atau Surat
                                                                Kontrak Penelitian</li>
                                                            <li>Proposal</li>
                                                            <li>Laporan progress report bila belum selesai</li>
                                                            <li>Surat pernyataan dari Ka LPPM bahwa penelitian sudah
                                                                selesai</li>
                                                            <li>Laporan akhir penelitian (termasuklog book)</li>
                                                            <li>Foto karya seni / bukti lain yang relevan jika
                                                                terkait dengan pengembangan teknologi
                                                            </li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN A --}}

                        @endforeach
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
                <table id="tablePendidikan-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
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
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($praktikum as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelas'] }}</td>
                                <td>{{ $item['sks_matakuliah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_B-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN B --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_B-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanBLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanBLabel">B. Asistensi
                                                tugas atau praktikum terhadap setiap kelompok</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Berita Acara Praktikum atau Asistensi</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Daftar Nilai tugas</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN B --}}

                        @endforeach


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
                <table id="tablePendidikan-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa Bimbingan
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($bimbingan as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_C-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN C --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_C-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanCLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanCLabel">C. Bimbingan
                                                kuliah kerja yang terprogram terhadap setiap kelompok, Pembimbingan Praktek
                                                Klinik/Lapangan,
                                                dan DPL (Dosen Pembimbing lapangan)</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Mengajar dari
                                                                Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Berita Acara bimbingan</li>
                                                            <li>Daftar Nilai tugas atau laporan hasil praktek</li>
                                                            <li>Berita Acara bimbingan</li>
                                                            <li>Daftar Nilai tugas atau laporan hasil praktek</li>
                                                            <li>Daftar nilai atau laporan KKN</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN C --}}

                        @endforeach

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
                <table id="tablePendidikan-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($seminar as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelompok'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_D-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN D --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_D-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanDLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanDLabel">D. Seminar
                                                yang terjadwal terhadap setiap kelompok</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Membimbing Seminar dan Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Berita acara bimbingan</li>
                                                            <li>Daftar Nilai Akhir</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN D --}}

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}


    {{-- BAGIAN E --}}
    <div id="pendidikan-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan
                    pembimbing penyerta dinilai sama</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($tugasAkhir as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelompok'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_E-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN E --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_E-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanELabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanELabel">E. Bimbingan
                                                dan tugas akhir/Skripsi/Karya Tulis Ilmiah SO (Diploma) dan S1 Dosen
                                                Pembimbing utama dan
                                                pembimbing penyerta dinilai sama</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Bukti pembimbingan</li>
                                                            <li>Berita acara ujian skripsi</li>
                                                            <li>Daftar Nilai</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN E --}}

                        @endforeach

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
            <hr />

            <div class="text-sm">
                <table id="tablePendidikan-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelompok</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($proposal as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_F-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN F --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_F-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanFLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanFLabel">F. Menguji
                                                proposal S1, S2, S3, Kualifikasi</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Bukti pembimbingan</li>
                                                            <li>Berita acara ujian skripsi</li>
                                                            <li>Daftar Nilai</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN F --}}

                        @endforeach

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
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen Bimbingan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($seminar as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kelompok'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_G-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN G --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_G-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanGLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanGLabel">G. Membimbing
                                                dosen yang lebih rendah Jenjang Jabatan Akademiknya</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Presensi Mahasiswa</li>
                                                            <li>Bukti pembimbingan</li>
                                                            <li>Berita acara ujian skripsi</li>
                                                            <li>Daftar Nilai</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN G --}}

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- BAGIAN H --}}
    <div id="pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                    yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-H"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah SAP</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($kembang as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_sap'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_H-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN H --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_H-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanHLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanHLabel">H.
                                                Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll)
                                                dalam kelompok atau mandiri
                                                yang hasilnya dipakai untuk kegiatan perkuliahan</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Bukti hasil(Silabus, SAP/RKPSS, GBPP) yang baru dan
                                                                silabus, SAP/RKPSS. GBPP yang
                                                                sebelumnya</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN H --}}

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablePendidikan-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen (Maks. 2/smt)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($cangkok as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_dosen'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_I-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN I --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_I-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanILabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanILabel">I.
                                                Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester
                                            </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Membimbing dari
                                                                Pimpinan</li>
                                                            <li>Bukti yang relevan (laporan kegiatan)</li>
                                                        </ol>
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN I --}}

                        @endforeach

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
                <table id="tablePendidikan-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-3">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($koordinator as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPendidikan_J-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN J --}}
                            <div class="modal fade" id="modalLihatLampiranPendidikan_J-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPendidikanJLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPendidikanJLabel">J.
                                                Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau KP</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                        <div class="font-weight-bold">List Lampiran yang telah diupload
                                                        </div>
                                                        <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pendidikan/get-lampiran/' . base64_encode($i) }}
                                                                                class="ms-2">{{ $i }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL LIHAT LAMPIRAN J --}}

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN J --}}
@endsection
