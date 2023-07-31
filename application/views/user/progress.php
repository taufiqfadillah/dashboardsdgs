<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <form id="uploadForm" action="<?= base_url('user/progressadd'); ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group col-3 mb-3">
            <input type="file" class="form-control" id="image" name="image[]" accept=".jpg,.jpeg,.png" multiple>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman langsung

        var formData = new FormData(this); // Membuat objek FormData

        // Mengirim data ke fungsi user/progressadd menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', this.action, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Mengambil respons dari server
                    var response = xhr.responseText;
                    console.log(response);
                    showAlert('success', 'File berhasil diupload'); // Menampilkan notifikasi sukses
                } else {
                    showAlert('error', 'Terjadi kesalahan saat upload file'); // Menampilkan notifikasi error
                }
                resetForm(); // Mereset form setelah upload selesai
            }
        };

        // Mengecek apakah ada file yang dipilih sebelum mengirimkan data
        var files = document.getElementById('image').files;
        if (files.length === 0) {
            showAlert('error', 'Pilih minimal satu file'); // Menampilkan notifikasi error jika tidak ada file dipilih
            return;
        }

        xhr.send(formData);
    });

    // Fungsi untuk menampilkan notifikasi
    function showAlert(type, message) {
        var flashDataElement = document.querySelector('.flash-data');
        flashDataElement.setAttribute('data-flashdata', message);
        flashDataElement.setAttribute('data-flashdata-type', type);
    }

    // Fungsi untuk mereset form
    function resetForm() {
        document.getElementById('image').value = '';
    }
</script>
</div>