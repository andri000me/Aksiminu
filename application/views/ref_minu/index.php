<div class="container-fluid">
	<?php if($this->session->flashdata('success')) {
		
		?>
		<div class="alert alert-success">
			<strong>Sukses!</strong> <?= $this->session->flashdata('success'); ?>
			<button type="button" class="close" data-dismiss="alert">x</button>
		</div>
		<?php
	} elseif ($this->session->flashdata('error')) {
		?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Gagal!</strong> <?= $this->session->flashdata('error'); ?>
		</div>
		<?php
	}
	?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Referensi Minu</h1>
		<a  data-toggle="modal" data-target="#modal-add-ref-minu" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-body">					<?php $no = 1; ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Dokumen</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($ref_minu as $data) {
									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->judul ?></td>
										<td>
											<a id="edit-ref" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-ref-minu"
											data-idref_edit = "<?= $data->id_refminu?>"
											data-judul_edit = "<?= $data->judul?>"
											data-dokumen_data = "<?= $data->dokumen?>"><i class="fas fa-pen"></i></a>
											<a href="<?= base_url($data->dokumen) ?>" class="btn btn-sm btn-success" download><i class="fas fa-download"></i></a>
											<a  data-toggle="modal" data-target="#modal-hapus-refminu<?php echo $data->id_refminu?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->

<!-- add ref minu -->
<div class="modal fade" id="modal-add-ref-minu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" style="font-size: 14px;">Tambah Data Referensi Minu</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<form action="<?= base_url().'admin/proses_minu';?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Judul</label>
								<div class="col-md-8 col-sm-8">
									<input id="judul" name="judul" style="font-size: 12px;" type="text" class="form-control" placeholder="Judul Referensi Minu" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Dokumen</label>
								<div class="col-md-8 col-sm-8">
									<input id="dokumen" name="dokumen" style="font-size: 12px;" type="file" class="form-control" placeholder="Dokumen">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary btn-sm" type="submit">SIMPAN DATA</button>
						<button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal">BATAL</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end add ref minu -->

<?php foreach ($ref_minu as $data){ ?>
	<!-- confirm hapus data -->
	<div class="modal fade" id="modal-hapus-refminu<?php echo $data->id_refminu;?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" style="font-size: 14px;">Hapus Referensi Minu</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">X</span>
					</button>
				</div>
				<form type="hidden" method="post" action="<?= base_url().'admin/deleterefminu'?>">
					<div class="modal-body">
						Anda yakin ingin menghapus <?php echo $data->judul;?> ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_refminu" value="<?= $data->id_refminu;?>">
						<button class="btn btn-primary btn-sm" type="submit">HAPUS</button>
						<button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal">BATAL</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end confirm hapus data -->
<?php } ?>

<!-- edit ref minu -->
<div class="modal fade" id="modal-edit-ref-minu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" style="font-size: 14px;">Edit Referensi Minu</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<form action="<?= base_url().'admin/update_minu';?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Judul</label>
								<div class="col-md-8 col-sm-8">
									<input id="idref_edit" name="idref_edit" type="hidden">
									<input id="judul_edit" name="judul_edit" style="font-size: 12px;" type="text" class="form-control" placeholder="Judul Referensi Minu" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Dokumen</label>
								<div class="col-md-8 col-sm-8">
									<input type="hidden" name="dokumen_data" id="dokumen_data">
									<input id="dokumen_edit" name="dokumen_edit" style="font-size: 12px;" type="file" class="form-control" placeholder="Dokumen">
									<small>( Kosongkan jika tidak ingin dirubah )</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-sm" type="submit">SIMPAN PERUBAHAN</button>
					<button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal">BATAL</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end edit ref minu -->