<main>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                        <!-- Invoice branding-->
                        <img class="invoice-brand-img rounded-circle mb-4" src="<?= base_url('src/dashboard/') ?>assets/img/user/default.png" alt="" />
                        <div class="h2 text-white mb-0">KELEPON</div>
                        Pramuka Universitas Bengkulu
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-end">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Pembayaran</div>
                        <?= $user['nama'] ?>
                        <br />
                        <?= date('d F Y', strtotime('i'));; ?>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <!-- Payment method 1-->
                <div class="d-flex align-items-center justify-content-between px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <?php if (empty($get['chanel'])) { ?>
                        <?php } else { ?>
                            <div class="ms-4">
                                <div class="text-lg fw-700 text-blue"><?= $get['chanel'] ?></div>
                                <div class="text-sm fw-400 text-muted mt-2">Biaya admin: <?= $get['admin'] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="ms-4 small">
                        <?php if (empty($get['chanel'])) { ?>
                        <?php } else { ?>
                            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#paymentmethod">Ubah metode pembayaran</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (empty($get['chanel'])) { ?>
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#paymentmethod">Pilih metode pembayaran</button>
            <?php } else { ?>
                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#Checkout">Checkout sekarang</button>
            <?php } ?>
        </div>
    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="Checkout" tabindex="-1" role="dialog" aria-labelledby="CheckoutTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="paymentmethodTitle">Long Modal with Page Scrolling</h5> -->
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="text-muted fw-600">Biaya Mata Lomba: </p>
                    </div>
                    <div class="col-6">
                        <p class="">: <?= rupiah($get['total']) ?> </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="text-muted fw-600">Admin pembayaran: </p>
                    </div>
                    <div class="col-6">
                        <p class="">: <?= rupiah($get['admin']) ?> </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="text-muted fw-600">Total: </p>
                    </div>
                    <div class="col-6">
                        <p class="">: <?= rupiah($get['admin'] + $get['total']) ?> </p>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <i class="fw-800 text-danger"> Setelah Klik Pembayaran anda sudah tidak dapat mengubah mata lomba </i>
                    <i class="fw-400 text-danger"> Anda akan di redirect ke halaman tripay.co.id untuk mendapatkan kode pembayaran </i>
                </div>
                <form action="">
            </div>
            <input type="hidden" name="kode" value="<?= $get['kode_chanel'] ?>" />
            <input type="hidden" name="total" value="<?= $get['total'] ?>" />
            <input type="hidden" name="id" value="<?= $get['id'] ?>" />
            <button class="btn btn-sm btn-danger">Bayar yuk!</button>
        </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentmethod" tabindex="-1" role="dialog" aria-labelledby="paymentmethodTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="paymentmethodTitle">Long Modal with Page Scrolling</h5> -->
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($chanel as $chan) { ?>
                    <a class="card card-icon lift lift-sm mb-2" href="<?= base_url('peserta/inputchanel/') . $chan['id'] ?>">
                        <div class="row g-0">
                            <!-- <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i></div> -->
                            <div class="col">
                                <div class="card-body py-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-title text-primary mb-2"><?= $chan['chanel'] ?></h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="small text-muted">
                                                <?php if ($chan['chanel'] == 'OVO') { ?>
                                                    Biaya admin: <?= $get['total'] * 0.02 ?>
                                                <?php } else if ($chan['chanel'] == 'QRIS') { ?>
                                                    Biaya admin: <?= $chan['admin'] + $get['total'] * 0.007 ?>
                                                <?php } else { ?>
                                                    Biaya admin: <?= $chan['admin'] ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>