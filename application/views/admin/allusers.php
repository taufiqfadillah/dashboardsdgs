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
                Add New User
            </span>
        </a>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Akses Proposal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($allusers as $a) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $a['name']; ?></td>
                        <td><?= $a['email']; ?></td>
                        <td>
                            <!-- <?= $a['role_id'] ? 'admin' : 'user'; ?> -->
                            <?php if ($a["role_id"] == 1) : ?>
                                <span>admin</span>
                            <?php else : ?>
                                <span>user</span>
                            <?php endif ?>
                        </td>
                        <td><?= $a['is_active'] ? 'Active' : 'Deactive'; ?></td>
                        <td><?= date('d F Y', $a['date_created']); ?></td>
                        <td><?php
                            $proposal_access = $a['proposal_access'];
                            if ($proposal_access == 0) {
                            ?>
                                <a href="<?= base_url(); ?>admin/proposalaccess?sid=<?= $a['id']; ?>&sval=<?= $a['proposal_access']; ?>" class="mr-3 btn btn-circle btn-success" title="Active"><i class="fa fa-fw fa-check"></i></a>Memiliki Akses
                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url(); ?>admin/proposalaccess?sid=<?= $a['id']; ?>&sval=<?= $a['proposal_access']; ?>" class=" mr-3 btn btn-circle btn-secondary" title="deactive"><i class="fa fa-fw fa-check"></i></a>Tidak Memilik Akses
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $is_active = $a['is_active'];
                            if ($is_active == 1) {
                            ?>
                                <a href="<?= base_url(); ?>admin/active?sid=<?= $a['id']; ?>&sval=<?= $a['is_active']; ?>" class="mr-3 btn btn-circle btn-secondary" title="Deactive"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url(); ?>admin/active?sid=<?= $a['id']; ?>&sval=<?= $a['is_active']; ?>" class=" mr-3 btn btn-circle btn-success" title="Active"><i class="fa fa-fw fa-power-off"></i></a>
                            <?php
                            }
                            ?>
                            <a href="<?= base_url(); ?>admin/detail/<?= $a['id']; ?>" class=" mr-3 btn btn-info btn-circle" title="Details">
                                <span class="icon text-white">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>admin/allusersdelete/<?= $a['id']; ?>" class="btn btn-danger btn-icon-split buttom-delete" title="Delete">
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
    <div class="row mt-3" style="font-size: 13px;">
        <p style="color: crimson;"><em>Catatan!</em></p>
        <p><em> Akses proposal hanya berlaku kepada role user. </em>
        </p>
        <p><em> Default : Setiap pengguna (user) hanya memiliki satu akses proposal. </em>
        </p>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->

<!-- Modal Add User -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/allusersadd'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Role</option>
                            <option value="1">admin</option>
                            <option value="2">user</option>
                        </select>
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