<ul class="navbar-nav ml-auto">
	<!-- Navbar Search -->
	<li class="nav-item">
		<a class="nav-link" data-widget="navbar-search" href="javascript:void(0)" role="button">
			<i class="fas fa-search"></i>
		</a>
		<div class="navbar-search-block">
			<form class="form-inline">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
						<button class="btn btn-navbar" type="button" data-widget="navbar-search">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</li>

	<!-- Messages Dropdown Menu -->
	<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
			<i class="far fa-comments"></i>
			<span class="badge badge-danger navbar-badge">3</span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<a href="javascript:void(0)" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
					<img src="<?php echo base_url(); ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
					<div class="media-body">
						<h3 class="dropdown-item-title">
							Brad Diesel
							<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
						</h3>
						<p class="text-sm">Call me whenever you can...</p>
						<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
					</div>
				</div>
				<!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="javascript:void(0)" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
					<img src="<?php echo base_url(); ?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
					<div class="media-body">
						<h3 class="dropdown-item-title">
							John Pierce
							<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
						</h3>
						<p class="text-sm">I got your message bro</p>
						<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
					</div>
				</div>
				<!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="javascript:void(0)" class="dropdown-item">
				<!-- Message Start -->
				<div class="media">
					<img src="<?php echo base_url(); ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
					<div class="media-body">
						<h3 class="dropdown-item-title">
							Nora Silvester
							<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
						</h3>
						<p class="text-sm">The subject goes here</p>
						<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
					</div>
				</div>
				<!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Messages</a>
		</div>
	</li>
	<!-- Notifications Dropdown Menu -->
	<?php

	$this->db->select("*");
	$this->db->where('user_id', currentuserinfo()->id);
	$this->db->where('is_seen', false);
	$this->db->limit(10);  
	$query = $this->db->get('notification');
	$notificationSet = $query->result();


	?>
	<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
			<i class="far fa-bell"></i>
			<span class="badge badge-warning navbar-badge"><?= count($notificationSet); ?></span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<span class="dropdown-item dropdown-header"><?= count($notificationSet); ?> Notifications</span>

			<?php

			if (!empty($notificationSet)) {
				foreach ($notificationSet as $x => $y) {
					$datetime1 = new DateTime();
					$datetime2 = new DateTime($y->added_date);
					$interval = $datetime1->diff($datetime2);
					//pr($interval);
					$elapsed = '';
					if($interval->d > 0){
						$elapsed = $interval->format('%a days');
					}else if($interval->h > 0 && $interval->d == 0){
						$elapsed = $interval->format('%h hours');
					}else if($interval->i > 0 && $interval->h == 0 && $interval->d == 0){
						$elapsed = $interval->format('%i minutes');
					}else if($interval->s > 0 && $interval->i == 0 && $interval->h == 0 && $interval->d == 0){
						$elapsed = $interval->format('%s seconds');
					} 
					
			?>
					<div class="dropdown-divider"></div>
					<a href="<?= base_url().$y->action.'/'.$y->id;?>" class="dropdown-item">
						<i class="fas fa-envelope mr-2"></i> <?= $y->name ?>
						<span class="float-right text-muted text-sm"><?= $elapsed; ?></span>
					</a>
			<?php }
			} ?>


			<div class="dropdown-divider"></div>
			<a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
			<i class="fas fa-expand-arrows-alt"></i>
		</a>
	</li>

	<!-- Notifications Dropdown Menu -->
	<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
			<i class="fa fa-bars"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<span class="dropdown-item dropdown-header">User Setting</span>
			<div class="dropdown-divider"></div>
			<a href="<?= base_url('admin/dashboard/renewable') ?>" class="dropdown-item">
				<i class="fas fa-envelope mr-2"></i> My Renewable
			</a>
			<div class="dropdown-divider"></div>
			<a href="<?= base_url('admin/profile/reset_password') ?>" class="dropdown-item">
				<i class="fas fa-users mr-2"></i>Change Password
			</a>
			<div class="dropdown-divider"></div>
			<a target="_blank" href="https://mail.hostinger.com/" class="dropdown-item">
				<i class="fas fa-file mr-2"></i> Web Email
			</a>
			<div class="dropdown-divider"></div>
			<a href="<?= base_url('admin/logout') ?>" class="dropdown-item">
				<i class="fas fa-file mr-2"></i> Logout
			</a>

		</div>
	</li>
	<!-- Commented for Future Purpose -->
	<!-- <li class="nav-item">
		<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="javascript:void(0)" role="button">
			<i class="fas fa-th-large"></i>
		</a>
	</li> -->
</ul>