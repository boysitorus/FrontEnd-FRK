@extends('Template.asesorDetail')

@section('content-kegiatan')
    @php
        use App\Utils\Tools;
        $check = Tools::checkAsesor(json_decode(json_encode($auth->user->data_lengkap->dosen), true)['pegawai_id']);
    @endphp

    @if ($check['data']['tipe_asesor'] == '1')
        @php
            $tipeAsesor = 'asesor1_frk';
        @endphp
    @else
        @php
            $tipeAsesor = 'asesor2_frk';
        @endphp
    @endif

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
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Banyaknya BKD yang Dievaluasi
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja
                                            </h1>
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana"
                                                    value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control"
                                                    placeholder="Tambahkan Komentar" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja
                                            </h1>
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana"
                                                    value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control"
                                                    placeholder="Tambahkan Komentar" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja
                                            </h1>
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana"
                                                    value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control"
                                                    placeholder="Tambahkan Komentar" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja
                                            </h1>
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana"
                                                    value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control"
                                                    placeholder="Tambahkan Komentar" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            </tr>

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
                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja
                                            </h1>
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

                                        <form action="{{ route('rk-asesor-review-rencana') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 p-3">
                                                <input type="hidden" name="id_rencana"
                                                    value={{ $item['id_rencana'] }}>
                                                <input id="input_komentar_{{ $item['id_rencana'] }}" type="text"
                                                    name="komentar" class="form-control"
                                                    placeholder="Tambahkan Komentar" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
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
    {{-- AKHIR BAGIAN N --}}
@endsection
