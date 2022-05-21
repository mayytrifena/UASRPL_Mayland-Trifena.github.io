<?php $this->load->view('admin/header');?>

<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
<div class="container">
<div class="row">
	
<?php  echo form_open('index.php/user/Create');?>
	<legend> Tambah Data User</legend>

	<?php echo validation_errors(); ?>
	<form class="form-horisontal" role="form">

	<div class="form-group">
		<label class="control-label col-sm-2" for="">Username</label>
		<div class="col-sm-10">
		<input type="text" name="username" class="form-control" id="nama_user" placeholder="Usename" required=""><br>
	</div></div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="">Password</label>
		<div class="col-sm-10">
		<input type="password" name="password" class="form-control" id="jenis_kelamin" placeholder="Pasword" required=""><br></div></div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="">email</label>
		<div class="col-sm-10">
		<input type="email" name="email" class="form-control" id="email" placeholder="email" required=""><br>
	</div></div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="">Alamat</label>
		<div class="col-sm-10">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat"><br>
	</div></div>


	<div class="form-group">
		<label class="control-label col-sm-2" for="">No Telpon</label>
		<div class="col-sm-10">
		<input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="no_telp"><br>
	</div></div>

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