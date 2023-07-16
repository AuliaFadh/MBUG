<!DOCTYPE html>

<html lang="en">
  <head>
  <title><?= $title; ?></title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="16x16" href="https://gunadarma.ac.id/assets/images/logosmall.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url('asset/login/css/style.css');?>">

	</head>
<body>
   
    <?= $this->renderSection('content'); ?>
   



	<script src="<?= base_url('asset/login/js/jquery.min.js');?>"></script>
  <script src="<?= base_url('asset/login/js/popper.js');?>"></script>
  <script src="<?= base_url('asset/login/js/bootstrap.min.js');?>"></script>
  <script src="<?= base_url('asset/login/js/main.js');?>"></script>

	</body>
</html>