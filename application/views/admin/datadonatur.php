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
                Add New Data Donatur
            </span>
        </a>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Donatur</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datadonatur as $d) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $d['nama_donatur']; ?></td>
                        <td><?= $d['email']; ?></td>
                        <td><?= $d['jabatan']; ?></td>
                        <td><?= $d['instansi']; ?></td>
                        <td><?= $d['phone']; ?></td>
                        <td>
                            <?php
                            $is_active = $d['is_active'];
                            if ($is_active == 1) {
                            ?>
                                <a href="<?= base_url(); ?>admin/dataactive?sid=<?= $d['id']; ?>&sval=<?= $d['is_active']; ?>" class="mr-3 btn btn-circle btn-secondary" title="Deactive"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url(); ?>admin/dataactive?sid=<?= $d['id']; ?>&sval=<?= $d['is_active']; ?>" class=" mr-3 btn btn-circle btn-success" title="Active"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            }
                            ?>
                            <a href="<?= base_url(); ?>admin/editdata/<?= $d['id']; ?>" class="mr-3 btn btn-warning btn-icon-split">
                                <span class="icon text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                            <!-- Fitur Detail -->
                            <!-- <a href="<?= base_url(); ?>admin/detaildata/<?= $d['id']; ?>" class=" mr-3 btn btn-info btn-circle" title="Details">
                                <span class="icon text-white">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </a> -->
                            <a href="<?= base_url(); ?>admin/datadonaturdelete/<?= $d['id']; ?>" class="mr-3 btn btn-danger btn-icon-split buttom-delete" title="Delete">
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
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Data Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/datadonaturadd'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Nama Donatur" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No. Hp" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Donasi" required>
                        </div>
                    </div>
                    <!-- MaskMoney -->
                    <script>
                        $(document).ready(function() {
                            $('#jumlah').maskMoney({
                                thousands: '.',
                                decimal: ','
                            });
                        });
                    </script>
                    <div class="form-group">
                        <input type="text" class="form-control" id="MoU" name="MoU" placeholder="Surat MoU" required>
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