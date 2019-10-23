<style>
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
    button.btn-success {
    width: 100%;
    margin-bottom: 12px;
}
    button.btn {
        font-size: 10px;
        padding: 0px 26px;
        border-radius: 20px;
    }
</style>
<?php global $ap;global $nap;global $tm; global $tm;  ?>
<div class="page-content">
    <div class="page-header">
        <h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
            </small></h1>
    </div>
    <a href="<?php echo base_url();?>index.php/admin/all_user" class="btn btn-primary">All User</a>
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
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Old Commission</h2>
                    <table class="table table-striped">
                        <tr style="background-color: #0000FF; color:white;"><th>User Label</th><th>User name</th><th>Total Amount</th><th>Commission %</th><th>Commission Made</th></tr>
                        <?php foreach($user_comm as $row) { ?>

                            <?php $x= $this->user_model->getUsercommission_old($row['user_id']); $z= $x['stalment'];?>
                             <?php  //print_r($x)?>
                            <?php
                            if($row['relation']==1){$c = "10%"; $cp = $z * .10; $lbl = " First Label";}
                            if($row['relation']==2){$c = "2%"; $cp = $z * .02; $lbl = " Second Label";}
                            if($row['relation']==3){$c = "2%"; $cp = $z * .02; $lbl = " Third Label";}
                            if($row['relation']==4){$c = "1%"; $cp = $z * .01; $lbl = " Forth Label";}
                            if($row['relation']==5){$c = "1%"; $cp = $z * .01; $lbl = " Fifth Label";}
                            ?>
                            <?php    $ap += $cp ; ?>
                            <tr><td ><?php echo $lbl; ?></td><td><?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array(); echo $q['user_name'];  ?></td><td><?php  echo $z; ?></td><td><?php  echo $c; ?></td><td><?php echo $cp; ?></td></tr>
                        <?php } ?>
                        <tr class="success"><td colspan="4">Total Old Commission Made</td><td><?php echo $ap; ?></td></tr>


                    </table>
                    <?php //print_r($user_comm); ?>
                </div>
                <div class="col-sm-12">
                    <h2>New Commission </h2>
                    <table class="table table-striped">
                        <tr style="background-color: #0000FF; color:white;"><th>User Label</th><th>User name</th><th>Total Amount</th><th>Commission %</th><th>Commission Made</th></tr>
                        <?php foreach($user_comm as $row) { ?>

                            <?php $x= $this->user_model->getUsercommission_new($row['user_id']); $z= $x['stalment'];?>
                            <?php  //print_r($x)?>
                            <?php
                            if($row['relation']==1){$c = "12%"; $cp = $z * .12; $lbl = " First Label";}
                            if($row['relation']==2){$c = "2%"; $cp = $z * .02; $lbl = " Second Label";}
                            if($row['relation']==3){$c = "2%"; $cp = $z * .02; $lbl = " Third Label";}
                            if($row['relation']==4){$c = "1%"; $cp = $z * .01; $lbl = " Forth Label";}
                            if($row['relation']==5){$c = "1%"; $cp = $z * .01; $lbl = " Fifth Label";}
                            ?>
                            <?php    $nap += $cp ; ?>
                            <?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array();?>
                            <tr style="display: <?php if($z==0){echo'none';} ?>" ><td ><?php echo $lbl; ?></td><td><?php echo $q['user_name'];  ?></td><td><?php  echo $z; ?></td><td><?php  echo $c; ?></td><td><?php echo $cp; ?></td></tr>
                        <?php } ?>
                        <tr class="success"><td colspan="4">Total New Commission Made</td><td><?php echo $nap; ?></td></tr>
                        <tr class="success"><td colspan="4">Total Old Commission Made</td><td><?php echo $ap; ?></td></tr>
                        <tr class="success"><td colspan="4">Total  Commission Made</td><td><?php $tm=$nap+$ap;echo  $tm; ?></td></tr>
                        <?php $this->db->select_sum('commission'); $query = $this->db->get_where('user_commission',array('user_id'=>$info[0]['user_id'])); $x=$query->row_array(); $x['commission'];?>
                        <tr class="warning"><td colspan="4">Commission already paid</td><td><?php echo $x['commission']; ?></td></tr>
                        <tr class="danger"><td colspan="4">Remaining  Commission To be Paid</td><td><?php echo ($comm1=$tm-$x['commission']); ?></td></tr>

                    </table>
                    <?php //print_r($user_comm); ?>
                </div>
            </div>


            <!--/commission -->


            <!--**************************** installment printing*************************************-->
            <?php

            $number = $commission_print['stalment'];
            $no = round($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
            $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
                if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred
                        :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
                } else $str[] = null;
            }
            $str = array_reverse($str);
            $result = implode('', $str);
            $points = ($point) ?
                "." . $words[$point / 10] . " " .
                $words[$point = $point % 10] : '';

            ?>

            <div style="display:none;" id="printableArea">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px;    margin-bottom: 5px;">Starview Win Pvt.Ltd.    <img style="width:100px; float:right" src="http://localhost/starswin/assets/images/logo.png" ></h1>
                    <hr style="width:80%; float:left;margin: 5px;">
                    <div style="width:70%;">
                        <p style="margin: 2px;"><i> Address:</i> C-39 GAMBA TOWER-VIBHUTI KHAND GOMTI NAGAR, LUCKNOW, UTTAR PRADESH 226010 &nbsp;&nbsp;&nbsp;&nbsp; <i>Contact :</i>9026533330</p>
                        <p style="margin: 2px;"><i>Website :</i> http://www.thestarview.com/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i>Email :</i>info@thestarview.com</p>

                    </div>
                    <hr style="width:80%; float:left;margin: 2px;"><p>&nbsp;</p>
                    <h4 style="text-align:center;margin: 5px;"> AWADH AAWASIYA YOJANA</h4>

                    <p style="font-size:18px;margin: 0px;">Receipt No __________________________</p>
                    <p style="font-size:18px;margin: 0px;">Name of Mr/Mrs/M/s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $info[0]['user_name'] ?></span></p>
                    <p style="font-size:18px;margin: 0px;">Booking Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px">
                 <?php echo $commission_print['date']; ?></span></p>
                    <p style="font-size:18px;margin: 0px;">Installmnent Ammount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $commission_print['stalment'];?></span></p>
                    <p style="font-size:18px;margin: 0px;">Rupees in words &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $result . "Rupees  "; ?></span></p>
                    <table class="table table-striped">
                        <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cash</th><th>Cheque No</th><th>DD No</th></tr>
                        <tr><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="margin-top:10px" type="checkbox"></td><td></td><td></td></tr>
                    </table>
                    <hr>
                    <p style="font-size:15px">Receiving Date ___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received By</p>
                    <p style="font-size:15px">Receiver's Name __________________________</p>
                </div>
                <!--_________________________________________________-->

            </div>

            <!--*****************************************************************-->
            <!--_________________________________________________________________________________________________________________________-->
            <!--**************************** Booking printing*************************************-->
            <?php

            $number = $info[0]['booking_price'];
            $no = round($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'one', '2' => 'two',
                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                '13' => 'thirteen', '14' => 'fourteen',
                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                '60' => 'sixty', '70' => 'seventy',
                '80' => 'eighty', '90' => 'ninety');
            $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
                if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred
                        :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
                } else $str[] = null;
            }
            $str = array_reverse($str);
            $result = implode('', $str);
            $points = ($point) ?
                "." . $words[$point / 10] . " " .
                $words[$point = $point % 10] : '';

            ?>

            <div style="display:none;" id="printablebook">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px;    margin-bottom: 5px;">Starview win Pvt.Ltd.    <img style="width:100px; float:right" src="http://localhost/starswin/assets/images/logo.png" ></h1>
                    <hr style="width:80%; float:left;margin: 5px;">
                    <div style="width:70%;">
                        <p style="margin: 2px;"><i> Address:</i> C-39 GAMBA TOWER-VIBHUTI KHAND GOMTI NAGAR, LUCKNOW, UTTAR PRADESH 226010 &nbsp;&nbsp;&nbsp;&nbsp; <i>Contact :</i>9026533330</p>
                        <p style="margin: 2px;"><i>Website :</i> http://www.thestarview.com/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i>Email :</i>info@thestarview.com</p>

                    </div>
                    <hr style="width:80%; float:left;margin: 2px;"><p>&nbsp;</p>
                    <h4 style="text-align:center;margin: 5px;"> AWADH AAWASIYA YOJANA</h4>

                    <p style="font-size:18px;margin: 0px;">Receipt No __________________________</p>
                    <p style="font-size:18px;margin: 0px;">Name of Mr/Mrs/M/s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $info[0]['user_name'] ?></span></p>
                    <p style="font-size:18px;margin: 0px;">Booking Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px">
                 <?php echo $info[0]['date']; ?></span></p>
                    <p style="font-size:18px;margin: 0px;">Booking Ammount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $info[0]['booking_price'];?></span></p>
                    <p style="font-size:18px;margin: 0px;">Rupees in words &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px"><?php echo $result . "Rupees  "; ?></span></p>
                    <table class="table table-striped">
                        <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cash</th><th>Cheque No</th><th>DD No</th></tr>
                        <tr><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="margin-top:10px" type="checkbox"></td><td></td><td></td></tr>
                    </table>
                    <hr>
                    <h4 style="text-align:center;margin: 5px;"> BOOKING DETAIL</h4>
                    <BR>
                    <table class="table table-striped">
                        <tr><td>Sponser Id</td><td><?php echo $first_sponser['sponser_id']; ?></td><td></td><td></td></tr>
                        <tr style="background-color: #0000FF; color:white;"><td>User Id</td><td><?php echo $info[0]['user_id'] ?></td><td>Plot Price</td><td><?php echo $info[0]['total_price'];?></td></tr>
                        <tr><td>User Name</td><td><?php echo $info[0]['user_name'] ?></td><td>Mobile Number</td><td><?php echo $info[0]['user_phone']?></td></tr>

                        <tr><td>Email Id</td><td><?php echo $info[0]['user_email'] ?></td><td>Booking Amt.</td><td><?php echo $info[0]['booking_price'];?></td></tr>

                        <tr><td>Bank Name</td><td><?php echo $info[0]['bank_name']; ?></td><td>IFSC Code</td><td><?php echo $info[0]['ifsc'];?></td></tr>

                        <tr><td>Account Number</td><td><?php echo $info[0]['account_number'];?></td><td>Account Holder Name</td><td><?php echo $info[0]['account_number'];?></td></tr>

                        <tr><td>No of EMI</td><td><?php echo $info[0]['stalment_type'];?></td><td>Location</td><td><?php echo $sec['sec_name'];?></td></tr>

                        <tr><td>Plot No</td><td><?php echo $plot['plot_no'];?></td><td>Plot Size</td><td><?php echo $plot['plot_size'];?></td></tr>
                        <tr><td>Address</td><td colspan="3"><?php echo $info[0]['user_address'] ?></td></tr>
                    </table>
                    <hr>
                    <p style="font-size:15px">Receiving Date ___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received By</p>
                    <p style="font-size:15px">Receiver's Name __________________________</p>
                </div>
                <!--_________________________________________________-->

            </div>

            <!--****************************installment statement*************************************-->
            <div style="display:none;" id="printableins">
                <div style="    margin: 50px 50px;">
                    <h1 style="font-size:45px;    margin-bottom: 5px;">Starview Win Pvt.Ltd.    <img style="width:100px; float:right" src="http://localhost/starswin/assets/images/logo.png" ></h1>
                    <hr style="width:80%; float:left;margin: 5px;">
                    <div style="width:70%;">
                        <p style="margin: 2px;"><i> Address:</i> C-39 GAMBA TOWER-VIBHUTI KHAND GOMTI NAGAR, LUCKNOW, UTTAR PRADESH 226010 &nbsp;&nbsp;&nbsp;&nbsp; <i>Contact :</i>9026533330</p>
                        <p style="margin: 2px;"><i>Website :</i> http://www.thestarview.com/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i>Email :</i>info@thestarview.com</p>

                    </div>
                    <hr style="width:80%; float:left;margin: 2px;"><p>&nbsp;</p>
                    <h4 style="text-align:center;margin: 5px;"> AWADH AAWASIYA YOJANA </h4>
                    <br>
                    <table class="table ">
                        <tr><td>Name</td><td><?php echo $info[0]['user_name'] ?></td><td>Mobile Number</td><td><?php echo $info[0]['user_phone']?></td></tr>

                        <tr><td>Email Id</td><td><?php echo $info[0]['user_email'] ?></td><td>Booking Amt.</td><td><?php echo $info[0]['booking_price'];?></td></tr>

                        <tr><td>Bank Name</td><td><?php echo $info[0]['bank_name']; ?></td><td>IFSC Code</td><td><?php echo $info[0]['ifsc'];?></td></tr>
                        <tr><td>Address</td><td colspan="3"><?php echo $info[0]['user_address'] ?></td></tr>
                    </table>
                    <h4 style="text-align:center;margin: 5px;">All Installment</h4>
                    <table class="table table-striped">
                        <tr><th>Installment </th><th>Ammount</th><th>Date</th></tr>

                        <?php $x=1; $amt=0; foreach($stalment as $row){ $amt = $amt + $row['stalment']; ?>

                            <tr><td><b>(<?php  echo $x++; ?>)<b> </td><td style="text-align: center;"><?php echo $row['stalment'];?></td><td><?php echo $row['date'];?></td></tr>

                        <?php } ?>
                        <tr><th>Total Amount</th><th><?php echo $amt ; ?></th><th></th></tr>

                    </table>

                    <p style="font-size:15px">Receiving Date ___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received By</p>
                    <p style="font-size:15px">Receiver's Name __________________________</p>
                </div>
                <!--_________________________________________________-->

            </div>
            <!--**********************************************-->
            <div class="col-sm-12">
                <button class="btn-success" onclick="printDiv('printablebook')"> Print Booking Receipt</button>
                <button class="btn-success" onclick="printDiv('printableins')"> Print Installment Statement</button>
                <button class="btn-success" onclick="printDiv('printableArea')"> Print Installment Receipt</button>


            </div>
            <div class="col-sm-12">
                <h2> Installment</h2>
                <table class="table table-striped">
                    <tr><th style="width:20%">Installment </th><th>Ammount</th><th>Date</th><th style="width:50%">Comment</th></tr>

                    <?php $x=1; $amt=0; foreach($stalment as $row){ $amt = $amt + $row['stalment']; ?>

                        <tr><td><b>(<?php  echo $row['id']; ?>)<b> </td><td style="text-align: center;"><?php echo $row['stalment'];?></td><td><?php echo $row['date'];?>
                        
                        <td ><?php echo $row['comm'];?></td></tr>
                    <?php } ?>
                    <tr><th>Total Amount</th><th><?php echo $amt ; ?></th><th></th><th></th></tr>
                    <?php echo form_open('admin/add_stalment')?>
                    <input type="hidden" name="user_id" value="<?php echo $info[0]['user_id']; ?>">
                    <input type="hidden" name="sec_id" value="<?php echo $info[0]['sector']; ?>">
                    <input type="hidden" name="plot_id" value="<?php echo $info[0]['plot_id']; ?>">
                    <?php  $stal= ($info[0]['total_price'] - $info[0]['booking_price'])/ $info[0]['stalment_type'];?>
                    <?php $month=Date('m'); $stl= $this->user_model->list_stalment_of_month($info[0]['user_id'],$info[0]['sector'],$info[0]['plot_id'],$month);if(!$stl){ ?>
                   <tr><th>  <input type="number" name="stalment" value="<?php echo round($stal); ?>" > </td><td colspan="2"><input type="text" name="comm" placeholder="Comment"  ></td><td><input type="submit" class="btn-success" ></td></tr>

                        
                    <?php }  echo form_close()?>

                </table>

                <?php //print_r($stalment); ?>
            </div>
            <div class="col-sm-12">
                <h2> Commission Paid</h2>
                <table class="table table-striped">
                    <tr><th>Commission</th><th>Ammount</th><th>Date</th></tr>
                    <?php $amt=0; $x=1; foreach($commission as $row){ $amt = $amt + $row['commission'];?>
                        <tr><td><b> (<?php  echo $x++; ?>)<b> </td><td style="text-align: center;"><?php echo $row['commission'];?></td><td><?php echo $row['date'];?></td></tr>

                    <?php } ?>
                    <?php if(round($comm1) >1){ ?>
                        <tr><th>Total Amount</th><th><?php echo $amt ; ?></th><th></th></tr>
                        <?php echo form_open('admin/add_commission')?>
                        <input type="hidden" name="user_id" value="<?php echo $info[0]['user_id']; ?>">
                        <input type="hidden" name="sec_id" value="<?php echo $info[0]['sector']; ?>">
                        <input type="hidden" name="plot_id" value="<?php echo $info[0]['plot_id']; ?>">

                        <tr><th>  <input type="number" name="stalment" value="<?php echo round($comm1); ?>" readonly> </td><td></td><td><input type="submit" class="btn-success"></td></tr>
                        <?php  echo form_close()?>
                    <?php } ?>

                </table>
                <?php //print_r($stalment); ?>
            </div>

        </div>
        <div class="col-sm-2">
            <table >
                <?php foreach ($user_sponser as $row) {
                    $q = $this->db->get_where('users',array('user_id'=>$row['sponser_id']))->row_array();
                    ?>
                    <tr id="graph"><td style="text-align: center;" ><a class="green btn btn-success" href=""><?php echo $q['user_name']; ?></a></td></tr>
                    <tr><td style="text-align: center;" ><img src="<?php echo base_url()?>/assets/images/arrow.jpg"></td></tr>

                <?php  } ?>
                <tr id="graph"><td style="text-align: center;" ><a class="green btn btn-warning" href=""><?php echo $info[0]['user_name'] ?></a></td></tr>
            </table>
        </div>
        <div class="col-sm-4">
            <h2> User Detail</h2>
            <table class="table table-striped">
                <tr style="background-color: #0000FF; color:white;"><td>User Id</td><td><?php echo $info[0]['user_id'] ?></td></tr>
                <tr><td>User Name</td><td><?php echo $info[0]['user_name'] ?></td></tr>
                <tr><td>Mobile Number</td><td><?php echo $info[0]['user_phone']?></td></tr>
                <tr><td>Email Id</td><td><?php echo $info[0]['user_email'] ?></td></tr>
                <tr><td>Address</td><td><?php echo $info[0]['user_address'] ?></td></tr>
                <tr><td>Bank Name</td><td><?php echo $info[0]['bank_name']; ?></td></tr>
                <tr><td>IFSC Code</td><td><?php echo $info[0]['ifsc'];?></td></tr>
                <tr><td>Account Number</td><td><?php echo $info[0]['account_number'];?></td></tr>
                <tr><td>Account Holder Name</td><td><?php echo $info[0]['account_number'];?></td></tr>
                <tr><td>No of EMI</td><td><?php echo $info[0]['stalment_type'];?></td></tr>
                <tr><td>Payment Mode</td><td><?php echo $info[0]['payment_modd'];?></td></tr>
                <tr><td>Cheque No</td><td><?php echo $info[0]['cheque_no'];?></td></tr>
                <tr><td>Clearing Date</td><td><?php echo $info[0]['clearing_date'];?></td></tr>
                <tr><td>Narration</td><td><?php echo $info[0]['narration'];?></td></tr>
                <tr><td>Location</td><td><?php echo $sec['sec_name'];?></td></tr>
                <tr><td>Plot No</td><td><?php echo $plot['plot_no'];?></td></tr>
                <tr><td>Plot Size</td><td><?php echo $plot['plot_size'];?></td></tr>
                <tr><td>Plot Price</td><td><?php echo $info[0]['total_price'];?></td></tr>
                <tr style="background-color: #00BE67; color:white;" ><td>Booking Amt.</td><td><?php echo $info[0]['booking_price'];?></td></tr>
            </table>
            <br>
            <h2> Cheque Detail</h2>

            <?php $xxx= $this->user_model-> all_cheque($row['user_id']);  print_r($xxx)?>
            <table class="table table-striped">
                <tr><th>Sn</th> <th>Comment </th><th>Status</th></tr>
                <?php foreach ($xxx as $row) { ?>
                    <tr><th><?php echo $row['id']; ?></th> <th><?php echo $row['comment']; ?> </th>
                        <th><?php if( $row['status']==1){ ?>
                           <button class="btn btn-success" onclick="changeStatus(<?php echo $row['id']; ?>)"> Available</button>
                            <?php }else {?>
                           <button class="btn btn-danger">Used</button>
                            <?php } ?>

                        </th>
                    </tr>
                <?php } ?>
                <tr>

                    <?php echo form_open('admin/add_cheque')?>
                    <input type="hidden" name="user_id" value="<?php echo $info[0]['user_id']; ?>">
                    <input type="hidden" name="plot_id" value="<?php echo $info[0]['plot_id']; ?>">
                <tr><th colspan="2">  <input style="    width: 100%;" type="text" name="comment"  > </td><td><input type="submit" class="btn-success"></td></tr>
                <?php  echo form_close()?>

                </tr>
            </table>
        </div>
    </div>

</div>
<script>

    function changeStatus(id){
        $.ajax({
            url: '<?php echo base_url()?>index.php/admin/cheque_status_cheque',
            type: "POST",
            datatype: "json",
            data: {id:id,status:0},
            success: function (msg) {
                location.reload();
            }
        });
    };
</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>