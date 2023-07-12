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
                <li class="breadcrumb-item active"><a href="/manajemen">Manajemen Pengguna</a></li>
                <li class="breadcrumb-item active"><a href="/manajemen/edit">Edit Pengguna</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            
                            <h3>Edit Pengguna</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Nama User</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Hak Akses</label>
                                        <select class="form-control  custom-textfield col-lg-6 col-md-12 col-sm-12">
                                            <option></option>
                                            <option value="2018">Admin</option>
                                            <option value="2019">Mahasiswa</option>                                          

                                        </select>
                                    </div>
                                    
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="1">Aktif<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0" checked>Tidak Aktif<br>

                                        <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                    </div>
                                    

                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary margin-custom">Tambah Data</button>
                                        <a href="/manajemen" class="btn btn-warning margin-custom">Batal</a>
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