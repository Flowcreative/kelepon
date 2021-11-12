<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="layout"></i></div>
                            Peserta Penegak
                        </h1>
                    </div>
                </div>
                <!-- <nav class="mt-4 rounded" aria-label="breadcrumb">
                    <ol class="breadcrumb px-3 py-2 rounded mb-0">
                        <li class="breadcrumb-item active">Data diri</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2 col-2">
                </div>
                <?= $this->session->flashdata('flash'); ?>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Lomba</th>
                            <th class="text-center">Pangkalan</th>
                            <th class="text-center">Kota</th>
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($peserta as $usr) {
                        ?>
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class="avatar me-2">
                                            <img class="avatar-img img-fluid" src="<?= base_url('src/dashboard/') ?>assets/berkas/foto/<?= $usr['foto'] ?>" />
                                        </div>
                                        <?= $usr['nama'] ?>

                                </td>
                                <td class="text-center"><?= $usr['matalomba'] ?></td>
                                <td class="text-center"><?= $usr['namapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['kotapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['provinsipangkalan'] ?></td>
                                <td class="text-center">
                                    <?php if (empty($usr['identitas'])) { ?>
                                        <i class="text-danger">Belum Upload</i>
                                    <?php } else { ?>
                                        <a href="<?= base_url('src/dashboard/assets/berkas/identitas/' . $usr['identitas']) ?>">Di Upload</a>
                                    <?php } ?>
                                </td>
                                <td class="text-center"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>