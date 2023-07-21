<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://gunadarma.ac.id/assets/images/logosmall.png">
    <link rel="stylesheet" href="<?= base_url('asset/vendor/jqvmap/css/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/vendor/chartist/css/chartist.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/style.css'); ?>">
    <!-- Datatable -->
    <link href="<?= base_url('asset/vendor/datatables/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('asset/vendor/pickadate/themes/default.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/vendor/pickadate/themes/default.date.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/skin-2.css'); ?>">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>
    <?= $this->include('layout/sidebar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout/footer'); ?>



    <!-- Javascript -->
    <script src="<?= base_url('asset/vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('asset/js/deznav-init.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom.min.js'); ?>"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="<?= base_url('asset/vendor/chart.js/Chart.bundle.min.js'); ?>"></script>
    <!-- Datatable -->
    <script src="<?= base_url('asset/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/svganimation/svg.animation.js'); ?>"></script>
    <script src="<?= base_url('asset/js/plugins-init/datatables.init.js');?>"></script>
    <!-- Chart piety plugin files -->
    <script src="<?= base_url('asset/vendor/peity/jquery.peity.min.js'); ?>"></script>

    <!-- Chart sparkline plugin files -->
    <script src="<?= base_url('asset/vendor/jquery-sparkline/jquery.sparkline.min.js'); ?>"></script>

    <!-- Demo scripts -->
    <script src="<?= base_url('asset/js/dashboard/dashboard-3.js'); ?>"></script>

    <!-- Svganimation scripts -->
    <script src="<?= base_url('asset/vendor/svganimation/vivus.min.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/svganimation/svg.animation.js'); ?>"></script>
    <!-- pickdate -->
    <script src="<?= base_url('asset/vendor/pickadate/picker.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/pickadate/picker.time.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/pickadate/picker.date.js'); ?>"></script>
	<script src="<?= base_url('asset/js/plugins-init/chartjs-init.js'); ?>"></script>
	<!-- Pickdate -->
    <script src="<?= base_url('asset/js/plugins-init/pickadate-init.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom-js.js'); ?>"></script>
    <script src="<?= base_url('asset/js/sweetalert2.all.min.js'); ?>"></script>

</body>

</html>