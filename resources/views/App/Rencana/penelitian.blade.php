@extends('Template.rencana')

@section('content-penelitian')

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh
                kelompok (disetujui oleh pimpinan dan tercapai)</b></h5>

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
                            <td>{{$item['nama_kegiatan']}}</td>
                            <td>{{$item['status_tahapan']}}</td>
                            <td>{{$item['posisi']}}</td>
                            <td>{{$item['jumlah_anggota']}}</td>
                            <td>{{$item['sks_terhitung']}}</td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian-{{ $item['id_rencana'] }}"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm-{{ $counter }}"><i class="bi bi-trash3"></i></button>
                            
                            {{-- MODAL DELETE A --}}
                            <div class="modal fade" id="modalDeleteConfirm-{{ $counter }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a id="confirmDeleteBtn" class="btn btn-primary" href="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}" 
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin
                                            </a>
                                            <form id="delete-form-{{ $item['id_rencana'] }}"
                                                action="{{ route('rk-penelitian.penelitian_kelompok.destroy', ['id' => $item['id_rencana']]) }}"
                                                method="POST" >
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
                        <div class="modal fade modal-lg" id="modalEditPenelitian-{{ $item['id_rencana'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}. {{ $item['nama_kegiatan'] }}
                                        </h6>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('rk-penelitian.penelitian_kelompok.update') }}" method="POST">
                                        @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />
                                                <div class="mb-3">
                                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                    <input placeholder="{{ $item['nama_kegiatan'] }}" name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                                                    {{--<input name="status_tahapan" type="text" class="form-control" id="status_tahapan">--}}
                                                    <select name="status_tahapan" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                                                        <option selected>Pilih tahapan</option>
                                                        <option value="Proposal">Proposal</option>
                                                        <option value="Pengumpulan data /sebar kuesioner">Pengumpulan data /sebar kuesioner</option>
                                                        <option value="Analisa Data">Analisa Data</option>
                                                        <option value="Laporan Akhir">Laporan Akhir</option>
                                                        <option value="Konsep (desain)">Konsep (desain)</option>
                                                        <option value="50% dari Karya">50% dari Karya</option>
                                                        <option value="Hasil akhir">Hasil akhir</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posisi" class="form-label">Posisi</label>
                                                    {{---<input name="posisi" type="text" class="form-control">--}}
                                                    <select name="posisi" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                                                        <option selected>Pilih posisi</option>
                                                        <option value="Ketua">Ketua</option>
                                                        <option value="Anggota">Anggota</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                                                    <input placeholder="{{ $item['jumlah_anggota'] }}" name="jumlah_anggota" type="number" class="form-control">
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
                        {{-- AKHIR MODAL EDIT A --}}
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan
                tercatat)</b></h5>

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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
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
        <h5>
            <b>C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester
                (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</b>
            </h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalPenelitian_C">Tambah
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
        <h5><b>D. Menulis satu judul naskah buku internasional (berbahasa dan diedarkan secara internasional minimal
                tiga negara), disetujui oleh pimpinan dan tercatat</b></h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalPenelitian_D">Tambah
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
        <h5><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan dalam waktu sebanyak-banyaknya 4
                semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks
            </b></h5>
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
                            <td scope="row">{{ $counter++ }}</td>
                            <td>{{$item['nama_kegiatan']}}</td>
                            <td>{{$item['status_tahapan']}}</td>
                            <td>{{$item['posisi']}}</td>
                            <td>{{$item['sks_terhitung']}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian-{{$item['id_rencana']}}"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm-{{$counter++}}"><i class="bi bi-trash3"></i></button>

                                <!-- modal delete E -->
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter++}}" tabindex="-1"
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
                                                            href="{{ route('rk-penelitian.menyadur.destroy', ['id' => $item['id_rencana']]) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>
                                                            <form id="delete-form-{{ $item['id_rencana'] }}" action="{{ route('rk-penelitian.menyadur.destroy', ['id' => $item['id_rencana']]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                <!-- MODAL E -->
                                <div class="modal fade modal-lg" id="modalEditPenelitian-{{$item['id_rencana']}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">E. Menterjemahkan atau menyadur naskah buku teks yang
                                                    akan diterbitkan
                                                    dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('rk-penelitian.menyadur.update')}}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_rencana" value="{{$item ['id_rencana']}}">
                                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                    <input placeholder="{{$item ['nama_kegiatan']}}" name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                                                    <input placeholder="{{$item['status_tahapan']}}" name="status_tahapan" id="status_tahapan" type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posisi" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                                                    <input placeholder="{{$item['posisi']}}" name="posisi" type="text" class="form-control" name="posisi">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
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
<!-- Akhir Bagian E-->

<!--Bagian F-->
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester
                (disetujui pimpinan dan tercatat)
                sama dengan 2 sks
            </b></h5>
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
                            <td>{{$item['nama_kegiatan']}}</td>
                            <td>{{$item['status_tahapan']}}</td>
                            <td>{{$item['posisi']}}</td>
                            <td>{{$item['sks_terhitung']}}</td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                data-bs-target="#modalEditPenelitian-{{$item['id_rencana']}}"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm-{{$counter}}"><i class="bi bi-trash3"></i></button>

                                <!-- modal delete E -->
                                    <div class="modal fade" id="modalDeleteConfirm-{{ $counter}}" tabindex="-1"
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
                                                            <form id="delete-form-{{ $item['id_rencana'] }}" action="{{ route('rk-penelitian.menyunting.destroy', ['id' => $item['id_rencana']]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                <!-- MODAL E -->
                                <div class="modal fade modal-lg" id="modalEditPenelitian-{{$item['id_rencana']}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">E. Menterjemahkan atau menyadur naskah buku teks yang
                                                    akan diterbitkan
                                                    dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks
                                                </h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('rk-penelitian.menyunting.update')}}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="id_rencana" value="{{$item ['id_rencana']}}">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input placeholder="{{$item ['nama_kegiatan']}}" name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                                                        <input placeholder="{{$item['status_tahapan']}}" name="status_tahapan" id="status_tahapan" type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="posisi" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                                                        <input placeholder="{{$item['posisi']}}" name="posisi" type="text" class="form-control" name="posisi">
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

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan bidang ilmu dan tidak
                diterbitkan, tetapi digunakan oleh mahasiswa</b></h5>
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
                    <th scope="col" rowspan="2" class="align-middle">Jumlah Anggota Tim</th>
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
                            data-bs-target="#modalEditPenelitian_G"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
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
        <h5><b>H. PEKERTI/AA</b></h5>
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
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_H"><i class="bi bi-pencil-square"></i></button>
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
                    <th scope="col" rowspan="2" class="align-middle">Banyaknya BKD yang Terhitung</th>
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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_I"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_I"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_I"><i class="bi bi-pencil-square"></i></button>
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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_J"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_I"><i class="bi bi-pencil-square"></i></button>
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
        <h5><b>K. Memperoleh hak paten</b>
        </h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_K" id=" btnFrkPenelitianM" type="button"
                class="btn btn-success col-md-auto mt-2 mb-2">Tambah
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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_K"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_K"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_K"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>L. Menulis di media massa</b>
        </h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_L" id=" btnFrkPenelitianM" type="button"
                class="btn btn-success col-md-auto mt-2 mb-2">Tambah
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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_L"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_L"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_L"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>M. Menyampaikan orasi ilmiah, pembicara dalam seminar, nara sumber terkait dengan bidang keilmuannya</b>
        </h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_M" id=" btnFrkPenelitianM" type="button"
                class="btn btn-success col-md-auto mt-2 mb-2">Tambah
                Kegiatan</button>

        </div>

        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Tingkatan</th>
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
                <tr>
                    <td scope="row">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_M"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_M"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_M"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h5><b>N. Penyaji makalah dalam seminar atau pertemuan ilmiah terkait dengan bidang ilmu</b></h5>
        <hr />

        <div class="row justify-content-end mr-0">
            <button data-bs-toggle="modal" data-bs-target="#modalPenelitian_N" id="btnFrkPenelitianN" type="button"
                class="btn btn-success col-md-auto mt-2 mb-2">Tambah
                Kegiatan</button>

        </div>

        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Tingkatan</th>
                    <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                    <th scope="col" colspan="2">Status</th>
                    <th scope="col" rowspan="2" class="align-middle" style="width: 200px;">Aksi</th>
                </tr>
                <tr>
                    <th scope=" col">Asesor 1</th>
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
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_N"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPenelitian_N"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg></i></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>





{{-- TEMPAT MODAL TAMBAH KEGIATAN--}}

{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalPenelitian_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Keterlibatan dalam 1 judul penelitian atau pembuatan
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
                        <select name="status_tahapan" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option selected>Pilih tahapan</option>
                            <option value="Proposal">Proposal</option>
                            <option value="Pengumpulan data /sebar kuesioner">Pengumpulan data /sebar kuesioner</option>
                            <option value="Analisa Data">Analisa Data</option>
                            <option value="Laporan Akhir">Laporan Akhir</option>
                            <option value="Konsep (desain)">Konsep (desain)</option>
                            <option value="50% dari Karya">50% dari Karya:</option>
                            <option value="Hasil akhir">Hasil akhir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <select name="posisi" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
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
<div class="modal fade modal-lg" id="modalPenelitian_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Pelaksanaan penelitian mandiri atau pembuatan karya
                    seni atau teknologi (disetujui oleh pimpinan dan tercatat)</h6>
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
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL B --}}

{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalPenelitian_C" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</h6>
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
<div class="modal fade modal-lg" id="modalPenelitian_D" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</h6>
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
<div class="modal fade modal-lg" id="modalPenelitian_E" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">E. Menterjemahkan atau menyadur naskah buku teks yang
                    akan
                    diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama
                    dengan 2 sks</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <form action="{{route('rk-penelitian.menyadur.create')}}" method= "POST">
            @csrf
                <div class="modal-body">    
                    <div class="mb-3">
                        <input type="hidden" name="id_dosen" value="1">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                        <input name="status_tahapan" id="status_tahapan" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                        <input name="posisi" type="text" class="form-control" name="posisi">
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
<div class="modal fade modal-lg" id="modalPenelitian_F" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">F. Menyunting satu judul naskah buku yang akan
                    diterbitkan dalam waktu
                    sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat), sama dengan 2 sks </h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('rk-penelitian.menyunting.create')}}" method= "POST">
            @csrf
                <div class="modal-body">    
                    <div class="mb-3">
                        <input type="hidden" name="id_dosen" value="1">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="status_tahapan" class="form-label">Tahap Pencapaian</label>
                        <input name="status_tahapan" id="status_tahapan" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                        <input name="posisi" type="text" class="form-control" name="posisi">
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
<div class="modal fade modal-lg" id="modalPenelitian_G" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen
                    yang sesuai dengan bidang ilmu dan tidak diterbitkan, tetapi digunakan oleh mahasiswa</h6>
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
                        <label for="email" class="form-label">Jenis Pengerjaan</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Anggota</label>
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
{{-- AKHIR MODAL G --}}

{{-- MULAI MODAL H --}}
<div class="modal fade modal-lg" id="modalPenelitian_H" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">H. PEKERTI/AA</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL H --}}

<!-- Mulai modal I -->
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
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banyaknya BKD yang Terhitung</label>
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
<!-- Akhir modal I -->

<!-- Awal modal J -->
<div class="modal fade modal-lg" id="modalPenelitian_J" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">J. Menulis Jurnal Ilmiah</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownKategori">Kategori</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKategori"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownKategori">
                                <li><a class="dropdown-item" href="#">Diterbitkan oleh Jurnal ilmiah/majalah ilmiah
                                        ber-ISSN
                                        tidak terakreditasi atau proceedings seminar nasional maupun internasional</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Diterbitkan oleh Jurnal terakreditasi</a></li>
                                <li><a class="dropdown-item" href="#">Diterbitkan oleh Jurnal terakreditasi
                                        internasional (dalam bahasa intenasional)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jenis Pengerjaan</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jenis Peran</label>
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
<!-- Akhir modal J -->

{{-- MULAI MODAL K --}}
<div class="modal fade modal-lg" id="modalPenelitian_K" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"
        style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
        <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">K. Memperoleh hak paten</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownKategori">Kategori:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKategori"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownKategori">
                                <li><a class="dropdown-item" href="#">Paten Sederhana</a></li>
                                <li><a class="dropdown-item" href="#">Paten Biasa</a></li>
                                <li><a class="dropdown-item" href="#">Paten Internasional (minimal tiga negara)</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL K --}}

{{-- MULAI MODAL L --}}
<div class="modal fade modal-lg" id="modalPenelitian_L" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"
        style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
        <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">L. Menulis di media massa</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- AKHIR MODAL L --}}


{{-- MULAI MODAL M --}}
<div class="modal fade modal-lg" id="modalPenelitian_M" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"
        style="min-height: 500px; max-height: 100vh; display: flex; align-items: center;">
        <div class="modal-content" style="max-height: 100vh; overflow-y: auto;">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">M. Menyampaikan orasi ilmiah, pembicara dalam seminar,
                    nara sumber terkait dengan bidang keilmuannya</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownTingkatan">Tingkatan:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTingkatan"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownTingkatan">
                                <li><a class="dropdown-item" href="#">Tingkat Regional/minimal fakultas</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat nasional</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat Internasional</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL M --}}


{{-- MULAI MODAL N --}}
<div class="modal fade modal-lg" id="modalPenelitian_N" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">N. Penyaji makalah dalam seminar atau pertemuan
                    ilmiah terkait dengan bidang ilmu
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
                        <label for="dropdownTingkatan">Tingkatan:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTingkatan"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownTingkatan">
                                <li><a class="dropdown-item" href="#">Tingkat Regional/minimal fakultas</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat nasional</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat Internasional</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL N--}}

{{-- LANJUT MODAL C S/D HABIS --}}


{{--TEMPAT MODAL EDIT --}}

{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_A" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Keterlibatan dalam 1 judul penelitian atau
                    pembuatan
                    karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan
                    tercapai)
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
                        <label for="email" class="form-label">Posisi</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL A --}}

{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_B" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Pelaksanaan penelitian mandiri atau pembuatan
                    karya
                    seni atau teknologi (disetujui oleh pimpinan dan tercatat)</h6>
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
                        <label for="email" class="form-label">Posisi</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL B --}}

{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_C" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.
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
                        <label for="email" class="form-label">Jenis Pengerjaan</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Kategori</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL C --}}

{{-- MULAI MODAL D --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_D" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">D. Menulis satu judul naskah buku internasional (berbahasa dan diedarkan secara internasional minimal tiga negara), disetujui oleh pimpinan dan tercatat
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
                        <label for="email" class="form-label">Jenis Pengerjaan</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Peran</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL D --}}





<!-- MODAL F -->
<div class="modal fade modal-lg" id="modalEditPenelitian_F" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">F. Menyunting satu judul naskah buku yang akan
                    diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat)
                    sama dengan 2 sks
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
                        <label for="email" class="form-label">Posisi (Ketua/Editor/Anggota)</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
<!--Akhir Modal F-->

{{-- MULAI MODAL G --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_G" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen
                    yang sesuai dengan bidang ilmu dan tidak diterbitkan, tetapi digunakan oleh mahasiswa</h6>
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
                        <label for="email" class="form-label">Jumlah Anggota</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL G --}}

{{-- MULAI MODAL H --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_H" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">H. PEKERTI/AA</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL H --}}

<!-- Mulai Modal I -->
<div class="modal fade modal-lg" id="modalEditPenelitian_I" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class=" modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banyaknya BKD Terhitung</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Akhir modal I -->

<!-- Awal Modal J -->
<div class="modal fade modal-lg" id="modalEditPenelitian_J" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">J. Menulis Jurnal Ilmiah</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class=" modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Kategori</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal J -->

{{-- MULAI MODAL K --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_K" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">K. Memperoleh hak paten</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class=" modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownKategori">Kategori:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKategori"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownKategori">
                                <li><a class="dropdown-item" href="#">Paten Sederhana</a></li>
                                <li><a class="dropdown-item" href="#">Paten Biasa</a></li>
                                <li><a class="dropdown-item" href="#">Paten Internasional (minimal tiga negara)</a></li>
                            </ul>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL K --}}

{{-- MULAI MODAL L --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_L" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">L. Menulis di media massa</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class=" modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL L --}}



{{-- MULAI MODAL M --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_M" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">M. Menyampaikan orasi ilmiah, pembicara dalam
                    seminar, nara sumber terkait dengan bidang
                    keilmuannya</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class=" modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownTingkatan">Tingkatan:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTingkatan"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownTingkatan">
                                <li><a class="dropdown-item" href="#">Tingkat Regional/minimal fakultas</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat nasional</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat Internasional</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL M --}}

{{-- MULAI MODAL N --}}
<div class="modal fade modal-lg" id="modalEditPenelitian_N" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">N. Penyaji makalah dalam seminar atau pertemuan
                    ilmiah terkait dengan bidang ilmu
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
                        <label for="dropdownTingkatan">Tingkatan:</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTingkatan"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih
                            </button>
                            <ul class="dropdown-menu form-control" aria-labelledby="dropdownTingkatan">
                                <li><a class="dropdown-item" href="#">Tingkat Regional/minimal fakultas</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat nasional</a></li>
                                <li><a class="dropdown-item" href="#">Tingkat Internasional</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEditConfirm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL N --}}

{{-- TEMPAT MODAL EDIT CONFIRM --}}
<div class="modal fade" id="modalEditConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-question-circle text-warning"></i></h1>
                <h5>Yakin untuk menyimpan perubahan kegiatan ini?</h5>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <button id="confirmEditBtn" type="button" class="btn btn-primary">Yakin</button>
            </div>
        </div>
    </div>
</div>

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
                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol
                    'Yakin'
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
</script>


@endsection
