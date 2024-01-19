<div class="container">
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">INPUT BATITA</h6>
		</div>
		<div class="card-body">
		<?php echo $this->session->flashdata('pesan') ?>
			<?php echo $this->session->flashdata('input') ?>
			<!-- method post untuk mengambil fungsi input_aksi di controller-->
			<form method="post" action="<?php echo base_url('administrator/klasifikasi/save_batita') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" placeholder="Masukkan Nama ..." class="form-control" require>
					<?php echo form_error('nama', '<div class="text-danger small" ml-3>') ?>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control" placeholder="-Pilih-">
						<option disabled selected>Silahkan Pilih Jenis Kelamin</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" placeholder="Masukkan tanggal lahir..." class="form-control" max="<?php echo $max_date ?>"   require>
					<?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>
				</div>

				<div class="form-group">
					<label>Berat Badan</label>
					<input type="text" name="berat" placeholder="Masukkan Berat Badan ..." class="form-control" require>
					<?php echo form_error('berat', '<div class="text-danger small" ml-3>') ?>
				</div>

				<div class="form-group">
					<label>Tinggi Badan</label>
					<input type="text" name="tinggi" placeholder="Masukkan Tinggi Badan ..." class="form-control" require>
					<?php echo form_error('tinggi', '<div class="text-danger small" ml-3>') ?>
				</div>

				<div class="form-group">
					<label>Status Gizi</label>
					<select name="diagnosa" class="form-control">
						<option disabled selected>Silahkan Pilih Status Gizi Data latih</option>
						<option value="Gizi Buruk">Gizi Buruk</option>
						<option value="Gizi Kurang">Gizi Kurang</option>
						<option value="Gizi Baik">Gizi Baik</option>
						<option value="Risiko Gizi Lebih">Beresiko Gizi Lebih</option>
						<option value="Gizi Lebih">Gizi Lebih</option>
						<option value="Obesitas">Obesitas</option>
					</select>
					<?php echo form_error('kelamin', '<div class="text-danger small" ml-3>') ?>
				</div>

				<button type="submit" class="btn btn-success">SIMPAN</button>
			</form>

		</div>
	</div>
