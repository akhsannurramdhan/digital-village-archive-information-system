<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>dashboard/assets/css/vendor.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>dashboard/assets/css/theme.minc619.css?v=1.0">
<link rel="preload" href="<?= base_url(); ?>dashboard/assets/css/theme.min.css" data-hs-appearance="default" as="style">
<link rel="preload" href="<?= base_url(); ?>dashboard/assets/css/docs.css" data-hs-appearance="default" as="style">
<link rel="preload" href="<?= base_url(); ?>dashboard/assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

<main id="content" role="main" class="main">
  <div class="content container-fluid">
    <div class="row justify-content-lg-center">
      <div class="col-lg-10">
        <div class="profile-cover">
          <div class="profile-cover-img-wrapper">
            <img class="profile-cover-img" src="<?= base_url(); ?>dashboard/img/1920x400/img1.jpg" alt="Image Description">
          </div>
        </div>
        <div class="text-center mb-5">
          <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
            <img class="avatar-img" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" alt="Image Description">
            <span class="avatar-status avatar-status-success"></span>
          </div>
          <h1 class="page-header-title">Welcome, <?= user()->fullname; ?> </h1>
        </div>

        <!-- Nav -->
        <div class="text-center">
          <ul class="nav nav-segment mb-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active fs-5 py-3" id="nav-one-eg1-tab" href="#nav-one-eg1" data-bs-toggle="pill" data-bs-target="#nav-one-eg1" role="tab" aria-controls="nav-one-eg1" aria-selected="true">Dashboard Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 py-3" id="nav-two-eg1-tab" href="#nav-two-eg1" data-bs-toggle="pill" data-bs-target="#nav-two-eg1" role="tab" aria-controls="nav-two-eg1" aria-selected="false">User Info</a>
            </li>
          </ul>
        </div>
        <!-- End Nav -->

        <!-- Tab Content -->
        <div class="tab-content">
          <!-- Tab One Content -->
          <div class="tab-pane fade show active" id="nav-one-eg1" role="tabpanel" aria-labelledby="nav-one-eg1-tab">
            <div class="row justify-content-center">
              <div class="d-grid gap-3 gap-lg-5 col-lg-10"> <!-- Lebarkan card dengan col-lg-10 -->
                <div class="card">
                  <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Informasi Dashboard</h4>
                  </div>
                  <div class="card-body" style="height: 10rem; overflow: hidden;">
                    <div class="row justify-content-center text-center">
                      <!-- Mengubah col-lg-3 menjadi col-lg-2 untuk 5 kolom -->
                      <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
                        <div class="js-counter h1 mb-1" data-hs-counter-options='{"isCommaSeparated": true}'><?= $totalUsers ?></div>
                        <span>Total Users</span>
                      </div>
                      <?php if (in_groups('admin')) : ?>
                        <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
                          <div class="js-counter h1 mb-1" data-hs-counter-options='{"isCommaSeparated": true}'><?= $totalArsip ?></div>
                          <span>Total Arsip</span>
                        </div>
                      <?php endif; ?>
                      <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
                        <div class="js-counter h1 mb-1" data-hs-counter-options='{"isCommaSeparated": true}'><?= $arsipByUser ?></div>
                        <span>Arsip di Input</span>
                      </div>
                      <?php if (in_groups('admin')) : ?>
                        <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
                          <div class="js-counter h1 mb-1" data-hs-counter-options='{"isCommaSeparated": true}'><?= $suratMasuk ?></div>
                          <span>Total Surat Masuk</span>
                        </div>
                        <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
                          <div class="js-counter h1 mb-1" data-hs-counter-options='{"isCommaSeparated": true}'><?= $suratKeluar ?></div>
                          <span>Total Surat Keluar</span>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <!-- End Row -->


          <!-- Tab Two Content -->
          <div class="tab-pane fade" id="nav-two-eg1" role="tabpanel" aria-labelledby="nav-two-eg1-tab">
            <div class="row">
              <div class="col-lg-4">
                <div id="accountSidebarNav"></div>
                <div class="js-sticky-block card mb-3 mb-lg-5" data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                  <div class="card-header">
                    <h4 class="card-header-title">Profile</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-py-2 text-dark mb-0">
                      <li class="pb-0"><span class="card-subtitle">About</span></li>
                      <li><i class="bi-person dropdown-item-icon"></i> <?= user()->username; ?></li>

                      <?php if (user()->fullname) : ?>
                        <li><i class="bi-person-circle dropdown-item-icon"> </i><?= user()->fullname; ?></li>
                      <?php endif; ?>
                      <li><i class="bi-at dropdown-item-icon"></i><?= user()->email; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="d-grid gap-3 gap-lg-5">
                  <div class="card">
                    <div class="card-header card-header-content-between">
                      <h4 class="card-header-title">Activity stream</h4>
                    </div>
                    <div class="card-body card-body-height" style="height: 30rem; overflow: auto;">
                      <!-- Step -->
                      <table class="table table-striped table-bordered w-100">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>IP Address</th>
                            <th>Waktu Login</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (!empty($loginActivities)): ?>
                            <?php foreach ($loginActivities as $activity): ?>
                              <tr>
                                <td><?= esc($activity['user_id']) ?></td>
                                <td><?= esc($activity['ip_address']) ?></td>
                                <td><?= esc($activity['date']) ?></td>
                                <td><?= $activity['success'] ? 'Success' : 'Failed' ?></td>
                              </tr>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="6">No login activity found.</td>
                            </tr>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Tab Content -->


      </div>
    </div>
  </div>

</main>

<?= $this->include('templates/footer') ?>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    new HSCounter('.js-counter');
  });
</script>
<?= $this->endSection('page-content'); ?>