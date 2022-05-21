<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking ticket</title>
	<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<link href="<?= site_url() ?>/assets/frontend/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>/assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>/assets/frontend/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>/assets/frontend/css/flexslider.css" rel="stylesheet">
	<link href="<?= site_url() ?>/assets/frontend/css/templatemo-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="tm-gray-bg">
	<!-- Header -->
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
					<a href="<?= base_url(); ?>" class="tm-site-name" style="font-family: forte;font-size: 35px;">AYO KONSER
					</a>
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="tm-nav">
						<ul>
							<li><a href="<?= site_url() ?>">Home</a></li>
							<li><a href="<?= site_url() ?>index.php/frontend/about">About</a></li>

							<?php if (!$this->session->userdata('logged_in')) : ?>
								<li><a href="<?= site_url() ?>index.php/user/login">Login</a></li>
							<?php endif; ?>
							<?php if ($this->session->userdata('logged_in')) : ?>
								<li><a href="<?= site_url() ?>index.php/frontend/pesanan">Pesanan Kamu</a></li>
								<li><a href="<?= site_url() ?>index.php/user/logout" id="logout">Logout</a></li>
							<?php endif; ?>

						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>