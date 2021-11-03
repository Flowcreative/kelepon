                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-9">
                                <!-- Social registration form-->
                                <div class="card my-5">
                                    <a class="btn btn-sm btn-light text-primary" href="<?= base_url('landing') ?>">
                                        <i class="me-1" data-feather="arrow-left"></i>
                                        Back to Home
                                    </a>
                                    <div class="card-body p-5 text-center">
                                        <div class="h3 fw-light fw-800 mb-3">Buat Akun Baru</div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <div class="text-center small text-muted mb-4"><?= $this->session->flashdata('pesan_error'); ?></div>
                                        <!-- Login form-->
                                        <form action="<?= base_url('auth') ?>" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-12">
                                                    <!-- Form Group (email address)-->
                                                    <div class="mb-3">
                                                        <label class="text-gray-600 small" for="emailExample">Nama Lengkap</label>
                                                        <input class="form-control form-control-solid" name="nama" type="text" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="text-gray-600 small" for="emailExample">Telepon</label>
                                                        <input class="form-control form-control-solid" name="telepon" type="text" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                                        <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="text-gray-600 small" for="emailexample">Alamat email</label>
                                                        <input class="form-control form-control-solid" name="email" type="email" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="row gx-3">
                                                        <div class="col-md-6">
                                                            <!-- Form Group (choose password)-->
                                                            <div class="mb-3">
                                                                <label class="text-gray-600 small" for="passwordExample">Password</label>
                                                                <input class="form-control form-control-solid" name="password1" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" />
                                                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <!-- Form Group (confirm password)-->
                                                            <div class="mb-3">
                                                                <label class="text-gray-600 small" for="confirmPasswordExample">Confirm Password</label>
                                                                <input class="form-control form-control-solid" name="password2" type="password" placeholder="" aria-label="Confirm Password" aria-describedby="confirmPasswordExample" />
                                                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Form Group (form submission)-->
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="checkTerms" type="checkbox" value="" />
                                                            <label class="form-check-label" for="checkTerms">
                                                                I accept the
                                                                <a href="#!">terms &amp; conditions</a>
                                                                .
                                                            </label>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Daftar akun</button>
                                                    </div>
                                        </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-4">
                                        <div class="small text-center">
                                            Sudah punya akun?
                                            <a href="<?= base_url('auth/login') ?>">Sign in aja!!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>