<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/penerima.png'); ?>" alt="">
                            <h3>Daftar Penerima Beasiswa</h3>
                        </div>
                        <div>
                            <a href="/admin/penerima/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
                            <a href="/admin/penerima/import" class="btn btn-primary-import btn-success">Import Data</a>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('berhasil'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('gagal'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('hapus')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('hapus'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="row p-0 m-0">
                            <div class="col"></div>
                            <button title="Advance Filter" type="button" class="  no-color m-2 float-right"
                                id="toggle-filter" onclick="toggleFilter()">
                                Advanced Filter
                                <img width="20px" src="<?= base_url('asset/img/gear.png') ?>" alt="">
                                <!-- Icon gear -->
                            </button>
                        </div>

                        <div id="advance-filter" style="display:none; transition: all 0.3s ease;"
                            class="container pt-2 border rounded  mt-0">
                            <h6>Advanced Filter</h6>
                            <div class="row pb-0 d-flex justify-content-center align-items-center">

                                <div class="col-md-3 col-12 mb-3">
                                    <h7 class="d-flex justify-content-center align-items-center ">Tahun Penerimaan</h7>
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                        <input type="number" min=0 value=0 id="low-tp"
                                            class="col-md-4 col-4 mb-3 p-1" placeholder="tahun awal">
                                        <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                        </h6>
                                        <input type="number"min=0 value=2030 id="high-tp" placeholder="tahun akhir"
                                            class="col-md-4 col-4 mb-3 p-1">
                                    </div>
                                </div>


                            </div>
                            <div class="row  pb-2 d-flex justify-content-center align-items-center">

                                <div class="btn-group col-md-12" role="group" aria-label="Basic outlined example  ">
                                <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status-peserta','Lulus')">Lulus</button>    
                                <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status-peserta','Aktif')">Aktif</button>
                                        
                                        <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status-peserta','Tidak Aktif')">Tidak Aktif</button>
                                                                        
                                </div>

                            </div>
                            <div class="row  pb-2 d-flex justify-content-center align-items-center">

                                <div class="btn-group col-md-12" role="group" aria-label="Basic outlined example  ">
                                <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status-jk','Laki-laki')">Laki-laki</button>    
                                <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status-jk','Perempuan')">Perempuan</button>
                                        
                                        
                                                                        
                                </div>

                            </div>





                        </div>

                        <div class="table-responsive">
                        <p id="rowCount">Jumlah baris yang ditampilkan: 0</p>
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
                                <!-- Loop Data -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($pb as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-nm"><?= $value['nama']; ?></td>
                                            <td class="th-sm"><?= $value['npm']; ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi']; ?></td>
                                            <td class="th-lg"><?= $value['alamat']; ?></td>
                                            <td class="th-nm"><?= $value['no_hp']; ?></td>
                                            <td class="th-sm"><?= $value['jenis_kelamin'] == "1" ? '<span class="status-jk">Laki-laki</span>' : '<span class="status-jk">Perempuan</span>'; ?></td>
                                            <td class="th-sm"><?= $value['tahun_diterima']; ?></td>
                                            <?php if ($value['status_penerima'] == "1") {
                                                $status = '<span class="status-peserta badge badge-rounded badge-primary">Aktif</span>';
                                            } else if ($value['status_penerima'] == "0") {
                                                $status = '<span class="status-peserta badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            } else if ($value['status_penerima'] == "2") {
                                                $status = '<span class="status-peserta badge badge-rounded badge-success">Lulus<span>';
                                            };
                                            ?>
                                            <td class="th-sm"><?= $status; ?></td>
                                            <td class="th-nm"><?= $value['keterangan']; ?></td>
                                            <td class="th-nm">
                                                <a href="<?= base_url('/admin/penerima/edit/' . $value['id_penerima']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <!-- ul ini yng elemen button dari adib, jadi dia confirm boxnya udah keren jadi  -->
                                                <button class="btn btn-sm btn-danger" onclick="deleteConfirmation_penerima(<?= $value['id_penerima']; ?>)"><i class="la la-trash-o"></i></button>

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
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lowTP = document.getElementById('low-tp');
    lowTP.addEventListener('input', function() {
        FillterScoreSingle('low-tp','high-tp','7');
    });
    const highTP = document.getElementById('high-tp');
    highTP.addEventListener('input', function() {
        FillterScoreSingle('low-tp','high-tp','7');
    });

});

</script>
<?= $this->endSection('content') ?>