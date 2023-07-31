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
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/penerima.png'); ?>" alt="">
                            <h3>Daftar Penerima Beasiswa</h3>
                        </div>
                        <div>
                            <a href="/admin/penerima/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
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
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-nm"><?= $value['nama']; ?></td>
                                            <td class="th-sm"><?= $value['npm']; ?></td>
                                            <td class="th-nm"><?= $value['prodi']; ?></td>
                                            <td class="th-lg"><?= $value['alamat']; ?></td>
                                            <td class="th-nm"><?= $value['no_hp']; ?></td>
                                            <td class="th-sm"><?= $value['jenis_kelamin'] == "1" ? "Laki-laki" : "Perempuan"; ?></td>
                                            <td class="th-sm"><?= $value['tahun_diterima']; ?></td>
                                            <?php if ($value['status_penerima'] == "1") {
                                                $status = '<span class="badge badge-rounded badge-primary"> Aktif</span>';
                                            } else if ($value['status_penerima'] == "0") {
                                                $status = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            } else if ($value['status_penerima'] == "2") {
                                                $status = '<span class="badge badge-rounded badge-success"> Lulus <span>';
                                            };
                                            ?>
                                            <td class="th-sm"><?= $status; ?></td>
                                            <td class="th-nm"><?= $value['keterangan']; ?></td>
                                            <td class="th-nm">
                                                <a href="<?= base_url('/admin/penerima/edit/' . $value['id_penerima']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <!-- ul ini yng elemen button dari adib, jadi dia confirm boxnya udah keren jadi  -->
                                                <button class="btn btn-sm btn-danger" onclick="deleteConfirmation_penerima(0)"><i class="la la-trash-o"></i></button>
                                                
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