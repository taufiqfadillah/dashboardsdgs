<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <?= $this->session->flashdata('message'); ?> -->

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="col-auto mb-2">
        <a href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#newUserModal">
            <span class="icon">
                <i class="fa fa-user-plus"></i>
            </span>
            <span class="text">
                Add New Data Kelompok Masyarakat
            </span>
        </a>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">Ketua</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Bergabung Sejak</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datakelompok as $km) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $km['nama_kelompok']; ?></td>
                        <td><?= $km['ketua']; ?></td>
                        <td><?= $km['email']; ?></td>
                        <td><?= $km['phone']; ?></td>
                        <td><?= $km['alamat']; ?></td>
                        <td><?= date('d F Y', $km['date_created']); ?></td>
                        <td><?= $km['is_active'] ? 'Active' : 'Deactive'; ?></td>
                        <td>
                            <?php
                            $is_active = $km['is_active'];
                            if ($is_active == 1) {
                            ?>
                                <a href="<?= base_url(); ?>admin/kelompokactive?sid=<?= $km['id']; ?>&sval=<?= $km['is_active']; ?>" class="mr-3 btn btn-circle btn-secondary" title="Deactive"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url(); ?>admin/kelompokactive?sid=<?= $km['id']; ?>&sval=<?= $km['is_active']; ?>" class=" mr-3 btn btn-circle btn-success" title="Active"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            }
                            ?>
                            <a href="<?= base_url(); ?>admin/editkelompok/<?= $km['id']; ?>" class="mr-3 btn btn-warning btn-icon-split">
                                <span class="icon text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>admin/kelompokdelete/<?= $km['id']; ?>" class="btn btn-danger btn-icon-split buttom-delete" title="Delete">
                                <span class="icon text-white">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add User -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Data Kelompok Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kelompokadd'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" placeholder="Enter Name..">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No. HP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>