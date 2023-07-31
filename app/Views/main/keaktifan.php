<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Keaktifan per Semester</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/keaktifan.png'); ?>" alt="">
                            <h3>Keaktifan per Semester</h3>
                        </div>
                        <div>
                            <a href="/admin/keaktifan/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()"  class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-sm">NPM</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-nm">Tahun Ajaran</th>
                                        <th class="th-sm">KRS</th>
                                        <th class="th-nm">Blanko Pembayaran: Jumlah ditagihkan</th>
                                        <th class="th-nm">Jumlah Potongan</th>
                                        <th class="th-sm">Blanko Pembayaran</th>
                                        <th class="th-sm">Bukti Pembayaran</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0; ?>
                                    <?php foreach ($ka as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-sm"><?= $value['npm']; ?></td>
                                            <td class="th-nm"><?= $value['nama']; ?></td>                                        
                                            <td class="th-nm"><?= $value['prodi']; ?></td>
                                            <td class="th-lg"><?= $value['jenis']; ?></td>
                                            <td class="th-sm"><?= $value['semester']; ?></td>
                                            <td class="th-nm"><?= $value['tahun_ajaran']; ?></td>
                                            <td class="th-sm">
                                            <a title="Lihat File" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                            </a>                                   
                                            </td>
                                            <td class="th-sm"><?= $value['jumlah_ditagihkan']; ?></td>
                                            <td class="th-sm"><?= $value['jumlah_potongan']; ?></td>
                                            <td class="th-sm">
                                            <a title="Lihat File" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                            </a>                                   
                                            </td>
                                            <td class="th-sm">
                                            <a title="Lihat File" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                            </a>                                   
                                            </td>
                                            <?php if ($value['status_penerima'] == "1") {
                                                $status = '<span class="badge badge-rounded badge-primary"> Aktif</span>';
                                            } else if ($value['status_penerima'] == "0") {
                                                $status = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            } else if ($value['status_penerima'] == "2") {
                                                $status = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            };
                                            ?>
                                            <td class="th-sm"><?= $status; ?></td>
                                            <td class="th-sm"> <a href="/admin/keaktifan/edit/$1" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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