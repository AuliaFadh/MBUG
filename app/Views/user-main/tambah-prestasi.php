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
                <li class="breadcrumb-item active"><a href="/user/prestasi">Laporan Prestasi</a></li>
                <li class="breadcrumb-item active"><a href="/user/prestasi/add">Tambah Prestasi</a></li>
            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Prestasi</h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="/user/prestasi/save" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tanggal</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input name="datepicker" class="custom-textfield datepicker-default form-control col-lg-3 col-md-4 col-sm-8" id="datepicker">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Kegiatan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('nama_kegiatan')) ? ' is-invalid is-test' : ''; ?>" id="nama_kegiatan" name="nama_kegiatan" value="<?= old('nama_kegiatan', isset($input['nama_kegiatan']) ? $input['nama_kegiatan'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('nama_kegiatan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tingkat</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="tingkat" class="form-control  custom-textfield col-lg-4 col-md-4 col-sm-4">
                                                <option></option>
                                                <option value="Internasional">Internasional</option>
                                                <option value="Nasional">Nasional</option>
                                                <option value="Provinsi">Provinsi</option>
                                                <option value="Wilayah">Wilayah</option>
                                                <option value="Internal">Internal</option>

                                            </select>
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Jenis Prestasi</label>
                                        <input type="radio" class="margin-custom" name="jenis_prestasi" value="1"> Tim<br>
                                        <input type="radio" class="margin-custom" name="jenis_prestasi" value="0" checked> Individu<br>

                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Capaian</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="capaian" class="form-control  custom-textfield col-lg-6 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="Juara I">Juara I</option>
                                                <option value="Juara II">Juara II</option>
                                                <option value="Juara III">Juara III</option>
                                                <option value="Harapan I">Harapan I</option>
                                                <option value="Harapan II">Harapan II</option>
                                                <option value="Harapan III">Harapan III</option>
                                                <option value="Harapan IV">Harapan IV</option>
                                                <option value="Partisipatif">Partisipatif</option>
                                                <option value="Finalis">Finalis</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tempat</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('tempat')) ? ' is-invalid is-test' : ''; ?>" id="tempat" name="tempat" value="<?= old('tempat', isset($input['tempat']) ? $input['tempat'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('tempat'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Penyelenggara</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('penyelenggara')) ? ' is-invalid is-test' : ''; ?>" id="penyelenggara" name="penyelenggara" value="<?= old('penyelenggara', isset($input['penyelenggara']) ? $input['penyelenggara'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('penyelenggara'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form">Upload Bukti</label>
                                            <input name="bukti_prestasi" style="padding-left : 15px;" type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tautan Publikasi</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="url" class="form-control custom-textfield <?= ($validation->hasError('publikasi')) ? ' is-invalid is-test' : ''; ?>" id="publikasi" name="publikasi" value="<?= old('publikasi', isset($input['publikasi']) ? $input['publikasi'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('publikasi'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="jenis_beasiswa" value="-" />

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/prestasi" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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