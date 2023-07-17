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
                <li class="breadcrumb-item active"><a href="/admin/beasiswa">Jenis Beasiswa</a></li>
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
                            <a href="/admin/beasiswa/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download Excel</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-sm">ID </th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-nm">Asal Beasiswa</th>
                                        <th class="th-sm">Tahun Penerimaan</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Aksi</th>
                                        <th class="th-sm">Aul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($jb as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $value['id_beasiswa']; ?></td>
                                            <td><?= $value['jenis']; ?></td>
                                            <td><?= $value['asal']; ?></td>
                                            <td><?= $value['tahun_penerimaan']; ?></td>
                                            <td><?= $value['status_beasiswa'] == "1" ? "Aktif" : "Tidak Aktif"; ?></td>
                                            <td>
                                                <a href="<?= base_url('/admin/beasiswa/edit/' . $value['id_beasiswa']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="<?= base_url('/admin/beasiswa/delete/' . $value['id_beasiswa']); ?>" onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger" method="post"><i class="la la-trash"></i></a>
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