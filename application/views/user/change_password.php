<style>
    .col-sm-6.col-sm-offset-3.frm {
    border: 1px solid gray;
    padding: 20px;
    border-radius: 15px;
}
</style>
	<div class="page-content">
		<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		</div>
	
		<div class="row">
			<div class="col-xs-12">
			<div id="message"></div>
			<div class="col-sm-6 col-sm-offset-3 frm">
				<form class="form-horizontal" method="post" action="" role="form" id="changepassword">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> New Password </label>

						<div class="col-sm-9">
							<input type="password" id="new_password" name="new_password" value="" placeholder="New Password" class="form-control" required="required">
							
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Confirm Password </label>

						<div class="col-sm-9">
							<input type="text" id="password" name="confirm_password" value="" placeholder="Confirm Password" class="form-control" required="required">
							
						</div>
				</div>
				<div class="space-4"></div>
				<div class="col-sm-9 col-sm-offset-3">
				<input style="" type="submit" class="btn btn-sm btn-success" value="Update Password" /></div>
				
				</form>
			</div>
		</div></div>

	</div>
<script type="text/javascript">
	jQuery(function($){

				$("#changepassword").submit(function(event){
					event.preventDefault();
					var baseurl ="http://localhost/irmlm/";
					
					if($("#password").val()===$("#new_password").val()){
						
				
					$.ajax({
						url:'http://localhost/starswin//index.php/user/update_password',
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