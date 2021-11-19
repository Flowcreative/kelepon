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
            <div class="card-body p-4 p-md-5">
                <!-- Invoice table-->
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Mata Lomba</th>
                                <th class="text-end" scope="col"></th>
                                <th class="text-end" scope="col">Orang/tim</th>
                                <th class="text-end" scope="col">Biaya</th>
                                <th class="text-end" scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Invoice item 1-->
                            <?php foreach ($log as $loging) { ?>
                                <tr class="border-bottom">
                                    <td>
                                        <div class="fw-bold"><?= $loging['matalomba'] ?></div>
                                        <!-- <div class="small text-muted d-none d-md-block"><?= $loging['golongan'] ?></div> -->
                                    </td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold"><?= $loging['peserta'] ?></td>
                                    <td class="text-end fw-bold "><?= rupiah($loging['biaya']) ?></td>
                                    <td class="text-end fw-bold "><?= rupiah($loging['biaya'] * $loging['peserta']) ?></td>
                                </tr>
                            <?php } ?>
                            <!-- Invoice item 2-->

                            <!-- Invoice subtotal-->
                            <tr>
                                <td></td>
                                <td class="text-end pb-0" colspan="3">
                                    <div class="text-uppercase small fw-700 text-muted">Total:</div>
                                </td>
                                <td class="text-end pb-0">
                                    <?php
                                    echo rupiah(sum());
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end pb-0" colspan="3">
                                </td>

                                <td class="text-end pb-0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="<?= base_url('peserta/inputtotal') ?>" method="post">
            </div>
            <input type="hidden" name="total" value="<?= sum() ?>">
            <?php if ($loging['peserta'] == 0) { ?>
                <a href="<?= base_url('peserta/matalombadipilih') ?>" class="btn btn-success btn-sm">Input Jumlah Peserta</a>
            <?php } else { ?>
                <button class="btn btn-success btn-sm" type="submit">Bayar sekarang</button>
            <?php } ?>
            </form>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                        <div class="h6 mb-1"><?= $user['nama'] ?></div>
                        <div class="small"><?= $user['telepon'] ?></div>
                        <div class="small"><?= $user['email'] ?></div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                        <div class="h6 mb-0">KELEPON</div>
                        <div class="small">Pramuka Universitas Bengkulu</div>
                        <div class="small">02.001 / 02.002</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase fw-700 mb-2">Note</div>
                        <div class="small mb-0">Lakukan pembayaran!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>