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
                            <th scope="col" rowspan="2" class="align-middle">Jabatan Struktural</th>
                            <th scope="col" rowspan="2" class="align-middle">Status Assign</th>
                        </tr>

                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td>1</td>
                            <td>Rektor</td>
                            <td>Button Assesor
                        <tr>
                            <td>2</td>
                            <td>Wakil Rektor I</td>
                            <td>Button Assesor</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Wakil Rektor II</td>
                            <td>Button</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Wakil Rektor III</td>
                            <td>Button Assign sebagai assesor</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Dekan</td>
                            <td>Button Assign sebagai assesor</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Ketua Program Studi</td>
                            <td>Button Assign sebagai assesor</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dosen Biasa</td>
                            <td>Button Assesor</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Dosen Biasa</td>
                            <td>Button Assesor</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Dosen Biasa</td>
                            <td>Button Assesor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div>

@endsection
