<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>


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
                        <td><?= date('d F Y', strtotime($p['date_created'])); ?></td>
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

    <div class="row mt-3" style="font-size: 13px;">
        <p style="color: crimson;"><em>Keterangan:</em></p>
        <p><em> Proposal Diterima/Terkirim : </em>
            <i class="fas fa-circle" style="color: #005eff;"></i>
        </p>
        <p><em> Proposal Tervalidasi : </em>
            <i class="fas fa-circle" style="color: #F6C269;"></i>
        </p>
        <p><em> Proposal Sukses : </em>
            <i class="fas fa-circle" style="color: #1CC88A;"></i>
        </p>
        <p><em> Proposal Gagal Tervalidasi : </em>
            <i class="fas fa-circle" style="color: #717384;"></i>
        </p>
    </div>

</div>

</div>
<!-- End of Main Content -->