<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="layout"></i></div>
                            Data Peserta
                        </h1>
                        <div class="page-header-subtitle">Seluruh user yang sudah mengisi data diri</div>
                    </div>
                </div>
                <nav class="mt-4 rounded" aria-label="breadcrumb">
                    <ol class="breadcrumb px-3 py-2 rounded mb-0">
                        <li class="breadcrumb-item active">Data diri</li>
                    </ol>
                </nav>
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
                            <th class="text-center">Nama Pangkalan</th>
                            <th class="text-center">Kota</th>
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($userlist as $usr) {
                        ?>
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class="avatar me-2"><img class="avatar-img img-fluid" src="<?= base_url('src/dashboard/') ?>assets/berkas/foto/<?= $usr['foto'] ?>" /></div>
                                        <?= $usr['nama'] ?>
                                    </div>
                                </td>
                                <td class="text-center"><?= $usr['golongan'] ?></td>
                                <td class="text-center"><?= $usr['namapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['kotapangkalan'] ?></td>
                                <td class="text-center"><?= $usr['provinsipangkalan'] ?></td>
                                <td class="text-center">
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="<?= base_url('admin/datadiripeserta/' . $usr['id']) ?>"><i class="text-blue" data-feather="more-vertical"></i></a>
                                    <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="javascript:window.print(<?= base_url('admin/datadiripesertaprint/' . $usr['id']) ?>" )><i class="text-red fas fa-print"></i></a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>