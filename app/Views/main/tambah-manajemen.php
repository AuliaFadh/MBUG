<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/manajemen">Manajemen Pengguna</a></li>
                <li class="breadcrumb-item active"><a href="/admin/manajemen/add">Tambah Pengguna Baru</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Pengguna Baru</h3>
                        </div>
                    </div>

                    <!-- Form tambah pengguna baru -->
                    <div class="card-body">
                        <form action="/admin/manajemen/save" method="post">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Username</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="text"
                                                class="form-control custom-textfield <?= $validation->hasError('username') ? ' is-invalid is-test' : '' ?>"
                                                id="username" name="username" autofocus
                                                value="<?= old('username', isset($input['username']) ? $input['username'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Password</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <input type="password"
                                                class="form-control custom-textfield <?= $validation->hasError('password') ? ' is-invalid is-test' : '' ?>"
                                                id="password" name="password"
                                                value="<?= old('password', isset($input['password']) ? $input['password'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Hak Akses</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <select name="hak_akses"
                                                class="form-control  custom-textfield col-lg-6 col-md-12 col-sm-12">
                                                <option></option>
                                                <option value="1">Admin</option>
                                                <option value="0">Penerima Beasiswa</option>
                                            </select>
                                            <div class=" invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-left : 15px"
                                        class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="status" class="label-form">Status</label>
                                        <input type="radio" class="margin-custom" name="status_user"
                                            value="1">Aktif<br>
                                        <input type="radio" class="margin-custom" name="status_user" value="0"
                                            checked>Tidak Aktif<br>
                                    </div>
                                </div>

                                <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                    <button type="submit"
                                        class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                    <a href="/admin/manajemen"
                                        class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
