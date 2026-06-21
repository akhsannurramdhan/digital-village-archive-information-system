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

    <!-- Loader Start -->
    <div class="loader">
      <div class="loader-content">
        <div class="loader-logo slideInDown">
          <!-- Your Logo Here -->
          <img src="<?= base_url() ?>/auth/img/loadinglogo.png" alt="Logo">
        </div>
        <div class="loader-caption slideInUp">
          <span class="loading-dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </span>
        </div>
      </div>
    </div>
    <!-- Loader End -->

    <!-- Custom HTML Start -->

    <!-- Main Screen Section Start-->
    <section id="main" class="main">
      <div class="container-fluid p-0 fullheight">
        <div class="row g-0 fullheight">

          <!-- Main Section Intro Start -->
          <div class="col-12 col-xl-6 main__intro">
            <div class="intro__content">

              <!-- Logo Start -->
              <div class="intro__logo">
                <img src="<?= base_url() ?>/auth/img/loadinglogo.svg" alt="Logo Desa">
              </div>
              <!-- Logo End -->

              <!-- Main Menu Start -->
              <div class="intro__menu">
                <nav>
                  <ul>
                    <li><a href="<?= base_url('login')?>" style="font-size: 30px;">Login</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Main Menu End -->

              <!-- Main Headline Start -->
              <div class="intro__headline">

                <!-- Headline Content Start -->
                <h2>
                  Sistem Arsip & Surat
                  <br>
                  Desa Sukalarang
                </h2>
                <a href="<?= base_url('login')?>" class="button button-l button-dark-outline">
                  <span class="button-caption">Login</span>
                </a>
                <!-- Headline Content End -->

              </div>
              <!-- Main Headline End -->

            </div>
          </div>
          <!-- Main Section Intro End -->

          <!-- Main Section Media Start -->
          <div class="col-12 col-xl-6 main__media">

            <!-- Main Section Image & Background Effect Start -->
            <div class="media__image media-1">

              <!-- Background Effect Start -->
              <!-- Background Effect End -->

              <!-- Color Layer Start -->
              <div class="color-layer color-layer-medium"></div>
              <!-- Color Layer End -->

            </div>
            <!-- Main Section Image & Background Effect End -->

          </div>
          <!-- Main Section Media End -->

        </div>
      </div>
    </section>
    <!-- Main Screen Section End -->

    <!-- About Us Section Start -->
    
    <!-- About Us Section End -->

    


    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

      <!-- Background of PhotoSwipe.
      It's a separate element, as animating opacity is faster than rgba(). -->
      <div class="pswp__bg"></div>

      <!-- Slides wrapper with overflow:hidden. -->
      <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

          <div class="pswp__top-bar">

            <!--  Controls are self-explanatory. Order can be changed. -->

            <div class="pswp__counter"></div>

            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

            <button class="pswp__button pswp__button--share" title="Share"></button>

            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

            <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
            <!-- element will get class pswp__preloader-active when preloader is running -->
            <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
            </div>
          </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

      </div>

    </div>

    
    <!-- Load Scripts Start -->
    <script src="<?= base_url() ?>/auth/js/libs.min.js"></script>
    <script src="<?= base_url() ?>/auth/js/gallery-init.js"></script>
    <script src="<?= base_url() ?>/auth/js/ramio-custom.js"></script>
    <script src="<?= base_url() ?>/auth/js/maps/map-monochrome.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNMDtmEsvSevM4ztfsbhLfLNZhKHCvWXk"></script>
    <!-- Load Scripts End -->

  </body>


<!-- Mirrored from mixdesign.club/themeforest/ramio/index-monochrome-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 May 2024 17:11:00 GMT -->
</html>
