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
                        <h1 class="card-title row justify-content-lg-center">SURAT KETERANGAN TIDAK MAMPU (SKTM)</h1>
                        <hr >
                            <form action="<?= base_url('surat/cetakSKTM'); ?>" method="post">
                                <div class="row mb-3">
                                    <label for="noSurat" class="col-sm-3 col-form-label form-label">No Surat</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text">400.3.5.6/</span>
                                            <input type="number" class="form-control" name="no_surat" id="no_surat" placeholder="Masukkan No Surat" required maxlength="7" value="<?= old('no_surat') ?>">
                                            <span class="input-group-text">/Pemdes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggalLahir" class="col-sm-3 col-form-label form-label">Tanggal Pembuatan</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_cetak" id="tanggal_cetak" required  value="<?= old('no_surat') ?>">
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

                                <!-- Divider -->
                                <hr>
                                <h5 class="text-center mb-4">Dengan ini menerangkan bahwa:</h5>
                                <!-- Data Penanggung Jawab -->
                                <div class="row mb-3">
                                    <label for="namaPenanggungJawab" class="col-sm-3 col-form-label form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="nama_penanggung_jawab" id="namaPenanggungJawab" placeholder="Nama" required pattern="^[A-Za-z\s]+$" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nikPenanggungJawab" class="col-sm-3 col-form-label form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nik_penanggung_jawab" id="nikPenanggungJawab" placeholder="NIK" required  value="<?= old('') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempatLahirPenanggungJawab" class="col-sm-3 col-form-label form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="tempat_lahir_penanggung_jawab" id="tempatLahirPenanggungJawab" placeholder="Tempat Lahir" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggalLahir" class="col-sm-3 col-form-label form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_lahir_penanggung_jawab" id="tanggal_lahir_penanggung_jawab" required  value="<?= old('no_surat') ?>">
                                        <input type="hidden" name="tanggalLahirPenanggungJawabFormatted" id="tanggalLahirPenanggungJawabFormatted" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jenisKelaminPenanggungJawab" class="col-sm-3 col-form-label form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="jenis_kelamin_penanggung_jawab" id="jenisKelaminPenanggungJawab" required  value="<?= old('no_surat') ?>">
                                            <option value="">Pilih Jenis Kelamin...</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pekerjaan" class="col-sm-3 col-form-label form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required pattern="^[A-Za-z\s]+$" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="agama_penanggung" class="col-sm-3 col-form-label form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="agama_penanggung" id="agama_penanggung" required  value="<?= old('no_surat') ?>">
                                            <option value="" disabled selected>Pilih Agama Penanggung Jawab</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="statusPerkawinan_penanggung" class="col-sm-3 col-form-label form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="status_perkawinan_penanggung" id="statusPerkawinan_penanggung" required  value="<?= old('no_surat') ?>">
                                            <option value="" disabled selected>Pilih Status Perkawinan</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kewarganegaraan" class="col-sm-3 col-form-label form-label">Kewarganegaraan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="kewarganegaraan_penanggung" id="kewarganegaraan_penanggung" placeholder="Kewarganegaraan" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamatPenanggungJawab" class="col-sm-3 col-form-label form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat_penanggung_jawab" id="alamat_penanggung_jawab" placeholder="Alamat" required  value="<?= old('no_surat') ?>"></textarea>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr>
                                <h5 class="text-center mb-4">Adalah Benar Penanggung Jawab dari:</h5>

                                <!-- Data Pemohon -->
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="nama_pemohon" id="nama_pemohon" placeholder="Nama" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nik" class="col-sm-3 col-form-label form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nik_pemohon" id="nik_pemohon" placeholder="NIK" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempatLahir" class="col-sm-3 col-form-label form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="tempat_lahir_pemohon" id="tempatLahir_pemohon" placeholder="Tempat Lahir" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggalLahir" class="col-sm-3 col-form-label form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_lahir_pemohon" id="tanggal_lahir_pemohon" required  value="<?= old('no_surat') ?>">
                                        <input type="hidden" name="tanggalLahirPemohonFormatted" id="tanggalLahirPemohonFormatted" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jenisKelamin" class="col-sm-3 col-form-label form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="jenis_kelamin_pemohon" id="jenis_kelamin_pemohon" required  value="<?= old('no_surat') ?>">
                                            <option value="">Pilih Jenis Kelamin...</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pekerjaan" class="col-sm-3 col-form-label form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-3 col-form-label form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat_pemohon" id="alamat_pemohon" placeholder="Alamat pemohon" required  value="<?= old('no_surat') ?>"></textarea>
                                    </div>
                                </div>


                                <!-- Divider for Keperluan -->
                                <hr>
                                <h5 class="text-center mb-4">Untuk Keperluan:</h5>

                                <!-- Keperluan -->
                                <div class="row mb-3">
                                    <label for="keperluan" class="col-sm-3 col-form-label form-label">Keperluan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control letter-only" name="keperluan" id="keperluan" placeholder="Keperluan" required  value="<?= old('no_surat') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="permohonan" class="col-sm-3 col-form-label form-label">Permohonan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="permohonan" id="permohonan" placeholder="Permohonan" required  value="<?= old('no_surat') ?>"></textarea>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
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

        convertAndFormatDate('tanggal_lahir_pemohon', 'tanggalLahirPemohonFormatted');
        convertAndFormatDate('tanggal_cetak', 'tanggalCetakFormatted');
        convertAndFormatDate('tanggal_lahir_penanggung_jawab', 'tanggalLahirPenanggungJawabFormatted');
    </script>

    <?= $this->include('templates/footer') ?>

    <!-- End Footer -->
</main>
<?= $this->endSection('page-content'); ?>