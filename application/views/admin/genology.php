<style>
    a.green {        margin: 4px; 20px;    }
    .chh {
        text-align: center;
    }


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
    .round{
    background-color: darkgreen;
    padding: 3px 10px;
    border-radius: 50%;
    /* z-index: 10; */
}
</style>
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
        
                                <div >
                                <?php  $attributes = array('method' => 'post'); echo form_open('admin/user_gegology',$attributes );?>
                                <label class="" for="form-field-1"> User Id </label>
                                <input type="text"  name="user_id"  class="right11">
                                <input  type="submit"  class="btn btn-sm btn-success" value="Genology"/>

                                </form>

                              </div>
    </div>
    
    <div class="row">


            <div class="row">
                <div class="col-sm-12">
                    <?php $q = $this->db->get_where('users',array('user_id'=>$this->uri->segment(3)))->row_array(); $name = $q['user_name'];  ?>
                               
                    <div class="chh"><h6><span style="    position: absolute; background-color: yellow; padding: 9px; z-index: 10;"><?php print_r($user_comm_count); ?></span> </h6><br>
                        <a class="green btn btn-warning" href=""><?php echo $name?></a><br>
                        <img src="http://localhost/starswin/assets/images/r_arrow.jpg"><br>

                            <?php global $xx; $xx=1; foreach($user_comm as $row) {?>
                            <?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array(); $name = $q['user_name'];  ?> 

                            <?php if($row['relation']!=$xx){ echo "<br> "; echo '<img src="http://localhost/starswin/assets/images/r_arrow.jpg">'; ?>
                            <br><a class="green btn btn-success" href="<?php echo base_url().'index.php/admin/user_genology/'.$q['user_id']; ?>"> <?php echo $name; ?>    
                            <span class="round"><?php 
                            $count_under=$this->user_model-> sponser_list_commiossion_count($row['user_id']); echo $count_under;
                            ?></span> </a>  <?php
                            }
                            else{ ?>  <a class="green green btn btn-success" href="<?php echo base_url().'index.php/admin/user_genology/'.$q['user_id']; ?>"><?php echo $name;?>   
                            <span class="round"><?php 
                            $count_under=$this->user_model-> sponser_list_commiossion_count($row['user_id']); echo $count_under;
                            ?></span> </a> <?php } ?>
                             <?php  $xx = $row['relation']; ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
    </div>


    <!---->
    <div class="row" style="display: none;">
        <!--commission -->
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <h2> Commissiom</h2>
                    <table class="table table-striped">
                        <tr style="background-color: #0000FF; color:white;"><th>User Lable</th><th>User name</th><th>Total Ammount</th><th>Commission %</th><th>Commission Made</th></tr>
                        <?php foreach($user_comm as $row) { ?>
                            <?php $this->db->select_sum('stalment'); $query = $this->db->get_where('user_stalment',array('user_id'=>$row['user_id'])); $x=$query->row_array();?>
                            <?php  $query = $this->db->get_where('users',array('user_id'=>$row['user_id'])); $y=$query->row_array(); $z=$y['booking_price'] + $x['stalment'];?>
                            <?php
                            if($row['relation']==1){$c = "10%"; $cp = $z * .10; $lbl = " First Lable";}
                            if($row['relation']==2){$c = "2%"; $cp = $z * .02; $lbl = " Second Lable";}
                            if($row['relation']==3){$c = "2%"; $cp = $z * .02; $lbl = " Third Lable";}
                            if($row['relation']==4){$c = "1%"; $cp = $z * .01; $lbl = " Forth Lable";}
                            if($row['relation']==5){$c = "1%"; $cp = $z * .01; $lbl = " Fifth Lable";}
                            ?>
                            <?php  global $ap;
                            $ap += $cp ; ?>
                            <tr><td ><?php echo $lbl; ?></td><td><?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array(); echo $q['user_name'];  ?></td><td><?php  echo $z; ?></td><td><?php  echo $c; ?></td><td><?php echo $cp; ?></td></tr>
                        <?php } ?>
                        <tr class="success"><td colspan="4">Total Commission Made</td><td><?php echo $ap; ?></td></tr>
                        <?php $this->db->select_sum('commission'); $query = $this->db->get_where('user_commission',array('user_id'=>$info[0]['user_id'])); $x=$query->row_array(); $x['commission'];?>
                        <tr class="warning"><td colspan="4">Commission already paid</td><td><?php echo $x['commission']; ?></td></tr>
                        <tr class="danger"><td colspan="4">Remaining  Commission To be Paid</td><td><?php echo ($comm1=$ap-$x['commission']); ?></td></tr>

                    </table>
                    <?php //print_r($user_comm); ?>
                </div>
            </div>
</div>