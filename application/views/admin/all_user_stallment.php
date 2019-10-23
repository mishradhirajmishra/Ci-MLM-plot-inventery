<div class="page-content">
<?php //print_r($users);?>
    <?php global $ap; ?>
<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>

<div class="row">
				<div class="col-xs-10">
<!--****************************************-->
                    <?php $dataf = array('class'=>"form-inline" ); echo form_open('admin/all_user_stallment',$dataf)?>
                            <div class="form-group">
                                <label for="month">Month:</label>
                                <select name="month" class="form-control">
                                    <option value="1">january</option>
                                    <option value="2">february</option>
                                    <option value="3">march</option>
                                    <option value="4">april</option>
                                    <option value="5">may</option>
                                    <option value="6">june</option>
                                    <option value="7">july</option>
                                    <option value="8">august</option>
                                    <option value="9">september</option>
                                    <option value="10">october</option>
                                    <option value="11">november</option>
                                    <option value="12">december</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select name="year" class="form-control">
                                    <option value="18">2018</option>
                                    <option value="19">2019</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                    <option value="22">2022</option>
                                    <option value="23">2023</option>
                                    <option value="24">2024</option>
                                    <option value="25">2025</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                      <?php form_close() ?>

<!--****************************************-->
</div>	<div class="col-xs-2">

</div>
<div class="col-xs-12" style="margin-top:10px">
<?php if( $this->session->flashdata('item')){ ?>
<div class="alert alert-warning">
                                          <?php echo $this->session->flashdata('item'); ?>                                                
   </div>
 <?php } ?>
</div>
				<div class="col-xs-12" style="margin-top:10px">
		<div class="table-header">
											All Users
										</div>
                 
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
										    <?php if($month && $year){ ?>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											    <!--*********************************************-->
											    <?php echo form_open('admin/all_user_stallment')?>	
											    <!-- ******************************************** -->
												<thead>
													<tr>
														<th class="center hidden-480">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th class="hidden-480">User Id</th>
														<th>Name</th>
														<th >Mobile</th>
														<th >Installment of : <?php $monthNum = $month;$monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; echo '-';echo $year;?></th>
											             <th class="hidden-480"></th>    
													</tr>
												</thead>
                                                    <?php $seleted_date=$year.'-'.$month.'1';?>
												<tbody>
												<?php $i=1;foreach ($users as $row) { ?>
												<?php $d = $this->user_model->list_stalment_by_month_year($row['user_id'],$year,$month); //echo $d ['stalment']; ?>
												<?php if($row['user_role']=="user" && strtotime($row['date']) >=strtotime($seleted_date)) {?>
													<tr>
														<td class="center hidden-480">
															<label class="pos-rel">
																<?php echo $i;?>
																<span class="lbl"></span>
															</label>
														</td>

														<td class="hidden-480">
											        	<a href="#"><?php echo $row['user_id'];?></a>
														</td>
														<td><a href="<?php echo base_url().'index.php/admin/user_information/'.$row['user_id'];?>" ><?php echo $row['user_name'];?></a></td>
														<td ><?php echo $row['user_phone'];?></td>
														<td>
														       
														       <?if($d){ ?>
														           <a class="btn btn-success" >Already Paid</a>
														     <?php   }else{ ?>
														     <a class="btn btn-danger" >Not Paid Yet</a>
														           
														      <?php  }?>
														</td >
														<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
													<td class="center hidden-480">
															<label class="pos-rel">
															    <?php if($d==0){ ?>
															    <?php $arr = array($row['user_name'],$row['user_phone'],$monthName,$year); $com=implode("_",$arr); ?>
																<input type="checkbox" class="ace" name="com[]" value='<?php echo $com; ?>' />
                                                                <?php } ?>
																
																<span class="lbl" ></span>
															</label>
														</td>

													</tr>
													<?php $i++;}} ?>   
											  <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
									    	 <tr class="hidden-480"><td colspan="4"></td><td  colspan="2"><input type="submit" class="btn btn-success" value="send commission not paid Yet sms"></td></tr>

										    <!--  ------------------------------ -->
                                 
												</tbody>
												 <?php  echo form_close()?>
											</table>
										
										</div>
									</div>
								</div>

    <!---->


</div>

