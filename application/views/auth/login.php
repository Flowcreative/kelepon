<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <!-- Social login form-->
                <div class="card my-5">
                    <div class="card-body p-5 text-center">
                        <div class="h3 fw-light fw-800 mb-3">
                            Sign In
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-5">
                        <!-- Login form-->
                        <?= $this->session->flashdata('pesan_error'); ?>
                        <!-- Login form-->
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="emailExample">Email address</label>
                                <input class="form-control form-control-solid" name="email" type="email" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="passwordExample">Password</label>
                                <input class="form-control form-control-solid" name="password" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" />
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <!-- Form Group (forgot password link)-->
                            <!-- Form Group (login box)-->
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="mb-3">
                                    <a class="small" href="<?= base_url('auth/lupapassword') ?>">Forgot your password?</a>
                                </div>
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-5 py-4">
                        <div class="small text-center">
                            Belum punya akun?
                            <a href="<?= base_url('auth') ?>">Daftar yuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>