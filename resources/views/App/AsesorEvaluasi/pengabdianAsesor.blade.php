@extends('Template.asesorFedDetail')

@section('content-kegiatan')
    @php
        use App\Utils\Tools;
        $check = Tools::checkAsesor(json_decode(json_encode($auth->user->data_lengkap->dosen), true)['pegawai_id']);
    @endphp

    @if ($check['data']['tipe_asesor'] == '1')
        @php
            $tipeAsesor = 'asesor1_fed';
        @endphp
    @else
        @php
            $tipeAsesor = 'asesor2_fed';
        @endphp
    @endif

    {{-- BAGIAN A --}}
    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
            <hr />
            <div class="text-sm">
                <table id="tabelpengabdian-A"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle" style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($kegiatan as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_durasi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>

                                <td>
                                    <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalSetuju-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger mr-1"
                                        data-bs-toggle="modal"data-bs-target="#modalTolak-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-x-lg"></i></button>
                                </td>
                                @if ($item[$tipeAsesor] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item[$tipeAsesor] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                class="badge bg-warning text-dark text-wrap text-start">{{ $item[$tipeAsesor] }}</span>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPengabdian_A-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>


                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN A --}}
                            <div class="modal fade" id="modalLihatLampiranPengabdian_A-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPengabdianALabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPengabdianALabel">A. Satu kegiatan
                                                yang setara dengan 50 jam kerja</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Permohonan/undangan atau surat penerimaan dari
                                                                lembaga yang menjadi sasaran pengabdian masyarakat
                                                            </li>
                                                            <li>Surat tugas/ijin/persetujuan dari pimpinan</li>
                                                            <li>Laporan kegiatan</li>
                                                            <li>Materi yang disampaikan</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
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

                            {{-- MODAL SETUJU --}}
                            <div class="modal fade text-center" id="modalSetuju-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                            <input type="hidden" name="komentar" value="setuju">
                                            <div class="modal-body">
                                                <h1><i class="bi bi-check-circle text-success"></i></h1>
                                                <h5>Yakin untuk menyetujui kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda
                                                    sudah
                                                    menekan tombol 'Yakin'
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Yakin</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            {{-- END OF MODAL SETUJUI --}}

                            {{-- MODAL TOLAK --}}

                            <div class="modal fade text-center" id="modalTolak-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                            <h5>Yakin untuk menolak kegiatan ini?</h5>
                                            <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah
                                                menekan tombol 'Yakin'
                                            </p>
                                        </div>

                                        {{-- FORM KOMENTAR --}}

                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control" placeholder="Tambahkan Komentar"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </form>

                                        {{-- END OF FORM KOMENTAR --}}

                                    </div>
                                </div>
                            </div>

                            {{-- END OF MODAL TOLAK --}}
                        @endforeach
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
                <table id="tablepengabdian-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Durasi Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penyuluhan as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_durasi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalSetuju-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger mr-1"
                                        data-bs-toggle="modal"data-bs-target="#modalTolak-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-x-lg"></i></button>
                                </td>
                                @if ($item[$tipeAsesor] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item[$tipeAsesor] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                class="badge bg-warning text-dark text-wrap text-start">{{ $item[$tipeAsesor] }}</span>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_B-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN B --}}
                            <div class="modal fade" id="modalLihatLampiranPengabdian_B-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPengabdianBLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPengabdianBLabel">B. Memberikan penyuluhan/penataran kepada masyarakat</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Permohonan/undangan atau surat penerimaan dari
                                                                lembaga yang menjadi sasaran pengabdian masyarakat
                                                            </li>
                                                            <li>Surat tugas/ijin/persetujuan dari pimpinan</li>
                                                            <li>Laporan kegiatan</li>
                                                            <li>Materi yang disampaikan</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
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

                            {{-- MODAL SETUJU --}}
                            <div class="modal fade text-center" id="modalSetuju-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                            <input type="hidden" name="komentar" value="setuju">
                                            <div class="modal-body">
                                                <h1><i class="bi bi-check-circle text-success"></i></h1>
                                                <h5>Yakin untuk menyetujui kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda
                                                    sudah
                                                    menekan tombol 'Yakin'
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Yakin</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            {{-- END OF MODAL SETUJUI --}}

                            {{-- MODAL TOLAK --}}

                            <div class="modal fade text-center" id="modalTolak-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                            <h5>Yakin untuk menolak kegiatan ini?</h5>
                                            <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah
                                                menekan tombol 'Yakin'
                                            </p>
                                        </div>

                                        {{-- FORM KOMENTAR --}}

                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control" placeholder="Tambahkan Komentar"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </form>

                                        {{-- END OF FORM KOMENTAR --}}

                                    </div>
                                </div>
                            </div>

                            {{-- END OF MODAL TOLAK --}}
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
            <h6><b>C. Memberikan jasa konsultan yang relevan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</b>
            </h6>
            <hr />
            <div class="text-sm">
                <table id="tablepengabdian-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($konsultan as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalSetuju-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger mr-1"
                                        data-bs-toggle="modal"data-bs-target="#modalTolak-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-x-lg"></i></button>
                                </td>
                                @if ($item[$tipeAsesor] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item[$tipeAsesor] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                class="badge bg-warning text-dark text-wrap text-start">{{ $item[$tipeAsesor] }}</span>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_C-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN C --}}
                            <div class="modal fade" id="modalLihatLampiranPengabdian_C-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPengabdianCLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPengabdianCLabel">C. Memberikan jasa konsultan yang relevan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Permohonan/Persetujuan/ Keputusan/Penunjukkan
                                                                sebagai Konsultan/ Tenaga Ahli/Staf Ahli dari
                                                                institusi terkait</li>
                                                            <li>Laporan progres layanan konsultasi, bagi yang sedang
                                                                berjalan</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
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

                            {{-- MODAL SETUJU --}}
                            <div class="modal fade text-center" id="modalSetuju-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                            <input type="hidden" name="komentar" value="setuju">
                                            <div class="modal-body">
                                                <h1><i class="bi bi-check-circle text-success"></i></h1>
                                                <h5>Yakin untuk menyetujui kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda
                                                    sudah
                                                    menekan tombol 'Yakin'
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Yakin</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            {{-- END OF MODAL SETUJUI --}}

                            {{-- MODAL TOLAK --}}

                            <div class="modal fade text-center" id="modalTolak-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                            <h5>Yakin untuk menolak kegiatan ini?</h5>
                                            <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah
                                                menekan tombol 'Yakin'
                                            </p>
                                        </div>

                                        {{-- FORM KOMENTAR --}}

                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control" placeholder="Tambahkan Komentar"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </form>

                                        {{-- END OF FORM KOMENTAR --}}

                                    </div>
                                </div>
                            </div>

                            {{-- END OF MODAL TOLAK --}}
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
            <h6><b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber
                    ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber – ISBN</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablepengabdian-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahapan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($karya as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jenis_terbit'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalSetuju-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger mr-1"
                                        data-bs-toggle="modal"data-bs-target="#modalTolak-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-x-lg"></i></button>
                                </td>
                                @if ($item[$tipeAsesor] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item[$tipeAsesor] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                class="badge bg-warning text-dark text-wrap text-start">{{ $item[$tipeAsesor] }}</span>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalLihatLampiranPenelitian_D-{{ $item['id_rencana'] }}">Lihat
                                        Lampiran</button>
                                </td>
                            </tr>
                            {{-- TEMPAT MODAL LIHAT FILE LAMPIRAN D --}}
                            <div class="modal fade" id="modalLihatLampiranPengabdian_D-{{ $item['id_rencana'] }}"
                                tabindex="-1" aria-labelledby="modalLihatLampiranPengabdianDLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modalLihatLampiranPengabdianDLabel">D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber
                                                ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber – ISBN</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                        <ol>
                                                            <li>Surat Permohonan/Persetujuan/ Keputusan/Penunjukkan
                                                                sebagai Konsultan/ Tenaga Ahli/Staf Ahli dari
                                                                institusi terkait</li>
                                                            <li>Laporan progres layanan konsultasi, bagi yang sedang
                                                                berjalan</li>
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
                                                                            <a href={{ env('API_FED_SERVICE') . '/pengabdian/get-lampiran/' . base64_encode($i) }}
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
                            {{-- AKHIR MODAL LIHAT LAMPIRAN D--}}

                            {{-- MODAL SETUJU --}}
                            <div class="modal fade text-center" id="modalSetuju-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                            <input type="hidden" name="komentar" value="setuju">
                                            <div class="modal-body">
                                                <h1><i class="bi bi-check-circle text-success"></i></h1>
                                                <h5>Yakin untuk menyetujui kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda
                                                    sudah
                                                    menekan tombol 'Yakin'
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Yakin</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            {{-- END OF MODAL SETUJUI --}}

                            {{-- MODAL TOLAK --}}

                            <div class="modal fade text-center" id="modalTolak-{{ $item['id_rencana'] }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                            <h5>Yakin untuk menolak kegiatan ini?</h5>
                                            <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah
                                                menekan tombol 'Yakin'
                                            </p>
                                        </div>

                                        {{-- FORM KOMENTAR --}}

                                        <form action="{{ route('ed-asesor-review-evaluasi') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana" value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control" placeholder="Tambahkan Komentar"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </form>

                                        {{-- END OF FORM KOMENTAR --}}

                                    </div>
                                </div>
                            </div>

                            {{-- END OF MODAL TOLAK --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}
@endsection
