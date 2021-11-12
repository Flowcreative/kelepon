 <main>
     <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                         <h1 class="page-header-title">
                             <div class="page-header-icon"><i data-feather="flag"></i></div>
                             Input Mata Lomba
                         </h1>

                         <div class="page-header-subtitle">Mimin jangan lupa ya upload semua mata lomba yang akan di lombakan!</div>
                     </div>
                     <div class="col-12 col-xl-auto mt-4">
                         <button class="btn btn-light text-blue" type="button" data-bs-toggle="modal" data-bs-target="#inputlomba"><i class="fas fa-plus"></i>Tambah Mata Lomba</button>
                     </div>
                 </div>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="card">
             <?= $this->session->flashdata('info'); ?>
             <!-- <div class="card-header"></div> -->
             <div class="card-body">
                 <table id="datatablesSimple">
                     <thead>
                         <tr>
                             <th class="text-center">No</th>
                             <th class="text-center">Mata Lomba</th>
                             <th class="text-center">Golongan</th>
                             <th class="text-center">Biaya</th>
                             <th class="text-center">Team/Kelompok</th>
                             <th class="text-center">Status</th>
                             <th class="text-center">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $no = 1;
                            foreach ($lomba as $lomb) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td><?= $lomb['matalomba'] ?></td>
                                 <td class="text-center"><?= $lomb['golongan'] ?></td>
                                 <td class="text-center"><?= rupiah($lomb['biaya']) ?></td>
                                 <td class="text-center">

                                     <?php if ($lomb['tim'] == 1) { ?>
                                         <p class="text-blue fw-700"><i class="fas fa-user"></i> Individu </p>
                                     <?php } else { ?>
                                         <p class="text-blue fw-700"><i class="fas fa-users"></i> Berkelompok </p>
                                     <?php } ?>
                                 </td>
                                 <td class="text-center">

                                     <?php if ($lomb['status'] == 1) { ?>
                                         <p class="text-success fw-700"> Aktif </p>
                                     <?php } else {  ?>
                                         <p class="text-danger fw-700"> Non-Aktif </p>
                                     <?php }  ?>
                                 </td>
                                 <td class="text-center">
                                     <a class="btn btn-warning btn-icon btn-sm" href="<?= base_url('admin/editlomba/' . $lomb['id']) ?> "><i class="text-light" data-feather="edit"></i></a>
                                     <a class="btn btn-red btn-icon btn-sm" href="<?= base_url('admin/deletelomba/' . $lomb['id']) ?> "><i class="text-light" data-feather="trash-2"></i></a>
                                 </td>
                             </tr>
                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </main>

 <!-- Modal inputLomba -->
 <div class="modal fade" id="inputlomba" tabindex="-1" role="dialog" aria-labelledby="inputlombaTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="inputlombaTitle">Input Mata Lomba</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('admin/inputlomba') ?>" method="post">
                     <div class="modal-body">
                         <!-- Form Group (email address)            -->
                         <div class="mb-3">
                             <input class="form-control" name="nama" type="text" placeholder="Nama Mata Lomba" />
                         </div>
                         <div class="mb-3">
                             <input class="form-control" name="biaya" type="text" placeholder="Masukan Biaya" />
                         </div>
                         <div class="row gx-3">
                             <div class="col-md-6">
                                 <!-- Form Group (password)-->
                                 <div class="mb-3">
                                     <label for="validationCustom04" class="form-label">Role</label>
                                     <select name="golongan" class="form-select" id="validationCustom04" required>
                                         <option selected disabled>-- Golongan --</option>
                                         <?php
                                            foreach ($golongan as $gol) {
                                            ?>
                                             <option value="<?= $gol['idgolongan'] ?>"><?= $gol['golongan'] ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <!-- Form Group (password)-->
                                 <div class="mb-3">
                                     <label for="validationCustom04" class="form-label">Status</label>
                                     <select name="status" class="form-select" id="validationCustom04" required>
                                         <option selected disabled>-- Status Lomba --</option>
                                         <option value="1">Aktif</option>
                                         <option value="2">Nonaktif</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <!-- Form Group (password)-->
                                 <div class="mb-3">
                                     <label for="validationCustom04" class="form-label">Status</label>
                                     <select name="tim" class="form-select" id="validationCustom04" required>
                                         <option selected disabled>-- Individu / Kelompok --</option>
                                         <option value="1">Individu</option>
                                         <option value="2">Kelompok</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                     </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                 <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
             </div>
             </form>
         </div>
     </div>
 </div>