<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>

    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= esc(base_url('asset/img/Home.png'),'url') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/user/akadmik/edit">Edit Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Akademik</h3>
                        </div>
                    </div>

                  

                    <!-- Form Edit laporan akademik penerima beasiswa -->
                    <div class="card-body">
                        <form action="/user/akademik/cedit/<?= esc($dataLA->uuid_la) ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">

                                            <input name="jenis_beasiswa" value="<?= esc($dataLA->jenis,'attr') ?>" type="text"
                                                id="jb-input" class="form-control custom-textfield ">

                                            <div id="box-find-jb" class="dropdown-custom col-lg-8 col-md-8 col-sm-7"
                                                style="display: none;">

                                                <?php foreach ($listDataJB as $key => $DataJB) : ?>
                                                <a id="data-find-jb"
                                                    onclick="fillFindInput('find-jb','<?= esc($DataJB['jenis'],'js') ?>')">
                                                    <?= esc($DataJB['jenis']) ?></a>                            
                                                <?php endforeach; ?>

                                                <span id="no-data-find-jb" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_beasiswa') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5">
                                            <input name="semester" value="<?= esc($dataLA->semester,'attr' )?>" type="number" min=1
                                                max=14 class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                            <?= $validation->getError('semester') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div name="input-find&fill-TA"
                                    class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">

                                            <input required type="text" id="find-ta"
                                                value="<?= esc( $dataLA->tahun_ajaran ,'attr')?>"
                                                class="form-control custom-textfield " name="TA">

                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($listDataTA as $key => $DataTA) : ?>
                                                <a id="data-find-ta"
                                                    onclick="fillFindInput('find-ta','<?= esc( $DataTA['nama_tahun'] ,'js')?>')"><?= esc( $DataTA['nama_tahun'] ,'js')?></a>                                                    
                                                <?php endforeach; ?>
                                                <span id="no-data-find-ta" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('TA') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 name="ipk" value="<?= esc($dataLA->ipk,'attr') ?>" step=0.01
                                                type="number" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('ipk') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK Lokal</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 name="ipk_lokal" value="<?= esc($dataLA->ipk_lokal,'attr') ?>"
                                                step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('ipk_lokal') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK UU</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 name="ipk_uu" value="<?= esc($dataLA->ipk_uu,'attr') ?>" step=0.01
                                                type="number" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('ipk_uu') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form"> Rangkuman Nilai(pdf)</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya"
                                                href="<?= esc(base_url('asset/doc/database/rangkuman_nilai/' .$dataLA->rangkuman_nilai),'url') ?>"><img
                                                    id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>"
                                                    alt=""></a>
                                            <input style="padding-left : 15px;" type="file" name="rangkuman_nilai"
                                                class="dropify " data-default-file="" accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/akademik"
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

<script src="<?= base_url('asset/js/custom-search-ta.js') ?>"></script>
<?= $this->endSection('content') ?>
