<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/gform">Link Google Form</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/gform.png'); ?>" alt="">
                            <h3>Link Google Form</h3>
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
                    <?php if (session()->getFlashdata('hapus')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('hapus'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="add-btn-behav-custom">
                        <a class="add-btn-custom" href="/admin/gform/add" aria-expanded="false">
                            <img src="<?= base_url('asset/img/cross-icon.png'); ?>">
                            Tambah tautan
                        </a>
                    </div>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="">No</th>
                                        <th class="th-nm">Nama Form</th>
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-nm">Tautan</th>
                                        <th class="th-sm">Tanggal Pembuatan</th>
                                        <th class="th-nm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data link gform -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($lgf as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class=""><strong><?= $no; ?></strong></td>
                                            <td class="th-nm"><?= $value['nama_form']; ?></td>
                                            <td class="th-lg"><?= $value['jenis']; ?></td>
                                            <td class="th-nm"><a href="<?= $value['tautan']; ?>" type="link"><?= $value['tautan']; ?></a></td>
                                            <td class="th-sm"><?= $value['tanggal_pembuatan']; ?></td>
                                            <td class="th-nm">
                                                <a href="<?= base_url('/admin/gform/edit/' . $value['id_lgf']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <button onclick="deleteConfirmation_gform(<?= $value['id_lgf']; ?>)" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
                                            </td>
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