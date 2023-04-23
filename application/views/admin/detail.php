<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					Detail Data User
				</div>
				<div class="card-body">
					<h5 class="card-title">Name : <?= $user['name']; ?></h5>
					<p class="card-text">Email : <?= $user['email']; ?></p>
					<h6 class="card-subtitle mb-2 text-muted">Role : <?php if ($user["role_id"] == 1) : ?>
							<span>admin</span>
						<?php else : ?>
							<span>user</span>
						<?php endif ?>
					</h6>
					<p class="card-text">Date Created : <?= date('d F Y', $user['date_created']); ?></p>
					<a href="<?= base_url(); ?>admin/allusers" class="btn btn-primary">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</div>