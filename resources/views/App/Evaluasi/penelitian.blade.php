@extends('Template.evaluasi')

@section('content-kegiatan')

    {{-- TAMPILAN BAGIAN EVALUASI PENELITIAN --}}

    {{-- BAGIAN A --}}

    <div id="penelitian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya
                    seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-A"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-3">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE A --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">A. Kuliah
                                                    (Teori)
                                                    pada tingkat Diploma
                                                    dan S1 terhadap setiap kelompok</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penelitian"
                                                        value="Penelitian_Kelompok" />
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Keterangan dari Pimpinan/Ka LPPM atau Surat
                                                                        Kontrak Penelitian</li>
                                                                    <li>Proposal</li>
                                                                    <li>Laporan progress report bila belum selesai</li>
                                                                    <li>Surat pernyataan dari Ka LPPM bahwa penelitian sudah
                                                                        selesai</li>
                                                                    <li>Laporan akhir penelitian (termasuklog book)</li>
                                                                    <li>Foto karya seni / bukti lain yang relevan jika
                                                                        terkait dengan pengembangan teknologi
                                                                    </li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianA-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianA-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianA-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" id="btnPenelitianA"
                                                        class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE A --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianA-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianA-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianA-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianA-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN D --}}
    <div id="penelitian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional
                    (berbahasa dan diedarkan secara internasional minimal tiga negara),
                    disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold col-1">Asesor 1</th>
                            <th scope="col" class="fw-bold col-1">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($buku_internasional) && sizeof($buku_internasional) > 0)
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
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_D_{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- TEMPAT MODAL ADD FILE D --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_D_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianDLabel">D. Menulis
                                                    satu
                                                    judul naskah buku internasional
                                                    (berbahasa dan diedarkan secara internasional minimal tiga negara)
                                                    ,
                                                    disetujui oleh pimpinan dan tercatat</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="text" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_penelitian"
                                                        value="Buku_Internasional}">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Buku yang sudah terbit</li>
                                                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                                                    <li>Surat Keterangan Sedang Menulis
                                                                        Buku dari Pimpinan bagi yang sedang menulis buku,
                                                                        dengan
                                                                        mencantumkan akan selesai dalam
                                                                        berapa lama, bagi yang sedang menulis.</li>
                                                                    <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                        proses
                                                                    </li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnD-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFilesD-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputD-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE D --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputD-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesD-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnD-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputD-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

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

    {{-- MODAL BATAL UPLOAD --}}
    <div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="modalBatal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center" style="padding: 8%;">
                    <h5 class="modal-title" id="modalBatal_label py-5">Apakah anda yakin untuk membatalkan pengumpulan
                        lampiran?</h5>
                    <div class="my-4">
                        <button type="button" class="btn btn-primary mx-3" data-bs-dismiss="modal">Yakin</button>
                        <button type="button" class="btn btn-secondary mx-3">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN MODAL BATAL UPLOAD --}}

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

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
