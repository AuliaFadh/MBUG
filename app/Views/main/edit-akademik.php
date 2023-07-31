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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akadmik/edit">Edit Akademik</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Edit Akademik</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly value="{10120544}" type="text" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly value="{diisi dari database}" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input readonly value="{diisi dari database}" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" value="{diisi dari database}" id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-search" class="dropdown-custom col-lg-12 col-md-12 col-sm-12" style="display: none;">

                                                <a id="jb-data" onclick="fillInputJB('Dicoding Indonesia')">Dicoding Indoneisa </a>
                                                <a id="jb-data" onclick="fillInputJB('KIPK')">KIPK </a>
                                                <a id="jb-data" onclick="fillInputJB('Kementrian Pertahanan Indonesia')">Kementrian Pertahanan Indonesia</a>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5">
                                            <input value="-99" type="number" min=1 max=14 class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form" style="margin-right: 20px;">Tahun Ajaran</label>


                                        <select class="form-control  custom-textfield col-lg-3 col-md-4 col-sm-6">
                                            <option></option>
                                            <option value="2018">ATA</option>
                                            <option value="2018">PTA</option>
                                        </select>
                                        <input required type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                        <h3>/</h3>
                                        <input required type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                    </div>




                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input value="-99" min=0 max=4 step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK Local</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input value="-99" min=0 max=4 step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK UU</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input value="-99" min=0 max=4 step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100 ">
                                            <label class="label-form">Rangkuman Nilai</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a>
                                            <input value="-99" type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>




                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/akademik" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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