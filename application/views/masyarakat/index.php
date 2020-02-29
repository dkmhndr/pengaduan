<div class="row">


	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Dikirim</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['jmllaporan'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-file-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Tanggapan</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['menunggu'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clock fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ditanggapi</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['ditanggapi'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-check fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Hoax</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['hoax'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-times fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
