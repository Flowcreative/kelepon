 <main>
     <header class="page-header page-header-dark bg-teal pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                         <h1 class="page-header-title">
                             <div class="page-header-icon"><i data-feather="flag"></i></div>
                             Daftar Mata Lomba
                         </h1>
                         <div class="page-header-subtitle">Silahkan pilih Mata Lomba yang akan kamu ikuti!</div>
                     </div>
                     <!-- <div class="col-12 col-xl-auto mt-4">Optional page header content</div> -->
                 </div>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="row justify-content-center">

             <?php foreach ($lomba as $lom) { ?>
                 <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                     <div class="card h-100">
                         <div class="card-body px-5 pt-5 d-flex flex-column">
                             <div class="row">
                                 <div class="col-8">
                                     <div class="h3 text-primary"><?= $lom['matalomba'] ?></div>
                                     <p class="text-dark fw-700">Biaya: <?= rupiah($lom['biaya']) ?></p>
                                     <p class="text-muted fw-500 mb-4">
                                         <?php if ($lom['tim'] == 1) { ?>
                                             <i class="fas fa-user"></i> Individu
                                         <?php } else { ?>
                                             <i class="fas fa-users"></i> Individu
                                         <?php } ?>
                                     </p>
                                 </div>
                                 <div class="small text-center col-4">
                                     <?php
                                        $data = $this->Peserta_model->getlog($lom['id']);
                                        if ($data) { ?>
                                         <a class="btn btn-block fw-600 btn-danger btn-sm mb-2" href="<?= base_url('peserta/batalmatalomba/') . $lom['id'] ?>">Batalkan</a>
                                         <a class="fw-300" href="#">Detail lomba</a>
                                     <?php } else { ?>
                                         <a class="btn btn-block fw-600 btn-success btn-sm mb-2" href="<?= base_url('peserta/pilihmatalomba/') . $lom['id'] ?>">Pilih lomba</a>
                                         <a class="fw-300" href="#">Detail lomba</a>
                                     <?php } ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php } ?>
         </div>
     </div>
 </main>