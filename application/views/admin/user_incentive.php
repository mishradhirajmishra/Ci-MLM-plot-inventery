
<div class="page-content">
<?php //print_r($incentive);
print_r($closingdate);
?>

<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>

<div class="row">
									<div class="col-xs-12">
										<a href="<?php echo base_url().'index.php/admin/download_user_incentive/'.$closing_date;?>" class="btn btn-primary">Download Incentive in Xcel file</a>
										<div class="space-4"></div>
										<div class="table-header">
											All Users Incentive at Closing Date <?php echo $closingdate;?>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th class="hidden-480">Payment Receiver Name</th>
														<th>From User Name</th>
														<th>Amount</th>
														

														<th>
															<i class="ace-icon fa fa-email"></i>
															Relationship
														</th>
														<th class="hidden-480">Closing Date</th>

														
													</tr>
												</thead>

												<tbody>
												<?php $i=1;foreach ($incentive as $row) { ?>
													
											
													<tr>
														<td class="center">
															<label class="pos-rel">
																<?php echo $i;?>
																<span class="lbl"></span>
															</label>
														</td>

														<td>
												<a href="#"><?php
											//echo $row['payment_receiver_id'];
echo $this->db->get_where('users',array('user_id'=>$row['payment_receiver_id']))->row()->user_name;
												
												?></a>
														</td>
														<td><?php 
								//echo $row['from_user_id'];
echo $this->db->get_where('users',array('user_id'=>$row['from_user_id']))->row()->user_name;								
								?>
								</td>
														<td class="hidden-480"><?php echo $row['amount'];?></td>
														<td><?php echo $row['relationship'];?></td>

														<td class="hidden-480">
															<span class="label label-sm label-warning"><?php echo $row['generation_date'];?></span>
														</td>

														<td style="display:none;">
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
<?php $i++;} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
</div>


