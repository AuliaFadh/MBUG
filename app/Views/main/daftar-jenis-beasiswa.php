<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/beasiswa">Jenis Beasiswa</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa.png'); ?>" alt="">
                            <h3>Daftar Jenis Beasiswa</h3>
                        </div>
                        <div>
                            <a href="/admin/beasiswa/add" class="btn btn-primary-add-data">Tambah Data</a>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel">Download CSV</button>
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
                        <div class="col">
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
                                        onclick="filterTableStatus('status_jb','Aktif')">Aktif</button>
                                        
                                        <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableStatus('status_jb','Tidak Aktif')">Tidak Aktif</button>
                                                                        
                                </div>

                            </div>
                           




                        </div>

                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-sm">ID</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-nm">Asal Beasiswa</th>
                                        <th class="th-sm">Tahun Penerimaan</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data  -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($jb as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no; ?></strong></td>
                                            <td class="th-sm"><?= $value['id_beasiswa']; ?></td>
                                            <td class="th-nm"><?= $value['jenis']; ?></td>
                                            <td class="th-nm"><?= $value['asal']; ?></td>
                                            <td class="th-sm"><?= $value['tahun_penerimaan']; ?></td>
                                            <?php if ($value['status_beasiswa'] == "1") {
                                                $status = '<span  style="color:white;"class="status_jb badge badge-rounded badge-success"> Aktif</span>';
                                            } else if ($value['status_beasiswa'] == "0") {
                                                $status = '<span class=" status_jb badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            }
                                            ?>
                                            <td class="th-sm"><?= $status; ?></td>
                                            <td class="th-sm">
                                                <a href="<?= base_url('/admin/beasiswa/edit/' . $value['id_beasiswa']); ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <!-- ul ini yng elemen button dari adib, jadi dia confirm boxnya udah keren jadi  -->
                                                <button class="btn btn-sm btn-danger" onclick="deleteConfirmation_beasiswa(<?= $value['id_beasiswa']; ?>)"><i class="la la-trash-o"></i></button>
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
        FillterScoreSingle('low-tp','high-tp','4');
    });
    const highTP = document.getElementById('high-tp');
    highTP.addEventListener('input', function() {
        FillterScoreSingle('low-tp','high-tp','4');
    });

});
</script>
<?= $this->endSection('content') ?>