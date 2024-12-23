<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Keaktifan per Semester</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan/edit">Edit Keaktifan</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Keaktifan</h3>
                        </div>
                    </div>

                    <!-- Form Edit Keaktifan per Semester -->
                    <div class="card-body">
                        <form action="/admin/keaktifan/cedit/<?= $former->id_keaktifan ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="npm" class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                            <input required readonly type="text" id="find-npm"
                                                class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3 <?= $validation->hasError('npm') ? ' is-invalid is-test' : '' ?>"
                                                name="npm" autofocus value="<?= $former->npm ?>">

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input name="nama" value="<?= $former->nama ?>" type="text" readonly
                                                class="form-control custom-textfield ">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="prodi" value="<?= $former->nama_prodi ?>"
                                                readonly class="form-control custom-textfield ">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5 ">
                                            <input type="number" name="semester" value="<?= $former->semester ?>" min=1
                                                max=14 class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-TA"
                                        class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                            <input type="text" id="find-ta" name="TA"
                                                value="<?= $former->tahun_ajaran ?>"
                                                class="form-control custom-textfield <?= $validation->hasError('TA') ? ' is-invalid is-test' : '' ?>"
                                                autofocus>

                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($TA as $key => $TAValue) : ?>
                                                <a id="data-find-ta"
                                                    onclick="fillFindInput('find-ta','<?= $TAValue['nama_tahun'] ?>')"><?= $TAValue['nama_tahun'] ?></a>
                                                <?php endforeach; ?>
                                                <span id="no-data-find-ta" style="display: none;">Data tidak
                                                    ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('TA') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-jenis_beasiswa"
                                        class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
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

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100 ">
                                            <label class="label-form">Upload KRS</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/krs/' . $former->krs) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="krs" class="dropify"
                                                data-default-file="">
                                        </div>
                                    </div>
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" min="0" step="10000"
                                                class="form-control custom-textfield <?= $validation->hasError('jumlah_ditagihkan') ? ' is-invalid is-test' : '' ?>"
                                                id="jumlah_ditagihkan" name="jumlah_ditagihkan"
                                                value="<?= $former->jumlah_ditagihkan ?>"
                                                onkeyup="formatRupiah(this)">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_ditagihkan') ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jumlah Potongan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" min="0" step="10000"
                                                class="form-control custom-textfield <?= $validation->hasError('jumlah_potongan') ? ' is-invalid is-test' : '' ?>"
                                                id="jumlah_potongan" name="jumlah_potongan"
                                                value="<?= $former->jumlah_potongan ?>" onkeyup="formatRupiah(this)">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jumlah_potongan') ?>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Blanko Pembayaran</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/blanko_pembayaran/' . $former->blanko_pembayaran) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="blanko_pembayaran" class="dropify"
                                                data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Bukti Pembayaran</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/bukti_pembayaran/' . $former->bukti_pembayaran) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="bukti_pembayaran" class="dropify"
                                                data-default-file="">
                                        </div>
                                    </div>
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Konfirmasi Dokumen</label>
                                        <div style="display: block; margin-left:20px;"
                                            class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="konfirmasi_keaktifan"
                                                    class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">
                                                    <option value="2"<?php echo isset($former->konfirmasi_keaktifan) && $former->konfirmasi_keaktifan == '2' ? 'selected' : ''; ?>>Diproses</option>
                                                    <option value="1"<?php echo isset($former->konfirmasi_keaktifan) && $former->konfirmasi_keaktifan == '1' ? 'selected' : ''; ?>>Disetujui</option>
                                                    <option value="0"<?php echo isset($former->konfirmasi_keaktifan) && $former->konfirmasi_keaktifan == '0' ? 'selected' : ''; ?>>Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield " id="keterangan" name="konf_ket_keaktifan" autofocus=""
                                                value="" rows="2"><?= $former->konf_ket_keaktifan ?></textarea>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/keaktifan"
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

            const findta = document.getElementById('find-ta');
            findta.addEventListener('input', function() {
                findResult('find-ta');
            });
            findta.addEventListener('blur', function() {
                hideResult('find-ta');
            });

        });
    </script>
    <?= $this->endSection('content') ?>
