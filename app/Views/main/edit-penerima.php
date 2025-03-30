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
                        <form action="<?=esc(base_url('/admin/penerima/cedit/'. $dataPB['id_penerima']) ,'url') ?>"
                            method="post">
                            <?= csrf_field(); ?>
                            <?php $validation_err = session('errors')?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly value="<?= $dataPB['npm'] ?>" type="text" class="form-control custom-textfield col-lg-4 col-md-4 col-sm-2 
                                            <?= isset($validation_err['npm']) ? ' is-invalid is-test' : '' ?>" id="npm"
                                                name="npm" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation_err['npm'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('nama' ?? $dataLA['nama']),'attr') ?>"
                                                type="text"
                                                class="form-control custom-textfield <?= isset($validation_err['nama']) ? ' is-invalid is-test' : '' ?>"
                                                id="nama" name="nama">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['nama'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="prodi" class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('prodi' ?? $dataLA['prodi']),'attr') ?>"
                                                type="text"
                                                class="form-control custom-textfield <?= isset($validation_err['prodi']) ? ' is-invalid is-test' : '' ?>"
                                                id="prodi" name="prodi">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['prodi'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Alamat</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea
                                                class="form-control custom-textfield <?= isset($validation_err['alamat']) ? ' is-invalid is-test' : '' ?>"
                                                id="alamat" name="alamat" rows="2">
                                            <?= esc( old('alamat' ?? $dataLA['alamat']),'attr') ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation_err['alamat'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nomor Hp</label>
                                        <div style="display: block;" class=" col-lg-9 col-md-12 col-sm-12">
                                            <input value="<?= esc( old('no_hp' ?? $dataLA['no_hp']),'attr') ?>"
                                                type="text"
                                                class="form-control custom-textfield col-lg-4 col-md-4 col-sm-4 <?= isset($validation_err['no_hp']) ? ' is-invalid is-test' : '' ?>"
                                                id="no_hp" name="no_hp">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['no_hp'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Jenis Kelamin</label>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="1"
                                            <?= old('jenis_kelamin',$listDataJB['jenis_kelamin']) == '1' ? 'checked' : '' ?>>
                                        Laki-Laki<br>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="0"
                                            <?= old('jenis_kelamin',$listDataJB['jenis_kelamin']) == '0' ? 'checked' : '' ?>>
                                        Perempuan<br>


                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input
                                                value="<?= esc( old('tahun_diterima' ?? $dataLA['tahun_diterima']),'attr') ?>"
                                                min=1981 type="number"
                                                class="form-control custom-textfield col-lg-3 col-md-3 col-sm-3 <?= isset($validation_err['tahun_diterima']) ? ' is-invalid is-test' : '' ?>"
                                                id="tahun_diterima" name="tahun_diterima">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['tahun_diterima'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="2"
                                            <?= old('status_penerima',$listDataJB['status_penerima']) == '2' ? 'checked' : '' ?>>
                                        Lulus<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="1"
                                            <?= old('status_penerima',$listDataJB['status_penerima']) == '1' ? 'checked' : '' ?>>
                                        Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="0"
                                            <?= old('status_penerima',$listDataJB['status_penerima']) == '0' ? 'checked' : '' ?>>
                                        Tidak Aktif<br>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;"
                                            class=" col-lg-12 col-md-12 col-sm-12 <?= isset($validation_err['keterangan']) ? ' is-invalid is-test' : '' ?>"
                                            id="keterangan" name="keterangan">
                                            <textarea class="form-control custom-textfield" rows="2">
                                            <?= esc( old('keterangan' ?? $dataLA['keterangan']),'attr') ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation_err['keterangan'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/penerima"
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