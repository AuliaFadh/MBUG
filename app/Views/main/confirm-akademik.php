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
                <li class="breadcrumb-item active"><a href="/admin/akademik">Laporan Akademik</a></li>
                <li class="breadcrumb-item active"><a href="/admin/akademik">Konfirmasi Laporan Akademik</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            
                            <h3>Konfirmasi Laporan Akademik</h3>
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

                    <!-- Tabel -->
                    <div class="card-body">
                        <button type="button" class=" no-color m-2 float-right" id="toggle-filter"
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
                                        <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk"
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
                                        <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk-lokal"
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
                                        <input type="number"min=0 max=4 step=0.01 value=4.00 id="high-ipk-uu"
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
                                        <input type="text" min="1946" id="high-ajaran"
                                            placeholder="ATA 2023/2024" class="col-md-4 col-4 mb-3 p-1">

                                    </div>
                                </div>

                            </div>

                        </div>
                        <form action="confirm/all" method="post">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">No</th>
                                            <th class="th-sm">NPM</th>
                                            <th class="th-nm">Nama</th>
                                            <th class="th-nm">Program Studi</th>
                                            <th class="th-lg">Jenis Beasiswa</th>
                                            <th class="th-sm">Semester</th>
                                            <th class="th-nm">Tahun Ajaran</th>
                                            <th class="th-sm">IPK</th>
                                            <th class="th-sm">IPK Lokal</th>
                                            <th class="th-sm">IPK UU</th>
                                            <th class="th-sm">Rangkuman Nilai</th>
                                            <th class="th-nm">Keterangan Masukan</th>
                                            <th class="th-sm">Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <!-- Loop data laporan akademik -->
                                    <tbody>
                                        <?php $no = 0; ?>
                                        <?php foreach ($la as $key => $value) : ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td class="th-sm"><strong><?= $no ?></strong></td>
                                            <td class="th-sm"><?= $value['npm'] ?></td>
                                            <td class="th-nm"><?= $value['nama'] ?></td>
                                            <td class="th-nm"><?= $value['nama_prodi'] ?></td>
                                            <td class="th-lg"><?= $value['jenis'] ?></td>
                                            <td class="th-sm"><?= $value['semester'] ?></td>
                                            <td class="th-nm"><?= $value['tahun_ajaran'] ?></td>
                                            <td class="th-sm"><?= $value['ipk'] ?></td>
                                            <td class="th-sm"><?= $value['ipk_lokal'] ?></td>
                                            <td class="th-sm"><?= $value['ipk_uu'] ?></td>
                                            <td class="th-sm">
                                                <a title="Lihat File"
                                                    href="<?= base_url('asset/doc/database/rangkuman_nilai/' . $value['rangkuman_nilai']) ?>">
                                                    <img id="doc-search" class="btn btn-sm btn-success"
                                                        src="<?= base_url('asset/img/doc-search.png') ?>"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="th-nm">
                                                <textarea name="keterangan_" rows="2"></textarea>

                                            </td>
                                            <td class="th-sm">

                                                <div class="radio-buttons-confirm">
                                                    <input type="radio" id="accepted-<?= $value['id_akademik'] ?>"
                                                        name="status_data[<?= $value['id_akademik'] ?>]"
                                                        value="1" class="radio-input-confirm">
                                                    <label for="accepted-<?= $value['id_akademik'] ?>"
                                                        class="radio-label-confirm accepted-label-confirm">
                                                        <span class="icon-confirm">&#10003;</span>
                                                        <!-- Ceklis --></label>

                                                    <input type="radio" id="rejected-<?= $value['id_akademik'] ?>"
                                                        name="status_data[<?= $value['id_akademik'] ?>]"
                                                        value="0" class="radio-input-confirm">
                                                    <label for="rejected-<?= $value['id_akademik'] ?>"
                                                        class="radio-label-confirm rejected-label-confirm">
                                                        <span class="icon-confirm">&#10007;</span>
                                                        <!-- Silang --></label>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <a href="/admin/akademik" class="btn btn-primary-download-excel margin-custom float-right col-lg-2 col-md-4 col-sm-8">Batal</a>
                            <button type="submit"
                                class=" btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8 m-2 float-right"
                                id="toggle-filter">
                                Konfirmasi </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function handleFilter() {
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const nextYear = currentYear + 1;
        var In_awalTahunLow = 0;
        var In_akhirTahunLow = 0;
        var In_awalTahunHigh = 0;
        var In_akhirTahunHigh = 0;



        // Ambil nilai dari input IPK rendah dan tinggi
        var lowIpk = parseFloat(document.getElementById('low-ipk').value);
        var highIpk = parseFloat(document.getElementById('high-ipk').value);
        var lowIpkLokal = parseFloat(document.getElementById('low-ipk-lokal').value);
        var highIpkLokal = parseFloat(document.getElementById('high-ipk-lokal').value);
        var lowIpkUU = parseFloat(document.getElementById('low-ipk-uu').value);
        var highIpkUU = parseFloat(document.getElementById('high-ipk-uu').value);
        var lowSemester = parseFloat(document.getElementById('low-semester').value);
        var highSemester = parseFloat(document.getElementById('high-semester').value);
        var highAjaran = document.getElementById('high-ajaran').value;
        var [kriteria_ajaran_high, String_ajaran_high] = highAjaran.split(' ', 2);
        var lowAjaran = document.getElementById('low-ajaran').value;
        var [kriteria_ajaran_low, String_ajaran_low] = lowAjaran.split(' ', 2);




        if (lowAjaran === '') {
            In_awalTahunLow = 1982;
            In_akhirTahunLow = 1983;
        } else {
            [In_awalTahunLow, In_akhirTahunLow] = String_ajaran_low.split('/');
        }
        if (highAjaran === '') {
            In_awalTahunHigh = currentYear;
            In_akhirTahunHigh = nextYear;
        } else {
            [In_awalTahunHigh, In_akhirTahunHigh] = String_ajaran_high.split('/');
        }

        // Loop melalui setiap baris tabel, mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        var tableRows = document.getElementById('example3').getElementsByTagName('tr');
        for (var i = 1; i < tableRows.length; i++) {
            var row = tableRows[i];

            var semesterCell = parseInt(row.cells[5].innerText);
            var AjaranCell = row.cells[6].innerText;
            var ipkCell = parseFloat(row.cells[7].innerText); // Mengambil nilai IPK dari sel yang ke-7
            var ipk_lokal_Cell = parseFloat(row.cells[8].innerText);
            var ipk_uu_Cell = parseFloat(row.cells[9].innerText);

            var [kriteria_ajaran_Cell, String_ajaran_Cell] = AjaranCell.split(' ', 2);
            var [Out_awalTahunCell, Out_akhirTahunCell] = String_ajaran_Cell.split('/');


            // Pisahkan bagian tahun berdasarkan karakter '/'


            if (ipkCell >= lowIpk &&
                ipkCell <= highIpk &&
                ipk_lokal_Cell >= lowIpkLokal &&
                ipk_lokal_Cell <= highIpkLokal &&
                ipk_uu_Cell >= lowIpkUU &&
                ipk_uu_Cell <= highIpkUU &&
                semesterCell >= lowSemester &&
                semesterCell <= highSemester &&
                Out_awalTahunCell >= In_awalTahunLow &&
                Out_akhirTahunCell <= In_akhirTahunHigh

            ) {
                row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
            } else {
                row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
            }
        }

    }

    // Tambahkan event listener untuk memanggil fungsi handleFilter saat nilai input IPK berubah
    document.getElementById('low-ipk-lokal').addEventListener('input', handleFilter);
    document.getElementById('high-ipk-lokal').addEventListener('input', handleFilter);
    document.getElementById('low-ipk-uu').addEventListener('input', handleFilter);
    document.getElementById('high-ipk-uu').addEventListener('input', handleFilter);
    document.getElementById('low-semester').addEventListener('input', handleFilter);
    document.getElementById('high-semester').addEventListener('input', handleFilter);
    document.getElementById('low-ipk').addEventListener('input', handleFilter);
    document.getElementById('high-ipk').addEventListener('input', handleFilter);
    document.getElementById('low-ajaran').addEventListener('input', handleFilter);
    document.getElementById('high-ajaran').addEventListener('input', handleFilter);
</script>


<?= $this->endSection('content') ?>
