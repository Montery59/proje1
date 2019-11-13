<?php	
$hata="";	
include "config.php";	
if(isset($_POST["loginname"]))
{$logingiris=md5($_POST["loginname"]);
if ($administrator==$logingiris){
			
header('Location:adminmenu.php');
		
}
else{
	$hata="Wrong Password";
	header('refresh:3;url=admin.php');
		
	}
	
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page</title>
</head>

<body>
	<div id="anatema">
		<div id="sol">Adminstrator Password:</div>
		<div id="sag1">
			<form method="post" action="#">
				<input type="password" name="loginname"/><br/>
				
				<input type="submit" value="Log in"/><br/>
				<span><?php echo $hata;?></span>
			</form>
		</div>
	</div>
</body>
</html>