<?php $no = 1; ?>
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
						<a href="<?= base_url($data->dokumen) ?>" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Download</a>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>