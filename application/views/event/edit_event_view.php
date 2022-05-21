<?php $this->load->view('admin/header');?>

<div class="container">
<div class="row">

<?php echo validation_errors(); ?>
<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
<?php echo form_open_multipart( 'index.php/event/edit/'.$this->uri->segment(3), array('class' => 'needs-validation', 'novalidate' => '') ); ?>
<legend> Edit Data event</legend>
<!--  	<?php //var_dump($event); ?>--> 	
	<?php echo validation_errors(); ?>

	<form class="form-horisontal" role="form">
	<div class="form-group">
		<label class="control-label col-sm-2" for="id_event">id_event :</label>
		<div class="col-sm-10">
		<input type="text" name="id_event" class="form-control" id="id_event" readonly value="<?php echo $event[0]->id_event?>" placeholder="id_event"><br>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="nama_event">Nama event </label>
		<div class="col-sm-10">
		<input type="text" name="nama_event" class="form-control" id="nama_event" value="<?php echo $event[0]->nama_event?>" placeholder="nama_event"><br>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Tanggal event :</label>
		<div class="col-sm-10">
		<input class="form-control" value="<?php echo $event[0]->tanggal_event?>" type="date" placeholder="yyyy-mm-dd" name="tanggal_event" placeholder=""><br>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="tempat_event">Tempat event :</label>
		<div class="col-sm-10">
		<input type="text" name="tempat_event" class="form-control" id="tempat_event" value="<?php echo $event[0]->tempat_event?>" placeholder="tempat_event"><br>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="waktu_event">Total tiket </label>
		<div class="col-sm-10">
		<input type="text" name="total_tiket" class="form-control" id="waktu_event" value="<?php echo $event[0]->total_tiket?>" placeholder="total tiket"><br>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="waktu_event">Harga tiket satuan</label>
		<div class="col-sm-10">
		<input type="text" name="harga_satuan" class="form-control" id="waktu_event" value="<?php echo $event[0]->harga_satuan?>" placeholder="harga tiket"><br>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="waktu_event">deskripsi</label>
		<div class="col-sm-10">
		<input type="text" name="deskripsi" class="form-control" id="waktu_event" value="<?php echo $event[0]->deskripsi?>" placeholder="deskripsi"><br>
		</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="waktu_event">Poster</label>
		<div class="col-sm-10">
		<input type="file" name="thumbnail"><br>
		</div>

	<div class="form-group">
	<div class="col-offset-2 col-sm-10">
		<button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close(); ?>
		</div>
	</div>

</form></div></div>
<?php $this->load->view('admin/footer');?>
