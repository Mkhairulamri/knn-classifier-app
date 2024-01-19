<div class="container-fluid">
<div class="alert alert-info" role="alert">
<i class="fa fa-university"></i> Data User
</div>
<?php echo $this->session->flashdata('pesan') ?>
<!-- untuk memanggil fungsi input data -->
<?php echo anchor('administrator/user/input','<button class="btn btn-sm btnprimary mb-3"><i class="fas fa-plus"></i> Tambah User</button>')?>
<table class="table table-bordered table-striped table-hover">
<tr>
<th>NO</th>
<th>Username</th>
<th>Email</th>
<th>Level</th>

<th colspan="2">AKSI</th>
</tr>
<?php
$no = 1;
foreach ($user as $jrs) : ?>
<tr>
<td width="20px"><?php echo $no++ ?></td>
<td><?php echo $jrs->username ?></td>
<td><?php echo $jrs->email ?></td>
<td><?php echo $jrs->level ?></td>

<td width="20px"><?php echo anchor('administrator/user/update/'.$jrs->id,'<div class="btn btn-sm btn-success">Update<i ="fa faedit"></i></div>') ?></td>
<td width="20px"><?php echo anchor('administrator/user/delete/'.$jrs->id,'<div class="btn btn-sm btn-danger">Delete<i class="fa fatrash"></i></div>') ?></td>
</tr>
<?php endforeach;?>
</table>
</div>