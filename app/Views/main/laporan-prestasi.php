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
                            <li class="breadcrumb-item active"><a href="/prestasi">Laporan Prestasi</a></li>
                            

                        </ol>
                    
                </div>
                <div class="row">
                    <!-- Ubah disini -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="container1">
                                    <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                                    <h3>Laporan Prestasi</h3>
                                </div>
                                <div>
                                    <a href="/tambah-prestasi" class="btn btn-primary-add-data">Tambah Data</a>
                                    <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td></td>
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