@extends('Template.asesorFEDdetail')

@section('content-kegiatan')
    {{-- BAGIAN A --}}
    <div id="pengabdian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Satu kegiatan yang setara dengan 50 jam kerja</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPengabdian-A"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle" style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                            $counter = 1;
                        @endphp
                        @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item['asesor1_fed'] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text" name="komentar"
                                                class="form-control" placeholder="Tambahkan Komentar"
                                                aria-label="Recipient's username" aria-describedby="button-addon2" required>
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
                        {{-- @endforeach --}}
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
                <table id="tabelPengabdian-B"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                    style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                            $counter = 1;
                        @endphp
                        @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item['asesor1_fed'] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}"
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text"
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
                        {{-- @endforeach --}}
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
                <table id="tabelPengabdian-C"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                    style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                            $counter = 1;
                        @endphp
                        @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                    <td>Belum ada komentar</td>
                                @else
                                    @if ($item['asesor1_fed'] == 'setuju')
                                        <td>
                                            <span class="badge bg-success">Disetujui</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}"
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text"
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
                        {{-- @endforeach --}}
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
                <table id="tabelPengabdian-D"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                    style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                        $counter = 1;
                    @endphp
                    @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                <td>Belum ada komentar</td>
                            @else
                                @if ($item['asesor1_fed'] == 'setuju')
                                    <td>
                                        <span class="badge bg-success">Disetujui</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Setujui Rencana Kerja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}"
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text"
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
                        {{-- @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="pengabdian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, ada editor, tiap
                    chapter ada kontributor</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPengabdian-E"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                    style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                        $counter = 1;
                    @endphp
                    @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                <td>Belum ada komentar</td>
                            @else
                                @if ($item['asesor1_fed'] == 'setuju')
                                    <td>
                                        <span class="badge bg-success">Disetujui</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}"
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
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}"
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text"
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
                        {{-- @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="pengabdian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis karya pengabdian yang dipakai
                    sebagai Modul Pelatihan oleh seorang Dosen (Tidak diterbitkan, tetapi digunakan oleh siswa
                    mahasiswa)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPengabdian-F"
                    class="table table-striped table-bordered mt-2 text-center border-secondary-subtle"
                    style="border: 2px;">

                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Bukti Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Aksi</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Komentar</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">

                        {{-- @php
                        $counter = 1;
                    @endphp
                    @foreach ($teori as $item) --}}
                        <tr>
                            <td scope="row">{{-- $counter++ --}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success mr-1" data-bs-toggle="modal"
                                    data-bs-target="#modalSetuju-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger mr-1"
                                    data-bs-toggle="modal"data-bs-target="#modalTolak-{{-- $item['id_rencana'] --}}"><i
                                        class="bi bi-x-lg"></i></button>
                            </td>
                            <td></td>
                            {{-- @if ($item['asesor1_fed'] == null)
                                <td>Belum ada komentar</td>
                            @else
                                @if ($item['asesor1_fed'] == 'setuju')
                                    <td>
                                        <span class="badge bg-success">Disetujui</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-warning text-dark">{{-- $item['asesor1_frk'] --}}</span>
                            </td>
                            {{-- @endif --}}
                        </tr>

                        {{-- MODAL SETUJU --}}
                        <div class="modal fade text-center" id="modalSetuju-{{-- $item['id_rencana'] --}}"
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
                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
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

                        <div class="modal fade text-center" id="modalTolak-{{-- $item['id_rencana'] --}}"
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

                                    <form action="{{-- route('rk-asesor-review-rencana') --}}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3 p-3">
                                            <input type="hidden" name="id_rencana" value={{-- $item['id_rencana'] --}}>
                                            <input id="input_komentar_{{-- $item['id_rencana'] --}}" type="text"
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
                        {{-- @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}
@endsection
