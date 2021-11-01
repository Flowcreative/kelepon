<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Edit User
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">

            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="<?= base_url('admin/userlist') ?>">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Users List
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Form Row-->
                        <form action="<?= base_url('admin/edituser') ?>" method="post">
                            <div class="mb-3">
                                <input name="id" type="hidden" value="<?= $id ?>" />
                                <label class="small mb-1" for="inputNama">Nama</label>
                                <input class="form-control" name="nama" id="inputNama" type="text" value="<?= $nama ?>" />
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>

                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Alamat email</label>
                                <input class="form-control" name="email" id="inputEmailAddress" type="email" value="<?= $email ?>" />
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputTelepon">Nomor telepon</label>
                                <input class="form-control" name="telepon" id="inputTelepon" type="text" value="<?= $telepon ?>" />
                                <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <!-- Form Group (Roles)-->
                            <div class="mb-3">
                                <label class="small mb-1">Role / Level</label>
                                <select class="form-select" name="role" aria-label="Default select example">
                                    <?php if ($role == 1) { ?>
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Peserta</option>
                                    <?php } else if ($role == 2) { ?>
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Peserta</option>
                                    <?php } else { ?>
                                        <option selected disabled>-- Pilih role --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Peserta</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Form Group (Roles)-->
                            <div class="mb-3">
                                <label class="small mb-1">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <?php if ($status == 1) { ?>
                                        <option value="1" selected>Aktif</option>
                                        <option value="2">Non-Aktif</option>
                                    <?php } else if ($status == 2) { ?>
                                        <option value="1">Aktif</option>
                                        <option value="2" selected>Non-Aktif</option>
                                    <?php } else { ?>
                                        <option selected disabled>-- Pilih status --</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Non-Aktif</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>