@extends('Template.generate')

@section('content-generate')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
  <div class="container mt-2 ml-0 mt-5 mb-4">
    <div class="row">
      <div class="col mr-2">
        <h6 style="font-weight: bold;">Tanggal Awal Periode Pengisian Rencana Kerja</h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="tanggal-awal-rencana-kerja" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('tanggal-awal-rencana-kerja')"><i class="fas fa-times"></i></button> 
          </div>
        </div>
      </div>
      <div class="col">
        <h6 style="font-weight: bold;">Tanggal Akhir Periode Pengisian Rencana Kerja</h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="tanggal-akhir-rencana-kerja" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('tanggal-akhir-rencana-kerja')"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-2 ml-0 mt-5 mb-4">
    <div class="row">
      <div class="col mr-2">
        <h6 style="font-weight: bold;">Periode Awal Approval oleh Asesor I</h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="periode-awal-asesor-i" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('periode-awal-asesor-i')"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
      <div class="col">
        <h6 style="font-weight: bold;">Periode Akhir Approval oleh Asesor I </h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="periode-akhir-asesor-i" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('periode-akhir-asesor-i')"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-2 ml-0 mt-5 mb-4">
    <div class="row">
      <div class="col mr-2">
        <h6 style="font-weight: bold;">Periode Awal Approval oleh Asesor II</h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="periode-awal-asesor-ii" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('periode-awal-asesor-ii')"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
      <div class="col">
        <h6 style="font-weight: bold;">Periode Akhir Approval oleh Asesor II</h6>
        <div class="input-group date">
          <input type="date" class="form-control date-input" id="periode-akhir-asesor-ii" placeholder="dd/mm/yyyy">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary clear-date" type="button" onclick="clearDate('periode-akhir-asesor-ii')"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container ml-0 mt-5 mb-5">
    <button class="btn btn-success mr-2 ml-0">Generate</button>
    <button class="btn btn-danger ">Cancel</button>
  </div>
 
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  
  <script>
    function clearDate(id) {
      document.getElementById(id).value = '';
    }
  </script>
</body>
</html>

@endsection
