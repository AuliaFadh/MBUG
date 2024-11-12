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
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Laporan keaktifan</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Konfirmasi Laporan keaktifan</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">

                            <h3>Konfirmasi Laporan keaktifan</h3>
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
                        <button type="button" class=" no-color m-2 float-right" id="toggle-filter"
                            onclick="toggleFilter()">
                            Advanced Filter
                            <img width="20px" src="<?= base_url('asset/img/gear.png') ?>" alt="">
                            <!-- Icon gear -->
                        </button>

                        <div id="advance-filter" style="display:none; transition: all 0.3s ease;"
                            class="container pt-2 border rounded mt-5">
                            <h6>Advanced Filter</h6>
                            <div class="row d-flex justify-content-center align-items-center">

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

                            <div class="row d-flex justify-content-center align-items-center">

                                <div class="col-md-6 col-12 mb-3">

                                    <h7 class="d-flex justify-content-center align-items-center ">Semester</h7>

                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                        <input type="number" id="low-semester" min=0 max=20 value="0"
                                            class="col-md-3 col-4 mb-3 p-1">
                                        <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                        </h6>
                                        <input type="number" id="high-semester" min=0 max=20 value="20"
                                            class="col-md-3 col-4 mb-3 p-1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-3">

                                    <h7 class="d-flex justify-content-center align-items-center ">Tahun Ajaran</h7>

                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                        <input type="text" id="low-ajaran" placeholder="PTA 1982/1983"
                                            class="col-md-4 col-4 mb-3 p-1">
                                        <h6 class=" col-1 mb-1  d-flex justify-content-center align-items-center">~
                                        </h6>
                                        <input type="text" min="1946" id="high-ajaran"
                                            placeholder="ATA 2023/2024" class="col-md-4 col-4 mb-3 p-1">

                                    </div>
                                </div>

                            </div>

                        </div>
                        <form action="confirm/all" method="post">
                            <div class="table-responsive">
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
                                            <th class="th-sm">KRS</th>
                                            <th class="th-nm">Jumlah ditagihkan</th>
                                            <th class="th-nm">Jumlah Potongan</th>
                                            <th class="th-sm">Blanko Pembayaran</th>
                                            <th class="th-sm">Bukti Pembayaran</th>
                                            <th class="th-sm">Status Mahasiswa</th>
                                            <th class="th-nm">Keterangan Masukan</th>
                                            <th class="th-sm">Status Konfirmasi</th>
                                            <th class="th-sm">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Loop data keaktifan per semester -->
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($ka as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no ?></strong></td>
                                            <td class="th-sm"><?= $value['npm'] ?></td>
                                            <td class="th-nm"><?= $value['nama'] ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                            <td class="th-lg"><?= $value['jenis'] ?></td>
                                            <td class="th-sm"><?= $value['semester'] ?></td>
                                            <td class="th-nm"><?= $value['tahun_ajaran'] ?></td>
                                            <td class="th-sm">
                                                <a title="Lihat File"
                                                    href="<?= base_url('asset/doc/database/krs/' . $value['krs']) ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success"
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="th-sm"><?= $value['jumlah_ditagihkan'] ?></td>
                                            <td class="th-sm"><?= $value['jumlah_potongan'] ?></td>
                                            <td class="th-sm">
                                                <a title="Lihat File"
                                                    href="<?= base_url('asset/doc/database/blanko_pembayaran/' . $value['blanko_pembayaran']) ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success"
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="th-sm">
                                                <a title="Lihat File"
                                                    href="<?= base_url('asset/doc/database/bukti_pembayaran/' . $value['bukti_pembayaran']) ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success"
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <?php if ($value['status_penerima'] == '1') {
                                                $status = '<span class="badge badge-rounded badge-primary"> Aktif</span>';
                                            } elseif ($value['status_penerima'] == '0') {
                                                $status = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                            } elseif ($value['status_penerima'] == '2') {
                                                $status = '<span class="badge badge-rounded badge-success">lulus</span>';
                                            }
                                            ?>
                                            <td class="th-sm"><?= $status ?></td>
                                            <td class="th-nm">
                                                <textarea name="konfirmasi_keterangan[<?= $value['id_keaktifan'] ?>]" rows="2"><?= $value['konf_ket_keaktifan'] ?></textarea>

                                            </td>
                                            <td class="th-sm">

                                                <div class="radio-buttons-confirm">
                                                    <input type="radio" id="accepted-<?= $value['id_keaktifan'] ?>"
                                                        name="status_data[<?= $value['id_keaktifan'] ?>]"
                                                        value="1" class="radio-input-confirm">
                                                    <label for="accepted-<?= $value['id_keaktifan'] ?>"
                                                        class="radio-label-confirm accepted-label-confirm">
                                                        <span class="icon-confirm">&#10003;</span>
                                                        <!-- Ceklis --></label>

                                                    <input type="radio" id="rejected-<?= $value['id_keaktifan'] ?>"
                                                        name="status_data[<?= $value['id_keaktifan'] ?>]"
                                                        value="0" class="radio-input-confirm">
                                                    <label for="rejected-<?= $value['id_keaktifan'] ?>"
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

                            <a href="/admin/keaktifan"
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



<?= $this->endSection('content') ?>
