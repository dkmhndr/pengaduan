<div>
	<h3>Daftar Bidang</h3>
</div>
<div class="card mb-3">
	<div class="card-header">
		<a href="<?= site_url('bidang/add') ?>"><i class="fas fa-plus"></i>Tambah Bidang</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama Bidang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bidang as $daftar): ?>
					<tr>
						<td><?= $daftar->nama_bidang; ?></td>
						<td>
							<a href="<?= site_url('bidang/edit/'.$daftar->id_bidang)?>" class="btn btn-info "><i
									class="fas fa-edit"></i></a>
							<a onclick="deleteConfirm('<?= site_url('bidang/delete/'.$daftar->id_bidang)?>')"
								class="btn btn-danger " href="#!"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}

</script>
