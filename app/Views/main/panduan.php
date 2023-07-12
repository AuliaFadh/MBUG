<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="card-header">
                                <div class="container1">
                                    <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                                    <h3>Laporan Akademik</h3>
                                </div>
                                <div>
                                    <a href="/akademik/add" class="btn btn-primary-add-data">Tambah Data</a>
                                    <a href="#download" class="btn btn-primary-download-excel">Download Excel</a>
                                </div>
                            </div>
<?= $this->endSection('content') ?>