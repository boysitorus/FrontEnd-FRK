@extends('Template.LihatKerja')

@section('content-kegiatan')

    {{-- BAGIAN A --}}
    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelpengabdian-A"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle" style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>

                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($akademik as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_A-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_A-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
    <div id="pengabdian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($bimbingan as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_B-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_B-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangBLabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}

    <div id="pengabdian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa), Himadep
                    (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa), BLM (Badan Legislatif Mahasiswa, BSO
                    (Badan Semi Otonom: misal SKI, kelompok kajian), Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI,
                    LKIP</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($ukm as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_C-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN C --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_C-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangCLabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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

    <div id="pengabdian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a. Koperasi
                    fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($sosial as $item)
                            <tr>
                                <td scope="row1">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_D-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_D-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
    <div id="pengabdian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($struktural as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jenis_jabatan_struktural'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_E-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                        {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN E --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_E-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
    <div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($nonstruktural as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jenis_jabatan_nonstruktural'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_F-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN F --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_F-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
    <div id="pengabdian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($redaksi as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jabatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_G-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_G-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
    <div id="pengabdian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2 semester), seperti Panitia Reviewer RKAT,
                    Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-H"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($adhoc as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jabatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_H-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_H-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="pengabdian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($ketuapanitia as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                @if ($item['jenis_tingkatan'] == 1)
                                    <td>Universitas</td>
                                @elseif ($item['jenis_tingkatan'] == 2)
                                    <td>Fakultas</td>
                                @elseif ($item['jenis_tingkatan'] == 3)
                                    <td>Program Studi</td>
                                @else
                                    <td>Tidak</td>
                                @endif
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_I-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_I-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- BAGIAN J --}}
    <div id="pengabdian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Tingkat Jabatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($anggotapanitia as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                @if ($item['jenis_tingkatan'] == 1)
                                    <td>Ketua</td>
                                @else
                                    <td>Anggota</td>
                                @endif
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_J-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_J-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K --}}
    <div id="pengabdian-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-K"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan
                                (Ketua/Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($pengurusyayasan as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                @if ($item['jabatan'] == 1)
                                    <td>Ketua</td>
                                @elseif ($item['jabatan'] == 2)
                                    <td>Anggota</td>
                                @else
                                    <td>Tidak terdefinisi</td>
                                @endif
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_K-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                        {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN K --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_K-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                            {{-- AKHIR MODAL LIHAT LAMPIRAN K --}}

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN K --}}

    {{-- BAGIAN L --}}
    <div id="pengabdian-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-L"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan
                                (Ketua/Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Tingkatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($asosiasi as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jabatan'] }}</td>
                                <td>{{ $item['jenis_tingkatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_L-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_L-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN L --}}

    {{-- BAGIAN M --}}
    <div id="pengabdian-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>M. Peserta seminar/workshop/kursus berdasar penugasan pimpinan</b></h6>
            <hr />
            <div class="text-sm">
                <table id="pengabdian-M"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Tingkatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($seminar as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jenis_tingkatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_M-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_M-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN M --}}

    {{-- BAGIAN N --}}
    <div id="pengabdian-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
            <hr />
            <div class="text-sm">
                <table id="pengabdian-N"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($asosiasi as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenunjang_N-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>

                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenunjang_N-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenunjangALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenunjangALabel">A. Bimbingan Akademik (perwalian/penasehat akademik)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penunjang/get-lampiran/' . base64_encode($i) }}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN N --}}


@endsection
