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
        <!--commission -->
    
        <div class="row">
            <div class="col-sm-7">
                <h2 class="hhh"> Commission</h2>
                <table class="table table-striped">
                    <tr style="background-color: #0000FF; color:white;"><th>User Lable</th><th>User name</th><th>Total Ammount</th><th>Commission %</th><th>Commission Made</th></tr>
                    <?php foreach($user_comm as $row) { ?>
                        <?php $this->db->select_sum('stalment'); $query = $this->db->get_where('user_stalment',array('user_id'=>$row['user_id'])); $x=$query->row_array(); $z= $x['stalment'];?>
                        <?php
                        if($row['relation']==1){$c = "10%"; $cp = $z * .10; $lbl = " First Lable";}
                        if($row['relation']==2){$c = "2%"; $cp = $z * .02; $lbl = " Second Lable";}
                        if($row['relation']==3){$c = "2%"; $cp = $z * .02; $lbl = " Third Lable";}
                        if($row['relation']==4){$c = "1%"; $cp = $z * .01; $lbl = " Forth Lable";}
                        if($row['relation']==5){$c = "1%"; $cp = $z * .01; $lbl = " Fifth Lable";}
                        ?>
                        <?php    $ap += $cp ; ?>
                        <tr><td ><?php echo $lbl; ?></td><td><?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array(); echo $q['user_name'];  ?></td><td><?php  echo $z; ?></td><td><?php  echo $c; ?></td><td><?php echo $cp; ?></td></tr>
                    <?php } ?>
                    <tr class="success"><td colspan="4">Total Commission Made</td><td><?php echo $ap; ?></td></tr>
                    <?php $this->db->select_sum('commission'); $query = $this->db->get_where('user_commission',array('user_id'=>$info[0]['user_id'])); $x=$query->row_array(); $x['commission'];?>
                    <tr class="warning"><td colspan="4">Commission already paid</td><td><?php echo $x['commission']; ?></td></tr>
                    <tr class="danger"><td colspan="4">Remaining  Commission To be Paid</td><td><?php echo ($comm1=$ap-$x['commission']); ?></td></tr>

                </table>
                <?php //print_r($user_comm); ?>
            </div>
       
        <!--/commission -->

        <div class="col-sm-4 col-sm-offset-1">
            <h2 class="hhh">Payment History</h2>
            <table class="table table-striped">
                  <tr style="background-color: #0000FF; color:white;"><th>Commission</th><th>Ammount</th><th>Date</th></tr>
                <?php $amt=0; $x=1; foreach($commission as $row){ $amt = $amt + $row['commission'];?>
                    <tr><td><b> (<?php  echo $x++; ?>)<b> </td><td style="text-align: center;"><?php echo $row['commission'];?></td><td><?php echo $row['date'];?></td></tr>

                <?php } ?>
                <?php if(round($comm1) >1){ ?>
                <tr><th>Total Amount</th><th><?php echo $amt ; ?></th><th></th></tr>

                <?php } ?>

            </table>
            <?php //print_r($stalment); ?>
        </div>

     

    </div>

</div>