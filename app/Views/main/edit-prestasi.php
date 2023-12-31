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
                <li class="breadcrumb-item active"><a href="/admin/prestasi">Laporan Prestasi</a></li>
                <li class="breadcrumb-item active"><a href="/admin/prestasi/edit">Edit Prestasi</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Prestasi</h3>
                        </div>
                    </div>

                    <!-- Form edit laporan prestasi -->
                    <div class="card-body">
                        <form action="/admin/prestasi/cedit/<?= $former->id_prestasi; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="npm" value="<?= $former->npm; ?>" type="text" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="nama" value="<?= $former->nama; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="prodi" value="<?= $former->prodi; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="jenis_beasiswa" value="<?= $former->jenis; ?>" id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                    <a id="jb-data" onclick="fillInputJB('<?= $value['jenis']; ?>')"><?= $value['jenis']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tingkat</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
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
                                        <label class="label-form">Nama Kegiatan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="nama_kegiatan" value="<?= $former->nama_kegiatan; ?>" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Capaian</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
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
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="tempat" value="<?= $former->tempat; ?>" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tanggal Pembuatan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input name="datepicker" class="custom-textfield datepicker-default form-control col-lg-4 col-md-5 col-sm-6" id="datepicker">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Penyelenggara</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="penyelenggara" value="<?= $former->penyelenggara; ?>" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form">Upload Bukti</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya" href="<?= base_url('asset/doc/database/bukti_prestasi/' . $former->bukti_prestasi); ?>"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a>
                                            <input style="padding-left : 15px;" name="bukti_prestasi" type="file" class="dropify" data-default-file="">

                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tautan Publikasi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="url" name="publikasi" value="<?= $former->publikasi; ?>" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/prestasi" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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