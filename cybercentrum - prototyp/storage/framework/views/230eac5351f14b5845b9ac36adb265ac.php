<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $__env->yieldContent('title', 'Dopetrope by HTML5 UP'); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">
			<!-- Header -->
			<section id="header">
				<!-- Logo -->
				<h1><a href="<?php echo e(url('/')); ?>">Dopetrope</a></h1>
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="<?php echo e(url('/')); ?>">Home</a></li>
						<li>
							<a href="#">Dropdown</a>
							<ul>
								<li><a href="#">Lorem ipsum dolor</a></li>
								<li><a href="#">Magna phasellus</a></li>
								<li><a href="#">Etiam dolore nisl</a></li>
								<li>
									<a href="#">Phasellus consequat</a>
									<ul>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam dolore nisl</a></li>
										<li><a href="#">Veroeros feugiat</a></li>
										<li><a href="#">Nisl sed aliquam</a></li>
										<li><a href="#">Dolore adipiscing</a></li>
									</ul>
								</li>
								<li><a href="#">Veroeros feugiat</a></li>
							</ul>
						</li>
						<li><a href="<?php echo e(url('/left-sidebar')); ?>">Left Sidebar</a></li>
						<li><a href="<?php echo e(url('/right-sidebar')); ?>">Right Sidebar</a></li>
						<li><a href="<?php echo e(url('/no-sidebar')); ?>">No Sidebar</a></li>
					</ul>
				</nav>
				<!-- Banner -->
				<section id="banner">
					<header>
						<h2>Howdy. This is Dopetrope.</h2>
						<p>A responsive template by HTML5 UP</p>
					</header>
				</section>
				<!-- Intro -->
				<section id="intro" class="container">
					<?php echo $__env->yieldContent('intro'); ?>
				</section>
			</section>
			<!-- Main -->
			<section id="main">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php echo $__env->yieldContent('content'); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- Footer -->
			<section id="footer">
				<div class="container">
					<?php echo $__env->yieldContent('footer'); ?>
				</div>
			</section>
		</div>
		<!-- Scripts -->
		<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/jquery.dropotron.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/browser.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/breakpoints.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/util.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
	</body>
</html>
<?php /**PATH C:\tools\xampp\htdocs\cybercentrum\resources\views/layouts/master.blade.php ENDPATH**/ ?>