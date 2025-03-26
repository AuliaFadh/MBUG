<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>

<!-- row -->
<div class="container-fluid">
    <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user/home">
                    <img class="logo-abbr logo-home" src="<?= esc( base_url('asset/img/Home.png'),'url') ?>" alt="">
                    Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="/user/akademik">Laporan Akademik</a></li>
            <li class="breadcrumb-item active"><a href="/user/akadmik/add">Tambah Akademik</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="container1">
                        <h3>Tambah Akademik</h3>
                    </div>
                </div>

                <!-- Form tambah data laporan akademik penerima beasiswa -->
                <div class="card-body">
                    <form action="<?= base_url('/user/akademik/save')?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <?php $validation_err = session('errors'); ?>

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div name="input-find&fill-jenis_beasiswa"
                                    class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">Jenis Beasiswa</label>

                                    <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                        <input type="text" id="find-jb" name="jenis_beasiswa"
                                            value="<?= esc( old('jenis_beasiswa') ,'attr')?>"
                                            class="form-control custom-textfield <?= isset($validation_err['jenis_beasiswa']) ? ' is-invalid is-test' : '' ?>"
                                            autofocus>

                                        <div id="box-find-jb" class="dropdown-custom col-lg-8 col-md-8 col-sm-7"
                                            style="display: none;">

                                            <?php foreach ($listDataJB as $key => $DataJB) : ?>
                                            <a id="data-find-jb"
                                                onclick="fillFindInput('find-jb','<?= esc($DataJB['jenis'],'js') ?>')">
                                                <?= esc($DataJB['jenis']) ?></a>
                                            <?php endforeach; ?>

                                            <span id="no-data-find-jb" style="display: none;">Data tidak ada</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation_err['jenis_beasiswa'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">Semester</label>
                                    <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5">

                                        <input type="number" min=1 max=14
                                            class="form-control custom-textfield <?= isset($validation_err['semester']) ? ' is-invalid is-test' : '' ?>"
                                            id="semester" name="semester" value="<?= esc(old('semester'), 'attr') ?>">
                                        <div class=" invalid-feedback">
                                            <?= $validation_err['semester'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div name="input-find&fill-TA"
                                    class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">Tahun Ajaran</label>
                                    <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                        <input required type="text" id="find-ta" value="<?= esc( old('TA') ,'attr')?>"
                                            class="form-control custom-textfield <?= isset($validation_err['TA']) ? ' is-invalid is-test' : '' ?>"
                                            name="TA">

                                        <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                            style="display: none;">
                                            <?php foreach ($listDataTA as $key => $DataTA) : ?>
                                            <a id="data-find-ta"
                                                onclick="fillFindInput('find-ta','<?= esc( $DataTA['nama_tahun'] ,'js')?>')"><?= esc( $DataTA['nama_tahun'] ,'js')?></a>
                                            <?php endforeach; ?>
                                            <span id="no-data-find-ta" style="display: none;">Data tidak ada</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation_err['TA'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">IPK</label>
                                    <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                        <input min=0 max=4 step=0.01 type="number"
                                            class="form-control custom-textfield <?= isset($validation_err['ipk']) ? ' is-invalid is-test' : '' ?>"
                                            id="ipk" name="ipk" value="<?= esc( old('ipk'),'attr') ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation_err['ipk'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">IPK Lokal</label>
                                    <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                        <input min=0 max=4 step=0.01 type="number"
                                            class="form-control custom-textfield <?= isset($validation_err['ipk_lokal']) ? ' is-invalid is-test' : '' ?>"
                                            id="ipk_lokal" name="ipk_lokal"
                                            value="<?= esc( old('ipk_lokal'),'attr') ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation_err['ipk_lokal'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">IPK UU</label>
                                    <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                        <input min=0 max=4 step=0.01 type="number"
                                            class="form-control custom-textfield <?= isset($validation_err['ipk_uu']) ? ' is-invalid is-test' : '' ?>"
                                            id="ipk_uu" name="ipk_uu" value="<?= esc( old('ipk_uu'),'attr') ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation_err['ipk_uu'] ?? '' ?>>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label class="label-form">Upload Rangkuman Nilai(pdf)</label>
                                        <input style="padding-left : 15px;" type="file" name="rangkuman_nilai"
                                            class="dropify " data-default-file="" accept=".pdf">
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <button type="submit"
                                        class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                    <a href="/user/akademik"
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
<script>
document.addEventListener('DOMContentLoaded', function() {

    const findta = document.getElementById('find-ta');
    findta.addEventListener('input', function() {
        findResult('find-ta');
    });
    findta.addEventListener('blur', function() {
        hideResult('find-ta');
    });

    const findjb = document.getElementById('find-jb');
    findjb.addEventListener('input', function() {
        findResult('find-jb');
    });
    findjb.addEventListener('blur', function() {
        hideResult('find-jb');
    });

    const findnpm = document.getElementById('find-npm');
    findnpm.addEventListener('input', function() {
        findResult('find-npm');
    });
    findnpm.addEventListener('blur', function() {
        hideResult('find-npm');
    });
});
</script>
<?= $this->endSection('content') ?>