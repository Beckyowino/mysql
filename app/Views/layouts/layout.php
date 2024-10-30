<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Smart shule</title>
  
  <!-- Correct the paths using base_url -->
  <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>" />
</head>
<body>
  <div class="container-scroller d-flex">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Pages</p>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('view_students') ?>"> View students </a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('register_student') ?>"> Register students </a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.svg') ?>" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo-mini.svg') ?>" alt="logo"/></a>
          </div>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
            <?php if (isset($showSearchBar) && $showSearchBar): ?>
              <div class="input-group">
                <input type="text" class="form-control" id="search-input" placeholder="Search Here..." aria-label="search" aria-describedby="search">
              </div>
              <?php else: ?>
              <!-- Search bar is invisible -->
              <style>
                  #search-input {
                      display: none;
                  }
              </style>
              <?php endif; ?>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?= auth()->user()->username ?? 'Guest' ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="<?php echo base_url() ?>logout">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="main-panel">
        <div class="content-wrapper">
    <!-- Main content -->
        <?= $this->renderSection('content') ?>
        </div>
      </div>
    </div>
  </div>
  
  <!-- base:js -->
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets/js/template.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
</body>
</html>
