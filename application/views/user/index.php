<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr class="mb-4">

    <div class="row">
        <div class="col-lg-8">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

        </div>
    </div>

    <!-- tampilan -->


    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="<?= $user['name'] ?>">
                            </div>
                            <h5 class="user-name"><?= $user['name']; ?> <small><i class="fas fa-check-circle text-info"></i></small></h5>
                            <h6 class="user-email"><?= $user['email']; ?></h6>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0 text-center">
                            <li class="list-inline-item">
                                <a href="<?= $user['facebook'] ?>" target="_blank" class="social-list-item border-purple text-purple"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?= $user['instagram'] ?>" target="_blank" class="social-list-item border-danger text-danger"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?= $user['twitter'] ?>" target="_blank" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                            </li>
                        </ul>

                        <div class="about">
                            <h5 class="font-weight-bold">About</h5>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="min-height: 150px;" readonly> <?= $user['bio']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-2 text-primary font-weight-bold">Personal Details</h6>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <span type="text" class="form-control" id="name" placeholder="Enter full name"><?= $user['name']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <span type="email" class="form-control" id="email"><?= $user['email']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <span type="text" class="form-control" id="phone"><?= $user['phone']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="website">Website URL</label>
                                <span type="url" class="form-control" id="website"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mt-3 mb-2 text-primary font-weight-bold">Address</h6>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <span type="name" class="form-control" id="address"><?= $user['address']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <span type="name" class="form-control" id="city"><?= $user['kota']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="state">State</label>
                                <span type="text" class="form-control" id="state"><?= $user['provinsi']; ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zip">Zip Code</label>
                                <span type="text" class="form-control" id="zip" placeholder="Zip Code..."><?= $user['pos']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->