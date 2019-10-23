<style>
    button.btn-success {
    margin: 6px;
    float: right;
}
</style>
<div class="page-content">
<?php //print_r($users);?>
    <?php global $ap; ?>
<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>

<div class="row">
				<div class="col-xs-12">
              <button class="btn-success" onclick="printDiv('printableins')"> Print Commission List </button>
              <!--printable table-->
            <div style="display:none;" id="printableins">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px;    margin-bottom: 5px;">Starview Infratech Pvt.Ltd.    <img style="width:100px; float:right" src="http://localhost/starswin/assets/images/logo.png" ></h1>
                    <hr style="width:80%; float:left;margin: 5px;">
                    
		<table class="table table-striped table-bordered">
										
												<thead>
												     
													<tr>

														<th class="hidden-480">User Id</th>
														<th>Name</th>
														<td>Bank Name</td>
                                                        <td> A/c Holder Name</td>
                                                        <td>A/c Number</td>
                                                        <td>IFSC Code</td>
														<th class="hidden-480">Total Commission Made</th>
														<th class="hidden-480">Commission already  Paid</th>
														<th class="hidden-480">Remaining  Commission To Be Paid</th>
													
														
													</tr>
												</thead>

												<tbody>
												<?php $i=1;foreach ($users as $row) { ?>
												<?php if($row['user_role']=="user") {?>
													<tr>
														<td>
											        	<a href="#"><?php echo $row['user_id'];?></a>
														</td>
														<td><?php echo $row['user_name'];?></td>
											<td class="hidden-480"><?php echo $row['bank_name'];?></td>
<td class="hidden-480"><?php echo $row['acholder_name'];?></td>
<td class="hidden-480"><?php echo $row['account_number'];?></td>
<td class="hidden-480"><?php echo $row['ifsc'];?></td>

                                                        	<td>
                                                                <!--Total Commission Made-->
                <?php $user_comm =$this->user_model-> sponser_list_commiossion($row['user_id']);?>
                <?php $total_comm = 0; foreach($user_comm as $row1) { ?>
                    <?php $this->db->select_sum('stalment'); $query = $this->db->get_where('user_stalment',array('user_id'=>$row1['user_id'])); $x=$query->row_array();$z=$x['stalment'];?>
                    <?php
                    if($row1['relation']==1){$c = "10%"; $cp = $z * .10; }
                    if($row1['relation']==2){$c = "2%"; $cp = $z * .02; }
                    if($row1['relation']==3){$c = "2%"; $cp = $z * .02; }
                    if($row1['relation']==4){$c = "1%"; $cp = $z * .01; }
                    if($row1['relation']==5){$c = "1%"; $cp = $z * .01; }
                    ?>
                      <?php $total_comm = $total_comm + $cp ?>

                 <?php } ?>
                 <?php echo $total_comm; ?>

                                                                <!--Total Commission Made-->

                         </td>
                                                        <td>                                                            <?php $this->db->select_sum('commission'); $query = $this->db->get_where('user_commission',array('user_id'=>$row['user_id'])); $x=$query->row_array(); echo $x['commission'];?>														</td>
                                                        </td>
                                                        <td>                                                            <?php  echo ($total_comm-$x['commission']);?>														</td>
                                                        </td>


													</tr >
<?php $i++;}} ?>                                   
												</tbody>

											</table>
              </div>
              </div>
              <!-- end printable table-->
		<div class="table-header">
											All Users
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											     <?php echo form_open('admin/all_user_commission')?>
												<thead>
												     
													<tr>

														<th class="hidden-480" >User Id</th>
														<th>Name</th>
														<th class="hidden-480">Mobile</th>
														<th >Total Commission Made</th>
														<th >Commission already  Paid</th>
														<th >Remaining  Commission To Be Paid</th>
														<th class="center hidden-480">	Action</th>
														
													</tr>
												</thead>

												<tbody>
												<?php $i=1;foreach ($users as $row) { ?>
												<?php if($row['user_role']=="user") {?>
													<tr>
														<td class="hidden-480">
											        	<?php echo $row['user_id'];?>
														</td>
														<td><a href="<?php echo base_url().'index.php/admin/user_information/'.$row['user_id'];?>" ><?php echo $row['user_name'];?></a></td>
														<td class="hidden-480"><?php echo $row['user_phone'];?></td>

                                                        	<td>
                                                                <!--Total Commission Made-->
                <?php $user_comm =$this->user_model-> sponser_list_commiossion($row['user_id']);?>
                <?php $total_comm = 0; foreach($user_comm as $row1) { ?>
                    <?php $this->db->select_sum('stalment'); $query = $this->db->get_where('user_stalment',array('user_id'=>$row1['user_id'])); $x=$query->row_array();$z=$x['stalment'];?>
                    <?php
                    if($row1['relation']==1){$c = "10%"; $cp = $z * .10; }
                    if($row1['relation']==2){$c = "2%"; $cp = $z * .02; }
                    if($row1['relation']==3){$c = "2%"; $cp = $z * .02; }
                    if($row1['relation']==4){$c = "1%"; $cp = $z * .01; }
                    if($row1['relation']==5){$c = "1%"; $cp = $z * .01; }
                    ?>
                      <?php $total_comm = $total_comm + $cp ?>

                 <?php } ?>
                 <?php echo $total_comm; ?>

                                                                <!--Total Commission Made-->

                         </td>
                                                        <td>                                                            <?php $this->db->select_sum('commission'); $query = $this->db->get_where('user_commission',array('user_id'=>$row['user_id'])); $x=$query->row_array(); echo $x['commission'];?>														</td>
                                                        </td>
                                                        <td>                                                            <?php if($total_comm-$x['commission'] > 1){ echo ($total_comm-$x['commission']);}?>														</td>
                                                        </td>
											
														<td class="center hidden-480">
															<label class="pos-rel">
															    <?php if($total_comm-$x['commission'] > 1){ ?>
															    <?php $arr = array($row['user_id'],$row['sector'],$row['plot_id'],$total_comm-$x['commission']); $d=implode("_",$arr); ?>
																<input type="checkbox" class="ace" name="com[]" value='<?php echo $d; ?>' />
                                                                <?php } ?>
																
																<span class="lbl"></span>
															</label>
														</td>


													</tr>
<?php $i++;}} ?>                                   <tr><td colspan="5"></td><td  colspan="2"><input type="submit" class="btn btn-success" value="Release Commission"></td></tr>
												</tbody>

												            <?php  echo form_close()?>
											</table>
										</div>
									</div>
								</div>

    <!---->


</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>

