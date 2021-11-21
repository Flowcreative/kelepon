<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="flag"></i></div>
                            Edit Mata Lomba
                        </h1>

                        <div class="page-header-subtitle">Fokus dong mimin kok bisa salah sih mata lombanya!</div>
                    </div>
                    <!-- <div class="col-12 col-xl-auto mt-4">
                        <button class="btn btn-light text-blue" type="button" data-bs-toggle="modal" data-bs-target="#inputlomba"><i class="fas fa-plus"></i>Tambah Mata Lomba</button>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <!-- <div class="card-header"></div> -->
            <div class="card-body">
                <form action="<?= base_url('admin/editlomba') ?>" method="post">
                    <div class="modal-body">
                        <!-- Form Group (email address)            -->
                        <div class="mb-3">
                            <input name="id" type="hidden" value="<?= $lomba['id'] ?>" />
                            <input class="form-control" name="nama" type="text" placeholder="Nama Mata Lomba" value="<?= $lomba['matalomba'] ?>" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="biaya" type="text" placeholder="Masukan Biaya" value="<?= $lomba['biaya'] ?>" />
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-4">
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Golongan</label>
                                    <select name="golongan" class="form-select" id="validationCustom04" required>
                                        <option selected value="<?= $lomba['idgolongan'] ?>"><?= $lomba['golongan'] ?></option>
                                        <?php
                                        foreach ($golongan as $gol) {
                                        ?>
                                            <option value="<?= $gol['idgolongan'] ?>"><?= $gol['golongan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="validationCustom04" required>
                                        <option selected value="<?= $lomba['status'] ?>">
                                            <?php if ($lomba['status'] == 1) { ?>
                                                Aktif
                                            <?php } else { ?>
                                                Non Aktif
                                            <?php } ?>
                                        </option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Sifat Lomba</label>
                                    <select name="tim" class="form-select" id="validationCustom04" required>
                                        <option selected value="<?= $lomba['tim'] ?>">
                                            <?php if ($lomba['tim'] == 1) { ?>
                                                Individu
                                            <?php } else { ?>
                                                Kelompok
                                            <?php } ?>
                                        </option>
                                        <option value="1">Individu</option>
                                        <option value="2">Kelompok</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('admin/inputlomba') ?>" class="btn btn-red btn-sm">Batalkan</a>
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</main>