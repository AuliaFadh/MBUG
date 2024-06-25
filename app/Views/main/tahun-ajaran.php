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

                        <div class="container border p-2">
                            <form>
                                <label for="">Form Tambah Tahun Ajaran</label>
                                <div class="row pr-4 pl-4">
                                    <select required name="TA" class="p-0 m-0  col-lg-2 col-md-2 col-sm-8"
                                        id="TA_get">
                                        <option></option>
                                        <option value="0">PTA</option>
                                        <option value="1">ATA</option>
                                    </select>
                                    <input required placeholder="Thn Awal" type="number"
                                        class="form-control custom-textfield col-lg-2 col-md-3 col-sm-8" id="TAawal_get"
                                        name="TAawal_get" value="">

                                    <input required placeholder="Thn Akhir"type="number"
                                        class="form-control custom-textfield col-lg-2 col-md-3 col-sm-8"
                                        id="TAakhir_get" name="TAakhir_get" value="">

                                    <select name="TAstatus" class="p-0 m-0  col-lg-2 col-md-3 col-sm-8" id="TA_get">
                                        <option></option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    <button type="submit"
                                        class="btn btn-primary-add-data m-0  ml-2 mr-2  col-lg-2 col-md-2 col-sm-8">Submit</button>
                                </div>
                            </form>
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
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
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
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
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
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
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
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
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
                                    <button type="button" class="custom-btn-status btn btn-outline-primary col-md-4"
                                        onclick="filterTableAkademik('Disetujui')">Disetuji</button>
                                    <button type="button" class="custom-btn-status btn btn-outline-primary col-md-4"
                                        onclick="filterTableAkademik('Diproses')">Diproses</button>
                                    <button type="button" class="custom-btn-status btn btn-outline-primary col-md-4"
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
                                    <?php $no = 0; ?>

                                    <?php for ($id = 1; $id <= 5; $id++): ?>
                                    <?php $no++; ?>
                                    <tr>
                                        <td class="th-sm"><strong><?= $no ?></strong></td>

                                        <td id="TA_<?= $no ?>" data-value=1 class="th-sm">ATA</td>
                                        <!-- <td id="TA_<?= $no ?>" data-value=0 class="th-sm">PTA</td> -->

                                        <td id="TAawal_<?= $no ?>" data-value='2022' class="th-sm">2022</td>
                                        <td id="TAakhir_<?= $no ?>" data-value='2023' class="th-sm">2023</td>
                                        <td class="th-sm">
                                            <span id="TA_status_<?= $no ?>" data-value=1
                                                class="status_akademik badge badge-rounded badge-success">Aktif</span>
                                            <!-- <span id="TA_status<?= $no ?>" class="status_akademik badge badge-rounded badge-danger">Tidak Aktif</span> -->
                                        </td>
                                        <td class="th-sm">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                onclick="openEditModal('<?= $id ?>','<?= $no ?>')">
                                                <i class="la la-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <form id="formModalEditTA" method="post" action="/admin/tahun-ajaran/cedit/">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Tahun Ajaran</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <div class="row">
                                            <input type="radio" id="ptaRadio" class="margin-custom"
                                                name="TA_cedit" value="0"> PTA<br>
                                            <input type="radio" id="ataRadio" class="margin-custom"
                                                name="TA_cedit" value="1"> ATA<br>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Tahun Awal</label>
                                        <input required type="number" name="TA_awal_cedit" class="form-control"
                                            id="TA_awal_input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Tahun Akhir</label>
                                        <input required type="number" name="TA_akhir_cedit" class="form-control"
                                            id="TA_akhir_input">
                                    </div>

                                    <div class="mb-3">
                                        <div class="row">
                                            <input type="radio" id="TAactive" class="margin-custom"
                                                name="TA_status_cedit" value="1"> Aktif<br>
                                            <input type="radio" id="TAunactive" class="margin-custom"
                                                name="TA_status_cedit" value="0"> Tidak Aktif<br>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="submit"
                                        class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
<script>
    function doit() {
        // Mendapatkan elemen select berdasarkan ID
        var x = document.getElementById('dd');
    }
    x.querySelector('option[value="1"]').selected = true;

    function openEditModal(id, order) {
        // Mengubah URL action form modal
        var getdata1 = document.getElementById('TA_' + order);
        var getdata2 = document.getElementById('TAawal_' + order);
        var getdata3 = document.getElementById('TAakhir_' + order);
        var getdata4 = document.getElementById('TA_status_' + order);

        var ThnAjaran = getdata1.getAttribute('data-value');
        var TAawal = getdata2.getAttribute('data-value');
        var TAakhir = getdata3.getAttribute('data-value');
        var TAstatus = getdata4.getAttribute('data-value');


        var inputTAawal = document.getElementById('TA_awal_input');
        var inputTAakhir = document.getElementById('TA_akhir_input');

        var form = document.getElementById('formModalEditTA');
        form.action = '/admin/tahun-ajaran/cedit/' + id;

        if (ThnAjaran == 0) {
            document.getElementById('ptaRadio').checked = true;
        } else {
            document.getElementById('ataRadio').checked = true;
        }
        inputTAawal.value = TAawal;
        inputTAakhir.value = TAakhir;
        if (TAstatus == 0) {
            document.getElementById('TAunactive').checked = true;
        } else {
            document.getElementById('TAactive').checked = true;
        }



    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<?= $this->endSection('content') ?>
