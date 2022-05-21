<?php $this->load->view('admin/header');?>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> Daftar event
 </div>
<div class="panel-body">
	<a href="<?=site_url()?>index.php/event/create"><button class="btn btn-primary">Tambah Event</button></a>
<table class="table table-striped">
	<thead>
			<th>id_event</th>
			<!-- <th>id_tiket</th> -->
			<th>Poster Event</th>
			<th>Nama Event</th>
			<th>Tanggal Event</th>
			<th>Tempat Event</th>
			<th>Total Tiket</th>
			<th>Harga Satuan</th>
			<th>aksi</th>
	</thead>
	<tbody><?php foreach ($event as $key) { ?>
		<tr><td><?php echo $key->id_event;?></td>
			<td><img src="<?=site_url()?>assets/img/<?php echo $key->gambar;?>" height="200px"></td>
			<td><?php echo $key->nama_event;?></td>
			<td><?php echo $key->tanggal_event;?></td>
			<td><?php echo $key->tempat_event;?></td>
			<td><?php echo $key->total_tiket;?></td>
			<td><?php echo $key->harga_satuan;?></td>
			<td></td>
			<td>
				<a href="<?=site_url()?>index.php/event/delete/<?php echo "$key->id_event"?>"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></a>
				<a href="<?=site_url()?>/index.php/event/edit/<?php echo "$key->id_event"?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>
</div>
</div>
</div>
<?php $this->load->view('admin/footer');?>
