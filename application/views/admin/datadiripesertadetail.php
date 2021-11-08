<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="layout"></i></div>
                            Detail Data <?= $datadiri['nama'] ?>
                        </h1>
                        <div class="page-header-subtitle">Silahkan periksa data yang belum dilengkapi</div>
                    </div>
                </div>
                <nav class="mt-4 rounded" aria-label="breadcrumb">
                    <ol class="breadcrumb px-3 py-2 rounded mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/datadiripeserta') ?>">Data Diri Peserta</a></li>
                        <li class="breadcrumb-item active"><?= $datadiri['nama'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail</div>
                    <div class="card-body">
                        <div class="mb-2 row">
                            <div class="col-4 text-lg fw-600">Data diri</div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Nama Lengkap</div>
                            <div class="col-8">: <?= $datadiri['nama'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Tempat, Tanggal lahir</div>
                            <div class="col-8">: <?= $datadiri['tempatlahir'] ?>, <?= $datadiri['tanggallahir'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Alamat</div>
                            <div class="col-8">: <?= $datadiri['alamat'] ?>, <?= $datadiri['kota'] ?>, <?= $datadiri['provinsi'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Golongan</div>
                            <div class="col-8">: <?= $datadiri['golongan'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Email</div>
                            <div class="col-8">: <?= $datadiri['email'] ?></div>
                        </div>
                        <div class="mb-4 row">
                            <div class="col-4">No HP/WA</div>
                            <div class="col-8">: <?= $datadiri['telepon'] ?></div>
                        </div>

                        <!-- Data Pangakalan -->
                        <div class="mb-2 mt-4 row">
                            <div class="col-4 text-lg fw-600">Data pangkalan</div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Nama pangkalan</div>
                            <div class="col-8">: <?= $datadiri['namapangkalan'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Nomor gudep</div>
                            <div class="col-8">: <?= $datadiri['nogudep'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Kota/Cabang</div>
                            <div class="col-8">: <?= $datadiri['kotapangkalan'] ?></div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-4">Provinsi/Daerah</div>
                            <div class="col-8">: <?= $datadiri['kotapangkalan'] ?></div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header text-center">Pas Foto</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <?php if ($datadiri['foto']) { ?>
                            <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('src/dashboard/') ?>assets/berkas/foto/<?= $datadiri['foto'] ?>" alt="" />
                        <?php } else { ?>
                            <i class="text-danger"> Belum di upload</i>
                        <?php } ?>
                    </div>
                </div>
                <div class="card mb-4 mb-xl-0 mt-2">
                    <div class="card-header text-center">Kartu Identias</div>
                    <?php if ($datadiri['kartu_identitas']) { ?>
                        <a class="btn btn-teal btn-sm fw-600" href="<?= base_url('src/dashboard/') ?>assets/berkas/identitas/<?= $datadiri['kartu_identitas'] ?>" target="_blank">lihat</a>
                    <?php } else { ?>
                        <i class="text-danger text-center"> Belum di upload</i>
                    <?php } ?>
                </div>
                <div class="card mb-4 mb-xl-0 mt-2">
                    <div class="card-header text-center">Surat Mandat</div>
                    <?php if ($datadiri['suratmandat']) { ?>
                        <a class="btn btn-teal btn-sm fw-600" href="<?= base_url('src/dashboard/') ?>assets/berkas/mandat/<?= $datadiri['suratmandat'] ?>" target="_blank">lihat</a>
                    <?php } else { ?>
                        <i class="text-danger text-center"> Belum di upload</i>
                    <?php } ?>
                </div>
                <div class="card mb-4 mb-xl-0 mt-2">
                    <!-- <a class="btn btn-red btn-sm fw-600" href="<?= base_url('admin/printdatadiripeserta/' . $datadiri['id_user']) ?>">Print Seluruh Data Diri</a> -->
                </div>
            </div>
        </div>
    </div>
</main>