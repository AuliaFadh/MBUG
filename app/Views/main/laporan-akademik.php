<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/akademik.png') ?>"
                                alt="">
                            <h3>Laporan Akademik</h3>
                        </div>
                        <div class="row container col-md-6">
                            <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0">
                                <a href="/admin/akademik/add" class="btn btn-primary-add-data float-right">Tambah
                                    Data</a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0 pr-2">
                                <a href="/admin/akademik/confirm"
                                    class="btn btn-primary-confirm position-relative float-right"> Konfirmasi


                                    <?php $count_notif = 0; ?>
                                    <?php foreach ($DataDiproses as $key => $value) : ?>
                                    <?php $count_notif++; ?>
                                    <?php endforeach; ?>
                                    <?php if ($count_notif > 0): ?>
                                    <span style="color: white;"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $count_notif ?>
                                    </span>
                                    <?php endif; ?>
                                    <!-- TASK-BE Ul ini tambahin fitur jumlah notif -->
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12    m-0 p-0">
                                <button onclick="exportToCSV()"
                                    class="btn btn-primary-download-excel  float-right">Download CSV</button>
                            </div>
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

                    <!-- Tabel -->
                    <div class="card-body ">

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
                                <div class="row p-0 d-flex justify-content-center align-items-center">
                                    <div class="col-md-3 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 id="low-ipk"
                                                placeholder="0.00" class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 id="high-ipk" placeholder="0.00"
                                                class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK Lokal</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 id="low-ipk-lokal"
                                                placeholder="0.00" class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 id="high-ipk-lokal"
                                                placeholder="0.00" class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK UU</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 id="low-ipk-uu"
                                                placeholder="0.00" class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 id="high-ipk-uu"
                                                placeholder="0.00" class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-0 d-flex justify-content-center align-items-center">

                                    <div class="col-md-6 col-12 mb-3  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Semester</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" id="low-semester" min=0 max=20 placeholder="1"
                                                class="col-md-2 col-2 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number" id="high-semester" min=0 max=20 placeholder="1"
                                                class="col-md-2 col-2 mb-3 p-1">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center">Tahun Ajaran</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center p-2">
                                            <input type="text" id="find-ta-awal" name="TA" value=""
                                                placeholder="PTA 1982/1983"
                                                class="form-control custom-textfield col-lg-4 col-md-4 col-sm-6"
                                                autofocus>
                                            <div id="box-find-ta-awal"
                                                class="dropdown-custom col-lg-5 col-md-45 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($TA as $key => $TAValue) : ?>
                                                <a id="data-find-ta-awal"
                                                    onclick="fillFindInput('find-ta-awal','<?= $TAValue['nama_tahun'] ?>');
                                                    handleFilterAkademik()"><?= $TAValue['nama_tahun'] ?></a>
                                                <?php endforeach; ?>
                                                <span id="no-data-find-ta-awal" style="display: none;">Data tidak
                                                    ada</span>
                                            </div>
                                            <h6 class="col-3 mb-3 d-flex justify-content-center align-items-center">~
                                            </h6>
                                            <input type="text" id="find-ta-akhir" name="TA" value=""
                                                placeholder="PTA 1982/1983"
                                                class="form-control custom-textfield col-lg-4 col-md-4 col-sm-6"
                                                autofocus>
                                            <div id="box-find-ta-akhir"
                                                class="dropdown-custom col-lg-5 col-md-45 col-sm-7"
                                                style="display: none;">
                                                <?php foreach ($TA as $key => $TAValue) : ?>
                                                <a id="data-find-ta-akhir"
                                                    onclick="fillFindInput('find-ta-akhir','<?= $TAValue['nama_tahun'] ?>');handleFilterAkademik()"><?= $TAValue['nama_tahun'] ?></a>
                                                <?php endforeach; ?>
                                                <span id="no-data-find-ta-akhir" style="display: none;">Data tidak
                                                    ada</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <h7 class="d-flex justify-content-center align-items-center">Status Konfirmasi</h7>
                                    <div class="row p-2  d-flex justify-content-center align-items-center">
                                        <input checked onclick="handleFilterAkademik()" type="checkbox"
                                            name="checkbox1" id="checkbox1"
                                            class=" custom-checkbox chk-input-success">
                                        <label for="checkbox1"
                                            class=" col-lg-3 col-nm-3 col-sm-3    custom-checkbox-label m-1">Disetujui</label>
                                        <input checked onclick="handleFilterAkademik()" type="checkbox"
                                            name="checkbox2" id="checkbox2"
                                            class=" custom-checkbox chk-input-proccess">
                                        <label for="checkbox2"
                                            class=" col-lg-3 col-nm-3 col-sm-3   custom-checkbox-label m-1">Diproses</label>
                                        <input checked onclick="handleFilterAkademik()" type="checkbox"
                                            name="checkbox3" id="checkbox3"
                                            class=" custom-checkbox chk-input-canceled">
                                        <label for="checkbox3"
                                            class=" col-lg-3 col-nm-3 col-sm-3  custom-checkbox-label m-1">Ditolak</label>
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
                                        <th class="th-sm">NPM</th>
                                        <th class="th-nm">Nama</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-sm">Semester</th>
                                        <th class="th-nm">Tahun Ajaran</th>
                                        <th class="th-sm">IPK</th>
                                        <th class="th-sm">IPK Lokal</th>
                                        <th class="th-sm">IPK UU</th>
                                        <th class="th-sm">Rangkuman Nilai</th>
                                        <th class="th-sm">Status Konfirmasi</th>
                                        <th class="th-sm">Aksi</th>


                                    </tr>
                                </thead>
                                <!-- Loop data laporan akademik -->
                                <tbody>
                                    <?php $no = 0; ?>

                                    <?php foreach ($la as $key => $value) : ?>

                                    <?php $no++; ?>
                                    <tr>
                                        <td class="th-sm"><strong><?= $no ?></strong></td>
                                        <td class="th-sm"><?= $value['npm'] ?></td>
                                        <td class="th-nm"><?= $value['nama'] ?></td>
                                        <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                        <td class="th-lg"><?= $value['jenis'] ?></td>
                                        <td class="th-sm"><?= $value['semester'] ?></td>
                                        <td class="th-nm"><?= $value['tahun_ajaran'] ?></td>
                                        <td class="th-sm"><?= $value['ipk'] ?></td>
                                        <td class="th-sm"><?= $value['ipk_lokal'] ?></td>
                                        <td class="th-sm"><?= $value['ipk_uu'] ?></td>
                                        <td class="th-sm">
                                            <a title="Lihat File"
                                                href="<?= base_url('asset/doc/database/rangkuman_nilai/' . $value['rangkuman_nilai']) ?>">
                                                <img id="doc-search" class="btn btn-sm btn-success"
                                                    src="<?= base_url('asset/img/doc-search.png') ?>" alt="">
                                            </a>
                                        </td>


                                        <?php if ($value['konfirmasi_akademik'] == '1') {
                                            $confirm = '<span class="status_akademik badge badge-rounded badge-success">Disetujui</span>';
                                        } elseif ($value['konfirmasi_akademik'] == '0') {
                                            $confirm = '<span class="status_akademik badge badge-rounded badge-danger">Ditolak</span>';
                                        } elseif ($value['konfirmasi_akademik'] == '2') {
                                            $confirm = '<span class="status_akademik badge badge-rounded badge-warning">Diproses<span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $confirm ?></td>

                                        <td class="th-sm">
                                            <a href="<?= base_url('/admin/akademik/edit/' . $value['id_akademik']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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

        const findtaAwal = document.getElementById('find-ta-awal');
        findtaAwal.addEventListener('input', function() {
            findResult('find-ta-awal');
        });
        findtaAwal.addEventListener('blur', function() {
            hideResult('find-ta-awal');
        });

        const findtaAkhir = document.getElementById('find-ta-akhir');
        findtaAkhir.addEventListener('input', function() {
            findResult('find-ta-akhir');
        });
        findtaAkhir.addEventListener('blur', function() {
            hideResult('find-ta-akhir');
        });


        document.getElementById('low-ipk-lokal').addEventListener('input', handleFilterAkademik);
        document.getElementById('high-ipk-lokal').addEventListener('input', handleFilterAkademik);
        document.getElementById('low-ipk-uu').addEventListener('input', handleFilterAkademik);
        document.getElementById('high-ipk-uu').addEventListener('input', handleFilterAkademik);
        document.getElementById('low-semester').addEventListener('input', handleFilterAkademik);
        document.getElementById('high-semester').addEventListener('input', handleFilterAkademik);
        document.getElementById('low-ipk').addEventListener('input', handleFilterAkademik);
        document.getElementById('high-ipk').addEventListener('input', handleFilterAkademik);


    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>
<?= $this->endSection('content') ?>
