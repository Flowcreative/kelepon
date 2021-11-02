<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <!-- Social forgot password form-->
                <div class="card my-5">
                    <div class="card-body p-5 text-center">
                        <div class="h3 fw-light mb-0 fw-800">Password Baru</div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-5 justify-content-center">
                        <!-- Forgot password form-->
                        <form action="<?= base_url('auth/lupapasswordganti') ?>" method="post">
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <input type="hidden" value="<?= $email ?>" name="email" />
                                <input class="form-control form-control-solid text-center" name="password2" type="password" placeholder="Password baru" aria-label="Email Address" aria-describedby="emailExample" />
                                <?= form_error('email', '<small class="text-danger text-center">', '</small>'); ?>
                            </div>
                            <!-- Form Group (reset password button)    -->
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>