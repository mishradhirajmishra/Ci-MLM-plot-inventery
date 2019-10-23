<style>
    label {
    margin-top: 5px;
}
.das{

}
.red {
    padding: 10px;
    text-align: center;
}
.red {   border: 1px solid;
    border-radius: 13px;  background-color: beige;margin:10px;}
    div#ace-settings-container {
    display: none;
}
.ch4{background-color: beige;}
</style>
<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>
                        
							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select><div class="dropdown dropdown-colorpicker">		<a data-toggle="dropdown" class="dropdown-toggle"><span class="btn-colorpicker" style="background-color:#438EB9"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn selected" style="background-color:#438EB9;" data-color="#438EB9"></a></li><li><a class="colorpick-btn" style="background-color:#222A2D;" data-color="#222A2D"></a></li><li><a class="colorpick-btn" style="background-color:#C6487E;" data-color="#C6487E"></a></li><li><a class="colorpick-btn" style="background-color:#D0D0D0;" data-color="#D0D0D0"></a></li></ul></div>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off">
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off">
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off">
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off">
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off">
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off">
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off">
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off">
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
						               <div class="col-xs-12">
						    			<div id="message">
			    			  			<?php if( $this->session->flashdata('item')){ ?>
											<div class="alert alert-warning">
                                                <?php echo $this->session->flashdata('item'); ?>                                                
                                           </div>
                                        <?php } ?>
		                         	</div>	</div>
				    	<!--__________________________________________________________-->
 
                  <div class="col-xs-12">
                <div class="col-md-4 ch4">
			    <?php  $attributes = array('method' => 'post'); echo form_open('admin/user_stalment',$attributes );?>
                <div class="col-xs-7"> <input type="number"  placeholder="user id"    name="user_id" class="form-control right1"></div>
                <div class="col-xs-5"><input style="margin-left: 25%;" type="submit"  class="btn btn-sm btn-success" value="Installment" placeholder="user id"/></div>
                 </form>
			   </div>
                <div class="col-md-4 ch4">
                  <?php  $attributes = array('method' => 'post'); echo form_open('admin/user_gegology',$attributes );?>
                  <div class="col-xs-7"><input class="form-control right1"  type="number"  name="user_id"  placeholder="user id" ></div>
                  <div class="col-xs-5"> <input style="margin-left: 25%;" type="submit"  class="btn btn-sm btn-success" value="&nbsp;Genology&nbsp;&nbsp;"/></div>
                </form>
                </div>
                 <div class="col-md-4">
                  <a style="float: right;" class="btn btn-yellow" href="http://localhost/starswin/index.php/admin/keep_balance_reminder"> Reminder To keep Balance in A/C</a>

                 </div>
                </div>
						<!--____________________________________________________________-->
<!--**************************************************************************************************************************************************-->	
	<div class="col-md-12">
	    	<div class="col-md-3 das ">
	    	    <div class="red">
	    	    <?php $ts=$this->user_model->total_sale(); ?>
	    	    <h5>  &#x20b9; &nbsp;<?php print_r($ts) ?></h5>
	    	    <h2>Total Sale</h2>
	    	    </div>
	         </div>
	       	<div class="col-md-3 das ">
	       	     <div class="red">
	    	    <?php $tos=$this->user_model->today_sale(); ?>
	    	    <h5>&#x20b9; &nbsp;<?php if($tos) {print_r($tos);}else { echo '0';} ?></h5>
	    	    <h2>Today Sale</h2>
	    	    </div>
	        </div>
	       	<div class="col-md-3 das ">
	    	    <div class="red">
	    	    <?php $tb=$this->user_model->total_business(); ?>
	    	    <h5>&#x20b9; &nbsp;<?php print_r($tb) ?></h5>
	    	    <h2>Total Business</h2>
	    	    </div>
	         </div>
	       	<div class="col-md-3 das ">
	       	     <div class="red">
	    	    <?php $tb=$this->user_model->today_business(); ?>
	    	    <h5>&#x20b9; &nbsp;<?php if($tb) {print_r($tb);}else { echo '0';} ?></h5>
	    	    <h2>Today Business</h2>
	    	    </div>
	        </div>

     </div>

     	<div class="col-md-12">
	    	<div class="col-md-3 das ">
	    	    <div class="red">
	    	    <?php $ta=$this->user_model->total_associate(); ?>
	    	    <h5><?php print_r($ta) ?></h5>
	    	    <h2>Total Associate</h2>
	    	    </div>
	         </div>
	       	<div class="col-md-3 das ">
	       	     <div class="red">
	    	    <?php $tp=$this->user_model->total_plot(); ?>
	    	    <h5><?php if($tp) {print_r($tp);}else { echo '0';} ?></h5>
	    	    <h2>Total Plot</h2>
	    	    </div>
	        </div>
	       	<div class="col-md-3 das ">
	    	    <div class="red">
	    	    <?php $tbp=$this->user_model->total_booked_plot(); ?>
	    	    <h5><?php print_r($tbp) ?></h5>
	    	    <h2>Booked Plot</h2>
	    	    </div>
	         </div>
	       	<div class="col-md-3 das ">
	       	     <div class="red">
	    	    <h5><?php echo ($tp-$tbp); ?></h5>
	    	    <h2>Available Plot</h2>
	    	    </div>
	        </div>

     </div>

<!--**************************************************************************************************************************************************-->
		<br><br>	

			  </div>



					</div>