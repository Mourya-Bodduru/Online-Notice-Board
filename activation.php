<?php
include("config.php");
$id=$_GET['s'];
$p=$_GET['p'];

if($p==1)
{
	$sql=mysqli_query($gmr,"UPDATE registration SET status='1' WHERE roll='$id'");	
	header("location:manageStudent.php");
}elseif($p==0)
	{
		$sql=mysqli_query($gmr,"UPDATE registration SET status='0' WHERE roll='$id'");
		header("location:manageStudent.php");
	}elseif($p==3)
		{
			$sq=mysqli_query($gmr,"UPDATE faculty SET status='1' WHERE fid='$id'");
			header("location:manageFaculty.php");
		}elseif($p==4)
			{
				$sq=mysqli_query($gmr,"UPDATE faculty SET status='0' WHERE fid='$id'");
				header("location:manageFaculty.php");
			}
	
if($sql)
{
	header("location:manageStudent.php");
}elseif($sq)
	{
		header("location:manageFaculty.php");
	}else
	{
		header("location:admin.php");
	}
?>