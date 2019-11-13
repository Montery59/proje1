<?php
$host="localhost";
$user="root";
$password="";
$dbname="deneme";
$baglan=mysqli_connect($host,$user,$password,$dbname);
$administrator=md5("anilkadirberkay");
if (!$baglan){
	
	echo "Connection Failed";
	
}
?>


