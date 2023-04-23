<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <?php foreach ($datakelompok as $km) { ?>
                <form action="<?= base_url('admin/editkelompok/' . $km['id']); ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_kelompok">Nama Kelompok Masyarakat</label>
                        <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" placeholder="Nama Kelompok Masyarakat" value="<?= $km['nama_kelompok']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ketua">Nama Ketua</label>
                        <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" value="<?= $km['ketua']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $km['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $km['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">No. HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No. HP" value="<?= $km['phone']; ?>">
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