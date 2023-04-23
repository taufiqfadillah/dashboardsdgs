<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


            <div class="col-auto">
                <a href="" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newRoleModal">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Add New Role
                    </span>
                </a>
            </div>
            <!-- Table -->
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th width="7%" scope="col">No</th>
                        <th width="55%" scope="col">Role</th>
                        <th class="text-center" width="38%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td>
                                <?= $r['role']; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50" title="Access">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/editrole/') . $r['id']; ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </span>

                                </a>
                                <a href="<?= base_url('admin/deleterole/') . $r['id']; ?>" class="btn btn-danger btn-icon-split buttom-delete">
                                    <span class="icon text-white-50" title="Delete">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>