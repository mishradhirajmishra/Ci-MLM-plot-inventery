<div class="page-content">
	<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>
	<?php ?>
	<div class="col-xs-12">
										
										<div class="table-header">
											Users Incentive
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																From
																<span class="lbl"></span>
															</label>
														</th>
														
														<!-- <th class="hidden-480">User Name</th>-->
														<th>Direct+In Direct Entry</th>
														<th>Direct Income</th>
														<th class="hidden-480">In Direct Income</th>

														<th>Total Income</th>
														<th> Status</th>
													</tr>
												</thead>

												<tbody>
												<?php $i=1; $previous="Start to";$next='';
												foreach ($dates as $date) {
												$this->db->select('*');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$userid);
							
							$this->db->where("generation_date",$date['generation_date']);
							$this->db->group_by('generation_date');
							$query = $this->db->get(); 	
												$incentive=$query->result_array();
												foreach ($incentive as $row) { ?>
												<tr>
												
												<td><?php echo $previous.' - '.$date['generation_date'];?></td>
												
												<!--<td style="text-transform: uppercase;"><?php 

							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$row['payment_receiver_id']);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
        					echo $name[0]['user_name'];
													
												?></td>-->
												<td><?php 

							$this->db->select('from_user_id');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'Direct Income');
							$this->db->where("generation_date",$date['generation_date']);
							$this->db->group_by('from_user_id');
							$query = $this->db->get(); 
        					echo $query->num_rows();
        					echo " + ";
													?><?php 
							
							$this->db->select('from_user_id');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'In-Direct Income');
							$this->db->where("generation_date",$date['generation_date']);
							$this->db->group_by('from_user_id');
							$query = $this->db->get(); 
        					echo $query->num_rows();
													?>
													</td>
													<td><?php
													$this->db->select_sum('amount');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'Direct Income');
							$this->db->where("generation_date",$date['generation_date']);
        					$query = $this->db->get();
        					if($query->num_rows()==0)
        						echo 0;
        					$direct=$query->result_array();
        					//print_r($direct);
        					if($direct[0]['amount']=='')
        						echo 0;
        					echo $direct[0]['amount'];
        					
													?>
													</td>
													<td><?php
													$this->db->select_sum('amount');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'In-Direct Income');
							$this->db->where("generation_date",$date['generation_date']);
        					$query = $this->db->get(); 
        					if($query->num_rows()==0)
        						echo 0;
        					$indirect=$query->result_array();
        					//print_r($indirect);
        					if($indirect[0]['amount']=='')
        						echo 0;
        					echo $indirect[0]['amount'];
        					if($query->num_rows()==0)
        						echo 0;
        					
													?>
													</td>
													<td>
													<?php
													$this->db->select_sum('amount');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("generation_date",$date['generation_date']);
        					$query = $this->db->get();
        					
        					
        					$direct=$query->result_array();
        					//print_r($direct);
        					if($direct[0]['amount']=='')
        						echo 0;
        					echo $direct[0]['amount'];

													?>
													</td>
													<td>
													<?php
														$this->db->select('status');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("generation_date",$date['generation_date']);
        					$query = $this->db->get();
        					
        					
        					$status=$query->result_array();
        					//print_r($status);
        					if(!empty($status)){
        						$id=$row['payment_receiver_id'];
        						
        						
        					if($status[0]['status']==0){
        						echo '<span class="label label-sm label-warning">Un-Paid</span>';
  
        					}else 
        						echo '<span class="label label-success arrowed">Paid</span>';
											}	?>
													
													</td>

												</tr>
													
											<?php	$i++;} $previous=$date['generation_date']; }
												?>
												</tbody>
												</table>
												</div>
												</div>

</div>