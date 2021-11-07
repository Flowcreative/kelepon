  <main>
      <header class="page-header page-header-dark bg-teal pb-10">
          <div class="container-xl px-4">
              <div class="page-header-content pt-4">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-auto mt-4">
                          <h1 class="page-header-title">
                              <div class="page-header-icon"><i data-feather="file"></i></div>
                              Input Data
                          </h1>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <!-- Main page content-->
      <div class="container-xl px-4 mt-n10">
          <div class="card">
              <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-9">
                      <!-- Social registration form-->
                      <hr class="my-0" />
                      <div class="card-body p-5">
                          <!-- Form Row-->
                          <div class="row gx-3">
                              <div class="col-md-12">
                                  <!-- Form Group (email address)-->
                                  <form action="<?= base_url('peserta/inputdatadiri') ?>" method="post">
                                      <div class="mb-3">
                                          <label class="text-gray-600 small" for="emailExample">Nama Lengkap</label>
                                          <input class="form-control form-control-solid" placeholder="" value="<?= $user['nama'] ?>" aria-label="Email Address" aria-describedby="emailExample" disabled />
                                          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                      </div>
                                      <div class="row gx-3">
                                          <div class="mb-3">
                                              <label class="text-gray-600 small" for="emailExample">Telepon</label>
                                              <input class="form-control form-control-solid" placeholder="" value="<?= $user['telepon'] ?>" aria-label="Email Address" aria-describedby="emailExample" disabled />
                                              <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>

                                      <div class="mb-3">
                                          <label class="text-gray-600 small" for="emailexample">Alamat email</label>
                                          <input class="form-control form-control-solid" placeholder="" value="<?= $user['email'] ?>" aria-label="Email Address" aria-describedby="emailExample" disabled />
                                          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                      </div>
                                      <!-- Form Row-->
                                      <div class="row gx-3">
                                          <div class="col-md-6">
                                              <!-- Form Group (choose password)-->
                                              <div class="mb-3">
                                                  <label class="text-gray-600 small" for="tempatLahir">Tempat lahir</label>
                                                  <input class="form-control form-control-solid" name="tempatlahir" type="text" placeholder="Tempat lahir" aria-label="Password" aria-describedby="tempatLahir" />
                                                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <!-- Form Group (confirm password)-->
                                              <div class="mb-3">
                                                  <label class="text-gray-600 small" for="confirmPasswordExample">Tanggal lahir</label>
                                                  <input class="form-control form-control-solid" name="tanggallahir" type="date" placeholder="" />
                                                  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- Form Row-->
                                      <div class="row gx-3">
                                          <div class="col-md-6">
                                              <!-- Form Group (choose password)-->
                                              <div class="mb-3">
                                                  <label class="text-gray-600 small" for="tempatLahir">Provinsi</label>
                                                  <input class="form-control form-control-solid" name="provinsi" type="text" placeholder="Provinsi tempat tinggal" aria-label="Password" aria-describedby="tempatLahir" />
                                                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <!-- Form Group (confirm password)-->
                                              <div class="mb-3">
                                                  <label class="text-gray-600 small" for="confirmPasswordExample">Kota/Kabupaten</label>
                                                  <input class="form-control form-control-solid" name="kota" type="text" placeholder="Kota tempat tinggal" aria-label="Confirm Password" aria-describedby="confirmPasswordExample" />
                                                  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mb-3">
                                          <label class="text-gray-600 small" for="emailexample">Detail Alamat</label>
                                          <input class="form-control form-control-solid" name="alamat" placeholder="Masukan alamat lengkap" aria-label="Email Address" aria-describedby="emailExample" />
                                          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                      </div>

                                      <!-- Form Group (Roles)-->
                                      <div class="mb-3">
                                          <label class="small mb-1">Golongan</label>
                                          <select class="form-select form-control-solid" name="golongan" aria-label="Default select example">
                                              <option selected disabled>Pilih golongan:</option>
                                              <?php
                                                foreach ($golongan as $gol) {
                                                ?>
                                                  <option value="<?= $gol['id'] ?>"><?= $gol['golongan'] ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                      <!-- Form Group (form submission)-->
                                      <div class="d-flex align-items-center justify-content-between mb-4">
                                          <button class="btn btn-primary" type="submit">Submit Data</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>