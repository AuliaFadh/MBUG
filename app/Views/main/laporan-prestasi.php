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
                <li class="breadcrumb-item active"><a href="/admin/prestasi">Laporan Prestasi</a></li>


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
                            <a href="/admin/prestasi/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
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
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-nm"><?= $value['nama']; ?></td>
                                            <td class="th-sm"><?= $value['npm']; ?></td>
                                            <td class="th-nm"><?= $value['prodi']; ?></td>
                                            <td class="th-lg"><?= $value['jenis']; ?></td>
                                            <td class="th-sm"><?= $value['tingkat']; ?></td>
                                            <td class="th-nm"><?= $value['jenis_prestasi']; ?></td>
                                            <td class="th-sm"><?= $value['nama_kegiatan']; ?></td>
                                            <td class="th-sm"><?= $value['capaian']; ?></td>
                                            <td class="th-sm"><?= $value['tempat']; ?></td>
                                            <td class="th-sm"><?= $value['tanggal']; ?></td>
                                            <td class="th-sm"><?= $value['penyelenggara']; ?></td>
                                            <td class="th-sm">
                                                <a title="Lihat File" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                                </a>
                                            </td>
                                            <td class="th-sm"><?= $value['publikasi']; ?></td>
                                            <td class="th-sm"> <a href="/admin/prestasi/edit/$1" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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