<?php
session_start();
include("config.php");
if(!isset($_SESSION['fid']))
{
	header("location:index.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Notices</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">View Notices</span>
<span style="float:right;"><a href="logout.php"><b>Logout</b></a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>Title</th><th>Notices</th><th>Download</th><th>Date</th></tr>
<?php
$sql=mysqli_query($gmr,"SELECT * FROM notices WHERE access='1' ORDER BY id DESC");
while($a=mysqli_fetch_array($sql))
{
	?>
<tr class="info"><td><?php echo $a['title'];?></td><td><?php echo $a['notice'];?></td><td><a href="asl_uploads/<?php echo $a['file'];?>">
<img src="images/dwd.png" height="30" width="30" /></a></td><td><?php echo $a['date'];?></td></tr>
<?php
}
$sf=mysqli_query($gmr,"SELECT * FROM notices WHERE access='2' ORDER BY id DESC");
while($a=mysqli_fetch_array($sf))
{
	?>
<tr class="info"><td><?php echo $a['title'];?></td><td><?php echo $a['notice'];?></td><td><a href="asl_uploads/<?php echo $a['file'];?>">
<img src="images/dwd.png" height="30" width="30" /></a></td><td><?php echo $a['date'];?></td></tr>
<?php
}
?>
</table>
<a href="fhome.php">Go Back</a>
</div>
</body>  
</html>