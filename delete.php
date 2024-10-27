<?php
include("config.php");
$id=$_GET['del'];
$p=$_GET['p'];

if($p==1)
{
	$sql=mysqli_query($gmr,"DELETE FROM registration WHERE roll='$id'");
	header("location:manageStudent.php");
}
elseif($p==2)
{
	$sql=mysqli_query($gmr,"DELETE FROM faculty WHERE fid='$id'");
	header("location:manageFaculty.php");
}
?>