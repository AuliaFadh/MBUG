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
                        <form action="/admin/prestasi/cedit/<?= $former->id_prestasi ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="npm" value="<?= $former->npm ?>" type="text"
                                                class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="nama" value="<?= $former->nama ?>" type="text"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="prodi" value="<?= $former->nama_prodi ?>"
                                                type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-jenis_beasiswa"
                                        class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>

                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                            <input type="text" id="find-jb" name="jenis_beasiswa"
                                                value="<?= $former->jenis ?>"
                                                class="form-control custom-textfield <?= $validation->hasError('jenis_beasiswa') ? ' is-invalid is-test' : '' ?>"
                                                autofocus>

                                            <div id="box-find-jb" class="dropdown-custom col-lg-10 col-md-10 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($jenis_beasiswa as $key => $jenis_beasiswaValue) : ?>
                                                <a id="data-find-jb"
                                                    onclick="fillFindInput('find-jb','<?= $jenis_beasiswaValue['jenis'] ?>')"><?= $jenis_beasiswaValue['jenis'] ?></a>
                                                <?php endforeach; ?>
                                                <span id="no-data-find-jb" style="display: none;">Data tidak
                                                    ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_beasiswa') ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12">
                                        <label class="label-form">Tingkat</label>
                                        <div style="display: block;" class="col-lg-8 col-md-12 col-sm-12">
                                            <select name="tingkat"
                                                class="form-control custom-textfield col-lg-4 col-md-4 col-sm-4">
                                                <option value=""></option>
                                                <option value="Internasional" <?php echo $former->tingkat == 'Internasional' ? 'selected' : ''; ?>>Internasional</option>
                                                <option value="Nasional" <?php echo $former->tingkat == 'Nasional' ? 'selected' : ''; ?>>Nasional</option>
                                                <option value="Provinsi" <?php echo $former->tingkat == 'Provinsi' ? 'selected' : ''; ?>>Provinsi</option>
                                                <option value="Wilayah" <?php echo $former->tingkat == 'Wilayah' ? 'selected' : ''; ?>>Wilayah</option>
                                                <option value="Internal" <?php echo $former->tingkat == 'Internal' ? 'selected' : ''; ?>>Internal</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tingkat') ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div style="padding-left : 20px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12">
                                        <label for="jenis_prestasi" class="label-form">Jenis Prestasi</label>

                                        <!-- Radio Button untuk "Tim" -->
                                        <input type="radio" class="margin-custom" name="jenis_prestasi" value="1"
                                            <?php echo isset($former->jenis_prestasi) && $former->jenis_prestasi == '1' ? 'checked' : ''; ?>> Tim<br>

                                        <!-- Radio Button untuk "Individu" -->
                                        <input type="radio" class="margin-custom" name="jenis_prestasi" value="0"
                                            <?php echo isset($former->jenis_prestasi) && $former->jenis_prestasi == '0' ? 'checked' : ''; ?>> Individu<br>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Kegiatan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="nama_kegiatan"
                                                value="<?= $former->nama_kegiatan ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12">
                                        <label class="label-form">Capaian</label>
                                        <div style="display: block;" class="col-lg-8 col-md-12 col-sm-12">
                                            <select name="capaian" id="capaian" onchange="checkOther()"
                                                class="form-control custom-textfield col-lg-6 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="Juara I" <?php echo isset($former->capaian) && $former->capaian == 'Juara I' ? 'selected' : ''; ?>>Juara I</option>
                                                <option value="Juara II" <?php echo isset($former->capaian) && $former->capaian == 'Juara II' ? 'selected' : ''; ?>>Juara II</option>
                                                <option value="Juara III" <?php echo isset($former->capaian) && $former->capaian == 'Juara III' ? 'selected' : ''; ?>>Juara III</option>
                                                <option value="Harapan I" <?php echo isset($former->capaian) && $former->capaian == 'Harapan I' ? 'selected' : ''; ?>>Harapan I</option>
                                                <option value="Harapan II" <?php echo isset($former->capaian) && $former->capaian == 'Harapan II' ? 'selected' : ''; ?>>Harapan II</option>
                                                <option value="Harapan III" <?php echo isset($former->capaian) && $former->capaian == 'Harapan III' ? 'selected' : ''; ?>>Harapan III</option>
                                                <option value="Harapan IV" <?php echo isset($former->capaian) && $former->capaian == 'Harapan IV' ? 'selected' : ''; ?>>Harapan IV</option>
                                                <option value="Partisipatif" <?php echo isset($former->capaian) && $former->capaian == 'Partisipatif' ? 'selected' : ''; ?>>Partisipatif</option>
                                                <option value="Finalis" <?php echo isset($former->capaian) && $former->capaian == 'Finalis' ? 'selected' : ''; ?>>Finalis</option>

                                                <option value="Lainnya" <?php echo isset($former->capaian) && !in_array($former->capaian, ['Juara I', 'Juara II', 'Juara III', 'Harapan I', 'Harapan II', 'Harapan III', 'Harapan IV', 'Partisipatif', 'Finalis']) ? 'selected' : ''; ?>>Lainnya</option>
                                            </select>
                                            <input type="text" id="capaian-other" name="other_form"
                                                value="<?= isset($former->capaian) && !in_array($former->capaian, ['Juara I', 'Juara II', 'Juara III', 'Harapan I', 'Harapan II', 'Harapan III', 'Harapan IV', 'Partisipatif', 'Finalis']) ? $former->capaian : '' ?>"
                                                class="form-control custom-textfield col-lg-6 col-md-6 col-sm-6 custom-other-option <?= isset($former->capaian) && !in_array($former->capaian, ['Juara I', 'Juara II', 'Juara III', 'Harapan I', 'Harapan II', 'Harapan III', 'Harapan IV', 'Partisipatif', 'Finalis']) ? '' : 'hidden-other-option' ?> "
                                                placeholder="Isi pencapaian lain..." value="<?php echo isset($former->other_form) ? $former->other_form : ''; ?>">
                                            <!-- Task-BE -->
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('capaian') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tempat</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="tempat" value="<?= $former->tempat ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tanggal Pelaksanaan</label>
                                        <div style="display: block;margin-left:15px;"
                                            class=" col-lg-8 col-md-12 col-sm-12">
                                            <div class="row">
                                                <input id="tgl_mulai_pelaksana" name="tanggal-mulai" type="text"
                                                    value="<?= date('d F, Y', strtotime($former->tanggal_mulai)) ?>"
                                                    class="custom-textfield datepicker-default form-control col-lg-4 col-md-5 col-sm-6 ">
                                                <pre>  Sampai dengan  </pre>
                                                <input id="tgl_akhir_pelaksana" name="tanggal-selesai"
                                                    value="<?= date('d F, Y', strtotime($former->tanggal_selesai)) ?>"
                                                    type="text"
                                                    class="custom-textfield datepicker-default form-control col-lg-4 col-md-5 col-sm-6 ">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Penyelenggara</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="penyelenggara"
                                                value="<?= $former->penyelenggara ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form">Upload Bukti</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/bukti_prestasi/' . $former->bukti_prestasi) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input style="padding-left : 15px;" name="bukti_prestasi" type="file"
                                                class="dropify" data-default-file="">

                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tautan Publikasi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="url" name="publikasi" value="<?= $former->publikasi ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Konfirmasi Dokumen</label>
                                        <div style="display: block; margin-left:20px;"
                                            class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="konfirmasi_prestasi"
                                                    class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">
                                                    <option value="2" <?php if ($former->konfirmasi_prestasi == 2) {
                                                        echo 'selected';
                                                    } ?>>Diproses</option>
                                                    <option value="1" <?php if ($former->konfirmasi_prestasi == 1) {
                                                        echo 'selected';
                                                    } ?>>Disetujui</option>
                                                    <option value="0" <?php if ($former->konfirmasi_prestasi == 0) {
                                                        echo 'selected';
                                                    } ?>>Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield " id="keterangan" name="konf_ket_prestasi" autofocus=""
                                                value="" rows="2"><?= $former->konf_ket_prestasi ?></textarea>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/prestasi"
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const findjb = document.getElementById('find-jb');
            findjb.addEventListener('input', function() {
                findResult('find-jb');
            });
            findjb.addEventListener('blur', function() {
                hideResult('find-jb');
            });



        });
    </script>
    <?= $this->endSection('content') ?>
