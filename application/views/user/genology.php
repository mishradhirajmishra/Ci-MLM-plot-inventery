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
    <?php if($msg ){ ?>
      <div class="alert alert-danger">
      <?php echo $msg ?>
      </div>
      <?php } ?>
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
                                <?php  $attributes = array('method' => 'post'); echo form_open('user/genealogy',$attributes );?>
                                <label class="" for="form-field-1"> User Id </label>
                                <input type="text"  name="user_id"  class="right11">
                                <input  type="submit"  class="btn btn-sm btn-success" value="Genology"/>

                                </form>

                              </div>
    </div>
    
    <div class="row">


            <div class="row">
                <div class="col-sm-12">
                    <?php $q = $this->db->get_where('users',array('user_id'=>$userid))->row_array(); $name = $q['user_name'];  ?>
                    <div class="chh"><h6><span style="    position: absolute; background-color: yellow; padding: 9px; z-index: 10;"><?php print_r($user_comm_count); ?></span> </h6><br>
                        <a class="green btn btn-warning" href=""><?php echo $name ; ?></a><br>
                        <img src="http://localhost/starswin/assets/images/r_arrow.jpg"><br>

                            <?php global $xx; $xx=1; foreach($user_comm as $row) {?>
                            <?php $q = $this->db->get_where('users',array('user_id'=>$row['user_id']))->row_array(); $name = $q['user_name'];  ?>
                            <?php if($row['relation']!=$xx){ echo "<br> "; echo '<img src="http://localhost/starswin/assets/images/r_arrow.jpg">'; ?>
                            <br><a class="green btn btn-success" href="<?php echo base_url().'index.php/user/genealogy/'.$q['user_id']; ?>"> <?php echo $name; ?>
                             <span class="round"><?php 
                            $count_under=$this->user_model-> sponser_list_commiossion_count($row['user_id']); echo $count_under;
                            ?></span>
                            </a>  <?php
                            }
                            else{ ?>  <a class="green green btn btn-success" href="<?php echo base_url().'index.php/user/genealogy/'.$q['user_id']; ?>"><?php echo $name;?> 
                             <span class="round"><?php 
                            $count_under=$this->user_model-> sponser_list_commiossion_count($row['user_id']); echo $count_under;
                            ?></span>
                            </a> <?php } ?>
                             <?php  $xx = $row['relation']; ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
    </div>


    <!---->
  