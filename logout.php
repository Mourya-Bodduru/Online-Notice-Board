<?php
session_start();
unset($_SESSION['sid']);
unset($_SESSION['fid']);
unset($_SESSION['admin']);
session_destroy();
header("location:index.php");
?>