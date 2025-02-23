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
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/mbkm.png') ?>"
                                alt="">
                            <h3>Laporan MBKM</h3>
                        </div>
                        <div>
                            <a href="/user/mbkm/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('berhasil') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal') ?>
                    </div>
                    <?php endif; ?>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-lg">Nama Program MBKM</th>
                                        <th class="th-nm">Jenis Program MBKM</th>
                                        <th class="th-sm">Periode</th>
                                        <th class="th-nm">Keterangan</th>
                                        <th class="th-nm">Status Konfirmasi</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data laporan MBKM penerima beasiswa -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($mbkm as $key => $value) : ?>
                                    <?php if ($value["npm"] == session()->get('username')) : ?>
                                    <?php $no++; ?>
                                    <tr <?php if ($value['konfirmasi_mbkm'] == '0') {
                                        echo 'style="background-color: #ffdfdf!important;"';
                                    }
                                    ?>>
                                        <td class="th-sm"><strong><?= $no ?></strong></td>
                                        <td class="th-lg"><?= $value['nama_mbkm'] ?></td>
                                        <td class="th-nm"><?= $value['jenis_mbkm'] ?></td>
                                        <td class="th-sm"><?= $value['periode'] ?></td>
                                        <td class="th-nm"><?= $value['keterangan_mbkm'] ?></td>
                                        <?php if ($value['konfirmasi_mbkm'] == '1') {
                                            $confirm = '<span class="status_mbkm badge badge-rounded badge-success">Disetujui</span>';
                                        } elseif ($value['konfirmasi_mbkm'] == '0') {
                                            $confirm = '<span class="status_mbkm badge badge-rounded badge-danger">Ditolak</span>';
                                        } elseif ($value['konfirmasi_mbkm'] == '2') {
                                            $confirm = '<span class="status_mbkm badge badge-rounded badge-warning">Diproses<span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $confirm ?></td>
                                        <?php if ($value['konfirmasi_mbkm'] == '1') : ?>
                                        <td> <a href="<?= base_url('/user/mbkm/edit/' . $value['id_mbkm']) ?>"
                                                class="btn btn-sm btn-secondary disabled"><i class="la la-pencil"></i></a></td>
                                        <?php endif; ?>
                                        <?php if ($value['konfirmasi_mbkm'] != '1') : ?>
                                        <td> <a href="<?= base_url('/user/mbkm/edit/' . $value['id_mbkm']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
                                        <?php endif; ?>
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
