<div class="page-content">
	<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
		</div>
		<?php //print_r($userid);?>
		<div class="col-xs-12">
										
										<div class="table-header">
											All Users Incentive
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																SNO
																<span class="lbl"></span>
															</label>
														</th>
														<th class="hidden-480">User Name</th>
														<th>Direct Entry</th>
														<th>In Direct Entry</th>
														

														<th>Direct Income</th>
													<th class="hidden-480">In Direct Income</th>

														<th>Total Income</th>
													</tr>
												</thead>

												<tbody>
												<?php $i=1; foreach ($userid as $row) { ?>
												<tr>
												<td><?php echo $i;?></td>
												<td style="text-transform: uppercase;"><?php 

							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$row['payment_receiver_id']);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
        					echo $name[0]['user_name'];
													
												?></td>
												<td><?php 

							$this->db->select('user_id');
       						$this->db->from('user_sponser');
							$this->db->where("sponser_id",$row['payment_receiver_id']);
							
        					$query = $this->db->get(); 
        					echo $query->num_rows();
													?></td>
													<td><?php 
							
							$this->db->select('from_user_id');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'In-Direct Income');
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
        					$query = $this->db->get();

        					$direct=$query->result_array();
        					//print_r($direct);
        					echo $direct[0]['amount'];
        					
													?>
													</td>
													<td><?php
													$this->db->select_sum('amount');
       						$this->db->from('generate_payment');
							$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
							$this->db->where("relationship",'In-Direct Income');
        					$query = $this->db->get(); 
        					$indirect=$query->result_array();
        					//print_r($indirect);
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
							
        					$query = $this->db->get(); 
        					$direct=$query->result_array();
        					//print_r($direct);
        					echo $direct[0]['amount'];
													?>
													</td>

												</tr>
													
											<?php	$i++;}
												?>
												</tbody>
												</table>
												</div>
												</div>


</div>