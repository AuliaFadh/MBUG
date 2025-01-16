<?= $this->extend('layout/web-MBUG-admin') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-sm-6 p-md-0  mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/home">
                        <img class="logo-abbr logo-home" src="<?= base_url('asset/img/Home.png') ?>" alt="">
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active"><a href="/admin/program-studi">Pengaturan Admin</a></li>
                <li class="breadcrumb-item active"><a href="/admin/program-studi">Program Studi</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container1">
                            <!-- <img class="logo-abbr logo-beasiswa" src="<?= base_url('asset/img/akademik.png') ?>"
                                alt=""> -->
                            <h3>Program Studi</h3>
                        </div>
                        <div>
                            <button onclick="exportToCSV()" class="btn btn-primary-download-excel  float-right">Download
                                CSV</button>
                            <a data-bs-toggle="collapse" href="#multiCollapseExample1"
                                class="btn btn-primary-add-data float-right" role="button" aria-expanded="false"
                                aria-controls="multiCollapseExample1">
                                Tambah Data</a>

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
                    <div class="card-body ">

                        <div class="row  ">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body border">
                                        <form method="post" action="/admin/program-studi/save">
                                            <h4>Form Penambahan Progra Studi</h4>
                                            <div class="row">
                                                <div class="col-6">

                                                    <div class="row p-3">
                                                        <label for="id_prodi_input" class="col-3 p-0">Id Prodi</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <input required type="text"
                                                                class="form-control custom-textfield "
                                                                id="id_prodi_input" name="id_prodi_input" value="">
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row p-3 ">
                                                        <label for="nama_prodi_input" class="col-3 p-0">Program
                                                            Studi</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <input required type="text"
                                                                class="form-control custom-textfield "
                                                                id="nama_prodi_input" name="nama_prodi_input" value="">
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row p-3 ">
                                                        <label for="fakultas_prodi_input"
                                                            class="col-3 p-0">Fakultas</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <input required type="text"
                                                                class="form-control custom-textfield "
                                                                id="fakultas_prodi_input" name="fakultas_prodi_input"
                                                                value="">
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>

                                                <div class="col p-2">


                                                    <div class="row p-3 ">
                                                        <label for="akreditasi_prodi_input"
                                                            class="col-3 p-0">Akreditasi</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <input required type="text"
                                                                class="form-control custom-textfield "
                                                                id="akreditasi_prodi_input"
                                                                name="akreditasi_prodi_input" value="">
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row p-3 ">
                                                        <label for="jenjang_prodi_input"
                                                            class="col-3 p-0">Jenjang</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <input required type="text"
                                                                class="form-control custom-textfield "
                                                                id="jenjang_prodi_input" name="jenjang_prodi_input"
                                                                value="">
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row p-3 ">
                                                        <label for="status_prodi_input" id="status_prodi_input"
                                                            class="col-3 p-0">Status</label>
                                                        <div style="display: block;"
                                                            class=" col-lg-9 col-md-9 col-sm-9">
                                                            <select name="status_prodi_input" id="status_prodi_input"
                                                                class="form-control custom-textfield col-lg-7 col-md-7 col-sm-6">

                                                                <option value="1">Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            </select>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary-add-data m-0 ml-2 mr-2 col-lg-2 col-md-2 col-sm-8">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="row p-0 m-0">
                            <div class="col"></div>
                            <button title="Advance Filter" type="button" class="  no-color m-2 float-right"
                                id="toggle-filter" onclick="toggleFilter()">
                                Advanced Filter
                                <img width="20px" src="<?= base_url('asset/img/gear.png') ?>" alt="">
                                <!-- Icon gear -->
                            </button>
                        </div>

                        <div id="advance-filter" style="display:none; transition: all 0.3s ease;"
                            class="container pt-2 border rounded  mt-0">
                            <h6>Advanced Filter</h6>
                            <div class="row pb-0 d-flex justify-content-center align-items-center">

                                <div class="col-md-3 col-12 mb-3">
                                    <h7 class="d-flex justify-content-center align-items-center ">Tahun</h7>
                                    <div class="row border-bottom d-flex justify-content-center align-items-center ">
                                        <input type="number" min=0 value=0 id="low-tahun"
                                            class="col-md-4 col-4 mb-3 p-1" placeholder="tahun awal">
                                        <h6 class=" col-3 mb-3  d-flex justify-content-center align-items-center"> ~
                                        </h6>
                                        <input type="number" min=0 value=0 id="high-tahun" placeholder="tahun akhir"
                                            class="col-md-4 col-4 mb-3 p-1">
                                    </div>
                                </div>


                            </div>
                            <div class="row  pb-2 d-flex justify-content-center align-items-center">

                                <div class="btn-group col-md-12" role="group" aria-label="Basic outlined example  ">
                                    <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableTahunAjaran('Aktif')">Aktif</button>
                                    <button type="button" class="custom-btn-status btn btn-outline-primary col-md-6"
                                        onclick="filterTableTahunAjaran('Tidak Aktif')">Tidak Aktif</button>
                                </div>

                            </div>





                        </div>

                        <div class="table-responsive">
                            <p id="rowCount">Jumlah baris yang ditampilkan: <?= count($programStudi) ?></p>
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No</th>
                                        <th class="th-sm">Id</th>
                                        <th class="th-nm">Program Studi</th>
                                        <th class="th-nm">Fakultas</th>
                                        <th class="th-sm">Akreditasi</th>
                                        <th class="th-sm">Jenjang</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($programStudi as $prodi) : ?>
                                    <?php $no++; ?>
                                    <tr>
                                        <td class="th-sm"><?= $no ?></td>
                                        <td class="th-sm"><?= $prodi['id_prodi'] ?></td>
                                        <td class="th-nm"><?= $prodi['nama_prodi'] ?></td>
                                        <td class="th-nm"><?= $prodi['fakultas_prodi'] ?></td>
                                        <td class="th-sm"><?= $prodi['akreditasi_prodi'] ?></td>
                                        <td class="th-sm"><?= $prodi['jenjang_prodi'] ?></td>
                                        </td>
                                        <?php if ($prodi['status_prodi'] == '1') {
                                            $status = '<span class="status-peserta badge badge-rounded badge-primary">Aktif</span>';
                                        } elseif ($prodi['status_prodi'] == '0') {
                                            $status = '<span class="status-peserta badge badge-rounded badge-danger">Tidak Aktif</span>';
                                        }
                                        ?>
                                        <td class="th-sm"><?= $status ?></td>
                                        <td class="th-sm">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                onclick="editProdiModal('<?= $prodi['id_prodi'] ?>', '<?= $prodi['nama_prodi'] ?>', '<?= $prodi['fakultas_prodi'] ?>', '<?= $prodi['akreditasi_prodi'] ?>', '<?= $prodi['jenjang_prodi'] ?>', '<?= $prodi['status_prodi'] ?>')">
                                                <i class="la la-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">


                    <form id="formModalEditPS" method="post" action="/admin/program-studi/cedit/">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title " id="exampleModalLabel">Edit Program Studi</h3>

                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-6">

                                            <div class="row p-3">
                                                <label for="id_prodi_cedit" class="col-3 p-0">Id Prodi</label>
                                                <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                                    <input required type="text" class="form-control custom-textfield "
                                                        id="id_prodi_cedit" name="id_prodi_cedit" value="">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-3 ">
                                                <label for="nama_prodi_cedit" class="col-3 p-0">Program Studi</label>
                                                <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                                    <input required type="text" class="form-control custom-textfield "
                                                        id="nama_prodi_cedit" name="nama_prodi_cedit" value="">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-3 ">
                                                <label for="fakultas_prodi_cedit" class="col-3 p-0">Fakultas</label>
                                                <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                                    <input required type="text" class="form-control custom-textfield "
                                                        id="fakultas_prodi_cedit" name="fakultas_prodi_cedit" value="">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>





                                        </div>

                                        <div class="col p-2">


                                            <div class="row p-3 ">
                                                <label for="akreditasi_prodi_cedit" class="col-3 p-0">Akreditasi</label>
                                                <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                                    <input required type="text" class="form-control custom-textfield "
                                                        id="akreditasi_prodi_cedit" name="akreditasi_prodi_cedit"
                                                        value="">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-3 ">
                                                <label for="jenjang_prodi_cedit" class="col-3 p-0">Jenjang</label>
                                                <div style="display: block;" class=" col-lg-9 col-md-9 col-sm-9">
                                                    <input required type="text" class="form-control custom-textfield "
                                                        id="jenjang_prodi_cedit" name="jenjang_prodi_cedit" value="">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-3 ">
                                                <input type="radio" id="status_prodi_cedit" class="margin-custom"
                                                    name="status_prodi_cedit" value="0"> Tidak Aktif<br>
                                                <input type="radio" id="status_prodi_cedit" class="margin-custom"
                                                    name="status_prodi_cedit" value="1"> Aktif<br>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="submit"
                                        class="btn btn-primary-add-data margin-custom col-lg-2 col-md-4 col-sm-8">Submit</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
<script>
function filterTableTahunAjaran(status) {
    var rows = document.querySelectorAll('table tbody tr');
    var displayedRowCount = 0;

    rows.forEach(function(row) {
        var statusCell = row.querySelector('span.status_TA');
        if (statusCell && statusCell.textContent.trim() === status) {
            row.style.display = 'table-row'; // Menampilkan baris
            displayedRowCount++;
        } else {
            row.style.display = 'none'; // Menyembunyikan baris
        }
    });

    // Update jumlah baris yang ditampilkan
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}

function handlerFilterTahunAjaran() {
    var lowTahun = document.getElementById('low-tahun').value;
    var highTahun = document.getElementById('high-tahun').value;
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        var TahunAwalCell = row.cells[2].innerText;
        var TahunAkhirCell = row.cells[3].innerText;


        if (TahunAwalCell >= lowTahun &&
            TahunAkhirCell <= highTahun
        ) {
            row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
        }
    }


}
document.getElementById('low-tahun').addEventListener('input', handlerFilterTahunAjaran);
document.getElementById('high-tahun').addEventListener('input', handlerFilterTahunAjaran);


function editProdiModal(id, nama, fakultas, akreditasi, jenjang, status) {
    // Mengisi data ke dalam input field modal
    document.getElementById('id_prodi_cedit').value = id;
    document.getElementById('nama_prodi_cedit').value = nama;
    document.getElementById('fakultas_prodi_cedit').value = fakultas;
    document.getElementById('akreditasi_prodi_cedit').value = akreditasi;
    document.getElementById('jenjang_prodi_cedit').value = jenjang;

    // Set status berdasarkan nilai yang diterima

    // (Jika status bukan 1 atau 0, Anda bisa menambah logika tambahan jika diperlukan)
    if (status == 1) {

        document.querySelector('input[name="status_prodi_cedit"][value="1"]').checked = true;
        document.querySelector('input[name="status_prodi_cedit"][value="0"]').checked = false;

    } else {
        document.querySelector('input[name="status_prodi_cedit"][value="0"]').checked = true;
        document.querySelector('input[name="status_prodi_cedit"][value="1"]').checked = false;
        console.log('false')
    }
    document.getElementById('formModalEditPS').action = `/admin/program-studi/cedit/${id}`;

}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<?= $this->endSection('content') ?>