<?php if($this->session->flashdata('success')):?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success');?>
</div>
<?php endif; ?>

<div class="card mb-3">
	<div class="card-header">
		<a href="<?=site_url('bidang');?>"><i class="fas fa-arrow-left"></i>Back</a>
	</div>
	<div class="card-body">
		<form action="<?php base_url('bidang/add'); ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama_bidang">Nama Bidang</label>
				<input type="text" class="form-control <?= form_error('nama_bidang')?'is-invalid':''?>"
					name="nama_bidang" id="nama_bidang" placeholder="Nama Bidang" />
				<div class="invalid-feedback"><?= form_error('nama_bidang'); ?></div>
			</div>
			<input type="submit" value="Save" class="btn btn-success" name="btn" />
		</form>
	</div>
	<div class="card-footer small text-muted">
		* required fields
	</div>
</div>
