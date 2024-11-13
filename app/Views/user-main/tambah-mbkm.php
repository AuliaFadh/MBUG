<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/mbkm">Laporan MBKM</a></li>
                <li class="breadcrumb-item active"><a href="/user/mbkm/add">Tambah MBKM</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah MBKM</h3>
                        </div>
                    </div>

                    <!-- Form tambah data laporan MBKM penerima beasiswa -->
                    <div class="card-body">
                        <form action="/user/mbkm/save" method="post">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield <?= $validation->hasError('nama_mbkm') ? ' is-invalid is-test' : '' ?>"
                                                id="nama_mbkm" name="nama_mbkm"
                                                value="<?= old('nama_mbkm', isset($input['nama_mbkm']) ? $input['nama_mbkm'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('nama_mbkm') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="jenis_mbkm"
                                                class="form-control <?= $validation->hasError('jenis_mbkm') ? ' is-invalid is-test' : '' ?>  custom-textfield col-lg-7 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="Pertukaran Pelajar">Pertukaran Pelajar</option>
                                                <option value="Magang / Praktik Kerja">Magang / Praktik Kerja</option>
                                                <option value="Mengajar di Sekolah">Mengajar di Sekolah</option>
                                                <option value="Penelitian / Riset">Penelitian / Riset</option>
                                                <option value="Proyek Kemanusiaan">Proyek Kemanusiaan</option>
                                                <option value="Proyek Desa">Proyek Desa</option>
                                                <option value="Wirausaha">Wirausaha</option>
                                                <option value="Studi/Proyek Independen">Studi/Proyek Independen</option>
                                                <option value="Pengabdian Mahasiswa kepada Masyarakat">Pengabdian
                                                    Mahasiswa kepada Masyarakat</option>
                                            </select>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jenis_mbk') ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Periode</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield <?= $validation->hasError('periode') ? ' is-invalid is-test' : '' ?>"
                                                id="periode" name="periode"
                                                value="<?= old('periode', isset($input['periode']) ? $input['periode'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('periode') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea
                                                class="form-control custom-textfield <?= $validation->hasError('keterangan_mbkm') ? ' is-invalid is-test' : '' ?>"
                                                id="keterangan_mbkm" name="keterangan_mbkm"
                                                value="<?= old('keterangan_mbkm', isset($input['keterangan_mbkm']) ? $input['keterangan_mbkm'] : '') ?>"
                                                rows="2"></textarea>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('keterangan_mbkm') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="jenis_beasiswa" value="-" />

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/user/mbkm"
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
</div>
<?= $this->endSection('content') ?>
