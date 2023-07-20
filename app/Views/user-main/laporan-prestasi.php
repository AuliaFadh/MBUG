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
                <li class="breadcrumb-item active"><a href="/user/prestasi">Laporan Prestasi</a></li>


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
                            <a href="/user/prestasi/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()"  class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                    <th class="th-sm">No.</th>
                                        <th class="th-nm">Tanggal</th>
                                        
                                        <th class="th-lg">Nama Kegiatan</th>
                                        <th class="th-nm">Tingkat</th>
                                        <th class="th-sm">Jenis Prestasi</th>
                                        
                                        <th class="th-sm">Capaian</th>
                                        <th class="th-nm">Tempat</th>
                                        
                                        <th class="th-nm">Penyelenggara</th>
                                        <th class="th-sm">Bukti Prestasi</th>
                                        <th class="th-nm">Tautan Publikasi</th>
                                        <th class="th-sm">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <td class="th-sm">1</td>
                                <td class="th-nm">Tanggal</td>
                                    <td class="th-lg">Kejuaraan Kebut Kelarin Pi</td>
                                    <td class="th-nm">Tingkat</td>
                                    <td class="th-sm">Jenis Prestasi</td>
                                    
                                    <td class="th-sm">Capaian</td>
                                    <td class="th-nm">Tempat</td>
                                    
                                    <td class="th-nm">Penyelenggara</td>
                                    <td class="th-sm"> 
                                        <a title="Lihat File" href="<?= base_url('asset/doc/buku-panduan.pdf'); ?>">
                                            <img id="doc-search" class="btn btn-sm btn-success" src="<?= base_url('asset/img/doc-search.png'); ?>" alt="">
                                        </a>
                                    </td>
                                    <td class="th-nm">Tautan Publikasi</td>
                                    <td> <a href="prestasi/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a></td>

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