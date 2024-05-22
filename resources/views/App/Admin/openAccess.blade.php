@extends('Template.admin')

@section('content')

    <div class = "mt-5 flex-wrap ml-4 mr-4 ">
        <div class = "row">
            <div class = "col">
                <h3 class = "font-weight-bold">Rekap Kegiatan</h3>
                <h7 class = "font-weight-medium">Administrator</h7>
            </div>
            <div class = "col-md-auto">
                <div class="alert alert-info alert-sm bg-alert-info" role="alert">
                    <p class = "mb-0 font-weight-bold"> Peran saat ini  :  Administrator  </p>
                </div>
            </div>
        </div>

        <div class = "bg-white mt-2">
            <div class = "ml-2 mr-2 pt-4">
                <h4 class = "font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
            </div>
            <hr/>


            <div class="mt-5 ml-1 mr-1">
                <table class="table table-striped table-bordered mt-2 text-center" style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle">No.</th>
                            <th scope="col" rowspan="2" class="align-middle">Nama Dosen</th>
                            <th scope="col" rowspan="2" class="align-middle">NIDN</th>
                            <th scope="col" rowspan="2" class="align-middle">Program Studi</th>
                            <th scope="col" rowspan="2" class="align-middle">Akses</th>
                        </tr>

                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td>1</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Wilona Diva Artha Simbolon S.Kom </td>
                            <td>12AS3456</td>
                            <td>Informatika</td>
                            <td>Button Akses</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div>

@endsection
