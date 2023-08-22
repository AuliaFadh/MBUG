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
                        Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="/admin/manajemen">Manajemen Pengguna</a>
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/manajemen.png'); ?>" alt="">
                            <h3>Manajemen Pengguna</h3>
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
                    <?php if (session()->getFlashdata('hapus')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('hapus'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="add-btn-behav-custom">
                        <a class="add-btn-custom" href="/admin/manajemen/add" aria-expanded="false">
                            <img src="<?= base_url('asset/img/cross-icon.png'); ?>">
                            Tambah User Baru
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th>Last Login</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $key => $value) : ?>
                                        <tr>
                                            <td><?= $value['username']; ?></td>
                                            <?php if ($value['hak_akses'] == "0") {
                                                $hak_akses = '<span  style="color:white;"class="badge badge-rounded badge-success"> Penerima Beasiswa </span>';
                                            } else if ($value['hak_akses'] == "1") {
                                                $hak_akses = '<span class="badge badge-rounded badge-primary"> Admin </span>';
                                            }
                                            ?>
                                            <td><?= $hak_akses; ?></td>
                                            <?php
                                            $last_login = date_create_from_format('Y-m-d', $value['last_login']);
                                            ?>
                                            <td><?= $last_login->format('d M Y'); ?></td>
                                            <?php if ($value['status_user'] == "1") {
                                                $status_user = '<span  style="color:white;"class="badge badge-rounded badge-success"> Aktif</span>';
                                            } else if ($value['status_user'] == "0") {
                                                $status_user = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            }
                                            ?>
                                            <td><?= $status_user; ?></td>
                                            <td>
                                                <a href="<?= base_url('/admin/manajemen/edit/' . $value['id_user']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <button onclick="deleteConfirmation_user(<?= $value['id_user']; ?>)" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
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