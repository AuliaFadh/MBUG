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
                <li class="breadcrumb-item active"><a href="/admin/keaktifan">Laporan Keaktifan</a></li>
                <li class="breadcrumb-item active"><a href="/admin/keaktifan/edit">Edit Keaktifan</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            
                            <h3>Edit Keaktifan</h3>
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
                                        <label class="label-form">Program Studi</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>
                                    
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Semester</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="1"> PTA <br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0" checked> ATA <br>

                                        <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                    </div>

                                    
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <input type="text" class="form-control custom-textfield ">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        
                                        <div class="form-group fallback w-100">
                                        <label class="label-form">KRS</label>
                                        <a title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf" ><img id="doc-search" class="btn btn-sm btn-success"src="<?= base_url('asset/img/doc-search.png'); ?>"" alt=""></a> 
                                        <input type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Blanko Pembayaran : Jumlah ditagihkan</label>
                                        <input type="number" class="form-control custom-textfield ">
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jumlah Potongan</label>
                                        <input type="number" class="form-control custom-textfield ">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        
                                        <div class="form-group fallback w-100">
                                        <label class="label-form">Blanko Pembayaran</label>
                                        <a title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf" ><img id="doc-search" class="btn btn-sm btn-success"src="<?= base_url('asset/img/doc-search.png'); ?>"" alt=""></a> 
                                        <input type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        
                                            <div class="form-group fallback w-100">
                                            <label class="label-form">Bukti Pembayaran</label>
                                            <a title="Lihat Dokumen Sebelumnya" href="pdf/pdf1.pdf" ><img id="doc-search" class="btn btn-sm btn-success"src="<?= base_url('asset/img/doc-search.png'); ?>"" alt=""></a> 
                                            <input type="file" class="dropify" data-default-file="">
                                            </div>
                                        </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="nilai" value="1"> Aktif<br>
                                        <input type="radio" class="margin-custom" name="nilai" value="0" checked> Tidak Aktif<br>

                                        <!-- <div class="invalid-feedback">
                                            
                                        </div> -->
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary margin-custom">Tambah Data</button>
                                        <a href="/admin/keaktifan" class="btn btn-warning margin-custom">Batal</a>
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