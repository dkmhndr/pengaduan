<div>
	<h3>Daftar Petugas</h3>
</div>
<div class="card mb-3">
	<div class="card-header">
		<a href="<?= site_url('petugascrud/add') ?>"><i class="fas fa-plus"></i>Tambah Petugas</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama Petugas</th>
						<th>Nama Bidang</th>
						<th>Username</th>
						<th>Telp</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($petugas as $daftar): ?>
					<tr>
						<td><?= $daftar->nama_petugas; ?></td>
						<td><?= $daftar->nama_bidang; ?></td>
						<td><?= $daftar->username; ?></td>
						<td><?= $daftar->telp; ?></td>
						<td><?= $daftar->level; ?></td>
						<td>
							<?php if($daftar->id_petugas == $user["id_petugas"]){
    echo "-";}else{
    ?>
							<a href="<?= site_url('petugascrud/update/'.$daftar->id_petugas)?>" class="btn btn-info "><i
									class="fas fa-edit"></i></a>
							<a onclick="deleteConfirm('<?= site_url('petugascrud/delete/'.$daftar->id_petugas)?>')"
								class="btn btn-danger " href="#!"><i class="fas fa-trash"></i></a>
						</td>
						<?php }?>
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
