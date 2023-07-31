<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
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
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                                                <a id="jb-data" onclick="fillInputJB('Dicoding Indonesia')">Dicoding Indoneisa </a>
                                                <a id="jb-data" onclick="fillInputJB('KIPK')">KIPK </a>
                                                <a id="jb-data" onclick="fillInputJB('Kementrian Pertahanan Indonesia')">Kementrian Pertahanan Indonesia</a>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5 ">
                                            <input type="number" min=1 max=14 class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block; margin-left:20px;" class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select class="form-control  custom-textfield col-lg-3 col-md-4 col-sm-6">
                                                    <option></option>
                                                    <option value="2018">PTA</option>
                                                    <option value="2018">ATA</option>
                                                </select>
                                                <input required min="1981" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                                                <h3>/</h3>
                                                <input required min="1982" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">



                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="form-group row fallback w-100 ">
                                            <label class="label-form">Upload KRS</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a>
                                            <input type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="number" min=0 step="10000" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jumlah Potongan</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="number" min=0 step="10000" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Blanko Pembayaran</label>
                                            <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a>
                                            <input type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group row fallback w-100">
                                            <label class="label-form">Upload Bukti Pembayaran</label>
                                            
                                                <a style=" margin-left :15px" title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a>
                                                <input type="file" class="dropify" data-default-file="">
                                            
                                        </div>
                                    </div>

                                    <div style="padding-left : 20px" class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="2"> Lulus<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0"> Tidak Aktif<br>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/keaktifan" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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