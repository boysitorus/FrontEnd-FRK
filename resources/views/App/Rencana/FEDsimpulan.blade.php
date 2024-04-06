@extends('Template.FEDsimpulan')

@section('content-FEDsimpulan')

<div class="container d-flex justify-content-end mr-1 ">
    <button class="btn btn-danger">Download PDF</button>
</div>

<div id="simpulan-card" class="card border-primary shadow-sm mt-5 ml-1 mr-1 bg-card ">
    <div class="card-header bg-primary">
        <h6 style="color: white"><b>Simpulan rencana kerja</b></h6>
    </div>
    <div class="card-body">
        <!-- <hr /> -->

        <div style="border: 1px solid black; padding: 10px; background-color: #DFF5FF; color: #008DDA; margin-bottom:50px">
            <p><strong>Keterangan:</strong></p>
            <ul>
                <li><strong>TM:</strong> Tidak Memenuhi </li>
                <li><strong>M:</strong> Memenuhi Keterangan</li>
            </ul>
        </div>

        <div class="text-sm">
            <table id="simpulan" class="table table-striped mt-2 text-center outer-border-only-table">
            <!-- <table id="simpulan" class="table table-striped mt-2 text-center" style="border: 2px;"> -->
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle fw-bold " style=" text-align: middle;" >No.</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-3"  style=" text-align: middle;" >Jenis Kinerja</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: middle;" >Syarat</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold" style=" text-align: middle;" >Filter By<select class="sort-option"><option value="">Show All</option></select></th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">sks Lebih</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Status</th>
                        <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Lampiran</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  >1</td>
                        <td  style=" text-align: middle;">Pelaksanaan Pendidikan </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <td style=" text-align: middle;"><strong>T.A 2023/2024</strong></td>
                        <td>3.5</td>
                        <td style="color: green">M</td>
                          <td><button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color:#008DDA; color: #fff; border-radius: 5px;" data-bs-toggle="modal"
                                    data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">2</td>
                        <td  style=" text-align: middle;">Pelaksanaan Penelitian </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <td style=" text-align: middle;"><strong>T.A 2023/2024</strong></td>
                        <td>0</td>
                        <td style="color: green">M</td>
                          <td><button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color:#008DDA; color: #fff; border-radius: 5px;" data-bs-toggle="modal"
                                    data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">3</td>
                        <td  style=" text-align: middle;">Pelaksanaan Pengabdian </td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <td style=" text-align: middle;"><strong>T.A 2022/2023</strong></td>
                        <td>0</td>
                        <td style="color: green">M</td>
                          <td><button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color:#008DDA; color: #fff; border-radius: 5px;" data-bs-toggle="modal"
                                    data-bs-target="#liha">Lihat</button></td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td scope="row"  style=" text-align: middle;">4</td>
                        <td  style=" text-align: middle;">Pelaksanaan Penunjang</td>
                        <td style=" text-align: middle;">Tidak Boleh Kosong</td>
                        <td style=" text-align: middle;"><strong>T.A 2022/2023</strong></td>
                        <td>0</td>
                        <td style="color: red">TM</td>
                          <td><button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color:#008DDA; color: #fff; border-radius: 5px;" data-bs-toggle="modal"
                                    data-bs-target="#liha">Lihat</button></td>
                    </tr>
    </table>
    <table id="simpulan2" class="table table-borderless">
    <!-- <table class="table table-striped table-bordered mt-2 text-center table-bordered" style="border: 2px;"> -->
                <tbody class="align-middle">
                <tr>
                <td colspan="2" style="text-align: left;"><i><strong>Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</strong></i></td>
                        <td style=" text-align: left;"><i><strong>Minimal 9 sks</strong></i></td>
                        <td><i>3.5</i></td>
                        <td style="color: green"><i>M</i></td>

                    </tr>
                </tbody>

                <tbody class="align-middle" >
                <tr >
                <td colspan="2" style="text-align: left;"><i><strong>Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</i></strong></td>
                        <td style="text-align: left;"><i><strong>Minimal 9 sks</i></strong></td>
                        <td><i>0</i></td>
                        <td style="color: green"><i>M</i></td>

                    </tr>
                </tbody>
                <tbody class="align-middle" >
                <tr style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="2" style="text-align: left; background-color: #DFF5FF;" ><strong>Total Kinerja</strong></td>
                        <td style=" text-align: left; background-color: #DFF5FF;">Minimal 12 sks dan maksimal 16 sks</td>
                        <td style="background-color: #DFF5FF; ">0</td>
                        <td style="color: red; background-color: #DFF5FF;">TM</td>
                            
                    </tr>
                </tbody>
            </table>
            

            
            
            <!-- Add some distance from the table -->
            <div style="margin-top: 100px;"></div>
        </div>

    </div>

    
    </div>


        <div style="margin-top: 150px; border-bottom: 2px solid black; "></div>
        </div>

      <!-- Kembali button with back icon -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: gray; color: #fff;" >
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Simpan Permanen button with save icon -->
            <button style="margin-top: 10px; font-size: 16px; font-weight: bold; background-color: #005b96;  color: #fff;" >
                <i class="fas fa-save"></i> Simpan Permanen
            </button>
        </div>
    </div>
    </div>

    <div style="margin-top: 30px; "></div>
        </div>

    </div>

    </div>



</div>


@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
  const sortOptions = document.querySelectorAll("#simpulan .sort-option");

  sortOptions.forEach(select => {
    select.addEventListener("change", filterTable);
    updateOptions(select);
    // Set default option to "Descending" and trigger the change event
    select.value = "desc";
    select.dispatchEvent(new Event("change"));
  });

  function filterTable(event) {
    const column = event.target.closest("th").cellIndex;
    const value = event.target.value;

    const rows = document.querySelectorAll("#simpulan tbody tr");

    rows.forEach(row => {
      const cellValue = row.cells[column].innerText.trim();
      if (value === "" || cellValue === value) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  }

  function updateOptions(select) {
    const columnIndex = select.parentElement.cellIndex;
    const values = new Set();
    const rows = document.querySelectorAll("#simpulan tbody tr");

    rows.forEach(row => {
      const value = row.cells[columnIndex].innerText.trim();
      values.add(value);
    });

    // Clear previous options
    select.innerHTML = '';

    // Add the special option to show all options
    const allOption = document.createElement('option');
    allOption.value = "";
    allOption.textContent = "Show All";
    select.appendChild(allOption);

    // Add unique values as options
    values.forEach(value => {
      if (value !== "") { // Skip empty values
        const option = document.createElement('option');
        option.value = value;
        option.textContent = value;
        select.appendChild(option);
      }
    });

    // Ensure the initially selected option exists in the updated options
    const selectedValue = select.value;
    if (!values.has(selectedValue)) {
      // If the selected value is not present anymore, select the empty option to show all
      select.value = '';
    }
  }
});


</script>








