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
                <li class="breadcrumb-item active"><a href="/admin/mbkm">Laporan MBKM</a></li>
                <li class="breadcrumb-item active"><a href="/admin/mbkm/add">Tambah MBKM</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Tambah MBKM</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-3 col-md-5 col-sm-3">
                                            <input type="text" id="npm-input" class="form-control custom-textfield ">
                                            <div id="npm-drop-down" class="card-body  custom-textfield col-lg-12 col-md-12 col-sm-7" style="display: none;">
                                                <span id="npm">10120544 </span>
                                                <span id="npm">102322 </span>
                                                <span id="npm">1203244 </span>
                                                <span id="npm">1203214</span>
                                                <span id="npm">1203244</span>
                                                <span id="npm">12042244</span>
                                                <span id="npm">1203244</span>
                                                <span id="npm">113244</span>
                                                <span id="npm">1203244</span>
                                                <span id="npm">1323244</span>
                                                <span id="npm">13213244</span>
                                                <span id="npm-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-10 col-sm-8">
                                            <input type="text" id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-drop-down" class="card-body  custom-textfield col-lg-12 col-md-12 col-sm-7" style="display: none;">
                                                <span id="jb">Kartu Indonesia Pintar </span>
                                                <span id="jb">DIcoding </span>
                                                <span id="jb">Bangkit </span>
                                                <span id="jb">1203214</span>
                                                <span id="jb">1203244</span>
                                                <span id="jb">12042244</span>
                                                <span id="jb">1203244</span>
                                                <span id="jb">113244</span>
                                                <span id="jb">1203244</span>
                                                <span id="jb">1323244</span>
                                                <span id="jb">13213244</span>
                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select class="form-control  custom-textfield col-lg-7 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="2018">Pertukaran Pelajar</option>
                                                <option value="2019"> Magang / Praktik Kerja</option>
                                                <option value="2019"> Mengajar di Sekolah</option>
                                                <option value="2019"> Penelitian / Riset</option>
                                                <option value="2019"> Proyek Kemanusiaan</option>
                                                <option value="">Proyek Desa</option>
                                                <option value=""> Wirausaha</option>
                                                <option value=""> Studi/Proyek Independen</option>
                                                <option value="">Pengabdian Mahasiswa kepada Masyarakat</option>

                                            </select>

                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Periode</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield" rows="2"></textarea>
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/mbkm" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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