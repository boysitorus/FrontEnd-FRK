@extends('Template.rencana')


@section('content-penelitian')

<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>
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
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
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
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
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
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan tercatat)</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                    <button id="btnFrkPenelitianB" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>
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
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_A"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
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
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#modalEditPenelitian_B"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen  yang sesuai dengan bidang ilmu dan tidak diterbitkan,  tetapi digunakan oleh mahasiswa</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianG" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

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
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
                <div class="card-body">
                    <h5><b>H. PEKERTI/AA</b></h5>
                    <hr/>

                    <div class = "row justify-content-end mr-0">
                        <button id="btnFrkPenelitianH" type="button" class="btn btn-success col-md-auto mt-2 mb-2">Tambah Kegiatan</button>

                    </div>

                    <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">SKS Terhitung</th>
                                <th scope="col" colspan="2">Status</th>
                                <th scope="col" rowspan="2" class="align-middle" style="width:100px;">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Asesor 1</th>
                                <th scope="col">Asesor 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Lorem ipsum dolor sit amet consectetur. Semper gravida purus magna pellentesque mauris elit arcu pharetra.</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <img src="{{ asset('assets/icon/Vectoredit.svg') }}" alt="edit"/>
                                    </a>
                                    <a>
                                        <img src="{{ asset('assets/icon/Vectordelete.svg') }}" alt="delete"/>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

@endsection


{{-- TEMPAT MODAL TAMBAH KEGIATAN--}}

{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="modalPenelitian_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</h6>
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
{{-- AKHIR MODAL A --}}


{{-- MULAI MODAL B --}}
<div class="modal fade modal-lg" id="modalPenelitian_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">B. Pelaksanaan penelitian mandiri atau pembuatan karya seni atau teknologi (disetujui oleh pimpinan dan tercatat)</h6>
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


{{-- TEMPAT MODAL EDIT CONFIRM --}}
<div class="modal fade" id="modalEditConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-x-circle text-danger"></i></h1>
                <h5>Yakin untuk menghapus kegiatan ini?</h5>
                <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'</p>
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
        setTimeout(function () {
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
        setTimeout(function () {
            $('#deleteToast').removeClass('show');
        }, 3000); // 3000 milidetik (3 detik) disesuaikan dengan durasi animasi toast
    }
</script>
