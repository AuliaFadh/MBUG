<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/user/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/user/keaktifan">Keaktifan per Semester</a></li>


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
                            <a href="/user/keaktifan/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                    <th class="th-sm">No</th>
                                        
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
                                <td class="th-sm"><strong>1</strong></td>
                                            
                                            <td class="th-lg">KIPK</td>
                                            <td class="th-sm">6</td>
                                            <td class="th-nm">2018/2019</td>
                                            <td class="th-sm">
                                            <a title="Lihat File" href="<?= base_url('asset/doc/database/krs/krs-default.pdf'); ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                            </a>                                   
                                            </td>
                                            <td class="th-sm">2112</td>
                                            <td class="th-sm">2121</td>
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
                                           
                                            <td class="th-sm"></td>
                                            <td class="th-sm"> <a href="/admin/keaktifan/edit/$1" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>
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