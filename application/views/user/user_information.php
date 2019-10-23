<div class="page-content">
	<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>
	<?php //echo $indirect;print_r($userinfo);?>
	<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<!--<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" 
													src="<?php echo base_url();?>assets/images/avatars/profile-pic.jpg"> -->
													<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" 
													src="<?php echo base_url();?>assets/images/logo.png">
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?php echo $userinfo[0]['user_name'];?></span>
														</a>

														<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
															<li class="dropdown-header"> Change Status </li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle green"></i>
&nbsp;
																	<span class="green">Available</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle red"></i>
&nbsp;
																	<span class="red">Busy</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle grey"></i>
&nbsp;
																	<span class="grey">Invisible</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											

											<div class="hr hr12 dotted"></div>

											<div class="clearfix">
												<div class="grid2">
													<span class="bigger-175 blue">
													<?php Echo $direct;?></span>

													<br>
													Direct Entries
												</div>

												<div class="grid2">
													<span class="bigger-175 blue"><?php Echo $indirect;?></span>

													<br>
													In Direct Entries
												</div>
											</div>

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9" >
											<div class="center" style="display:none;">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br>
													<span class="line-height-1 smaller-90"> Views </span>
												</span>

												<span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br>
													<span class="line-height-1 smaller-90"> Followers </span>
												</span>

												<span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br>
													<span class="line-height-1 smaller-90"> Projects </span>
												</span>

												<span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br>
													<span class="line-height-1 smaller-90"> Reviews </span>
												</span>

												<span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br>
													<span class="line-height-1 smaller-90"> Albums </span>
												</span>

												<span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br>
													<span class="line-height-1 smaller-90"> Contacts </span>
												</span>
											</div>

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username" style="display: inline;text-transform: capitalize;"><?php echo $userinfo[0]['user_name'];?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Location </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable editable-click" id="country" style="display: inline;"><?php echo $userinfo[0]['user_address'];?></span>
														
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Phone </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age"><?php echo $userinfo[0]['user_phone'];?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Joined </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="signup" style="display: inline;"><?php echo $userinfo[0]['date'];?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> User Id </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="login" style="display: inline;"><?php echo $userinfo[0]['user_id'];?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Email </div>

													<div class="profile-info-value">
														<span class="editable editable-click" style="display: inline;"><?php echo $userinfo[0]['user_email'];?></span>
													</div>
												</div>
											</div>

											<div class="space-20"></div>


											<div class="hr hr2 hr-double"></div>

											<div class="space-6"></div>

											
										</div>
									</div>
</div>