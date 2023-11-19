<div class="sidebar">
	<!-- Sidebar user panel (optional) -->
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
			<img src="<?php echo base_url(); ?>dist/images/logo.png" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
			<a href="javascript:void(0)" class="d-block"><?php echo currentuserinfo()->first_name . ' ' . currentuserinfo()->last_name; ?></a>
		</div>
	</div>

	<!-- SidebarSearch Form -->
	<div class="form-inline">
		<div class="input-group" data-widget="sidebar-search">
			<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-sidebar">
					<i class="fas fa-search fa-fw"></i>
				</button>
			</div>
		</div>
	</div>

	<?php
	$uri1 = @uri_segment(1);
	$uri2 = @uri_segment(2);
	$uri3 = @uri_segment(3);
	?>
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<!-- menu-open -->
			<li class="nav-header">Dashboard</li>
			<li class="nav-item <?php if ($uri1 == 'master') {
									echo 'menu-open';
								} ?> ">
				<a href="javascript:void(0)" class="nav-link">
					<i class="nav-icon fas fa-copy"></i>
					<p>
						Master
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					
					<li class="nav-item <?php if ($uri1 == 'master' && $uri2 == 'state') {
											echo 'menu-open';
										} ?>">
						<a href="<?= base_url('/master/state'); ?>" class="nav-link  <?php if ($uri1 == 'master' && $uri2 == 'state') {
											echo 'menu-open active';
										} ?> ">
							<i class="far fa-circle nav-icon"></i>
							<p>State Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/state/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'state' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/state') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'state' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item <?php if ($uri1 == 'master' && $uri2 == 'city') {
											echo 'menu-open';
										} ?>">
						<a href="<?= base_url('master/city') ?>" class="nav-link  <?php if ($uri1 == 'master' && $uri2 == 'city') {
											echo 'active';
										} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>City Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/city/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'city' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/city') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'city' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>

					</li>

					<li class="nav-item <?php if ($uri1 == 'master' && $uri2 == 'tax_slab') {
											echo 'menu-open';
										} ?>">
						<a href="<?= base_url('master/tax_slab') ?>" class="nav-link <?php if ($uri1 == 'master' && $uri2 == 'tax_slab') {
											echo 'active';
										} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>GST Tax Slab Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/tax_slab/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'tax_slab' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/tax_slab') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'tax_slab' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item <?php if ($uri1 == 'master' && $uri2 == 'item') {
											echo 'menu-open active';
										} ?>">
						<a href="<?= base_url('master/item') ?>" class="nav-link <?php if ($uri1 == 'master' && $uri2 == 'item') {
											echo 'active';
										} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>Item Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/item/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'item' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/item') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'item' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('master/party_type') ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Party Type Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/party_type/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'party_type' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/party_type') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'party_type' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('master/center') ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Center's Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/center/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'center' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/center') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'center' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('master/company') ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Company Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/company/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'company' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/company') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'company' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('master/gst_state_code') ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>GST State Code Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/gst_state_code/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'gst_state_code' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Add</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('master/gst_state_code') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'gst_state_code' && empty($uri3)) {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Listing</p>
								</a>
							</li>
						</ul>
					</li>

				</ul>
			</li>
			<li class="nav-item <?php if ($uri1 == 'admin' && $uri2 == 'user') {
									echo 'menu-open';
								} ?> ">
				<a href="javascript:void(0)" class="nav-link">
					<i class="nav-icon far fa-plus-square"></i>
					<p>
						User Management
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item ">
						<a href="<?= base_url('admin/user/add') ?>" class="nav-link 
								<?php if ($uri1 == 'admin' && $uri2 == 'user' && $uri3 == 'add') {
									echo 'active';
								} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>
								Login & Register v1
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/login.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Login v1</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/register.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Register v1</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item <?php if ($uri1 == 'master' && $uri2 == 'party_type') {
											echo 'menu-open active';
										} ?>">
						<a href="<?= base_url('master/item') ?>" class="nav-link <?php if ($uri1 == 'master' && $uri2 == 'party_type') {
											echo 'active';
										} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>Party Type Master</p>
							<i class="fas fa-angle-left right"></i>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item ">
								<a href="<?= base_url('master/party_type/add') ?>" class="nav-link 
								<?php if ($uri1 == 'master' && $uri2 == 'party_type' && $uri3 == 'add') {
									echo 'active';
								} ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Forgot Password v1</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/recover-password.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Recover Password v1</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('master/center') ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>
								Login & Register v2
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/login-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Login v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/register-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Register v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/forgot-password-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Forgot Password v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/recover-password-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Recover Password v2</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="pages/examples/lockscreen.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Lockscreen</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('admin/user') ?>" class="nav-link 
								<?php if ($uri1 == 'admin' && $uri2 == 'user' && empty($uri3)) {
									echo 'active';
								} ?>">
							<i class="far fa-circle nav-icon"></i>
							<p>Listing</p>
						</a>
					</li>
				</ul>
			</li>

		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>