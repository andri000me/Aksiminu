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
		<h1 class="h3 mb-0 text-gray-800">User</h1>
		<a  data-toggle="modal" data-target="#modal-add-user" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-body">
					<?php $no = 1; ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Username</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($user as $data) {
									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->nama_lengkap ?></td>
										<td><?= $data->username ?></td>
										<td>
											<a id="data-user" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail"
											data-namalengkap_det = "<?= $data->nama_lengkap ?>"
											data-kotama_det = "<?= $data->kotama ?>"
											data-satker_det = "<?= $data->satker ?>"
											data-telepon_det = "<?= $data->telepon ?>"
											data-tingkat_det = "<?= $data->tingkat ?>"
											data-photo_det = "<img src='<?= base_url($data->photo); ?>' width='100'>"
											data-username_det = "<?= $data->username ?>"
											data-terdaftar_det = "<?= $data->date_created ?>"><i class="fas fa-book"></i></a>
											<a id="edit-user" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-user"
											data-iduser_edit = "<?= $data->id_user?>"
											data-namalengkap_edit = "<?= $data->nama_lengkap?>"
											data-username_edit = "<?= $data->username?>"
											data-password_edit = "<?= $data->password?>"><i class="fas fa-pen"></i></a>
											<a data-toggle="modal" data-target="#modal-hapus-user<?php echo $data->id_user?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

<!-- detail user -->
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" style="font-size: 14px;">Tambah Data User</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Username</label>
							<div class="col-md-8 col-sm-8">
								<input id="username_det" name="username_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Username" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Nama Lengkap</label>
							<div class="col-md-8 col-sm-8">
								<input id="namalengkap_det" name="namalengkap_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Nama Lengkap">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Kotama</label>
							<div class="col-md-8 col-sm-8">
								<input id="kotama_det" name="kotama_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Kotama">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Satker</label>
							<div class="col-md-8 col-sm-8">
								<input id="satker_det" name="satker_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Satker">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Telepon</label>
							<div class="col-md-8 col-sm-8">
								<input id="telepon_det" name="telepon_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Telepon">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Tingkat</label>
							<div class="col-md-8 col-sm-8">
								<input id="tingkat_det" name="tingkat_det" style="font-size: 12px;" type="text" class="form-control" placeholder="Tingkat">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-4 col-sm-4">Photo</label>
							<div class="col-md-8 col-sm-8">
								<div name="photo_det" id="photo_det"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- detail user -->

<!-- add user -->
<div class="modal fade" id="modal-add-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" style="font-size: 14px;">Tambah Data User</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<form action="<?= base_url().'admin/proses_user';?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Username</label>
								<div class="col-md-8 col-sm-8">
									<input id="username" name="username" style="font-size: 12px;" type="text" class="form-control" placeholder="Username" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Password</label>
								<div class="col-md-8 col-sm-8">
									<input id="password" name="password" style="font-size: 12px;" type="password" class="form-control" placeholder="********" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Nama Lengkap</label>
								<div class="col-md-8 col-sm-8">
									<input id="nama" name="nama" style="font-size: 12px;" type="text" class="form-control" placeholder="Nama Lengkap" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Kotama</label>
								<div class="col-md-8 col-sm-8">
									<input id="kotama" name="kotama" style="font-size: 12px;" type="text" class="form-control" placeholder="Kotama" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Satker</label>
								<div class="col-md-8 col-sm-8">
									<input id="satker" name="satker" style="font-size: 12px;" type="text" class="form-control" placeholder="Satker" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Telepon</label>
								<div class="col-md-8 col-sm-8">
									<input id="telepon" name="telepon" style="font-size: 12px;" type="text" class="form-control" placeholder="Telepon" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Tingkat</label>
								<div class="col-md-8 col-sm-8">
									<input id="tingkat" name="tingkat" style="font-size: 12px;" type="text" class="form-control" placeholder="Tingkat" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Akses</label>
								<div class="col-md-8 col-sm-8">
									<select id="id_role" name="id_role" style="font-size: 12px;" class="form-control">
										<option value="2">User</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Photo</label>
								<div class="col-md-8 col-sm-8">
									<input id="photo" name="photo" style="font-size: 12px;" type="file" class="form-control" placeholder="Photo">
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
<!-- end add user -->

<!-- edit user -->
<div class="modal fade" id="modal-edit-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" style="font-size: 14px;">Edit User</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<form action="<?= base_url().'admin/update_user';?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Nama Lengkap</label>
								<div class="col-md-8 col-sm-8">
									<input id="namalengkap_edit" name="namalengkap_edit" style="font-size: 12px;" type="text" class="form-control" placeholder="Nama Lengkap">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Username</label>
								<div class="col-md-8 col-sm-8">
									<input id="iduser_edit" name="iduser_edit" type="hidden">
									<input id="idprofile_edit" name="idprofile_edit" type="hidden">
									<input id="username_edit" name="username_edit" style="font-size: 12px;" type="text" class="form-control" placeholder="Username" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-4 col-sm-4">Password</label>
								<div class="col-md-8 col-sm-8">
									<input id="password_edit" name="password_edit" style="font-size: 12px;" type="password" class="form-control" placeholder="********">
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
<!-- end edit user -->



<?php foreach ($user as $data){ ?>
	<!-- confirm hapus data -->
	<div class="modal fade" id="modal-hapus-user<?php echo $data->id_user;?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" style="font-size: 14px;">Hapus User</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">X</span>
					</button>
				</div>
				<form type="hidden" method="post" action="<?= base_url().'admin/deleteuser'?>">
					<div class="modal-body">
						Anda yakin ingin menghapus <?php echo $data->username;?> ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_user" value="<?= $data->id_user;?>">
						<button class="btn btn-primary btn-sm" type="submit">HAPUS</button>
						<button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal">BATAL</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end confirm hapus data -->
	<?php } ?>