<?php
$error="";
$error1="";
include "config.php";

if(isset($_POST["loginenter"])){
	$logingiris=$_POST["logintext"];
	$loginsifre=$_POST["logintext"];

	$query="SELECT * from CustomerTable Where customerid='".$logingiris."'";
	$query="SELECT * from CustomerTable Where password='".$loginsifre."'";
	$sonuc=mysqli_fetch_array(mysqli_query($baglan,$query));
	if($sonuc>0){
		
		header("Location:customershow.php?id=$logingiris");
		
	}
	else{
		$error="Wrong Password or does not exist";
		header('refresh:3;url=custom.php');
		
	}
	
}
	if(isset($_POST["usernametext"])){
		
		$regiteruser=$_POST["usernametext"];
		$regiterpassword=$_POST["passwordtext"];
		if ($regiteruser==""){
			$error1="This part can not be empty";
		}else{
		$query2="SELECT * from customertable Where username='".$regiteruser."'";
		$sonuc1=mysqli_fetch_array(mysqli_query($baglan,$query2));
			if($sonuc1>0){
					$error1="New user saved";
				}
		else{
		$query1="INSERT INTO customertable (username,password) VALUES ('".$regiteruser."','".$regiterpassword."')";
		$sonuc=mysqli_query($baglan,$query1);
		if ($sonuc){
			$kayitid=mysqli_fetch_array(mysqli_query($baglan,"select customerid from customertable where username='".$regiteruser."' and password='".$regiterpassword."'"));
			$error1="Successfully registered <br>Your customer number is:=".$kayitid[0]."<br>You can use this number for login";
			

		}
		else{

			$error1="Can not registered";
		}

		}
	}
	
	}

?>
<!doctype html>
<html>
<center>
<head>
    
<link rel="stylesheet" type="text/css" href="deneme.css" />
<meta charset="utf-8">
<title>Customer</title>
   
</head>
    
<body>
	<div id="anatema2">
    	<div class="top">
            <form method="post" action="#">
            	Customer number: <input type="text" name="logintext"><br>
            	Password: <input type="text" name="logintext"><br>
            	<input type="submit" name="loginenter" value="Login"><br>
            	<span><?php echo $error;?></span>
            </form>
        </div>
        <div class="center">
<h2>If you visiting our website for the first time please register<h2>

           <div class="down">
			<form method="post" action="#">
                <div class="right">
					<span>Username : <input type="text" name="usernametext"></span>
					<span>password : <input type="text" name="passwordtext"></span>            
                </div>
                <div class="left">
					<input type="submit" name="registerenter" value="Register"><br>
                </div>
			</form>
        </div>  
        
        <div>
			<?php echo $error1;?>
        </div>
    </div>


		
</body>
        </center>
</html>