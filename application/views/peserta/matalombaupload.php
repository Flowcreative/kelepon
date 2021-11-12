 <main>
     <header class="page-header page-header-dark bg-teal pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                         <h1 class="page-header-title">
                             <div class="page-header-icon"><i data-feather="flag"></i></div>
                             Upload Data Peserta Lomba
                         </h1>
                         <div class="page-header-subtitle">Silahkan lengkapi data mata Lomba yang kamu pilih</div>
                     </div>
                 </div>
                 <nav class="mt-4 rounded" aria-label="breadcrumb">
                     <!-- <ol class="breadcrumb px-3 py-2 rounded mb-0">
                         <li class="breadcrumb-item"><a href="<?= base_url('peserta/matalomba') ?>">Mata Lomba</a></li>
                         <li class="breadcrumb-item active">Dipilih</li>
                     </ol> -->
                 </nav>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="row justify-content-center">
             <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                 <div class="card h-100">
                     <div class="card-header text-center"></div>
                     <div class="card-body d-flex flex-column">
                         <?= form_open_multipart('peserta/uploadsuratmandat'); ?>
                         <div class="modal-body">
                             <div class="row mb-4">
                                 <i class="fw-300">Surat mandat dari Gugus depan untuk anggota pramuka</i>
                                 <i class="fw-300">Surat mandat dari Instansi untuk Peserta umum</i>
                             </div>
                             <input type="hidden" name="hapus" value="<?= $datadiri['suratmandat'] ?>">
                             <input type="file" class="form-control form-control-sm" id="suratmandat" name="suratmandat" value="<?= $datadiri['suratmandat'] ?>">
                             <i class="text-red text-xs">*File Format .pdf|.png|.jpg</i>
                         </div>
                         <div class="modal-footer">
                             <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                             <button class="btn btn-primary btn-sm" type="submit">Unggah</button>
                         </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </main>