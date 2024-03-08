@extends('Template.rencana')


@section('content')

{{-- TAMPILAN BAGIAN PENDIDIKAN --}}

{{-- BAGIAN A --}}
<div class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
    <div class="card-body">
        <h6><b>A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap  setiap kelompok</b></h6>
        <hr/>

        <div class="row justify-content-end mr-0">
            <button id="btnFrkPenelitianA" type="button" class="btn btn-success col-md-auto m-3" data-bs-toggle="modal" data-bs-target="#myModal">
                Tambah Kegiatan
            </button>
        </div>

        <div class="text-sm">
            <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
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
                        <td></td>
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
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- AKHIR BAGIAN A --}}




{{-- TEMPAT MODAL --}}

{{-- MULAI MODAL A --}}
<div class="modal fade modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">A. Kuliah (Teori) pada tingkat Diploma dan S1 terhadap  setiap kelompok</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kelas Tatap Muka</label>
                        <input class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Jumlah Kelas Evaluasi</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS Mata Kuliah</label>
                        <input class="form-control" id="email">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL A --}}


@endsection