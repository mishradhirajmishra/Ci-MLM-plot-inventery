
<style>
    label.label {
        margin-left: 18%;
        margin-top: 2.5%;
        font-size: 15px;
        vertical-align: bottom;
        font-stretch: 48px;
    }
                label {
    margin-top: 5px;
}
</style>
	<div class="page-content">
		<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		</div>
	<?php if($msg==1){ ?>
        <div class="alert alert-success">
            <strong>Success!</strong> One Record inserted.
        </div>
    <?php } ?>

        </div>
        	    	<div class="row">
		    	<div class="col-xs-12">
		    	    <?php  $attributes = array('method' => 'post'); echo form_open('admin/sector',$attributes );?>
				    <div class="form-group">
						 <div class="col-xs-3" style="text-align: right; "><label class="" for="form-field-1"> Block </label></div>
							 <div class="col-xs-4" ><input type="text" style=" margin-left: 10%;"  name="sec_name"  required="required"></div>
                     <div class="col-xs-5" >&nbsp;&nbsp;&nbsp;<input type="submit"  class="btn btn-sm btn-success" value="Add Block" /></div>
					</div>
			        </form>
		    	</div>
			</div>
			<br><br>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr><td>Block Id </td><td>Block Name</td></tr>
            </thead>
            <tbody>
            <?php foreach ( $all_sec as $row) { ?>
            <tr><td>   <?php echo $row['sec_id']?></td><td><?php echo $row['sec_name']?></td></tr>
            <?php }?>
            </tbody>
        </table>
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