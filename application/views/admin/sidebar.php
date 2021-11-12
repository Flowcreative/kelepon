<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">

                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link" href="<?= base_url('admin') ?>">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </a>
                    <!-- Sidenav Heading (Custom)-->
                    <div class="sidenav-menu-heading">User & Peserta</div>
                    <!-- Sidenav Accordion (Pages)-->
                    <a class="nav-link" href="<?= base_url('admin/userlist') ?>">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        User List
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/datadiripeserta') ?>">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        Data Diri Peserta
                    </a>
                    <!-- Sidenav Heading (UI Toolkit)-->
                    <div class="sidenav-menu-heading">Lomba Management</div>
                    <!-- Sidenav Accordion (Utilities)-->
                    <a class="nav-link" href="<?= base_url('admin/inputlomba') ?>">
                        <div class="nav-link-icon"><i class="fas fa-flag-checkered"></i></div>
                        Mata Lomba
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/siaga') ?>">
                        <div class="nav-link-icon"><i class="fas fa-flag"></i></div>
                        Peserta Siaga
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/penggalang') ?>">
                        <div class="nav-link-icon"><i class="fas fa-flag"></i></div>
                        Peserta Penggalang
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/penegak') ?>">
                        <div class="nav-link-icon"><i class="fas fa-flag"></i></div>
                        Peserta Penegak
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/pandega') ?>">
                        <div class="nav-link-icon"><i class="fas fa-flag"></i></div>
                        Peserta Pandega (Umum)
                    </a>
                    <!-- Sidenav Heading (Addons)-->
                    <!-- <div class="sidenav-menu-heading">Plugins</div> -->
                    <!-- Sidenav Link (Charts)-->
                    <!-- <a class="nav-link" href="charts.html">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Charts
                    </a> -->
                    <!-- Sidenav Link (Tables)-->
                    <!-- <a class="nav-link" href="tables.html">
                        <div class="nav-link-icon"><i data-feather="filter"></i></div>
                        Tables
                    </a> -->
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