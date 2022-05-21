<?php $this->load->view('admin/header');?>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> Daftar Pembayaran </div>
<div class="panel-body">
<table class="table table-striped">
	<thead>
			<th>id_bayar</th>
			<th>id user</th>
			<th>id event</th>
			<th>jumlah beli</th>
			<th>total harga</th>
			<th>Konfirmasi</th>
			<th>Delete</th>
	</thead>
	<tbody><?php foreach ($pembayaran as $key) { ?>
		<tr><td><?php echo $key->id_bayar;?></td>
			<td><?php echo $key->id_user;?></td>
			<td><?php echo $key->nama_event;?></td>
			<td><?php echo $key->jumlah_beli;?></td>
			<td><?php echo $key->total_harga;?></td>
			<td>
				<?php if($key->status==0){ ?>
					<?php 
						echo form_open('index.php/pembayaran/update/'.$key->id_bayar); ?>
					<input type="hidden" name="id_bayar" value="<?php echo $key->id_bayar;?>">
					<button class="btn btn-primary btn-xs" type="submit" id="bayar">
						Konfirmasi bayar
					</button>
					<?php echo form_close(); ?>
				<?php }else{ ?>
					<!-- <input type="text" name="id_user" value="<?php echo $key->id_bayar;?>"> -->
					<button class="btn btn-primary btn-success" type="submit">
						Sudah bayar
					</button>
				<?php } ?>
			</td>
			<td><a href="<?=site_url()?>index.php/pembayaran/delete/<?php echo "$key->id_bayar"?>" id="hapus"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
		</tr>
		<?php }?>
	</tbody>
</table>
</div>
</div>
</div>
<?php $this->load->view('admin/footer');?>
