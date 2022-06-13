<?php
	include "connect.php";
	$ynm=$_POST["ynm"];
	$mn=$_POST["mn"];
	$unm=$_POST["unm"];
	$pwd=$_POST["pwd"];
	$cpwd=$_POST["cpwd"];

	if ($pwd == $cpwd) {
		$qry="INSERT into logindetails(username,password,name,mobileNo) values('$unm','$pwd','$ynm','$mn');";
	}
	else{
		header("location:index.php?err=1");
		die();
	}
	$rs=mysqli_query($conn,$qry);
	if ($rs>0) {
		header("location:index.php?err=2");
		die();
	}
	else{
		header("location:index.php?err=3");
		die();
	}
?>