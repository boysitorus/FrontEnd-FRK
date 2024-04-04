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
    <h5 style="font-weight: bold;">Tanggal Periode Pengisian</h5>
    <div class="input-group date">
      <input type="date" class="form-control date-input">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-times"></i></button> 
      </div>
    </div>
  </div>

  <div class="container mt-2 ml-0 mt-5 mb-4">
    <h5 style="font-weight: bold;">Periode Approval Kaprodi</h5>
    <div class="input-group date">
      <input type="date" class="form-control date-input">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>

  <div class="container mt-2 ml-0 mt-5 mb-4">
    <h5 style="font-weight: bold;">Periode Approval Dekan</h5>
    <div class="input-group date">
      <input type="date" class="form-control date-input">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>
  
  <div class="container ml-0 mt-5 mb-5">
    <button class="btn btn-success mr-2">Generate</button>
    <button class="btn btn-danger">Cancel</button>
  </div>
 
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>

@endsection
