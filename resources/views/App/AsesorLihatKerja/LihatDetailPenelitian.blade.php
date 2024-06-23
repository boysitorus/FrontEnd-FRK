@extends('Template.LihatKerja')

@section('content-kegiatan')

    {{-- BAGIAN A --}}
    <div id="penelitian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh
                    kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelpenelitian-A"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle" style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>

                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_kelompok as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_A-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>


                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_A-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianALabel">A. Keterlibatan
                                                dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang
                                                dilakukan oleh
                                                kelompok (disetujui oleh pimpinan dan tercapai)</h6>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan
                    tercatat)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepenelitian-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_mandiri as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_B-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN B --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_B-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianBLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianBLabel">Pelaksanaan
                                                penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh
                                                pimpinan dan
                                                tercatat)</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Keterangan dari Pimpinan
                                                                / Ka LPPM atau Surat Kontrak Penelitian</li>
                                                            <li>Proposal</li>
                                                            <li>Laporan progress report bila belum selesai</li>
                                                            <li>Surat pernyataan dari Ka LPPM
                                                                bahwa penelitian sudah selesai
                                                            </li>
                                                            <li>Laporan akhir penelitian (termasuk
                                                                log book)</li>
                                                            <li>Foto karya seni / bukti lain yang
                                                                relevan jika terkait dengan pengembangan teknologi</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui
                    oleh pimpinan dan tercatat)sama dengan 3 sks.</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($buku_terbit as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_C-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN C --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_C-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianCLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianCLabel">C. Menulis 1
                                                judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4
                                                semester (disetujui
                                                oleh pimpinan dan tercatat)sama dengan 3 sks.</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                                Buku dari Pimpinan bagi yang sedang menulis buku,
                                                                dengan
                                                                mencantumkan akan selesai dalam
                                                                berapa lama, bagi yang sedang menulis.</li>
                                                            <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                proses</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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

    <div id="penelitian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional (berbahasa dan diedarkan secara internasional minimal
                    tiga negara), disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepenelitian-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahan Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pekerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($buku_internasional as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_D-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN D --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_D-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianDLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianDLabel">D. Menulis
                                                satu judul naskah buku internasional (berbahasa dan diedarkan secara
                                                internasional minimal
                                                tiga negara), disetujui oleh pimpinan dan tercatat</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                                Buku dari Pimpinan bagi yang sedang menulis buku,
                                                                dengan
                                                                mencantumkan akan selesai dalam
                                                                berapa lama, bagi yang sedang menulis.</li>
                                                            <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                proses
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan dalam waktu sebanyak-banyaknya 4
                    semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Ketua/ Editor/Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($menyadur as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_E-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_E-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianALabel">
                                                E.Menterjemahkan
                                                atau
                                                menyadur naskah buku teks yang
                                                akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui
                                                oleh
                                                pimpinan dan tercatat), sama dengan 2 sks </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Buku yang sudah terbit</li>
                                                            <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                                            <li>Surat Keterangan Sedang Menulis Buku dari Pimpinan
                                                                bagi
                                                                yang
                                                                sedang menulis buku, dengan mencantumkan akan
                                                                selesai
                                                                dalam
                                                                berapa lama, bagi yang sedang menulis</li>
                                                            <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                proses</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="penelitian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester
                    (disetujui pimpinan dan tercatat) sama dengan 2 sks</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepenelitian-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Posisi (Penulis Utama/Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($menyunting as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_F-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN F --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_F-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianFLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianFLabel">F. Menyunting
                                                satu judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya
                                                4 semester
                                                (disetujui pimpinan dan tercatat)
                                                sama dengan 2 sks</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keterangan Telah Menyunting
                                                                Buku
                                                                dari
                                                                Pimpinan dengan
                                                                mencantumkan akan selesai dalam berapa lama.</li>
                                                            <li>Buku yang sudah terbit</li>
                                                            <li>bukti kontrak penerbitan jika masih naik cetak</li>
                                                            <li>Progres penyuntingan naskah buku</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan bidang ilmu dan tidak
                    diterbitkan, tetapi digunakan oleh mahasiswa</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_modul as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_G-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN G --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_G-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianGLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianGLabel">G. Menulis
                                                Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan bidang ilmu
                                                dan tidak
                                                diterbitkan, tetapi digunakan oleh mahasiswa</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas atau Surat Keputusan Mengajar (mata
                                                                kuliah
                                                                yang
                                                                dimodulkan) dari Pimpinan</li>
                                                            <li>Modul/Diktat/Bahan Ajar yang sudah jadi</li>
                                                            <li>Bukti lain yang menunjukkan bahwa modul/diktat/bahan
                                                                ajar
                                                                sudah dipergunakan oleh mahasiswa</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. PEKERTI/AA</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-H"
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
                        @foreach ($penelitian_pekerti as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_H-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN H --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_H-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianHLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianHLabel">H.
                                                PEKERTI/AA</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                            </li>
                                                            <li>Sertifikat</li>
                                                            <li>Tugas yang diselesaikan selama pelatihan seperti
                                                                RKPSS yang
                                                                sudah siap dll.</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Banyaknya BKD yang
                                Dievaluasi
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_tridharma as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_bkd'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_I-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN I --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_I-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianILabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianILabel">I. Sebagai
                                                asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi
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
                                                            <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                            </li>
                                                            <li>Surat permohonan dari institusi lain</li>
                                                            <li>Lembar Pengesahan/bukti kegiatan yg disahkan atasan
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
    <div id="penelitian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Menulis jurnal ilmiah</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($jurnal_ilmiah as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_penerbit'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_J-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN J --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_J-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianJLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianJLabel">J. Menulis
                                                jurnal ilmiah</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Jurnal yang sudah diterbitkan atau surat
                                                                keterangan/penerimaan dr redaksi & naskah, bagi yang
                                                                belum diterbitkan.</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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

    {{-- BAGIAN K --}}
    <div id="penelitian-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Memperoleh hak paten</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-K"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($hak_paten as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_wilayah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_K-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN K --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_K-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianKLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianKLabel">K.
                                                Memperoleh hak paten</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                            </li>
                                                            <li>Sertifikat</li>
                                                            <li>Tugas yang diselesaikan selama pelatihan seperti
                                                                RKPSS yang
                                                                sudah siap dll.</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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

    <div id="penelitian-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>L. Menulis di media massa</b>
            </h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-L"
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
                        @foreach ($media_massa as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_L-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_L-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianLLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianLLabel">L. Menulis
                                                di media massa</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Foto kopi tulisan yang dimuat di
                                                                Koran/majalah</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
                            {{-- AKHIR MODAL LIHAT LAMPIRAN L --}}


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN L --}}

    {{-- BAGIAN M --}}
    <div id="penelitian-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>M. Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya</b>
            </h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-M"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tingkatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($pembicara_seminar as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_wilayah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_M-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN M --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_M-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianMLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianMLabel">M.
                                                Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait
                                                dengan bidang keilmuannya</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Permohonan sebagai Pembicara/Nara Sumber</li>
                                                            <li>Surat tugas/ijin/persetujuan dari Pimpinan</li>
                                                            <li>Naskah/ materi yang diberikan</li>
                                                            <li>Sertifikat (jika ada)</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
                            {{-- AKHIR MODAL LIHAT LAMPIRAN M --}}


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN M --}}

    {{-- BAGIAN N --}}
    <div id="penelitian-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>N. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tablepenelitian-N"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tingkatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penyajian_makalah as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_wilayah'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_N-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPenelitian_N-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPenelitianNLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPenelitianNLabel">N. Penyaji
                                                makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Penerimaan untuk disajkina dari Panitia</li>
                                                            <li>Surat tugas/ijin/persetujuan dari Pimpinan</li>
                                                            <li>Naskah/materi yang diberikan</li>
                                                            <li>Sertifikat (jika ada)</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/penelitian/get-lampiran/' . base64_encode($i) }}
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
                            {{-- AKHIR MODAL LIHAT LAMPIRAN N --}}


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN N --}}
@endsection
