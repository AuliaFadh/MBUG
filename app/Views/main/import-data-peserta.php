<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 col-lg-12p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/penerima">Daftar Penerima Beasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/admin/penerima/import">Import Data Penerima beasiswa</a></li>
            </ol>
        </div>

        <div class="row">
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
                        <div class="container">
                            <h4>Aturan file Data</h4>
                            <ol class="how-to" type="1">
                               <li>File Harus dalam bentuk CSV</li>
                               <li>Data harus sesuai atribut pada file template dan tidak boleh diubah atributnya</li>
                               <li>Maksimal data atau baris yang dapat diimport adalah 5000</li>
                               <li>Gunakan Id_prodi untuk mengisi program studi sesuai dengan data prodi pada halaman <a href="/admin/program-studi">Program Studi</a></li>
                               <li>Gunakan langsung angka 8 untuk nomor hp Contoh 0812345689 menjadi 812345689</li>
                               <li>Pada atribut Jenis Kelamin gunakan angka 1 untuk Laki-laki dan 0 untuk perempuan</li>
                               <li>Pada atribut Status gunakan angka 1 untuk Aktif dan 0 untuk tidak aktif dan 2 untuk lulus</li>
                               <li>dapat menambahkan keterangan jika diperlukan</li>
                            </ol>
                        </div>

                        <!-- Form import data penerima beasiswa -->
                        <form action="/admin/penerima/cimport" id="csv-form" class="row" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <input name="csv-file-input" type="file" id="csv-file-input" accept=".csv">
                            </div>
                            <div class="container1 custom-container-form col-lg-5 col-md-6 col-sm-12 ">
                                <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-4 col-md-5 col-sm-4">Import data</button>
                                <a href="/admin/penerima" class="btn btn-primary-download-excel margin-custom col-lg-4 col-md-4 col-sm-4">Batal</a>
                            </div>
                        </form>

                        <!-- Tampilan data yang akan diinput (setelah upload file csv yang sesuai) -->
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