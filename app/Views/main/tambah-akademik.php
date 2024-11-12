<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>"
                            alt="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akadmik/add">Tambah Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <h3>Tambah Akademik</h3>
                        </div>
                    </div>

                    <!-- Form tambah data laporan akademik -->
                    <div class="card-body">
                        <form action="/admin/akademik/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="npm" class="label-form">NPM</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12"> 

                                            <input required type="text" id="find-npm" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3 <?= $validation->hasError('npm') ? ' is-invalid is-test' : '' ?>" 
                                            name="npm" autofocus value="<?= old('npm', isset($input['npm']) ? $input['npm'] : '') ?>">
                                            <div id="box-find-npm" class="dropdown-custom col-lg-8 col-md-8 col-sm-8"
                                                style="display: none;">
                                                <?php foreach ($penerima as $key => $value) : ?>
                                                <a id="npm-data"
                                                    onclick="fillInputNPM('<?= $value['npm'] ?>','<?= $value['nama'] ?>','<?= $value['nama_prodi'] ?>')"><?= $value['npm'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="no-data-find-npm" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="nama" class="label-form">Nama</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input required type="text" readonly 
                                                class="form-control custom-textfield <?= $validation->hasError('nama') ? ' is-invalid is-test' : '' ?>"
                                                id="nama" name="nama"
                                                value="<?= old('nama', isset($input['nama']) ? $input['nama'] : '') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Program Studi</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input type="text" readonly
                                                class="form-control custom-textfield <?= $validation->hasError('nama_prodi') ? ' is-invalid is-test' : '' ?>"
                                                id="prodi" name="prodi"
                                                value="-">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('prodi') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Jenis Beasiswa</label>
                                        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
                                            <input required type="text" id="jb-input"
                                                class="form-control custom-textfield <?= $validation->hasError('jenis_beasiswa') ? ' is-invalid is-test' : '' ?>"
                                                id="jenis_beasiswa" name="jenis_beasiswa"
                                                value="<?= old('jenis_beasiswa', isset($input['jenis_beasiswa']) ? $input['jenis_beasiswa'] : '') ?>">
                                            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7"
                                                style="display: none;">

                                                <?php foreach ($jenis_beasiswa as $key => $value) : ?>
                                                <a id="jb-data"
                                                    onclick="fillInputJB('<?= $value['jenis'] ?>')"><?= $value['jenis'] ?></a>
                                                <?php endforeach; ?>

                                                <span id="jb-noData" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_beasiswa') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Semester</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-3 col-sm-5 ">
                                            <input required type="number" min=1 max=14
                                                class="form-control custom-textfield <?= $validation->hasError('semester') ? ' is-invalid is-test' : '' ?>"
                                                id="semester" name="semester"
                                                value="<?= old('semester', isset($input['semester']) ? $input['semester'] : '') ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('semester') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Tahun Ajaran</label>
                                        <div style="display: block;" class=" col-lg-4 col-md-4 col-sm-5">
                                            <input required type="text" id="find-ta" 
                                                class="form-control custom-textfield " name="TA"
                                                >
                                            <div id="box-find-ta" class="dropdown-custom col-lg-9 col-md-9 col-sm-7"
                                                style="display: none;">


                                                <a id="data-find-ta" onclick="fillFindInput('find-ta','PTA 2021/2022')">PTA 2021/2022</a>
                                                <a id="data-find-ta" onclick="fillFindInput('find-ta','ATA 2022/2023')">ATA 2022/2023</a>
                                                <a id="data-find-ta" onclick="fillFindInput('find-ta','PTA 2023/2024')">PTA 2023/2024</a>                                                    

                                                <span id="no-data-find-ta" style="display: none;">Data tidak ada</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input required min=0 max=4 step=0.01 type="number"
                                                class="form-control custom-textfield <?= $validation->hasError('ipk') ? ' is-invalid is-test' : '' ?>"
                                                id="ipk" name="ipk"
                                                value="<?= old('ipk', isset($input['ipk']) ? $input['ipk'] : '') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK Lokal</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input required min=0 max=4 step=0.01 type="number"
                                                class="form-control custom-textfield <?= $validation->hasError('ipk_lokal') ? ' is-invalid is-test' : '' ?>"
                                                id="ipk_lokal" name="ipk_lokal"
                                                value="<?= old('ipk_lokal', isset($input['ipk_lokal']) ? $input['ipk_lokal'] : '') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk_lokal') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK UU</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input required min=0 max=4 step=0.01 type="number"
                                                class="form-control custom-textfield <?= $validation->hasError('ipk_uu') ? ' is-invalid is-test' : '' ?>"
                                                id="ipk_uu" name="ipk_uu"
                                                value="<?= old('ipk_uu', isset($input['ipk_uu']) ? $input['ipk_uu'] : '') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ipk_uu') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row  col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <label class="label-form">Upload Rangkuman Nilai(pdf)</label>
                                            <input required style="padding-left : 15px;" name="rangkuman_nilai"
                                                type="file" class="dropify " data-default-file="" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">Konfirmasi Dokumen</label>
                                        <div style="display: block; margin-left:20px;"
                                            class=" col-lg-8 col-md-10 col-sm-12 ">
                                            <div class="row ">
                                                <select name="konfirmasi_akademik"
                                                    class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">
                                                    <option value="2">Diproses</option>
                                                    <option value="1">Distujui</option>
                                                    <option value="0">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label for="keterangan" class="label-form-txa">Keterangan</label>
                                        <div style="display: block;" class=" col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control custom-textfield " id="keterangan" name="keterangan_akademik" autofocus="" value="" rows="2"></textarea>
                                            <div class="invalid-feedback">
                                                                                            </div>
                                        </div>
                                    </div>
                                    <div class="container1 custom-container-form col-lg-12 col-md-12 col-sm-12 ">

                                        <button type="submit"
                                            class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                        <a href="/admin/akademik"
                                            class="btn btn-primary-download-excel margin-custom col-lg-2 col-md-4 col-sm-8">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
const npmInput = document.getElementById('find-npm');
const npmName = document.getElementById('nama');
const npmPs = document.getElementById('prodi');
const npmResult = document.getElementById('box-find-npm');
const noDataNPM = document.getElementById('no-data-find-npm');


npmInput.addEventListener('input', function() {
    // Ambil nilai yang sedang diketik oleh user
    const inputValueNPM = npmInput.value.toLowerCase();

    // Ambil semua elemen spanNPM dengan id npmdi dalam div result
    const listResultsNPM = npmResult.querySelectorAll('#npm-data');

    // Cek apakah npmInput ada yang sama dengan spanNPM-spannya
    let hasMatchingDataNPM = false;
    let countNPM = 0; // Tambahkan variabel countNPM untuk menghitung jumlah spanNPM yang ditampilkan

    // Loop melalui setiap elemen spanNPM dan tentukan apakah nilainya cocok dengan inputan user
    listResultsNPM.forEach(function(spanNPM) {
        const spanValueNPM = spanNPM.textContent.toLowerCase();
        if (spanValueNPM.includes(inputValueNPM) && countNPM < 5) { // Tambahkan kondisi countNPM < 5
            // Jika nilai cocok dan countNPM masih kurang dari 5, tampilkan elemen spanNPM
            spanNPM.style.display = 'block';
            hasMatchingDataNPM = true;
            countNPM++; // Tambahkan countNPM
        } else {
            // Jika tidak cocok atau countNPM sudah mencapai 5, sembunyikan elemen spanNPM
            spanNPM.style.display = 'none';
        }
    });

    // Tentukan apakah div result harus ditampilkan atau disembunyikan berdasarkan apakah ada elemen spanNPM yang ditampilkan
    if (hasMatchingDataNPM) {
        npmResult.style.display = 'block';
        noDataNPM.style.display = 'none';
    } else {
        noDataNPM.style.display = 'block';
    }

    // Jika npmInput tidak diisi, sembunyikan div result dan spanNPM "data tidak ada"
    if (inputValueNPM === '') {
        npmResult.style.display = 'none';
        noDataNPM.style.display = 'none';
    }
    
});
npmInput.addEventListener('blur', function() {
    setTimeout(function() {
        npmResult.style.display = 'none';
      },500); // 2000 milidetik atau 2 detik
    
});

function fillInputNPM(npm,name,major) {
    npmInput.value = npm;
    npmName.value = name;
    npmPs.value = major;
}
    

    </script>

<?= $this->endSection('content') ?>
