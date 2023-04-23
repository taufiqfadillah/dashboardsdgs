<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr class="mb-4">

    <?= $this->session->flashdata('message'); ?>
    <?= form_open_multipart('user/edit'); ?>

    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <img id="preview-image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $user['name']; ?></h4>
                                            <p class="mb-0"><?= $user['email']; ?></p>
                                            <div class="status"><small><i class="fas fa-check-circle text-info"></i></small> verified </div>
                                            <div class="mt-2">
                                                <label for="image" class="btn btn-primary">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                    <span class="btn-file">Change Photo<input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" ;></span>
                                                </label>
                                            </div>
                                        </div>
                                        <script>
                                            // Function to display preview image
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#preview-image').attr('src', e.target.result);
                                                    }
                                                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                                                }
                                            }

                                            $(document).ready(function() {
                                                $('#image').change(function() {
                                                    readURL(this);
                                                });
                                            });
                                        </script>
                                        <div class=" text-center text-sm-right">
                                            <span class="badge badge-<?php if ($user["role_id"] == 1) : ?>warning<?php else : ?>info<?php endif ?>"><?php if ($user["role_id"] == 1) : ?>admin<?php else : ?>user<?php endif ?></span>
                                            <div class="text-muted"><small>Since <?= date('d F Y', $user['date_created']); ?></small></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#" class="active nav-link">
                                            <i class="fas fa-cog"></i>
                                            Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">

                                        <form>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" name="email" id="email" type="text" value="<?= $user['email']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input class="form-control" type="text" id="phone" name="phone" value="<?= $user['phone']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>
                                                                    Address
                                                                </label>
                                                                <input class="form-control" type="text" id="address" name="address" value="<?= $user['address']; ?>">
                                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>About</label>
                                                                <textarea class="form-control" rows="5" id="bio" name="bio"><?= $user['bio']; ?></textarea>
                                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Details Address</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input class="form-control" type="text" id="kota" name="kota" value="<?= $user['kota']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input class="form-control" type="text" id="provinsi" name="provinsi" value="<?= $user['provinsi']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Zip Code</label>
                                                                <input class="form-control" type="number" id="pos" name="pos" value="<?= $user['pos']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Social Media</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="facebook" class="form-label"><i class="fab fa-fw fa-facebook me-2 text-primary text-facebook"></i> Facebook</label>
                                                                <input type="link" class="form-control" id="facebook" name="facebook" value="<?= $user['facebook']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="form-label"><i class="fab fa-fw fa-twitter text-info text-twitter me-2"></i> Twitter</label>
                                                                <input type="link" class="form-control" id="twitter" name="twitter" value="<?= $user['twitter']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="form-label"><i class="fab fa-fw fa-instagram text-danger text-instagram me-2"></i> Instagram</label>
                                                                <input type="link" class="form-control" id="instagram" name="instagram" value="<?= $user['instagram']; ?>">
                                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Save Profile</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End of Main Content -->