@extends('Template.rencana')


@section('content-kegiatan')
<meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- TAMPILAN BAGIAN PENDIDIKAN --}}

    {{-- BAGIAN A --}}
    <div id="pendidikan-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap setiap kelompok</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitian-A" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal"
                    data-bs-target="#modalPendidikan_A">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tabelPendidikan-A" class="table table-striped table-bordered mt-2 text-center"
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
                    <tbody class="align-middle">
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
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i
                                                class="bi bi-trash3"></i></button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                            anda sudah menekan tombol 'Yakin'
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        {{-- <a href="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                            id="confirmDeleteBtn" class="btn btn-danger">Yakin</a> --}}
                                                        <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                        <form id="delete-form-{{ $item['id_rencana'] }}"
                                                            action="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.teori.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text" class="form-control" id="nama"
                                                            name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_kelas" class="form-label">Jumlah Kelas
                                                            Tatap Muka</label>
                                                        <input placeholder="{{ $item['jumlah_kelas'] }}" type="number" class="form-control" name="jumlah_kelas">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_evaluasi" class="form-label">Jumlah Kelas
                                                            Evaluasi</label>
                                                        <input placeholder="{{ $item['jumlah_evaluasi'] }}" type="number" class="form-control"
                                                            name="jumlah_evaluasi">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sks_matakuliah" class="form-label">SKS Mata
                                                            Kuliah</label>
                                                        <input placeholder="{{ $item['sks_matakuliah'] }}" type="number" class="form-control" name="sks_matakuliah">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button> --}}
                                                        <button type="submit" class="btn btn-primary">
                                                            Simpan Perubahan
                                                        </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal"
                    data-bs-target="#modalPendidikan_B">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-B" class="table table-striped table-bordered mt-2 text-center align-middle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kelas
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Praktikum (1 SKS =
                                2
                                jam)</th>
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
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3-fill"></i></i></button>
                                    </td>
                                </tr>

                                {{-- MODAL UPDATE --}}

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.praktikum.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_kelas" class="form-label">Jumlah Kelas</label>
                                                        <input placeholder="{{ $item['jumlah_kelas'] }}" type="number"
                                                            class="form-control" name="jumlah_kelas">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sks_matakuliah" class="form-label">SKS Praktikum (1 SKS = 2 jam)</label>
                                                        <input placeholder="{{ $item['sks_matakuliah'] }}" type="number"
                                                            class="form-control" name="sks_matakuliah">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button> --}}
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                {{-- MODAL DELETE --}}

                                <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda
                                                    sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                {{-- <a href="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                    id="confirmDeleteBtn" class="btn btn-danger">Yakin</a> --}}
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-pendidikan.praktikum.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-pendidikan.praktikum.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_C">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-C" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                    <tbody class="align_middle">
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
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">Proses ini tidak dapat diurungkan bila
                                                            Anda sudah menekan tombol 'Yakin'.</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        <form
                                                            action="{{ route('rk-pendidikan.bimbingan.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirmDeleteBtn" type="submit"
                                                                class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{--MODAL EDIT C --}}
                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++}}. {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action ="{{ route('rk-pendidikan.bimbingan.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value ="{{ $item['id_rencana'] }}"/>
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan']}}" type="text" class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Bimbingan</label>
                                                        <input placeholder="{{ $item['jumlah_mahasiswa'] }}" class="form-control" type="number" name="jumlah_mahasiswa" min="1" step="any">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL EDIT C --}}

                            @endforeach
                        @endif
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianD" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_D">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-D" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody class="align_middle">
                        @if (isset($seminar) && sizeof($seminar) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($seminar as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_kelompok'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i></i>
                                        </button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">Proses ini tidak dapat diurungkan bila
                                                            Anda sudah menekan tombol 'Yakin'.</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        <form
                                                            action="{{ route('rk-pendidikan.seminar.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirmDeleteBtn" type="submit"
                                                                class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT D --}}
                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter }}. {{ $item['nama_kegiatan'] }}
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('rk-pendidikan.seminar.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}"/>
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan']}}" type="text" class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_kelompok" class="form-label">Jumlah kelompok</label>
                                                        <input placeholder="{{ $item['jumlah_kelompok'] }}" class="form-control" type="number" name="jumlah_kelompok" min="1" step="any">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL D --}}

                            @endforeach
                        @endif
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianE" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_E">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-E" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                    <tbody class="align-middle">
                        @if (isset($tugasAkhir) && sizeof($tugasAkhir) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($tugasAkhir as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPendidikan-{{$item['id_rencana']}}">
                                    <i class="bi bi-pencil-square"></i></button>

                               <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i class="bi bi-trash3-fill"></i></button>

                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body text-center">
                                                    <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                    <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                    <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                        anda sudah menekan tombol 'Yakin'
                                                    </p>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-pendidikan.tugasAkhir.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-pendidikan.tugasAkhir.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.tugasAkhir.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Dibimbing</label>
                                                        <input placeholder="{{ $item['jumlah_mahasiswa'] }}" type="number"
                                                            class="form-control" name="jumlah_mahasiswa" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                             @endforeach
                        @endif
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianF" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_F">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-F" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                    <tbody class="align-middle">
                        @if (isset($proposal) && sizeof($proposal) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($proposal as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPendidikan-{{$item['id_rencana']}}"><i class="bi bi-pencil-square"></i></button>
                               <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i class="bi bi-trash3-fill"></i></button>

                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body text-center">
                                                    <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                    <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                    <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                        anda sudah menekan tombol 'Yakin'
                                                    </p>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-pendidikan.proposal.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-pendidikan.proposal.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.proposal.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Dibimbing</label>
                                                        <input placeholder="{{ $item['jumlah_mahasiswa'] }}" type="number"
                                                            class="form-control" name="jumlah_mahasiswa" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                             @endforeach
                        @endif
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_G">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-G" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                                    <td scope="row">{{$counter++}}</td>
                                    <td>{{$item['nama_kegiatan']}}</td>
                                    <td>{{$item['jumlah_dosen']}}</td>
                                    <td>{{$item['sks_terhitung']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i></i>
                                        </button>

                                        {{-- MULAI MODAL G --}}
                                            <div class="modal fade modal-lg" id="modalEditPendidikan_{{ $item['id_rencana'] }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">G. Membimbing dosen yang lebih rendah Jenjang Jabatan
                                                                Akademiknya</h6>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ route('rk-pendidikan.rendah.update') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama Kegiatan</label>
                                                                    <input name="nama_kegiatan" type="text" class="form-control" id="nama" placeholder="{{$item['nama_kegiatan']}}" value="{{$item['nama_kegiatan']}}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Jumlah Dosen Dibimbing</label>
                                                                    <input name="jumlah_dosen" class="form-control" type="text" placeholder="{{$item['jumlah_dosen']}}" value="{{$item['jumlah_dosen']}}" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- AKHIR MODAL G --}}

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">Proses ini tidak dapat diurungkan bila Anda sudah menekan tombol 'Yakin'.</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                        <form action="{{ route('rk-pendidikan.rendah.destroy', ['id' => $item['id_rencana']]) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirmDeleteBtn" type="submit" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


    {{-- BAGIAN H --}}
    <div id="pendidikan-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri
                    yang hasilnya dipakai untuk kegiatan perkuliahan</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianH" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_H">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-H" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                                    <td scope="row">{{$counter++}}</td>
                                    <td>{{$item['nama_kegiatan']}}</td>
                                    <td>{{$item['jumlah_sap']}}</td>
                                    <td>{{$item['sks_terhitung']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i></i>
                                        </button>

                                        {{-- MULAI MODAL G --}}
                                            <div class="modal fade modal-lg" id="modalEditPendidikan_{{ $item['id_rencana'] }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">H. Mengembangkan program perkuliahan/pengajaran (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri yang hasilnya dipakai untuk kegiatan perkuliahan
                                                                Akademiknya</h6>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ route('rk-pendidikan.kembang.update') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama Kegiatan</label>
                                                                    <input name="nama_kegiatan" type="text" class="form-control" id="nama" placeholder="{{$item['nama_kegiatan']}}" value="{{$item['nama_kegiatan']}}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Jumlah SAP</label>
                                                                    <input name="jumlah_sap" class="form-control" type="text" placeholder="{{$item['jumlah_sap']}}" value="{{$item['jumlah_sap']}}" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- AKHIR MODAL G --}}

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">Proses ini tidak dapat diurungkan bila Anda sudah menekan tombol 'Yakin'.</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                        <form action="{{ route('rk-pendidikan.kembang.destroy', ['id' => $item['id_rencana']]) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirmDeleteBtn" type="submit" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


    {{-- BAGIAN I --}}
    <div id="pendidikan-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Melaksanakan kegiatan detasering dan pencangkokan dosen dalam 1 semester</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianI" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_I">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-I" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $counter }}">
                                            <i class="bi bi-trash3"></i></button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                            anda sudah menekan tombol 'Yakin'
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        {{-- <a href="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                            id="confirmDeleteBtn" class="btn btn-danger">Yakin</a> --}}
                                                        <a id="confirmDeleteBtn" class="btn btn-primary"
                                                            href="{{ route('rk-pendidikan.cangkok.destroy', ['id' => $item['id_rencana']]) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                        <form id="delete-form-{{ $item['id_rencana'] }}"
                                                            action="{{ route('rk-pendidikan.cangkok.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.cangkok.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">
                                                            Nama Kegiatan
                                                        </label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_dosen" class="form-label">
                                                            Jumlah Dosen (Maks. 2/smt)
                                                        </label>
                                                        <select class="form-control" name="jumlah_dosen" id="jumlah_dosen">
                                                            <option value="1" {{ $item['jumlah_dosen'] == 1 ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ $item['jumlah_dosen'] == 2 ? 'selected' : '' }}>2</option>
                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianJ" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_J">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-J" class="table table-striped table-bordered mt-2 text-center align-middle"
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
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPendidikan-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $counter }}">
                                            <i class="bi bi-trash3"></i></button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                            anda sudah menekan tombol 'Yakin'
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        {{-- <a href="{{ route('rk-pendidikan.teori.destroy', ['id' => $item['id_rencana']]) }}"
                                                            id="confirmDeleteBtn" class="btn btn-danger">Yakin</a> --}}
                                                        <a id="confirmDeleteBtn" class="btn btn-primary"
                                                            href="{{ route('rk-pendidikan.koordinator.destroy', ['id' => $item['id_rencana']]) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                        <form id="delete-form-{{ $item['id_rencana'] }}"
                                                            action="{{ route('rk-pendidikan.koordinator.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.koordinator.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">
                                                            Nama Kegiatan
                                                        </label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button> --}}
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K --}}
    <div id="pendidikan-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Asistensi tugas atau praktikum terhadap setiap kelompok.</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianK" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPendidikan_K">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePendidikan-K" class="table table-striped table-bordered mt-2 text-center align-middle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Dosen</th>
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
                        @if (isset($asistensi) && sizeof($asistensi) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($asistensi as $item)
                                <tr>
                                    <td scope="row">{{$counter++}}</td>
                                    <td>{{$item['nama_kegiatan']}}</td>
                                    <td>{{$item['jumlah_dosen']}}</td>
                                    <td>{{$item['jumlah_mahasiswa']}}</td>
                                    <td>{{$item['sks_terhitung']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPendidikan_{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i></i>
                                        </button>

                                        <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                        <p class="text-muted small">Proses ini tidak dapat diurungkan bila Anda sudah menekan tombol 'Yakin'.</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                        <form action="{{ route('rk-pendidikan.asistensi.destroy', ['id' => $item['id_rencana']]) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirmDeleteBtn" type="submit" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade modal-lg" id="modalEditPendidikan_{{ $item['id_rencana'] }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    K. Asistensi tugas atau praktikum terhadap setiap kelompok.
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-pendidikan.asistensi.update') }}" method="POST">
                                                <div class="modal-body">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama Kegiatan</label>
                                                            <input name="nama_kegiatan" placeholder="{{ $item['nama_kegiatan'] }}" type="text" class="form-control" id="nama" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Jumlah Dosen</label>
                                                            <input name="jumlah_dosen" placeholder="{{ $item['jumlah_dosen'] }}" type="text" class="form-control" id="nama" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa</label>
                                                            <input placeholder="{{ $item['jumlah_mahasiswa'] }}" type="text"
                                                                class="form-control" name="jumlah_mahasiswa" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN --}}

    {{-- MULAI MODAL A --}}
    <div class="modal fade modal-lg" id="modalPendidikan_A" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap
                        setiap kelompok</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-pendidikan.teori.create') }}" method="POST" class="needs-validation was-validated">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kelas" class="form-label">Jumlah Kelas Tatap Muka</label>
                            <input type="number" class="form-control" name="jumlah_kelas" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Kelas Tatap Muka perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_evaluasi" class="form-label">Jumlah Kelas Evaluasi</label>
                            <input type="number" class="form-control" name="jumlah_evaluasi" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Kelas Evaluasi perlu diisi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sks_matakuliah" class="form-label">SKS Mata Kuliah</label>
                            <input type="number" class="form-control" name="sks_matakuliah" required min="0" step="any">
                            <div class="invalid-feedback">
                                SKS Mata Kuliah perlu diisi
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- AKHIR MODAL A --}}

    {{-- MULAI MODAL B --}}
    <div class="modal fade modal-lg" id="modalPendidikan_B" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">B. Asistensi tugas atau praktikum terhadap setiap
                        kelompok</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.praktikum.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1" />
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kelas" class="form-label">Jumlah Kelas</label>
                            <input name="jumlah_kelas" type="number" class="form-control" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Kelas perlu diisi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sks_matakuliah" class="form-label">SKS Praktikum (1 SKS = 2 jam)</label>
                            <input name="sks_matakuliah" type="number" class="form-control" required min="0" step="any">
                            <div class="invalid-feedback">
                                SKS Praktikum perlu diisi
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    {{-- AKHIR MODAL B --}}

    {{-- MULAI MODAL C --}}
    <div class="modal fade modal-lg" id="modalPendidikan_C" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">C. Bimbingan kuliah kerja yang terprogram terhadap
                        setiap kelompok, Pembimbingan Praktek Klinik/Lapangan, dan DPL (Dosen Pembimbing lapangan)</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-pendidikan.bimbingan.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Bimbingan</label>
                            <input type="number" class="form-control" name="jumlah_mahasiswa" required min="1" step="any">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL C --}}

    {{-- MULAI MODAL D --}}
    <div class="modal fade modal-lg" id="modalPendidikan_D" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">D. Seminar yang terjadwal terhadap setiap kelompok</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-pendidikan.seminar.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kelompok" class="form-label">Jumlah Kelompok</label>
                            <input type="number" class="form-control" name="jumlah_kelompok" required min="1" step="any">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL D --}}

    {{-- MULAI MODAL E --}}
    <div class="modal fade modal-lg" id="modalPendidikan_E" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">E. Bimbingan dan tugas akhir/Skripsi/Karya Tulis
                        Ilmiah SO (Diploma) dan S1 Dosen Pembimbing utama dan pembimbing penyerta dinilai sama</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.tugasAkhir.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1" />
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Dibimbing</label>
                            <input name="jumlah_mahasiswa" class="form-control" type="number" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Mahasiswa Dibimbing perlu diisi
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    {{-- AKHIR MODAL E --}}

    {{-- MULAI MODAL F --}}
    <div class="modal fade modal-lg" id="modalPendidikan_F" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">F. Menguji proposal S1, S2, S3, Kualifikasi</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.proposal.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1" />
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa Dibimbing</label>
                            <input name="jumlah_mahasiswa" class="form-control" type="number" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Mahasiswa Dibimbing perlu diisi
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL F --}}


    {{-- MULAI MODAL G --}}
    <div class="modal fade modal-lg" id="modalPendidikan_G" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">G. Membimbing dosen yang lebih rendah Jenjang Jabatan
                        Akademiknya</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.rendah.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Dosen Bimbingan</label>
                            <input name="jumlah_dosen" class="form-control" type="text" required min="0" step="any">
                            <div class="invalid-feedback">
                                Jumlah Dosen Bimbingan perlu diisi
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL G -}}


{{-- MULAI MODAL H --}}
    <div class="modal fade modal-lg" id="modalPendidikan_H" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">H. Mengembangkan program perkuliahan/pengajaran
                        (Silabus, SAP/RPP, GBPP, dll) dalam kelompok atau mandiri yang hasilnya dipakai untuk kegiatan
                        perkuliahan</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.kembang.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required min="0" step="any">
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah SAP</label>
                            <input name="jumlah_sap" class="form-control" type="text" required>
                            <div class="invalid-feedback">
                                Jumlah SAP perlu diisi
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL H --}}


    {{-- MULAI MODAL I --}}
    <div class="modal fade modal-lg" id="modalPendidikan_I" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">I. Melaksanakan kegiatan detasering dan pencangkokan
                        dosen dalam 1 semester</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.cangkok.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                            <input type="hidden" name="id_dosen" value="1"/>
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Dosen (Maks. 2/smt)</label>
                                <select class="form-control" id="jumlah_dosen" name="jumlah_dosen">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR MODAL I --}}

    {{-- MULAI MODAL J --}}
    <div class="modal fade modal-lg" id="modalPendidikan_J" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">J. Koordinator Tugas Akhir/Skripsi, Proyek Akhir atau
                        KP</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.koordinator.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                            <input type="hidden" name="id_dosen" value="1"/>
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL J --}}

    {{-- MULAI MODAL K --}}
    <div class="modal fade modal-lg" id="modalPendidikan_K" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">K. Asistensi tugas atau praktikum terhadap setiap
                        kelompok.</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-pendidikan.asistensi.create') }}" method="POST" class="needs-validation was-validated">
                        @csrf
                            <input type="hidden" name="id_dosen" value="1"/>
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            <div class="invalid-feedback">
                                Nama kegiatan perlu di isi
                            </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Dosen</label>
                                <input class="form-control" type="number" name="jumlah_dosen" required min="0" step="any">
                                <div class="invalid-feedback">
                                Jumlah Dosen perlu diisi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Mahasiswa Bimbingan</label>
                                <input class="form-control" type="number" name="jumlah_mahasiswa" required min="0" step="any">
                                <div class="invalid-feedback">
                                Jumlah Mahasiswa Bimbingan perlu diisi
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL K --}}

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

    {{-- TOAS EDIT --}}
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

    {{-- ------------- Script bagian I -------------------- --}}
    <script>
        document.getElementById('formTambahKegiatan').addEventListener('submit', function(event) {
            event.preventDefault();
            addData();
        });

        document.getElementById('formEditKegiatan').addEventListener('submit', function(event) {
            event.preventDefault();
            editData();
        });
    </script>

@endsection
