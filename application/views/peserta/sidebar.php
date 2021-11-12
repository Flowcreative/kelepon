<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <!-- <div class="sidenav-menu-heading d-sm-none">Account</div> -->
                    <!-- Sidenav Link (Alerts)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <!-- <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                    </a> -->
                    <!-- Sidenav Link (Messages)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <!-- <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                    </a> -->
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link" href="<?= base_url('peserta') ?>">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </a>
                    <!-- Sidenav Heading (Custom)-->
                    <div class="sidenav-menu-heading">Data Peserta</div>
                    <!-- Sidenav Accordion (Pages)-->
                    <a class="nav-link" href="<?= base_url('peserta/datadiri') ?>">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        Data Diri Peserta
                    </a>
                    <!-- Sidenav Heading (UI Toolkit)-->
                    <div class="sidenav-menu-heading">Lomba Management</div>
                    <!-- Sidenav Accordion (Utilities)-->
                    <a class="nav-link" href="<?= base_url('peserta/matalomba') ?>" disabled>
                        <div class="nav-link-icon"><i class="fas fa-flag-checkered"></i></div>
                        Pilih Mata Lomba
                    </a>
                    <a class="nav-link" href="<?= base_url('peserta/matalombadipilih') ?>" disabled>
                        <div class="nav-link-icon"><i class="fas fa-flag"></i></div>
                        Mata Lomba Dipilih
                    </a>
                    <!-- Sidenav Heading (Addons)-->
                    <div class="sidenav-menu-heading">Pembayaran</div>
                    <!-- Sidenav Link (Charts)-->
                    <a class="nav-link disabled" href="#">
                        <div class="nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                        Total Pembayaran
                    </a>
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?= $user['nama'] ?></div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">