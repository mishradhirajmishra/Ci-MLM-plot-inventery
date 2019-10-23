<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
        <style>
            
        </style>
    </head>
    <body>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo $name;?>
                <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" 
													src="<?php echo base_url();?>assets/images/logo.png" width="100">
            </div>
            <div class="col-md-6">
                Some Content <?php echo $email;
                echo "password is ".$password;
                ?>
                
            </div>
        </div>
    </body>
</html>