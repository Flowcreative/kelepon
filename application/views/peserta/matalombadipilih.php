 <main>
     <header class="page-header page-header-dark bg-teal pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                         <h1 class="page-header-title">
                             <div class="page-header-icon"><i data-feather="flag"></i></div>
                             Mata Lomba Dipilih
                         </h1>
                         <div class="page-header-subtitle">Silahkan lengkapi data mata Lomba yang kamu pilih</div>
                     </div>
                 </div>
                 <nav class="mt-4 rounded" aria-label="breadcrumb">
                     <ol class="breadcrumb px-3 py-2 rounded mb-0">
                         <li class="breadcrumb-item"><a href="<?= base_url('peserta/matalomba') ?>">Mata Lomba</a></li>
                         <li class="breadcrumb-item active">Dipilih</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="row justify-content-center">

             <?php if ($log) { ?>
                 <?php foreach ($log as $loging) { ?>
                     <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                         <div class="card h-100">
                             <div class="card-header text-center"><?= $loging['matalomba'] ?></div>
                             <div class="card-body d-flex flex-column">
                                 <p class="text-dark fw-500"><i class="fas fa-pay"></i> <?= rupiah($loging['biaya']) ?> </p>
                                 <?php if (!empty($loging['identitas'])) { ?>
                                     <a href="<?= base_url('peserta/matalombaupload/') . $loging['id_lomba']  ?>?user=<?= $loging['id_user'] ?>" class="btn btn-success btn-sm">Ubah Identitas</a>
                                 <?php } else { ?>
                                     <a href="<?= base_url('peserta/matalombaupload/') . $loging['id_lomba']  ?>?user=<?= $loging['id_user'] ?>" class="btn btn-red btn-sm">Unggah Identitas</a>
                                 <?php } ?>
                             </div>
                         </div>
                     </div>
                 <?php } ?>
             <?php } else { ?>
                 <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                     <div class="card h-100">
                         <!-- <div class="card-header">Mata Lomba</div> -->
                         <div class="card-body px-5 pt-5 d-flex flex-column">
                             <i class="text-lg fw-600 text-danger text-center">Kamu Belum Memilih Mata Lomba</i>
                         </div>
                     </div>
                 </div>
             <?php } ?>
         </div>
     </div>
 </main>