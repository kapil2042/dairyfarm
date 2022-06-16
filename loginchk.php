<?php 
	session_start();
	include 'connect.php';
	$unm=$_POST["lunm"];
	$pwd=$_POST["lpwd"];
	$cnt=0;
	$qry="SELECT * from logindetails;";
	$rs=mysqli_query($conn,$qry);
	while ($val=mysqli_fetch_assoc($rs)) {
		$u=$val["username"];
		$p=$val["password"];
		$m=$val["mobileNo"];
		if ($u==$unm || $m==$unm && $p==$pwd) {
			$_SESSION["nm"]=$val["name"];
			header("location:dashboard.php");
			die();
		}
		else {
			$cnt++;
		}
	}
	if($cnt!=0)
	{
		header("location:index.php?err=4");
		die();
	}
	if (mysqli_fetch_assoc($rs)==null) {
			header("location:index.php?err=4");
			die();
	}
?>