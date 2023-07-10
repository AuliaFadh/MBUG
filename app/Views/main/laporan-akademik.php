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
                        <li class="breadcrumb-item active"><a href="/akademik">Laporan Akademik</a></li>


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
                                    <a href="tambah-data-akademik.html" class="btn btn-primary-add-data">Tambah Data</a>
                                    <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NPM</th>
                                                <th>Prodi</th>
                                                <th>Semester</th>
                                                <th>Alamat</th>
                                                <th>No.HP</th>
                                                <th>Email</th>
                                                <th>Jenis Beasiswa</th>
                                                <th>Tahun Penerimaan</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Isa Tarmana Mustopa</td>
                                                <td>10120544</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>Jl. Poltangan Raya Pasar Minggu Jakarta Selatan</td>
                                                <td>081220952593</td>
                                                <td>isatarmanamustopa54@gmail.com</td>
                                                <td>KIPK</td>
                                                <td>2020</td>
                                                <td>Aktif</td>
                                                <td>bismillah Acc PI tanggal 15 Juli 2023</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Annisa Umulfath</td>
                                                <td>10120324</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>di Karawang kalo gaksalah</td>
                                                <td>08122234293</td>
                                                <td>annisauf@gmail.com</td>
                                                <td>KEMENDIKBUD</td>
                                                <td>2020</td>
                                                <td>Aktif</td>
                                                <td>bismillah Acc PI tanggal 15 Juli 2023</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Aul</td>
                                                <td>10132324</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>yo nda tau</td>
                                                <td>08122224293</td>
                                                <td>aul_komandan_perang@gmail.com</td>
                                                <td>KEMENDIKBUD</td>
                                                <td>2020</td>
                                                <td>Aktif</td>
                                                <td>bismillah Acc PI tanggal 15 Juli 2023</td>
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