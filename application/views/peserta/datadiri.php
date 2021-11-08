  <main>
      <header class="page-header page-header-dark bg-teal pb-10">
          <div class="container-xl px-4">
              <div class="page-header-content pt-4">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-auto mt-4">
                          <h1 class="page-header-title">
                              <div class="page-header-icon"><i data-feather="file"></i></div>
                              Detail Data Diri
                          </h1>
                          <div class="page-header-subtitle">Anda dapat mengubah kembali data anda jika terdapat kesalahan</div>
                      </div>
                      <!-- <div class="col-12 col-xl-auto mt-4">Optional page header content</div> -->
                  </div>
              </div>
          </div>
      </header>
      <!-- Main page content-->
      <div class="container-xl px-4 mt-n10">
          <div class="card">
              <div class="card-header row">
                  <div class="col-auto">Data Diri</div>

              </div>
              <!-- Button trigger modal -->
              <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editdatadiri">Edit Data Diri</button>

              <div class="card-body">
                  <div class="row mb-2">
                      <div class="col-3">Nama</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['nama'] ?></div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-3">Tempat, Tanggal lahir</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['tempatlahir'] . ', ' . $datadiri['tanggallahir'] ?></div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-3">Alamat</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['alamat'] . ', ' . $datadiri['kota'] . ', ' . $datadiri['provinsi'] ?></div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-3">Golongan</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['golongan'] ?></div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-3">Email</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['email'] ?></div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-3">Nomor HP/WA</div>
                      <div class="col-1">:</div>
                      <div class="col-8"><?= $datadiri['telepon'] ?></div>
                  </div>
              </div>
          </div>
      </div>
      <!--=========================== Data Pangkalan ======================================-->
      <div class="container-xl px-4 mt-4">
          <div class="card">
              <div class="card-header row">
                  <div class="col-auto">Data Pangkalan</div>
              </div>
              <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editpangkalan">Edit pangkalan</button>


              <div class="card-body">
                  <?php if ($pangkalan) { ?>
                      <div class="row mb-2">
                          <div class="col-3">Nama pangkalan</div>
                          <div class="col-1">:</div>
                          <div class="col-8"><?= $pangkalan['namapangkalan'] ?></div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-3">Nomor gudep</div>
                          <div class="col-1">:</div>
                          <div class="col-8"><?= $pangkalan['nogudep'] ?></div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-3">Kota</div>
                          <div class="col-1">:</div>
                          <div class="col-8"><?= $pangkalan['kotapangkalan'] ?></div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-3">Provinsi</div>
                          <div class="col-1">:</div>
                          <div class="col-8"><?= $pangkalan['provinsipangkalan'] ?></div>
                      </div>
                  <?php } else { ?>
                      <button class="btn btn-red btn-xl" type="button" data-bs-toggle="modal" data-bs-target="#inputdatapangkalan">Lengkapi data pangkalan</button>
                  <?php } ?>
              </div>
          </div>
      </div>

      <!-- ================================  Upload data pelengkap ========================================== -->
      <div class="container-xl px-4 mt-4">
          <div class="card">
              <div class="card-header">Berkas pelengkap</div>
              <div class="card-body">
                  <div class="row mb-4">
                      <div class="col-3">
                          <p class="fw-500">Pas Foto</p>
                      </div>
                      <div class="col-1">:</div>
                      <div class="col-6">
                          <?php if ($datadiri['foto'] > 0) { ?>
                              <i class="text-green"><?= $datadiri['foto'] ?></i>
                          <?php } else { ?>
                              <i class="text-red">Pas foto belum di upload</i>
                          <?php }  ?>
                      </div>
                      <div class="col-2 text-center">
                          <?php if ($datadiri['foto'] > 0) { ?>
                              <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#uploadfoto">Ubah foto</button>
                          <?php } else { ?>
                              <button class="btn btn-red btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#uploadfoto">Unggah foto</button>
                          <?php }  ?>
                      </div>
                  </div>
                  <div class="row mb-4">
                      <div class="col-3">
                          <p class="fw-500">Kartu Identitas</p>
                      </div>
                      <div class="col-1">:</div>
                      <div class="col-6">
                          <?php if ($datadiri['kartu_identitas'] > 0) { ?>
                              <i class="text-green"><?= $datadiri['kartu_identitas'] ?></i>
                          <?php } else { ?>
                              <i class="text-red">Kartu identitas belum di upload</i>
                          <?php }  ?>
                      </div>
                      <div class="col-2 text-center">
                          <?php if ($datadiri['kartu_identitas'] > 0) { ?>
                              <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#uploadIdentitas">Ubah Identitas</button>
                          <?php } else { ?>
                              <button class="btn btn-red btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#uploadIdentitas">Unggah Identitas</button>
                          <?php }  ?>
                      </div>
                  </div>
                  <div class="row mb-4">
                      <div class="col-3">
                          <p class="fw-500">Surat mandat / Pengantar</p>
                      </div>
                      <div class="col-1">:</div>
                      <div class="col-6">
                          <?php if ($datadiri['suratmandat'] > 0) { ?>
                              <i class="text-green"><?= $datadiri['suratmandat'] ?></i>
                          <?php } else { ?>
                              <i class="text-red">Surat pengantar belum di upload</i>
                          <?php }  ?>
                      </div>
                      <div class="col-2 text-center">
                          <?php if ($datadiri['suratmandat'] > 0) { ?>
                              <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#suratmandat">Ubah surat</button>
                          <?php } else { ?>
                              <button class="btn btn-red btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#suratmandat">Unggah surat</button>

                          <?php }  ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>


  <!-- Modal  foto-->
  <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="uploadfotoTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="uploadfotoTitle">Unggah Pas Foto</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <?= form_open_multipart('peserta/uploadfoto'); ?>
              <div class="modal-body">
                  <div class="row mb-4">
                      <i class="text-red">Bagi anggota Pramuka pas foto diwajibkan menggunakan SPL</i>
                  </div>
                  <input type="hidden" name="hapus" value="<?= $datadiri['foto'] ?>">
                  <input type="file" class="form-control form-control-sm" id="image" name="image" value="<?= $datadiri['foto'] ?>">
                  <i class="text-red text-xs">*File Format .png|.jpg</i>
              </div>
              <div class=" modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary btn-sm" type="submit">Unggah</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal  Indentitas-->
  <div class="modal fade" id="uploadIdentitas" tabindex="-1" role="dialog" aria-labelledby="uploadIdentitasTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="uploadIdentitasTitle">Unggah Tanda Identitas</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <?= form_open_multipart('peserta/uploadidentitas'); ?>
              <div class="modal-body">
                  <div class="text-red row">
                      <div class="col-3">- Siaga</div>
                      <div class="col-1">~></div>
                      <div class="col-6">KTA Pramuka/Biodata Raport</div>
                  </div>
                  <div class="text-red row">
                      <div class="col-3">- Penggalang</div>
                      <div class="col-1">~></div>
                      <div class="col-6">KTA Pramuka/Biodata Raport</div>
                  </div>
                  <div class="text-red row">
                      <div class="col-3">- Penegak</div>
                      <div class="col-1">~></div>
                      <div class="col-6">KTA Pramuka/Biodata Raport/KTM</div>
                  </div>
                  <div class="text-red row">
                      <div class="col-3">- Penegak</div>
                      <div class="col-1">~></div>
                      <div class="col-6">KTA Pramuka / KTM</div>
                  </div>
                  <div class="text-red row">
                      <div class="col-3">- Umum</div>
                      <div class="col-1">~></div>
                      <div class="col-6">Kartu Tanda Mahasiswa (KTM)</div>
                  </div>


                  <input type="hidden" name="hapus" value="<?= $datadiri['kartu_identitas'] ?>">
                  <input type="file" class="form-control form-control-sm" id="identitas" name="identitas" value="<?= $datadiri['kartu_identitas'] ?>">
                  <i class="text-red text-xs">*File Format .pdf|.png|.jpg</i>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary btn-sm" type="submit">Unggah</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Surat mandat-->
  <div class="modal fade" id="suratmandat" tabindex="-1" role="dialog" aria-labelledby="suratmandatTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="suratmandatTitle">Unggah surat Pengantar</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
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


  <!-- Modal Pangkalan-->
  <div class="modal fade" id="inputdatapangkalan" tabindex="-1" role="dialog" aria-labelledby="inputdatapangkalanTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="inputdatapangkalanTitle">Input Data Pangkalan</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('peserta/inputdatapangkalan') ?>" method="post">
                      <!-- Form Row-->
                      <div class="row gx-3">
                          <div class="mb-3">
                              <input class="form-control form-control-solid" name="nama" placeholder="Nama pangkalan" aria-label="Email Address" aria-describedby="emailExample" />
                          </div>
                          <div class="col-md-4 mt-3">
                              <!-- Form Group (choose password)-->
                              <h4 class="text-gray-600 small" for="emailExample">Nomor Gudep</h4>
                          </div>
                          <div class="col-md-2">
                              <!-- Form Group (choose password)-->
                              <div class="mb-3">
                                  <input class="form-control form-control-solid text-center" name="ranting" type="text" placeholder="**" max="99" />
                              </div>
                          </div>
                          <div class="col-md-3">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <input class="form-control form-control-solid text-center" name="gudep" type="text" placeholder="***" />
                              </div>
                          </div>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3">
                          <div class="col-md-6">
                              <!-- Form Group (choose password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="tempatLahir">Provinsi</label>
                                  <input class="form-control form-control-solid" name="provinsi" type="text" placeholder="Provinsi gudep" />
                              </div>
                          </div>
                          <div class="col-md-6">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="confirmPasswordExample">Kota/Kabupaten</label>
                                  <input class="form-control form-control-solid" name="kota" type="text" placeholder="Kota/Kabupaten gudep" />
                              </div>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal edit data diri-->
  <div class="modal fade" id="editdatadiri" tabindex="-1" role="dialog" aria-labelledby="editdatadiriTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editdatadiriTitle">Edit Data Diri</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('peserta/editdatadiri') ?>" method="post">
                      <div class="mb-3">
                          <label class="text-gray-600 small" for="emailExample">Nama Lengkap</label>
                          <input class="form-control form-control-solid" name="nama" type="text" placeholder="Masukan nama" value="<?= $user['nama'] ?>" />
                          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="row gx-3">
                          <div class="mb-3">
                              <label class="text-gray-600 small" for="emailExample">Telepon</label>
                              <input class="form-control form-control-solid" name="telepon" type="text" placeholder="Masukan nomor telepon" value="<?= $user['telepon'] ?>" />
                              <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                          </div>
                      </div>

                      <div class="mb-3">
                          <label class="text-gray-600 small" for="emailexample">Alamat email</label>
                          <input class="form-control form-control-solid" name="email" type="email" placeholder="Masukan alamat email" value="<?= $user['email'] ?>" />
                          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3">
                          <div class="col-md-6">
                              <!-- Form Group (choose password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="tempatLahir">Tempat lahir</label>
                                  <input class="form-control form-control-solid" name="tempatlahir" type="text" placeholder="Tempat lahir" value="<?= $datadiri['tempatlahir'] ?>" />
                                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                              </div>
                          </div>
                          <div class=" col-md-6">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="confirmPasswordExample">Tanggal lahir</label>
                                  <input class="form-control form-control-solid" name="tanggallahir" type="date" placeholder="" value="<?= $datadiri['tanggallahir'] ?>" />
                                  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                              </div>
                          </div>
                      </div>
                      <!-- Form Row-->
                      <div class=" row gx-3">
                          <div class="col-md-6">
                              <!-- Form Group (choose password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="tempatLahir">Provinsi</label>
                                  <input class="form-control form-control-solid" name="provinsi" type="text" placeholder="Provinsi tempat tinggal" value="<?= $datadiri['provinsi'] ?>" />
                                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                              </div>
                          </div>
                          <div class=" col-md-6">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="confirmPasswordExample">Kota/Kabupaten</label>
                                  <input class="form-control form-control-solid" name="kota" type="text" placeholder="Kota tempat tinggal" value="<?= $datadiri['kota'] ?>" />
                                  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                              </div>
                          </div>
                      </div>
                      <div class=" mb-3">
                          <label class="text-gray-600 small" for="emailexample">Detail Alamat</label>
                          <input class="form-control form-control-solid" name="alamat" placeholder="Masukan alamat lengkap" value="<?= $datadiri['alamat'] ?>" />
                          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>

                      <!-- Form Group (Roles)-->
                      <div class="mb-3">
                          <label class="small mb-1">Golongan</label>
                          <select class="form-select form-control-solid" name="golongan" aria-label="Default select example">
                              <option selected value="<?= $datadiri['idgolongan'] ?>"><?= $datadiri['golongan'] ?></option>
                              <?php
                                foreach ($golongan as $gol) {
                                ?>
                                  <option value="<?= $gol['idgolongan'] ?>"><?= $gol['golongan'] ?></option>
                              <?php } ?>
                          </select>
                      </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-green btn-sm" type="submit">Simpan perubahan</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="editpangkalan" tabindex="-1" role="dialog" aria-labelledby="editpangkalanTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editpangkalanTitle">Edit Data Pangkalan</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('peserta/editdatapangkalan') ?>" method="post">
                      <!-- Form Row-->
                      <div class="row gx-3">
                          <div class="col-md-4 mt-3">
                              <!-- Form Group (choose password)-->
                              <h4 class="text-gray-600 small" for="emailExample">Nomor Gudep</h4>
                          </div>
                          <div class="col-md-3">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <input name="idpangkalan" type="hidden" value="<?= $pangkalan['id_pangkalan'] ?>" />
                                  <input class="form-control form-control-solid text-center" name="gudep" type="text" placeholder="**.***" value="<?= $pangkalan['nogudep'] ?>" />
                              </div>
                          </div>
                          <div class="mb-3">
                              <input class="form-control form-control-solid" name="nama" placeholder="Nama pangkalan" value="<?= $pangkalan['namapangkalan'] ?>" />
                          </div>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3">
                          <div class="col-md-6">
                              <!-- Form Group (choose password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="tempatLahir">Provinsi</label>
                                  <input class="form-control form-control-solid" name="provinsi" type="text" placeholder="Provinsi gudep" value="<?= $pangkalan['provinsipangkalan'] ?>" />
                              </div>
                          </div>
                          <div class="col-md-6">
                              <!-- Form Group (confirm password)-->
                              <div class="mb-3">
                                  <label class="text-gray-600 small" for="confirmPasswordExample">Kota/Kabupaten</label>
                                  <input class="form-control form-control-solid" name="kota" type="text" placeholder="Kota/Kabupaten gudep" value="<?= $pangkalan['kotapangkalan'] ?>" />
                              </div>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-green btn-sm" type="submit">Simpan Perubahan</button>
                  </form>
              </div>
          </div>
      </div>
  </div>