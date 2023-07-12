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
                <li class="breadcrumb-item active"><a href="/penerima">Daftar Penerima Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/penerima/add">Tambah Penerima</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/tambah-user-icon.png'); ?>" alt="">
                            <h3>Tambah Penerima</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">NPM</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <input type="number" class="form-control custom-textfield ">
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Alamat</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nomor Hp</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Jenis Kelamin</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="1"> Laki-laki<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0"> Perempuan<br>

                                        <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Penerimaan</label>
                                        <select class="form-control  custom-textfield col-lg-6 col-md-12 col-sm-12">
                                            <option></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>

                                        </select>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0"> Tidak Aktif<br>

                                        <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Keterangan</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>
                                    
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary margin-custom">Tambah Data</button>
                                        <a href="/beasiswa" class="btn btn-warning margin-custom">Batal</a>
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