<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-money-bill-wave"></i></div>
                            Management Pembayaran
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
                            <th class="text-center">Golongan</th>
                            <th class="text-center">Pangkalan</th>
                            <th class="text-center">Kota</th>
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bayar as $usr) {
                        ?>
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class="avatar me-2">
                                            <img class="avatar-img img-fluid" src="<?= base_url('src/dashboard/') ?>assets/berkas/foto/<?= $usr['foto'] ?>" />
                                        </div>
                                        <?= $usr['nama'] ?>

                                </td>
                                <td class="text-center"><?= $usr['golongan'] ?></td>
                                <td class="text-center"><?= $usr['namapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['kotapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['provinsipangkalan'] ?></td>
                                <td class="text-center">

                                    <?php if ($usr['status_payment'] == 1) { ?>
                                        <i class="text-success">Check Out Progress</i>

                                    <?php } elseif ($usr['status_payment'] == 2) { ?>

                                        <i class="text-success">tripay.co.id progress</i>
                                    <?php } elseif ($usr['status_payment'] == 3) { ?>

                                        <i class="text-success">Pembayaran Success</i>
                                    <?php } else { ?>
                                        <i class="text-danger">Pembayaran Pending</i>
                                    <?php } ?>
                                </td>
                                <td class="text-center">Nanti bisa Bayar via kestari</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>