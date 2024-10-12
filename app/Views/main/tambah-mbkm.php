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
                <li class="breadcrumb-item active"><a href="/admin/mbkm">Laporan MBKM</a></li>
                <li class="breadcrumb-item active"><a href="/admin/mbkm/add">Tambah MBKM</a></li>
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

                    <!-- Form tambah laporan MBKM -->
                    <div class="card-body">
                        <form action="/admin/mbkm/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="npm-input" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3 <?= ($validation->hasError('npm')) ? ' is-invalid is-test' : ''; ?>" id="npm" name="npm" autofocus value="<?= old('npm', isset($input['npm']) ? $input['npm'] : ''); ?>">
                                            <div id="npm-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-8" style="display: none;">

                                                <?php foreach ($penerima as $key => $value) : ?>
                                                    <a id="npm-data" onclick="fillInputNPM('<?= $value['npm']; ?>','<?= $value['nama']; ?>','<?= $value['nama_prodi']; ?>')"><?= $value['npm']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="npm-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly id="npm-name" class="form-control custom-textfield <?= ($validation->hasError('nama')) ? ' is-invalid is-test' : ''; ?>" id="nama" name="nama" value="<?= old('nama', isset($input['nama']) ? $input['nama'] : ''); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly id="npm-ps" class="form-control custom-textfield <?= ($validation->hasError('prodi')) ? ' is-invalid is-test' : ''; ?>" id="prodi" name="prodi" value="<?= old('nama_prodi', isset($input['nama_prodi']) ? $input['nama_prodi'] : ''); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('prodi'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" id="jb-input" class="form-control custom-textfield <?= ($validation->hasError('jenis_beasiswa')) ? ' is-invalid is-test' : ''; ?>" id="jenis_beasiswa" name="jenis_beasiswa" value="<?= old('jenis_beasiswa', isset($input['jenis_beasiswa']) ? $input['jenis_beasiswa'] : ''); ?>">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                    <a id="jb-data" onclick="fillInputJB('<?= $value['jenis']; ?>')"><?= $value['jenis']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_beasiswa'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('nama_mbkm')) ? ' is-invalid is-test' : ''; ?>" id="nama_mbkm" name="nama_mbkm" value="<?= old('nama_mbkm', isset($input['nama_mbkm']) ? $input['nama_mbkm'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('nama_mbkm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="jenis_mbkm" class="form-control  custom-textfield col-lg-7 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="Pertukaran Pelajar">Pertukaran Pelajar</option>
                                                <option value="Magang / Praktik Kerja">Magang / Praktik Kerja</option>
                                                <option value="Mengajar di Sekolah">Mengajar di Sekolah</option>
                                                <option value="Penelitian / Riset">Penelitian / Riset</option>
                                                <option value="Proyek Kemanusiaan">Proyek Kemanusiaan</option>
                                                <option value="Proyek Desa">Proyek Desa</option>
                                                <option value="Wirausaha">Wirausaha</option>
                                                <option value="Studi/Proyek Independen">Studi/Proyek Independen</option>
                                                <option value="Pengabdian Mahasiswa kepada Masyarakat">Pengabdian Mahasiswa kepada Masyarakat</option>
                                            </select>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('jenis_mbkm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Periode</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control custom-textfield <?= ($validation->hasError('periode')) ? ' is-invalid is-test' : ''; ?>" id="periode" name="periode" value="<?= old('periode', isset($input['periode']) ? $input['periode'] : ''); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('periode'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield <?= ($validation->hasError('keterangan_mbkm')) ? ' is-invalid is-test' : ''; ?>" id="keterangan_mbkm" name="keterangan_mbkm" value="<?= old('keterangan_mbkm', isset($input['keterangan_mbkm']) ? $input['keterangan_mbkm'] : ''); ?>" rows="2"></textarea>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('keterangan_mbkm'); ?>
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