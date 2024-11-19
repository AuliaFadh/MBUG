<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
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
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/penerima.png') ?>"
                                alt="">
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
                        <?= session()->getFlashdata('berhasil') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal') ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('hapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('hapus') ?>
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
                                            <input type="number" id="low-TP" placeholder="1"
                                                class="col-md-2 col-2 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number" id="high-TP" placeholder="1"
                                                class="col-md-2 col-2 mb-3 p-1">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-12 col-12">
                                    <h7 class="d-flex justify-content-center align-items-center">Status</h7>
                                    <div class="row p-2  d-flex justify-content-center align-items-center">
                                        <input checked onclick="handleFilterPB()" type="checkbox" name="checkbox1"
                                            id="checkbox1" class=" custom-checkbox chk-input-success">
                                        <label for="checkbox1"
                                            class=" col-lg-3 col-nm-3 col-sm-3    custom-checkbox-label m-1">Lulus</label>
                                        <input checked onclick="handleFilterPB()" type="checkbox" name="checkbox2"
                                            id="checkbox2" class=" custom-checkbox chk-input-proccess">
                                        <label for="checkbox2"
                                            class=" col-lg-3 col-nm-3 col-sm-3   custom-checkbox-label m-1">Aktif</label>
                                        <input checked onclick="handleFilterPB()" type="checkbox" name="checkbox3"
                                            id="checkbox3" class=" custom-checkbox chk-input-canceled">
                                        <label for="checkbox3"
                                            class=" col-lg-3 col-nm-3 col-sm-3  custom-checkbox-label m-1">Tidak Aktif</label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">

                                    <h7 class="d-flex justify-content-center align-items-center">Gender</h7>
                                    <div class="row p-2  d-flex justify-content-center align-items-center">
                                        <input checked onclick="handleFilterPB()" type="checkbox"
                                            name="checkbox4" id="checkbox4" class=" custom-checkbox chk-input-success">
                                        <label for="checkbox4"
                                            class=" col-lg-3 col-nm-3 col-sm-3    custom-checkbox-label m-1">Laki-Laki</label>
                                        <input checked onclick="handleFilterPB()" type="checkbox"
                                            name="checkbox4" id="checkbox5" class=" custom-checkbox chk-input-proccess">
                                        <label for="checkbox5"
                                            class=" col-lg-3 col-nm-3 col-sm-3   custom-checkbox-label m-1">Perempuan</label>
                                        
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
                                        <td class="th-sm"><strong><?= $no ?></strong></td>
                                        <td class="th-nm"><?= $value['nama'] ?></td>
                                        <td class="th-sm"><?= $value['npm'] ?></td>
                                        <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                        <td class="th-lg"><?= $value['alamat'] ?></td>
                                        <td class="th-nm"><?= $value['no_hp'] ?></td>
                                        <?php if ($value['jenis_kelamin'] == '1') {
                                            $JK = '<span class="">Laki-laki</span>';
                                        } elseif ($value['jenis_kelamin'] == '0') {
                                            $JK = '<span class="">Perempuan</span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $JK ?></td>
                                        <td class="th-sm"><?= $value['tahun_diterima'] ?></td>
                                        <?php if ($value['status_penerima'] == '1') {
                                            $status = '<span class="status-peserta badge badge-rounded badge-primary">Aktif</span>';
                                        } elseif ($value['status_penerima'] == '0') {
                                            $status = '<span class="status-peserta badge badge-rounded badge-danger">Tidak Aktif</span>';
                                        } elseif ($value['status_penerima'] == '2') {
                                            $status = '<span class="status-peserta badge badge-rounded badge-success">Lulus<span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $status ?></td>
                                        <td class="th-nm"><?= $value['keterangan'] ?></td>
                                        <td class="th-nm">
                                            <a href="<?= base_url('/admin/penerima/edit/' . $value['id_penerima']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <!-- ul ini yng elemen button dari adib, jadi dia confirm boxnya udah keren jadi  -->
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteConfirmation_penerima(<?= $value['id_penerima'] ?>)"><i
                                                    class="la la-trash-o"></i></button>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('low-TP').addEventListener('input', handleFilterPB);
        document.getElementById('high-TP').addEventListener('input', handleFilterPB);        
    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>
<?= $this->endSection('content') ?>
