 <main>
     <header class="page-header page-header-dark bg-teal pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">

                     </div>
                 </div>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="row justify-content-center">
             <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                 <div class="card h-100">
                     <div class="card-header text-center">Sumbit Karya</div>
                     <div class="card-body d-flex flex-column">
                         <div class="modal-body">
                             <div class="row mb-2">
                                 <p class="fw-600 text-lg">Aturan kolektif:</p>
                                 <p class="fw-300">Jika pendaftaran berifat kolektif, masukan link folder yang menampung semua karya</p>
                             </div>
                             <div class="row mb-4">
                                 <p class="fw-600 text-lg">Aturan individu:</p>
                                 <p class="fw-300">Silahkan masukan link view karyamu</p>
                             </div>
                             <form action="<?= base_url('peserta/uploadkarya') ?>" method="post">
                                 <input type="hidden" name="idlomba" value="<?= $uri ?>">
                                 <input type="text" class="form-control form-control-sm" name="karya" value="<?= $log['karya'] ?>" placeholder="Masukan Url Google Drive Karya Kamu...">
                         </div>
                         <div class="modal-footer">
                             <a href="<?= base_url('peserta/matalombadipilih') ?>" class="btn btn-red btn-sm">Batal</a>
                             <button class="btn btn-primary btn-sm" type="submit">submit</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </main>