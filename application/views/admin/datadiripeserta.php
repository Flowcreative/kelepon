<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Users List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <!-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                            <i class="me-1" data-feather="users"></i>
                            Manage Groups
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
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
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="<?= base_url('admin/userdetail/' . $usr['id']) ?>"><i data-feather="more-vertical"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="<?= base_url('admin/edituser/' . $usr['id']) ?> "><i class="text-warning" data-feather="edit"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark " href="<?= base_url('admin/deleteuser/' . $usr['id']) ?> "><i class="text-danger" data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>