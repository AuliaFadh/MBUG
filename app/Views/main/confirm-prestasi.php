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
                <li class="breadcrumb-item active"><a href="/admin/prestasi">Laporan prestasi</a></li>
                <li class="breadcrumb-item active"><a href="/admin/prestasi">Konfirmasi Laporan Prestasi</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Konfirmasi Laporan prestasi</h3>
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
                                <div
                                    class="row p-0 pb-3 d-flex justify-content-center align-items-center border-bottom">

                                    <div class="col-md-6 col-12   ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Tanggal Mulai</h7>
                                        <div class="row  d-flex justify-content-center align-items-center ">
                                            <input type="text" id="low-TglMulai" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3 p-1">
                                            <h6 class=" col-2 mb-2  d-flex justify-content-center align-items-center">
                                                Sampai
                                            </h6>
                                            <input type="text" id="high-TglMulai" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3 p-1">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12  ">
                                        <h7 class="d-flex justify-content-center align-items-center ">Tanggal Selesai
                                        </h7>
                                        <div class="row  d-flex justify-content-center align-items-center ">
                                            <input type="text" id="low-TglSelesai" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3  p-1">
                                            <h6 class=" col-2 mb-2  d-flex justify-content-center align-items-center">
                                                Sampai
                                            </h6>
                                            <input type="text" id="high-TglSelesai" name="datepicker"
                                                class="datepicker-default col-md-4 col-2 mb-3 p-1">
                                        </div>

                                    </div>
                                    <button class="btn btn btn-primary-add-data" onclick="handleFilterCPrestasi()">
                                        Filter Tanggal</button>

                                </div>

                                <div class="col-md-12 col-12">

                                    <h7 class="d-flex justify-content-center align-items-center">Jenis Prestasi</h7>
                                    <div class="row p-2  d-flex justify-content-center align-items-center">
                                        <input checked onclick="handleFilterCPrestasi()" type="checkbox"
                                            name="checkbox4" id="checkbox4" class=" custom-checkbox chk-input-success">
                                        <label for="checkbox4"
                                            class=" col-lg-3 col-nm-3 col-sm-3    custom-checkbox-label m-1">Tim</label>
                                        <input checked onclick="handleFilterCPrestasi()" type="checkbox"
                                            name="checkbox5" id="checkbox5" class=" custom-checkbox chk-input-proccess">
                                        <label for="checkbox5"
                                            class=" col-lg-3 col-nm-3 col-sm-3   custom-checkbox-label m-1">Individu</label>

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
                                            <th class="th-nm">Tingkat</th>
                                            <th class="th-sm">Jenis Prestasi</th>
                                            <th class="th-nm">Nama Kegiatan</th>
                                            <th class="th-nm">Capaian</th>
                                            <th class="th-nm">Tempat</th>
                                            <th class="th-nm">Tanggal Mulai</th>
                                            <th class="th-nm">Tanggal Selesai</th>
                                            <th class="th-nm">Penyelenggara</th>
                                            <th class="th-sm">Bukti Prestasi</th>
                                            <th class="th-nm">Tautan Publikasi</th>
                                            <th class="th-nm">Keterangan Masukan</th>
                                            <th class="th-sm">Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <!-- Loop data laporan prestasi -->
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($lp as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no ?></strong></td>
                                            <td class="th-sm"><?= $value['npm'] ?></td>
                                            <td class="th-nm"><?= $value['nama'] ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                            <td class="th-lg"><?= $value['jenis'] ?></td>
                                            <td class="th-sm"><?= $value['tingkat'] ?></td>
                                            <?php if ($value['jenis_prestasi'] == '1') {
                                                $jenis_prestasi = '<span class="status_jp badge badge-rounded badge-primary">Tim</span>';
                                            } elseif ($value['jenis_prestasi'] == '0') {
                                                $jenis_prestasi = '<span class="status_jp badge badge-rounded badge-success">Individu</span>';
                                            }
                                            ?>
                                            <td class="th-sm"><?= $jenis_prestasi ?></td>
                                            <td class="th-nm"><?= $value['nama_kegiatan'] ?></td>
                                            <td class="th-nm"><?= $value['capaian'] ?></td>
                                            <td class="th-sm"><?= $value['tempat'] ?></td>
                                            <?php
                                            $tgl_mulai = date_create_from_format('Y-m-d', $value['tanggal_mulai']);
                                            $tgl_selesai = date_create_from_format('Y-m-d', $value['tanggal_selesai']);
                                            ?>
                                            <td class="th-nm"><?= $tgl_mulai->format('d M Y') ?></td>
                                            <td class="th-nm"><?= $tgl_selesai->format('d M Y') ?></td>
                                            <td class="th-sm"><?= $value['penyelenggara'] ?></td>
                                            <td class="th-sm">
                                                <a title="Lihat File"
                                                    href="<?= base_url('asset/doc/database/bukti_prestasi/' . $value['bukti_prestasi']) ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success"
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="th-sm"><?= $value['publikasi'] ?></td>
                                            <td class="th-nm">
                                                <textarea name="konfirmasi_keterangan[<?= $value['id_prestasi'] ?>]" rows="2"><?= $value['konf_ket_prestasi'] ?></textarea>

                                            </td>
                                            <td class="th-sm">

                                                <div class="radio-buttons-confirm">
                                                    <input type="radio" id="accepted-<?= $value['id_prestasi'] ?>"
                                                        name="status_data[<?= $value['id_prestasi'] ?>]"
                                                        value="1" class="radio-input-confirm">
                                                    <label for="accepted-<?= $value['id_prestasi'] ?>"
                                                        class="radio-label-confirm accepted-label-confirm">
                                                        <span class="icon-confirm">&#10003;</span>
                                                        <!-- Ceklis --></label>

                                                    <input type="radio" id="rejected-<?= $value['id_prestasi'] ?>"
                                                        name="status_data[<?= $value['id_prestasi'] ?>]"
                                                        value="0" class="radio-input-confirm">
                                                    <label for="rejected-<?= $value['id_prestasi'] ?>"
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

                            <a href="/admin/prestasi"
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
        document.getElementById('low-TglMulai').addEventListener('input', handleFilterCPrestasi);
        document.getElementById('high-TglMulai').addEventListener('input', handleFilterCPrestasi);
        document.getElementById('low-TglSelesai').addEventListener('input', handleFilterCPrestasi);
        document.getElementById('high-TglSelesai').addEventListener('input', handleFilterCPrestasi);

    });
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    var displayedRowCount = 0;
    for (var i = 1; i < tableRows.length; i++) {
        displayedRowCount++;
    }
    document.getElementById('rowCount').textContent = 'Jumlah Data :' + displayedRowCount;
</script>


<?= $this->endSection('content') ?>
