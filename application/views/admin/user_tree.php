<style type="text/css">#mainContainer{
    background:#438eb9;
    min-width:850px;
}
.container{
    text-align:center;
    margin:10px .5%;
    padding:10px .5%;
    background:#87b87f;
    float:left;
    overflow:visible;
    position:relative;
}


.member{
    background:#eee;   
    position:relative;
    z-index:   1;
    cursor:default;
    margin-top: 0px;
    border-bottom:solid 1px #000;
        cursor: pointer;
}
.member:after{
    display:block;
    position:absolute;
    left:50%;
    width:1px; 
    height:20px;
    background:#000;
    content:" ";
    bottom:100%;
}
.member:hover{
 z-index:   2;
}
.member .metaInfo{
    display:none;
    border:solid 1px #000;
    background:#fff;
    position:absolute;
    bottom:100%;
    left:50%;
    padding:5px;
    width:100px;
}
.member:hover .metaInfo{
    display:block;   
}
.member .metaInfo img{
  width:50px;
  height:50px; 
  display:inline-block; 
  padding:5px;
  margin-right:5px;
    vertical-align:top;
  border:solid 1px #aaa;
}</style>
<div class="page-content">
	<div class="page-header">
			<h1><?php echo $page_name;?> <small><i class="ace-icon fa fa-angle-double-right"></i>
			</small></h1>
	</div>
	
	<div class="row">
			<div class="col-xs-12">
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/user_tree" role="form">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User ID </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="userid" value="<?php //echo set_value('userid'); ?>" placeholder="User Id" class="col-xs-10 col-sm-5" >
							<?php //echo validation_errors();
							echo form_error('userid'); ?>
						</div>
				</div>
				<p class="center">OR</p>
				<div class="space-4"></div>
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Name </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" name="username" value="<?php //echo set_value('username'); ?>" placeholder="User Name" class="col-xs-10 col-sm-5" >
							<?php //echo validation_errors();
							//echo form_error('userid'); ?>
						</div>
				</div>
				<div class="space-4"></div>
				<input type="submit" class="btn btn-sm btn-success" value="Get Result"/>
				</form>

			</div>
	</div>

	<div>

	<?php //print_r($user);

$query = $this->db->query("SELECT user_id FROM users where user_name like '%user2%'");
//print_r($query->result_array());


	?>
	</div>
	<?php if(!empty($search_result)){
        foreach ($search_result as $namelist) {
            $url=base_url().'index.php/admin//child_list/'.$namelist['user_id'];
            echo "<a href='".$url."'><h4>".$namelist['user_name']." and his user id is ".$namelist['user_id']."</h4></a>";
        }
    } 

    ?>
</div>
<?php if($error_message!='') {?>
<h3 class="btn btn-danger"><?php echo $error_message;?></h3>
<?php } if($user){ ?> 
<?php 

							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$sponser_id);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
//print_r($member123);
$childlist=array();
//print_r($member123);
if(!empty($member123)){

foreach ($member123 as $key) {

	$this->db->select('a.user_name,b.sponser_id,b.user_id');
    $this->db->from('user_sponser b');
    $this->db->join('users a','a.user_id=b.user_id', 'full');
	$this->db->where("sponser_id",$key['user_id']);
	$query = $this->db->get(); 
	$a=$query->result_array();
        					
        					foreach ($a as $value) {
        					 $childlist[]=$value;
        					}
	
}
//print_r($childlist);

$member=array();
$member[0]=array('sponser_id'=>null,'user_name'=>$name[0]['user_name'],'user_id'=>$sponser_id);
$newarray1=array_merge($member123,$childlist);
$newarray2=array_merge($member,$newarray1);
//print_r($newarray2);

//print_r($newarray1);
$newarray=json_encode($newarray2);
}
//print_r($newarray);




        					
													
												?>
<h2 class="center">Your Sale History from Sponser Id <?php echo $sponser_id; ?> 
</h2>
<h2 class="center">Direct Entry = <?php echo $direct;?> and indirect Entry is <?php echo $indirect;?></h2>
<div class="col-xs-12 member1"><h4><?php echo "Name ".$name[0]['user_name']." and ";?>Sponser Id <?php echo $sponser_id;?> </h4>

</div>
<?php 

foreach ($user as $row) { ?>
<?php 

							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$row['user_id']);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
        					
													
												?>
	<!--<a href="<?php echo base_url().'index.php/admin/child_list/'.$row['user_id']; ?>" >
	<div class="col-xs-2 member">
	<h5>User Id <?php echo $row['user_id'];?></h5>
	<p><?php echo $name[0]['user_name']; ?></p>
	</div></a>-->



<?php } } ?>
<div id="mainContainer" class="clearfix">
</div>
<script type="text/javascript">
	/*var members = [
    {user_id : 1, sponser_id:null, amount:300, otherInfo:"blah1"},
    {user_id : 2, sponser_id:1, amount:300, otherInfo:"blah1"},
    {user_id : 3, sponser_id:1, amount:400, otherInfo:"blah2"},
    {user_id : 4, sponser_id:3, amount:500, otherInfo:"blah3"},
    {user_id : 6, sponser_id:1, amount:600, otherInfo:"blah4"},
    {user_id : 9, sponser_id:4, amount:700, otherInfo:"blah5"},
    {user_id : 12, sponser_id:2, amount:800, otherInfo:"blah6"},
    {user_id : 5, sponser_id:2, amount:900, otherInfo:"blah7"},
    {user_id : 13, sponser_id:2, amount:0, otherInfo:"blah8"},
    {user_id : 14, sponser_id:2, amount:800, otherInfo:"blah9"},
    {user_id : 55, sponser_id:2, amount:250, otherInfo:"blah10"},
    {user_id : 56, sponser_id:3, amount:10, otherInfo:"blah11"},
    {user_id : 57, sponser_id:3, amount:990, otherInfo:"blah12"},
    {user_id : 58, sponser_id:3, amount:400, otherInfo:"blah13"},
    {user_id : 59, sponser_id:6, amount:123, otherInfo:"blah14"},
    {user_id : 54, sponser_id:6, amount:321, otherInfo:"blah15"},
    {user_id : 53, sponser_id:56, amount:10000, otherInfo:"blah7"},
    {user_id : 52, sponser_id:2, amount:47, otherInfo:"blah17"},
    {user_id : 51, sponser_id:6, amount:534, otherInfo:"blah18"},
    {user_id : 50, sponser_id:9, amount:55943, otherInfo:"blah19"},
    {user_id : 22, sponser_id:9, amount:2, otherInfo:"blah27"},
    {user_id : 33, sponser_id:12, amount:-10, otherInfo:"blah677"}
    
];*/
var members=<?php echo $newarray; ?>;
//document.write(members.length);
//document.write(members[0].sponser_id);
var testImgSrc = "http://0.gravatar.com/avatar/06005cd2700c136d09e71838645d36ff?s=69&d=wavatar";
(function heya( sponser_id ){
    // This is slow and iterates over each object everytime.
    // Removing each item from the array before re-iterating 
    // may be faster for large datasets.
//var otherInfo='gautam chandra';

var amount=500;
    for(var i = 0; i < members.length; i++){
        var member = members[i];
        
        if(member.sponser_id === sponser_id){
//document.write("sponser id"+member.user_id);
var url="<?php echo base_url().'index.php/admin/child_list';?>";
   url1=url+'/'+member.user_id;
            var parent = sponser_id ? $("#containerFor" + sponser_id) : $("#mainContainer"),
                user_id = member.user_id,
                    metaInfo = member.user_name;
             //document.write('div'+parent);      
            parent.append("<div class='container' id='containerFor" + user_id + "'><a href='"+url1+"'><div class='member'>" + metaInfo + "<div class='metaInfo'>" + 'User Id '+user_id + "</div></div></a></div>");
            heya(user_id);
        } 
    }
 }(null));

// makes it pretty:
// recursivley resizes all children to fit within the parent.
var pretty = function(){
    var self = $(this),
        children = self.children(".container"),
        // subtract 4% for margin/padding/borders.
        width = (100/children.length) - 2;
    children
        .css("width", width + "%")
        .each(pretty);
    
};
$("#mainContainer").each(pretty);
    
</script>