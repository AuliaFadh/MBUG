<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/pengumuman">Pengumuman</a></li>
                <li class="breadcrumb-item active"><a href="/admin/pengumuman/edit">Edit Pengumuman</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Edit Pengumuman</h3>
                        </div>
                    </div>

                    <!-- Form edit pengumuman -->
                    <div class="card-body">
                        <form action="/admin/pengumuman/cedit/<?= $former->id_pengumuman; ?>" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Tanggal Diterbitkan </label>
                                        <div style="display: block;" class=" col-lg-3 col-md-3 col-sm-3">
                                            <!-- TASK-BE ini elemen input name="tanggal_terbit" atribut value nya = datayang dah diterbitin ul  -->
                                            <input name="tanggal_terbit" readonly value="<get data pengumuman>" class="custom-textfield form-control ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Batas Waktu Pengumuman </label>
                                        <div style="display: block;" class=" col-lg-3 col-md-3 col-sm-3">
                                            <input name="tanggal_tarik" class="custom-textfield datepicker-default form-control ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-8 col-md-8 col-sm-8 ">
                                        <label class="label-form">Judul Pengumuman</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input name="judul_pengumuman" value="<?= $former->judul_pengumuman; ?>" type="text" class="form-control custom-textfield ">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1-up custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Deskripsi</label>
                                        <div style="display: block;" class=" col-lg-10 col-md-10 col-sm-10">
                                            <textarea name="deskripsi" class="form-control custom-textfield" rows="10"><?= $former->deskripsi; ?></textarea>
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/pengumuman" class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
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