@extends('Template.semester')

@section('content-semester')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

{{-- TOAST --}}
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <i class="bi bi-check2-circle"></i>
            <ul id="success-toast-messages">
            </ul>
        </div>
    </div>
    <div id="errorToast" class="toast bg-danger-subtle" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <i class="bi bi-x-circle"></i>
            <ul id="error-toast-messages">
            </ul>
        </div>
    </div>
</div>

<div class="container mt-2 ml-0 mt-5 mb-4">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered mt-2 text-center border-secondary-subtle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td>1</td>
                        <td>Semester Genap 2022/2023</td>
                        <td>Belum Selesai</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalEditPendidikan"><i
                                    class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Semester Ganjil 2023/2024</td>
                        <td>Sudah Selesai</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalEditPendidikan"><i
                                    class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Semester Genap 2023/2024</td>
                        <td>Sudah Selesai</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalEditPendidikan"><i
                                    class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successToastElement = document.getElementById('successToast');
        var errorToastElement = document.getElementById('errorToast');
        var successToast = new bootstrap.Toast(successToastElement);
        var errorToast = new bootstrap.Toast(errorToastElement);

        @if ($errors->any())
            // Display error messages
            var errorMessages = @json($errors->all());
            var errorToastMessagesContainer = document.getElementById('error-toast-messages');
            errorMessages.forEach(function(message) {
                var li = document.createElement('li');
                li.textContent = message;
                li.style.listStyleType = 'none';
                errorToastMessagesContainer.appendChild(li);
            });
            errorToast.show();
        @elseif (session('success'))
            // Display success messages
            var successMessage = '{{ session('success') }}';
            var successToastMessagesContainer = document.getElementById('success-toast-messages');
            var li = document.createElement('li');
            li.textContent = successMessage;
            li.style.listStyleType = 'none';
            successToastMessagesContainer.appendChild(li);
            successToast.show();
        @endif

        // Remove 'show' class after a few seconds (adjust to match toast animation duration)
        setTimeout(function() {
            successToastElement.classList.remove('show');
            errorToastElement.classList.remove('show');
        }, 15000); // 15000 milliseconds (15 seconds)
    });
</script>

</body>
</html>

@endsection
