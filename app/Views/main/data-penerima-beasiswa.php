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
                    <a href="/admin/penerima">Daftar Penerima Beasiswa</a>
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
                            <h3>Daftar Penerima Beasiswa</h3>
                        </div>
                        <div>
                            <a href="/admin/penerima/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download Excel</button>
                            <a href="/admin/penerima/import" class="btn btn-primary-import btn-success">Import Data</a>
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
                                        <th class="th-lg">Alamat</th>
                                        <th class="th-nm">No.HP</th>
                                        <th class="th-sm">Jenis Kelamin</th>
                                        <th class="th-sm">Tahun Penerimaan</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-nm">Keterangan</th>
                                        <th class="th-sm">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($pb as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><strong><?= $no; ?></strong></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['npm']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['alamat']; ?></td>
                                            <td><?= $value['no_hp']; ?></td>
                                            <td><?= $value['jenis_kelamin'] == "1" ? "Laki-laki" : "Perempuan"; ?></td>
                                            <td><?= $value['tahun_diterima']; ?></td>
                                            <?php if($value['status_penerima'] == "1"){
                                                $status = "Aktif";
                                            } else if($value['status_penerima'] == "0"){
                                                $status = "Tidak Aktif";
                                            } else if($value['status_penerima'] == "2"){
                                                $status = "Lulus";
                                            };

                                            ?>
                                            <td><?= $status; ?></td>
                                            <td><?= $value['keterangan']; ?></td>
                                            <td>
                                                <a href="<?= base_url('/admin/penerima/edit/' . $value['id_penerima']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="<?= base_url('/admin/penerima/delete/' . $value['id_penerima']); ?>" onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger" method="post"><i class="la la-trash"></i></a>
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