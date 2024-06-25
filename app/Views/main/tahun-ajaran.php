<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active"><a href="/admin/tahun-ajaran">Pengaturan Admin</a></li>
                <li class="breadcrumb-item active"><a href="/admin/tahun-ajaran">Tahun Ajaran</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <!-- <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/akademik.png') ?>"
                                alt=""> -->
                            <h3>Tahun Ajaran</h3>
                        </div>
                        <div class="row container col-md-6">
                            <!-- <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0">
                                <a href="/admin/akademik/add" class="btn btn-primary-add-data float-right">Tambah
                                    Data</a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12     m-0 p-0 pr-2">
                                <a href="/admin/akademik/confirm"
                                    class="btn btn-primary-confirm position-relative float-right"> Konfirmasi
                                    
                                    
                                       
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12    m-0 p-0">
                                <button onclick="exportToCSV()"
                                    class="btn btn-primary-download-excel  float-right">Download CSV</button>
                            </div> -->
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

                        <div class="container">
                            
                        </div>
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
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk"
                                                class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk"
                                                class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK Lokal</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk-lokal"
                                                class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk-lokal"
                                                class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <h7 class="d-flex justify-content-center align-items-center ">IPK UU</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk-uu"
                                                class="col-md-3 col-4 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk-uu"
                                                class="col-md-3 col-4 mb-3 p-1">
                                        </div>
                                    </div>

                                </div>

                                <div class="row pb-0 d-flex justify-content-center align-items-center">

                                    <div class="col-md-6 col-12 mb-3  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Semester</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" id="low-semester" min=0 max=20 value="0"
                                                class="col-md-2 col-2 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number" id="high-semester" min=0 max=20 value="20"
                                                class="col-md-2 col-2 mb-3 p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Tahun Ajaran</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center  p-2">
                                            <select name="low-ajaran" id="low-ajaran"
                                                class="form-control   custom-textfield col-lg-4 col-md-4 col-sm-6">
                                                <option></option>
                                                <option value="PTA 2020/2021">PTA 2020/2021</option>
                                                <option value="ATA 2021/2022">ATA 2021/2022</option>
                                                <option value="PTA 2022/2023">ATA 2021/2022</option>
                                                <option value="ATA 2023/2024">ATA 2021/2022</option>
                                            </select>
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center">
                                                ~
                                            </h6>
                                            <select name="high-ajaran" id="high-ajaran"
                                                class="form-control  custom-textfield col-lg-4 col-md-4 col-sm-6 ">
                                                <option></option>
                                                <option value="PTA 2020/2021">PTA 2020/2021</option>
                                                <option value="ATA 2021/2022">ATA 2021/2022</option>
                                                <option value="PTA 2022/2023">ATA 2021/2022</option>
                                                <option value="ATA 2023/2024">ATA 2021/2022</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="row  pb-2 d-flex justify-content-center align-items-center">

                                    <div class="btn-group col-md-12" role="group"
                                        aria-label="Basic outlined example  ">
                                        <button type="button"
                                            class="custom-btn-status btn btn-outline-primary col-md-4"
                                            onclick="filterTableAkademik('Disetujui')">Disetuji</button>
                                        <button type="button"
                                            class="custom-btn-status btn btn-outline-primary col-md-4"
                                            onclick="filterTableAkademik('Diproses')">Diproses</button>
                                        <button type="button"
                                            class="custom-btn-status btn btn-outline-primary col-md-4"
                                            onclick="filterTableAkademik('Ditolak')">Ditolak</button>
                                    </div>

                                </div>

                            </div>

                            <div class="table-responsive">
                            <p id="rowCount">Jumlah baris yang ditampilkan: 0</p>
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">No</th>
                                            <th class="th-sm">Tahun Ajaran</th>
                                            <th class="th-sm">Tahun Mulai</th>
                                            <th class="th-sm">Tahun Berakhir</th>
                                            <th class="th-sm">Status</th>
                                            <th class="th-sm">Aksi</th>
                                            


                                        </tr>
                                    </thead>
                                    <!-- Loop data laporan akademik -->
                                    <tbody>
                                        <tr>
                                            <td class="th-sm"><strong>1</strong></td>
                                            <td class="th-sm">ATA</td>
                                            <td class="th-sm">2022</td>
                                            <td class="th-sm">2023</td>
                                            <td class="th-sm"><span class="status_akademik badge badge-rounded badge-success">Aktif</span>
                                            <!-- <span class="status_akademik badge badge-rounded badge-danger">Tidak Aktif</span> -->
                                            </td>
                                            <td class="th-sm">
                                                <a href="<?= base_url('/admin/akademik/edit/') ?>"
                                                    class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
<script>
   
</script>

<?= $this->endSection('content') ?>
