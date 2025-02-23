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
                    <div name="advance-filter" class="d-flex mb-4 flex-column align-items-end">
                            <!-- Tombol berada di kanan -->
                            <p class="d-inline-flex p-0 m-0">
                                <button class="no-color m-0" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Advance Filter
                                    <img width="20px" src="<?= base_url('asset/img/gear.png') ?>" alt="">
                                </button>
                            </p>
                            <div name="box-filter" class="collapse shadow container pt-2 border rounded  m-0 "
                                id="collapseExample">
                                <h6>Advanced Filter</h6>
                                

                                <div class="row pb-0 d-flex justify-content-center align-items-center">

                                    <div class="col-md-6 col-12 mb-3  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Tahun Penerimaan
                                        </h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" id="low-TP" placeholder=""
                                                class="col-md-2 col-2 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number" id="high-TP" placeholder=""
                                                class="col-md-2 col-2 mb-3 p-1">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-12 col-12">
                                    <h7 class="d-flex justify-content-center align-items-center">Status</h7>
                                    <div class="row p-2  d-flex justify-content-center align-items-center">
                                        <input checked onclick="handleFilterJB()" type="checkbox" name="checkbox1"
                                            id="checkbox1" class=" custom-checkbox chk-input-success">
                                        <label for="checkbox1"
                                            class=" col-lg-3 col-nm-3 col-sm-3 custom-checkbox-label m-1">Aktif</label>
                                        <input checked onclick="handleFilterJB()" type="checkbox" name="checkbox2"
                                            id="checkbox2" class=" custom-checkbox chk-input-proccess">
                                        <label for="checkbox2"
                                            class=" col-lg-3 col-nm-3 col-sm-3   custom-checkbox-label m-1">Tidak Aktif</label>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    
                        

                        <div class="table-responsive">
                        <p id="rowCount">Jumlah baris yang ditampilkan: 0</p>
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
                                                $status = '<span  style="color:white;"class="status_jb badge badge-rounded badge-success">Aktif</span>';
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('low-TP').addEventListener('input', handleFilterJB);
        document.getElementById('high-TP').addEventListener('input', handleFilterJB);        
    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>
<?= $this->endSection('content') ?>