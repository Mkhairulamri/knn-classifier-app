<div class="container">
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">Data Batita</h6>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col">
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#resetModel">
						Reset Data Batita <i class="fas fa-trash"></i>
					</button>
					<!-- Modal -->
					<div class="modal fade" id="resetModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Reset Data Batita</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah Anda Yakin akan Menghapus Seluruh Data Batita ?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<?php echo anchor('administrator/klasifikasi/reset_batita', '<button type="button" class="btn btn-primary">Hapus</button>') ?>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col">
					<div class="float-right">
						<?php echo anchor('administrator/klasifikasi/input_batch_batita', '<button class="au-btn au-btn-icon bg-primary au-btn--small float-right"><i class="fas fa-file"></i> Tambah Data Batch</button>') ?>
						<?php echo anchor('administrator/klasifikasi/input_batita', '<button class="au-btn au-btn-icon bg-success au-btn--small float-right"><i class="fas fa-plus"></i> Tambah Data Batita</button>') ?>
					</div>
				</div>
			</div>
			<br>
			<br>
			<?php echo $this->session->flashdata('pesan') ?>
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th scope="col">NO</th>
						<th scope="col">Nama</th>
						<th scope="col">Tanggal Lahir</th>
						<th scope="col">Jenis Kelamin</th>
						<th scope="col">Berat Badan</th>
						<th scope="col">Tinggi Badan</th>
						<th scope="col" style="width: 200px;">Aksi</th>
					</tr>
					</thead>
					
					<tbody>
					<?php
					$no = 1;
					foreach ($klasifikasi->result() as $jrs) : ?>
						<tr>
							<td width="20px"><?php echo $no++ ?></td>
							<td><?php echo $jrs->nama ?></td>
							<td><?php echo $jrs->tanggal_lahir ?> </td>
							<td><?php echo $jrs->jenis_kelamin ?></td>
							<td><?php echo $jrs->berat ?> Kg</td>
							<td><?php echo $jrs->tinggi ?> Cm</td>
							<td width="20px">
								<?php echo anchor('administrator/klasifikasi/edit_batita/' . $jrs->id, '<div class="btn btn-sm btn-warning">Edit   <i class="fas fa-edit"></i></div>') ?>
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $jrs->id ?>">
									Hapus <i class="fas fa-trash"></i>
								</button>

							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					
				</table>
				<br>
			</div>
		</div>
		<!-- Approach -->
	</div>
</div>

<?php foreach ($klasifikasi->result() as $jr) : ?>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal<?php echo $jr->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data Batita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah Anda Yakin akan Menghapus Data Batita <?php echo $jr->nama ?> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<?php echo anchor('administrator/klasifikasi/hapus_batita/' . $jr->id, '<button type="button" class="btn btn-primary">Hapus</button>') ?>
				</div>
			</div>
		</div>
	</div>

<?php endforeach; ?>

<script type="text/javascript">
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>
