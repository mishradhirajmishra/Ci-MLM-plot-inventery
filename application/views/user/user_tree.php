<style type="text/css">#mainContainer{
    background:#438eb9;
    min-width:850px;
}
.container{
    text-align:center;
    
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
	
	<h3 class="center">Direct Entries <?php echo $direct;?></h3>
	<h3 class="center">In Direct Entries <?php if(!empty($indirect))
													echo $indirect[0];
													else
													echo 0;
													?></h3>
	<div class="row">

<?php 
//print_r($member123);
$user=$this->db->get_where('user_sponser',array('sponser_id'=>$sponser_id))->result_array();
if($user){
							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$sponser_id);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
        					$childlist=array();
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

//print_r($newarray);
													
												?>
<h2 class="center">Your Sale History from Sponser Id <?php echo $sponser_id; ?> 
</h2>

<div class="col-xs-12 member1"><h4><?php echo "Name ".$name[0]['user_name']." and ";?>Sponser Id <?php echo $sponser_id;?> </h4>

</div>
<?php 

/*foreach ($user as $row) { ?>
<?php 

							$this->db->select('user_name');
       						$this->db->from('users');
							$this->db->where("user_id",$row['user_id']);
							
        					$query = $this->db->get(); 
        					$name=$query->result_array();
        					
													
												?>
	<a href="<?php echo base_url().'index.php/user/child_list/'.$row['user_id']; ?>" ><div class="col-xs-2 member">
	<h5>User Id <?php echo $row['user_id'];?></h5>
	<p><?php echo $name[0]['user_name']; ?></p>
	</div></a>



<?php } */}else{
	echo "<h3>".$insert_message."</h3>";
	} ?>
	</div>
</div>
<div id="mainContainer" class="clearfix">
</div>
<script type="text/javascript">
	
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
var url="<?php echo base_url().'index.php/user/child_list';?>";
   url1=url+'/'+member.user_id;
            var parent = sponser_id ? jQuery("#containerFor" + sponser_id) : jQuery("#mainContainer"),
                user_id = member.user_id,
                    metaInfo = member.user_name;
             //document.write('div'+parent);      
            parent.append("<div class='container' id='containerFor" + user_id + "'><a href='"+url1+"'><div class='member'>" + user_id + "<div class='metaInfo'>" + metaInfo + "</div></div></a></div>");
            heya(user_id);
        } 
    }
 }(null));

// makes it pretty:
// recursivley resizes all children to fit within the parent.
var pretty = function(){
    var self = jQuery(this),
        children = self.children(".container"),
        // subtract 4% for margin/padding/borders.
        width = (100/children.length) - 2;
    children
        .css("width", width + "%")
        .each(pretty);
    
};
jQuery("#mainContainer").each(pretty);
    
</script>