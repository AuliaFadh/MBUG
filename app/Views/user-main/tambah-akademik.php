<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/user/akadmik/add">Tambah Akademik</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="con tainer1">
                            <h3>Tambah Akademik</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/user/akademik/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
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

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5">
                                            <input type="number" min=1 max=14 class="form-control custom-textfield <?= ($validation->hasError('semester')) ? ' is-invalid is-test' : ''; ?>" id="semester" name="semester" value="<?= old('semester', isset($input['semester']) ? $input['semester'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('semester'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block; margin-left:20px;" class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="TA" class="form-control  custom-textfield col-lg-3 col-md-4 col-sm-6">
                                                    <option></option>
                                                    <option value="PTA">PTA</option>
                                                    <option value="ATA">ATA</option>
                                                </select>
                                                <input required min="1981" name="bef" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                                <h3>/</h3>
                                                <input required min="1982" name="af" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 step=0.01 type="number" class="form-control custom-textfield <?= ($validation->hasError('ipk')) ? ' is-invalid is-test' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk', isset($input['ipk']) ? $input['ipk'] : ''); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK Lokal</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 step=0.01 type="number" class="form-control custom-textfield <?= ($validation->hasError('ipk_lokal')) ? ' is-invalid is-test' : ''; ?>" id="ipk_lokal" name="ipk_lokal" value="<?= old('ipk_lokal', isset($input['ipk_lokal']) ? $input['ipk_lokal'] : ''); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk_lokal'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK UU</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 step=0.01 type="number" class="form-control custom-textfield <?= ($validation->hasError('ipk_uu')) ? ' is-invalid is-test' : ''; ?>" id="ipk_uu" name="ipk_uu" value="<?= old('ipk_uu', isset($input['ipk_uu']) ? $input['ipk_uu'] : ''); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk_uu'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form">Upload Rangkuman Nilai(pdf)</label>
                                            <input style="padding-left : 15px;" type="file" name="rangkuman_nilai" class="dropify " data-default-file="" accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/akademik" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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