<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/dashboard">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/beasiswa">Jenis Beasiswa</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Daftar Jenis Beasiswa</h3>
                        </div>
                        <div>
                            <a href="/tambah-beasiswa" class="btn btn-primary-add-data">Tambah Data</a>
                            <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Jenis Beasiswa</th>
                                        <th>Asal Beasiswa</th>
                                        <th>Tahun Penerimaan</th>
                                        <th>Aktif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($jb as $jenis) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $jenis['id_beasiswa']; ?></td>
                                            <td><?= $jenis['nama_beasiswa']; ?></td>
                                            <td><?= $jenis['asal_beasiswa']; ?></td>
                                            <td><?= $jenis['tahun_penerimaan']; ?></td>
                                            <td><?= $jenis['status']; ?></td>
                                            <td> <a href="/beasiswa/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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