<?= $this->extend('layout/web-MBUG-admin'); ?>
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
          para penerima beasiswa di Universistas Gunadarma. saat ini anda berada pada halaman Admin.
        </p>
      </div>

    </div>
    <div class="card">
      <div class="card-header">
        <h3>Pengumuman</h3>
      </div>
      <div class="card-body">

      <div class="card text-bg-info mb-3 col-lg-12">
          <div class="card-header custom-container-form ">
            <div class="col-lg-6">
              <h5 class="card-title">Judul Pengumuman</h5>
              <p>20 Juli 2023</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-end">
              <button class="btn btn-secondary toggle-button col-lg-6 col-md-12 col-sm-12 ">Baca Selengkapnya</button>
            </div>
          </div>
          <div class="card-body card-body-content" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
        </div>


        <div class="card text-bg-info mb-3 col-lg-12">
          <div class="card-header custom-container-form ">
            <div class="col-lg-6">
              <h5 class="card-title">Judul Pengumuman</h5>
              <p>20 Juli 2023</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-end">
              <button class="btn btn-secondary toggle-button col-lg-6 col-md-12 col-sm-12 ">Baca Selengkapnya</button>
            </div>
          </div>
          <div class="card-body card-body-content" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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