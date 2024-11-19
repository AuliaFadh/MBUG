<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/gform">Link Google Form</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/gform.png') ?>"
                                alt="">
                            <h3>Link Google Form</h3>
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
                        <a class="add-btn-custom btn px-2 px-1" href="/admin/gform/add">
                            <img src="<?= base_url('asset/img/cross-icon.png') ?>">
                            Tambah tautan
                        </a>

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
                                <div
                                    class="row p-0 pb-3 d-flex justify-content-center align-items-center border-bottom">

                                    <div class="col-md-6 col-12   ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Tanggal Pembuatan
                                        </h7>
                                        <div class="row  d-flex justify-content-center align-items-center ">
                                            <input type="text" id="low-TglPembuatan" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3 p-1">
                                            <h6 class=" col-2 mb-2  d-flex justify-content-center align-items-center">
                                                Sampai
                                            </h6>
                                            <input type="text" id="high-TglPembuatan" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3 p-1">
                                        </div>

                                    </div>
                                    <button class="btn btn btn-primary-add-data" onclick="handleFilterGform()"> Filter
                                        Tanggal</button>

                                </div>



                            </div>
                        </div>

                        <div class="table-responsive">
                            <p id="rowCount">Jumlah baris yang ditampilkan: 0</p>
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="">No</th>
                                        <th class="th-nm">Nama Form</th>
                                        <th class="th-lg">Jenis Beasiswa</th>
                                        <th class="th-nm">Tautan</th>
                                        <th class="th-sm">Tanggal Pembuatan</th>
                                        <th class="th-nm">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data link gform -->
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($lgf as $key => $value) : ?>
                                    <?php $no++; ?>
                                    <tr>
                                        <td class=""><strong><?= $no ?></strong></td>
                                        <td class="th-nm"><?= $value['nama_form'] ?></td>
                                        <td class="th-lg"><?= $value['jenis'] ?></td>
                                        <td class="th-nm"><a href="<?= $value['tautan'] ?>"
                                                type="link"><?= $value['tautan'] ?></a></td>
                                        <?php $tgl_pembuatan = date_create_from_format('Y-m-d', $value['tanggal_pembuatan']); ?>

                                        <td class="th-sm"><?= $tgl_pembuatan->format('d M Y') ?></td>
                                        <td class="th-nm">
                                            <a href="<?= base_url('/admin/gform/edit/' . $value['id_lgf']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <button onclick="deleteConfirmation_gform(<?= $value['id_lgf'] ?>)"
                                                class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
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
    
    var tableRows = document.getElementById('example2').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>
<?= $this->endSection('content') ?>
