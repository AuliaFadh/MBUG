<?= $this->extend('layout/web-MBUG-admin'); ?>
<?= $this->section('content') ?>
<!-- NPM, NAMA, JB, PS -->
<div class="Awalan">
    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
        <label class="label-form">NPM</label>
        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
            <input type="text" id="npm-input" class="form-control custom-textfield col-lg-7 col-md-5 col-sm-3">
            <div id="npm-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                <a id="npm-data" onclick="fillInputNPM('10120544','Isa Tarmana','Sistem Informasi')">10120544 </a>
                <a id="npm-data" onclick="fillInputNPM('10111544','Muhammad Aul','Sistem Informasi')">10111544 </a>
                <a id="npm-data" onclick="fillInputNPM('101113544','Annisa Umul','Sistem Informasi')">10911544 </a>

                <span id="npm-noData" style="display: none;">Data tidak ada</span>
            </div>
            <div class="invalid-feedback">

            </div>
        </div>
    </div>

    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
        <label class="label-form">Nama</label>
        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
            <input type="text" readonly id="npm-name" class="form-control custom-textfield ">
            <div class="invalid-feedback">

            </div>
        </div>
    </div>


    <div class="container1 row  custom-container-form col-lg-12 col-md-12 col-sm-12 ">
        <label class="label-form">Program Studi</label>
        <div style="display: block;" class=" col-lg-8 col-md-12 col-sm-12">
            <input type="text" readonly id="npm-ps" class="form-control custom-textfield ">
            <div class="invalid-feedback">

            </div>
        </div>
    </div>

    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
        <label class="label-form">Jenis Beasiswa</label>
        <div style="display: block;" class=" col-lg-8 col-md-10 col-sm-8">
            <input type="text" id="jb-input" class="form-control custom-textfield ">
            <div id="jb-search" class="dropdown-custom col-lg-8 col-md-8 col-sm-7" style="display: none;">

                <a id="jb-data" onclick="fillInputJB('Dicoding Indonesia')">Dicoding Indoneisa </a>
                <a id="jb-data" onclick="fillInputJB('KIPK')">KIPK </a>
                <a id="jb-data" onclick="fillInputJB('Kementrian Pertahanan Indonesia')">Kementrian Pertahanan Indonesia</a>

                <span id="jb-noData" style="display: none;">Data tidak ada</span>
            </div>
            <div class="invalid-feedback">

            </div>
        </div>
    </div>

</div>

<div class="tahun-ajaran">
    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
        <label class="label-form">Tahun Ajaran</label>
        <div style="display: block; margin-left:20px;" class=" col-lg-8 col-md-10 col-sm-12 ">
            <div class="row ">
                <select class="form-control  custom-textfield col-lg-3 col-md-4 col-sm-6">
                    <option></option>
                    <option value="2018">PTA</option>
                    <option value="2018">ATA</option>
                </select>
                <input required min="1981" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">
                <h3>/</h3>
                <input required min="1982" type="number" class="form-control custom-textfield col-lg-3 col-md-3 col-sm-4">



            </div>

        </div>
    </div>

</div>

<div class="ipk">
    <div class="container1 row custom-container-form col-lg-12 col-md-12 col-sm-12 ">
                                        <label class="label-form">IPK</label>
                                        <div style="display: block;" class=" col-lg-2 col-md-4 col-sm-5">
                                            <input min=0 max=4 step=0.01 type="number" class="form-control custom-textfield ">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
</div>
<?= $this->endSection('content') ?>