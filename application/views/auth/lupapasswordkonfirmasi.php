<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <!-- Basic forgot password form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header justify-content-center">
                        <h3 class="fw-light my-4 text-center">Verifikasi Recovery</h3>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan_error'); ?>
                        <div class="small mb-3 text-muted">Silahkan masukan kode atau klik url password recovery yang ada pada email anda.</div>
                        <div class="small mb-3 text-muted">CEK SPAM PADA EMAIL ANDA JIKA TIDAK ADA PADA EMAIL UTAMA .</div>
                        <!-- Forgot password form-->
                        <form action="<?= base_url('auth/konfirmasilupapassword') ?>" method="post">
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <input class="form-control text-center" name="email" type="hidden" value="<?= $email ?>" />
                                <input class="form-control text-center" name="kode" type="text" placeholder="Masukan kode verifikasi" />
                                <?= form_error('token', '<small class="text-danger text-center">', '</small>'); ?>
                            </div>
                            <!-- Form Group (submit options)-->
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">SUBMIT</button>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <a class="small" href="<?= base_url('auth/resendemailregist') ?>">Belum menerima email</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="<?= base_url('auth') ?>">Belum memiliki akun? Daftar!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>