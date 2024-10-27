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
<title>Admin Home</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>
<body >
<span class="head" style="float:left">Welcome To Admin Panel</span>
<span style="float:right;"><a href="logout.php"><b>Logout</b></a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/>
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<span class="Subhead">Admin Commands</span><hr size="1" style="color:#00F;" /><br /><br />
<div class="image3" style="position:absolute;right:680px;top:310px;">
	<img src="images/17.png" width="100px" height="100px"/><br><br>
<a href="notices.php"><button class="button1"><b>Online Notices</b></button></a>
</div>
<div class="image4"  style="position:absolute;left:220px;top:150px;">
	<img src="images/16.png" width="100px" height="100px"/><br><br>
<a href="manageStudent.php"><button class="button1"><b>Manage Student Account</b></button></a>
</div>
<div class="image5" style="position:absolute;left:220px;bottom:30px;">
	<img src="images/12.png" width="100px" height="100px"/><br><br>
<a href="manageFaculty.php"><button class="button1"><b>Manage Faculty Account</b></button></a>
</div>
<div class="image7"  style="position:absolute;right:220px;top:150px;">
	<img src="images/19.png" width="100px" height="100px"/><br><br>
<a href="Complaints.php"><button class="button1"><b>Manage Complaints</b></button></a>
</div>
<div class="image6" style="position:absolute;right:220px;bottom:30px;">
	<img src="images/20.png" width="100px" height="100px"/><br><br>
<a href="ChangePassword.php"><button class="button1"><b>Change Password</b></button></a>
<div class="image6" style="position:absolute;right:270px;bottom:95px;">
	<img src="images/sms3.png" width="100px" height="100px"/><br><br>
<a href="send_sms_multiple.php"><button class="button1"><b>SMS</b></button></a>
</div>
</div>
</body>
</html>