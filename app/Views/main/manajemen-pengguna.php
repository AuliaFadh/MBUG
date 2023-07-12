<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="/manajemen">Manajemen Pengguna</a>
                </li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Manajemen Pengguna</h3>
                        </div>

                    </div>
                    <div class="add-btn-behav-custom">
                        <a class="add-btn-custom" href="/manajemen/add" aria-expanded="false">
                            <img src="<?= base_url('asset/img/cross-icon.png'); ?>">
                            Tambah User Baru
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>Nama User</th>
                                        <th>Hak Akses</th>
                                        <th>Last Login</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($mnj as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><?= $value['id_user']; ?></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['hak_akses'] == "1" ? "Admin" : "User"; ?></td>
                                            <td><?= $value['last_login']; ?></td>
                                            <td><?= $value['status'] == "1" ? "Aktif" : "Tidak Aktif"; ?></td>
                                            <td>
                                                <a href="manajemen/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
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