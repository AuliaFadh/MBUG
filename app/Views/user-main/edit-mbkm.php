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
                <li class="breadcrumb-item active"><a href="/user/mbkm/edit">Edit MBKM</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit MBKM</h3>
                        </div>
                    </div>
                    <?php if ($former->konfirmasi_mbkm == 0) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $former->konf_ket_mbkm ?>
                    </div>
                    <?php endif; ?>

                    <!-- Form edit laporan mbkm penerima beasiswa -->
                    <div class="card-body">
                        <form action="/user/mbkm/cedit/<?= $former->id_mbkm ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" name="nama_mbkm" value="<?= $former->nama_mbkm ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('nama_mbkm') ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="jenis_mbkm"
                                                class="form-control  custom-textfield col-lg-7 col-md-12 col-sm-12 <?= $validation->hasError('jenis_mbkm') ? ' is-invalid is-test' : '' ?>">
                                                <option></option>
                                                <option value="Pertukaran Pelajar" <?php echo $former->jenis_mbkm == 'Pertukaran Pelajar' ? 'selected' : ''; ?>>
                                                    <?php echo 'Pertukaran Pelajar'; ?></option>
                                                <option value="Magang / Praktik Kerja" <?php echo $former->jenis_mbkm == 'Magang / Praktik Kerja' ? 'selected' : ''; ?>>
                                                    <?php echo 'Magang / Praktik Kerja'; ?></option>
                                                <option value="Mengajar di Sekolah" <?php echo $former->jenis_mbkm == 'Mengajar di Sekolah' ? 'selected' : ''; ?>>
                                                    <?php echo 'Mengajar di Sekolah'; ?></option>
                                                <option value="Penelitian / Riset" <?php echo $former->jenis_mbkm == 'Penelitian / Riset' ? 'selected' : ''; ?>>
                                                    <?php echo 'Penelitian / Riset'; ?></option>
                                                <option value="Proyek Kemanusiaan" <?php echo $former->jenis_mbkm == 'Proyek Kemanusiaan' ? 'selected' : ''; ?>>
                                                    <?php echo 'Proyek Kemanusiaan'; ?></option>
                                                <option value="Proyek Desa" <?php echo $former->jenis_mbkm == 'Proyek Desa' ? 'selected' : ''; ?>><?php echo 'Proyek Desa'; ?>
                                                </option>
                                                <option value="Wirausaha" <?php echo $former->jenis_mbkm == 'Wirausaha' ? 'selected' : ''; ?>><?php echo 'Wirausaha'; ?>
                                                </option>
                                                <option value="Studi/Proyek Independen" <?php echo $former->jenis_mbkm == 'Studi/Proyek Independen' ? 'selected' : ''; ?>>
                                                    <?php echo 'Studi/Proyek Independen'; ?></option>
                                                <option value="Pengabdian Mahasiswa kepada Masyarakat"
                                                    <?php echo $former->jenis_mbkm == 'Pengabdian Mahasiswa kepada Masyarakat' ? 'selected' : ''; ?>><?php echo 'Pengabdian Mahasiswa kepada Masyarakat'; ?></option>
                                            </select>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Periode</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" name="periode" value="<?= $former->periode ?>"
                                                class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('periode') ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="keterangan_mbkm"
                                                class="form-control custom-textfield <?= $validation->hasError('keterangan_mbkm') ? ' is-invalid is-test' : '' ?>"
                                                rows="2"><?= $former->keterangan_mbkm ?></textarea>
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
