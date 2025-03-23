<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('/user/home') ?>">
                        <img class="logo-abbr logo-home" src="<?= esc(base_url('asset/img/Home.png'), 'url') ?>" alt="">
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?= base_url('/user/akademik') ?>">Laporan Akademik</a>
                </li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= esc(base_url('asset/img/akademik.png'), 'url') ?>" alt="">
                            <h3>Laporan Akademik</h3>
                        </div>
                        <div>
                            <a href="<?= base_url('/user/akademik/add') ?>" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-nm">Tahun Ajaran</th>
                                        <th class="th-sm">IPK</th>
                                        <th class="th-sm">IPK Lokal</th>
                                        <th class="th-sm">IPK UU</th>
                                        <th class="th-sm">Rangkuman Nilai</th>
                                        <th class="th-sm">Status Konfirmasi</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($listDataLA as $key => $Data) : ?>          
                                    <?php $no++; ?>
                                    <tr <?php if ($Data['konfirmasi_akademik'] == '0') { echo 'style="background-color: #ffdfdf!important;"'; } ?>>
                                        <td class="th-sm"><strong><?= esc($no) ?></strong></td>
                                        <td class="th-lg"><?= esc($Data['jenis']) ?></td>
                                        <td class="th-sm"><?= esc($Data['semester']) ?></td>
                                        <td class="th-nm"><?= esc($Data['tahun_ajaran']) ?></td>
                                        <td class="th-sm"><?= esc($Data['ipk']) ?></td>
                                        <td class="th-sm"><?= esc($Data['ipk_lokal']) ?></td>
                                        <td class="th-sm"><?= esc($Data['ipk_uu']) ?></td>
                                        <td class="th-sm">
                                            <a title="<?= esc('Lihat File', 'attr') ?>"
                                                href="<?= esc(base_url('asset/doc/database/rangkuman_nilai/' . $Data['rangkuman_nilai']), 'url') ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= esc(base_url('asset/img/doc-search.png'), 'url') ?>" alt="">
                                            </a>
                                        </td>
                                        <?php 
                                            if ($Data['konfirmasi_akademik'] == '1') {
                                                $confirm = '<span class="status_akademik badge badge-rounded badge-success">Disetujui</span>';
                                            } elseif ($Data['konfirmasi_akademik'] == '0') {
                                                $confirm = '<span class="status_akademik badge badge-rounded badge-danger">Ditolak</span>';
                                            } elseif ($Data['konfirmasi_akademik'] == '2') {
                                                $confirm = '<span class="status_akademik badge badge-rounded badge-warning">Diproses</span>';
                                            }
                                        ?>
                                        <td class="th-sm"><?= $confirm ?></td>
                                        <td class="th-sm">
                                            <?php if ($Data['konfirmasi_akademik'] == 1): ?>
                                                <a href="#" class="btn btn-sm btn-secondary disabled" style="opacity: 0.5;">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                            <?php else: ?>                                            
                                                <a href="<?= esc(base_url('/user/akademik/edit/' . $Data['uuid_la']), 'url') ?>"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                            <?php endif; ?>
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

<?= $this->endSection('content') ?>
