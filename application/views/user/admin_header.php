<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - User Admin</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/logo.png">
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>
		
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		    form.form-search {
             display: none;
             }

div#breadcrumbs {
    display: none;
}
		</style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url();?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
						Star View User Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav" >
						<?php $imgurl=base_url().'uploads/'.$this->session->userdata('user_id').'.jpg';?>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" 	src="<?php echo $imgurl;?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li>
									<a href="<?php echo base_url();?>index.php/user/update_profile_info">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url();?>index.php/login/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<img  style="width:80px" src="<?php echo base_url();?>assets/images/logo.png">

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo base_url();?>index.php/user">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url();?>index.php/user/commissionmade">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Commission</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url();?>index.php/user/installment">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Installment</span>
						</a>

						<b class="arrow"></b>
					</li>
<!--					<li class="">
						<a href="<?php // echo base_url();?>index.php/user/total_incentive">
							<i class="menu-icon fa fa-rupee"></i>
							<span class="menu-text"> Total Incentive</span>
						</a>

						<b class="arrow"></b>
					</li>-->
					
<!--					<li class="">
						<a href="<?php // echo base_url();?>index.php/user/user_tree">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> User Genealogy </span>
						</a>

						<b class="arrow"></b>
					</li>-->
					
<!--					<li class="">
						<a href="<?php // echo base_url();?>index.php/user/payment">
							<i class="menu-icon fa fa-rupee"></i>
							<span class="menu-text"> Payment History </span>
						</a>

						<b class="arrow"></b>
					</li>-->
					<li class="">
						<a href="<?php echo base_url();?>index.php/user/genealogy/<?php echo $_SESSION ['user_id'] ?>">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> User Genealogy </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url();?>index.php/user/update_profile_info">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> Update Profile</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url();?>index.php/user/change_password">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>