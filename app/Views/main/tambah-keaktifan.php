<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Keaktifan per Semester</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan/add">Tambah Keaktifan</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Keaktifan</h3>
                        </div>
                    </div>

                    <!-- Form tambah data keaktifan per semester -->
                    <div class="card-body">
                        <form action="/admin/keaktifan/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="npm" class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                            <input required type="text" id="find-npm"
                                                class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3 <?= $validation->hasError('npm') ? ' is-invalid is-test' : '' ?>"
                                                name="npm" autofocus
                                                value="<?= old('npm', isset($input['npm']) ? $input['npm'] : '') ?>">
                                            <div id="box-find-npm" class="dropdown-custom col-lg-8 col-md-8 col-sm-8"
                                                style="display: none;">
                                                <?php foreach ($penerima as $key => $value) : ?>
                                                <a id="npm-data"
                                                    onclick="fillInputNPM('<?= $value['npm'] ?>','<?= $value['nama'] ?>','<?= $value['nama_prodi'] ?>')"><?= $value['npm'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="no-data-find-npm" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input required type="text" readonly
                                                class="form-control custom-textfield <?= $validation->hasError('nama') ? ' is-invalid is-test' : '' ?>"
                                                id="nama" name="nama"
                                                value="<?= old('nama', isset($input['nama']) ? $input['nama'] : '') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly
                                                class="form-control custom-textfield <?= $validation->hasError('nama_prodi') ? ' is-invalid is-test' : '' ?>"
                                                id="prodi" name="prodi" value="-">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('prodi') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5 ">
                                            <input type="number" min=1 max=14
                                                class="form-control custom-textfield <?= $validation->hasError('semester') ? ' is-invalid is-test' : '' ?>"
                                                id="semester" name="semester"
                                                value="<?= old('semester', isset($input['semester']) ? $input['semester'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('semester') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                            <input required type="text" id="find-ta"
                                                class="form-control custom-textfield " name="TA">
                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($TA as $key => $TAval) : ?>
                                                <a id="ta-data"
                                                    onclick="fillInputTA('<?= $TAval['nama_tahun'] ?>')"><?= $TAval['nama_tahun'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="no-data-find-ta" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_tahun') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="jb-input"
                                                class="form-control custom-textfield <?= $validation->hasError('jenis_beasiswa') ? ' is-invalid is-test' : '' ?>"
                                                id="jenis_beasiswa" name="jenis_beasiswa"
                                                value="<?= old('jenis_beasiswa', isset($input['jenis_beasiswa']) ? $input['jenis_beasiswa'] : '') ?>">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7"
                                                style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                <a id="jb-data"
                                                    onclick="fillInputJB('<?= $value['jenis'] ?>')"><?= $value['jenis'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_beasiswa') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100 ">
                                            <label class="label-form">Upload KRS</label>
                                            <input style=" margin-left :15px" name="krs" type="file"
                                                class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" min="0" step="10000"
                                                class="form-control custom-textfield <?= $validation->hasError('jumlah_ditagihkan') ? ' is-invalid is-test' : '' ?>"
                                                id="jumlah_ditagihkan" name="jumlah_ditagihkan"
                                                value="<?= old('jumlah_ditagihkan', isset($input['jumlah_ditagihkan']) ? $input['jumlah_ditagihkan'] : '') ?>"
                                                onkeyup="formatRupiah(this)">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_ditagihkan') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jumlah Potongan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" min="0" step="10000"
                                                class="form-control custom-textfield <?= $validation->hasError('jumlah_potongan') ? ' is-invalid is-test' : '' ?>"
                                                id="jumlah_potongan" name="jumlah_potongan"
                                                value="<?= old('jumlah_potongan', isset($input['jumlah_potongan']) ? $input['jumlah_potongan'] : '') ?>"
                                                onkeyup="formatRupiah(this)">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_potongan') ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Blanko Pembayaran</label>
                                            <input style=" margin-left :15px" name="blanko_pembayaran" type="file"
                                                class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Bukti Pembayaran</label>
                                            <input style=" margin-left :15px" name="bukti_pembayaran" type="file"
                                                class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Konfirmasi Dokumen</label>
                                        <div style="display: block; margin-left:20px;"
                                            class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select disabled name="konfirmasi_keaktifan"
                                                    class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">
                                                    <option value="2">Diproses</option>
                                                    <option value="1">Disetujui</option>
                                                    <option value="0">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea disabled class="form-control custom-textfield " id="keterangan" name="keterangan_keaktifan" autofocus=""
                                                value="" rows="2"></textarea>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/keaktifan"
                                            class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('asset/js/custom-search-ta.js') ?>"></script>
<script src="<?= base_url('asset/js/custom-search-npm.js') ?>"></script>
<script src="<?= base_url('asset/js/custom-currency.js') ?>"></script>



<?= $this->endSection('content') ?>
