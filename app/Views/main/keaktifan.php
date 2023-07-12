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
                <li class="breadcrumb-item active"><a href="/keaktifan">Keaktifan per Semester</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Keaktifan per Semester</h3>
                        </div>
                        <div>
                            <a href="/keaktifan/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-sm">Tahun Ajaran</th>
                                        <th class="th-sm">Upload KRS</th>
                                        <th class="th-nm">Blanko Pembayaran: Jumlah ditagihkan</th>
                                        <th class="th-nm">Jumlah Potongan</th>
                                        <th class="th-sm">Upload Blanko Pembayaran</th>
                                        <th class="th-sm">Upload Bukti Pembayaran</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($ka as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['semester']; ?></td>
                                            <td><?= $value['tahun_ajaran']; ?></td>
                                            <td><?= $value['krs']; ?></td>
                                            <td><?= $value['jumlah_ditagihkan']; ?></td>
                                            <td><?= $value['jumlah_potongan']; ?></td>
                                            <td><?= $value['blanko_pembayaran']; ?></td>
                                            <td><?= $value['bukti_pembayaran']; ?></td>
                                            <td><?= $value['status'] == "1" ? "Aktif" : "Tidak Aktif"; ?></td>
                                            <td> <a href="/keaktifan/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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