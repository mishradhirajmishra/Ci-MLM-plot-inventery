<style>
    label {
    margin-top: 5px;
}
   #frm{
    border: 1px solid gray;
    padding: 20px;
    border-radius: 27px;
}
</style>
	<div class="page-content">
		<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		</div>
	
		<div class="row">
			<div class="col-xs-12">
			<div id="message">
			    			  			<?php if( $this->session->flashdata('item')){ ?>
											<div class="alert alert-warning">
                                                <?php echo $this->session->flashdata('item'); ?>                                                
                                           </div>
                                        <?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3" id="frm">
			    <?php echo form_open('admin/update_password')?>
			
				<div class="form-group">
				 <label  control-label no-padding-right" for="form-field-1"> New Password </label>
				<input type="password" id="new_password" name="new_password" value="" placeholder="New Password" required="required" class="form-control">

			    </div>
				<div class="space-4"></div>
				
		        <input type="submit" class="btn btn-sm btn-success" value="Update Password" class="form-control" />
				
				</form>
				</div>
			</div>
		</div>
		<!--___________________________________-->
		<!--_______________________________________-->

	</div>
<script type="text/javascript">
	jQuery(function($){

				$("#changepassword").submit(function(event){
					event.preventDefault();
					var baseurl ="http://localhost/irmlm/";
					
					if($("#password").val()===$("#new_password").val()){
						
				
					$.ajax({
						url:'http://localhost/starswin//index.php/admin/update_password',
						type:'POST',
						data:{
							
							password: $("#password").val()
						},
						
						success: function(response)
						{
							
							//var message1=JSON.parse(response);
							
							console.log(response);
							$("#message").html('<div class="alert alert-success alert-dismissible" role="alert">'+
					  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					  	response+
					'</div>');

						$(".text-danger").remove();
						$(".form-group").removeClass('has-error').removeClass('has-success');
							//$("#message").html(message1.message);
						}
						
					})
}else{alert("Password Mismatch");}
				})
	
			})
</script>