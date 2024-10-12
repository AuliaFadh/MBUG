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
                <li class="breadcrumb-item active"><a href="/admin/penerima">Daftar Penerima Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/penerima/edit">Edit Penerima</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Penerima</h3>
                        </div>
                    </div>

                    <!-- Form edit penerima beasiswa -->
                    <div class="card-body">
                        <form action="/admin/penerima/cedit/<?= $mhs->id_penerima; ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly value="<?= $mhs->npm; ?>" type="text" class="form-control custom-textfield col-lg-4 col-md-4 col-sm-2 <?= ($validation->hasError('npm')) ? ' is-invalid is-test' : ''; ?>" id="npm" name="npm" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->nama; ?>" type="text" class="form-control custom-textfield <?= ($validation->hasError('nama')) ? ' is-invalid is-test' : ''; ?>" id="nama" name="nama">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="prodi" class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->nama_prodi; ?>" type="text" class="form-control custom-textfield <?= ($validation->hasError('prodi')) ? ' is-invalid is-test' : ''; ?>" id="prodi" name="prodi">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_prodi'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Alamat</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield <?= ($validation->hasError('alamat')) ? ' is-invalid is-test' : ''; ?>" id="alamat" name="alamat" rows="2"><?= $mhs->alamat; ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nomor Hp</label>
                                        <div style="display: block;" class=" col-lg-9 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->no_hp; ?>" type="text" class="form-control custom-textfield col-lg-4 col-md-4 col-sm-4 <?= ($validation->hasError('no_hp')) ? ' is-invalid is-test' : ''; ?>" id="no_hp" name="no_hp">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_hp'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Jenis Kelamin</label>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="1"> Laki-Laki<br>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="0"> Perempuan<br>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= $mhs->tahun_diterima; ?>" min=1981 type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-3 <?= ($validation->hasError('tahun_diterima')) ? ' is-invalid is-test' : ''; ?>" id="tahun_diterima" name="tahun_diterima">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun_diterima'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="2"> Lulus<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="0"> Tidak Aktif<br>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12 <?= ($validation->hasError('keterangan')) ? ' is-invalid is-test' : ''; ?>" id="keterangan" name="keterangan">
                                            <textarea class="form-control custom-textfield" rows="2"><?= $mhs->keterangan; ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/penerima" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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