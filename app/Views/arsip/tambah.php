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
                            <form action="<?= base_url('arsip/addArsip') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>

                                <!-- No Surat -->
                                <div class="mb-3">
                                    <label for="no_surat" class="form-label">No Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" class="form-control" value="<?= old('no_surat') ?>">
                                    <?php if (isset($errors['no_surat'])): ?>
                                        <div class="text-danger"><?= $errors['no_surat'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Judul Surat -->
                                <div class="mb-3">
                                    <label for="judul_surat" class="form-label">Judul Surat</label>
                                    <input type="text" name="judul_surat" id="judul_surat" class="form-control" value="<?= old('judul_surat') ?>">
                                    <?php if (isset($errors['judul_surat'])): ?>
                                        <div class="text-danger"><?= $errors['judul_surat'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Jenis Surat -->
                                <div class="mb-3">
                                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                    <input type="text" name="jenis_surat" id="jenis_surat" class="form-control" value="<?= old('jenis_surat') ?>">
                                    <?php if (isset($errors['jenis_surat'])): ?>
                                        <div class="text-danger"><?= $errors['jenis_surat'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Tipe Surat -->
                                <div class="mb-3">
                                    <label for="tipe_surat" class="form-label">Tipe Surat</label>
                                    <input type="text" name="tipe_surat" id="tipe_surat" class="form-control" value="<?= old('tipe_surat') ?>">
                                    <?php if (isset($errors['tipe_surat'])): ?>
                                        <div class="text-danger"><?= $errors['tipe_surat'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Penginput -->
                                <div class="mb-3">
                                    <label for="penginput" class="form-label">Penginput</label>
                                    <input type="text" name="penginput" id="penginput" class="form-control" value="<?= esc(user()->fullname) ?>" readonly>
                                </div>

                                <!-- File Surat -->
                                <div class="mb-3">
                                    <label for="basicFormFile" class="form-label">File Surat</label>
                                    <input class="form-control" type="file" id="basicFormFile" name="file_surat">
                                    <?php if (isset($errors['file_surat'])): ?>
                                        <div class="text-danger"><?= $errors['file_surat'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Arsip</button>
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