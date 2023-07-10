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
                <li class="breadcrumb-item active"><a href="data-penerima-beasiswa.html">Daftar Penerima Beasiswa</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Daftar Penerima Beasiswa</h3>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Prodi</th>
                                        <th>Semester</th>
                                        <th>Alamat</th>
                                        <th>No.HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tahun Penerimaan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($pb as $p) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= $p['npm']; ?></td>
                                            <td><?= $p['prodi']; ?></td>
                                            <td><?= $p['semester']; ?></td>
                                            <td><?= $p['alamat']; ?></td>
                                            <td><?= $p['no_hp']; ?></td>
                                            <td><?= $p['jenis_kelamin']; ?></td>
                                            <td><?= $p['tahun_penerimaan']; ?></td>
                                            <td><?= $p['status']; ?></td>
                                            <td>-</td>
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