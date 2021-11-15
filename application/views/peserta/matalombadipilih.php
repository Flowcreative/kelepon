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
                                 <div class="row text-center">
                                     <div class="col-6">
                                         <?php if ($loging['tim'] == 1) { ?>
                                             <p class="text-dark fw-500"><i class="fas fa-user"></i> Individu</p>
                                         <?php } else { ?>
                                             <p class="text-dark fw-500"><i class="fas fa-users"></i> Berkelompok</p>

                                         <?php } ?>
                                     </div>
                                     <div class="col-6">
                                         <p class="text-muted fw-500"><i class="fas fa-money-bill-wave"></i> <?= rupiah($loging['biaya']) ?> </p>
                                         </p>
                                     </div>
                                 </div>
                                 <?php if (!empty($loging['identitas'])) { ?>
                                     <a href="<?= base_url('peserta/matalombaupload/') . $loging['id_lomba']  ?>" class="btn btn-success btn-sm">Ubah Identitas</a>
                                     <?php } else {
                                        if (cek_status() == 3) { ?>
                                         <a href="<?= base_url('peserta/matalombaupload/') . $loging['id_lomba']  ?>" class="btn btn-red btn-sm">Unggah Identitas</a>
                                     <?php } else { ?>
                                         <button class="btn btn-red btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#belumbayar">Unggah Identitas</button>
                                     <?php } ?>
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


 <!-- Modal -->
 <div class="modal fade" id="belumbayar" tabindex="-1" role="dialog" aria-labelledby="belumbayarTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body text-center">
                 <h2 class="text-danger">!!! Pembayaran Belum Selesai !!!</h2>
                 <h4 class="text-success">Upload identitas bisa dilakukan ketika proses pembayaran sudah selesai</h4>
             </div>
             <div class="modal-footer">
                 Tahapan : Pembayaran -> Upload Identitas -> Upload Karya :)
             </div>
             <a href="<?= base_url('peserta/invoice') ?>" class="btn btn-danger" type="button">Bayar yuk!</a>
         </div>
     </div>
 </div>