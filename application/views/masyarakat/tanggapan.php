<div>
	<h3>Tanggapan</h3>
</div>
<div class="card mb-3">
	<div class="card-header">
		<a href="<?= site_url('aduan') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
	</div>
	<div class="card-body">
		<div class="container">
			<div class="row">
				<?php foreach ($tanggapan as $isi):?>
				<ul>
					<li><b>Tanggal Laporan :</b> <?= $isi->tgl_pengaduan ?></li>
					<li><b>Bidang :</b> <?= $isi->nama_bidang ?></li>
					<li><b>Laporan :</b> <?= $isi->isi_laporan ?></li>
				</ul>
			</div>
			<div class="row">
				<ul>
					<li><b>Tanggapan :</b> <?= $isi->tanggapan ?></li>
					<li><b>Ditanggapi oleh :</b> <?= $isi->nama_petugas ?></li>
					<li><b>Ditanggapi tanggal :</b> <?= $isi->tgl_tanggapan ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
