<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/dashboard">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/beasiswa">Jenis Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/tambah-beasiswa">Tambah Data</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/Masuk/save_beasiswa" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php if(session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Nama Beasiswa</label>
                                        <input type="text" class="form-control custom-textfield <?= (array_key_exists('nama', $validation)) ? 'is-invalid' : ''; ?> " id="nama" name="nama" autofocus value="<?= old(('nama')); ?>">
                                        <div class="invalid-feedback">
                                            <?= (array_key_exists('nama', $validation)) ? $validation['nama'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="asal" class="label-form">Asal Beasiswa</label>
                                        <input type="text" class="form-control custom-textfield <?= (array_key_exists('asal', $validation)) ? 'is-invalid' : ''; ?> " id="asal" name="asal" value="<?= old('asal'); ?>">
                                        <div class="invalid-feedback">
                                            <?= (array_key_exists('asal', $validation)) ? $validation['asal'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="tahun" class="label-form">Tahun Penerimaan</label>
                                        <input type="text" class="form-control custom-textfield <?= (array_key_exists('tahun', $validation)) ? 'is-invalid' : ''; ?> " id="tahun" name="tahun" value="<?= old('tahun'); ?>">
                                        <div class="invalid-feedback">
                                            <?= (array_key_exists('tahun', $validation)) ? $validation['tahun'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Aktif</label>
                                        <input type="text" class="form-control custom-textfield <?= (array_key_exists('status', $validation)) ? 'is-invalid' : ''; ?> " id="status" name="status" value="<?= old('status'); ?>">
                                        <div class="invalid-feedback">
                                            <?= (array_key_exists('status', $validation)) ? $validation['status'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary ">Tambah Data</button>
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