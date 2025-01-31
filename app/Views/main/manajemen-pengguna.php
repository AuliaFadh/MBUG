<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="/admin/manajemen">Manajemen Pengguna</a>
                </li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/manajemen.png') ?>"
                                alt="">
                            <h3>Manajemen Pengguna</h3>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('berhasil') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal') ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('hapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('hapus') ?>
                    </div>
                    <?php endif; ?>
                    <button type="button" class=" border no-color m-2 float-right" id="toggle-filter"
                        onclick="toggleFilter()">
                        Advanced Filter
                        <img width="20px" src="<?= base_url('asset/img/gear.png') ?>" alt="">
                        <!-- Icon gear -->
                    </button>
                    <div id="advance-filter" style="display:none; transition: all 0.3s ease;"
                        class="container pt-2 border rounded mt-5">
                        <h6>Advanced Filter</h6>
                        <div class="row d-flex justify-content-center align-items-center">

                            <div class="col-md-3 col-12 mb-3">
                                <h7 class="d-flex justify-content-center align-items-center ">IPK</h7>
                                <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                    <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk"
                                        class="col-md-3 col-4 mb-3 p-1">
                                    <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                    </h6>
                                    <input type="number" min=0 max=4 step=0.01 value=4.00 id="high-ipk"
                                        class="col-md-3 col-4 mb-3 p-1">
                                </div>
                            </div>
                            <div class="col-md-3 col-12 mb-3">
                                <h7 class="d-flex justify-content-center align-items-center ">IPK Lokal</h7>
                                <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                    <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk-lokal"
                                        class="col-md-3 col-4 mb-3 p-1">
                                    <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                    </h6>
                                    <input type="number" min=0 max=4 step=0.01 value=4.00 id="high-ipk-lokal"
                                        class="col-md-3 col-4 mb-3 p-1">
                                </div>
                            </div>
                            <div class="col-md-3 col-12 mb-3">
                                <h7 class="d-flex justify-content-center align-items-center ">IPK UU</h7>
                                <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                    <input type="number" min=0 max=4 step=0.01 value=0.00 id="low-ipk-uu"
                                        class="col-md-3 col-4 mb-3 p-1">
                                    <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                    </h6>
                                    <input type="number" min=0 max=4 step=0.01 value=4.00 id="high-ipk-uu"
                                        class="col-md-3 col-4 mb-3 p-1">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">

                            <div class="col-md-6 col-12 mb-3">

                                <h7 class="d-flex justify-content-center align-items-center ">Semester</h7>

                                <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                    <input type="number" id="low-semester" min=0 max=20 value="0"
                                        class="col-md-3 col-4 mb-3 p-1">
                                    <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                    </h6>
                                    <input type="number" id="high-semester" min=0 max=20 value="20"
                                        class="col-md-3 col-4 mb-3 p-1">
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">

                                <h7 class="d-flex justify-content-center align-items-center ">Tahun Ajaran</h7>

                                <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                    <input type="text" id="low-ajaran" placeholder="PTA 1982/1983"
                                        class="col-md-4 col-4 mb-3 p-1">
                                    <h6 class=" col-1 mb-1  d-flex justify-content-center align-items-center">~
                                    </h6>
                                    <input type="text" min="1946" id="high-ajaran" placeholder="ATA 2023/2024"
                                        class="col-md-4 col-4 mb-3 p-1">

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row add-btn-behav-custom">
                        <a class="add-btn-custom p-2 m-4" href="/admin/manajemen/add" aria-expanded="false">
                            <img src="<?= base_url('asset/img/cross-icon.png') ?>">Tambah Admin
                        </a>
                    </div>

                    <!-- Tabel -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Hak Akses</th>
                                        <th>Last Login</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Loop data user -->
                                <tbody>
                                    <?php foreach ($user as $key => $value) : ?>
                                    <tr>
                                        <td>
                                            <div class="header-profile">
                                                
                                            <?php if ($value['ppicture'] == null) : ?>
                                                <img id="profile-img-nav"
                                                    src="<?= base_url('asset/img/database/default-profile.jpg'); ?>"
                                                    style="height: 50px; width: 50px;" alt="" />
                                                <?php elseif ($value['ppicture'] !== null) : ?>
                                                <img id="profile-img-nav"
                                                    src="<?= base_url('asset/img/database/picture/' . $value['ppicture']); ?>"
                                                    style="height: 50px; width: 50px;" alt="" />
                                                <?php endif; ?>

                                                
                                            </div>
                                        </td>
                                        <td>
                                        <?php if ($value['nama'] == null) : ?>
                                            <?= $value['username']; ?>
                                            <?php elseif ($value['nama'] !== null) : ?>
                                            <?= $value['nama']; ?>
                                            <?php endif; ?>
                                       
                                        
                                        </td>
                                        <?php if ($value['hak_akses'] == '0') {
                                            $hak_akses = '<span  style="color:white;"class="badge badge-rounded badge-success"> Penerima Beasiswa </span>';
                                        } elseif ($value['hak_akses'] == '1') {
                                            $hak_akses = '<span class="badge badge-rounded badge-primary"> Admin </span>';
                                        }
                                        ?>
                                        <td><?= $hak_akses ?></td>
                                        <?php
                                        $last_login = date_create_from_format('Y-m-d', $value['last_login']);
                                        ?>
                                        <td><?= $last_login->format('d M Y') ?></td>
                                        <?php if ($value['status_user'] == '1') {
                                            $status_user = '<span  style="color:white;"class="badge badge-rounded badge-success"> Aktif</span>';
                                        } elseif ($value['status_user'] == '0') {
                                            $status_user = '<span class="badge badge-rounded badge-danger">Tidak Aktif</span>';
                                        }
                                        ?>
                                        <td><?= $status_user ?></td>
                                        <td>
                                            <a href="<?= base_url('/admin/manajemen/edit/' . $value['id_user']) ?>"
                                                class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <button onclick="deleteConfirmation_user(<?= $value['id_user'] ?>)"
                                                class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Toggle filter
function toggleFilter() {
    var filterDiv = document.getElementById('advance-filter');
    if (filterDiv.style.display === 'none') {
        filterDiv.style.display = 'block';
    } else {
        filterDiv.style.display = 'none';
    }
}
</script>
<?= $this->endSection('content') ?>