<?php if ($this->session->flashdata('error')) {
		?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Gagal!</strong> <?= $this->session->flashdata('error'); ?>
		</div>
		<?php
	}
?>
<div class="title-pages">SELAMAT DATANG DI AKSI MINU</div>
<hr class="hr-title">
<div class="row">
	<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
		<a class="linkcard" href="<?= base_url('referensiminu') ?>">
			<div class="card carditem">
				<i class="fas fa-book" style="font-size: 250%;"></i>
				<div class="card-body">
					<h5 class="card-title">Referensi Minu</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
		<a class="linkcard" href="<?= base_url('#') ?>">
			<div class="card carditem">
				<i class="fas fa-copy" style="font-size: 250%;"></i>
				<div class="card-body">
					<h5 class="card-title">Autentikasi Bujuk</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
		<a class="linkcard" href="<?= base_url('#') ?>">
			<div class="card carditem">
				<i class="fas fa-paste" style="font-size: 250%;"></i>
				<div class="card-body">
					<h5 class="card-title">Laporan Takah</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
		<a class="linkcard" href="<?= base_url('auth/logout') ?>">
			<div class="card carditem">
				<i class="fas fa-sign-out-alt" style="font-size: 250%;"></i>
				<div class="card-body">
					<h5 class="card-title">Keluar</h5>
				</div>
			</div>
		</a>
	</div>
</div>