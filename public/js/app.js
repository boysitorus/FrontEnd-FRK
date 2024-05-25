// Fungsi untuk menampilkan file yang dipilih beserta ikonnya
function displayFilesWithIcons(files, selectedFilesId, selectedFiles) {
    var selectedFilesDiv = document.getElementById(selectedFilesId);
    // Menambahkan file-file yang baru dipilih ke dalam array file-file yang dipilih sebelumnya
    selectedFiles = selectedFiles.concat(Array.from(files));

    // Menghapus konten sebelumnya
    selectedFilesDiv.innerHTML = "";

    // Mengulangi semua file yang dipilih dan menampilkannya dengan ikon
    for (var i = 0; i < selectedFiles.length; i++) {
        var file = selectedFiles[i];
        if (!file) continue; // Lewati file yang telah dihapus

        var fileName = file.name;
        var fileExtension = fileName.split(".").pop(); // Dapatkan ekstensi file
        var fileIcon = getFileIcon(fileExtension); // Dapatkan ikon/gambar berdasarkan ekstensi file

        var fileListItem = document.createElement("div");
        fileListItem.classList.add(
            "file-item",
            "d-flex",
            "align-items-center",
            "mb-2",
            "border",
            "rounded",
            "p-3",
            "bg-abu"
        );

        // Tambahkan ikon/gambar
        var fileIconImg = document.createElement("img");
        fileIconImg.src = "/assets/img/" + fileIcon;
        fileIconImg.alt = "File Icon";
        fileIconImg.width = 30; // Sesuaikan lebar gambar sesuai kebutuhan
        fileListItem.appendChild(fileIconImg);

        // Tambahkan nama file
        var fileNameSpan = document.createElement("span");
        fileNameSpan.classList.add('ms-2');
        fileNameSpan.textContent = fileName;
        fileListItem.appendChild(fileNameSpan);

        // Buat elemen div untuk tombol hapus
        var divDelete = document.createElement('div');
        divDelete.style.marginLeft = 'auto';

        // Tambahkan tombol hapus
        // var deleteBtn = document.createElement("button");
        // deleteBtn.classList.add(
        //     "btn",
        //     "btn-danger",
        //     "btn-sm",
        //     "btn-circle",
        //     "ms-2"
        // );
        // deleteBtn.innerHTML = '<i class="bi bi-x"></i>';
        // deleteBtn.addEventListener(
        //     "click",
        //     (function (fileToRemove) {
        //         return function () {
        //             // Hapus file dari array file-file yang dipilih

        //             var index = selectedFiles.indexOf(fileToRemove);
        //             if (index > -1) {
        //                 selectedFiles.splice(index, 1);
        //             }
        //             // Hapus elemen file dari tampilan
        //             this.parentElement.parentElement.remove();
        //         };
        //     })(file)
        // ); // Closure untuk menyimpan file yang benar

        // // Tambahkan tombol hapus ke dalam divDelete
        // divDelete.appendChild(deleteBtn);
        // // Tambahkan divDelete ke dalam fileListItem
        // fileListItem.appendChild(divDelete);

        selectedFilesDiv.appendChild(fileListItem);
    }
}

function getFileIcon(extension) {
    switch (extension.toLowerCase()) {
        case "pdf":
            return "pdf.png";
        case "doc":
        case "docx":
            return "word.png";
        case "xls":
        case "xlsx":
            return "sheets.png";
        case "png":
        case "jpg":
        case "jpeg":
            return "photo.png";
        default:
            return "document.png";
    }
}
