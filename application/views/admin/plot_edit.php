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
	    <?php if($msg==2){ ?>
        <div class="alert alert-success">
            <strong>Error!</strong> Plot No Already avilable.
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-4">
            <?php  $attributes = array('method' => 'post'); echo form_open('admin/plot_edit',$attributes );?>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot No </label>
                <input type="text"  name="plot_no"  required="required"  class="right1" value=" <?php echo $plot['plot_no'];?>" diabled>
                <input type="hidden"  name="plot_id"  value=" <?php echo $plot['plot_id'];?>">
            </div>
            <div class="form-group">
                <label class="" for="form-field-1"> Plot Size </label>
                <input type="text"  name="plot_size"  required="required"  class="right1" value=" <?php echo $plot['plot_size'];?>">

            </div>

                <input type="submit" style="float: right"  class="btn btn-sm btn-success" value="Update Plot"  class="right1"  />

            </form>
        </div>
        <div class="col-md-4 col-md-offset-4"><a href="http://localhost/starswin/index.php/admin/plot" style="margin-top: 26px;font-size: 30px;"  class="btn btn-sm btn-warning" >Go back</a></div>
        
        </div>
            <br>
           
</div>
<!--------------------------->
                              
                                
                                
                                
