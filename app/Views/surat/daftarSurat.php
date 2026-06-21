<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="row align-items-center mb-2">
            <div class="col">
                <h2 class="h4 mb-0">Buat Surat</h2>
            </div>
            <div class="col-auto">
                <!-- Search Form -->
                <form>
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>
                        <input id="fileSearch" type="search" class="form-control" placeholder="Search files" aria-label="Search files">
                    </div>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="fileList">
            <div class="col mb-3 mb-lg-5">
                <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
                    <div class="card-body">
                        <img class="avatar avatar-4x3" src="dashboard/svg/brands/google-docs-icon.svg" alt="Image Description">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Tidak Mampu</h5>
                    </div>
                    <a class="stretched-link" href="<?= base_url('surat/SKTM'); ?>"></a>
                </div>
            </div>
            <div class="col mb-3 mb-lg-5">
                <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
                    <div class="card-body">
                        <img class="avatar avatar-4x3" src="dashboard/svg/brands/google-docs-icon.svg" alt="Image Description">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Nama Sama</h5>
                    </div>
                    <a class="stretched-link" href="<?= base_url('surat/NamaSama'); ?>"></a>
                </div>
            </div>
            
        </div>
        
    </div>
</main>

<script>
    document.getElementById('fileSearch').addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        const files = document.querySelectorAll('#fileList .col');

        files.forEach(file => {
            const title = file.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(query)) {
                file.style.display = 'block';
            } else {
                file.style.display = 'none';
            }
        });
    });
</script>

<?= $this->endSection(); ?>
