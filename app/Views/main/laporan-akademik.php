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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Laporan Akademik</h3>
                        </div>
                        <div>
                            <a href="/admin/akademik/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download Excel</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-sm">NPM</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-sm">Tahun Ajaran</th>
                                        <th class="th-sm">IPK</th>
                                        <th class="th-sm">IPK Lokal</th>
                                        <th class="th-sm">IPK UU</th>
                                        <th class="th-sm">Rangkuman Nilai</th>
                                        <th class="th-sm">Aksi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($la as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['npm']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['jenis']; ?></td>
                                            <td><?= $value['semester']; ?></td>
                                            <td><?= $value['tahun_ajaran']; ?></td>
                                            <td><?= $value['ipk']; ?></td>
                                            <td><?= $value['ipk_lokal']; ?></td>
                                            <td><?= $value['ipk_uu']; ?></td>
                                            <td><?= $value['rangkuman_nilai']; ?></td>
                                            <td> <a href="/admin/akademik/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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