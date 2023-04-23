<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <?php foreach ($datadonatur as $d) { ?>
                <form action="<?= base_url('admin/editdatadonasi/' . $d['id']); ?>" method="POST">
                    <div class="form-group">
                        <label for="date_created">Tanggal Donasi</label>
                        <input type="date" class="form-control" id="date_created" name="date_created" value="<?= $d['date_created']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Donasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Donasi" value="<?= $d['jumlah']; ?>">
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