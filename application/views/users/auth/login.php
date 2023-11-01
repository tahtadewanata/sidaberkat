
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>material/assets/img/apple-icon.png">
	<link href="<?php echo base_url();?>/assets/img/log.png" rel="icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Login PPKS
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!-- Extra details for Live View on GitHub Pages -->
	<!-- Canonical SEO -->
	<link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
	<!--  Social tags      -->
	<meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
	<meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Material Dashboard PRO by Creative Tim">
	<meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
	<meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="product">
	<meta name="twitter:site" content="@creativetim">
	<meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
	<meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
	<meta name="twitter:creator" content="@creativetim">
	<meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
	<!-- Open Graph data -->
	<meta property="fb:app_id" content="655968634437471">
	<meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html" />
	<meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
	<meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
	<meta property="og:site_name" content="Creative Tim" />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="<?= base_url();?>material/assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?= base_url();?>material/assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="off-canvas-sidebar">
	<!-- Extra details for Live View on GitHub Pages -->
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
		<div class="container">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="#pablo">Login PPKS</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?= base_url();?>" class="nav-link">
							<i class="material-icons">dashboard</i> Beranda
						</a>
					</li>
					<li class="nav-item  active ">
						<a href="<?= base_url();?>admin" class="nav-link">
							<i class="material-icons">fingerprint</i> Login
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
	<div class="wrapper wrapper-full-page">
		<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?= base_url();?>assets/login/images/bg-01.jpg'); background-size: cover; background-position: top center;">
			<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
						<form class="form" action="<?php echo site_url('auth/validatelogin'); ?>" method="post">
							<div class="card card-login card-hidden">
								<div class="card-header card-header-rose text-center">
									<h4 class="card-title">Login</h4>
									<div class="social-line">
										<a href="https://www.facebook.com/dinaskominfo.kabnganjuk" class="btn btn-just-icon btn-link btn-white">
											<i class="fa fa-facebook-square"></i>
										</a>
										<a href="https://www.instagram.com/dinaskominfo_nganjuk/" class="btn btn-just-icon btn-link btn-white">
											<i class="fa fa-instagram"></i>
										</a>
										<a href="https://www.nganjukkab.go.id" class="btn btn-just-icon btn-link btn-white">
											<i class="fa fa-globe"></i>
										</a>
									</div>
								</div>
								<div class="card-body ">
									<span class="bmd-form-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">face</i>
												</span>
											</div>
											<input type="text" class="form-control" name="username" placeholder="User name">
										</div>
									</span>
									<span class="bmd-form-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">lock_outline</i>
												</span>
											</div>
											<input type="password" class="form-control" name="password" placeholder="Password">
										</div>
									</span>
								</div>
								<div class="card-footer justify-content-center">
									<button class="btn btn-rose" type="submit" name="submit" value="login">
										<i class="material-icons">key</i> LOGIN
										<div class="ripple-container"></div>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container">
					<nav class="float-left">
						<ul>
							<li>
								<a href="https://www.nganjukkab.go.id">
									PING
								</a>
							</li>
							<li>
								<a href="https://ppid.nganjukkab.go.id">
									PPID
								</a>
							</li>
							<li>
								<a href="http://jdih.nganjukkab.go.id">
									JDIH
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright float-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>, Dikembangkan Oleh
						<a href="https://www.nganjukkab.go.id" target="_blank">Dinas Komunikasi dan Informatika</a> Kabupaten Nganjuk.
					</div>
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="<?= base_url();?>material/assets/js/core/jquery.min.js"></script>
	<script src="<?= base_url();?>material/assets/js/core/popper.min.js"></script>
	<script src="<?= base_url();?>material/assets/js/core/bootstrap-material-design.min.js"></script>
	<script src="<?= base_url();?>material/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Chartist JS -->
	<script src="<?= base_url();?>material/assets/js/plugins/chartist.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="<?= base_url();?>material/assets/js/plugins/bootstrap-notify.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?= base_url();?>material/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?= base_url();?>material/assets/demo/demo.js"></script>
	<script>
		$(document).ready(function() {
			$().ready(function() {
				$sidebar = $('.sidebar');

				$sidebar_img_container = $sidebar.find('.sidebar-background');

				$full_page = $('.full-page');

				$sidebar_responsive = $('body > .navbar-collapse');

				window_width = $(window).width();

				fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

				if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
					if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
						$('.fixed-plugin .dropdown').addClass('open');
					}

				}

				$('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
					if ($(this).hasClass('switch-trigger')) {
						if (event.stopPropagation) {
							event.stopPropagation();
						} else if (window.event) {
							window.event.cancelBubble = true;
						}
					}
				});

				$('.fixed-plugin .active-color span').click(function() {
					$full_page_background = $('.full-page-background');

					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('color');

					if ($sidebar.length != 0) {
						$sidebar.attr('data-color', new_color);
					}

					if ($full_page.length != 0) {
						$full_page.attr('filter-color', new_color);
					}

					if ($sidebar_responsive.length != 0) {
						$sidebar_responsive.attr('data-color', new_color);
					}
				});

				$('.fixed-plugin .background-color .badge').click(function() {
					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('background-color');

					if ($sidebar.length != 0) {
						$sidebar.attr('data-background-color', new_color);
					}
				});

				$('.fixed-plugin .img-holder').click(function() {
					$full_page_background = $('.full-page-background');

					$(this).parent('li').siblings().removeClass('active');
					$(this).parent('li').addClass('active');


					var new_image = $(this).find("img").attr('src');

					if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						$sidebar_img_container.fadeOut('fast', function() {
							$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
							$sidebar_img_container.fadeIn('fast');
						});
					}

					if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						$full_page_background.fadeOut('fast', function() {
							$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
							$full_page_background.fadeIn('fast');
						});
					}

					if ($('.switch-sidebar-image input:checked').length == 0) {
						var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
						$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
					}

					if ($sidebar_responsive.length != 0) {
						$sidebar_responsive.css('background-image', 'url("' + new_image + '")');
					}
				});

				$('.switch-sidebar-image input').change(function() {
					$full_page_background = $('.full-page-background');

					$input = $(this);

					if ($input.is(':checked')) {
						if ($sidebar_img_container.length != 0) {
							$sidebar_img_container.fadeIn('fast');
							$sidebar.attr('data-image', '#');
						}

						if ($full_page_background.length != 0) {
							$full_page_background.fadeIn('fast');
							$full_page.attr('data-image', '#');
						}

						background_image = true;
					} else {
						if ($sidebar_img_container.length != 0) {
							$sidebar.removeAttr('data-image');
							$sidebar_img_container.fadeOut('fast');
						}

						if ($full_page_background.length != 0) {
							$full_page.removeAttr('data-image', '#');
							$full_page_background.fadeOut('fast');
						}

						background_image = false;
					}
				});

				$('.switch-sidebar-mini input').change(function() {
					$body = $('body');

					$input = $(this);

					if (md.misc.sidebar_mini_active == true) {
						$('body').removeClass('sidebar-mini');
						md.misc.sidebar_mini_active = false;

						$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

					} else {

						$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

						setTimeout(function() {
							$('body').addClass('sidebar-mini');

							md.misc.sidebar_mini_active = true;
						}, 300);
					}

          // we simulate the window Resize so the charts will get updated in realtime.
					var simulateWindowResize = setInterval(function() {
						window.dispatchEvent(new Event('resize'));
					}, 180);

          // we stop the simulation of Window Resize after the animations are completed
					setTimeout(function() {
						clearInterval(simulateWindowResize);
					}, 1000);

				});
			});
});
</script>

<script>
	$(document).ready(function() {
		md.checkFullPageBackgroundImage();
		setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
			$('.card').removeClass('card-hidden');
		}, 700);
	});
</script>
</body>

</html>