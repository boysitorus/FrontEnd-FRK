@extends('Template.rencana')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN PENUNJANG --}}

    {{-- BAGIAN A --}}
    <div id="penunjang-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangA" type="button" class="btn btn-success col-md-auto m-1" data-bs-toggle="modal"
                    data-bs-target="#modalPenunjang_A">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-A"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
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
                        @if (isset($akademik) && sizeof($akademik) > 0)
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($akademik as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_mahasiswa'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3"></i></i></button>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade modal-lg" id="modalEditPenunjang-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-penunjang.akademik.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_mahasiswa" class="form-label">Jumlah
                                                            Mahasiswa</label>
                                                        <input placeholder="{{ $item['jumlah_mahasiswa'] }}" type="number"
                                                            class="form-control" name="jumlah_mahasiswa" min="1">
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
                                {{-- END OF MODAL EDIT --}}

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
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penunjang.akademik.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penunjang.akademik.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END OF MODAL DELETE --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN B --}}
    <div id="penunjang-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling.</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangB" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_B">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-B"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Mahasiswa</th>
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
                        @if (isset($bimbingan) && sizeof($bimbingan))
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
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3"></i></i></button>

                                    </td>
                                </tr>
                        {{-- MODAL EDIT --}}
                        <div class="modal fade modal-lg" id="modalEditPenunjang-{{ $item['id_rencana'] }}"
                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                            {{ $item['nama_kegiatan'] }}</h6>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('rk-penunjang.bimbingan.update') }}" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                            <div class="mb-3">
                                                <label for="nama_kegiatan" class="form-label">Nama
                                                    Kegiatan</label>
                                                <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                    class="form-control" id="nama" name="nama_kegiatan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_mahasiswa" class="form-label">Jumlah
                                                    Mahasiswa</label>
                                                <input placeholder="{{ $item['jumlah_mahasiswa'] }}" type="number"
                                                    class="form-control" name="jumlah_mahasiswa" min="1">
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
                        {{-- END OF MODAL EDIT --}}

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
                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                            anda sudah menekan tombol 'Yakin'
                                        </p>
                                    </div>

                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batalkan</button>
                                        <a id="confirmDeleteBtn" class="btn btn-primary"
                                            href="{{ route('rk-penunjang.bimbingan.destroy', ['id' => $item['id_rencana']]) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                        <form id="delete-form-{{ $item['id_rencana'] }}"
                                            action="{{ route('rk-penunjang.bimbingan.destroy', ['id' => $item['id_rencana']]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END OF MODAL DELETE --}}
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="penunjang-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa),
                    Himadep (Himpunan Mahasiswa Departemen), BEM (Badan Eksekutif Mahasiswa),
                    BLM (Badan Legislatif Mahasiswa, BSO (Badan Semi Otonom: misal SKI, kelompok kajian),
                    Majalah Mahasiswa, Bimbingan penalaran Mhs, LKMM, LKTI, LKIP)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangC" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_C">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Kegiatan</th>
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
                        @if (isset($ukm) && sizeof($ukm) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($ukm as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_kegiatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        {{-- MODAL DELETE --}}
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
                                                            action="{{ route('rk-penunjang.ukm.destroy', ['id' => $item['id_rencana']]) }}"
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
                                        {{-- MODAL DELETE SELESAI --}}
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade" id="modalEditPenunjang-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditPenunjangCLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenunjangCLabel">
                                                    {{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-penunjang.ukm.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value ="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama_kegiatan"
                                                            value="{{ $item['nama_kegiatan'] }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_kegiatan" class="form-label">Jumlah
                                                            Kegiatan</label>
                                                        <input class="form-control" type="number" name="jumlah_kegiatan"
                                                            value="{{ $item['jumlah_kegiatan'] }}" min="1"
                                                            step="any">
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
                                {{-- MODAL EDIT SELESAI --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="penunjang-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal
                    a. Koperasi fakultas, b. Dharma wanita, c. Takmir Masjid/Pastoran</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangD" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_D">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-4">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold col-1">Asesor 1</th>
                            <th scope="col" class="fw-bold col-1">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody cllass="align-middle">
                        @if (isset($sosial) && sizeof($sosial) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($sosial as $item)
                                <tr>
                                    <td scope="row1">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        {{-- MODAL DELETE --}}
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
                                                            action="{{ route('rk-penunjang.sosial.destroy', ['id' => $item['id_rencana']]) }}"
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
                                        {{-- MODAL DELETE SELESAI --}}
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade" id="modalEditPenunjang-{{ $item['id_rencana'] }}" tabindex="-1"
                                    aria-labelledby="modalEditPenunjangDLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalEditPenunjangDLabel">
                                                    {{ $counter++  }}. {{ $item['nama_kegiatan'] }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action = "{{ route('rk-penunjang.sosial.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value ="{{ $item['id_rencana'] }}" />
                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input type="text" class="form-control" name="nama_kegiatan"
                                                            value="{{ $item['nama_kegiatan'] }}">
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
                                {{-- MODAL EDIT SELESAI --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="penunjang-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangE" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_E">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                        @if (isset($struktural) && sizeof($struktural) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($struktural as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{$item['nama_kegiatan']}}</td>
                                    <td>{{$item['jenis_jabatan_struktural']}}</td>
                                    <td>{{$item['sks_terhitung']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i class="bi bi-trash3-fill"></i></i></button>

                                            {{-- TEMPAT MODAL EDIT CONFIRM E --}}
                                            <div class="modal fade" id="modalEditPenunjang-{{ $item['id_rencana'] }}" tabindex="-1" aria-labelledby="modalEditPenunjangELabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditPenunjangELabel">{{$counter++}}. {{ $item['nama_kegiatan'] }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form action="{{ route('rk-penunjang.struktural.update') }}" method="POST">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                                <div class="mb-3">
                                                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                                    <input value="{{ $item['nama_kegiatan'] }}" type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jenis_jabatan_struktural" class="form-label">Jabatan</label>
                                                                    <select class="form-select" aria-label="Default select example" name="jenis_jabatan_struktural">
                                                                        <option selected>{{ $item['jenis_jabatan_struktural'] }}</option>
                                                                        <option value="Rektor" {{ $item['jenis_jabatan_struktural'] == 'Rektor' ? 'selected' : '' }}>Rektor</option>
                                                                        <option value="Wakil Rektor" {{ $item['jenis_jabatan_struktural'] == 'Wakil Rektor' ? 'selected' : '' }}>Wakil Rektor</option>
                                                                        <option value="Dekan" {{ $item['jenis_jabatan_struktural'] == 'Dekan' ? 'selected' : '' }}>Dekan</option>
                                                                        <option value="Wakil Dekan" {{ $item['jenis_jabatan_struktural'] == 'Wakil Dekan' ? 'selected' : '' }}>Wakil Dekan</option>
                                                                        <option value="SPM" {{ $item['jenis_jabatan_struktural'] == 'SPM' ? 'selected' : '' }}>SPM</option>
                                                                        <option value="SPI" {{ $item['jenis_jabatan_struktural'] == 'SPI' ? 'selected' : '' }}>SPI</option>
                                                                        <option value="Kaprodi" {{ $item['jenis_jabatan_struktural'] == 'Kaprodi' ? 'selected' : '' }}>Kaprodi</option>
                                                                        <option value="Sekretaris Kaprodi" {{ $item['jenis_jabatan_struktural'] == 'Sekretaris Prodi' ? 'selected' : '' }}>Sekretaris Prodi</option>
                                                                        <option value="Direktur" {{ $item['jenis_jabatan_struktural'] == 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                                                        <option value="Ka Biro atau Ka Lembaga" {{ $item['jenis_jabatan_struktural'] == 'Ka Biro atau Ka Lembaga' ? 'selected' : '' }}>Ka Biro atau Ka Lembaga</option>
                                                                        <option value="Waka Biro/ Waka Lembaga" {{ $item['jenis_jabatan_struktural'] == 'Waka Biro/ Waka Lembaga' ? 'selected' : '' }}>Waka Biro/ Waka Lembaga</option>
                                                                        <option value="Ka. UPT Teknologi Informasi" {{ $item['jenis_jabatan_struktural'] == 'Ka. UPT Teknologi Informasi' ? 'selected' : '' }}>Ka. UPT Teknologi Informasi</option>
                                                                        <option value="Ka. UPT Perpustakaan" {{ $item['jenis_jabatan_struktural'] == 'Ka. UPT Perpustakaan' ? 'selected' : '' }}>Ka. UPT Perpustakaan</option>
                                                                        <option value="Ka. UPT Bahasa" {{ $item['jenis_jabatan_struktural'] == 'Ka. UPT Bahasa' ? 'selected' : '' }}>Ka. UPT Bahasa</option>
                                                                        <option value="Ka UPT SAM" {{ $item['jenis_jabatan_struktural'] == 'Ka UPT SAM' ? 'selected' : '' }}>Ka UPT SAM</option>
                                                                        <option value="Ka Pusat Karir" {{ $item['jenis_jabatan_struktural'] == 'Ka Pusat Karir' ? 'selected' : '' }}>Ka Pusat Karir</option>
                                                                        <option value="Koordinator Divisi di bawah WR3" {{ $item['jenis_jabatan_struktural'] == 'Koordinator Divisi di bawah WR3' ? 'selected' : '' }}>Koordinator Divisi di bawah WR3</option>
                                                                        <option value="Wakil Kepala Unit/Koordinator" {{ $item['jenis_jabatan_struktural'] == 'Wakil Kepala Unit/Koordinator' ? 'selected' : '' }}>Wakil Kepala Unit/Koordinator</option>
                                                                    </select>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- AKHIR MODAL EDIT --}}

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
                                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                            anda sudah menekan tombol 'Yakin'
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        <a id="confirmDeleteBtn" class="btn btn-primary"
                                                            href="{{ route('rk-penunjang.struktural.destroy', ['id' => $item['id_rencana']]) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                        <form id="delete-form-{{ $item['id_rencana'] }}"
                                                            action="{{ route('rk-penunjang.akademik.destroy', ['id' => $item['id_rencana']]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- END OF MODAL DELETE --}}
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

    {{-- BAGIAN F --}}
    <div id="penunjang-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangF" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_F">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_F"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- BAGIAN G --}}
    <div id="penunjang-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangG" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_G">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_G"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_G"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- BAGIAN H --}}
    <div id="penunjang-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2 semester),
                    seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangH" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_H">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-H"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="penunjang-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangI" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_I">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_H"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_I"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- BAGIAN J --}}
    <div id="penunjang-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangJ" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_J">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkat Jabatan</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_J"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_J"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K --}}
    <div id="penunjang-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangK" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_K">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-K"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jabatan(Ketua/Anggota)</th>
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
                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_K"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit
                                arcu pharetra.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPenunjang_K"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></i></button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- BAGIAN L --}}
    <div id="penunjang-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangL" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_L">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-L"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Jabatan(Ketua/Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
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
                        @if (isset($asosiasi) && sizeof($asosiasi) > 0)
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
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3"></i></i></button>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade modal-lg" id="modalEditPenunjang-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-penunjang.asosiasi.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">
                                                            Jabatan                                                            
                                                        </label>
                                                        <input placeholder="{{ $item['jabatan'] }}" type="text"
                                                            class="form-control" id="jabatan" name="jabatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_tingkatan" class="form-label">
                                                            Tingkatan                                                            
                                                        </label>
                                                        <input placeholder="{{ $item['jenis_tingkatan'] }}" type="text"
                                                            class="form-control" id="jenis_tingkatan" name="jenis_tingkatan">
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
                                {{-- END OF MODAL EDIT --}}

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
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penunjang.asosiasi.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penunjang.asosiasi.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END OF MODAL DELETE --}}
                            @endforeach
                        @endif
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN L --}}

    {{-- BAGIAN M --}}
    <div id="penunjang-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>M. Peserta Seminar/Workshop/Kursus Berdasar Penugasan Pimpinan</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangM" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_M">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-M"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tingkatan</th>
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
                        @if (isset($seminar) && sizeof($seminar) > 0)
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($seminar as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jenis_tingkatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3"></i></i></button>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade modal-lg" id="modalEditPenunjang-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-penunjang.seminar.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">Nama
                                                            Kegiatan:</label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_tingkatan" class="form-label">
                                                            Tingkatan:
                                                        </label>
                                                        <input placeholder="{{ $item['jenis_tingkatan'] }}" type="text"
                                                            class="form-control" name="jenis_tingkatan" min="1">
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
                                {{-- END OF MODAL EDIT --}}

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
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penunjang.seminar.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penunjang.seminar.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END OF MODAL DELETE --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN M --}}

    {{-- BAGIAN N --}}
    <div id="penunjang-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
            <hr />

            <div class="row justify-content-end mr-0">
                <button id="btnFrkPenunjangN" type="button" class="btn btn-success col-md-auto m-1"
                    data-bs-toggle="modal" data-bs-target="#modalPenunjang_N">
                    Tambah Kegiatan
                </button>
            </div>

            <div class="text-sm">
                <table id="tablePenunjang-N"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
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
                        @if (isset($reviewer) && sizeof($reviewer) > 0)
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($reviewer as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenunjang-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm-{{ $item['id_rencana'] }}"><i
                                                class="bi bi-trash3"></i></i></button>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade modal-lg" id="modalEditPenunjang-{{ $item['id_rencana'] }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">{{ $counter++ }}.
                                                    {{ $item['nama_kegiatan'] }}</h6>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rk-penunjang.reviewer.update') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana" value="{{ $item['id_rencana'] }}" />

                                                    <div class="mb-3">
                                                        <label for="nama_kegiatan" class="form-label">
                                                            Nama Kegiatan:
                                                        </label>
                                                        <input placeholder="{{ $item['nama_kegiatan'] }}" type="text"
                                                            class="form-control" id="nama" name="nama_kegiatan">
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
                                {{-- END OF MODAL EDIT --}}

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
                                                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                    anda sudah menekan tombol 'Yakin'
                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                <a id="confirmDeleteBtn" class="btn btn-primary"
                                                    href="{{ route('rk-penunjang.reviewer.destroy', ['id' => $item['id_rencana']]) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id_rencana'] }}').submit()">Yakin</a>

                                                <form id="delete-form-{{ $item['id_rencana'] }}"
                                                    action="{{ route('rk-penunjang.reviewer.destroy', ['id' => $item['id_rencana']]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END OF MODAL DELETE --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN N --}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN A --}}
    <div class="modal fade modal-lg" id="modalPenunjang_A" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">A. Bimbingan Akademik
                        (perwalian/penasehat akademik)</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rk-penunjang.akademik.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa:</label>
                            <input name="jumlah_mahasiswa" class="form-control" type="number" required
                                min="1">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN A}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN B --}}
    <div class="modal fade modal-lg" id="modalPenunjang_B" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">B. Bimbingan dan Konseling</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rk-penunjang.bimbingan.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_mahasiswa" class="form-label">Jumlah Mahasiswa:</label>
                            <input name="jumlah_mahasiswa" class="form-control" type="number" required
                                min="1">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN B}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN C --}}
    <div class="modal fade modal-lg" id="modalPenunjang_C" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">C. Pimpinan Pembina Unit Kegiatan Mahasiswa</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('rk-penunjang.ukm.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kegiatan" class="form-label">Jumlah Kegiatan</label>
                            <input class="form-control" type="number" name="jumlah_kegiatan" required
                                min="1" step="any">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN C}}

    
    {{-- TEMPAT MODAL TAMBAH KEGIATAN D --}}
    <div class="modal fade modal-lg" id="modalPenunjang_D" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">D. Pimpinan organisasi sosial intern sebagai hanya
                        Ketua/Wakil yang dibina Ketua, misal a. Koperasi fakultas, b. Dharma wanita, c. Takmir
                        Masjid/Pastoran</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rk-penunjang.sosial.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN D}}
    
    {{-- TEMPAT MODAL TAMBAH KEGIATAN E --}}
    <div class="modal fade modal-lg" id="modalPenunjang_E" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">E. Jabatan struktural (berdasarkan beban/semester)
                    </h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rk-penunjang.struktural.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_jabatan_struktural" class="form-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_jabatan_struktural">
                                <option selected>Open this select menu</option>
                                <option value="Rektor">Rektor</option>
                                <option value="Wakil Rektor">Wakil Rektor</option>
                                <option value="Dekan">Dekan</option>
                                <option value="Wakil Dekan">Wakil Dekan</option>
                                <option value="SPM">SPM</option>
                                <option value="SPI">SPI</option>
                                <option value="Kaprodi">Kaprodi</option>
                                <option value="Sekretaris Prodi">Sekretaris Prodi</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Ka Biro atau Ka Lembaga">Ka Biro atau Ka Lembaga</option>
                                <option value="Waka Biro/ Waka Lembaga">Waka Biro/ Waka Lembaga</option>
                                <option value="Ka. UPT Teknologi Informasi">Ka. UPT Teknologi Informasi</option>
                                <option value="Ka. UPT Perpustakaan">Ka. UPT Perpustakaan</option>
                                <option value="Ka. UPT Bahasa">Ka. UPT Bahasa</option>
                                <option value="Ka UPT SAM">Ka UPT SAM</option>
                                <option value="Ka Pusat Karir">Ka Pusat Karir</option>
                                <option value="Koordinator Divisi di bawah WR3">Koordinator Divisi di bawah WR3</option>
                                <option value="Wakil Kepala Unit/Koordinator">Wakil Kepala Unit/Koordinator</option>
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
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN E}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN F --}}
    <div class="modal fade modal-lg" id="modalPenunjang_F" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">F. Jabatan non struktural</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN F}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN G --}}
    <div class="modal fade modal-lg" id="modalPenunjang_G" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi
                        Jurnal ber-ISSN</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN G}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN H --}}
    <div class="modal fade modal-lg" id="modalPenunjang_H" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h6 class="modal-title" id="exampleModalLabel">H. Ketua Panitia Ad Hoc</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN H}}

   {{-- TEMPAT MODAL TAMBAH KEGIATAN I --}}
    <div class="modal fade modal-lg" id="modalPenunjang_I" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">I. Ketua Panitia Tetap</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN I}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN J --}}
    <div class="modal fade modal-lg" id="modalPenunjang_J" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">J. Anggota Panitia Tetap: (umur panitia
                        sekurang-kurangnya 2 semester)</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN J}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN K --}}
    <div class="modal fade modal-lg" id="modalPenunjang_K" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI,
                        Assesor BAN-PT</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN K}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN L --}}
    <div class="modal fade modal-lg" id="modalPenunjang_L" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">L. Menjadi Pengurus/Anggota Asosiasi Profesi</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rk-penunjang.asosiasi.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan:</label>
                            <select class="form-control" id="jenis_jabatan" name="jenis_jabatan">
                                <option value="anggota">Anggota</option>
                                <option value="ketua">Ketua</option>
                            </select>
                        </div>
                        <label class="form-label">Tingkatan:</label>
                            <select class="form-control" id="jenis_tingkatan" name="jenis_tingkatan" required>
                                <option value="nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN L}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN M --}}
    <div class="modal fade modal-lg" id="modalPenunjang_M" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">M. Peserta Seminar/Workshop/Kursus Berdasar Penugasan
                        Pimpinan</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rk-penunjang.seminar.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_tingkatan" class="form-label">Tingkatan:</label>
                            <input name="jenis_tingkatan" class="form-control" type="text" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN M}}

    {{-- TEMPAT MODAL TAMBAH KEGIATAN N --}}
    <div class="modal fade modal-lg" id="modalPenunjang_N" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">N. Reviewer Jurnal Ilmiah , Proposal Hibah dll</h6>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rk-penunjang.reviewer.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_dosen" value="1">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                            <input name="nama_kegiatan" type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR TEMPAT MENAMBAH KEGIATAN N}}

    {{-- TEMPAT MODAL EDIT CONFIRM A --}}
    <div class="modal fade" id="modalEditPenunjang_A" tabindex="-1" aria-labelledby="modalEditPenunjangALabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangALabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Mahasiswa:</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM B --}}
    <div class="modal fade" id="modalEditPenunjang_B" tabindex="-1" aria-labelledby="modalEditPenunjangBLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangBLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Mahasiswa:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM C --}}
    <div class="modal fade" id="modalEditPenunjang_C" tabindex="-1" aria-labelledby="modalEditPenunjangCLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangCLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Kegiatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM D --}}
    <div class="modal fade" id="modalEditPenunjang_D" tabindex="-1" aria-labelledby="modalEditPenunjangDLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangDLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="editKegiatan" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="editKegiatan">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM E --}}
    <div class="modal fade" id="modalEditPenunjang_E" tabindex="-1" aria-labelledby="modalEditPenunjangELabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangELabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM F --}}
    <div class="modal fade" id="modalEditPenunjang_F" tabindex="-1" aria-labelledby="modalEditPenunjangFLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangFLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM G --}}
    <div class="modal fade" id="modalEditPenunjang_G" tabindex="-1" aria-labelledby="modalEditPenunjangGLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangGLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM H --}}
    <div class="modal fade" id="modalEditPenunjang_H" tabindex="-1" aria-labelledby="modalEditPenunjangHLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangHLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM I --}}
    <div class="modal fade" id="modalEditPenunjang_I" tabindex="-1" aria-labelledby="modalEditPenunjangILabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangILabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM J --}}
    <div class="modal fade" id="modalEditPenunjang_J" tabindex="-1" aria-labelledby="modalEditPenunjangJLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangJLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM K --}}
    <div class="modal fade" id="modalEditPenunjang_K" tabindex="-1" aria-labelledby="modalEditPenunjangKLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangKLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM L --}}
    <div class="modal fade" id="modalEditPenunjang_L" tabindex="-1" aria-labelledby="modalEditPenunjangLLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangLLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM M --}}
    <div class="modal fade" id="modalEditPenunjang_M" tabindex="-1" aria-labelledby="modalEditPenunjangMLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangMLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkatan:</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

    {{-- TEMPAT MODAL EDIT CONFIRM N --}}
    <div class="modal fade" id="modalEditPenunjang_N" tabindex="-1" aria-labelledby="modalEditPenunjangNLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPenunjangNLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <label for="editKegiatan" class="form-label">Nama Kegiatan:</label>
                            <input type="text" class="form-control" id="editKegiatan">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL EDIT --}}

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




@endsection
