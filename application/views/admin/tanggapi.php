<?php if($this->session->flashdata('success')):?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success');?>
</div>
<?php endif; ?>

<div class="card mb-3">
	<div class="card-header">
		<a href="<?=site_url('aduan');?>"><i class="fas fa-arrow-left"></i>Back</a>
	</div>
	<div class="card-body">
		<form action="<?php base_url('aduan/tanggapi'); ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan ?>">
				<input type="hidden" name="tgl_tanggapan" value="<?php echo date('Y-m-d') ?>">
				<input type="hidden" name="id_petugas" value="<?php echo $user['id_petugas'] ?>">
				<label for="tanggapan">Tanggapan*</label>
				<input type="text" name="tanggapan" id="tanggapan" required class="form-control" />
			</div>
			<input type="submit" value="Tanggapi" class="btn btn-success" name="btn" />
		</form>
	</div>
	<div class="card-footer small text-muted">
		* required fields
	</div>
</div>
