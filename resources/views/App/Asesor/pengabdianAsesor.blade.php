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
@endsection
