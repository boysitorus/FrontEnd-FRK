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
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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
                            <th scope="col" rowspan="2 " class="align-middle fw-bold col-2">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
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


    {{-- MODAL SETUJU --}}
    <div class="modal fade text-center" id="modalSetuju" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1><i class="bi bi-check-circle text-success"></i></h1>
                    <h5>Yakin untuk menyetujui kegiatan ini?</h5>
                    <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Yakin</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL SETUJUI --}}

    {{-- MODAL TOLAK --}}
    <div class="modal fade text-center" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Rencana Kerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1><i class="bi bi-x-circle text-danger"></i></h1>
                    <h5>Yakin untuk menolak kegiatan ini?</h5>
                    <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger">Yakin</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL TOLAK --}}
@endsection
