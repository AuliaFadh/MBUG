<?= $this->extend('layout/login-frame') ?>
<?= $this->section('content') ?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img"
                        style="background-image: url('<?= base_url('asset/login/images/login.jpeg') ?>');">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <img class="login-logo" src="<?= base_url('asset/img/Logo-web2.png') ?>" alt="">
                                <h3 class="mb-4">Login <p class="role">Penerima Beasiswa</p>
                                </h3>
                            </div>
                        </div>
                        <?php 
                        $errors = session('errors'); 
                        if($errors):
                            $errors = is_array($errors) ? $errors : [$errors];
                            foreach ($errors as $error) :?>
                                <div class="alert alert-danger" role="alert">
                                    <?= esc($error)?>
                                </div>
                            <?php endforeach?>
                        <?php endif?>                        
                        <!-- Form input login penerima beasiswa -->
                        <form action="<?= base_url('/user/login_check') ?>" method="post"> 
                        <?= csrf_field() ?>                       
                            <div class="form-group mb-3">
                                <label class="label" for="name">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    required
                                    value="<?= esc(old('username'),'attr')?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary-login rounded submit px-3">Sign In</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection('content') ?>
