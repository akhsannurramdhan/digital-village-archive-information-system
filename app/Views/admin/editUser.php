<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div id="editUserStepProfile" class="card card-lg active">
                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form Edit User -->
                        <form action="<?= base_url('admin/updateUser/' . $user->id); ?>" method="post">
    <?= csrf_field(); ?>
    
    <!-- Nama Lengkap -->
    <div class="row mb-4">
        <label for="fullName" class="col-sm-3 col-form-label form-label">Nama Lengkap</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Nama Lengkap" value="<?= esc($user->fullname); ?>" required>
        </div>
    </div>

    <!-- Username -->
    <div class="row mb-4">
        <label for="username" class="col-sm-3 col-form-label form-label">Username</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= esc($user->username); ?>" required>
        </div>
    </div>

    <!-- Password -->
    <div class="row mb-4">
        <label for="password" class="col-sm-3 col-form-label form-label">Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">
            <small class="text-muted">Kosongkan jika tidak ingin diubah</small>
        </div>
    </div>

    <!-- Email -->
    <div class="row mb-4">
        <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= esc($user->email); ?>" required>
        </div>
    </div>

    <!-- Jabatan -->
    <div class="row mb-4">
        <label for="jabatan" class="col-sm-3 col-form-label form-label">Jabatan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?= esc($user->jabatan); ?>" required>
        </div>
    </div>

    <!-- Role -->
     <!-- Role -->
     <div class="row mb-4">
                                <label for="roleDropdown" class="col-sm-3 col-form-label form-label">Role</label>
                                <div class="col-sm-9">
                                    <div class="tom-select-custom">
                                        <select id="roleDropdown" name="role" class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{"placeholder": "Select a role...", "hideSearch": true}' required>
                                            <option value="">Select a role...</option>
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?= esc($role['id']); ?>" <?= $role['id'] == $user->role ? 'selected' : ''; ?>>
                                                    <?= esc($role['name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

    <!-- Tombol Simpan -->
    <div class="card-footer d-flex justify-content-end">
        <a href="<?= base_url('admin/user_list'); ?>" class="btn btn-primary me-4">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>

                        <!-- End Form Edit User -->
                    
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?= $this->include('templates/footer') ?>
    <!-- End Footer -->
</main>
<?= $this->endSection('page-content'); ?>