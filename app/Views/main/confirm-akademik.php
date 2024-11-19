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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Konfirmasi Laporan Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Konfirmasi Laporan Akademik</h3>
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
                                                    handleFilterCAkademik()"><?= $TAValue['nama_tahun'] ?></a>
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
                                                    onclick="fillFindInput('find-ta-akhir','<?= $TAValue['nama_tahun'] ?>');handleFilterCAkademik()"><?= $TAValue['nama_tahun'] ?></a>
                                                <?php endforeach; ?>
                                                <span id="no-data-find-ta-akhir" style="display: none;">Data tidak
                                                    ada</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>



                        <form action="confirm/all" method="post">
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
                                            <th class="th-nm">Keterangan Masukan</th>
                                            <th class="th-sm">Konfirmasi</th>
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
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="th-nm">
                                                <textarea name="konfirmasi_keterangan[<?= $value['id_akademik'] ?>]" rows="2"><?= $value['konf_ket_akademik'] ?></textarea>

                                            </td>
                                            <td class="th-sm">

                                                <div class="radio-buttons-confirm">
                                                    <input type="radio" id="accepted-<?= $value['id_akademik'] ?>"
                                                        name="status_data[<?= $value['id_akademik'] ?>]"
                                                        value="1" class="radio-input-confirm">
                                                    <label for="accepted-<?= $value['id_akademik'] ?>"
                                                        class="radio-label-confirm accepted-label-confirm">
                                                        <span class="icon-confirm">&#10003;</span>
                                                        <!-- Ceklis --></label>

                                                    <input type="radio" id="rejected-<?= $value['id_akademik'] ?>"
                                                        name="status_data[<?= $value['id_akademik'] ?>]"
                                                        value="0" class="radio-input-confirm">
                                                    <label for="rejected-<?= $value['id_akademik'] ?>"
                                                        class="radio-label-confirm rejected-label-confirm">
                                                        <span class="icon-confirm">&#10007;</span>
                                                        <!-- Silang --></label>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <a href="/admin/akademik"
                                class="btn btn-primary-download-excel margin-custom float-right col-lg-2 col-md-4 col-sm-8">Batal</a>
                            <button type="submit"
                                class=" btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8 m-2 float-right"
                                id="toggle-filter">
                                Konfirmasi </button>

                        </form>
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


        document.getElementById('low-ipk-lokal').addEventListener('input', handleFilterCAkademik);
        document.getElementById('high-ipk-lokal').addEventListener('input', handleFilterCAkademik);
        document.getElementById('low-ipk-uu').addEventListener('input', handleFilterCAkademik);
        document.getElementById('high-ipk-uu').addEventListener('input', handleFilterCAkademik);
        document.getElementById('low-semester').addEventListener('input', handleFilterCAkademik);
        document.getElementById('high-semester').addEventListener('input', handleFilterCAkademik);
        document.getElementById('low-ipk').addEventListener('input', handleFilterCAkademik);
        document.getElementById('high-ipk').addEventListener('input', handleFilterCAkademik);


    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>


<?= $this->endSection('content') ?>
