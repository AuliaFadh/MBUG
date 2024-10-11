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
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/mbkm.png'); ?>" alt="">
                            <h3>Laporan MBKM</h3>
                        </div>
                        <div>
                            <a href="/admin/mbkm/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('berhasil'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('gagal'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-nm">NPM</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-lg">Nama Program MBKM</th>
                                        <th class="th-nm">Jenis Program MBKM</th>
                                        <th class="th-sm">Periode</th>
                                        <th class="th-lg">Keterangan</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data laporan MBKM -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($mbkm as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-sm"><?= $value['npm']; ?></td>
                                            <td class="th-nm"><?= $value['nama']; ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi']; ?></td>
                                            <td class="th-lg"><?= $value['jenis']; ?></td>
                                            <td class="th-lg"><?= $value['nama_mbkm']; ?></td>
                                            <td class="th-nm"><?= $value['jenis_mbkm']; ?></td>
                                            <td class="th-sm"><?= $value['periode']; ?></td>
                                            <td class="th-lg"><?= $value['keterangan_mbkm']; ?></td>
                                            <td class="th-sm"><a href="<?= base_url('/admin/mbkm/edit/' . $value['id_mbkm']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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