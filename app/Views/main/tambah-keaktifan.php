<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
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
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="npm-input" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3 <?= ($validation->hasError('npm')) ? ' is-invalid is-test' : ''; ?>" id="npm" name="npm" autofocus value="<?= old('npm', isset($input['npm']) ? $input['npm'] : ''); ?>">
                                            <div id="npm-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-8" style="display: none;">

                                                <?php foreach ($penerima as $key => $value) : ?>
                                                    <a id="npm-data" onclick="fillInputNPM('<?= $value['npm']; ?>','<?= $value['nama']; ?>','<?= $value['nama_prodi']; ?>')"><?= $value['npm']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="npm-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly id="npm-name" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly id="npm-ps" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5 ">
                                            <input type="number" min=1 max=14 class="form-control custom-textfield <?= ($validation->hasError('semester')) ? ' is-invalid is-test' : ''; ?>" id="semester" name="semester" value="<?= old('semester', isset($input['semester']) ? $input['semester'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('semester'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block; margin-left:20px;" class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="TA" class="form-control  custom-textfield col-lg-3 col-md-4 col-sm-6">
                                                    <option></option>
                                                    <option value="PTA">PTA</option>
                                                    <option value="ATA">ATA</option>
                                                </select>
                                                <input required min="1981" type="number" name="bef" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                                <h3>/</h3>
                                                <input required min="1982" type="number" name="af" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="jb-input" class="form-control custom-textfield <?= ($validation->hasError('jenis_beasiswa')) ? ' is-invalid is-test' : ''; ?>" id="jenis_beasiswa" name="jenis_beasiswa" value="<?= old('jenis_beasiswa', isset($input['jenis_beasiswa']) ? $input['jenis_beasiswa'] : ''); ?>">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                    <a id="jb-data" onclick="fillInputJB('<?= $value['jenis']; ?>')"><?= $value['jenis']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_beasiswa'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100 ">
                                            <label class="label-form">Upload KRS</label>
                                            <input style=" margin-left :15px" name="krs" type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="number" min=0 step="10000" class="form-control custom-textfield <?= ($validation->hasError('jumlah_ditagihkan')) ? ' is-invalid is-test' : ''; ?>" id="jumlah_ditagihkan" name="jumlah_ditagihkan" value="<?= old('jumlah_ditagihkan', isset($input['jumlah_ditagihkan']) ? $input['jumlah_ditagihkan'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_ditagihkan'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jumlah Potongan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="number" min=0 step="10000" class="form-control custom-textfield <?= ($validation->hasError('jumlah_potongan')) ? ' is-invalid is-test' : ''; ?>" id="jumlah_potongan" name="jumlah_potongan" value="<?= old('jumlah_potongan', isset($input['jumlah_potongan']) ? $input['jumlah_potongan'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_potongan'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Blanko Pembayaran</label>
                                            <input style=" margin-left :15px" name="blanko_pembayaran" type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Bukti Pembayaran</label>
                                            <input style=" margin-left :15px" name="bukti_pembayaran" type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px" class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status_keaktifan" value="2"> Lulus<br>
                                        <input type="radio" class="margin-custom" name="status_keaktifan" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_keaktifan" value="0"> Tidak Aktif<br>
                                    </div>

                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/keaktifan" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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
<?= $this->endSection('content') ?>