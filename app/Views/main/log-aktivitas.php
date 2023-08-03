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
                                        <th>Last Login</th>
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>4 Juli 2023</td>
                                        <td>A001</td>
                                        <td>User1</td>
                                        <td>Admin</td>


                                    </tr>



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