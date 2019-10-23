<style>
    .right1{ float: right;}
    select {
        width: 44.5%;
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
    <div class="row">
        <div class="col-md-4">
            <?php  $attributes = array('method' => 'post'); echo form_open('admin/plot',$attributes );?>
            <div class="form-group">
                <label class="" for="form-field-1"> Sector Name </label>

                <select name="sr_no" class="right1" >
                    <?php foreach ($sec as $row) { ?>
                        <option value="<?php echo $row['sec_id'] ?>"><?php echo $row['sec_name'] ?> </option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot No </label>
                <input type="text"  name="plot_no"  required="required"  class="right1">

            </div>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot Size </label>
                <input type="text"  name="plot_size"  required="required"  class="right1">

            </div>

            <input type="submit" style="float: right"  class="btn btn-sm btn-success" value="Add Plot"  class="right1" />

            </form>
        </div></div>
    <br>
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