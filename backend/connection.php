<?php
$servername="localhost";
$username="root";
$password="";
$db="jobwalks";
$conn=new
mysqli($servername,$username,$password,$db);
if ($conn->connect_error) {
       die("connection failed :" .mysqli_connect_error());
}
echo "connected successfully";
?>