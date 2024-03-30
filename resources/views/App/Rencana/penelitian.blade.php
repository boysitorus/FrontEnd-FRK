@extends('Template.rencana')

@section('content-penelitian')

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh
                    kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>

            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_A">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Posisi (Ketua/Anggota)</th>
                        <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($penelitian_kelompok) && sizeof($penelitian_kelompok) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_kelompok as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i
                                            class="bi bi-trash3"></i></button>

                                    {{-- MODAL DELETE A --}}
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
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
                                                        data-bs-dismiss="modal">
                                                        Batalkan
                                                    </button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                    </a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- AKHIR MODAL DELETE A --}}
                                </td>
                            </tr>

                            {{-- MODAL EDIT A --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.penelitian_kelompok.update') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                            name="nama_kegiatan" type="text" class="form-control"
                                                            id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status_tahapan" class="form-label">Tahap
                                                            Pencapaian</label>
                                                        {{-- <input name="status_tahapan" type="text" class="form-control" id="status_tahapan"> --}}
                                                        <select name="status_tahapan"
                                                            class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-md example">
                                                            <option selected>Pilih tahapan</option>
                                                            <option value="Proposal">Proposal</option>
                                                            <option value="Pengumpulan data /sebar kuesioner">Pengumpulan
                                                                data /sebar kuesioner</option>
                                                            <option value="Analisa Data">Analisa Data</option>
                                                            <option value="Laporan Akhir">Laporan Akhir</option>
                                                            <option value="Konsep (desain)">Konsep (desain)</option>
                                                            <option value="50% dari Karya">50% dari Karya</option>
                                                            <option value="Hasil akhir">Hasil akhir</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="posisi" class="form-label">Posisi</label>
                                                        {{-- -<input name="posisi" type="text" class="form-control"> --}}
                                                        <select name="posisi" class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-lg example">
                                                            <option selected>Pilih posisi</option>
                                                            <option value="Ketua">Ketua</option>
                                                            <option value="Anggota">Anggota</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_anggota" class="form-label">Jumlah
                                                            Anggota</label>
                                                        <input placeholder="{{ $item['jumlah_anggota'] }}"
                                                            name="jumlah_anggota" type="number" class="form-control">
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
                            </div>
                            {{-- AKHIR MODAL EDIT A --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan
                    tercatat)</b></h6>

            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_B">
                    Tambah Kegiatan
                </button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($penelitian_mandiri) && sizeof($penelitian_mandiri) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_mandiri as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-trash3"></i></button>

                                    {{-- MODAL DELETE B --}}
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
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
                                                        data-bs-dismiss="modal">
                                                        Batalkan
                                                    </button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.penelitian_mandiri.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                    </a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.penelitian_mandiri.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- AKHIR MODAL DELETE B --}}
                                </td>
                            </tr>

                            {{-- MODAL EDIT B --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.penelitian_mandiri.update') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                            name="nama_kegiatan" type="text" class="form-control"
                                                            id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status_tahapan" class="form-label">Tahap
                                                            Pencapaian</label>
                                                        {{-- <input name="status_tahapan" type="text" class="form-control" id="status_tahapan"> --}}
                                                        <select name="status_tahapan"
                                                            class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-md example">
                                                            <option selected>Pilih tahapan</option>
                                                            <option value="Proposal">Proposal</option>
                                                            <option value="Pengumpulan data /sebar kuesioner">Pengumpulan
                                                                data /sebar kuesioner</option>
                                                            <option value="Analisa Data">Analisa Data</option>
                                                            <option value="Laporan Akhir">Laporan Akhir</option>
                                                            <option value="Konsep (desain)">Konsep (desain)</option>
                                                            <option value="50% dari Karya">50% dari Karya</option>
                                                            <option value="Hasil akhir">Hasil akhir</option>
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
                            </div>
                            {{-- AKHIR MODAL EDIT A --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6>
                <b>C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester
                    (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</b>
            </h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_C">Tambah
                    Kegiatan</button>

            </div>
            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian_C"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional (berbahasa dan diedarkan secara internasional minimal
                    tiga negara), disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_D">Tambah
                    Kegiatan</button>

            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pekerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian_D"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Bagian E-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan dalam waktu sebanyak-banyaknya 4
                    semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks
                </b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianE" type="button" class="btn btn-success col-md-auto mt-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_E">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Posisi (Ketua/Editor/Anggota)</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($menyadur) && sizeof($menyadur) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($menyadur as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i
                                            class="bi bi-trash3"></i></button>

                                    <!-- modal delete E -->
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter++ }}" tabindex="-1"
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
                                                        data-bs-dismiss="modal">Batalkan
                                                    </button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.menyadur.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.menyadur.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL Edit E -->
                                    <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">E. Menterjemahkan atau
                                                        menyadur naskah buku teks yang
                                                        akan diterbitkan
                                                        dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan
                                                        dan tercatat), sama dengan 2 sks
                                                    </h6>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('rk-penelitian.menyadur.update') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_rencana"
                                                                value="{{ $item['id_rencana'] }}" />
                                                            <div class="mb-3">
                                                                <label for="nama_kegiatan" class="form-label">Nama
                                                                    Kegiatan</label>
                                                                <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                                    name="nama_kegiatan" type="text"
                                                                    class="form-control" id="nama_kegiatan">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status_tahapan" class="form-label">Tahap
                                                                    Pencapaian</label>
                                                                {{-- <input name="status_tahapan" type="text" class="form-control" id="status_tahapan"> --}}
                                                                <select name="status_tahapan"
                                                                    class="form-select form-select-md mb-3"
                                                                    aria-label=".form-select-md example">
                                                                    <option selected>Pilih tahapan</option>
                                                                    <option value="Pendahuluan">Pendahuluan</option>
                                                                    <option value="50% dari isi buku">50% dari isi buku
                                                                    </option>
                                                                    <option value="sks buku jadi">sks buku jadi</option>
                                                                    <option value="persetujuan penerbit">persetujuan
                                                                        penerbit</option>
                                                                    <option value="sks buku selesai dicetak">sks buku
                                                                        selesai dicetak</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="posisi" class="form-label">Posisi</label>
                                                                {{-- -<input name="posisi" type="text" class="form-control"> --}}
                                                                <select name="posisi"
                                                                    class="form-select form-select-md mb-3"
                                                                    aria-label=".form-select-lg example">
                                                                    <option selected>Pilih posisi</option>
                                                                    <option value="Ketua">Ketua</option>
                                                                    <option value="Editor">Editor</option>
                                                                    <option value="Anggota">Anggota</option>
                                                                </select>
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
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Akhir Bagian E-->

    <!--Bagian F-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester
                    (disetujui pimpinan dan tercatat)
                    sama dengan 2 sks
                </b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianF" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_F">
                    Tambah Kegiatan
                </button>

            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Posisi (Ketua/Editor/Anggota)</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($menyunting) && sizeof($menyunting) > 0)
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
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i
                                            class="bi bi-trash3"></i></button>

                                    <!-- modal delete F -->
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
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.menyunting.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.menyunting.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL EDIT F -->
                                    <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">F. Menyunting satu
                                                        judul naskah buku yang akan diterbitkan
                                                        dalam waktu sebanyak-banyaknya 4 semester(disetujui pimpinan dan
                                                        tercatat)sama dengan 2 sks
                                                    </h6>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="{{ route('rk-penelitian.menyunting.update') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="id_rencana"
                                                                value="{{ $item['id_rencana'] }}">
                                                            <label for="nama_kegiatan" class="form-label">Nama
                                                                Kegiatan</label>
                                                            <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                                name="nama_kegiatan" type="text" class="form-control"
                                                                id="nama_kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_tahapan" class="form-label">Tahap
                                                                Pencapaian</label>
                                                            {{-- <input name="status_tahapan" type="text" class="form-control" id="status_tahapan"> --}}
                                                            <select name="status_tahapan"
                                                                class="form-select form-select-md mb-3"
                                                                aria-label=".form-select-md example">
                                                                <option selected>Pilih tahapan</option>
                                                                <option value="Pendahuluan">Pendahuluan</option>
                                                                <option value="50% dari isi buku">50% dari isi buku
                                                                </option>
                                                                <option value="sks buku jadi">sks buku jadi</option>
                                                                <option value="persetujuan penerbit">persetujuan penerbit
                                                                </option>
                                                                <option value="sks buku selesai dicetak">sks buku selesai
                                                                    dicetak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="posisi" class="form-label">Posisi</label>
                                                            {{-- -<input name="posisi" type="text" class="form-control"> --}}
                                                            <select name="posisi" class="form-select form-select-md mb-3"
                                                                aria-label=".form-select-lg example">
                                                                <option selected>Pilih posisi</option>
                                                                <option value="Ketua">Ketua</option>
                                                                <option value="Anggota">Anggota</option>
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
                                    <!--Akhir Modal E-->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!--Akhir Bagian F-->

    <!--Awal Bagian G-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan bidang ilmu dan tidak
                    diterbitkan, tetapi digunakan oleh mahasiswa</b></h6>

            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto mt-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_G">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahap Pencapaian</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($penelitian_modul) && sizeof($penelitian_modul) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_modul as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['status_tahapan'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['peran'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-trash3"></i></button>

                                    {{-- MODAL DELETE G --}}
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
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
                                                        data-bs-dismiss="modal">
                                                        Batalkan
                                                    </button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.penelitian_modul.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                    </a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.penelitian_modul.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- AKHIR MODAL DELETE G --}}
                                </td>
                            </tr>

                            {{-- MODAL EDIT G --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.penelitian_modul.update') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                            name="nama_kegiatan" type="text" class="form-control"
                                                            id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status_tahapan" class="form-label">Tahap
                                                            Pencapaian</label>
                                                        <select name="status_tahapan"
                                                            class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-md example">
                                                            <option selected>Pilih tahapan</option>
                                                            <option value="Proposal">Proposal</option>
                                                            <option value="Pengumpulan data /sebar kuesioner">Pengumpulan
                                                                data /sebar kuesioner</option>
                                                            <option value="Analisa Data">Analisa Data</option>
                                                            <option value="Laporan Akhir">Laporan Akhir</option>
                                                            <option value="Konsep (desain)">Konsep (desain)</option>
                                                            <option value="50% dari Karya">50% dari Karya</option>
                                                            <option value="Hasil akhir">Hasil akhir</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_pengerjaan" class="form-label">Jenis
                                                            Pengerjaan</label>
                                                        <select name="jenis_pengerjaan"
                                                            class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-lg example">
                                                            <option selected>Pilih Jenis Pengerjaan</option>
                                                            <option value="Mandiri">Mandiri</option>
                                                            <option value="Kelompok">Kelompok</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="peran" class="form-label">Peran</label>
                                                        <select name="peran" class="form-select form-select-md mb-3"
                                                            aria-label=".form-select-lg example">
                                                            <option selected>Pilih Peran</option>
                                                            <option value="Penulis Utama">Penulis Utama</option>
                                                            <option value="Anggota">Anggota</option>
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
                            </div>
                            {{-- AKHIR MODAL EDIT G --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!--Akhir Bagian G-->

    <!--Awal Bagian H-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. PEKERTI/AA</b></h6>

            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianH" type="button" class="btn btn-success col-md-auto mt-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_H">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($penelitian_pekerti) && sizeof($penelitian_pekerti) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_pekerti as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-trash3"></i></button>

                                    {{-- MODAL DELETE H --}}
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
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
                                                        data-bs-dismiss="modal">
                                                        Batalkan
                                                    </button>
                                                    <a id="confirmDeleteBtn" class="btn btn-primary"
                                                        href="{{ route('rk-penelitian.penelitian_pekerti.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                    </a>
                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.penelitian_pekerti.destroy', ['id' => $item['id_rencana']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- AKHIR MODAL DELETE H --}}
                                </td>
                            </tr>

                            {{-- MODAL EDIT H --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.penelitian_pekerti.update') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}"
                                                            name="nama_kegiatan" type="text" class="form-control"
                                                            id="nama_kegiatan">
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
                            </div>
                            {{-- AKHIR MODAL EDIT H --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!--Akhir Bagian H-->

    <!--MULAI BAGIAN I-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h5><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</b></h5>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianI" type="button" class="btn btn-success col-md-auto mt-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_I">Tambah Kegiatan</button>
            </div>


            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Banyaknya BKD yang Dievaluasi</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($penelitian_tridharma) && sizeof($penelitian_tridharma) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penelitian_tridharma as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td>{{$item['nama_kegiatan']}}</td>
                                <td>{{$item['jumlah_bkd']}}</td>
                                <td>{{$item['sks_terhitung']}}</td>
                                <td></td>
                                <td></td>
                                <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian-{{$item ['id_rencana']}}"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteConfirm-{{$item ['id_rencana']}}"><i class="bi bi-trash3"></i></button>

                                {{-- MODAL DELETE I --}}
                                <div class="modal fade" id="modalDeleteConfirm-{{$item ['id_rencana']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-penelitian.penelitian_tridharma.destroy', ['id' => $item['id_rencana']]) }}" 
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                </a>
                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penelitian.penelitian_tridharma.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- AKHIR MODAL DELETE I --}}
                                </td>
                            </tr>

                            {{-- MODAL EDIT I --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.penelitian_tridharma.update') }}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_bkd" class="form-label">Banyaknya BKD yang dievaluasi</label>
                                                        <input placeholder="{{ $item['jumlah_bkd'] }}" name="jumlah_bkd" type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button>--}}
                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL EDIT I --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!--AKHIR BAGIAN I -->



    <!--MULAI BAGIAN J-->
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h5><b>J. Menulis Jurnal Ilmiah</b></h5>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenelitianJ" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                    data-bs-toggle="modal" data-bs-target="#modalPenelitian_J">Tambah
                    Kegiatan</button>

            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Peran</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($jurnal_ilmiah) && sizeof($jurnal_ilmiah) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($jurnal_ilmiah as $item)
                            <tr>
                                <td scope="row">{{ $counter }}</td>
                                <td>{{$item['nama_kegiatan']}}</td>
                                <td>{{$item['lingkup_penerbit']}}</td>
                                <td>{{$item['jenis_pengerjaan']}}</td>
                                <td>{{$item['peran']}}</td>
                                <td>{{$item['sks_terhitung']}}</td>
                                <td></td>
                                <td></td>
                                <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian-{{$item ['id_rencana']}}">
                                <i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i class="bi bi-trash3"></i></button>

                                {{-- MODAL DELETE J --}}
                                <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <h1><i class="bi bi-x-circle text-danger"></i></h1>
                                                <h5>Yakin untuk menghapus kegiatan ini?</h5>
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-penelitian.jurnal_ilmiah.destroy', ['id' => $item['id_rencana']]) }}" 
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                </a>
                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penelitian.jurnal_ilmiah.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- AKHIR MODAL DELETE J --}}

                                </td>
                            </tr>
                            
                            {{-- MODAL EDIT J --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('rk-penelitian.jurnal_ilmiah.update') }}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lingkup_penerbit" class="form-label">Kategori</label>
                                                        <select name="lingkup_penerbit"class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Kategori</option>
                                                            <option value="1">Diterbitkan oleh Jurnal ilmiah/majalah ilmiah ber-ISSN tidak terakreditasi 
                                                                atau proceedings seminar nasional maupun internasional</option>
                                                            <option value="2">Diterbitkan oleh Jurnal terakreditasi</option>
                                                            <option value="3">Diterbitkan oleh Jurnal terakreditasi internasional (dalam bahasa intenasional)</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan</label>
                                                        <select name="jenis_pengerjaan" class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Jenis Pengerjaan</option>
                                                            <option value="1">Mandiri</option>
                                                            <option value="2">Kelompok</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="peran" class="form-label">Jenis Peran</label>
                                                        <select name ="peran" class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Peran</option>
                                                            <option value="Penulis Utama">Penulis Utama</option>
                                                            <option value="Penulis Lainnya">Penulis Lainnya</option>
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
                            </div>
                            {{-- AKHIR MODAL EDIT J --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>


    {{-- AWAL HAK PATEN BAGIAN K --}}

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h5><b>K. Memperoleh hak paten</b>
            </h5>
            <hr />

            <div class="row justify-content-end mr-0">
                <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_K" id=" btnFrkPenelitianM"
                    type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah
                    Kegiatan</button>

            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle" style="width:200px;">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($hak_paten) && sizeof($hak_paten) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($hak_paten as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td> {{ $item['nama_kegiatan'] }} </td>
                                <td> {{ $item['lingkup_wilayah'] }} </td>
                                <td> {{ $item['sks_terhitung'] }} </td>
                                <td> </td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}">
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
                                                    <a id="confirmDeleteBtn" class="btn btn-danger"
                                                        href="{{ route('rk-penelitian.hak_paten.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.hak_paten.destroy', ['id' => $item['id_rencana']]) }}"
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
                            {{-- MULAI MODAL K --}}
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">K. Memperoleh hak paten</h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class=" modal-body">
                                            <form action="{{ route('rk-penelitian.hak_paten.update') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <div class="mb-3">
                                                    <label for="nama_kegiatan" for="nama" class="form-label">Nama
                                                        Kegiatan</label>
                                                    <input name="nama_kegiatan" type="text" class="form-control"
                                                        id="nama">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lingkup_wilayah" class="form-label">Kategori</label>
                                                    <select name="lingkup_wilayah" class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="Paten Sederhana" selected>Paten Sederhana</option>
                                                        <option value="Paten Biasa">Paten Biasa</option>
                                                        <option value="Paten internasional(minimal tiga negara)">Paten
                                                            internasional(minimal tiga negara)</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
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

    {{-- AKHIR MODAL K --}}

    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h5><b>L. Menulis di media massa</b>
            </h5>
            <hr />

            <div class="row justify-content-end mr-0">
                <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_L" id=" btnFrkPenelitianM"
                    type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah
                    Kegiatan</button>

            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle" style="width:200px;">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($media_massa) && sizeof($media_massa) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($media_massa as $item)
                            <tr>
                                <td scope="row">{{ $counter++ }}</td>
                                <td> {{ $item['nama_kegiatan'] }} </td>
                                <td> {{ $item['sks_terhitung'] }} </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}">
                                        <i class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $counter }}">
                                        <i class="bi bi-trash3"></i></button>

                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}"
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
                                                    <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                        anda sudah menekan tombol 'Yakin'
                                                    </p>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                    <a id="confirmDeleteBtn" class="btn btn-danger"
                                                        href="{{ route('rk-penelitian.media_massa.destroy', ['id' => $item['id_rencana']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                    <form id="delete-form-{{ $item['id_rencana'] }}"
                                                        action="{{ route('rk-penelitian.media_massa.destroy', ['id' => $item['id_rencana']]) }}"
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
                            <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">L. Menulis di media massa
                                            </h6>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class=" modal-body">
                                            <form action="{{ route('rk-penelitian.media_massa.update') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <div class="mb-3">
                                                    <label for="nama_kegiatan" for="nama" class="form-label">Nama
                                                        Kegiatan</label>
                                                    <input name="nama_kegiatan" type="text" class="form-control"
                                                        id="nama">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- awal mula masalah --}}
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>


    {{-- AWAL BAGIAN M --}}
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>M. Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya</b>
            </h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_M" id=" btnFrkPenelitianM"
                    type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tingkatan</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle" style="width: 250px">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($pembicara_seminar) && sizeof($pembicara_seminar) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($pembicara_seminar as $item)
                            <tr>
                                <td scope=" row">{{ $loop->iteration }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_wilayah'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-trash3"></i></button>
                                </td>
                                {{-- MODAL DELETE M --}}
                                <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
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
                                                    data-bs-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                </a>
                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL DELETE M --}}

                                {{-- MODAL EDIT M --}}
                                <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">M. Menyampaikan orasi
                                                    ilmiah,
                                                    pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('rk-penelitian.pembicara_seminar.update') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_rencana"
                                                            value="{{ $item['id_rencana'] }}" />
                                                        <div class="mb-3">
                                                            <label for="nama_kegiatan" class="form-label">Nama
                                                                Kegiatan</label>
                                                            <input value="{{ $item['nama_kegiatan'] }}"
                                                                name="nama_kegiatan" type="text"
                                                                class="form-control" id="nama_kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tingkatan" class="form-label">Tingkatan</label>
                                                            {{-- <input name="tingkatan" type="text" class="form-control"
                                                    id="tingkatan"> --}}
                                                            <select name="tingkatan"
                                                                class="form-select form-select-md mb-3"
                                                                aria-label=".form-select-md example">
                                                                <option selected>Pilih Tingkatan</option>
                                                                <option
                                                                    value="Tingkat Regional/minimal
                                                    fakultas">
                                                                    Tingkat Regional/minimal
                                                                    fakultas
                                                                </option>
                                                                <option value="Tingkat Nasional">Tingkat Nasional</option>
                                                                <option
                                                                    value="Tingkat Internasional (dengan bahasa internasional)">
                                                                    Tingkat Internasional (dengan bahasa internasional)
                                                                </option>
                                                            </select>
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
                                </div>
                                {{-- AKHIR MODAL EDIT M --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- AKHIR BAGIAN M --}}

    {{-- AWAL BAGIAN N --}}
    <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>N. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_N" id=" btnFrkPenelitianM"
                    type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>
            </div>

            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">No.</th>
                        <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Tingkatan</th>
                        <th scope="col" rowspan="2" class="align-middle">Jenis Pengerjaan</th>
                        <th scope="col" rowspan="2" class="align-middle">Posisi</th>
                        <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota</th>
                        <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                        <th scope="col" colspan="2">Status</th>
                        <th scope="col" rowspan="2" class="align-middle" style="width: 200px">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col">Asesor 1</th>
                        <th scope="col">Asesor 2</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (isset($penyajian_makalah) && sizeof($penyajian_makalah) > 0)
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($penyajian_makalah as $item)
                            <tr>
                                <td scope=" row">{{ $loop->iteration }}</td>
                                <td>{{ $item['nama_kegiatan'] }}</td>
                                <td>{{ $item['lingkup_wilayah'] }}</td>
                                <td>{{ $item['jenis_pengerjaan'] }}</td>
                                <td>{{ $item['posisi'] }}</td>
                                <td>{{ $item['jumlah_anggota'] }}</td>
                                <td>{{ $item['sks_terhitung'] }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                            class="bi bi-trash3"></i></button>
                                </td>

                                {{-- MODAL DELETE N --}}
                                <div class="modal fade" id="modalDeleteConfirm-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
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
                                                    data-bs-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penelitian.penyajian_makalah.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                                </a>
                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penelitian.penyajian_makalah.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL DELETE N --}}

                                {{-- MODAL EDIT N --}}
                                <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">N. Penyaji makalah dalam
                                                    seminar atau
                                                    pertemuan ilmiah terkait dengan bidang ilmu
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('rk-penelitian.penyajian_makalah.update') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_rencana"
                                                            value="{{ $item['id_rencana'] }}">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama
                                                                Kegiatan</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama_kegiatan"
                                                                value="{{ $item['nama_kegiatan'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tingkatan" class="form-label">Tingkatan:</label>
                                                            <select name="tingkatan" class="form-control"
                                                                id="tingkatan">
                                                                <option value="">Pilih Tingkatan</option>
                                                                <option
                                                                    value="Tingkat regional daerah, institusional(minimum fakultas)"
                                                                    {{ $item['lingkup_wilayah'] == 'Tingkat regional daerah, institusional(minimum fakultas)' ? 'selected' : '' }}>
                                                                    Tingkat regional daerah,
                                                                    institusional(minimum fakultas)</option>
                                                                <option value="Tingkat Nasional"
                                                                    {{ $item['lingkup_wilayah'] == 'Tingkat Nasional' ? 'selected' : '' }}>
                                                                    Tingkat Nasional</option>
                                                                <option
                                                                    value="Tingkat Internasional(dengan bahasa internasional)"
                                                                    {{ $item['lingkup_wilayah'] == 'Tingkat Internasional(dengan bahasa internasional)' ? 'selected' : '' }}>
                                                                    Tingkat Internasional(dengan bahasa
                                                                    internasional)</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="posisi" class="form-label">Posisi</label>
                                                            <select name="posisi"
                                                                class="form-select form-select-md mb-3"
                                                                aria-label=".form-select-md example">
                                                                <option value="">Pilih Posisi</option>
                                                                <option value="Ketua"
                                                                    {{ $item['posisi'] == 'Ketua' ? 'selected' : '' }}>Ketua
                                                                </option>
                                                                <option value="Anggota"
                                                                    {{ $item['posisi'] == 'Anggota' ? 'selected' : '' }}>
                                                                    Anggota</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jumlah_anggota" class="form-label">Jumlah
                                                                Anggota</label>
                                                            <input name="jumlah_anggota" type="number"
                                                                class="form-control" id="jumlah_anggota"
                                                                value="{{ $item['jumlah_anggota'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jenis_pengerjaan" class="form-label">Jenis
                                                                Pengerjaan</label>
                                                            <select name="jenis_pengerjaan"
                                                                class="form-select form-select-md mb-3"
                                                                aria-label=".form-select-md example">
                                                                <option value="Individual"
                                                                    {{ $item['jenis_pengerjaan'] == 'Individual' ? 'selected' : '' }}>
                                                                    Individual</option>
                                                                <option value="Kelompok"
                                                                    {{ $item['jenis_pengerjaan'] == 'Kelompok' ? 'selected' : '' }}>
                                                                    Kelompok</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL EDIT N --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    {{-- TEMPAT MODAL TAMBAH KEGIATAN --}}

    {{-- MULAI MODAL A --}}
    <div class="modal fade modal-lg" id="modalPenelitian_A" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">A. Keterlibatan dalam 1 judul penelitian atau
                        pembuatan
                        karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-penelitian.penelitian_kelompok.create') }}" method = "POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                            <select name="status_tahapan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option selected>Pilih tahapan</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Pengumpulan data /sebar kuesioner">Pengumpulan data /sebar kuesioner
                                </option>
                                <option value="Analisa Data">Analisa Data</option>
                                <option value="Laporan Akhir">Laporan Akhir</option>
                                <option value="Konsep (desain)">Konsep (desain)</option>
                                <option value="50% dari Karya">50% dari Karya:</option>
                                <option value="Hasil akhir">Hasil akhir</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <select name="posisi" class="form-select form-select-md mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>Pilih posisi</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                            <input name="jumlah_anggota" type="number" class="form-control">
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
    <div class="modal fade modal-lg" id="modalPenelitian_B" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">B. Pelaksanaan penelitian mandiri atau pembuatan
                        karya seni atau teknologi (disetujui oleh pimpinan dan
                        tercatat)</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-penelitian.penelitian_mandiri.create') }}" method = "POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                            <select name="status_tahapan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option selected>Pilih tahapan</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Pengumpulan data /sebar kuesioner">Pengumpulan data /sebar kuesioner
                                </option>
                                <option value="Analisa Data">Analisa Data</option>
                                <option value="Laporan Akhir">Laporan Akhir</option>
                                <option value="Konsep (desain)">Konsep (desain)</option>
                                <option value="50% dari Karya">50% dari Karya:</option>
                                <option value="Hasil akhir">Hasil akhir</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL B --}}

    {{-- MULAI MODAL C --}}
    <div class="modal fade modal-lg" id="modalPenelitian_C" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan
                        dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.
                    </h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahap Pencapaian</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Pengerjaan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Peran</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL C --}}


    {{-- MULAI MODAL D --}}
    <div class="modal fade modal-lg" id="modalPenelitian_D" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan
                        dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.
                    </h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahap Pencapaian</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Pengerjaan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Peran</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL D --}}

    <!--Modal E-->
    <div class="modal fade modal-lg" id="modalPenelitian_E" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">E. Menterjemahkan atau menyadur naskah buku teks yang
                        akan
                        diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama
                        dengan 2 sks</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ route('rk-penelitian.menyadur.create') }}" method= "POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id_dosen" value="1">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                            <select name="status_tahapan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option selected>Pilih tahapan</option>
                                <option value="Pendahuluan">Pendahuluan</option>
                                <option value="50% dari isi buku">50% dari isi buku</option>
                                <option value="sks buku jadi">sks buku jadi</option>
                                <option value="persetujuan penerbit">persetujuan penerbit</option>
                                <option value="sks buku selesai dicetak">sks buku selesai dicetak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                            <select name="posisi" class="form-select form-select-md mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>Pilih posisi</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Editor">Editor</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL E -->

    <!--Modal F-->
    <div class="modal fade modal-lg" id="modalPenelitian_F" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">F. Menyunting satu judul naskah buku yang akan
                        diterbitkan dalam waktu
                        sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat), sama dengan 2 sks </h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rk-penelitian.menyunting.create') }}" method= "POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id_dosen" value="1">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                            <select name="status_tahapan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option selected>Pilih tahapan</option>
                                <option value="Pendahuluan">Pendahuluan</option>
                                <option value="50% dari isi buku">50% dari isi buku</option>
                                <option value="sks buku jadi">sks buku jadi</option>
                                <option value="persetujuan penerbit">persetujuan penerbit</option>
                                <option value="sks buku selesai dicetak">sks buku selesai dicetak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <select name="posisi" class="form-select form-select-md mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>Pilih posisi</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL F -->

    {{-- MULAI MODAL G --}}
    <div class="modal fade modal-lg" id="modalPenelitian_G" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen
                        yang sesuai dengan bidang ilmu dan tidak
                        diterbitkan, tetapi digunakan oleh mahasiswa</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-penelitian.penelitian_modul.create') }}" method = "POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                            <select name="status_tahapan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option selected>Pilih tahapan</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Pengumpulan data /sebar kuesioner">Pengumpulan data /sebar kuesioner
                                </option>
                                <option value="Analisa Data">Analisa Data</option>
                                <option value="Laporan Akhir">Laporan Akhir</option>
                                <option value="Konsep (desain)">Konsep (desain)</option>
                                <option value="50% dari Karya">50% dari Karya:</option>
                                <option value="Hasil akhir">Hasil akhir</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan</label>
                            <select name="jenis_pengerjaan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>Pilih Jenis Pengerjaan</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Kelompok">Kelompok</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="peran" class="form-label">Peran</label>
                            <select name="peran" class="form-select form-select-md mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>Pilih Peran</option>
                                <option value="Penulis Utama">Penulis Utama</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL G --}}

    {{-- MULAI MODAL H --}}
    <div class="modal fade modal-lg" id="modalPenelitian_H" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">H. PEKERTI/AA</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-penelitian.penelitian_pekerti.create') }}" method = "POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL H --}}

    <!-- MULAI MODAL I -->
    <div class="modal fade modal-lg" id="modalPenelitian_I" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">I. Sebagai asesor Beban Kerja Dosen dan Evaluasi
                        Pelaksanaan Tridharma Perguruan Tinggi</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('rk-penelitian.penelitian_tridharma.create') }}" method = "POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input name ="nama_kegiatan"type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for = "jumlah_bkd" class="form-label">Banyaknya BKD yang Dievaluasi</label>
                            <input name="jumlah_bkd" type="number" class="form-control" id="jumlah_bkd">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL I -->

    <!-- MULAI MODAL J -->
    <div class="modal fade modal-lg" id="modalPenelitian_J" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">J. Menulis Jurnal Ilmiah</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-penelitian.jurnal_ilmiah.create') }}" method = "POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="lingkup_penerbit" class="form-label">Kategori</label>
                            <select name="lingkup_penerbit"class="form-select" aria-label="Default select example">
                                <option selected>Pilih Kategori</option>
                                <option value="Diterbitkan oleh Jurnal ilmiah/majalah ilmiah ber-ISSN tidak terakreditasi 
                                    atau proceedings seminar nasional maupun internasional">Diterbitkan oleh Jurnal ilmiah/majalah ilmiah ber-ISSN tidak terakreditasi 
                                    atau proceedings seminar nasional maupun internasional</option>
                                <option value="Diterbitkan oleh Jurnal terakreditasi">Diterbitkan oleh Jurnal terakreditasi</option>
                                <option value="Diterbitkan oleh Jurnal terakreditasi internasional (dalam bahasa intenasional)">Diterbitkan oleh Jurnal terakreditasi internasional (dalam bahasa intenasional)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan</label>
                            <select name="jenis_pengerjaan" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Jenis Pengerjaan</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Kelompok">Kelompok</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="peran" class="form-label">Jenis Peran</label>
                            <select name ="peran" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Peran</option>
                                <option value="Penulis Utama">Penulis Utama</option>
                                <option value="Penulis Lainnya">Penulis Lainnya</option>
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
    <!-- AKHIR MODAL J -->

    {{-- MULAI MODAL K --}}
    <div class="modal fade modal-lg" id="modalPenelitian_K" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"
            style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
            <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">K. Memperoleh hak paten</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-penelitian.hak_paten.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" for="nama" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama">

                            <label for="lingkup_wilayah" class="form-label">Kategori</label>
                            <select name="lingkup_wilayah" class="form-select" aria-label="Default select example">
                                <option value="Paten Sederhana" selected>Paten Sederhana</option>
                                <option value="Paten Biasa">Paten Biasa</option>
                                <option value="Paten internasional(minimal tiga negara)">Paten internasional(minimal tiga
                                    negara)</option>
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


    {{-- AKHIR MODAL K --}}

    {{-- MULAI MODAL L --}}
    <div class="modal fade modal-lg" id="modalPenelitian_L" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"
            style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
            <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">L. Menulis di media massa</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('rk-penelitian.media_massa.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" for="nama" class="form-label">Nama Kegiatan</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- AKHIR MODAL L --}}


    {{-- MULAI MODAL M - TAMBAH KEGIATAN --}}
    <div class="modal fade modal-lg" id="modalPenelitian_M" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"
            style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
            <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">M. Menyampaikan orasi ilmiah, pembicara dalam
                        seminar,
                        nara sumber terkait dengan bidang keilmuannya</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="{{ route('rk-penelitian.pembicara_seminar.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id_dosen" value="1">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="tingkatan">Tingkatan:</label>
                            <select name="tingkatan" class="form-control" id="tingkatan">
                                <option value=""></option>
                                <option value="Tingkat Regional/minimal fakultas">Tingkat Regional/minimal fakultas
                                </option>
                                <option value="Tingkat Nasional">
                                    Tingkat Nasional
                                </option>
                                <option value="Tingkat Internasional(dengan bahasa internasional)">Tingkat Internasional
                                    (dengan bahasa internasional)</option>
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
    {{-- AKHIR MODAL M --}}

    {{-- MULAI MODAL N - TAMBAH KEGIATAN --}}
    <div class="modal fade" id="modalPenelitian_N" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">N. Penyaji makalah dalam seminar atau pertemuan
                        ilmiah
                        terkait dengan bidang ilmu</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rk-penelitian.penyjajian_makalah.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama" name="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="tingkatan" class="form-label">Tingkatan:</label>
                            <select name="tingkatan" class="form-control" id="tingkatan">
                                <option value=""></option>
                                <option value="Tingkat regional daerah, institusional(minimum fakultas)">Tingkat regional
                                    daerah, institusional(minimum fakultas)</option>
                                <option value="Tingkat Nasional">Tingkat Nasional</option>
                                <option value="Tingkat Internasional(dengan bahasa internasional)">Tingkat
                                    Internasional(dengan bahasa internasional)
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <select name="posisi" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option value=""></option>
                                <option value="Ketua">Ketua</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                            <input name="jumlah_anggota" type="number" class="form-control" id="jumlah_anggota">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan</label>
                            <select name="jenis_pengerjaan" class="form-select form-select-md mb-3"
                                aria-label=".form-select-md example">
                                <option value=""></option>
                                <option value="Individual">Individual</option>
                                <option value="Kelompok">Kelompok</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL N --}}


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


@endsection
