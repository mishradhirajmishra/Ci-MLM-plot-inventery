<div class="page-content">
		<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		</div>
		<h1>Please make sure before this you going to generate Payment.</h1>
		<button id="generate" class="btn btn-lg btn-success center"><i class="ace-icon fa fa-check"></i>Yes</button>
		
		<div class="space-4"></div>
		<div id="new-user">
		</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
			 $(document).on('click', '#generate', function(e) {
				e.preventDefault();
				
				$.ajax({
						url:'<?php echo base_url();?>index.php/admin/get_new_payment_list',
						type:'POST',
						success: function(response)
						{
							
							$("#new-user").html(response);
						}
						
						 });
			});
			});
</script>