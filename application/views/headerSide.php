<section>
	<header>
		<nav class="rad-navigation">
			<div class="rad-logo-container rad-nav-min">
				<a href="#" class="rad-logo"><i class=" fa fa-recycle"></i>Menu</a>
				<a href="#" class="rad-toggle-btn pull-right"><i class="fa fa-bars"></i></a>
			</div>
			<a href="#" class="rad-logo-hidden">TTC, STO, & TSO</a>
			<div class="rad-top-nav-container">
				<a href="" class="brand-icon"><i class="fa fa-recycle"></i></a>
				<ul class="pull-right links">
					<li class="rad-dropdown no-color">
						<a class="rad-menu-item" href="#"><img class="rad-list-img sm-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2LXAoyxNs-nyH8grgJmjloWLRd-av20EyiPCV29M-uQKyw3mhjQ" alt="me" /></a>
						<ul class="rad-dropmenu-item sm-menu">
							<li class="rad-notification-item">
								<a class="rad-notification-content lg-text" href="<?php echo base_url();?>auth/logout"><i class="fa fa-power-off"></i> Sign out</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
</section>
<aside>
	<nav class="rad-sidebar rad-nav-min">
		<ul>
			<?php
	            // if ($this->session->userdata('level')=="Administrator"){
	            //     echo "<li><a href='" . base_url() ." class='inbox''><i class='fa fa-dashboard'><span class='icon-bg rad-bg-success'></span></i> <span class='rad-sidebar-item'>Dashboard</span></a></li>";
	            // }
	        ?>
	        <?php
	            // if ($this->session->userdata('level')=="Administrator"){
	            //     echo "<li><a href='" . base_url('main/inputDC') ." class='inbox''><i class='fa fa-map-marker'><span class='icon-bg rad-bg-danger'></span></i> <span class='rad-sidebar-item'>Input Gedung</span></a></li>";
	            // }
	        ?>
	        <?php
	            // if ($this->session->userdata('level')=="Administrator"){
	            //     echo "<li><a href='" . base_url('main/inputFlCap') ." class='inbox''><i class='fa fa-building-o'><span class='icon-bg rad-bg-warning'></span></i> <span class='rad-sidebar-item'>Input Lantai / Gedung</span></a></li>";
	            // }
	        ?>
	        <?php
	            // if ($this->session->userdata('level')=="Administrator"){
	            //     echo "<li><a href='" . base_url('main/inputData') ." class='inbox''><i class='fa fa-table'><span class='icon-bg rad-bg-primary'></span></i> <span class='rad-sidebar-item'>Input Utilization / Lantai</span></a></li>";
	            // }
	        ?>

	        <?php if ($this->session->userdata('level')=="Administrator"): ?>
				<li> 
					<a href="<?php echo base_url();?>" class="inbox">
						<i class="fa fa-dashboard"><span class="icon-bg rad-bg-success"></span></i>
						<span class="rad-sidebar-item">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>main/inputDC">
						<i class="fa fa-map-marker"><span class="icon-bg rad-bg-danger"></span></i>
						<span class="rad-sidebar-item">Input Gedung</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>main/inputFlCap">
						<i class="fa fa-building-o"><span class="icon-bg rad-bg-warning"></span></i>
						<span class="rad-sidebar-item">Input Lantai / Gedung</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>main/inputData">
						<i class="fa fa-table"><span class="icon-bg rad-bg-primary"></span></i>
						<span class="rad-sidebar-item">Input Utilization / Lantai</span>
					</a>
				</li>
				<li> 
					<a href="<?php echo base_url('/request');?>">
						<i class="fa fa-comments"><span class="icon-bg rad-bg-success"></span></i>
						<span class="rad-sidebar-item">Request Infrastructure</span>
					</a>
				</li>
				<li> 
					<a href="<?php echo base_url('/inventory');?>">
						<i class="fa fa-map"><span class="icon-bg rad-bg-danger"></span></i>
						<span class="rad-sidebar-item">Inventory</span>
					</a>
				</li>
			<?php else: ?>
				<li> 
					<a href="<?php echo base_url();?>" class="inbox">
						<i class="fa fa-dashboard"><span class="icon-bg rad-bg-success"></span></i>
						<span class="rad-sidebar-item">Dashboard</span>
					</a>
				</li>
				<li> 
					<a href="<?php echo base_url('/request');?>">
						<i class="fa fa-comments"><span class="icon-bg rad-bg-success"></span></i>
						<span class="rad-sidebar-item">Request Infrastructure</span>
					</a>
				</li>
				<li> 
					<a href="<?php echo base_url('/inventory');?>">
						<i class="fa fa-map"><span class="icon-bg rad-bg-danger"></span></i>
						<span class="rad-sidebar-item">Inventory</span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</nav>
</aside>