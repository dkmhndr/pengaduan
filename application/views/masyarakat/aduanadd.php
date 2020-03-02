<?php if($this->session->flashdata('success')):?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success');?>
</div>
<?php endif; ?>

<div class="card mb-3">
	<div class="card-header">
		<a href="<?=site_url('aduan');?>"><i class="fas fa-arrow-left"></i>Kembali</a>
	</div>
	<div class="card-body">
		<form action="<?php base_url('aduan/add'); ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="id_bidang">Bidang*</label>
				<select name="id_bidang" id="id_bidang" required class="form-control">
					<?php foreach($bidang as $row):?>
					<option value="<?= $row->id_bidang ?>"><?= $row->nama_bidang?></option>
					<?php endforeach;?>
					</bidang>
			</div>
			<input type="hidden" name="tgl_pengaduan" id="tgl_pengaduan" value="<?php echo date('Y-m-d')?>">
			<input type="hidden" name="nik" id="nik" value="<?php echo $user["nik"] ?>">
			<div class="form-group">
				<label for="isi_laporan">Isi laporan*</label>
				<input type="textbox" name="isi_laporan" id="isi_laporan" required class="form-control" />
			</div>
			<div class="form-group">
				<label for="foto">Foto (Max 2 MB)</label>
				<input class="form-control-file" type="file"
					name="foto" />
				<div class="invalid-feedback">
					<?php echo form_error('foto') ?>
				</div>
			</div>
			<input type="hidden" name="status" id="status" value="Menunggu Tanggapan">
			<input type="submit" value="Laporkan" class="btn btn-success" name="btn" />
		</form>
	</div>
	<div class="card-footer small text-muted">
		* required fields
	</div>
</div>
