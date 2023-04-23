<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <?php foreach ($datadonatur as $d) { ?>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $d['id']; ?>">
                    <div class="form-group">
                        <label for="edit-datakerjasama">Nomor MoU</label>
                        <input type="text" class="form-control" id="edit-datakerjasama" name="edit-datakerjasama" placeholder="Nomor MoU" value="<?= $d['MoU']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            <?php } ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
</div>
</div>