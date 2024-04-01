@extends('Template.rencana')

@section('content-penelitian')

{{-- Mulai A --}}
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6>
            <b>A. Satu kegiatan yang setara dengan 50 jam kerja</b>
        </h6>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                data-bs-toggle="modal" data-bs-target="#modalpengabdian_A">Tambah
                Kegiatan</button>

        </div>
        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Durasi Kegiatan</th>
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
                            data-bs-target="#modalEditPengabdian_A"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- Akhir A --}}

{{-- TEMPAT MODAL TAMBAH KEGIATAN --}}
{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalpengabdian_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Satu kegiatan yang setara dengan 50 jam kerja
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
                        <label class="form-label">Durasi Kegiatan</label>
                        <input type="number" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL A --}}


{{-- TEMPAT MODAL EDIT --}}
{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalEditPengabdian_A" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Satu kegiatan yang setara dengan 50 jam kerja
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
                        <label class="form-label">Durasi Kegiatan</label>
                        <input type="number" class="form-control">
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



{{-- Mulai B --}}
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6>
            <b>B. Memberikan penyuluhan/penataran kepada masyarakat.</b>
        </h6>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                data-bs-toggle="modal" data-bs-target="#modalpengabdian_B">Tambah
                Kegiatan</button>

        </div>
        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Durasi Kegiatan</th>
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
                            data-bs-target="#modalEditPengabdian_B"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- Akhir B --}}

{{-- TEMPAT MODAL TAMBAH KEGIATAN --}}
{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalpengabdian_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Memberikan penyuluhan/penataran kepada masyarakat.
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
                        <label class="form-label">Durasi Kegiatan</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah SKS</label>
                        <input type="number" class="form-control">
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


{{-- TEMPAT MODAL EDIT --}}
{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalEditPengabdian_B" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Memberikan penyuluhan/penataran kepada masyarakat.
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
                        <label class="form-label">Durasi Kegiatan</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Jumlah</label>
                        <input type="number" class="form-control">
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



{{-- Mulai C --}}
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6>
            <b>C. Memberikan jasa konsultan yang relevan dengan kepakarannya atas persetujuan/penugasan pimpinan PT</b>
        </h6>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianC" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                data-bs-toggle="modal" data-bs-target="#modalpengabdian_C">Tambah
                Kegiatan</button>

        </div>
        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Jabatan (Ketua / Anggota)</th>
                    <th scope="col" rowspan="2" class="align-middle">Jumlah Proyek</th>
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
                    <td>
                        <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal"
                            data-bs-target="#modalEditPengabdian_C"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- Akhir C --}}

{{-- TEMPAT MODAL TAMBAH KEGIATAN --}}
{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalpengabdian_C" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Memberikan jasa konsultan yang relevan dengan
                    kepakarannya atas persetujuan/penugasan pimpinan PT
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
                        <label class="form-label">Jabatan</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">Ketua</option>
                            <option value="">Anggota</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Proyek</label>
                        <input type="number" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL C--}}


{{-- TEMPAT MODAL EDIT --}}
{{-- MULAI MODAL C --}}
<div class="modal fade modal-lg" id="modalEditPengabdian_C" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">C. Memberikan jasa konsultan yang relevan dengan
                    kepakarannya atas persetujuan/penugasan pimpinan PT
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
                        <label class="form-label">Jabatan</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">Ketua</option>
                            <option value="">Anggota</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Proyek</label>
                        <input type="number" class="form-control">
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



{{-- Mulai D --}}
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6>
            <b>D. Membuat/menulis karya pengabdian kepada masyarakat dengan menulis 1 judul, direncanakan terbit ber
                ISBN, ada kontrak penerbitan dan atau sudah diterbitkan dan ber – ISBN</b>
        </h6>
        <hr />

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianD" type="button" class="btn btn-success col-md-auto mt-2 mb-2"
                data-bs-toggle="modal" data-bs-target="#modalpengabdian_D">Tambah
                Kegiatan</button>

        </div>
        <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kegiatan</th>
                    <th scope="col" rowspan="2" class="align-middle">Kategori</th>
                    <th scope="col" rowspan="2" class="align-middle">Tahapan</th>
                    <th scope="col" rowspan="2" class="align-middle">Posisi (Penulis Utama/Penulis Lainnya)</th>
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
                            data-bs-target="#modalEditPengabdian_D"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- Akhir D --}}

{{-- TEMPAT MODAL TAMBAH KEGIATAN --}}
{{-- MULAI MODAL D --}}
<div class="modal fade modal-lg" id="modalpengabdian_D" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">D. Membuat/menulis karya pengabdian kepada masyarakat
                    dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah
                    diterbitkan dan ber – ISBN
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
                        <label class="form-label">Kategori</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tahapan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">Penulis Utama</option>
                            <option value="">Penulis Lainnya</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL D--}}


{{-- TEMPAT MODAL EDIT --}}
{{-- MULAI MODAL D --}}
<div class="modal fade modal-lg" id="modalEditPengabdian_D" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">D. Membuat/menulis karya pengabdian kepada masyarakat
                    dengan menulis 1 judul, direncanakan terbit ber ISBN, ada kontrak penerbitan dan atau sudah
                    diterbitkan dan ber – ISBN
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
                        <label class="form-label">Kategori</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tahapan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                            <option value=""></option>
                            <option value="">Penulis Utama</option>
                            <option value="">Penulis Lainnya</option>
                        </select>
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