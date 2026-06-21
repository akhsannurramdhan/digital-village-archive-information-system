<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>


<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Step Form -->

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <!-- Step -->
                <!-- End Step -->

                <!-- Content Step Form -->
                <div id="">
                    <!-- Card -->
                    <div id="addUserStepProfile" class="card card-lg active">
                        <!-- Body -->
                        <div class="card-body">
                            <form action="<?= base_url('admin/addUser'); ?>" method="post">
                                <!-- Nama Lengkap -->
                                <div class="row mb-4">
                                    <label for="fullName" class="col-sm-3 col-form-label form-label">
                                        Nama Lengkap
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Nama Lengkap" aria-label="Nama Lengkap" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="row mb-4">
                                    <label for="username" class="col-sm-3 col-form-label form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-label="Username" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="username" class="col-sm-3 col-form-label form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="username" class="col-sm-3 col-form-label form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="clarice@site.com" aria-label="Email" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="username" class="col-sm-3 col-form-label form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" aria-label="Jabatan" required>
                                    </div>
                                </div>

                                <!-- Role -->
                                <div class="row mb-4">
                                    <label for="roleDropdown" class="col-sm-3 col-form-label form-label">Role</label>
                                    <div class="col-sm-9">
                                        <div class="tom-select-custom">
                                            <select id="roleDropdown" name="role" class="js-select form-select" autocomplete="off"
                                                data-hs-tom-select-options='{
                                    "placeholder": "Select a role...",
                                    "hideSearch": true
                                    }' required>
                                                <option value="">Select a role...</option>
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?= $role->role_id; ?>"><?= $role->role_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                <a href="<?= base_url('admin/user_list'); ?>" class="btn btn-primary me-4">
                                        <i class="bi bi-back"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Form -->

                <!-- Form -->

                <!-- End Form -->
            </div>
            <!-- End Body -->

            <!-- Footer -->

            <!-- End Footer -->
        </div>


    </div>
    <!-- End Content Step Form -->

    <!-- Message Body -->
    <!-- End Message Body -->
    </div>
    </div>
    <!-- End Row -->
    <!-- End Step Form -->
    </div>
    <!-- End Content -->

    <!-- Footer -->


    <?= $this->include('templates/footer') ?>

    <!-- End Footer -->
</main>
<?= $this->endSection('page-content'); ?>