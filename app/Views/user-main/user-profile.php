<?= $this->extend('layout/user-web-MBUG'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <h1>Profile </h1>
        </div>


        <!-- Ubah disini -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="card">
                <div class="card-header">
                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 justify-content-between">
                        <h2>Ingin Mengubah data profile mu?</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row  d-flex align-items-center">
                        <div class="profile-container col-lg-3 col-sm-12 col-md-12">
                            <div class="profile-image ">
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
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 no-mg no-pd">

                                    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12 no-mg no-pd">
                                        <input type="text" value="{diisi data sebelymna}" class="form-control custom-textfield col-lg-4 col-md-4 col-sm-4">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Alamat</h4>

                                <div class="container1-up custom-container-form col-lg-8 col-md-12 col-sm-12 no-mg no-pd">
                                    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12 no-mg no-pd">
                                        <textarea class="form-control custom-textfield" rows="2">{di isi data sebelumnya dulu}</textarea>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>





                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-12 col-md-12 col-sm-12">Submit</button>
                </div>

            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Ingin Ubah Password?</h4>
            </div>
            <div class="card-body">
                <form action="">

                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                        <label class="label-form">Password Lama</label>
                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                            <input type="password" class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                            <div class=" invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                        <label class="label-form">Password Baru</label>
                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                            <input type="password" class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                            <div class=" invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-2 col-sm-2">Submit</button>

                    </div>

                </form>
            </div>
        </div>





    </div>
</div>


<?= $this->endSection('content') ?>