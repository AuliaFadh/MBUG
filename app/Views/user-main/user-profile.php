<?= $this->extend('layout/user-web-MBUG') ?>
<?= $this->section('content') ?>

    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="/user/profile/cedit/<?= $profile['uuid_pb ']?>" class="card" method="post"
                enctype="multipart/form-data">

                <?= csrf_field() ?>
                <?php $validation_err = session('errors')?>

                <div class="card-header">
                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 justify-content-between">
                        <h2>Ingin Mengubah data profile mu?</h2>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row  d-flex align-items-center">
                        <div class="profile-container col-lg-3 col-sm-12 col-md-12">
                            <div class="profile-image ">
                                <img id="profile-img"
                                    src="<?= session()->get('pp') ? base_url('file/profile_picture/' . session()->get('pp')) : base_url('asset/img/person-icon.png') ?>"
                                alt="Foto Profil" />                                
                                <div class="upload-overlay">
                                    <label for="file-input"> <i class="fa fa-pencil add-custom"></i> </label>
                                    <input type="file" id="file-input" name="file-input"
                                        style="display:none; visibility: none;"
                                        accept="image/jpeg, image/jpg, image/png, image/webp">
                                </div>
                            </div>
                        </div>
                        <div class="identity col-lg-9 col-md-12 col-sm12">
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">NPM</h4>
                                <h4 class="label-profile"><span>:</span> <?= esc($profile['npm']) ?></h4>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Nama</h4>
                                <h4 class="label-profile"><span>:</span> <?= esc($profile['nama']) ?></h4>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Program Studi</h4>
                                <h4 class="label-profile"><span>:</span> <?= esc($profile['nama_prodi']) ?></h4>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Tahun Penerimaan</h4>
                                <h4 class="label-profile"><span>:</span> <?= esc($profile['tahun_diterima']) ?></h4>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Jenis Kelamin</h4>
                                <h4 class="label-profile"><span>:</span>
                                    <?= $profile['jenis_kelamin'] == '1' ? 'Laki-laki' : 'Perempuan' ?></h4>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Nomor Telepon</h4>
                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 no-mg no-pd">

                                    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12 no-mg no-pd">
                                        <input type="text" name="no_hp" value="<?= esc( old('no_hp' ?? $profile['no_hp']),'attr') ?>"
                                            class="form-control custom-textfield col-lg-4 col-md-4 col-sm-4 
                                            <?= isset($validation_err['no_hp']) ? ' is-invalid is-test' : '' ?>">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                <h4 class="label-profile">Alamat</h4>
                                <div
                                    class="container1-up custom-container-form col-lg-8 col-md-12 col-sm-12 no-mg no-pd">
                                    <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12 no-mg no-pd">
                                        <textarea name="alamat" class="form-control custom-textfield"
                                            rows="2"><?= esc($profile['alamat']) ?></textarea>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="user" name="submit1"
                        class="btn btn-primary-add-data margin-custom col-lg-12 col-md-12 col-sm-12">Submit</button>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Ingin Ubah Password?</h4>

            </div>

            <!-- Form ubah password penerima beasiswa -->
            <div class="card-body">


                <form action="/user/profile/pass/<?= $uuid_user ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                        <label class="label-form">Password Lama</label>
                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                            <input type="password" name="password_lama"
                                class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                            <div class=" invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                        <label class="label-form">Password Baru</label>
                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                            <input type="password" name="password_baru"
                                class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                            <div class=" invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                        <button type="submit" id="pass" name="submit2"
                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-2 col-sm-2">Submit</button>
                    </div>
                </form>

                <div class="">
                    <h5>*Aturan Pembuatan Password Baru!</h5>
                    <ul style="list-style-type: disc;" class=" margin-custom">
                        <li>Password minimal 8 karakter</li>
                        <li>Terdapat 1 huruf Kapital (ABCDEF)</li>
                        <li>Terdapat 1 Angka (0 ~ 9)</li>
                        <li>Terdapat 1 Simbol (@$!%*?&) </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection('content') ?>