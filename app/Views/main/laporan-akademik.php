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
                            <button onclick="exportToCSV()"  class="btn btn-primary-download-excel">Download Excel</button>
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
                                    <tr>
                                        <td class="th-sm">1000000</td>
                                        <td class="th-nm">Isa Tarmana Mustopa</td>
                                        <td class="th-sm">10120544</td>
                                        <td class="th-nm">Sistem Informasi</td>
                                        <td class="th-nm">Jenis Beasiswa</td>
                                        <td class="th-sm">ATA 2022/2023</td>
                                        <td class="th-sm">Tahun Ajaran</td>
                                        <td class="th-sm">3.95</td>
                                        <td class="th-sm">3.90</td>
                                        <td class="th-sm">3.92</td>
                                        <td class="th-sm"> <a title="Lihat File" href="pdf/pdf1.pdf"><img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt=""></a></td>

                                        <td> <a href="akademik/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
                                    </tr>

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