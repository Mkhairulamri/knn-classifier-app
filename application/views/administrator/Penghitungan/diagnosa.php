<div class="container">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Hasil Klasifikasi Gizi</h6>
        </div>

        <div class="card-body">
            <br>
            <!-- <form class="navbar-search" action="<?php echo base_url('administrator/klasifikasi/hasil_batita') ?>" method="GET">
                <div class="input-group">
                    <input type="text" id="searchInput" name="cari" class="form-control bg-light border-0 small" placeholder="Search klasifikasi..." aria-label="Search" required>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" value="Cari">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> -->
            <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="<?php echo base_url('administrator/klasifikasi/cetak_batita') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export Data
                </a>
				<a href="<?php echo base_url('administrator/klasifikasi/proses_klasifikasi') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-loading fa-sm text-white-50"></i> Klasifikasi Data
                </a>
            </div>
			<?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
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
                            <td><?php echo $jrs->usia_diagnosa ?></td>
                            <td><?php echo round($jrs->jarak, 3);?></td>
                            <td><?php echo $jrs->diagnosa ?></td>
                        </tr>
                    <?php endforeach; ?>
					</tbody>
                    
                </table>
                <br>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle search input behavior
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('searchInput');

        // Set the initial state when the page is loaded
        searchInput.value = 'Search klasifikasi...';

        // Clear the placeholder value when the input is focused
        searchInput.addEventListener('focus', function () {
            if (searchInput.value === 'Search klasifikasi...') {
                searchInput.value = '';
            }
        });

        // Restore the placeholder value when the input loses focus and is empty
        searchInput.addEventListener('blur', function () {
            if (searchInput.value === '') {
                searchInput.value = 'Search klasifikasi...';
            }
        });
    });
</script>
