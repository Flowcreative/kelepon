  <!--================Home Banner Area =================-->
  <section class="home_banner_area">
      <div class="banner_inner">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="home_left_img">
                          <img src="<?= base_url('src/landing/') ?>img/banner/home-left-1.png" alt="">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="banner_content">
                          <h5>Salam pramuka</h5>
                          <h3>Segera daftarkan pangkalan anda</h3>
                          <p>Menjunjung tinggi sportifitas dan meningkatkan Solidaritas untuk Pramuka OKE (Optimis Kreatif Edikatif)</p>
                          <?php $id = $this->session->userdata('id');
                            if ($id) { ?>
                              <a class="banner_btn" href="<?= base_url('auth/login') ?>">Dashboard</a>
                          <?php } else { ?>
                              <a class="banner_btn" href="<?= base_url('auth/login') ?>">Registrasi</a>
                          <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================End Home Banner Area =================-->
  <!-- ============================ Timeline Kegiatan =========================================-->
  <section class="feature_area p_120" id="tema">
      <div class="container">
          <div class="feature_inner row">
              <div class="col-lg-6 col-sm-12">
                  <div class="card h-100">
                      <div class="card-body text-center mt-4">
                          <div class="col-12">
                              <p class="text-lg fw-800">Moto</p>
                              <p>“Satyaku kudarmakan Darmaku Kubaktikan”</p>
                              <p class="text-lg fw-800">Tema</p>
                              <p>“Menjunjung tinggi sportifitas dan meningkatkan solidaritas untuk Pramuka OKE (Optimis, Kreatif, dan Edukatif)”</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6  col-sm-12">
                  <div class="card card-header-actions h-100">
                      <div class="card-body">
                          <p class="text-lg fw-800">Timeline Kelepon</p>
                          <div class="timeline timeline-xs">
                              <?= timeline() ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- ============================ end Timeline Kegiatan =========================================-->
  <!--================Welcome Area =================-->
  <section class="welcome_area p_120">
      <div class="container">
          <div class="row welcome_inner text-center">
              <h4>Sasaran kegiatan</h4>
              <p>Pada Kegiatan ini perencanaan peserta terdiri dari berbagai golongan dari golongan Siaga (SD) aktif se-Provinsi Bengkulu, Penggalang aktif se-Sumatera Bagian Selatan (Bengkulu, Sumatera Selatan, Bangka Belitung, Lampung), Penegak (SMA), Pandega dan mahasiswa aktif se-Indonesia.</p>

          </div>
      </div>
  </section>
  <!--================End Welcome Area =================-->

  <!-- ==================logo are ===================== -->
  <section class="feature_area p_120" id="maskot">
      <div class="container">
          <div class="feature_inner row">
              <div class="col-lg-4 col-sm-4">
                  <div class="home_left_img">
                      <img src="<?= base_url('src/landing/') ?>img/banner/home-left-1.png" alt="">
                  </div>
              </div>
              <div class="col-lg-8 col-sm-8">
                  <div class="card h-100">
                      <div class="card-body  mt-4 ">
                          <p class="text-lg fw-800">Salam Pramuka!!</p </div>
                          <p class="text-lg fw-600">Namaku popon, duh bingung nih mau kenalan dari mana.</p </div>
                          <p class="text-lg fw-600">OO iya, aku maskot lomba kelepon loh. Kok bisa jadi maskot?</p </div>
                          <p class="text-lg fw-600">Apa karna aku manis ya? atau karena rambutku cukup menarik layaknya kelepon hehehe.</p </div>
                          <p class="text-lg fw-600">Tapi yang jelas kelepon itu Kreatif, Sportif dan OKE azeeekk. Yaudah segitu dulu kenalannya. Kalau ingin tahu lebih banyak, Ayok gabung biar bisa berkegiatan bareng aku wwkwkwk</p </div>

                      </div>
                  </div>
              </div>
          </div>
  </section>
  <!-- ==========================end logo area ===================== -->