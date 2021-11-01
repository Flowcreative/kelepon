                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center">
                                        <h3 class="fw-light my-4">Daftar Akun Baru</h3>
                                    </div>
                                    <div class="card-body">
                                        <?= $this->session->flashdata('pesan_error'); ?>
                                        <!-- Registration form-->
                                        <form action="<?= base_url('auth') ?>" method="post">
                                            <!-- form row nama -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputNama">Nama Lengkap</label>
                                                <input class="form-control" name="nama" id="inputNama" type="text" aria-describedby="emailHelp" placeholder="Masukan nama anda" />
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <!-- form row nomor hp -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputTelepon">Nomor Handpone/WA</label>
                                                <input class="form-control" name="telepon" id="inputTelepon" type="text" aria-describedby="emailHelp" placeholder="Masukan nama anda" />
                                                <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <!-- Form Group (email address)            -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control" name="password1" id="inputPassword" type="password" placeholder="Enter password" />
                                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputConfirmPassword">Konfirmasi Password</label>
                                                        <input class="form-control" name="password2" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (create account submit)-->
                                            <button class="btn btn-primary btn-block" type="submit">Daftar Akun</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="<?= base_url('auth/login') ?>">Sudah Memiliki Akun? Silahkan Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>