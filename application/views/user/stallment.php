
<style>
.hhh {
    padding: 0;
    margin:  8px;
    font-size: 24px;
    font-weight: lighter;
    color: #2679B5;
}
    a.green {        margin: 4px; 20px;    }
    table {
        margin: 0px auto;
    }
    input[type="number"] {
        width: 100%;
    }
    table.table.table-striped {
        background-color: lightgoldenrodyellow;
        border: 1px solid gray;
    }
</style>
<?php global $ap; ?>
<div class="page-content">
    <div class="page-header">
        <h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
            </small></h1>
    </div>

    <div class="space-4"></div>

    <?php
    if($insert_message!=""){

        ?>
        <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-check green"></i>
        <?php echo $insert_message; ?>
        </div><?php

    } ?>
    <div class="row">
        <!--/commission -->
        <div class="col-sm-6">
      
            <table class="table table-striped">
                <tr style="background-color: #00BE67; color:white;"><th>Installment </th><th>Amount</th><th>Date</th></tr>

                <?php  $x=1; $amt=0; foreach($stalment as $row){ $amt = $amt + $row['stalment']; ?>

                <tr><td><b>(<?php  echo $x++; ?>)<b> </td><td><?php echo $row['stalment'];?></td><td><?php echo $row['date'];?></td></tr>

                <?php } ?>
            </table>
            <?php //print_r($stalment); ?>
        </div>
      
        <div class="col-sm-4 col-sm-offset-2">
            <table class="table table-striped">
                 <tr style="background-color: #00BE67; color:white;" ><td>Booking Amount</td><td><?php echo $info[0]['booking_price'];?></td></tr>
                <tr><td>Total Installment Paid</td><td><?php echo $amt ; ?></td></tr>
                <tr><td>Remaining  Amount </td><td><?php echo ($info[0]['total_price']-$amt) ; ?></td></tr>
                <tr><td>Plot Price</td><td><?php echo $info[0]['total_price'];?></td></tr>
                <tr style="background-color: #be8a00; color:white;"><td>Total Installment</td><td><?php echo $info[0]['stalment_type'];?></td></tr>
                <tr><td>Completed Installment</td><td><?php echo ($stalment_count - 1);?></td></tr>
                <tr><td>Remaining Installment</td><td><?php echo ($info[0]['stalment_type']-$stalment_count + 1);?></td></tr>
            </table>
        </div>
    </div>

</div>