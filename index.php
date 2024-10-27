<?php
session_start();
if(isset($_SESSION['sid']))
{
	header("location:shome.php");
}elseif(isset($_SESSION['fid']))
	{
		header("location:fhome.php");
	}elseif(isset($_SESSION['admin']))
		{
			header("location:admin.php");
		}

include("config.php");
$id=$_POST['id'];
$pass=$_POST['pass'];
$type=$_POST['type'];
if($type==1)
{
	$sql=mysqli_query($gmr,"SELECT * FROM registration WHERE (roll='".mysqli_real_escape_string($gmr,$id)."' AND password='".mysqli_real_escape_string($gmr,sha1($pass))."') AND status='1'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['id'];
		header("location:shome.php");
	}
	else
	{
		$info="Incorrect User ID or Password";
	}
}
elseif($type==2)
{
	$sql=mysqli_query($gmr,"SELECT * FROM faculty WHERE (fid='".mysqli_real_escape_string($gmr,$id)."' AND password='".mysqli_real_escape_string($gmr,sha1($pass))."') AND status='1'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['fid']=$_POST['id'];
		header("location:fhome.php");
	}
	else
	{
		$info="Incorrect User ID or Password";
	}
}elseif($type==3)
	{
	$sql=mysqli_query($gmr,"SELECT * FROM admin WHERE id='".mysqli_real_escape_string($gmr,$id)."' AND password='".mysqli_real_escape_string($gmr,sha1($pass))."'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['admin']=$_POST['id'];
		header("location:admin.php");
	}
	else
	{
		$info="Incorrect User ID or Password";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Notice Board</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
<style type="text/css">
td {vertical-align:top;}
</style>

</head>
<body >
	<div style="position:absolute;top:10px;right:500px;">
<div style="color:black;border:5px outset cyan;width:250px;height:90px;text-align:center;border-radius:40%;background:linear-gradient(blue,yellow,pink,white,cyan,green);">
<h1><b><i><u><big>Notice Board</b></i></u></big></h1>
</div>
</div><br><br><br><br><br><br>
<div align="center">
<br />
<marquee behavior="alternate" scrollamount="5" direction="left" class="marquee" onmouseover="this.stop();" onmouseout="this.start();">Welcome To GMR Notice Board...</marquee>
<br />
<form action="" method="post" >
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="Subhead"><i>Login</i></td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">User Type : </td><td><select name="type" class="fields"><option disabled="disabled" selected="selected">- Select User Type -</option><option value="1">Student</option><option value="2">Faculty</option><option value="3">Admin</option></select></td></tr>
<tr><td class="labels">User ID : </td><td><input name="id" type="text" class="fields" id="id" placeholder="Enter User ID" size="20"/></td></tr>
<tr><td class="labels">Password : </td><td><input name="pass" type="password" class="fields" id="pass" placeholder="Enter Password" size="20"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="button"/></td></tr>
</table>
</form><br />
<div class="i1">
	<img src="images/13.png" width="100px" height="100px"/><br><br>
	<a href="registration.php"><button class="button1">Student Registration</button></a>
</div>
<div class="i2">
	<img src="images/18.png" width="100px" height="100px"/><br><br>
<a href="facultyReg.php"><button class="button1">Faculty Registration</button></a>
</div>
</div>
<div style="position: absolute;bottom: 0;width:100vw;font-family: sans-serif;
  font-size: 36px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  
  opacity: 0.6;
  height:8%;

">
	<a href="https://formsubmit.co/el/tegahe"><b>Contact Us</b></a>
</div>
</body>
</html>