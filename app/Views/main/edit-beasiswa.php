<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- Ubah disini -->
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/beasiswa">Jenis Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/beasiswa/edit">Edit Beasiswa</a></li>
            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Beasiswa</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/admin/beasiswa/edit" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Nama Beasiswa</label>
                                        <input type="text" class="form-control custom-textfield  " id="nama" name="nama" autofocus value="">
                                        <!-- <div class="invalid-feedback">
                                        
                                        </div> -->
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="asal" class="label-form">Asal Beasiswa</label>
                                        <input type="text" class="form-control custom-textfield 
                                         " id="asal" name="asal" ">
                                        <!-- <div class=" invalid-feedback">

                                    </div> -->
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label class="label-form">Tahun Penerimaan</label>
                                    <input type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-3">
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <label for="status" class="label-form">Status</label>
                                    <input type="radio" class="margin-custom" name="nilai" value="1"> Aktif<br>
                                    <input type="radio" class="margin-custom" name="nilai" value="0" checked> Tidak Aktif<br>

                                    <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <button type="submit" class="btn btn-primary margin-custom">Edit Data</button>
                                    <a href="beasiswa.html" class="btn btn-warning margin-custom">Batal</a>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection('content') ?>