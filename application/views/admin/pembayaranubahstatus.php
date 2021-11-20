<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                <div class="card h-100">
                    <div class="card-header text-center">Status Pembayaran</div>
                    <div class="card-body d-flex flex-column">
                        <div class="modal-body">
                            <p class="text-center mb-2 fw-400 text-lg">Total tagihan</p>
                            <p class="text-center mb-4 fw-800 text-xl"><?= rupiah($payment['total']) ?></p>
                            <form action="<?= base_url('admin/ubahstatusbayar') ?>" method="post">
                                <input type="hidden" name="iduser" value="<?= $payment['id_user'] ?>">
                                <input type="hidden" class="form-control form-control-sm" name="total" value="<?= $payment['total'] ?>" placeholder="Masukan Url Google Drive Karya Kamu...">
                                <div class="col-md-12 text-center">
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <select name="status" class="form-select" id="validationCustom04" required>
                                            <option selected disabled class="text-center fw-400">-- Status Pembayaran --
                                            <option value="3" class="text-center fw-400">Dibayar</option>
                                            <option value="1" class="text-center fw-400">Checkout</option>
                                            <option value="2" class="text-center fw-400">Expired</option>
                                            <option value="4" class="text-center fw-400">Gagal</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-red btn-sm">Batal</a>
                            <button class="btn btn-primary btn-sm" type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>