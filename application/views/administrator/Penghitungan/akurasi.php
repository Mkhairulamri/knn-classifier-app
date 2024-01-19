<div class="container">
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">Hasil Klasifikasi Gizi</h6>
		</div>

		<div class="card-body">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				</a>
				<a href="<?php echo base_url('administrator/klasifikasi/hitung_akurasi') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					<i class="fas fa-loading fa-sm text-white-50"></i> Hitung Akurasi Terbaru
				</a>
			</div>
			<br>
			
			<?php echo $this->session->flashdata('pesan') ?>
			<div class="row">
			<?php foreach($hasil as $hs): ?>
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Terakhir Update </div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo$hs->update?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Annual) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Jumlah Data Latih</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo$hs->data_latih?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Tasks Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
							<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Jumlah Data Latih</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $hs->data_uji?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Akurasi Precition Recall</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo round($hs->akurasi,3)?> %</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-comments fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>
