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
                <li class="breadcrumb-item active"><a href="/admin/penerima">Daftar Penerima Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/penerima/import">Import Data Penerima beasiswa</a></li>

            </ol>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                            <h3>Import Data Penerima beasiswa</h3>
                        </div>

                    </div>

                    <div class="card-body">

                        <p>Masukan File dalam bentuk CSV</p>
                        <form class="d-flex justify-content-between">
                        <input name="csv-file-input" type="file" id="csv-file-input" accept=".csv">
                        <div>
                        <button type="submit" class="btn btn-primary margin-custom">Tambah Data</button>
                        <a href="/admin/penerima" class="btn btn-warning margin-custom">Batal</a></div>
                        </form>

                        <div class="table-responsive">
                        <div class="csv-container">
                            <table id="example3" class="csv-table">
                                <thead>
                                    <tr class="csv-header-row"></tr>
                                </thead>
                                <tbody class="csv-body"></tbody>
                            </table>
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