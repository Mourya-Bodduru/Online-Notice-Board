<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
$notice=$_POST['notice'];
$title=$_POST['title'];
$date=date('d-M-Y');
$access=$_POST['access'];
if($notice==NULL || $title==NULL || $access==NULL)
{
	
}
else
{
	$extension = end(explode(".", $_FILES["file"]["name"]));
	$filename="$title".".$extension";
	move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_file/$filename"); 
	mysqli_query($gmr,"INSERT INTO notices(title,notice,file,date,access) VALUES('$title','$notice','$filename','$date','$access')");
	$info="Successfully Submitted Notice";

}
$del=$_GET['del'];
if($del==NULL)
{
	
}
else
{
	mysqli_query($gmr,"DELETE FROM notices WHERE id='$del'");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notice Control Panel</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
const form=document.getElementById('form')
    if(form){
    form.addEventListener('submit',(e)=>{

    e.preventDefault()
    validate()
});}

function validate(){
var title=document.getElementById('title'); 
var notice=document.getElementById('notice');
if(title.value.trim()==""){
  title.style.border="solid 3px red"
  document.getElementById("lb1").style.visibility="visible";
  return false;
}
else if(notice.value==""){ 
  notice.style.border="solid 3px red"
document.getElementById("lb2").style.visibility="visible";
return false;}
}
</script>
</head>
<body>
<span class="head">Online Notice Control</span>
<span style="float:right;"><a href="logout.php"><b>Logout</b></a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" onsubmit="return validate()" >
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2">
<span class="Subhead">Add Notice</span>
<hr />
</td></tr>
<tr><td colspan="2" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Access Type</td><td><select name="access" class="fields"><option disabled="disabled" selected="selected">- Select Access Type - </option><option value="0">Student</option><option value="1">Faculty</option><option value="2">Student and Faculty</option></select></td></tr>
<tr><td class="labels">Title</td><td><input name="title" type="text" class="fields" id="title" placeholder="Enter Title" size="45" /><label id="lb1" style="color:red; visibility:hidden;">Invalid Title</label></td></tr>
<tr><td class="labels">Notice</td><td><textarea name="notice" cols="35" class="fields" id="notice" minlength="10" style="height:70px;font-family:'trebuchet MS';" placeholder="Enter Notice"></textarea><label id="lb2" style="color:red; visibility:hidden;">Invalid Notice</label></td></tr>
<tr><td class="labels">Upload File</td><td><input type="file" name="file" size="45" class="button" placeholder="Select Document or Image File"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button" onclick="return confirm('Are You Sure...?');"/></td></tr>
</table> 
</form>
<br>
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>ID</th><th>Title</th><th>Notice</th><th>Access Type</th><th>Download</th><th>Action</th></tr>
<?php 
$a=mysqli_query($gmr,"SELECT * FROM notices ORDER BY id DESC");
while($b=mysqli_fetch_array($a))
{
	?>
<tr class="info"><td><?php echo $b['id'];?></td><td><?php echo $b['title'];?></td><td><?php echo $b['notice'];?></td>
<td>
<?php 
if($b['access']==0){echo "Student";}elseif($b['access']==1){echo "Faculty";}else{echo "Student and Faculty";}
?>
</td><td align="center"><a href="uploaded_files/<?php echo $b['file'];?>"><img src="images/dwd.png" height="30" width="30" /></a></td>
<td>
<a href="edit.php?edit=<?php echo $b['id'];?>" style="text-shadow:0px 0px 1px #000000;">Edit</a>
<a href="notices.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');" style="text-shadow:0px 0px 1px #000000;">Delete</a>
</td></tr>
<?php } ?> 
</table>
<a href="admin.php">Go Back</a>
</div>
</body>
</html>