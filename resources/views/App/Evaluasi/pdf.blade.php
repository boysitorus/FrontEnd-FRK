<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kerja</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 7mm;
        }

        body {
            margin: 0;
        }

        .custom-container {
            padding-left: 10mm;
            padding-right: 10mm;
        }
    </style>
</head>
<body>

<div class="mt-4">
    <h4 class="font-weight-bold">Rekap Kerja - Semester 2023/2024 Genap</h4>
    <hr />
    
    <div class="alert alert-info mt-2 ml-1 mr-1 mb-6 bg-alert-info" role="alert">
        <h5> <b> <u> Profil dosen </u> </b> </h5>
        <p><b>Wilona Diva Artha Simbolon S.Kom</b></p>
        <p>12AS356</p>
        <p>Dosen Fakultas Informatika dan Teknik Elektro</p>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><strong>Simpulan Evaluasi Diri</strong></h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-left" style="width: 5%;">No</th>
                        <th colspan="2" class="text-left" style="width: 40%;">Jenis Kinerja</th>
                        <th class="text-center">SKS Terhitung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">1</td>
                        <td colspan="2" class="text-left">Pelaksanaan Pendidikan</td>
                        <td class="text-center">{{ $pendidikanSks }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">2</td>
                        <td colspan="2" class="text-left">Pelaksanaan Penelitian</td>
                        <td class="text-center">{{ $penelitianSks }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">3</td>
                        <td colspan="2" class="text-left">Pelaksanaan Pengabdian</td>
                        <td class="text-center">{{ $pengabdianSks }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">4</td>
                        <td colspan="2" class="text-left">Pelaksanaan Penunjang</td>
                        <td class="text-center">{{ $penunjangSks }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center bg-info"><strong>Total Kinerja</strong></td>
                        <td class="text-left bg-info"></td>
                        <td class="text-center bg-info">{{ $totalSks }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
