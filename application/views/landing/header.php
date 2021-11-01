<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="<?= base_url(); ?>"><img src="<?= base_url('src/landing/'); ?>img/head/klepon1.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('landing/about') ?>">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('landing/contact') ?>">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#linkdrive">Unduh Juklakjuknis</a>
              </li>
              <?php
              $id = $this->session->userdata('id');
              if ($id) {
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->