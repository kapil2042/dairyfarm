<?php

$conn=mysqli_connect("localhost", "root", "", "dairyfarm");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1= "CREATE table logindetails (username varchar(50) primary key not null,password varchar(50
) not null,name varchar(50) not null,mobileNo varchar(10) not null)";

$sql2= "CREATE table fm (fmid int primary key not null AUTO_INCREMENT,cnum int not null,date_fm varchar(50
) not null,feedtime varchar(50) not null,empid int not null)";

$sql3= "CREATE table milk_coll (cid int not null,_date varchar(50
) not null,ava_milk varchar(50) not null,sold_milk float not null)";

$sql4= "CREATE table cow_info (cid int primary key not null AUTO_INCREMENT,gender varchar(50
) not null,dob varchar(50) not null,status varchar(50) not null)";

$sql5= "CREATE table staf_info (emp_id int primary key not null AUTO_INCREMENT,name varchar(50
) not null,mobile_number varchar(10) not null,salary varchar(50) not null)";

$sql6= "CREATE table milk (ava float not null,sold float not null)";
$sql9= "INSERT into milk values(0.0,0.0)";

$sql7= "CREATE table milk_sale (salem_cnm varchar(50) not null,salem_mn varchar(50
) not null,salem_qty int not null,salem_date varchar(50) not null)";

$sql8= "CREATE table cow_sale (sale_cid int not null,sale_amount float not null,sale_date varchar(50) not null,sale_cnm varchar(50) not null,sale_mn varchar(10) not null)";

mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);
mysqli_query($conn,$sql5);
mysqli_query($conn,$sql6);
mysqli_query($conn,$sql7);
mysqli_query($conn,$sql8);
mysqli_query($conn,$sql9);
header("location:index.php");
die();
?>