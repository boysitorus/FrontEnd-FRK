@extends('Template.asesorFEDdetail')

@section('content-kegiatan')
<div class="container mt-3">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end m-2">
        <button class="btn btn-danger me-md-2" type="button">Download PDF</button>
    </div>
    <div class="card">
        <div class="card-header bg-primary">
            <span class="fs-4 fw-bold text-white">Riwayat Evaluasi Kerja</span>
        </div>
        <div class="card m-3 bg-primary-subtle">
            <div class="card-body">
                <h5 class="card-title">Keterangan : </h5>
                <ul>
                    <li> TM : TIdak Memenuhi</li>
                    <li> M : Memenuhi</li>
                </ul>
            </div>
        </div>
        <div class="m-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Kerja</th>
                            <th scope="col">Syarat</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
 