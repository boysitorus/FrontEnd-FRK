@extends('Template.dosen')

@section('content-riwayat')

<div class="dosen-riwayatsaya-content" class="ml-2 mr-2 pt-4 mb-3">

    <div class="text-sm mt-5">
        <table id="tahunajaran" 
            class="table table-striped table -bordered mt-2 text-center border-secondary-subtle align-middle"
            style="border: 2px;">
        <thead>
            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No</th>
            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Tahun Ajaran</th>
            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Periode Semester</th>
            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Aksi</th>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>2023/2024</td>
                <td>Ganjil</td>
                <td><a href="#"><button type="button" class="btn btn-primary mr-1">View Detail</button></a></td>
            </tr>

            <tr>
                <td>1</td>
                <td>2023/2024</td>
                <td>Genap</td>
                <td><a href="#"><button type="button" class="btn btn-primary mr-1">View Detail</button></a></td>
            </tr>
        </tbody>
        </table>
    </div>
</div>

@endsection