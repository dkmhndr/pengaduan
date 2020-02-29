<?php if($this->session->flashdata('success')):?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success');?>
</div>
<?php endif; ?>

<div class="card mb-3">
	<div class="card-header">
		<a href="<?=site_url('petugascrud');?>"><i class="fas fa-arrow-left"></i>Back</a>
	</div>
	<div class="card-body">
		<form action="<?php base_url('petugascrud/update'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" value=<?= $value->id_petugas ?>>
			<div class="form-group">
				<label for="id_bidang">Nama Bidang</label>
				<select class="form-control <?= form_error('id_bidang')?'is-invalid':''?>" name="id_bidang"
					id="id_bidang" placeholder="Nama Bidang">
					<?php foreach($bidang as $opt): ?>
					<option value="<?php echo $opt->id_bidang ?>"><?php echo $opt->nama_bidang ?></option>
					<?php endforeach; ?>
				</select>
				<div class="invalid-feedback"><?= form_error('id_bidang'); ?></div>
			</div>
			<div class="form-group">
				<label for="nama_petugas">Nama Petugas</label>
				<input type="text" class="form-control <?= form_error('nama_petugas')?'is-invalid':''?>"
					name="nama_petugas" id="nama_petugas" value="<?= $value->nama_petugas ?>" />
				<div class="invalid-feedback"><?= form_error('nama_petugas'); ?></div>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control <?= form_error('username')?'is-invalid':''?>" name="username"
					id="username" placeholder="Username" value="<?= $value->username ?>" />
				<div class="invalid-feedback"><?= form_error('username'); ?></div>
			</div>
			<div class="form-group">
				<label for="password1">Kata Sandi</label>
				<input type="password" class="form-control <?= form_error('password1')?'is-invalid':''?>"
					name="password1" id="password1" placeholder="Kata Sandi" />
				<div class="invalid-feedback"><?= form_error('password1'); ?></div>
			</div>
			<div class="form-group">
				<label for="password2">Konfirmasi Kata Sandi</label>
				<input type="password" class="form-control <?= form_error('password2')?'is-invalid':''?>"
					name="password2" id="password2" placeholder="Konfirmasi Kata Sandi" />
				<div class="invalid-feedback"><?= form_error('password2'); ?></div>
			</div>
			<div class="form-group">
				<label for="telp">No Telp</label>
				<input type="tel" class="form-control <?= form_error('telp')?'is-invalid':''?>" name="telp" id="telp"
					placeholder="No Telepon" value="<?= $value->telp ?>" />
				<div class="invalid-feedback"><?= form_error('telp'); ?></div>
			</div>
			<div class="form-group">
				<label for="level">Level</label>
				<select class="form-control <?= form_error('level')?'is-invalid':''?>" name="level" id="level"
					placeholder="Level">
					<option value="admin">Admin</option>
					<option value="petugas">Petugas</option>
					<div class="invalid-feedback"><?= form_error('level'); ?></div>
			</div>
			<input type="submit" value="Save" class="btn btn-success" name="btn" />
		</form>
	</div>
	<div class="card-footer small text-muted">
		* required fields
	</div>
</div>
