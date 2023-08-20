<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/pengumuman">Pengumuman</a></li>
                <li class="breadcrumb-item active"><a href="/admin/pengumuman/add">Tambah Pengumuman</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Tambah Pengumuman</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="/admin/pengumuman/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Tanggal Diterbitkan </label>
                                        <div style="display: block;" class=" col-lg-3 col-md-3 col-sm-3">
                                            <input name="tanggal_terbit" class="custom-textfield datepicker-default form-control " id="tanggal_terbit">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Batas Waktu Pengumuman </label>
                                        <div style="display: block;" class=" col-lg-3 col-md-3 col-sm-3">
                                            <input name="tanggal_tarik" class="custom-textfield datepicker-default form-control " id="tanggal_tarik">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Judul Pengumuman</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('judul_pengumuman')) ? ' is-invalid is-test' : ''; ?>" id="judul_pengumuman" name="judul_pengumuman" value="<?= old('judul_pengumuman', isset($input['judul_pengumuman']) ? $input['judul_pengumuman'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('judul_pengumuman'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Deskripsi</label>
                                        <div style="display: block;" class=" col-lg-10 col-md-10 col-sm-10">
                                            <textarea class="form-control custom-textfield <?= ($validation->hasError('deskripsi')) ? ' is-invalid is-test' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi', isset($input['deskripsi']) ? $input['deskripsi'] : ''); ?>" rows="10"></textarea>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('deskripsi'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/pengumuman" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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