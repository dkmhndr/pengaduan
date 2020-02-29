<div><h3>Daftar Aduan</h3></div>
<div class="card mb-3">
<div class="card-body">
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
<td><?= $daftar->foto; ?></td>
<td><?= $daftar->tgl_pengaduan; ?></td>
<td><?= $daftar->status; ?></td>
<?php if($daftar->status == "Hoax" || $daftar->status == "Ditanggapi"){
    echo "<td> - </td> ";}else{?>
<td>
<a href="<?= site_url('aduan/tanggapi/'.$daftar->id_pengaduan)?>" class="btn btn-info "><i class="fas fa-reply"></i></a>
<a onclick="hoaxConfirm('<?= site_url('aduan/hoax/'.$daftar->id_pengaduan)?>')" class="btn btn-danger " href="#!" ><i class="fas fa-times"></i></a>
</td>
<?php }?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
<script>function hoaxConfirm(url){
    $('#btn-hoax').attr('href',url);
    $('#hoaxModal').modal();
}</script>