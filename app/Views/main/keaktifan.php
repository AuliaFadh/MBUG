<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Keaktifan per Semester</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/keaktifan.png') ?>"
                                alt="">
                            <h3>Keaktifan per Semester</h3>
                        </div>
                        <div class="row container col-md-6">
                            <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0">
                                <a href="/admin/keaktifan/add" class="btn btn-primary-add-data float-right">Tambah
                                    Data</a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0 pr-2">
                                <a href="/admin/keaktifan/confirm"
                                    class="btn btn-primary-confirm position-relative float-right"> Konfirmasi


                                    <?php $count_notif = 0; ?>
                                    <?php foreach ($DataDiproses as $key => $value) : ?>
                                    <?php $count_notif++; ?>
                                    <?php endforeach; ?>
                                    <?php if ($count_notif > 0): ?>
                                    <span style="color: white;"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $count_notif ?>
                                    </span>
                                    <?php endif; ?>
                                    <!-- TASK-BE Ul ini tambahin fitur jumlah notif -->
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12    m-0 p-0">
                                <button onclick="exportToCSV()"
                                    class="btn btn-primary-download-excel  float-right">Download CSV</button>
                            </div>
                        </div>

                    </div>

                    <!-- Notifikasi -->
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('berhasil') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal') ?>
                    </div>
                    <?php endif; ?>

                    <!-- Tabel -->
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
                                        <th class="th-nm">Jumlah ditagihkan</th>
                                        <th class="th-nm">Jumlah Potongan</th>
                                        <th class="th-sm">Blanko Pembayaran</th>
                                        <th class="th-sm">Bukti Pembayaran</th>
                                        <th class="th-sm">Status Mahasiswa</th>
                                        <th class="th-sm">Status Konfirmasi</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data keaktifan per semester -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($ka as $key => $value) : ?>
                                    <?php $no++; ?>
                                    <tr>
                                        <td class="th-sm"><strong><?= $no ?></strong></td>
                                        <td class="th-sm"><?= $value['npm'] ?></td>
                                        <td class="th-nm"><?= $value['nama'] ?></td>
                                        <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                        <td class="th-lg"><?= $value['jenis'] ?></td>
                                        <td class="th-sm"><?= $value['semester'] ?></td>
                                        <td class="th-nm"><?= $value['tahun_ajaran'] ?></td>
                                        <td class="th-sm">
                                            <a title="Lihat File"
                                                href="<?= base_url('asset/doc/database/krs/' . $value['krs']) ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>" alt="">
                                            </a>
                                        </td>
                                        <td class="th-sm"><?= $value['jumlah_ditagihkan'] ?></td>
                                        <td class="th-sm"><?= $value['jumlah_potongan'] ?></td>
                                        <td class="th-sm">
                                            <a title="Lihat File"
                                                href="<?= base_url('asset/doc/database/blanko_pembayaran/' . $value['blanko_pembayaran']) ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>" alt="">
                                            </a>
                                        </td>
                                        <td class="th-sm">
                                            <a title="Lihat File"
                                                href="<?= base_url('asset/doc/database/bukti_pembayaran/' . $value['bukti_pembayaran']) ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>" alt="">
                                            </a>
                                        </td>
                                        <?php if ($value['status_penerima'] == '1') {
                                            $status = '<span class="badge badge-rounded badge-primary"> Aktif</span>';
                                        } elseif ($value['status_penerima'] == '0') {
                                            $status = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                        } elseif ($value['status_penerima'] == '2') {
                                            $status = '<span class="badge badge-rounded badge-success">lulus</span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $status ?></td>
                                        <?php if ($value['konfirmasi_keaktifan'] == '1') {
                                            $confirm = '<span class="status_keaktifan badge badge-rounded badge-success">Disetujui</span>';
                                        } elseif ($value['konfirmasi_keaktifan'] == '0') {
                                            $confirm = '<span class="status_keaktifan badge badge-rounded badge-danger">Ditolak</span>';
                                        } elseif ($value['konfirmasi_keaktifan'] == '2') {
                                            $confirm = '<span class="status_keaktifan badge badge-rounded badge-warning">Diproses<span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $confirm ?></td>
                                        <td class="th-sm"> <a
                                                href="<?= base_url('/admin/keaktifan/edit/' . $value['id_keaktifan']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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
