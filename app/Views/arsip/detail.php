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
                <!-- arsip/detail.php -->
                <form class="js-step-form py-md-5">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-8">
                            <div id="addUserStepFormContent">
                                <div id="addUserStepProfile" class="card card-lg active">
                                    <div class="card-body">
                                        <!-- Informasi Arsip -->
                                        <div class="row mb-4 d-flex justify-content-center text-center">
                                            <label class="col-sm-3 col-form-label form-label">No. Surat</label>
                                            <label class="col-sm-1 col-form-label form-label">:</label>
                                            <label class="col-sm-3 col-form-label form-label"><?= $arsip['no_surat']; ?></label>
                                        </div>

                                        <div class="row mb-4 d-flex justify-content-center text-center">
                                            <label class="col-sm-3 col-form-label form-label">Judul Surat</label>
                                            <label class="col-sm-1 col-form-label form-label">:</label>
                                            <label class="col-sm-3 col-form-label form-label"><?= $arsip['judul_surat']; ?></label>
                                        </div>

                                        <div class="row mb-4 d-flex justify-content-center text-center">
                                            <label class="col-sm-3 col-form-label form-label">Jenis Surat</label>
                                            <label class="col-sm-1 col-form-label form-label">:</label>
                                            <label class="col-sm-3 col-form-label form-label"><?= $arsip['jenis_surat']; ?></label>
                                        </div>

                                        <div class="row mb-4 d-flex justify-content-center text-center">
                                            <label class="col-sm-3 col-form-label form-label">Tipe Surat</label>
                                            <label class="col-sm-1 col-form-label form-label">:</label>
                                            <label class="col-sm-3 col-form-label form-label"><?= $arsip['tipe_surat']; ?></label>
                                        </div>

                                        <div class="row mb-4 d-flex justify-content-center text-center">
                                            <label class="col-sm-3 col-form-label form-label">Penginput</label>
                                            <label class="col-sm-1 col-form-label form-label">:</label>
                                            <label class="col-sm-3 col-form-label form-label"><?= $arsip['penginput']; ?></label>
                                        </div>
                                    </div>

                                    <!-- Preview File -->
                                    <div class="card-body" style="display: flex; justify-content: center; align-items: center; height: 100%;">
    <!-- Tombol untuk membuka modal -->
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#previewModal">
        Preview Surat
    </button>

<!-- Modal untuk Preview Surat -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview Surat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Tempatkan konten surat yang sudah di-convert ke HTML di sini -->
        <div id="suratPreviewContainer">
            <!-- Konten HTML surat akan dimuat di sini -->
            <?= $arsip['file_surat_html'] ?? 'Surat tidak tersedia' ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                                    </div>

                                    <!-- Tombol Kembali -->
                                    <div class="card-footer d-flex justify-content-end align-items-center">
                                        <a class="btn btn-primary" href="<?= base_url('arsip'); ?>">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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