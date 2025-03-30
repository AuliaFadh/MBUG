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
                <li class="breadcrumb-item active"><a href="/admin/penerima">Daftar Penerima Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/penerima/add">Tambah Penerima</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Penerima</h3>
                        </div>
                    </div>

                    <!-- Form tambah data penerima beasiswa -->
                    <div class="card-body">
                        <form action="/admin/penerima/save" class="needs-validation"  method="post">
                            <?= csrf_field() ?>
                            <?php $validation_err = session('errors')?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="npm" class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield col-lg-4 col-md-4 col-sm-2 <?= isset($validation_err['npm']) ? ' is-invalid is-test' : '' ?>"
                                                id="npm" name="npm" autofocus
                                                value="<?= esc(old('npm'), 'attr') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['npm'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield <?= isset($validation_err['nama']) ? ' is-invalid is-test' : '' ?>"
                                                id="nama" name="nama" autofocus
                                                value="<?= esc(old('nama'), 'attr') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['nama'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-prodi"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="prodi" class="label-form">Program Studi</label>
                                        <div style="display: block;" class="  col-lg-12 col-md-12 col-sm-12">

                                            <div class="mx-3 border">
                                                <div class="row">



                                                    <input type="text"
                                                        class="form-control  custom-textfield col-lg-4 col-md-4 col-sm-12  <?= isset($validation_err['prodi']) ? ' is-invalid is-test' : '' ?>"
                                                        id="find-prodi" name="prodi" autofocus
                                                        value="<?= esc(old('prodi'), 'attr') ?>">
                                                    <h4 id="find-text-prodi"
                                                        class="pt-1 col-lg-7 col-md-7 text-center col-sm-12"> ... </h4>


                                                    <div id="box-find-prodi"
                                                        class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                        style="display: none;">
                                                        <?php foreach ($listDataPS as $key => $DataPS) : ?>
                                                        <a id="data-find-prodi"
                                                            onclick="fillFindInput2('find-prodi','<?= $DataPS['id_prodi'] ?>','find-text-prodi','<?= $DataPS['nama_prodi'] ?>')"><?= $DataPS['id_prodi'] ?> : <?= $DataPS['nama_prodi'] ?></a>
                                                            <?php endforeach; ?>
                                                        <span id="no-data-find-prodi" style="display: none;">Data tidak
                                                            ada</span>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                <?= $validation_err['prodi'] ?? '' ?>
                                            </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="alamat" class="label-form-txa">Alamat</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea rows="2"
                                                class="form-control custom-textfield <?= isset($validation_err['alamat']) ? ' is-invalid is-test' : '' ?>"
                                                id="alamat" name="alamat" autofocus
                                                value="<?= esc(old('alamat'), 'attr') ?>"></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation_err['alamat'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="no_hp" class="label-form">Nomor Hp</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield col-lg-4 col-md-6 col-sm-7 <?= isset($validation_err['no_hp']) ? ' is-invalid is-test' : '' ?>"
                                                id="no_hp" name="no_hp" autofocus
                                                value="<?= esc(old('no_hp'), 'attr') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['no_hp'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 15px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Jenis Kelamin</label>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="1" <?= old('jenis_kelamin') == '1' ? 'checked' : '' ?>>
                                        Laki-Laki<br>
                                        <input type="radio" class="margin-custom" name="jenis_kelamin" value="0"<?= old('jenis_kelamin') == '0' ? 'checked' : '' ?>>
                                        Perempuan<br>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="tahun_diterima" class="label-form">Tahun Penerimaan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input min=1981 type="number"
                                                class="form-control custom-textfield col-lg-3 col-md-3 col-sm-3 <?= isset($validation_err['tahun_diterima']) ? ' is-invalid is-test' : '' ?>"
                                                id="tahun_diterima" name="tahun_diterima" autofocus
                                                value="<?= esc(old('tahun_diterima'), 'attr') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation_err['tahun_diterima'] ?? '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 15px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status_penerima" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="2" <?= old('status_penerima') == '2' ? 'checked' : '' ?>>
                                        Lulus<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="1"<?= old('status_penerima') == '1' ? 'checked' : '' ?>>
                                        Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_penerima" value="0"<?= old('status_penerima') == '0' ? 'checked' : '' ?>>
                                        Tidak Aktif<br>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea
                                                class="form-control custom-textfield <?= isset($validation_err['keterangan']) ? ' is-invalid is-test' : '' ?>"
                                                id="keterangan" name="keterangan" autofocus
                                                
                                                rows="2"><?= esc(old('keterangan'), 'attr') ?></textarea>
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