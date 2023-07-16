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
                            <button onclick="exportToCSV()"  class="btn btn-primary-download-excel">Download Excel</button>
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
                                    <tr>
                                        <td class="th-sm"><strong>1</strong></td>
                                        <td class="th-nm">Aulia</td>
                                        <td class="th-sm">10120534</td>
                                        <td class="th-nm">Sistem Informasi</td>
                                        <td class="th-lg">Pondok cina</td>
                                        <td class="th-nm">081220952593</td>
                                        <td class="th-sm">Laki-Laki</td>
                                        <td class="th-sm">2022</td>
                                        <td class="th-sm">Aktif</td>
                                        <td class="th-nm">-</td>
                                        <td> <a href="/admin/penerima/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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