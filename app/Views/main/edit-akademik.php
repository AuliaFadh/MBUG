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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akadmik/edit">Edit Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Akademik</h3>
                        </div>
                    </div>

                    <!-- Form Edit Laporan Akademik -->
                    <div class="card-body">
                        <form action="/admin/akademik/cedit/<?= $former->id_akademik ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly name="npm" value="<?= $former->npm ?>" type="text"
                                                class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('npm') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly name="nama" value="<?= $former->nama ?>" type="text"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly name="prodi" value="<?= $former->nama_prodi ?>"
                                                type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('prodi') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-jenis_beasiswa"
                                        class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>

                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                            <input type="text" id="find-jb" name="jenis_beasiswa"
                                                value="<?= $former->jenis ?>"
                                                class="form-control custom-textfield <?= $validation->hasError('jenis_beasiswa') ? ' is-invalid is-test' : '' ?>"
                                                autofocus>

                                            <div id="box-find-jb" class="dropdown-custom col-lg-10 col-md-10 col-sm-7"
                                                style="display: none;">
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



                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5">
                                            <input name="semester" value="<?= $former->semester ?>" type="number" min=1
                                                max=14 class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('semester') ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div name="input-find&fill-TA"
                                        class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                            <input type="text" id="find-ta" name="TA"
                                                value="<?= $former->tahun_ajaran ?>"
                                                class="form-control custom-textfield <?= $validation->hasError('TA') ? ' is-invalid is-test' : '' ?>"
                                                autofocus>

                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">
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


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input name="ipk" value="<?= $former->ipk ?>" min=0 max=4 step=0.01
                                                type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('ipk') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK Local</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input name="ipk_lokal" value="<?= $former->ipk_lokal ?>" min=0 max=4
                                                step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('ipk_lokal') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK UU</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input name="ipk_uu" value="<?= $former->ipk_uu ?>" min=0 max=4 step=0.01
                                                type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('ipk_uu') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100 ">
                                            <label class="label-form">Rangkuman Nilai</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/rangkuman_nilai/' . $former->rangkuman_nilai) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input require name="rangkuman_nilai" type="file" class="dropify"
                                                data-default-file="">
                                        </div>
                                    </div>
                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Konfirmasi Dokumen</label>
                                        <div style="display: block; margin-left:20px;"
                                            class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="konfirmasi_akademik"
                                                    class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">
                                                    <option value="2" <?php if ($former->konfirmasi_akademik == 2) {
                                                        echo 'selected';
                                                    } ?>>Diproses</option>
                                                    <option value="1" <?php if ($former->konfirmasi_akademik == 1) {
                                                        echo 'selected';
                                                    } ?>>Disetujui</option>
                                                    <option value="0" <?php if ($former->konfirmasi_akademik == 0) {
                                                        echo 'selected';
                                                    } ?>>Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield " id="keterangan" name="konf_ket_akademik" autofocus=""
                                                value="" rows="2"><?= $former->konf_ket_akademik ?></textarea>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/akademik"
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const findjb = document.getElementById('find-jb');
        findjb.addEventListener('input', function() {
            findResult('find-jb');
        });
        findjb.addEventListener('blur', function() {
            hideResult('find-jb');
        });

        const findta = document.getElementById('find-ta');
        findta.addEventListener('input', function() {
            findResult('find-ta');
        });
        findta.addEventListener('blur', function() {
            hideResult('find-ta');
        });

    });
</script>
<?= $this->endSection('content') ?>
