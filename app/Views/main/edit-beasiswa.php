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
                <li class="breadcrumb-item active"><a href="/admin/beasiswa/edit">Edit Beasiswa</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Beasiswa</h3>
                        </div>
                    </div>

                    <!-- Form Edit Daftar Jenis Beasiswa -->
                    <div class="card-body">
                        <form action="/admin/beasiswa/cedit/<?= $mhs->id_beasiswa; ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->jenis; ?>" type="text" class="form-control custom-textfield <?= ($validation->hasError('jenis')) ? ' is-invalid is-test' : ''; ?>" id="jenis" name="jenis" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="asal" class="label-form">Asal Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->asal; ?>" type="text" class="form-control custom-textfield <?= ($validation->hasError('asal')) ? 'is-invalid' : ''; ?>" id="asal" name="asal">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('asal'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->tahun_penerimaan; ?>" type="number" class="form-control custom-textfield col-lg-2 col-md-3 col-sm-3 <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('tahun'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="status" value="0"> Tidak Aktif<br>
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