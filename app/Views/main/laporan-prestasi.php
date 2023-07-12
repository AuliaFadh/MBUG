<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/dashboard">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/prestasi">Laporan Prestasi</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Laporan Prestasi</h3>
                        </div>
                        <div>
                            <a href="/prestasi/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-sm">NPM</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-nm">Tingkat</th>
                                        <th class="th-sm">Jenis Prestasi</th>
                                        <th class="th-nm">Nama Kegiatan</th>
                                        <th class="th-sm">Capaian</th>
                                        <th class="th-nm">Tempat</th>
                                        <th class="th-nm">Tanggal</th>
                                        <th class="th-nm">Penyelenggara</th>
                                        <th class="th-sm">Bukti Prestasi</th>
                                        <th class="th-nm">Tautan Publikasi</th>
                                        <th class="th-sm">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($lp as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['npm']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['jenis_beasiswa']; ?></td>
                                            <td><?= $value['tingkat']; ?></td>
                                            <td><?= $value['jenis_prestasi'] == "1" ? "Tim" : "Individu"; ?></td>
                                            <td><?= $value['nama_kegiatan']; ?></td>
                                            <td><?= $value['capaian']; ?></td>
                                            <td><?= $value['tempat']; ?></td>
                                            <td><?= $value['tanggal']; ?></td>
                                            <td><?= $value['penyelenggara']; ?></td>
                                            <td><?= $value['bukti_prestasi']; ?></td>
                                            <td><?= $value['publikasi']; ?></td>
                                            <td> <a href="/prestasi/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>