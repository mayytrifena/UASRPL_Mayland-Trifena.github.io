<?php $this->load->view('admin/header');?>

<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
<div class="container">
<div class="row">
	
<?php echo validation_errors(); ?>
<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
<?php echo form_open_multipart( 'index.php/event/Create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
<legend> Tambah Data event</legend>

	<form class="form-horisontal" role="form">
	<div class="form-group">
		<label class="control-label col-sm-2" for="">Nama</label>
		<div class="col-sm-10">
		<input type="text" name="nama_event" class="form-control" id="nama_event" placeholder="Nama Event"><br></div></div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="">Tanggal</label>
		<div class="col-sm-10">
		<input type="date" name="tanggal_event" class="form-control" id="Tanggal Event" placeholder=""><br>
	</div></div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="">Tempat</label>
		<div class="col-sm-10">
		<input type="text" name="tempat_event" class="form-control" id="Tempat Event" placeholder="tempat_event"><br></div></div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="">Total Tiket</label>
		<div class="col-sm-10">
		<input type="number" name="total_tiket" class="form-control" id="waktu_event" placeholder="Total"><br></div></div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="">Harga Tiket Satuan</label>
		<div class="col-sm-10">
		<input type="number" name="harga_satuan" class="form-control" id="waktu_event" placeholder="Total"><br></div></div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="">Deskripsi Event</label>
		<div class="col-sm-10">
		<textarea class="form-control" name="deskripsi"></textarea><br></div></div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="">Poster Event</label>
		<div class="col-sm-10">
		<input type="file" name="thumbnail"><br></div></div>


	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close(); ?>
	</div></div>
</div>
</div>
</div>
</form>
<?php $this->load->view('admin/footer');?>