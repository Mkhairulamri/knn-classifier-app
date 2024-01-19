<div class="container">
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">INPUT BATCH DATA LATIH</h6>
			<div class="float-right">
				<a href="<?= base_url('assets/Template_data_latih.xlsx'); ?>" download><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Download Template Data Latih</button></a>
			</div>
		</div>
	<div class="card-body">
		<?php echo $this->session->flashdata('status') ?>
		<!-- method post untuk mengambil fungsi input_aksi di controller-->
		<form method="post" action="<?php echo base_url('administrator/klasifikasi/import_excel') ?>" enctype="multipart/form-data">
			<div class="col-md-8">
				<!--file input example -->
				<span class="control-fileupload">
					<label for="file">Upload file Data Latih:</label>
					<input type="file" name="batch" accept=".xls,.xlsx" id="file" require>
				</span>
				<input type="hidden" name="tipe" value="Latih">
				<!--./file input example -->
				<p>&nbsp;</p>
				<hr>
			</div>
			<button type="submit" class="btn btn-success">SIMPAN</button>
		</form>

	</div>
</div>
