<div class="container">
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">Hasil Pencarian Klasifikasi Gizi</h6>
		</div>

		<div class="card-body">
			<br>
			<form class="navbar-search" action="<?php echo base_url('administrator/klasifikasi/hasil_batita') ?>" action="GET">
				<div class="input-group">
					<input type="text" name="cari" class="form-control bg-light border-0 small" value="Search klasifikasi..." aria-label="Search" require_once>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" value="Cari">
							<i class="fas fa-search fa-sm"></i>
						</button>
					</div>
				</div>
			</form>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<th scope="col">NO</th>
						<th scope="col">Nama</th>
						<th scope="col">Tanggal Lahir</th>
						<th scope="col">Jenis Kelamin</th>
						<th scope="col">Berat Badan</th>
						<th scope="col">Tinggi Badan</th>
						<th scope="col">Usia Saat Klasifikasi</th>
						<th scope="col">Jarak</th>
						<th scope="col">Klasifikasi</th>
					</tr>
					<?php
					// $no = $this->uri->segment('3') + 1;
					$no = 1;
					// var_dump("laporan dignosa " .$this->uri->segment());
					// die();
					foreach ($cari as $jrs) : ?>
						<tr>
							<td width="20px"><?php echo $no++ ?></td>
							<td><?php echo $jrs->nama ?></td>
							<td><?php echo $jrs->tanggal_lahir ?> </td>
							<td><?php echo $jrs->jenis_kelamin ?></td>
							<td><?php echo $jrs->berat ?> Kg</td>
							<td><?php echo $jrs->tinggi ?> Cm</td>
							<td><?php echo $jrs->usia_diagnosa ?></td>
							<td><?php echo round($jrs->jarak,3) ?></td>
							<td><?php echo $jrs->diagnosa ?></td>
						</tr>
					<?php endforeach; ?>
				</table>

			</div>
		</div>
		<!-- Approach -->
	</div>
</div>
