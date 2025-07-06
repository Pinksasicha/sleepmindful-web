<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?php echo base_url(); ?>" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<?php echo $template['metadata']; ?>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bower_components/swiper/dist/css/swiper.min.css" />
	<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
	<link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" />
	<link rel="stylesheet" href="assets/js/sweetalert/sweetalert.css" />
	<link rel="stylesheet" href="assets/css/stylesheet.css" />
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="bower_components/swiper/dist/js/swiper.min.js"></script>
	<script src="bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="assets/js/sweetalert/sweetalert.min.js"></script>
	<script src="assets/js/script.js"></script>
	<title><?php echo $template['title']; ?>
	</title>
</head>

<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-md">
				<button class="navbar-toggler collapsed" type="button">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<!-- <small class="navbar-brand" href="home">SleepMindFul<small>LOGO MOCKUP</small></a> -->
				<a class="navbar-brand" href="home"><img src="assets/images/Desktop/SleepMindFul_Header.png" alt="SleepMindFul_Header"></a>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item<?php echo menu_front_active('home'); ?>"><a class="nav-link" href="home">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="users/referral">Referral Form</a></li>
						<li class="nav-item<?php echo menu_front_active('aboutus'); ?>"><a class="nav-link" href="aboutus">About us</a></li>
						<li class="nav-item"><a class="nav-link" href="users/history">Check your symptoms</a></li>
						<?php if (!is_login()): ?>
						<li class="nav-item<?php echo menu_front_active('users'); ?>"><a class="nav-link" href="login">Login</a></li>
						<?php endif; ?>
						<li class="nav-item<?php echo menu_front_active('posts'); ?>"><a class="nav-link" href="news">News</a></li>
						<li class="nav-item<?php echo menu_front_active('blogs'); ?>"><a class="nav-link" href="blog">Blog</a></li>
						<?php if (is_login()): ?>
						<li class="nav-item"><a class="nav-link" href="logout">Logout</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="navbar-contact">
					<a href="tel:+6623103000">Tel.+662-310-3000</a>&nbsp;&nbsp;
					<a href="mailto:user@mail.com">e-mail user@mail.com</a>
				</div>
			</nav>
		</div>
	</header>
	<?php echo $template['body']; ?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-body">
						<div class="footer-logo">
							<!-- SleepMindFul
							<small>LOGO MOCKUP</small> -->
							<img src="assets/images/Desktop/SleepMindFul_Footer.png" alt="SleepMindFul_Footer">
						</div>

						<h3>Headoffice</h3>
						<ul class="address">
							<li>user@mail.com</li>
							<li>091-a123-4567</li>
							<li>12/3 Company Name Soi 2 Street 3 Bangkok 10400</li>
						</ul>

					</div>
				</div>
				<div class="col-lg-6 d-none d-lg-block">
					<div class="footer-map">
						<img class="img-max" src="assets/images/map.jpg">
					</div>
				</div>
			</div>
		</div>
		<img class="map d-block d-lg-none" src="assets/images/map-mobile.jpg">
		<div class="copyright">
			<div class="container">Copyright 2019 by SleepMindFul</div>
		</div>
	</footer>
	<div class="mobile-menu d-block d-md-none">
		<div class="mm-group">
			<div class="nav-header">
				<button class="navbar-toggler" type="button">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<!-- <small class="navbar-brand" href="home">SleepMindFul<small>LOGO MOCKUP</small></a> -->
				<a class="navbar-brand" href="home"><img src="assets/images/Desktop/SleepMindFul_Header.png" alt="SleepMindFul_Header"></a>

			</div>
			<ul class="nav-menu">
				<li <?php echo menu_active('home'); ?>><a href="home">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="users/referral">Referral Form</a></li>
				<li <?php echo menu_active('aboutus'); ?>><a href="aboutus">About us</a></li>
				<li><a href="check-your-symptoms">Check your symptoms</a></li>
				<?php if (!is_login()): ?>
				<li <?php echo menu_active('users'); ?>><a href="login">Login</a></li>
				<?php endif; ?>
				<li <?php echo menu_active('posts'); ?>><a href="news">News</a></li>
				<li <?php echo menu_active('blogs'); ?>><a href="blog">Blog</a></li>
				<?php if (!is_login()): ?>
				<li><a href="logout">Logout</a></li>
				<?php endif; ?>
			</ul>
			<div class="nav-footer">Tel. +662-310-3000 e-mail user@mail.com</div>
		</div>
	</div>


</body>

</html>