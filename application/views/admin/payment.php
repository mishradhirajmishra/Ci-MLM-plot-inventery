
	<div class="page-content">
		<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		<a style="float: right; margin-top: -35px;" href="http://localhost/starswin//index.php/admin/print_payemnt" class="btn btn-info" role="button">Print Payment </a>
		</div>
	<?php	if($insert_message!=" "){
										

									?>
<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>
									<?php echo $insert_message; ?>
									
</div><?php } ?>
		<div class="row">
			<div class="col-xs-12">
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/receive_payment" role="form">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User ID </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="userid" value="<?php echo set_value('userid'); ?>" placeholder="User Id" class="col-xs-10 col-sm-5" required="required">
							<?php //echo validation_errors();
							echo form_error('userid'); ?>
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount </label>

						<div class="col-sm-9">
							<input type="number" id="form-field-1" name="amount" value="<?php echo set_value('amount'); ?>" placeholder="Amount" class="col-xs-10 col-sm-5" required="required">
							<?php //echo validation_errors();
							echo form_error('amount'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<input type="submit" class="btn btn-sm btn-success" value="Receive Payment" />

				</form>
			</div>
		</div>
<div class="row">
<h4 class="text-center">List of New Recieve Payment</h4>
	<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																Sno
																<span class="lbl"></span>
															</label>
														</th>
														
														<th class="hidden-480">User Name</th>
														
														<th>Payment Amount</th>
														

														<th>Payment Date</th>
														<th> Action</th>
													</tr>
												</thead>

												<tbody>
<?php //print_r($newpay);?>
<?php $i=1;


foreach($newpay as $row){ ?>
<tr>
<td id="id" class="hidden"><?php echo $row['payment_id'];?></td>
<td ><?php echo $i; ?></td>
<td><?php echo $row['user_name'];?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['payment_date'];?></td>
<td >
<?php if($row['edited']==0){ ?>
<a href="#mymodal" id="edit1" role="button" class="btn bta-primary btn-sm white" onclick="edit_payment(<?php echo $row['payment_id'].','.$row['user_id'];?>);" data-toggle="modal">
									Edit
								</a></td>
								<?php } else echo "Allready Edited";?>
</tr>
<?php $i++;} ?>
												</tbody>
											</table>
										</div>

</div>
	</div>
<div id="mymodal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">
												Carefull you are editing Payment</h3>
											</div>
 
											<div class="modal-body" id="asdf">
											
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
<script type="text/javascript">

jQuery("#edit1").click(function(event){
        event.preventDefault();
    });
function edit_payment(a = '',b=''){
	//alert(a);
	$.ajax({
						url:'<?php echo base_url();?>index.php/admin/edit_payment/'+a+'/'+b,
						type:'POST',
						success: function(response)
						{
							
							$("#asdf").html(response);
						}
						
						 });
}
</script>