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
            <button class="btn btn-sm btn-primary text-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="me-1" data-feather="user-plus"></i>
                Add New User
            </button>
            <div class="card-body">
                <div class="row mb-2 col-2">
                </div>
                <?= $this->session->flashdata('flash'); ?>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th class="text-center">User</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Joined Date</th>
                            <th class="text-center">Joined time</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($user as $usr) {
                        ?>
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class="avatar me-2"><img class="avatar-img img-fluid" src="<?= base_url('src/dashboard/') ?>assets/img/user/<?= $usr['foto_profile'] ?>" /></div>
                                        <?= $usr['nama'] ?>
                                    </div>
                                </td>
                                <td><?= $usr['email'] ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($usr['role'] == 1) {
                                        echo 'Admin';
                                    } else if ($usr['role'] == 2) {
                                        echo 'Peserta';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($usr['status'] == 1) { ?>
                                        <i class="btn btn-green btn-xs  btn-icon" type="button"></i>
                                    <?php } else if ($usr['status'] == 2) { ?>
                                        <i class="btn btn-red btn-xs  btn-icon" type="button"></i>
                                    <?php } ?>
                                </td>
                                <td class="text-center"><?= $usr['tgl_reg'] ?></td>
                                <td class="text-center"><?= $usr['time_reg'] ?></td>
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


<!-- modal add user area -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User Baru</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/adduser') ?>" method="post">
                <div class="modal-body">
                    <!-- Form Group (email address)            -->
                    <div class="mb-3">
                        <input class="form-control" name="nama" type="text" placeholder="Nama user" />
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="telepon" type="text" placeholder="Nomor telepon atau wa user" />
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="email" type="email" placeholder="Email user" />
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="password" type="password" placeholder="Password baru" />
                    </div>
                    <div class="row gx-3">
                        <div class="col-md-6">
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label for="validationCustom04" class="form-label">Status</label>
                                <select name="status" class="form-select" id="validationCustom04" required>
                                    <option selected disabled>-- User Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label for="validationCustom04" class="form-label">Role</label>
                                <select name="role" class="form-select" id="validationCustom04" required>
                                    <option selected disabled>-- User role --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Form Group (create account submit)-->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>