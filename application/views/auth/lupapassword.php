<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <!-- Social forgot password form-->
                <div class="card my-5">
                    <a class="btn btn-sm btn-light text-primary" href="<?= base_url('landing') ?>">
                        <i class="me-1" data-feather="arrow-left"></i>
                        Back to Home
                    </a>
                    <div class="card-body p-5 text-center">
                        <div class="h3 fw-light mb-0 fw-800">Lupa Password</div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-5 justify-content-center">
                        <div class="text-center small text-muted mb-4">Masukan email kamu yang terdaftar dan kami akan mengirim kode dan url reset password.</div>
                        <?= $this->session->flashdata('pesan_error'); ?>
                        <!-- Forgot password form-->
                        <form action="<?= base_url('auth/carilupapassword') ?>" method="post">
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <input class="form-control form-control-solid text-center" name="email" type="text" placeholder="Masukan email anda" aria-label="Email Address" aria-describedby="emailExample" />
                                <?= form_error('email', '<small class="text-danger text-center">', '</small>'); ?>
                            </div>
                            <!-- Form Group (reset password button)    -->
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Reset password</button>
                            </div>
                        </form>
                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                            <a class="small" href="<?= base_url('auth/logout') ?>">Kembali sign in</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-5 py-4">
                        <div class="small text-center">
                            Belum memiliki akun??
                            <a href="<?= base_url('auth') ?>">Sign up yuk!!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>