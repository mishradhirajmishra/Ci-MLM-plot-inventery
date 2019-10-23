
<div class="page-content">
	<div class="page-header">
							<h1>
								Change user Plot No
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
	</div>
	<?php 
									if($insert_message!=" "){
										

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
	    <?php //print_r($user)?>
	    	<?php $plot=$this->user_model->list_plot_byid($user['plot_id']);//print_r($plot)?>
	    	 <?php $block=$this->user_model->list_sector_byid($plot['sr_no']);//print_r($block)?>
		<div class="col-xs-12">
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/change_plot_no" role="form" >
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> User ID </label>
						<div class="col-sm-9">
							<input type="number"  name="user_id" value="<?php echo $user['user_id']; ?>"class="col-xs-10 col-sm-5" >
						</div>
				</div>

				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> User Name </label>
						<div class="col-sm-9">
							<input type="text"  value="<?php echo $user['user_name']; ?>" class="col-xs-10 col-sm-5" disabled >
						</div>
				</div>
				<div class="space-4"></div>

					<input type="hidden" name="old_plot_id"   value="<?php echo $user['plot_id']; ?>" class="col-xs-10 col-sm-5" >
	

				<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Old Block </label>
						<div class="col-sm-9">
							<input type="text"    value="<?php echo $block['sec_name']; ?>" class="col-xs-10 col-sm-5"  disabled>
						</div>
				</div>
				<div class="space-4"></div>
								<div class="space-4"></div>
								<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Old Plot No </label>
					

						<div class="col-sm-9">
							<input type="text"   value="<?php echo $plot['plot_no']; ?>" class="col-xs-10 col-sm-5"  disabled>
					
						</div>
				</div>
			<!---->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> BlocK  </label>

                <div class="col-sm-9">
                    <select id="sec_id" name="sector" class="col-xs-10 col-sm-5" onchange="myFunction(this.value)" required="required">
                        <option value="">Select Block </option>
                        <?php foreach ($sec as $row) { ?>
                            
                            <option value="<?php echo $row['sec_id'] ?>"><?php echo $row['sec_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>   <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> Plot  </label>
                <div class="col-sm-9">
                <select name="plot_id" id="plot" class="col-xs-10 col-sm-5" required="required" onchange="getPlotsize(this.value)" >
                </select>
            </div>
            </div>
                        <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> Plot Size </label>

                <div class="col-sm-9">
                    <input type="number" id="plot_size" class="col-xs-10 col-sm-5" required="required" disabled>
                     
                </div>
            </div>
            
            <div class="space-4"></div>

				<input type="submit" class="btn btn-sm btn-success" />
				
			</form>
		</div>
	</div>
</div>
<script>

    function myFunction(id){
		var x = document.getElementById("sec_id").value;	
       
		 $.ajax({
                    url:'http://localhost/starswin/index.php/admin/list_plot_sec/' + id,
                    type:"GET",
                    datatype:"json",
                    data:{id:x},
                    success: function (data) {
                        document.getElementById('plot').innerHTML= data;
                        },
                    error: function () { alert("fail");}
                });
    }
    function getPlotsize(id){
		var x = document.getElementById("plot").value;	
       
		 $.ajax({
                    url:'http://localhost/starswin/index.php/admin/plot_size/' + id,
                    type:"GET",
                    datatype:"json",
                    data:{id:x},
                    success: function (data) {
                        
                        document.getElementById('plot_size').value= data;
                        },
                    error: function () { alert("fail");}
                });
    }
    function getPlotPrice(plc){
   
    var plotsize= document.getElementById('plot_size').value;
    var plotrate=document.getElementById('plot_rate').value;
    total=plotsize *  plotrate * plc;
 
    document.getElementById('plot_price').value = total;
 }

</script>
