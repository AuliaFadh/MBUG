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
                <li class="breadcrumb-item active"><a href="/pengumuman">Pengumuman</a></li>
                


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                
                <div class="card">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Pengumuman</h3>
                        </div>
                    </div>
</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h5>Pengumuman Pelaksanaan Ujian Utama ATA 2022/2023</h5>
                            </div>
                            <div class="card-body">
                                <p>Deskripsi singkat</p>
                                <p>20 junli 2023</p>
                            </div>
                        </div>
                        </div>
                    </div>                    
                </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>