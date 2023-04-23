<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <?php foreach ($datadonatur as $d) { ?>
                <form action="<?= base_url('admin/editdata/' . $d['id']); ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_donatur">Nama Donatur</label>
                        <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Nama Donatur" value="<?= $d['nama_donatur']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $d['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= $d['jabatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="<?= $d['instansi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">No. HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No. HP" value="<?= $d['phone']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Edit</button>
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