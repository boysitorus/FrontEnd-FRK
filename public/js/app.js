function uploadFiles(formId, buttonId) {
    const form = document.getElementById('uploadForm-D');
    const formData = new FormData(form);

    fetch("{{ url('http://localhost:9003/api/penelitian/buku-internasional') }}", {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Handle response from server
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
}

