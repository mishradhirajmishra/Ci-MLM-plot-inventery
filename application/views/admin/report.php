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
              <button class="btn-success" onclick="printDiv('printableins')"> Print  </button>
              <!--printable table-->
            <div style="display:none1;" id="printableins">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px; text-align:center ;   margin-bottom: 5px; visiblity:hidden">Starview Win Pvt.Ltd.</h1><br>
                    <hr style="width:80%; float:left;margin: 5px;">
                    
		<table class="table table-striped table-bordered">
										
												<thead>
												     
													<tr>

														<th class="hidden-480">User Id</th>
														<th>Name</th>
														<th>Sector</th>
														<th>Plot No</th>
                                                        <th>Plot Size</th>
                                                        <th>Plot Rate</th>
                                                        <th>Total Price</th>
                                                        <th>Received Amount</th>
                                                        <th>Pending  Amount</th>
													</tr>
												</thead>

											<tbody>
<?php $i=1;foreach ($users as $row) { ?>
    <?php if($row['user_role']=="user") {?>
            <?php $plot=$this->user_model->list_plot_byid($row['plot_id']) ?>
            <?php $sec=$this->user_model->list_sector_byid($plot['sr_no']) ?>
            <?php if($sec['sec_id']!=7){ ?>
        <tr>
            <td><a href="#"><?php echo $row['user_id'];?></a> </td>
            <td><?php echo $row['user_name'];?></td>

                 <td><?php print_r($sec['sec_name']);?></td>
                 <td><?php print_r($plot['plot_no']);?></td>
                 <td><?php print_r($plot['plot_size']);?></td>
                 <th><?php echo $row['total_price']/$plot['plot_size'];?></th>
                 <td><?php echo $row['total_price'];?></td>
                 <?php $ramt=$this->user_model->associate_recived_amount($row['user_id']); ?>
                 <td><?php echo $ramt;?></td>
                 <td><?php echo ($row['total_price']-$ramt);?></td>


        </tr >
          <?php } ?>
        <?php $i++;}} ?>
</tbody>

											</table>
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

