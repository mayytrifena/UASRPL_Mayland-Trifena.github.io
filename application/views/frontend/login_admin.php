	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>MASUK ADMIN</h1>
						</div>
						<?php echo form_open('index.php/admin/login'); ?>
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
								<button class="submit-btn" type="submit">Login</button>
							</div>
							<br>
							<?php echo form_close(); ?>
								<a href="<?=site_url()?>index.php/frontend"><< Kembali</a>
							</center>
					</div>
				</div>
			</div>
		</div>
	</div>
