<!DOCTYPE html>
<html lang="en" dir="ltr">

  
<head>
    <meta charset="utf-8">

    <!-- Page Title-->
    <title>Sistem Arsip Desa Sukalarang</title>

    <!-- Meta Tags-->
    <meta name="description" content="Ramio - incredible coming soon template to kick-start your project">
    <meta name="keywords" content="ramio, coming soon, under construction, template, coming soon page, html5, css3">
    <meta name="author" content="mix_design">

    <!-- Viewport Meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Favicon & Icons Start -->
    <link rel="icon" href="<?= base_url() ?>/auth/img/loadinglogo.svg" sizes="any">
    <link rel="icon" href="<?= base_url() ?>/auth/img/loadinglogo.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?= base_url() ?>/auth/img/favicon/monochrome/apple-touch-icon.png">
    <link rel="manifest" href="<?= base_url() ?>/auth/img/favicon/monochrome/manifest.webmanifest">
    <!-- Template Favicon & Icons End -->

    <!-- Facebook Metadata Start -->
    <!-- Facebook Metadata End -->

    <!-- Template Styles Start -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/auth/css/loaders/loader-monochrome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/auth/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/auth/css/main.css">
    <!-- Template Styles End -->

    <!-- Custom Browser Color Start -->
    <meta name="theme-color" content="#24262b">
    <meta name="msapplication-navbutton-color" content="#24262b">
    <meta name="apple-mobile-web-app-status-bar-style" content="#24262b">
    <!-- Custom Browser Color End -->

  </head>
  <body>
      <div class="container-fluid p-0 fullheight">
        <div class="row g-0 flex-xl-row-reverse fullheight">

          <!-- About Info Scroll (on Desktop) Start -->
          <div class="col-12 col-xl-6 scroll scroll-left about__info">
            <div class="blocks no-padding-bottom">

              <!-- Close Button Start -->
              <div class="section-controls">
                <a href="<?= base_url('/')?>" >
                  <span class="material-icons">arrow_back</span>
                </a>
              </div>
              <!-- Close Button End -->

              <!-- Section Title Start -->
              <div class="blocks__single section-title">
                <h2><?=lang('Auth.loginTitle')?>
                </h2>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form class="form form-dark contact-form" method="post" action="<?= url_to('login') ?>">
                <?= csrf_field() ?>
                <div class="form-container">
                <div class="container-fluid p-0">
                  <div class="row gx-5">
                  <?php if ($config->validFields === ['email']): ?>
                    <div class="col-12 col-md-6">
                        <label for="login">Username</label>
                         <input type="text" name="login" class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.email')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="col-12 col-md-6">
                        <label for="login">Username</label>
                         <input type="text" name="login" class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.emailOrUsername')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-12 col-md-6">
                      <label for="password">Pasword</label>
                      <input type="password" name="password" placeholder="Password" class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                        <div class="invalid-feedback">
                        <?= session('errors.password') ?>
							</div>
                    </div>
                    
                    <div class="col-12">
                      <button class="button button-l button-dark-outline" type="submit"> <?=lang('Auth.loginAction')?>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
              </div>
              <!-- Section Title End -->
            </div>
          </div>
          <!-- About Info Scroll (on Desktop) End -->

          <!-- About Single Photo Static (on Desktop) Start -->
          <div class="col-12 col-xl-6 static fullheight about__photo static-bg-1"></div>
          <!-- About Single Photo Static (on Desktop) End -->

        </div>
      </div>
  </body>


  <script src="<?= base_url() ?>/auth/js/libs.min.js"></script>
    <script src="<?= base_url() ?>/auth/js/gallery-init.js"></script>
    <script src="<?= base_url() ?>/auth/js/ramio-custom.js"></script>
    <script src="<?= base_url() ?>/auth/js/maps/map-monochrome.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNMDtmEsvSevM4ztfsbhLfLNZhKHCvWXk"></script>