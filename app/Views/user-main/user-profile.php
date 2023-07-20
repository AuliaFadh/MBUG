<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <h1>Profile </h1>
        </div>

        <div class="row">
            <!-- Ubah disini -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row  d-flex align-items-center ">
                            <div class="profile-container col-lg-3 col-sm-12 col-md-12 ">
                                <div class="profile-image">
                                    <img src="<?= base_url('asset/img/database/default-profile.jpg'); ?>" alt="Foto Profil">
                                    <div class="upload-overlay">
                                        <label for="file-input"> <i class="fa fa-pencil add-custom"></i> </label>
                                        <input type="file" id="file-input" style="display:none; visibility: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="identity col-lg-9 col-md-12 col-sm12">
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">NPM</h4>
                                    <h4 class="label-profile"><span>:</span> {112024}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Nama</h4>
                                    <h4 class="label-profile"><span>:</span> {Jihyo Twice}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Program Studi</h4>
                                    <h4 class="label-profile"><span>:</span> {Sistem Informasi}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Tahun Penerimaan</h4>
                                    <h4 class="label-profile"><span>:</span> {2022}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Jenis Kelamin</h4>
                                    <h4 class="label-profile"><span>:</span> {Perempuan}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Nomor Telepon</h4>
                                    <h4 class="label-profile"><span>:</span> {+6281293942}</h4>
                                </div>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <h4 class="label-profile">Alamat</h4>
                                    <h4 class="label-profile"><span>:</span> {Jl. Jendral Sudirman No.108 Kec.Benteng Kel.Warudoyong Kota Sukabumi Provinsi Jawa Barat}</h4>
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