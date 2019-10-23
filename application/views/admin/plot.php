<style>
   .right1{ float: right;}
  select {
       width: 44.5%;
   }
   #frm{
    border: 1px solid gray;
    padding: 30px;
    border-radius: 27px;
}
</style>
<div class="page-content">
    <div class="page-header">
        <h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
            </small></h1>
    </div>
    <?php if($msg==1){ ?>
        <div class="alert alert-success">
            <strong>Success!</strong> One Record inserted.
        </div>
    <?php } ?>
	    <?php if($msg==2){ ?>
        <div class="alert alert-success">
            <strong>Error!</strong> Plot No Already avilable.
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-4" id="frm">
            <?php  $attributes = array('method' => 'post'); echo form_open('admin/plot',$attributes );?>
            <div class="form-group">
                <label class="" for="form-field-1"> Block Name </label>

                <select name="sr_no" class="right1 form-control">
                    <?php foreach ($sec as $row) { ?>
                    <option value="<?php echo $row['sec_id'] ?>"><?php echo $row['sec_name'] ?> </option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot No </label>
                <input type="text"  name="plot_no"  required="required"  class="right1 form-control">

            </div>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot Size </label>
                <input type="text"  name="plot_size"  required="required"  class="right1 form-control">

            </div>
                <br>
                <input type="submit" style="float: right; margin-top:10px;"  class="btn btn-sm btn-success" value="Add Plot"  class="right1" />

            </form>
        </div></div>
            <br>
            
            <!--------------------------------------------------->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    


            <!----------------------------------------------->

    <table  id="table_id" class="table table-striped table-bordered table-hover">
        <thead>
           
        <tr> <td>Plot Id</td><td>Sector </td><td>Plot No </td><td>Plot Size </td><td>Plot Status </td><td>Action </td></tr>
        </thead>
        <tbody>
        <?php foreach ( $plot as $row) { ?>
            <tr><td><?php echo $row['plot_id'] ?></td>
                <td>   <?php $s=$this->user_model->list_sector_byid($row['sr_no']);echo $s ['sec_name'];?> <?php //echo $row['sr_no'] ?></td><td><?php echo $row['plot_no']?></td><td><?php echo $row['plot_size']?></td>
                <td><?php if($row['status']==0){ echo '<button class="btn btn-success">';echo "booked"; echo '</button>';}
                else{ echo '<button class="btn btn-warning">'; echo " Available"; echo '</button>';}?></td>
                <td><a class="btn btn-yellow" href="<?php echo base_url().'index.php/admin/plot_edit/'.$row['plot_id']; ?>">Edit</a></td>
                </tr>
        <?php }?>
        </tbody>
     </table>
    </button>


</div>
<div id="mymodal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">
                    Carefull you are editing Payment</h3>
            </div>

            <div class="modal-body" id="asdf">

            </div>

            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">

    jQuery("#edit1").click(function(event){
        event.preventDefault();
    });
    function edit_payment(a = '',b=''){
        //alert(a);
        $.ajax({
            url:'<?php echo base_url();?>index.php/admin/edit_payment/'+a+'/'+b,
            type:'POST',
            success: function(response)
            {

                $("#asdf").html(response);
            }

        });
    }
</script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>