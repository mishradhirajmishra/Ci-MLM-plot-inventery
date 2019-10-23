<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Starview Infratech Pvt.Ltd.</title>
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
		    <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
            div#ace-settings-container {
                visibility: hidden !important;
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
						Star View Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo base_url();?>index.php/admin/change_password">
										<i class="ace-icon fa fa-cog"></i>
										Change Password
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
						<a href="<?php echo base_url();?>index.php/admin">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
                    <li class="" >
						<a href="<?php echo base_url();?>index.php/admin/download_backup">
							<i class="menu-icon fa fa-download"></i>
							<span class="menu-text"> Download Backup </span>
						</a>

						<b class="arrow"></b>
					</li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/Sector">
                            <i class="menu-icon fa fa-user-secret"></i>
                            <span class="menu-text">Block </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/plot">
                            <i class="menu-icon fa fa-paper-plane-o"></i>
                            <span class="menu-text">Plot </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/bookedplot">
                            <i class="menu-icon fa fa-plus-square"></i>
                            <span class="menu-text">Booked Plot </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/abhplot">
                            <i class="menu-icon fa fa-plus-square-o"></i>
                            <span class="menu-text">Available Plot </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="" style="    display: none;">
						<a href="<?php echo base_url();?>index.php/admin/user_tree">
							<i class="menu-icon fa fa-gear"></i>
							<span class="menu-text"> User Genealogy </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url();?>index.php/admin/change_password">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<b class="arrow"></b>

							<li class="">
								<a href="<?php echo base_url();?>index.php/admin/new_user">
									<i class="menu-icon fa fa-user"></i>
									Add New User
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url();?>index.php/admin/all_user">
									<i class="menu-icon fa fa-users"></i>
									All User
								</a>

								<b class="arrow"></b>
							</li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/all_user_commission">
                            <i class="menu-icon fa fa-users"></i>
                            All User Commission
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/commission_history">
                            <i class="menu-icon fa fa-users"></i>
                           Commission History
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/all_user_stallment">
                            <i class="menu-icon fa fa-users"></i>
                            All User Installment
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/installment_report">
                            <i class="menu-icon fa fa-users"></i>
                            Installment Report
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/admin/report">
                            <i class="menu-icon fa fa-users"></i>
                            Report
                        </a>

                        <b class="arrow"></b>
                    </li>
					</li>
					


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
							<li class="active"><?php echo $page_name?></li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search" style="display:none">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>