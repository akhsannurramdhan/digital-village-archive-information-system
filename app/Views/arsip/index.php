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
      <!-- Header -->
      <div class="card-header">
        <div class="row justify-content-between align-items-center flex-grow-1">
          <div class="col-md">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="card-header-title">Daftar Arsip</h4>
              <!-- Datatable Info -->
              <!-- End Datatable Info -->
            </div>
          </div>

          <!-- End Col -->
          <div class="col-auto">
            <!-- Filter -->
            <div class="row align-items-sm-center">
              <!-- End Col -->
              <div class="col-md">
                <form>
                  <!-- Search -->
                  <div class="input-group input-group-merge input-group-flush">
                    <div class="input-group-prepend input-group-text">
                      <i class="bi-search"></i>
                    </div>
                    <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                  </div>
                  <!-- End Search -->
                </form>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Filter -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Header -->

      <!-- Table -->
      <div class="table-responsive datatable-custom">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
          <thead class="thead-light">
            <tr>
              <th style="width: 1%;">#</th>
              <th style="width: 15%;">No Surat</th>
              <th style="width: 25%;">Judul Surat</th>
              <th style="width: 15%;">Jenis Surat</th>
              <th style="width: 10%;">Tipe Surat</th>
              <th style="width: 10%;">Penginput</th>
              <th class="text-start" style="width: 1%;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($arsip as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item['no_surat']; ?></td>
                <td><?= $item['judul_surat']; ?></td>
                <td><?= $item['jenis_surat']; ?></td>
                <td><?= $item['tipe_surat']; ?></td>
                <td><?= $item['penginput']; ?></td>
                <td class="text-start text-nowrap">
                  <div class="btn-group" role="group">
                    <a class="btn btn-white btn-sm" href="<?= base_url('arsip/detail/' . $item['id']); ?>">
                      <i class="bi-eye"></i> View
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>

                      <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1">
                        <a href="<?= base_url('arsip/edit/' . $item['id']); ?>" class="dropdown-item" style="width: 100p;">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('arsip/download/' . $item['id']); ?>" class="dropdown-item">
                          <i class="fas fa-download"></i> Download
                        </a>
                        <!-- Tombol Hapus (membuka modal) -->
                        <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-delete-url="<?= base_url('arsip/delete/' . $item['id']); ?>">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Modal Konfirmasi Hapus -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <!-- Tombol Hapus dengan tautan dinamis -->
              <a id="deleteConfirmButton" href="" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>

      <!-- End Table -->
      <!-- Footer -->
      <div class="card-footer">
        <!-- Pagination -->
        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">

          <!-- Filter Data di Sebelah Kiri -->
          <div class="col-sm mb-2 mb-sm-0">
            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
              <span class="me-2">Showing:</span>

              <!-- Select -->
              <div class="tom-select-custom">
                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                      "searchInDropdown": false,
                      "hideSearch": true
                    }'>
                  <option value="4">4</option>
                  <option value="6">6</option>
                  <option value="8" selected>8</option>
                  <option value="12">12</option>
                </select>
              </div>
              <!-- End Select -->

              <span class="text-secondary me-2">of</span>

              <!-- Pagination Quantity -->
              <span id="datatableWithPaginationInfoTotalQty"></span>
            </div>
          </div>


          <nav class=" col-sm justify-content-sm-between justify-content-center" id="datatablePagination" aria-label="Activity pagination"></nav>
          <!-- Tombol Tambah Data di Sebelah Kanan -->
          <div class="col-sm-auto">
            <a href="<?= base_url('arsip/add'); ?>" class="btn btn-success me-4">
              <i class="bi bi-plus-circle"></i> Tambah
            </a>

          </div>

        </div>
      </div>
      <!-- End Footer -->
    </div>
    <!-- End Card -->
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <?= $this->include('templates/footer') ?>

  <script>
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget; // Tombol yang diklik untuk membuka modal
      const deleteUrl = button.getAttribute('data-delete-url'); // Ambil URL hapus dari atribut tombol

      // Tetapkan URL ke tautan di modal
      const deleteConfirmButton = document.getElementById('deleteConfirmButton');
      deleteConfirmButton.setAttribute('href', deleteUrl);
    });
  </script>

  <!-- End Footer -->
</main>

<?= $this->endSection('page-content'); ?>