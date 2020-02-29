<div>
	<h3>Daftar Aduan</h3>
</div>
<div class="card mb-3">
	<?php if(isset($nik)){?>
	<div class="card-header">
		<a href="<?= site_url('aduan/add') ?>"><i class="fas fa-plus"></i>Buat Aduan</a>
	</div>
	<?php }elseif($user["level"]=="admin"){ ?>
	<div class="card-header">
		<a onclick="printContent('div1')" href="#"><i class="fas fa-fw fa-external-link-square-alt"></i>Generate
			Laporan</a>
	</div>
	<?php }?>
	<div class="card-body" id="div1">
		<div class="table-responsive">
			<table class="table table-hover" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Bidang</th>
						<th>Pelapor</th>
						<th>Laporan</th>
						<th>Foto</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($aduan as $daftar): ?>
					<tr>
						<td><?= $daftar->nama_bidang; ?></td>
						<td><?= $daftar->nama; ?></td>
						<td><?= $daftar->isi_laporan; ?></td>
						<td><img src="<?php echo base_url('upload/pengaduan/'.$daftar->foto) ?>" width="64" /></td>
						<td><?= $daftar->tgl_pengaduan; ?></td>
						<td><?= $daftar->status; ?></td>
						<?php if(isset($nik)){ ?>
						<?php if($daftar->status == "Hoax" || $daftar->status == "Menunggu Tanggapan"){
    echo "<td> - </td> ";}else{?>
						<td><a href="<?= site_url('tanggapan/index/'.$daftar->id_pengaduan)?>"
								class="btn btn-info ">Lihat Tanggapan</i></a></td>
						<?php }}else{ ?>
						<?php if($daftar->status == "Hoax" || $daftar->status == "Ditanggapi"){
    echo "<td> - </td> ";}else{?>
						<td>
							<a href="<?= site_url('tanggapan/tanggapi/'.$daftar->id_pengaduan)?>"
								class="btn btn-info "><i class="fas fa-reply"></i></a>
							<a onclick="hoaxConfirm('<?= site_url('tanggapan/hoax/'.$daftar->id_pengaduan)?>')"
								class="btn btn-danger " href="#!"><i class="fas fa-times"></i></a>
						</td>
						<?php }?>
						<?php }?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function hoaxConfirm(url) {
		$('#btn-hoax').attr('href', url);
		$('#hoaxModal').modal();
	}

</script>
