<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Student Accounts</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head">Activate / Deactivate Student Accounts</span>
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />

<div align="center">
<span class="Subhead">All Students</span><br />
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th class="tableHead">Roll No.</th><th>Name</th><th>Email</th><th>Contact No.</th><th>Branch</th><th>Year</th><th>Status</th><th>Delete</th></tr>
<?php
include("config.php");
$a=mysqli_query($gmr,"SELECT * FROM registration ORDER BY roll ASC");
while($b=mysqli_fetch_array($a))
{
	?>
    
<tr class="labels" style="font-size:16px;"><td><?php echo $b['roll'];?></td><td><?php echo $b['name'];?></td><td><?php echo $b['email'];?></td><td><?php echo $b['contact'];?></td><td>
<?php echo $b['branch'];?></td><td><?php echo $b['cyear'];?></td><td>
<?php
if($b['status']==0)
{
	?><a href="activation.php?s=<?php echo $b['roll'];?>&p=1">Activate</a>
<?php 
} 
else
{
	?>
    <a href="activation.php?s=<?php echo $b['roll'];?>&p=0">Deactivate</a>
<?php
}
?>

</td><td><a href="delete.php?del=<?php echo $b['roll'];?>&p=1" onclick="return confirm('Are You Sure...?');" onmouseover="style.color='red'" onmouseout="style.color='brown'">Delete</td></tr>

<?php
}
?>




</table>
<a href="admin.php">Go Back</a>
</div>
</body>
</html>