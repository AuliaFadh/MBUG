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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akadmik/add">Tambah Akademik</a></li>


            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card" style="height: 100vh;">
                    <div class="card-header">
                        <h1>Uji Coba</h1>
                    </div>
                    <div class="card-body">

                        <input type="text" id="NPMInput">
                        <div id="result" style="display: none;">
                            <span id="npm">10120544 | Isa Tarmana</span>
                            <span id="npm">102322</span>
                            <span id="npm">1203244</span>
                            <span id="npm">1203214</span>
                            <span id="npm">1203244</span>
                            <span id="npm">12042244</span>
                            <span id="npm">1203244</span>
                            <span id="npm">113244</span>
                            <span id="npm">1203244</span>
                            <span id="npm">1323244</span>
                            <span id="npm">13213244</span>
                            <span id="noData" style="display: none;">Data tidak ada</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection('content') ?>