<section class="container tm-home-section-1" id="more" style="min-height: 85.6vh;">
	<div class="row">
		<div class="section-margin-top about-section">
			<div class="row">
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2 class="tm-section-title">Pesanan anda</h2>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
				</div>
			</div>
			<div class="row">
				<table width="100%" class="table table-striped">
					<thead>
						<th>No</th>
						<th>Event</th>
						<th>Tanggal Pesan</th>
						<th>Jumlah Tiket</th>
						<th>Total Harga</th>
						<th>Pembayaran</th>
					</thead>
					<tbody>

						<?php $no = 1;
						foreach ($pembayaran as $key) {
							if ($key->id_user == $_SESSION['id_user']) {
						?>
								<tr>
									<td><?php echo $no; ?></td>
									<!-- <td>Kickfest</td> -->
									<td><?php echo $key->nama_event; ?></td>
									<td><?php echo $key->data_dibuat; ?></td>
									<td><?php echo number_format($key->jumlah_beli); ?></td>
									<td>Rp <?php echo number_format($key->total_harga); ?></td>
									<td>
										<?php if ($key->status == 0) { ?>
											<button class="btn btn-danger">
												belum bayar
											</button>
										<?php } else { ?>
											<button class="btn btn-success">
												Sudah bayar
											</button>
									<?php }
										$no++;
									} ?>
									</td>
								</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
</section>

<!-- white bg -->
<!-- <section class="tm-white-bg section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">What we do</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
				Testimonial
				<div class="col-lg-12">
					<div class="tm-what-we-do-right">
						<div class="tm-about-box-2 margin-bottom-30">
							<img src="<?= site_url() ?>/assets/frontend/img/about-2.jpg" alt="image" class="tm-about-box-2-img">
							<div class="tm-about-box-2-text">
								<h3 class="tm-about-box-2-title">Gravida Nibh Vel Velit Auctor Aliquet Etiam</h3>
				                <p class="tm-about-box-2-description gray-text">Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis.</p>
				                <p class="tm-about-box-2-footer">Mauris In Erat Justo</p>	
							</div>		                
						</div>
						<div class="tm-about-box-2">
							<img src="<?= site_url() ?>/assets/frontend/img/about-3.jpg" alt="image" class="tm-about-box-2-img">
							<div class="tm-about-box-2-text">
								<h3 class="tm-about-box-2-title">Sed Non Mauris Vitae Erat Con Ruat Nostra</h3>
				                <p class="tm-about-box-2-description gray-text">Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis.</p>
				                <p class="tm-about-box-2-footer">Sednon Mauris Vitae</p>	
							</div>		                
						</div>
					</div>
					<div class="tm-testimonials-box">
						<h3 class="tm-testimonials-title">Testimonials</h3>
						<div class="tm-testimonials-content">
							<div class="tm-testimonial">
								<p>"Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum."</p>
		                		<strong class="text-uppercase">John Smith</strong>	
							</div>
							<div class="tm-testimonial">
								<p>"Nisi elit consequat ipsum, nec sagittis sem nibh id elit duis sed odio sit amet nibh."</p>
			                	<strong class="text-uppercase">Lorens</strong>		
							</div>
	       					<div class="tm-testimonial">
	       						<p>"Rulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio."<p>
	                			<strong class="text-uppercase">Robert</strong>
	       					</div>                	
						</div>
					</div>	
				</div>							
			</div>			
		</div>
	</section> -->