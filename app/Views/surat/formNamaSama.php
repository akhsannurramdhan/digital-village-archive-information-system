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
                            <h1 class="card-title row justify-content-lg-center">SURAT KETERANGAN NAMA SAMA</h1>
                            <hr>
                            <form action="<?= base_url('surat/cetakNamaSama'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="row mb-3">
                                    <label for="noSurat" class="col-sm-3 col-form-label form-label">Nomor Surat</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text">400.12.2.1/</span>
                                            <input type="number" class="form-control" name="no_surat" id="noSurat" placeholder="Masukkan Nomor Surat" required value="<?= old('no_surat'); ?>">
                                            <span class="input-group-text">-Pemdes</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggalLahir" class="col-sm-3 col-form-label form-label">Tanggal Pembuatan</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_cetak" id="tanggal_cetak" required value="<?= old('no_surat') ?>">
                                        <input type="hidden" name="tanggalCetakFormatted" id="tanggalCetakFormatted" readonly />
                                    </div>

                                </div>
                                <!-- Penanda Tangan -->
                                <div class="row mb-4">
                                    <label for="roleDropdown" class="col-sm-3 col-form-label form-label">Penanda Tangan</label>
                                    <div class="col-sm-9">
                                        <select id="jabatan_penanda_tangan" name="jabatan_penanda_tangan" class="js-select form-select" autocomplete="off"
                                            data-hs-tom-select-options='{
                                            "placeholder": "Select a role...",
                                            "hideSearch": true
                                            }' required>
                                            <option value="">Pilih Penanda Tangan</option>
                                            <?php foreach ($jabatanList as $jabatan): ?>
                                                <option value="<?= $jabatan->jabatan ?>"><?= $jabatan->jabatan ?></option> <!-- Menyimpan nama jabatan -->
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Nama Pemegang Jabatan -->
                                <div class="row mb-4">
                                    <label for="pemegangJabatan" class="col-sm-3 col-form-label form-label">Nama Pemegang Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_penanda_tangan" id="nama_penanda_tangan" placeholder="Nama Pemegang Jabatan" aria-label="Nama Pemegang Jabatan" readonly>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-center mb-4">Terdapat Perbedaan Data Pada :</h5>


                                <div class="row mb-3">
                                    <label for="perbedaan1" class="col-sm-3 col-form-label form-label">Data Ke-1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="perbedaan1" id="perbedaan1" placeholder="Data Ke-1" required value="<?= old('perbedaan1'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="perbedaan2" class="col-sm-3 col-form-label form-label">Data Ke-2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="perbedaan2" id="perbedaan2" placeholder="Data Ke-2" required value="<?= old('perbedaan2'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="deskripsiPerbedaan" class="col-sm-3 col-form-label form-label">Detail Perbedaan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="detail_perbedaan" id="detail_perbedaan" placeholder="Detail Perbedaan" required><?= old('deskripsi_perbedaan'); ?></textarea>
                                    </div>
                                </div>

                                <hr>
                                <h5 class="text-center mb-4" id="headingDataKe1">Data Pada (Data Ke-1)</h5>

                                <div class="row mb-3">
                                    <label for="nama1" class="col-sm-3 col-form-label form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="nama1" id="nama1" placeholder="Nama" required value="<?= old('nama1'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nik1" class="col-sm-3 col-form-label form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nik1" id="nik1" placeholder="NIK" required value="<?= old('nik1'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tempat1" class="col-sm-3 col-form-label form-label">Tempat & Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control letter-only" name="tempat1" id="tempat1" placeholder="Tempat" required value="<?= old('tempat1'); ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal1" id="tanggal1" required value="<?= old('tanggal1'); ?>">
                                        <input type="hidden" name="tanggal1Formatted" id="tanggal1Formatted" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat1" class="col-sm-3 col-form-label form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat1" id="alamat1" placeholder="Alamat" required><?= old('alamat1'); ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-center mb-4" id="headingDataKe2">Data Pada (Data Ke-2)</h5>

                                <div class="row mb-3">
                                    <label for="nama2" class="col-sm-3 col-form-label form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="nama2" id="nama2" placeholder="Nama" required value="<?= old('nama2'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nik2" class="col-sm-3 col-form-label form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nik2" id="nik2" placeholder="NIK" required value="<?= old('nik2'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tempat2" class="col-sm-3 col-form-label form-label">Tempat & Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control letter-only" name="tempat2" id="tempat2" placeholder="Tempat" required value="<?= old('tempat2'); ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal2" id="tanggal2" required value="<?= old('tanggal2'); ?>">
                                        <input type="hidden" name="tanggal2Formatted" id="tanggal2Formatted" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat2" class="col-sm-3 col-form-label form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat2" id="alamat2" placeholder="Alamat" required><?= old('alamat2'); ?></textarea>
                                    </div>
                                </div>

                                <hr>
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <a href="<?= base_url('surat'); ?>" class="btn btn-primary me-4">
                                        <i class="bi bi-back"></i> Kembali
                                    </a>
                                    <button type="button" class="btn btn-success" id="printButton">
                                        <i class="bi bi-plus-circle"></i> Cetak
                                    </button>
                                </div>
                            </form>

                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah surat berhasil dicetak?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button id="confirmYes" type="button" class="btn btn-primary">Iya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    <script>
        // Fungsi untuk mengubah teks heading berdasarkan input
        function updateHeading(inputId, headingId, defaultText) {
            const inputElement = document.getElementById(inputId);
            const headingElement = document.getElementById(headingId);

            inputElement.addEventListener('input', () => {
                const value = inputElement.value.trim();
                headingElement.textContent = value ? `Data Pada ${value}` : defaultText;
            });
        }

        // Menghubungkan input perbedaan1 dengan headingDataKe1
        updateHeading('perbedaan1', 'headingDataKe1', 'Data Pada (Data Ke-1)');
        updateHeading('perbedaan2', 'headingDataKe2', 'Data Pada (Data Ke-2)');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jabatanDropdown = document.getElementById('jabatan_penanda_tangan');
            const namaPemegangInput = document.getElementById('nama_penanda_tangan');

            jabatanDropdown.addEventListener('change', function() {
                const jabatanName = jabatanDropdown.value;

                if (jabatanName) {
                    fetch(`<?= site_url('surat/getJabatan') ?>/${jabatanName}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.name) {
                                namaPemegangInput.value = data.name;
                            } else {
                                namaPemegangInput.value = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                } else {
                    namaPemegangInput.value = '';
                }
            });
        });
    </script>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            const form = document.querySelector('form');
            form.submit();

            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        });

        document.getElementById('confirmYes').addEventListener('click', function() {
            window.location.href = '<?= base_url('surat'); ?>';
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();

            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const year = today.getFullYear();

            const formattedDateForInput = `${year}-${month}-${day}`;

            document.getElementById('tanggal_cetak').value = formattedDateForInput;

            const options = {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            };
            const formattedDateInIndonesian = new Intl.DateTimeFormat('id-ID', options).format(today);

            document.getElementById('tanggalCetakFormatted').value = formattedDateInIndonesian;
            document.getElementById('tanggalFormattedText').textContent = `Tanggal Pembuatan: ${formattedDateInIndonesian}`;
        });
    </script>

    <script>
        document.querySelectorAll('.letter-only').forEach(function(input) {
            input.addEventListener('input', function(event) {
                var value = event.target.value;

                event.target.value = value.replace(/[^A-Za-z\s]/g, '');
            });
        });
    </script>


    <script>
        function convertAndFormatDate(inputId, hiddenId, formattedTextId) {
            document.getElementById(inputId).addEventListener('change', function() {
                const tanggalInput = this.value;
                if (tanggalInput) {
                    const tanggalObj = new Date(tanggalInput);
                    const options = {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    };

                    const formattedDate = new Intl.DateTimeFormat('id-ID', options).format(tanggalObj);

                    document.getElementById(hiddenId).value = formattedDate;

                    document.getElementById(formattedTextId).textContent = `${formattedDate}`;
                }
            });
        }

        convertAndFormatDate('tanggal1', 'tanggal1Formatted');
        convertAndFormatDate('tanggal_cetak', 'tanggalCetakFormatted');
        convertAndFormatDate('tanggal2', 'tanggal2Formatted');
    </script>

    <?= $this->include('templates/footer') ?>

    <!-- End Footer -->
</main>
<?= $this->endSection('page-content'); ?>