
<div class="page-content">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<div class="page-header">
							<h1>
								Add New User 
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
		<div class="col-xs-12">
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/add_new_user" role="form" ng-app="">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Sponser ID </label>

						<div class="col-sm-9">
							<input type="text"  name="sponserid" value="<?php echo set_value('sponserid'); ?>" placeholder="Sponser Id" class="col-xs-10 col-sm-5" required="required">
							<?php //echo validation_errors();
							echo form_error('sponserid'); ?>
						</div>
				</div>

				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> User Name </label>

						<div class="col-sm-9">
							<input type="text"  name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" class="col-xs-10 col-sm-5" required="required" ng-model="Name">
							<?php echo form_error('username'); ?> 
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Password </label>

						<div class="col-sm-9">
							<input type="text"  name="password" placeholder="Password" class="col-xs-10 col-sm-5" required="required" value="{{ Name }}1">
							<?php echo form_error('password'); ?>
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Name </label>

						<div class="col-sm-9">
							<input type="text"  name="name" placeholder="Customer Name" class="col-xs-10 col-sm-5" required="required" value="{{ Name }}">
							<?php echo form_error('name'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Mobile Number </label>

						<div class="col-sm-9">
							<input type="tel"  name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Mobile Number" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('mobile'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Email Id </label>

						<div class="col-sm-9">
							<input type="email"  name="email" value="<?php echo set_value('email'); ?>" placeholder="Email ID" class="col-xs-10 col-sm-5">
							<?php echo form_error('email'); ?>
						</div>
				</div>
				
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Bank Name </label>

						<div class="col-sm-9">
							<input type="text"  name="bankname" value="<?php echo set_value('bankname'); ?>" placeholder="Bank Name" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('bankname'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> IFSC Code </label>

						<div class="col-sm-9">
							<input type="text"  name="ifsc" value="<?php echo set_value('ifsc'); ?>" placeholder="IFSC Code" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('ifsc'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Account Number </label>

						<div class="col-sm-9">
							<input type="text"  name="acnumber" value="<?php echo set_value('acnumber'); ?>" placeholder="Account Number" class="col-xs-10 col-sm-5" required="required">
							<?php echo form_error('acnumber'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for=""> Account Holder Name </label>

						<div class="col-sm-9">
							<input type="text"  name="account_name" placeholder="Account Holder Name" class="col-xs-10 col-sm-5" required="required" value="{{ Name }}">
							<?php echo form_error('account_name'); ?>
						</div>
				</div>
				<div class="space-4"></div>
			<!---->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> BlocK  </label>

                <div class="col-sm-9">
                    <select name="sec_id" id="sec_id" class="col-xs-10 col-sm-5" onchange="myFunction(this.value)" required="required">
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
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" > Plot Rate </label>

                <div class="col-sm-9">
                    <input type="number" id="plot_rate" value="250" class="col-xs-10 col-sm-5" required="required" disabled>
                     <span>{{plot_size}}</span>
                </div>
            </div>
            
                        <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> PLC Applied  </label>

                <div class="col-sm-9">
                    <select name="emi" class="col-xs-10 col-sm-5" required="required" onchange="getPlotPrice(this.value)">
                            <option >Sellect </option>
                            <option value="1.1">Yes</option>
                            <option value="1">No</option>
                    </select>
                </div>
            </div>
                        <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" disabled> Plot Total Price </label>

                <div class="col-sm-9">
                    <input type="number" id="plot_price" name="plot_price" value="" placeholder="" class="col-xs-10 col-sm-5" required="required" diabled>
                    
                </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> Plot Booking Amount </label>

                <div class="col-sm-9">
                    <input type="text"  name="joiningfee" value="21000" placeholder="" class="col-xs-10 col-sm-5" required="required">
                    
                </div>
            </div>   <div class="space-4"></div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> Emi Type  </label>

                <div class="col-sm-9">
                    <select name="emi" class="col-xs-10 col-sm-5">
                            <option value="24">24 Month </option>
                            <option value="36">36 Month </option>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> Mode Of Payment </label>

                <div class="col-sm-9">
                    <select name="payment_modd" class="col-xs-10 col-sm-5" onchange="show_hide(this.value)">
                            <option value="cheque">Cheque </option>
                             <option value="cash">Cash</option>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>
                        <div class="form-group" id="cheque_no">
                <label class="col-sm-3 control-label no-padding-right" for="">Cheque No</label>
                <div class="col-sm-9">
                    <input type="number"  name="cheque_no"   placeholder="" class="col-xs-10 col-sm-5" >
                </div>
            </div>
            <div class="form-group" id="clearing_date">
                <label class="col-sm-3 control-label no-padding-right" for="">Date of clearing </label>
                <div class="col-sm-9">
                    <input type="date"  name="clearing_date"  placeholder="" class="col-xs-10 col-sm-5">
                </div>
            </div>
                        <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">Narration</label>
                <div class="col-sm-9">
                    <input type="text"  name="narration"  placeholder="" class="col-xs-10 col-sm-5" >
                    
                </div>
            </div>


				<input type="submit" class="btn btn-sm btn-success" />
				
			</form>
		</div>
	</div>
</div>
<script>
    function show_hide(x){
        if(x=='cash'){
        $("#cheque_no").hide()
        $("#clearing_date").hide();
        }
        else{
        $("#cheque_no").show()
        $("#clearing_date").show();
        }
        
    }

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
