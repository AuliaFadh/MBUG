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
          <li class="breadcrumb-item"><a href="/admin/home">
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

        <div class="card text-bg-info mb-3 col-lg-12">
          <div class="card-header">
            <div class="col-lg-6">
              <h5 class="card-title">Judul Pengumuman</h5>
              <p>20 Juli 2023</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
              <button class="btn btn-secondary toggle-button">Baca Selengkapnya</button>
            </div>
          </div>
          <div class="card-body card-body-content" style="display: none;">
            <p>Isi pengumuman...</p>
          </div>
        </div>

        <div class="card text-bg-info mb-3 col-lg-12">
          <div class="card-header">
            <div class="col-lg-6">
              <h5 class="card-title">Judul Pengumuman</h5>
              <p>20 Juli 2023</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
              <button class="btn btn-secondary toggle-button">Baca Selengkapnya</button>
            </div>
          </div>
          <div class="card-body card-body-content" style="display: none;">
            <p>Isi pengumuman...</p>
          </div>
        </div>



      </div>
    </div>




  </div>
</div>
</div>

<!--**********************************
                                Content body end
                            ***********************************-->
<?= $this->endSection('content') ?>