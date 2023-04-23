<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Card Status Pengajuan Proposal -->
    <!-- <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-10 mt-5">
            <div class="card card-stepper" style="border-radius: 10px;">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <span class="lead fw-normal">Status Pengajuan Proposal</span>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Proposal Details</button>
                        </div>
                    </div>
                    <hr class="my-4"> -->

    <!-- dot and label -->
    <!-- <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                        <span class="d-flex justify-content-center align-items-center big-dot dot">
                            <i class="fa fa-check text-white"></i>
                        </span>
                        <hr class="flex-fill track-line">
                        <span class="d-flex justify-content-center align-items-center big-dot dot">
                            <i class="fa fa-check text-white"></i>
                        </span>
                        <hr class="flex-fill track-line">
                        <span class="d-flex justify-content-center align-items-center big-dot dot">
                            <i class="fa fa-check text-white"></i>
                        </span>
                        <hr class="flex-fill track-deactive">
                        <span class="d-flex justify-content-center align-items-center dot-deactive"></span>
                        <hr class="flex-fill track-deactive">
                        <span class="d-flex justify-content-center align-items-center dot-deactive"></span>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                        <div class="d-flex flex-column align-items-start dot-label">
                            <span><?= date('d F Y', strtotime('-5 day')); ?></span>
                            <span>Proposal Diterima</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center dot-label">
                            <span><?= date('d F Y', strtotime('-2 day')); ?></span>
                            <span>Validasi Proposal</span>
                        </div>
                        <div class="d-flex flex-column align-items-center dot-label">
                            <span><?= date('d F Y'); ?></span>
                            <span>SDGs Universitas Hasanuddin</span>
                        </div>
                        <div class="d-flex flex-column align-items-center dot-label">
                            <span><?= date('d F Y', strtotime('+7 day')); ?></span>
                            <span>Pihak Donatur</span>
                        </div>
                        <div class="d-flex flex-column align-items-end dot-label">
                            <span><?= date('d F Y', strtotime('+8 day')); ?></span>
                            <span>Proposal Sukses</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <?= $this->session->flashdata('message'); ?>
    <!-- Tabel Proposal -->
    <div class="box-body table-responsive mt-5">
        <table class="table table-bordered" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Penerima Bantuan</th>
                    <th scope="col">Pengajuan Proposal</th>
                    <th scope="col">Status Proposal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($proposal as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['full_name']; ?></td>
                        <td><?= $p['email']; ?></td>
                        <td><?= $p['address']; ?></td>
                        <td><?= $p['phone']; ?></td>
                        <td><?= $p['namapb']; ?></td>
                        <td><?= date('d F Y', $p['date_created']); ?></td>
                        <td class="text-center">
                            <?php
                            $status = $p['status'];
                            if ($status == 1) {
                                echo '<span class="badge badge-primary">Diterima</span>';
                            } elseif ($status == 2) {
                                echo '<span class="badge badge-warning">Proses...</span>';
                            } elseif ($status == 3) {
                                echo '<span class="badge badge-success">Sukses</span>';
                            } else {
                                echo '<span class="badge badge-danger">Gagal Tervalidasi</span>';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



</div>

<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div> -->

</div>
<!-- End of Main Content -->