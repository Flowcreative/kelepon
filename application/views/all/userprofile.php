 <main>
     <header class="page-header page-header-dark bg-teal pb-10">
         <div class="container-xl px-4">
             <div class="page-header-content pt-4">
                 <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                         <h1 class="page-header-title">
                             <div class="page-header-icon"><i data-feather="user"></i></div>
                             Profile Settings
                         </h1>
                     </div>
                 </div>
             </div>
         </div>
     </header>
     <!-- Main page content-->
     <div class="container-xl px-4 mt-n10">
         <div class="row">
             <div class="col-xl-7">
                 <!-- Account details card-->
                 <div class="card mb-4">
                     <div class="card-header">Account Details</div>
                     <?= $this->session->flashdata('uploadpp'); ?>
                     <?= $this->session->flashdata('update'); ?>
                     <div class="card-body">
                         <div class="text-center">
                             <!-- Profile picture image-->
                             <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('src/dashboard/') ?>assets/img/user/<?= $user['pp'] ?>" alt="" />
                             <!-- Profile picture help block-->
                             <div class="small font-italic text-muted mb-4"></div>
                             <!-- Profile picture upload button-->
                             <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ppchange">Ganti foto</button>


                         </div>
                         <form action="<?= base_url('auth/updateprofile') ?>" method="post">
                             <!-- Form Group (username)-->
                             <div class="mb-3 mt-4">
                                 <label class="small mb-1" for="inputUsername">Nama Lengkap</label>
                                 <input class="form-control" id="inputUsername" name="nama" type="text" placeholder="Enter your username" value="<?= $user['nama'] ?>" />
                             </div>
                             <!-- Form Row-->
                             <div class="row gx-3 mb-3">
                                 <!-- Form Group (first name)-->
                                 <div class="col-md-6 mt-3">
                                     <label class="small mb-1" for="inputFirstName">Email</label>
                                     <input class="form-control" id="inputFirstName" name="email" type="email" placeholder="Enter your first name" value="<?= $user['email'] ?>" />
                                 </div>
                                 <!-- Form Group (last name)-->
                                 <div class="col-md-6 mt-3">
                                     <label class="small mb-1" for="inputLastName">Nomor HP/WA</label>
                                     <input class="form-control" id="inputLastName" name="telepon" type="text" placeholder="Enter your last name" value="<?= $user['telepon'] ?>" />
                                 </div>
                             </div>
                             <!-- Save changes button-->
                     </div>
                     <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
                     </form>
                 </div>
             </div>
             <div class="col-xl-5">
                 <!-- Profile picture card-->
                 <div class="card mb-4 mb-xl-0">
                     <div class="card-header">Ganti Password</div>
                     <?= $this->session->flashdata('yeay'); ?>
                     <div class="card-body">
                         <form action="<?= base_url('auth/updatepassword') ?>" method="post">
                             <!-- Form Group (current password)-->
                             <div class="mb-3">
                                 <input class="form-control" name="password" type="password" placeholder="Masukan password lama" />
                             </div>
                             <!-- Form Group (new password)-->
                             <div class="mb-3">
                                 <input class="form-control" name="password1" type="password" placeholder="Masukan password baru" />
                             </div>
                             <!-- Form Group (confirm password)-->
                             <div class="mb-3">
                                 <input class="form-control" name="password2" type="password" placeholder="Konfirmasi password baru" />
                                 <?= $this->session->flashdata('pwd'); ?>
                             </div>
                     </div>
                     <button class="btn btn-primary btn-block btn-sm" type="submit">Ganti Password</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </main>


 <!-- Modal -->
 <div class="modal fade" id="ppchange" tabindex="-1" role="dialog" aria-labelledby="ppchangeTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="ppchangeTitle">Upload Profile Picture</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <?= form_open_multipart('auth/gantipp'); ?>
             <div class="modal-body">
                 <div class="row mb-4">
                     <i class="fw-300 text-red">Ukuran file foto maksimal 5MB</i>
                 </div>
                 <input type="hidden" name="hapus" value="<?= $user['pp'] ?>">
                 <input type="file" class="form-control form-control-sm" id="pp" name="pp" value="<?= $user['pp'] ?>">
                 <p class="text-red text-xs">*File Format .png|.jpg</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
                 <button class="btn btn-success btn-sm" type="submit">Save change</button>
             </div>
             </form>
         </div>
     </div>
 </div>