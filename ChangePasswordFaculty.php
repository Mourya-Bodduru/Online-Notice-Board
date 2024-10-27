<?php
session_start();
include("config.php");
if(!isset($_SESSION['fid']))
{
	header("location:index.php");
} 
$id=$_SESSION['fid'];
$a=mysqli_query($gmr,"SELECT * FROM faculty WHERE fid='$id'");
$b=mysqli_fetch_array($a);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	
}
else
{
if($old!=$pass)
{
	$info="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$info="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($gmr,"UPDATE faculty SET password='$p2' WHERE roll='$id'");
		$info="Successfully Changed your Password";
	}

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
const form=document.getElementById('form')
    if(form){
    form.addEventListener('submit',(e)=>{
 
    e.preventDefault()
    validate()
});}
 function validate(){
var pass=document.getElementById('p1');
var pass1=document.getElementById('p2');
const p1 = document.getElementById("p1");
const p2 = document.getElementById("p2");
const pp1 = p1.value;
const pp2 = p2.value;
const passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/;
if(p1.value.trim()==""){
  p1.style.border="solid 3px red"
document.getElementById("lb1").style.visibility="visible";
  return false;
}else if(p2.value.trim()==""){
 p2.style.border="solid 3px red"
      document.getElementById("lb2").style.visibility="visible";
  return false;
}
else if (!passwordReg.test(p1.value.trim())) {
    p1.style.border = "solid 3px red";
    document.getElementById("lb1").style.visibility = "visible";
    alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be 6-20 characters long.");
    return false;
  }
 else if (pp1 !== pp2) {
    alert("Passwords do not match correct your re type password");
lb2.innerText="please correct the retype password";
    document.getElementById("lb2").style.visibility="visible";
       return false;
  }}
  </script>
<title>Change Password Wizard</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">Change Password Wizard</span>
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form method="post" action="" onsubmit="return validate()">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Enter Old Password :</td><td><input type="password" name="old" size="25" class="fields" /></td></tr>
<tr><td class="labels">Enter New Password :</td><td><input type="password" name="p1" id="p1" size="25" class="fields"  /><label id="lb1" style="color:red; visibility:hidden;">Invalid</label></td></tr>
<tr><td class="labels">Re-Type New Password :</td><td><input type="password" name="p2" id="p2" size="25"  class="fields" /><label id="lb2" style="color:red; visibility:hidden;">Invalid</label></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="button" /></td></tr>
</table>
</form>
<a href="fhome.php">Go Back</a>

</div>
</body>
</html>