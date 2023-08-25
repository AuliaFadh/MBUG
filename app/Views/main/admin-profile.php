<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <h1>Profile </h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Halo, <span id="Nama-Akun"><?= session()->get('username'); ?></span> </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ingin Ubah Password?</h4>
                            </div>

                            <!-- Notifikasi -->
                            <?php if (session()->getFlashdata('pass_berhasil')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pass_berhasil'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('pass_gagal')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('pass_gagal'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Form ganti password -->
                            <div class="card-body">
                                <form action="/admin/profile/cedit/<?= $profile->username; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                                        <label class="label-form">Password Lama</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="password" name="password_lama" class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-7 col-md-7 col-sm-7 ">
                                        <label class="label-form">Password Baru</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="password" name="password_baru" class="form-control custom-textfield col-lg-7 col-md-7 col-sm-7">
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="password" value="<?= $profile->password; ?>" />

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <button type="submit" class="btn btn-primary-add-data margin-custom col-lg-2 col-md-2 col-sm-2">Submit</button>
                                    </div>
                                </form>
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