<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <!-- Create Organization-->
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                <div class="card text-center h-100">
                    <div class="card-body px-5 pt-5 d-flex flex-column">
                        <div>
                            <div class="h3 text-teal">Kakak Belum Bayar 😭</div>
                            <p class="text-muted mb-4">Bayar segera yuk, sebelum kodenya expired</p>
                        </div>
                        <p class="text-lg text-fw-500 mb--2">Total Ammount:</p>
                        <p class="text-xl text-fw-800"><?= rupiah($payment['total']) ?></p>
                        <i>*total belum termasuk biaya admin</i>
                    </div>
                    <!-- <div class="card-footer bg-transparent px-5 py-4"> -->
                    <!-- <div class="icons-org-create align-items-center mx-auto mt-auto">
                        </div> -->
                    <!-- </div> -->
                    <a class="btn btn-block btn-teal btn-sm" href="<?= $url['url'] ?>">Bayar Sekarang</a>
                    <div class="small text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>