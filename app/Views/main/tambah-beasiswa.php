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
                <li class="breadcrumb-item active"><a href="/admin/beasiswa">Jenis Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/beasiswa/add">Tambah Beasiswa</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Beasiswa</h3>
                        </div>
                    </div>

                    <!-- Form tambah jenis beasisa -->
                    <div class="card-body">
                        <form action="/admin/beasiswa/save" class="needs-validation" novalidate method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="jenis" class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('jenis')) ? ' is-invalid is-test' : ''; ?>" id="jenis" name="jenis" autofocus value="<?= old('jenis', isset($input['jenis']) ? $input['jenis'] : ''); ?>">

                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="asal" class="label-form">Asal Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('asal')) ? 'is-invalid' : ''; ?>" id="asal" name="asal" value="<?= old('asal', isset($input['asal']) ? $input['asal'] : ''); ?>">

                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="tahun" class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input min=1981 type="number" class="form-control col-lg-2 col-md-3 col-sm-3 custom-textfield <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" value="<?= old('tahun', isset($input['tahun']) ? $input['tahun'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('tahun'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 15px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="status" value="0" checked> Tidak Aktif<br>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/beasiswa" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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