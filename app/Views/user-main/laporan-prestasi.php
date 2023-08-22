<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/prestasi">Laporan Prestasi</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/prestasi.png'); ?>" alt="">
                            <h3>Laporan Prestasi</h3>
                        </div>
                        <div>
                            <a href="/user/prestasi/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No.</th>
                                        <th class="th-nm">Tanggal</th>
                                        <th class="th-lg">Nama Kegiatan</th>
                                        <th class="th-nm">Tingkat</th>
                                        <th class="th-sm">Jenis Prestasi</th>
                                        <th class="th-sm">Capaian</th>
                                        <th class="th-nm">Tempat</th>
                                        <th class="th-nm">Penyelenggara</th>
                                        <th class="th-sm">Bukti Prestasi</th>
                                        <th class="th-nm">Tautan Publikasi</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($lp as $key => $value) : ?>
                                        <?php if ($value["npm"] == session()->get('username')) : ?>
                                            <?php $no++; ?>
                                            <tr>
                                                <td class="th-sm"><strong><?= $no; ?></strong></td>
                                                <?php
                                                $tgl = date_create_from_format('Y-m-d', $value['tanggal']);
                                                ?>
                                                <td class="th-nm"><?= $tgl->format('d M Y'); ?></td>
                                                <td class="th-lg"><?= $value['nama_kegiatan']; ?></td>
                                                <td class="th-nm"><?= $value['tingkat']; ?></td>
                                                <?php if ($value['jenis_prestasi'] == "1") {
                                                    $jenis_prestasi = '<span class="badge badge-rounded badge-primary"> Tim </span>';
                                                } else if ($value['jenis_prestasi'] == "0") {
                                                    $jenis_prestasi = '<span class="badge badge-rounded badge-success"> Individu </span>';
                                                };
                                                ?>
                                                <td class="th-sm"><?= $jenis_prestasi; ?></td>
                                                <td class="th-sm"><?= $value['capaian']; ?></td>
                                                <td class="th-nm"><?= $value['tempat']; ?></td>
                                                <td class="th-nm"><?= $value['penyelenggara']; ?></td>
                                                <td class="th-sm">
                                                    <a title="Lihat File" href="<?= base_url('asset/doc/buku-panduan.pdf'); ?>">
                                                        <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                                    </a>
                                                </td>
                                                <td class="th-nm"><?= $value['publikasi']; ?></td>
                                                <td> <a href="prestasi/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
                                            </tr>
                                        <?php endif; ?>
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