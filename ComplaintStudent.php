<?php
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$comp=$_POST['comp'];
$by=$_SESSION['sid'];
$date=date('d-M-Y');
if($comp==NULL)
{
	
}
else
{
	mysqli_query($gmr,"INSERT INTO complaints(complaint,byy,date,access) VALUES('$comp','$by','$date','0')");
	$info="Successfully Submitted Your Complaint ";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Box</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">Welcome To Complaint Box</span>
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<span class="Subhead">Submit Us Your Complaint</span><br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Complaint : </td><td><textarea name="comp" rows="5" cols="30" class="fields" style="height:70px;"></textarea></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="SEND" class="button" onclick="return confirm('After Submitting Your Complaint You Will Not Able To Delete or Modify it..');" /></td></tr>
</table>
</form>
<a href="shome.php">Go Back</a>

</div>
</body>
</html>