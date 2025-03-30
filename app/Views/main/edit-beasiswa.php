<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>

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
                        <form action="<?=esc(base_url('/admin/beasiswa/cedit/'. $dataJB['id_beasiswa']),'url') ?>" method="post">
                            <?= csrf_field(); ?>
                            <?php $validation_err = session('errors'); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('jenis' ?? $dataJB['jenis']),'attr') ?>" type="text" 
                                            class="form-control custom-textfield 
                                            <?= isset($validation_err['jenis']) ? ' is-invalid is-test' : '' ?>" id="jenis" name="jenis" autofocus>
                                            <div class="invalid-feedback">
                                            <?= $validation_err['jenis'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="asal" class="label-form">Asal Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('asal' ?? $dataJB['asal']),'attr') ?>" type="text" class="form-control custom-textfield 
                                            <?= isset($validation_err['asal']) ? ' is-invalid is-test' : '' ?>" id="asal" name="asal">
                                            <div class=" invalid-feedback">
                                            <?= $validation_err['asal'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('tahun_penerimaan' ?? $dataJB['tahun_penerimaan']),'attr') ?>" type="number" class="form-control custom-textfield col-lg-2 col-md-3 col-sm-3 
                                            <?= isset($validation_err['tahun_penerimaan']) ? ' is-invalid is-test' : '' ?>" id="tahun_penerimaan" name="tahun_penerimaan">
                                            <div class=" invalid-feedback">
                                            <?= $validation_err['tahun_penerimaan'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status_beasiswa" class="label-form">Status</label>
                                        
                                        <input type="radio" class="margin-custom" name="status_beasiswa" value="1"  <?= old('status_beasiswa',$dataJB['status_beasiswa']) == '1' ? 'checked' : '' ?>> Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_beasiswa" value="0"  <?= old('status_beasiswa', $dataJB['status_beasiswa']) == '0' ? 'checked' : '' ?>> Tidak Aktif<br>
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

<?= $this->endSection('content') ?>