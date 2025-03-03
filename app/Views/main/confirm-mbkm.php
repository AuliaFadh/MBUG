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
                <li class="breadcrumb-item active"><a href="/admin/mbkm">Laporan MBKM</a></li>
                <li class="breadcrumb-item active"><a href="/admin/mbkm">Konfirmasi Laporan MBKM</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Konfirmasi Laporan MBKM</h3>
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

                                <div class="row pb-0 d-flex justify-content-center align-items-center">

                                    <div class="col-md-6 col-12 mb-3  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Periode</h7>
                                        <div
                                            class="row border-bottom d-flex justify-content-center align-items-center ">
                                            <input type="number" id="low-Periode" class="col-md-2 col-2 mb-3 p-1">
                                            <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                            </h6>
                                            <input type="number" id="high-Periode" class="col-md-2 col-2 mb-3 p-1">
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
                                            <th class="th-nm">NPM</th>
                                            <th class="th-nm">Nama</th>
                                            <th class="th-nm">Program Studi</th>
                                            <th class="th-nm">Jenis Beasiswa</th>
                                            <th class="th-lg">Nama Program MBKM</th>
                                            <th class="th-nm">Jenis Program MBKM</th>
                                            <th class="th-sm">Periode</th>
                                            <th class="th-lg">Keterangan</th>
                                            <th class="th-nm">Keterangan Masukan</th>
                                            <th class="th-sm">Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <!-- Loop data laporan mbkm -->
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($mbkm as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no ?></strong></td>
                                            <td class="th-sm"><?= $value['npm'] ?></td>
                                            <td class="th-nm"><?= $value['nama'] ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                            <td class="th-lg"><?= $value['jenis'] ?></td>
                                            <td class="th-lg"><?= $value['nama_mbkm'] ?></td>
                                            <td class="th-nm"><?= $value['jenis_mbkm'] ?></td>
                                            <td class="th-sm"><?= $value['periode'] ?></td>
                                            <td class="th-lg"><?= $value['keterangan_mbkm'] ?></td>
                                            <td class="th-nm">
                                                <textarea name="konfirmasi_keterangan[<?= $value['id_mbkm'] ?>]" rows="2"><?= $value['konf_ket_mbkm'] ?></textarea>

                                            </td>
                                            <td class="th-sm">

                                                <div class="radio-buttons-confirm">
                                                    <input type="radio" id="accepted-<?= $value['id_mbkm'] ?>"
                                                        name="status_data[<?= $value['id_mbkm'] ?>]" value="1"
                                                        class="radio-input-confirm">
                                                    <label for="accepted-<?= $value['id_mbkm'] ?>"
                                                        class="radio-label-confirm accepted-label-confirm">
                                                        <span class="icon-confirm">&#10003;</span>
                                                        <!-- Ceklis --></label>

                                                    <input type="radio" id="rejected-<?= $value['id_mbkm'] ?>"
                                                        name="status_data[<?= $value['id_mbkm'] ?>]" value="0"
                                                        class="radio-input-confirm">
                                                    <label for="rejected-<?= $value['id_mbkm'] ?>"
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

                            <a href="/admin/mbkm"
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

        document.getElementById('low-Periode').addEventListener('input', handleFilterCMBKM);
        document.getElementById('high-Periode').addEventListener('input', handleFilterCMBKM);

    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>


<?= $this->endSection('content') ?>
