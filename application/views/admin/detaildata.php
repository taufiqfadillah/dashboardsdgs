<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					Detail Data User
				</div>
				<div class="card-body">
					<h5 class="card-title">Name : <?= $datadonatur['nama_donatur']; ?></h5>
					<p class="card-text">Email : <?= $datadonatur['email']; ?></p>
					<h6 class="card-subtitle mb-2 text-muted">Status : <?php if ($datadonatur["is_active"] == 1) : ?>
							<span>Active</span>
						<?php else : ?>
							<span>Deactive</span>
						<?php endif ?>
					</h6>
					<p class="card-text">Date Created : <?= date('d F Y', $datadonatur['date_created']); ?></p>
					<a href="<?= base_url(); ?>admin/datadonatur" class="btn btn-primary">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</div>