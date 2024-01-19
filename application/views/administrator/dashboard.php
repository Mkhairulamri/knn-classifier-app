<div class="container-fluid">

	<div>

		<!-- Modal -->
		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
			<div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
				<div class="bg-overlay bg-overlay--blue" style="background: #034419;"></div>
				<h3>
					Dashboard <?php echo $level; ?></h3>

			</div>
			<div class="au-task js-list-load">
				<div class="au-task__title">


					<div class="au-task__item au-task__item--primary">
					<center> <img class="img-profile " src="<?php echo base_url() ?>assets/images/logo.png" width="10%"></center>
					<br>

						<center>
							<h4 class="alert-heading">Selamat Datang</h4>
						</center>
						<center>
							<p>Selamat Datang <strong><?php echo $username; ?></strong> di Aplikasi Penentuan Status Gizi Batita, Anda login sebagai <strong> <?php echo $level; ?></strong></p>
						</center>
						<br>
					</div>


					<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               DATA BATITA</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php 
												$batita = $this->db->query("SELECT * FROM mst_batita WHERE tipe ='Uji' ")->num_rows();
												echo $batita;
												?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                DATA LATIH</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php 
												$data_latih = $this->db->query("SELECT * FROM mst_batita WHERE TIPE = 'Latih' ")->num_rows();
												echo $data_latih;
												?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">LAPORAN
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                </div>
                                                <div class="col">
												<a href="<?php echo base_url('klasifikasi/laporan_diagnosa') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                				class="fas fa-download fa-sm text-white-50"></i> Rekap Data Batita</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                LAPORAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

					
				</div>
			</div>

		</div>

		