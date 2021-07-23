<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/aksiminu/css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/aksiminu/css/bootstrap.css') ?>">
    <link href="<?= base_url('template/sbadmin/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>
<body style="background: url('uploads/images/forbg.jpg'); background-size: cover; font-family: Nunito;">

	<div class="header-user">
		<img src="<?= base_url('uploads/images/logoaksiminu.png') ?>" class="logominu">
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-user">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fas fa-bars nav-menu-icons"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if($page == 'index_welcome') echo 'active' ?>">
					<a class="nav-link" href="<?= base_url('') ?>">Beranda</a>
				</li>
				<li class="nav-item <?php if($page == 'ref_minu/index_user') echo 'active' ?>">
					<a class="nav-link" href="<?= base_url('referensiminu') ?>">Referensi Minu</a>
				</li>
			</ul>
		</div>
	</nav>