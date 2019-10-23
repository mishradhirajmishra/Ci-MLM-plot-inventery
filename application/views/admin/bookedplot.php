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
        </div></div>
            <br>
        <tbody>
        <?php foreach ( $plot as $row) { ?>
      <?php if($row['status']==1){}
                else{  echo '<div class="col-xs-6 col-sm-3"><button  style="margin-bottom:4px;  width: 100%;font-size: 13px;    text-align: left;" class="btn btn-warning">';?> <?php $s=$this->user_model->list_sector_byid($row['sr_no']);echo $s ['sec_name'];?>
      <?php echo '<span class="badge" style="color:red;    margin-right: 20px;">'; echo $row['plot_no'];  echo '</span></button></div>';}?>
        <?php }?>


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