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
                <li class="breadcrumb-item active"><a href="/admin/mbkm/edit">Edit MBKM</a></li>
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

                    <!-- Form edit laporan MBKM -->
                    <div class="card-body">
                        <form action="/admin/mbkm/cedit/<?= $former->id_mbkm; ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="npm" value="<?= $former->npm; ?>" type="text" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="nama" value="<?= $former->nama; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input readonly name="prodi" value="<?= $former->nama_prodi; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" name="jenis_beasiswa" value="<?= $former->jenis; ?>" id="jb-input" class="form-control custom-textfield ">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                    <a id="jb-data" onclick="fillInputJB('<?= $value['jenis']; ?>')"><?= $value['jenis']; ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama Program MBKM</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input name="nama_mbkm" value="<?= $former->nama_mbkm; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
    <label class="label-form">Jenis Program MBKM</label>
    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
        <select name="jenis_mbkm" class="form-control custom-textfield col-lg-7 col-md-12 col-sm-12">
            <option value="" <?php echo empty($former->jenis_mbkm) ? 'selected' : ''; ?>>Pilih Jenis Program</option>
            <option value="Pertukaran Pelajar" <?php echo $former->jenis_mbkm == 'Pertukaran Pelajar' ? 'selected' : ''; ?>>Pertukaran Pelajar</option>
            <option value="Magang / Praktik Kerja" <?php echo $former->jenis_mbkm == 'Magang / Praktik Kerja' ? 'selected' : ''; ?>>Magang / Praktik Kerja</option>
            <option value="Mengajar di Sekolah" <?php echo $former->jenis_mbkm == 'Mengajar di Sekolah' ? 'selected' : ''; ?>>Mengajar di Sekolah</option>
            <option value="Penelitian / Riset" <?php echo $former->jenis_mbkm == 'Penelitian / Riset' ? 'selected' : ''; ?>>Penelitian / Riset</option>
            <option value="Proyek Kemanusiaan" <?php echo $former->jenis_mbkm == 'Proyek Kemanusiaan' ? 'selected' : ''; ?>>Proyek Kemanusiaan</option>
            <option value="Proyek Desa" <?php echo $former->jenis_mbkm == 'Proyek Desa' ? 'selected' : ''; ?>>Proyek Desa</option>
            <option value="Wirausaha" <?php echo $former->jenis_mbkm == 'Wirausaha' ? 'selected' : ''; ?>>Wirausaha</option>
            <option value="Studi/Proyek Independen" <?php echo $former->jenis_mbkm == 'Studi/Proyek Independen' ? 'selected' : ''; ?>>Studi/Proyek Independen</option>
            <option value="Pengabdian Mahasiswa kepada Masyarakat" <?php echo $former->jenis_mbkm == 'Pengabdian Mahasiswa kepada Masyarakat' ? 'selected' : ''; ?>>Pengabdian Mahasiswa kepada Masyarakat</option>
        </select>
        <div class="invalid-feedback">
        </div>
    </div>
</div>


                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Periode</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input name="periode" value="<?= $former->periode; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="keterangan_mbkm" value="<?= $former->keterangan_mbkm; ?>" class="form-control custom-textfield" rows="2"></textarea>
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