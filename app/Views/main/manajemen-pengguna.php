<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
               

                    <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <!-- Ubah disini -->
                            <li class="breadcrumb-item"><a href="/dashboard">
                                    <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png'); ?>" alt="">    
                                    Data User</a></li>
                            
                            

                        </ol>
                    
                </div>
                <div class="row">
                    <!-- Ubah disini -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="container1">
                                    <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/beasiswa-icon.png'); ?>" alt="">
                                    <h3>Data User</h3>
                                </div>
                              
                            </div>
                            <div class="add-btn-behav-custom">
                                <a class="add-btn-custom" href="/tambah-user" aria-expanded="false">
                                    <img src="<?= base_url('asset/img/cross-icon.png'); ?>">
                                    Tambah User Baru
                                </a>
                                    </div>
                            
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table  id="example2" class="display" style="min-width: 845px">
                                        
                                        <thead>
                                            
                                            <tr>
                                                <th>ID User</th>
                                                <th>Nama User</th>
                                                <th>Hak Akses</th>
                                                <th>Last Login</th>
                                                <th>Status</th>   
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A001</td>
                                                <td>User1</td>
                                                <td>Admin</td>
                                                <td>4 Juli 2023</td>
                                                <td>Aktif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>                                              
                                            </tr>
                                            <tr>
                                                <td>A002</td>
                                                <td>Annisa umul fath</td>
                                                <td>10142534</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>                                            
                                            </tr>

                                            <tr>
                                                <td>A002</td>
                                                <td>Annisa umul fath</td>
                                                <td>10142534</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>                                            
                                            </tr>
                                            <tr>
                                                <td>A002</td>
                                                <td>Annisa umul fath</td>
                                                <td>10142534</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>                                            
                                            </tr>
                                            <tr>
                                                <td>A002</td>
                                                <td>Annisa umul fath</td>
                                                <td>10142534</td>
                                                <td>Sistem Informasi</td>
                                                <td>6</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>                                            
                                            </tr>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection('content') ?>