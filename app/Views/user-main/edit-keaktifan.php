<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/keaktifan">Laporan Keaktifan</a></li>
                <li class="breadcrumb-item active"><a href="/user/keaktifan/edit">Edit Keaktifan</a></li>
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
                    <?php if ($former->konfirmasi_keaktifan == 0) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $former->konf_ket_keaktifan ?>
                    </div>
                    <?php endif; ?>

                    <!-- Form edit data keaktifan per semester penerima beasiswa -->
                    <div class="card-body">
                        <form action="/user/keaktifan/cedit/<?= $former->id_keaktifan ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="jenis_beasiswa" value="<?= $former->jenis ?>"
                                                id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7"
                                                style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                <a id="jb-data"
                                                    onclick="fillInputJB('<?= $value['jenis'] ?>')"><?= $value['jenis'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
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

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                            <input required type="text" id="find-ta"
                                                class="form-control custom-textfield " name="TA"
                                                value="<?= $former->tahun_ajaran ?>">
                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($TA as $key => $TAval) : ?>
                                                <a id="ta-data"
                                                    onclick="fillInputTA('<?= $TAval['nama_tahun'] ?>')"><?= $TAval['nama_tahun'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="no-data-find-ta" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_tahun') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100 ">
                                            <label class="label-form">KRS</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/krs/' . $former->krs) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="krs" class="dropify" data-default-file=""
                                                accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" min="0" step="10000"
                                                class="form-control custom-textfield <?= $validation->hasError('jumlah_ditagihkan') ? ' is-invalid is-test' : '' ?>"
                                                id="jumlah_ditagihkan" name="jumlah_ditagihkan"
                                                value="<?= $former->jumlah_ditagihkan ?>" onkeyup="formatRupiah(this)">
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
                                            <label class="label-form"> Blanko Pembayaran</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/blanko_pembayaran/' . $former->blanko_pembayaran) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="blanko_pembayaran" class="dropify"
                                                data-default-file="" accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form"> Bukti Pembayaran</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= base_url('asset/doc/database/bukti_pembayaran/' . $former->bukti_pembayaran) ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input type="file" name="bukti_pembayaran" class="dropify"
                                                data-default-file="" accept=".pdf">
                                        </div>
                                    </div>


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/keaktifan"
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
    <?= $this->endSection('content') ?>
