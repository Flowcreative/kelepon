<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- Basic forgot password form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header justify-content-center">
                        <h3 class="fw-light my-4">Password Recovery</h3>
                    </div>
                    <div class="card-body">
                        <div class="small mb-3 text-muted">Masukan email kamu yang terdaftar dan kami akan mengirim kode dan url reset password.</div>
                        <!-- Forgot password form-->
                        <form action="<?= base_url('auth/lupapassword') ?>" method="post">
                            <?= $this->session->flashdata('pesan_error'); ?>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <input class="form-control" name="email" type="email" aria-describedby="emailHelp" placeholder="Masukan email anda" />
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <!-- Form Group (submit options)-->
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= base_url('auth/login') ?>">Kembali login</a>
                                <button class="btn btn-primary" type="submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="auth-register-basic.html">Belum memiliki akun? Daftar!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>