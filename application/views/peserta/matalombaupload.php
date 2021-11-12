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
                     <div class="card-header text-center">Upload Data Peserta Lomba</div>
                     <div class="card-body d-flex flex-column">
                         <?= form_open_multipart('peserta/matalombaupload/' . $log['id_lomba']); ?>
                         <div class="modal-body">
                             <div class="row mb-4">
                                 <p class="fw-600 text-lg">Isi file .pdf :</p>
                                 <p class="fw-300">1. Foto Peserta</p>
                                 <p class="fw-300">2. Kartu Identitas Peserta</p>
                                 <p class="fw-300">3. Surat Mandat</p>
                             </div>
                             <input type="hidden" name="hapus" value="<?= $log['identitas'] ?>">
                             <input type="file" class="form-control form-control-sm" id="identitas" name="identitas" value="<?= $log['identitas'] ?>">
                             <i class="text-red text-xs">*File Format .pdf</i>
                         </div>
                         <div class="modal-footer">
                             <a href="<?= base_url('peserta/matalombadipilih') ?>" class="btn btn-red btn-sm">Batal</a>
                             <button class="btn btn-primary btn-sm" type="submit">Unggah</button>
                         </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </main>