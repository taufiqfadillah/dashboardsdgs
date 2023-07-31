<div class="container-fluid">
    <div class="row mt-5">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Penanggung Jawab
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $proposal['full_name']; ?></h5>
                    <p class="card-text">Email : <?= $proposal['email']; ?></p>
                    <p class="card-text">Alamat : <?= $proposal['address']; ?></p>
                    <p class="card-text">Nomor HP : <?= $proposal['phone']; ?></p>
                    <p class="card-text">Jenis Kelamin : <?= $proposal['jeniskelamin']; ?></p>
                    <p class="card-text">Nomor Identitas : <?= $proposal['nomoridentitas']; ?></p>
                    <a href="<?= base_url(); ?>admin/proposal" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Kelompok Masyarakat
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $proposal['namakm']; ?></h5>
                    <p class="card-text">Email : <?= $proposal['emailkm']; ?></p>
                    <p class="card-text">Alamat : <?= $proposal['addresskm']; ?></p>
                    <p class="card-text">Nomor HP : <?= $proposal['phonekm']; ?></p>
                    <p class="card-text">Jenis Kelamin : <?= $proposal['jeniskelaminkt']; ?></p>
                    <p class="card-text">Nomor Identitas : <?= $proposal['nomoridentitaskm']; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Ketua
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $proposal['namakt']; ?></h5>
                    <p class="card-text">Email : <?= $proposal['emailkt']; ?></p>
                    <p class="card-text">Alamat : <?= $proposal['addresskt']; ?></p>
                    <p class="card-text">Nomor HP : <?= $proposal['phonekt']; ?></p>
                    <p class="card-text">Jenis Kelamin : <?= $proposal['jeniskelaminkt']; ?></p>
                    <p class="card-text">Nomor Identitas : <?= $proposal['nomoridentitaskt']; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Penerima Bantuan
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $proposal['namapb']; ?></h5>
                    <p class="card-text">Email : <?= $proposal['emailpb']; ?></p>
                    <p class="card-text">Alamat : <?= $proposal['addresspb']; ?></p>
                    <p class="card-text">Nomor HP : <?= $proposal['phonepb']; ?></p>
                    <p class="card-text">Jenis Kelamin : <?= $proposal['jeniskelaminpb']; ?></p>
                    <p class="card-text">Nomor Identitas : <?= $proposal['nomoridentitaspb']; ?></p>
                    <p class="card-text">Nomor Kartu Keluarga : <?= $proposal['nomorkkpb']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="text-center text-lg-start mt-5 mb-0">File Dokumen</h4>
    <hr class="mt-2 mb-5">

    <div class="row text-center text-lg-start">
        <div class="col-lg-2 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $fotoidentitas_path; ?>" alt="">
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $fotoidentitaskm_path; ?>" alt="">
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $fotoidentitaskt_path; ?>" alt="">
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $fotoidentitaspb_path; ?>" alt="">
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $fotokkpb_path; ?>" alt="">
            </a>
        </div>
        <?php foreach (explode(",", $proposal['filedokumentasi']) as $image) { ?>
            <div class="col-lg-2 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100 thumbnail" data-toggle="modal" data-target="#imageModal">
                    <img class="img-fluid img-thumbnail" style="height: 150px;" src="<?= $filedokumentasi_path . $image; ?>" alt="">
                </a>
            </div>
        <?php } ?>
        <div class="row mt-4 mb-4">
            <div class="col-lg-2 col-md-4 col-6">
                <a href="<?= $fileproposal_path; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Lihat File Proposal</a>
            </div>
        </div>
    </div>

    <!-- Modal for Image -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                </div>
                <div class="modal-body text-center">
                    <img src="" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <script>
        // Set modal image and title based on clicked thumbnail
        $(document).on('click', '.thumbnail', function() {
            var title = $(this).find('img').attr('alt');
            var src = $(this).find('img').attr('src');
            $('#imageModalLabel').text(title);
            $('#imageModal .modal-body img').attr('src', src);
            $('#imageModal').modal('show');
        });
    </script>
</div>