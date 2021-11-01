<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            User Detail
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

                        <div class="row mb-3">
                            <div class="col-3">Nama</div>
                            <div class="col-6">: <?= $nama ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Email</div>
                            <div class="col-6">: <?= $email ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Telepon</div>
                            <div class="col-6">: <?= $telepon ?></div>
                        </div>
                        <div class="row mb-3">
                            <?php
                            if ($status == 1) {
                                $stts = 'Aktif';
                            } else if ($status == 2) {
                                $stts = 'Belum Aktif';
                            } else {
                                $stts = 'Ga Jelas';
                            }
                            ?>
                            <div class="col-3">Status</div>
                            <div class="col-6">: <?= $stts ?></div>
                        </div>
                        <div class="row mb-3">
                            <?php
                            if ($role == 1) {
                                $level = 'Admin';
                            } else if ($role == 2) {
                                $level = 'Peserta';
                            } else {
                                $level = 'Ga Jelas';
                            }
                            ?>
                            <div class="col-3">Role</div>
                            <div class="col-6">: <?= $level ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Tanggal registrasi</div>
                            <div class="col-6">: <?= $tgl_reg ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Token aktivasi</div>
                            <div class="col-6">: <?= $token ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>