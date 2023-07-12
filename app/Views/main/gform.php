<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/gform">Link Google Form</a></li>


            </ol>

        </div>
        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Link Google Form</h3>
                        </div>

                    </div>
                    <div class="add-btn-behav-custom">
                        <a class="add-btn-custom" href="/gform/add" aria-expanded="false">
                            <img src="<?= base_url('asset/img/cross-icon.png'); ?>">
                            Tambah tautan
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-nm">Nama Form</th>
                                        <th class="th-nm">Jenis Beasiswa</th>
                                        <th class="th-nm">Tautan</th>
                                        <th class="th-sm">Tanggal Pembuatan</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($lgf as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><?= $value['nama_form']; ?></td>
                                            <td><?= $value['jenis_beasiswa']; ?></td>
                                            <td><?= $value['tautan']; ?></td>
                                            <td><?= $value['tanggal_pembuatan']; ?></td>
                                            <td class="th-sm">
                                                <a href="/gform/edit" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
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
<?= $this->endSection('content') ?>