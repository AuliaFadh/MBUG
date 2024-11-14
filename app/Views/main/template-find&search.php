<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<!-- BASIC -->
<div name="input-find&fill-dumy3" class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label class="label-form">dumy1</label>
    <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

        <input type="text" id="find-dumy2" name="dumy3"
            value="<?= old('dumy3', isset($input['dumy3']) ? $input['dumy3'] : '') ?>"
            class="form-control custom-textfield <?= $validation->hasError('dumy3') ? ' is-invalid is-test' : '' ?>"
            autofocus>

        <div id="box-find-dumy2" class="dropdown-custom col-lg-9 col-md-9 col-sm-7" style="display: none;">
            <?php foreach ($dumy3 as $key => $dumy3Value) : ?>
            <a id="data-find-dumy2"
                onclick="fillFindInput('find-dumy2','<?= $dumy3Value['dumy4'] ?>')"><?= $dumy3Value['dumy4'] ?></a>
            <?php endforeach; ?>
            <span id="no-data-find-dumy2" style="display: none;">Data tidak
                ada</span>
        </div>
        <div class="invalid-feedback">
            <?= $validation->getError('dumy3') ?>
        </div>
    </div>
</div>

<!-- NPM -->
<div name="input-find&fill-npm" class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label class="label-form">NPM</label>
    <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

        <input type="text" id="find-npm" name="npm"
            value="<?= old('npm', isset($input['npm']) ? $input['npm'] : '') ?>"
            class="form-control custom-textfield <?= $validation->hasError('npm') ? ' is-invalid is-test' : '' ?>"
            autofocus>

        <div id="box-find-npm" class="dropdown-custom col-lg-9 col-md-9 col-sm-7" style="display: none;">
            <?php foreach ($penerima as $key => $penerimaValue) : ?>
            <a id="data-find-npm"
                onclick="fillFindInput(
                                                    'find-npm','<?= $penerimaValue['npm'] ?>',
                                                    'nama','<?= $penerimaValue['nama'] ?>',
                                                    'prodi','<?= $penerimaValue['nama_prodi'] ?>',
                                                    
                                                    )"><?= $penerimaValue['npm'] ?></a>
            <?php endforeach; ?>
            <span id="no-data-find-npm" style="display: none;">Data tidak
                ada</span>
        </div>
        <div class="invalid-feedback">
            <?= $validation->getError('npm') ?>
        </div>
    </div>
</div>

<!-- JB -->
<div name="input-find&fill-jenis_beasiswa" class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label class="label-form">Jenis Beasiswa</label>

    <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

        <input type="text" id="find-jb" name="jenis_beasiswa"
            value="<?= old('jenis_beasiswa', isset($input['jenis_beasiswa']) ? $input['jenis_beasiswa'] : '') ?>"
            class="form-control custom-textfield <?= $validation->hasError('jenis_beasiswa') ? ' is-invalid is-test' : '' ?>"
            autofocus>

        <div id="box-find-jb" class="dropdown-custom col-lg-10 col-md-10 col-sm-7" style="display: none;">
            <?php foreach ($jenis_beasiswa as $key => $jenis_beasiswaValue) : ?>
            <a id="data-find-jb"
                onclick="fillFindInput('find-jb','<?= $jenis_beasiswaValue['jenis'] ?>')"><?= $jenis_beasiswaValue['jenis'] ?></a>
            <?php endforeach; ?>
            <span id="no-data-find-jb" style="display: none;">Data tidak
                ada</span>
        </div>
        <div class="invalid-feedback">
            <?= $validation->getError('jenis_beasiswa') ?>
        </div>
    </div>
</div>

<!-- TA -->
<div name="input-find&fill-TA" class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label class="label-form">Tahun Ajaran</label>
    <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

        <input type="text" id="find-ta" name="TA"
            value="<?= old('TA', isset($input['TA']) ? $input['TA'] : '') ?>"
            class="form-control custom-textfield <?= $validation->hasError('TA') ? ' is-invalid is-test' : '' ?>"
            autofocus>

        <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7" style="display: none;">
            <?php foreach ($TA as $key => $TAValue) : ?>
            <a id="data-find-ta"
                onclick="fillFindInput('find-ta','<?= $TAValue['nama_tahun'] ?>')"><?= $TAValue['nama_tahun'] ?></a>
            <?php endforeach; ?>
            <span id="no-data-find-ta" style="display: none;">Data tidak
                ada</span>
        </div>
        <div class="invalid-feedback">
            <?= $validation->getError('TA') ?>
        </div>
    </div>
</div>

<!-- Prodi -->
<div name="input-find&fill-prodi" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label for="prodi" class="label-form">Program Studi</label>
    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
        <input type="text"
            class="form-control custom-textfield <?= $validation->hasError('prodi') ? ' is-invalid is-test' : '' ?>"
            id="find-prodi" name="prodi" autofocus
            value="<?= old('prodi', isset($input['prodi']) ? $input['prodi'] : '') ?>">

        <div id="box-find-prodi" class="dropdown-custom col-lg-9 col-md-9 col-sm-7" style="display: none;">


            <a id="data-find-prodi" onclick="fillFindInput('find-prodi','Sistem')">Sistem</a>
            <a id="data-find-prodi" onclick="fillFindInput('find-prodi','XX')">ATA
                2022/2023</a>
            <a id="data-find-prodi" onclick="fillFindInput('find-prodi','XXXXX')">PTAXXX024</a>

            <span id="no-data-find-prodi" style="display: none;">Data tidak
                ada</span>
        </div>
        <div class="invalid-feedback">
            <?= $validation->getError('prodi') ?>
        </div>

    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        // BASIC
        const finddumy2 = document.getElementById('find-dumy2');
        finddumy2.addEventListener('input', function() {
            findResult('find-dumy2');
        });
        finddumy2.addEventListener('blur', function() {
            hideResult('find-dumy2');
        });






        // For NPM
        const findnpm = document.getElementById('find-npm');
        findnpm.addEventListener('input', function() {
            findResult('find-npm');
        });
        findnpm.addEventListener('blur', function() {
            hideResult('find-npm');
        });

        // for JB

        const findjb = document.getElementById('find-jb');
        findjb.addEventListener('input', function() {
            findResult('find-jb');
        });
        findjb.addEventListener('blur', function() {
            hideResult('find-jb');
        });



        // for TA
        const findta = document.getElementById('find-ta');
        findta.addEventListener('input', function() {
            findResult('find-ta');
        });
        findta.addEventListener('blur', function() {
            hideResult('find-ta');
        });


        //For Prodi
        const findprodi = document.getElementById('find-prodi');
        findprodi.addEventListener('input', function() {
            findResult('find-prodi');
        });
        findprodi.addEventListener('blur', function() {
            hideResult('find-prodi');
        });
    });
</script>




<?= $this->endSection('content') ?>
