<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div>

      <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user/home">
              <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">
              Dashboard</a></li>
        </ol>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h2>Selamat Datang! </h2>
      </div>
      <div class="card-body">
        <p>Website Monitoring Beasiswa merupakan website yang digunakan untuk penggunaan pemantauan administrasi untuk
          para penerima beasiswa di Universistas Gunadarma. saat ini anda berada pada halaman Penerima Beasiswa.
        </p>
      </div>

    </div>
    <div class="card">
      <div class="card-header">
        <h3>Pengumuman</h3>
      </div>
      <div class="card-body">

      <?php foreach ($news as $key => $value) : ?>
          <div class="card text-bg-info mb-3 col-lg-12">
            <div class="card-header custom-container-form ">
              <div class="col-lg-6">
                <h5 class="card-title"><?= $value['judul_pengumuman']; ?></h5>
                <?php
                $tgl_terbit = date_create_from_format('Y-m-d', $value['tanggal_terbit']);
                $tgl_tarik = date_create_from_format('Y-m-d', $value['tanggal_tarik']);
                ?>
                <p>posted : <?= $tgl_terbit->format('d M Y'); ?> - <?= $tgl_tarik->format('d M Y'); ?></p>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-end">
                <button class="btn btn-secondary toggle-button col-lg-6 col-md-12 col-sm-12 ">Baca Selengkapnya</button>
              </div>
            </div>
            <div class="card-body card-body-content" style="display: none;">
              <p><?= $value['deskripsi']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div>

<!--**********************************
                                Content body end
                            ***********************************-->
<?= $this->endSection('content') ?>