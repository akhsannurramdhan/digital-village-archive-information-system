<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="content" role="main" class="main">
  <!-- Content -->
  <div class="content container-fluid">
    <!-- Page Header -->
    <!-- End Page Header -->

    <!-- Stats -->
    <!-- End Stats -->

    <!-- Card -->
    <div class="card mb-3 mb-lg-5">
    <div class="content container-fluid">
      <!-- Step Form -->
      <form class="js-step-form py-md-5" data-hs-step-form-options='{
              "progressSelector": "#addUserStepFormProgress",
              "stepsSelector": "#addUserStepFormContent",
              "endSelector": "#addUserFinishBtn",
              "isValidate": false
            }'>
        <div class="row justify-content-lg-center">
          <div class="col-lg-8">
            <!-- Step -->
            <!-- End Step -->

            <!-- Content Step Form -->
            <div id="addUserStepFormContent">
              <!-- Card -->
              <div id="addUserStepProfile" class="card card-lg active">
                <!-- Body -->
                <div class="card-body">
                  <div class="row mb-4 d-flex justify-content-center text-center">
                    <h1 for="firstNameLabel">Selamat datang, <?= user()->username ?></h1>
                  </div>
                  <!-- Form -->
                  <div class="row mb-4">

                    <div class="col-sm-12">
                      <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <span class="avatar avatar-xl avatar-centered avatar-circle avatar-border-lg">
                        <img id="avatarImg" class="avatar-img" src="<?= base_url();?>/img/<?= user()->user_image; ?>" alt="Image Description">
                        </span>
                        <!-- End Avatar -->
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4 d-flex justify-content-center text-center">
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label">Username</label>
                    <label for="firstNameLabel" class="col-sm-1 col-form-label form-label">:</label>
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label"><?= user()->username; ?></label>
                  </div>
                  <!-- End Form -->
                  <!-- Form -->
                   <?php if (user()->fullname) :?>
                  
                    <div class="row mb-4 d-flex justify-content-center text-center">
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label">Fullname</label>
                    <label for="firstNameLabel" class="col-sm-1 col-form-label form-label">:</label>
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label"><?= user()->fullname; ?></label>
                  </div>
                  <?php else :?>
                    <?php endif;?>
                  <!-- End Form -->

                  <div class="row mb-4 d-flex justify-content-center text-center">
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label">Email</label>
                    <label for="firstNameLabel" class="col-sm-1 col-form-label form-label">:</label>
                    <label for="firstNameLabel" class="col-sm-2 col-form-label form-label"><?= user()->email; ?></label>
                  </div>
                  <!-- Form -->

                  <!-- Form -->
                  
                  <!-- End Form -->

                  <!-- Form -->
                  
                  <!-- End Form -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                  
                </div>
                <!-- End Footer -->
              </div>
              <!-- End Card -->

            
            <!-- End Content Step Form -->
            
            <!-- Message Body -->
            <div id="successMessageContent" style="display:none;">
              <div class="text-center">
                <img class="img-fluid mb-3" src="assets/svg/illustrations/oc-hi-five.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                <img class="img-fluid mb-3" src="assets/svg/illustrations-light/oc-hi-five.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">

                <div class="mb-4">
                  <h2>Successful!</h2>
                  <p>New <span class="fw-semibold text-dark">Ella Lauda</span> user has been successfully created.</p>
                </div>

                <div class="d-flex justify-content-center">
                  <a class="btn btn-white me-3" href="users.html">
                    <i class="bi-chevron-left ms-1"></i> Back to users
                  </a>
                  <a class="btn btn-primary" href="users-add-user.html">
                    <i class="bi-person-plus-fill me-1"></i> Add new user
                  </a>
                </div>
              </div>
            </div>
            <!-- End Message Body -->
          </div>
        </div>
        <!-- End Row -->
      </form>
      <!-- End Step Form -->
    </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <?= $this->include('templates/footer') ?>
  <!-- End Footer -->

</main>


<?= $this->endSection('page-content'); ?>