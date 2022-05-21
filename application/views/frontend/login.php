	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
			<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
			<?php endif; ?>
						<div class="form-header">
							<h1>Masuk Disini</h1>
						</div>
						<?php echo form_open('index.php/user/login'); ?>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Username</span>
										<input class="form-control" type="text" name="username" placeholder="Enter Username">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Password</span>
										<input class="form-control" type="password" name="password" placeholder="Enter Password">
									</div>
								</div>
							</div>
							<center><div class="form-btn" style="width: 200px"> 
								<button class="submit-btn">Login</button>
							</div>
							<br>
						<?php echo form_close(); ?>
								Tidak punya akun, <a href="<?=site_url()?>index.php/user/register">Daftar disini</a><br>
								<a href="<?=site_url()?>index.php/frontend"><< Kembali</a>
							</center>
					</div>
				</div>
			</div>
		</div>
	</div>
