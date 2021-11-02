<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <!-- Basic forgot password form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header justify-content-center">
                        <h3 class="fw-light my-4 text-center">Password Baru</h3>
                    </div>
                    <div class="card-body">
                        <!-- Forgot password form-->
                        <form action="<?= base_url('auth/lupapasswordganti') ?>" method="post">
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <input name="email" type="hidden" value="<?= $email ?>" />
                                <input class="form-control" name="password1" type="password" placeholder="Password baru" />
                                <?= form_error('password1', '<small class="text-danger text-center">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name="password2" type="password" placeholder="Konfirmasi password baru" />
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <!-- Form Group (submit options)-->
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Ganti Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>