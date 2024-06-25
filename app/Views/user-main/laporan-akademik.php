<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/akademik">Laporan Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/akademik.png'); ?>" alt="">
                            <h3>Laporan Akademik</h3>
                        </div>
                        <div>
                            <a href="/user/akademik/add" class="btn btn-primary-add-data">Tambah Data</a>
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
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-nm">Tahun Ajaran</th>
                                        <th class="th-sm">IPK</th>
                                        <th class="th-sm">IPK Lokal</th>
                                        <th class="th-sm">IPK UU</th>
                                        <th class="th-sm">Rangkuman Nilai</th>
                                        <th class="th-sm">Status Konfirmasi</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data laporan akademik penerima beasiswa -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($la as $key => $value) : ?>
                                        <?php if ($value["npm"] == session()->get('username')) : ?>
                                            <?php $no++; ?>
                                            <tr 
                                            <?php if($value['konfirmasi_akademik'] == "0")
                                                echo 'style="background-color: #ffdfdf!important;"'
                                            ?>
                                           >
                                                <td class="th-sm"><strong><?= $no; ?></strong></td>
                                                <td class="th-lg"><?= $value['jenis']; ?></td>
                                                <td class="th-sm"><?= $value['semester']; ?></td>
                                                <td class="th-nm"><?= $value['tahun_ajaran']; ?></td>
                                                <td class="th-sm"><?= $value['ipk']; ?></td>
                                                <td class="th-sm"><?= $value['ipk_lokal']; ?></td>
                                                <td class="th-sm"><?= $value['ipk_uu']; ?></td>
                                                <td class="th-sm">
                                                    <a title="Lihat File" href="<?= base_url('asset/doc/database/rangkuman_nilai/' . $value['rangkuman_nilai']); ?>">
                                                        <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                                    </a>
                                                </td>
                                                <?php if ($value['konfirmasi_akademik'] == "1") {
                                                    $confirm = '<span class="status_akademik badge badge-rounded badge-success">Disetujui</span>';
                                                } else if ($value['konfirmasi_akademik'] == "0") {
                                                    $confirm = '<span class="status_akademik badge badge-rounded badge-danger">Ditolak</span>';
                                                } else if ($value['konfirmasi_akademik'] == "2") {
                                                    $confirm = '<span class="status_akademik badge badge-rounded badge-warning">Diproses<span>';
                                                };
                                                ?>
                                                <td class="th-sm"><?= $confirm; ?></td>
                                                <td class="th-sm"> <a href="<?= base_url('/user/akademik/edit/' . $value['id_akademik']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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