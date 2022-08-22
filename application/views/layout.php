<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= (isset($title)) ? $title :  WEBSITE_NAME; ?></title>

	<!-- Head Link Attachement -->
	<?php $this->load->view('content/head_ref') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<!-- Script -->
	<?php $this->load->view('content/script') ?>
	<!-- Script -->
	
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark">
			<!-- Left navbar links -->
			<?php $this->load->view('content/left_nav') ?>

			<!-- Right navbar links -->
			<?php $this->load->view('content/right_nav') ?>


		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<?php $this->load->view('content/sidebar') ?>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?php if (@$breadcum != '') { ?>
				<div class="content-header">
					<div class="container-fluid">
						<?php echo get_flashdata(); ?>
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0"><?php echo $page_title; ?></h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<?php

									if (@$breadcum != '') {
										foreach (@$breadcum as $b_key => $b_val) {
											if ($b_key != '') { ?>
												<li class="breadcrumb-item"> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a></li>
											<?php } else if ($b_key == '') { ?>
												<li class="breadcrumb-item active"> <?= $b_val ?> </li>
									<?php }
										}
									} ?>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
			<?php } ?>
			<!-- /.content-header -->

			<!-- Main Content -->
			<?php $this->load->view($page) ?>
			<!-- Main Content -->

		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Footer -->
		<?php $this->load->view('content/footer') ?>
		<!-- Footer -->
		
	</div>
	<!-- ./wrapper -->

	
</body>

</html>