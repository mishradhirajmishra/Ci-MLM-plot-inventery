<style>
    i.ace-icon.fa.fa-pencil.bigger-130 {
    width: 60px;
    color: red;
    background-color: yellow;
    padding: 10px;
}
.col-xs-6 {
    width: 100% !important;
}
</style>
<div class="page-content">
<?php //print_r($users);?>
<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>

<div class="row">
									<div class="col-xs-12" >
										<a style="display:none" href="<?php echo base_url().'index.php/admin/download_user';?>" class="btn btn-primary">Download User</a>
										<div class="space-4"></div>

									<div>
            <!--------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    



            <!----------------------------------------------->

 <table  id="table_id" class="table table-striped table-bordered table-hover">
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
														<th>Mobile</th>
														<th style="width:300px;" class="hidden-480">
															Address
														</th>
														<th class="hidden-480">Joinign Date</th>

														<th style="width:300px;">Action</th>
													</tr>
												</thead>

												<tbody>
												<?php $i=1;foreach ($users as $row) { ?>
												<?php if($row['user_role']=="user") {?>
													<tr>
														<td class="center hidden-480">
															<label class="pos-rel">
																<?php echo $i+1;?>
																<span class="lbl"></span>
															</label>
														</td>

														<td class="hidden-480">
												<a href="#"><?php echo $row['user_id'];?></a>
														</td>
														<td><a href="<?php echo base_url().'index.php/admin/user_information/'.$row['user_id'];?>" ><?php echo $row['user_name'];?></a></td>
														<td ><?php echo $row['user_phone'];?></td>
														<!-- <td><?php echo $row['user_email'];?></td> -->
                                                        	<td class="hidden-480"><?php echo $row['user_address'];?></td>
														<td class="hidden-480">
															<span class="label label-sm label-warning"><?php echo $row['date'];?></span>
														</td>
                                                       <td>
                                                            <div>
                                                             
                                                             <div class="dropdown">
                                                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                              <span class="caret"></span></button>
                                                              <ul class="dropdown-menu">
                                                                <li><a class="btn btn-primary" href="<?php echo base_url().'index.php/admin/update_profile_info/'.$row['user_id']; ?>">Edit</a></li>
                                                                <li><a class="btn btn-primary" href="<?php echo base_url().'index.php/admin/change_plot_no/'.$row['user_id']; ?>">Change Plot No</a></li>
                                                                <li><a class="btn btn-primary" href="<?php echo base_url().'index.php/admin/update_Stalment/'.$row['user_id'].'/'.$row['plot_id']; ?>">
                                                                   Installment
                                                                </a></li>
                                                                <li> <a class="btn btn-primary" href="<?php echo base_url().'index.php/admin/user_genology/'.$row['user_id']; ?>">
                                                                    Genology
                                                                </a></li>
                                                              </ul>
                                                            </div>
                                                       </td

													</tr>
<?php $i++;}} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
</div>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>