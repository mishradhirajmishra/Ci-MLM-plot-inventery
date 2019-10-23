<div class="page-content">
<?php //print_r($users);?>
    <?php global $ap; ?>
<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>

<div class="row">
				<div class="col-xs-12">
<!--****************************************-->
                    <?php $dataf = array('class'=>"form-inline" ); echo form_open('admin/installment_report',$dataf)?>
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

<?php if($year){ ?>
<div class="row">
				<div class="col-xs-12">
              <button style="float:right" class="btn-success" onclick="printDiv('printableins')"> Print  </button>
              <!--printable table-->
            <div style="display:none1;" id="printableins">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px; text-align:center ;   margin-bottom: 5px;">Starview Win Pvt.Ltd.</h1><br>
                    <h6 style="font-size:25px; text-align:center ;   margin-bottom: 5px;"><?php $monthNum = $month;$monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; echo '-';echo $year;?></h6>
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
                                                        <th>Receiving Date</th>
                                                         <th>Joining  Date</th>
													</tr>
												</thead>

											<tbody>
<?php $i=1;foreach ($users as $row) { ?>
    <?php if($row['user_role']=="user") {?>
            <?php $plot=$this->user_model->list_plot_byid($row['plot_id']) ?>
            <?php $sec=$this->user_model->list_sector_byid($plot['sr_no']) ?>
            <?php $installment=$this->user_model->list_stalment_by_userid_date($row['user_id'],$month,$year) ?>
            
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
                 <td><?php print_r($installment['stalment']);?></td>
                  <td><?php print_r($installment['date']);?></td>
                  
                  <td><?php print_r($row['date']);?></td>
                    



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
<?php } ?>