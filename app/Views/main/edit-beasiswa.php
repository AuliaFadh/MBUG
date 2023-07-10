<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                
                <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <!-- Ubah disini -->
                        <li class="breadcrumb-item"><a href="dashboard.html">
                                <img class="logo-abbr logo-home" src="img/Home.png" alt="">
                                Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="daftar-jenis-beasiswa.html">Jenis Beasiswa</a></li>
                        <li class="breadcrumb-item active"><a href="tambah-data-beasiswa.html">Tambah Data</a></li>

                        
                    </ol>
                </div>

                <div class="row">
                    <!-- Ubah disini -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                                <label class="label-form">ID</label>
                                                <input type="text"class="form-control custom-textfield col-lg-6 col-md-12 col-sm-12">
                                            </div>
                                            
                                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                                <label class="label-form">Nama Beasiswa</label>
                                                <input type="text"class="form-control custom-textfield ">
                                                <h2 class="custom-plus">&#43;</h2>
                                            </div>
                                            
                                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                                <label class="label-form">Asal Beasiswa</label>
                                                <input type="text"class="form-control custom-textfield ">
                                            </div>

                                            
                                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                                <label class="label-form">Tahun Penerimaan</label>
                                                <input type="text"class="form-control custom-textfield ">
                                            </div>

                                            
                                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                                <label class="label-form">Aktif</label>
                                                <input type="text"class="form-control custom-textfield ">
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