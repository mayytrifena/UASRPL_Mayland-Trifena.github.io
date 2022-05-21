	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Daftar Disini</h1>
						</div>
						<?php echo form_open('index.php/user/register'); ?>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Username</span>
										<input class="form-control" name="username" type="text" placeholder="Masukkan Username">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Password</span>
										<input class="form-control" name="password" type="password" placeholder="Masukkan Password">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" name="email" placeholder="Masukkan Email">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Nomor Telpon</span>
										<input class="form-control" type="number" name="no_telp" placeholder="Masukkan Nomor Telpon">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<span class="form-label">Alamat</span>
										<input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat">
									</div>
								</div>
							</div>
							<center><div class="form-btn" style="width: 200px"> 
								<button class="submit-btn">Register</button>
							</div>
							<br>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>