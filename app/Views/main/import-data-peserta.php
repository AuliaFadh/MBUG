<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 col-lg-12 p-md-0  mt-2 mt-sm-0 d-flex">
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
                            
                            <h3>Import Data Penerima beasiswa</h3>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="how-to-import">
                            <p>Berikut Langkah-langkah untuk mengimport data :</p>
                            <ol class="how-to" type="1">
                                <li>Anda dapat mengunduh <a href="<?= base_url('asset/doc/template_import_data_penerima_beasiswa.xlsx'); ?>" download>Template Excel</a> agar memudahkan pembuatan data</li>
                                <li>Export atau ubah file tersebut menjadi file CSV</li>
                                <li>Pastikan Bahwa file yang akan di import adalah file CSV</li>
                                <li>klik tombol pilih file untuk memasukan file</li>
                                <li>file yang dimasukan akan terlihat pada Tampilan Data</li>
                                <li>Pastikan data sudah terinput dengan benar</li>
                                <li>klik import data jika sudah dipastikan benar data tersebut</li>
                            </ol>
                        </div>
                        <form id="csv-form" class="row">
                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <input name="csv-file-input" type="file" id="csv-file-input" accept=".csv">
                            </div>
                            <div class="container1 custom-container-form col-lg-5 col-md-6 col-sm-12 ">
                                <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-4 col-md-5 col-sm-4">Import data</button>
                                <a href="/admin/penerima" class="btn btn-primary-download-excel margin-custom col-lg-4 col-md-4 col-sm-4">Batal</a>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <div class="csv-container">
                                <table id="example3" class="csv-table">
                                    <h4>Tampilan Data :</h4>
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