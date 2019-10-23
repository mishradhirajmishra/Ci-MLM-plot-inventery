<div class="page-content">
<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>
	
	<?php 
									if($insert_message!=""){
										

									?>
<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>
									<?php echo $insert_message; ?>
</div><?php 

									} ?>
<div class="row">
		<div class="col-xs-12">
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/user/update_profile" role="form">
				

				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Name </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="username" value="<?php echo $info[0]['login_id']  ?>" placeholder="Username" class="col-xs-10 col-sm-5" readonly="readonly">
							
						</div>
				</div>
				
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="name" value="<?php echo $info[0]['user_name'] ?>" placeholder="Customer Name" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('name'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Number </label>

						<div class="col-sm-9">
							<input type="tel" id="form-field-1" name="mobile" value="<?php echo $info[0]['user_phone']?>" placeholder="Mobile Number" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('mobile'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email Id </label>

						<div class="col-sm-9">
							<input type="email" id="form-field-1" name="email" value="<?php echo $info[0]['user_email'] ?>" placeholder="Email ID" class="col-xs-10 col-sm-5">
							<?php echo form_error('email'); ?>
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="address" value="<?php echo $info[0]['user_address'] ?>" placeholder="Your Address" class="col-xs-10 col-sm-5">
							
						</div>
				</div>
				
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Name </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="bankname" value="<?php echo $info[0]['bank_name']; ?>" placeholder="Bank Name" class="col-xs-10 col-sm-5" >
							<?php echo form_error('bankname'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> IFSC Code </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="ifsc" value="<?php echo $info[0]['ifsc'];?>" placeholder="IFSC Code" class="col-xs-10 col-sm-5" >
							<?php echo form_error('ifsc'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account Number </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="acnumber" value="<?php echo $info[0]['account_number'];?>" placeholder="Account Number" class="col-xs-10 col-sm-5" >
							<?php echo form_error('acnumber'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account Holder Name </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="account_name" placeholder="Account Holder Name" value= "<?php echo $info[0]['acholder_name'];?>" class="col-xs-10 col-sm-5" >
							<?php echo form_error('account_name'); ?>
						</div>
				</div>
				
				<div class="space-4"></div>
				<input type="submit" class="btn btn-sm btn-success" value="update" />
				
			</form>
		</div>
	</div>
</div>