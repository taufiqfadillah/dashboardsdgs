<div class="container">


    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <img src="<?= base_url(); ?>/assets/img/logo48x48.png" class="img-fluid rounded-circle" />
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Dashboard SDGs</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form id="login" class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <input type="checkbox" class="mb-4" value="lsRememberMe" id="rememberMe"> <label for="rememberMe"> <small>Remember me</small> </label>

                                    <!-- reCAPTCHAv2
                                    <div class="col-lg-8 recaptcha-wrapper mb-3">
                                        <div class="g-recaptcha" data-sitekey="6LerOLAeAAAAAB13SelURqtLMe7lhRuJDJenyAYQ"></div>
                                    </div> -->

                                    <button type="submit" class="btn btn-primary btn-user btn-block" onclick="lsRememberMe()">
                                        Login
                                    </button>


                                </form>
                                <hr>
                                <div class=" text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>