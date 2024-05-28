@extends('Template.asesorFEDdetail')

@section('content-kegiatan')
    {{-- BAGIAN A --}}
    <div id="penunjang-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Bimbingan Akademik (perwalian/penasehat akademik)</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-A"
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
    <div id="penunjang-B" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>B.Bimbingan dan Konseling</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-B"
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
    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C--}}
    <div id="penunjang-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Pimpinan Pembinaan Unit kegiatan mahasiswa seperti; UKM, Ormawa (Organisasi Mahasiswa), Himadep (Himpunan Mahasiswa Departemen), 
                BEM (Badan Eksekutif Mahasiswa), BLM (Badan Legislatif Mahasiswa), BSO(Badan Semi Otonom: misal SKI, kelompok kajian), Majalah Mahasiswa, 
                Bimbingan penalaran Mhs, LKMM, LKTI, LKIP</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-C"
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
    {{-- AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="penunjang-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Pimpinan organisasi sosial intern sebagai hanya Ketua/Wakil yang dibina Ketua, misal a) Koperasi fakultas, b) Dharma wanita, c)  Takmir Masjid/Pastoran</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-D"
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
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="penunjang-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Jabatan struktural (berdasarkan beban/semester)</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-E"
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
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F--}}
    <div id="penunjang-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Jabatan non struktural</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-F"
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
    {{-- AKHIR BAGIAN F --}}

    {{-- BAGIAN G --}}
    <div id="penunjang-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Ketua Redaksi Jurnal ber-ISSN / Anggota Redaksi Jurnal ber-ISSN</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-G"
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
    {{-- AKHIR BAGIAN G --}}

    {{-- BAGIAN H --}}
    <div id="penunjang-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. Ketua Panitia Ad Hoc: (umur panitia sekurang-kurangnya 2  semester), seperti Panitia Reviewer RKAT, Panitia Telaah Prodi Anggota Panitia Ad Hoc</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-H"
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
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="penunjang-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>I. Ketua Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-I"
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
    {{-- AKHIR BAGIAN I --}}

    {{-- BAGIAN J --}}
    <div id="penunjang-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Anggota Panitia Tetap: (umur panitia sekurang-kurangnya 2 semester)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPenunjang-J"
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
    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K--}}
    <div id="penunjang-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Menjadi Pengurus Yayasan : APTISI atau BMPTSI , asesor BAN-PT</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPenunjang-K"
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
    {{-- AKHIR BAGIAN K --}}


    {{-- BAGIAN L --}}
    <div id="penunjang-L" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>L. Menjadi Pengurus/Anggota Asosiasi Profesi</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-L"
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
    {{-- AKHIR BAGIAN L --}}

    {{-- BAGIAN M --}}
    <div id="penunjang-M" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><</b>M. Peserta seminar/workshop/kursus berdasar penugasan  pimpinan</h6>
            <hr />

            <div class="text-sm">
                <table id="tabelPenunjang-M"
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
    {-- AKHIR BAGIAN M-}

    {{-- BAGIAN N --}}
    <div id="penunjang-N" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>N. Reviewer jurnal ilmiah , proposal Hibah dll</b></h6>
            <hr />
    
            <div class="text-sm">
                <table id="tabelPenunjang-N"
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
    {{-- AKHIR BAGIAN N--}}
@endsection