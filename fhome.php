<?php
session_start();
include("config.php");
if(!isset($_SESSION['fid']))
{
	header("location:index.php");
}
$fid=$_SESSION['fid'];

$a=mysqli_query($gmr,"SELECT name FROM faculty WHERE fid='$fid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faculty Home</title>
<link rel="stylesheet" type="text/css" href="scripts/styleASL.css" />
</head>

<body>
<span class="head" style="float:left;">Welcome <span style="color:black;font-size:28px;"><?php echo $name;?></span></span>

<span style="float:right;"><a href="logout.php"><b>Logout</b></a></span><br />

<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/>
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br>
<div align="center">
<span class="Subhead">Faculty Commands</span><hr size="1" style="color:#00F;" /><br />
<div style="position:absolute;right:590px;top:270px;">
	<img src="images/17.png" width="100px" height="100px"/><br><br>
<a href="ViewNoticesFaculty.php"><button class="button1"><b>View Notices</b></a><br />
</div>
<div style="position:absolute;right:350px;top:270px;">
	<img src="images/20.png" width="100px" height="100px"/><br><br>
<a href="ChangePasswordFaculty.php"><button class="button1"><b>Change Password</b></a><br />
</div>
<div style="position:absolute;right:800px;top:270px;">
	<img src="images/19.png" width="100px" height="100px"/><br><br>
<a href="ComplaintFaculty.php"><button class="button1"><b>Complaint Box</b></a><br />
</div>
</div>
</body>
</html>