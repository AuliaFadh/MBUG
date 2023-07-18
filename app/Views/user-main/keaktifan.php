<?= $this->extend('layout/user-web-MBUG'); ?>
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
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Keaktifan per Semester</a></li>


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
                                        <th class="th-nm">Nama</th>
                                        <th class="th-sm">NPM</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
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
                                    <td class="th-sm"></td>
                                    <td class="th-nm">Isa Tarmana</td>
                                    <td class="th-sm">10120544</td>
                                    <td class="th-nm">Sistem Informasi</td>
                                    <td class="th-nm">KIPIK</td>
                                    <td class="th-sm">ATA</td>
                                    <td class="th-nm"> 2023/2024</td>
                                    <td class="th-sm"> <a title="Lihat Dokumen" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>""><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a></td>
                                    <td class="th-nm">12,000,000</td>
                                    <td class="th-nm">1,500,000</td>
                                    <td class="th-sm"> <a title="Lihat Dokumen" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a></td>
                                    <td class="th-sm"> <a title="Lihat Dokumen" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a></td>
                                    <td class="th-sm">Aktif</td>
                                    <td> <a href="/admin/keaktifan/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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