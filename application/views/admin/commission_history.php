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
                    <?php $dataf = array('class'=>"form-inline" ); echo form_open('admin/commission_history',$dataf)?>
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
														<th class="hidden-480">Mobile</th>
														<th >Commission Of : <?php $monthNum = $month;$monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; echo '-';echo $year;?></th>
											             <th >Date</th>   
											              <th >Detail</th>    
													</tr>
												</thead>

												<tbody>
												<?php $i=1;foreach ($users as $row) { ?>
													 <?php $d = $this->user_model->list_commission_by_month_year($row['user_id'],$year,$month);// echo $d ['stalment']; ?>
												<?php if($row['user_role']=="user" && $d ['commission']>0) {?>
											
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
														<td><?php echo $row['user_name'];?></td>
														<td class="hidden-480" ><?php echo $row['user_phone'];?></td>
														<td> <?php echo $d ['commission']; ?> </td>
														<td> <?php echo $d ['date']; ?> </td>
														<td><a class="btn btn-yellow" href="http://localhost/starswin/index.php/admin/update_Stalment/<?php echo $row['user_id'];?>">
                                                                   Detail
                                                                </a></td>
														       

													</tr>
													<?php $i++;}} ?>   

                                 
												</tbody>

											</table>
											<?php }?>
										</div>
									</div>
								</div>

    <!---->


</div>

