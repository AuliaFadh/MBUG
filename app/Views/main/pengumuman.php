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
                <li class="breadcrumb-item active"><a href="/admin/pengumuman">Pengumuman</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/pengumuman.png'); ?>" alt="">
                            <h3>Pengumuman</h3>
                        </div>
                        <div>
                            <a href="/admin/pengumuman/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                    <th class="th-sm">Id</th>    
                                    <th class="th-sm">Tanggal Terbit</th>
                                        <th class="th-sm">Batas Terbit</th>
                                        
                                        <th class="th-lg">Judul Berita</th>
                                        <th class="th-nm">penulis</th>
                                        <th class="th-sm">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="th-sm">1</td>    
                                    <td class="th-sm">20 juli 2023</td>
                                        <td class="th-sm">30 juli 2023</td>
                                        
                                        <td class="th-lg">Pengumuman Seleksi Beasiswa Google.co</td>
                                        <td class="th-nm">Admin 1</td>
                                        <td class="th-sm">
                                            <a href="/admin/pengumuman/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="deleteConfirmation_news(0)"><i class="la la-trash-o"></i></button>
                                        </td>
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