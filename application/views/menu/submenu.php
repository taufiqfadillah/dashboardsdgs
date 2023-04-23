<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row box-body table-responsive">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif ?>

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <div class="col-auto mb-2">
                <a href="" class="btn btn-sm btn-primary btn-icon-split mb-2" data-toggle="modal" data-target="#newSubMenuModal">
                    <span class="icon">
                        <i class="fas fa-folder-plus"></i>
                    </span>
                    <span class="text">
                        Add New Submenu
                    </span>
                </a>
            </div>
            <!-- Table -->
            <table class="table table-bordered" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td class="text-center"><i class="<?= $sm['icon']; ?>"></i></td>
                            <td><?= $sm['is_active'] ? 'Active' : 'Deactive'; ?></td>
                            <td>
                                <?php
                                $is_active = $sm['is_active'];
                                if ($is_active == 1) {
                                ?>
                                    <a href="<?= base_url(); ?>menu/active?sid=<?= $sm['id']; ?>&sval=<?= $sm['is_active']; ?>" class="mr-2 btn btn-circle btn-secondary" title="Deactive"><i class="fa fa-fw fa-power-off"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= base_url(); ?>menu/active?sid=<?= $sm['id']; ?>&sval=<?= $sm['is_active']; ?>" class=" mr-2 btn btn-circle btn-success" title="Active"><i class="fa fa-fw fa-power-off"></i></a>
                                <?php
                                }
                                ?>
                                <a href="<?= base_url('menu/editsubmenu/') . $sm['id']; ?>" class=" mr-2 btn btn-success btn-icon-split">
                                    <span class="icon text-white-50" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('menu/deletesubmenu/') . $sm['id']; ?>" class="btn btn-danger btn-icon-split buttom-delete">
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
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