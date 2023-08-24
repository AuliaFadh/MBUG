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
                <li class="breadcrumb-item active"><a href="/admin/log">Log Aktivitas</a></li>
            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/log.png'); ?>" alt="">
                            <h3>Log Aktivitas</h3>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Last Login</th>
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach (array_reverse($log) as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <?php
                                            $last_login = date_create_from_format('Y-m-d H:i:s', $value['log_last_login']);
                                            ?>
                                            <td><?= $last_login->format('d M Y, H:i:s'); ?> WIB</td>
                                            <td><?= $value['id_user']; ?></td>
                                            <td><?= $value['log_username']; ?></td>
                                            <?php if ($value['hak_akses'] == "0") {
                                                $hak_akses = '<span  style="color:white;"class="badge badge-rounded badge-success"> Penerima Beasiswa </span>';
                                            } else if ($value['hak_akses'] == "1") {
                                                $hak_akses = '<span class="badge badge-rounded badge-primary"> Admin </span>';
                                            }
                                            ?>
                                            <td><?= $hak_akses; ?></td>
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