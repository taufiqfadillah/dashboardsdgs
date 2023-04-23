<!-- CONTAINER -->
<div class="container d-flex align-items-center min-vh-100">
    <?= form_open_multipart('user/proposaladd'); ?>

    <div class="row g-0 justify-content-center">
        <!-- TITLE -->
        <div class="col-lg-4 offset-lg-1 mx-0 px-0">
            <div id="title-container">
                <img class="covid-image" src="<?= base_url(); ?>/assets/img/logo.png" />
                <h2>SDGs Universitas Hasanuddin</h2>
                <h3>Proposal Checker Form</h3>
                <p align="left">
                    Kontak Kami :<br>
                    Jl. Perintis Kemerdekaan KM.10, Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan.<br>
                    dok.sdgsunhas@gmail.com
                </p>
            </div>
        </div>
        <!-- FORMS -->
        <div class=" col-lg-7 mx-0 px-0">
            <div class="progress">
                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
            </div>
            <div id="qbox-container">
                <form action="<?= base_url('user/proposaladd'); ?>" method="POST" class="needs-validation" id="form-wrapper" name="form-wrapper" novalidate>
                    <!-- STEPS HERE -->
                    <div id="steps-container">
                        <div class="step">
                            <h4>Data Penanggung Jawab:</h4>
                            <div class="row mt-2">
                                <div class="mt-1 col-lg-6">
                                    <label class="form-label">Nama Lengkap:</label>
                                    <input class="form-control" id="full_name" name="full_name" type="text" required>
                                    <div class="invalid-feedback">
                                        Nama lengkap harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label">Alamat:</label>
                                    <input class="form-control" id="address" name="address" type="text" required>
                                    <div class="invalid-feedback">
                                        Alamat harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label">Email:</label>
                                    <input class="form-control" id="email" name="email" type="email" required>
                                    <div class="invalid-feedback">
                                        Email harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label">No. HP:</label>
                                    <input class="form-control" id="phone" name="phone" type="number" required>
                                    <div class="invalid-feedback">
                                        No. HP harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label">Nomor Identitas:</label>
                                    <input class="form-control" id="nomoridentitas" name="nomoridentitas" type="number" minlength="16" required>
                                    <div class="invalid-feedback">
                                        Nomor Identitas harus diisi dengan minimal 16 digit angka.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label for="fotoidentitas" class="form-label">Foto Identitas:</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="fotoidentitas" name="fotoidentitas" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-trash text-danger d-none"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Foto Identitas harus diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-4 col-md-2 col-3">
                                    <label class="form-label">Jenis Kelamin:</label>
                                    <div class="input-container">
                                        <input class="form-control" id="jeniskelamin" name="jeniskelamin" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-8">
                                    <div id="input-container">
                                        <input class="form-check-input" name="gender_step1" type="radio" value="Laki-laki" required />
                                        <label class="form-check-label radio-lb">Laki-Laki</label>
                                        <input class="form-check-input" name="gender_step1" type="radio" value="Perempuan" required />
                                        <label class="form-check-label radio-lb">Perempuan</label>
                                    </div>
                                </div>
                                <div id="q-box__buttons">
                                    <button id="next-btn" type="submit">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <h4>Data Kelompok Masyarakat</h4>
                            <div class="row mt-2">
                                <div class="mt-1 col-lg-6">
                                    <label class="form-label" for="namakm">Nama Kelompok:</label>
                                    <input class="form-control" id="namakm" name="namakm" type="text" required />
                                    <div class="invalid-feedback">
                                        Nama harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="addresskm">Alamat Kelompok:</label>
                                    <input class="form-control" id="addresskm" name="addresskm" type="text" required />
                                    <div class="invalid-feedback">
                                        Alamat harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="emailkm">Email Kelompok:</label>
                                    <input class="form-control" id="emailkm" name="emailkm" type="email" required />
                                    <div class="invalid-feedback">
                                        Email harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="phonekm">No. HP Kelompok:</label>
                                    <input class="form-control" id="phonekm" name="phonekm" type="number" required />
                                    <div class="invalid-feedback">
                                        No. HP harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="nomoridentitaskm">Nomor Identitas Kelompok:</label>
                                    <input class="form-control" id="nomoridentitaskm" name="nomoridentitaskm" type="number" required />
                                    <div class="invalid-feedback">
                                        Nomor Identitas harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="fotoidentitaskm">Foto Identitas Kelompok:</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="fotoidentitaskm" name="fotoidentitaskm" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-trash text-danger d-none"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Foto Identitas harus diisi.
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr mt-5" />
                                <!-- Ketua -->
                                <h4>Data Ketua</h4>
                                <div class="mt-1 col-lg-6">
                                    <label class="form-label" for="namakt">Nama Ketua:</label>
                                    <input class="form-control" id="namakt" name="namakt" type="text" required />
                                    <div class="invalid-feedback">
                                        Nama harus diisi.
                                    </div>
                                </div>
                                <div class="mt-1 col-lg-6">
                                    <label class="form-label" for="addresskt">Alamat Ketua:</label>
                                    <input class="form-control" id="addresskt" name="addresskt" type="text" required />
                                    <div class="invalid-feedback">
                                        Alamat harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="emailkt">Email Ketua:</label>
                                    <input class="form-control" id="emailkt" name="emailkt" type="email" required />
                                    <div class="invalid-feedback">
                                        Email harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="phonekt">No. HP Ketua:</label>
                                    <input class="form-control" id="phonekt" name="phonekt" type="number" required />
                                    <div class="invalid-feedback">
                                        No. HP harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="nomoridentitaskt">Nomor Identitas Ketua:</label>
                                    <input class="form-control" id="nomoridentitaskt" name="nomoridentitaskt" type="number" required />
                                    <div class="invalid-feedback">
                                        Nomor Identitas harus diisi dengan minimal 16 digit angka.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="fotoidentitaskt">Foto Identitas Ketua:</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="fotoidentitaskt" name="fotoidentitaskt" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-trash text-danger d-none"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Foto Identitas harus diisi.
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 col-lg-4 col-md-2 col-3">
                                    <label class="form-label" for="jeniskelaminkt">Jenis Kelamin:</label>
                                    <div class="input-container">
                                        <input class="form-control" id="jeniskelaminkt" name="jeniskelaminkt" type="text" readonly required />
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-8">
                                    <div id="input-container">
                                        <input class="form-check-input" name="gender_step2" type="radio" value="Laki-laki" required />
                                        <label class="form-check-label radio-lb">Laki-Laki</label>
                                        <input class="form-check-input" name="gender_step2" type="radio" value="Perempuan" required />
                                        <label class="form-check-label radio-lb">Perempuan</label>
                                    </div>
                                </div>
                                <div id="q-box__buttons">
                                    <button id="prev-btn" type="button">Previous</button>
                                    <button id="next-btn" type="next">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <h4>Data Penerima Bantuan</h4>
                            <div class="row mt-2">
                                <div class="mt-1 col-lg-6">
                                    <label class="form-label" for="namapb">Nama Lengkap:</label>
                                    <input class="form-control" id="namapb" name="namapb" type="text" required />
                                    <div class="invalid-feedback">
                                        Nama harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="addresspb">Alamat:</label>
                                    <input class="form-control" id="addresspb" name="addresspb" type="text" required />
                                    <div class="invalid-feedback">
                                        Alamat harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="emailpb">Email :</label>
                                    <input class="form-control" id="emailpb" name="emailpb" type="email" />
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="phonepb">No. HP :</label>
                                    <input class="form-control" id="phonepb" name="phonepb" type="number" required />
                                    <div class="invalid-feedback">
                                        No. HP harus diisi.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="nomoridentitaspb">Nomor Identitas :</label>
                                    <input class="form-control" id="nomoridentitaspb" name="nomoridentitaspb" type="number" required />
                                    <div class="invalid-feedback">
                                        Nomor Identitas harus diisi dengan minimal 16 digit angka.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="fotoidentitaspb">Foto Identitas :</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="fotoidentitaspb" name="fotoidentitaspb" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-trash text-danger d-none"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Foto Identitas harus diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="nomorkkpb">Nomor Kartu Keluarga :</label>
                                    <input class="form-control" id="nomorkkpb" name="nomorkkpb" type="number" required />
                                    <div class="invalid-feedback">
                                        Nomor Kartu Keluarga harus diisi dengan minimal 16 digit angka.
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-6">
                                    <label class="form-label" for="fotokkpb">Foto Kartu Keluarga :</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="fotokkpb" name="fotokkpb" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-trash text-danger d-none"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Foto Kartu Keluarga harus diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-4 col-md-2 col-3">
                                    <label class="form-label" for="jeniskelaminpb">Jenis Kelamin:</label>
                                    <div class="input-container">
                                        <input class="form-control" id="jeniskelaminpb" name="jeniskelaminpb" type="text" readonly required />
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-8">
                                    <div id="input-container">
                                        <input class="form-check-input" name="gender_step3" type="radio" value="Laki-laki" required />
                                        <label class="form-check-label radio-lb">Laki-Laki</label>
                                        <input class="form-check-input" name="gender_step3" type="radio" value="Perempuan" required />
                                        <label class="form-check-label radio-lb">Perempuan</label>
                                    </div>
                                </div>
                                <div id="q-box__buttons">
                                    <button id="prev-btn" type="button">Previous</button>
                                    <button id="next-btn" type="next">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <h4>Input File Proposal</h4>
                            <div class="row">
                                <div class="input-group">
                                    <div class="col-lg">
                                        <input type="file" name="fileproposal" id="fileproposal" accept=".doc,.docx,.pdf">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="deskripsi">Deskripsi Tambahan (Optional)</label>
                                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                            </div>
                            <div id="q-box__buttons">
                                <button id="prev-btn" type="button">Previous</button>
                                <button id="next-btn" type="next">Next</button>
                            </div>
                        </div>
                        <div class="step">
                            <h4>Foto Dokumentasi</h4>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="file" name="filedokumentasi[]" id="filedokumentasi" accept=".jpg,.img,.png" multiple>
                                    <div id="preview" class="mt-2"></div>
                                </div>
                            </div>
                            <div id="q-box__buttons">
                                <button id="prev-btn" type="button">Previous</button>
                                <button id="next-btn" type="next">Next</button>
                            </div>
                        </div>
                        <div class="step">
                            <div class="mt-1">
                                <div class="closing-text">
                                    <h4>Lanjutkan untuk menyelesai sesi pengajuan proposal!</h4>
                                    <p>Klik tombol Submit untuk melanjutkan.</p>
                                </div>
                            </div>
                            <div id="q-box__buttons">
                                <button id="submit-btn" type="submit">Submit</button>
                            </div>
                        </div>
                        <div id="success">
                            <div class="mt-5">
                                <h4>Selamat! Proposal Anda Berhasil Di Kirim!</h4>
                                <p>
                                    Harap untuk selalu memantau perkembangan proposal anda hingga semua tahap berhasil disetujui, Jika mengalami masalah atau kendala silahkan hubungi kami disini <a href="mailto:fuungt@gmail.com">Helper SDGs Unhas</a>
                                </p>
                                <a class="back-link" href="<?= base_url('user/laporan'); ?>">Cek Proposal Anda Disini ➜</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="q-box__buttons">
                        <button id="prev-btn" type="button">Previous</button>
                        <button id="next-btn" type="button">Next</button>
                        <button id="submit-btn" type="submit">Submit</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div id="preloader-wrapper">
    <div id="preloader"></div>
    <div class="preloader-section section-left"></div>
    <div class="preloader-section section-right"></div>
</div>