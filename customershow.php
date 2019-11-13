<?php 
include "config.php";
if(isset($_GET["id"])){
	$customerid=$_GET["id"];
}
?>
<!doctype html>
<html>
    <center>
<head>
<meta charset="utf-8">
<title>Customer Page</title>
</head>

<body>
<h1>Welcome Electronic Devices shop website.<h1>	
	<div id="anatema">
		<div id="ust">
			Region:<br>
			
			<?php 
	$query="SELECT Region from regiontable";
	$sonuc=mysqli_query($baglan,$query);
			
			echo "<form method=\"post\" action=\"#\">";
			while($kayit=mysqli_fetch_array($sonuc)){
				echo "<input class=\"regionlist\"  type=\"radio\" name=\"region\" value=\"".$kayit[0]."\">".$kayit[0];
				
				
			}
			echo "<br/>";
			echo "Type of Ordering:<br/>";
			$query="SELECT orderinglist from typeordering";
			$sonuc=mysqli_query($baglan,$query);
			$say=0;
			while($kayit=mysqli_fetch_array($sonuc)){
				echo "<input class=\"orderinglist\"  type=\"checkbox\" name=\"orderlist".$say."\" value=\"".$kayit[0]."\">".$kayit[0];
				$say++;
				
			}
			echo " 
				<input type=\"hidden\" name=\"idmiz\" value=\"".$customerid."\">
				<br/><input class=\"gonder\" name=\"gondercek\" type=\"submit\" value=\"gonder\"> </form>";
				
			?>
</center>
</body>
</html>
<?php
if (isset($_POST["gondercek"])){
		echo "<form method=\"post\" action=\"#\">";
	
	if(isset($_POST["orderlist0"])){
		$query="SELECT * from electronicdevices";
			$sonuc=mysqli_query($baglan,$query);
		$say=0;
			while($kayit=mysqli_fetch_array($sonuc)){
				$kalandevices1=mysqli_fetch_array(mysqli_query($baglan, "SELECT Availability from electronicdevices where Names='".$kayit["Names"]."'"));	
				if ($kalandevices1[0]>'0'){
				echo "<input class=\"deviceslist\"  type=\"checkbox\" name=\"deviceslist".$say."name\" value=\"".$kayit["Names"]."\">".$kayit["Names"]."
				<input class=\"deviceslist\"  type=\"radio\" name=\"deviceslist".$say."price\" value=\"".$kayit["price"]."\">".$kayit["price"]." TL
				<input class=\"deviceslist\"  type=\"text\" name=\"deviceslist".$say."no\" value=\"".$kayit["number"]."\">
				<input class=\"deviceslist\"  type=\"text\" name=\"deviceslist\" value=\"".$kayit["Availability"]."\" disabled=\"disabled\">
				
				<br />";
				$say++;}
	}echo "<input type=\"hidden\" name=\"devicessay\" value=\"".$say."\">";}
	echo "<br/>";
	if (isset ($_POST["region"])){
		echo "<input type=\"hidden\" name=\"bolge\" value=\"".$_POST["region"]."\">";} echo"
	
	<input type=\"hidden\" name=\"idmiz2\" value=\"".$_POST["idmiz"]."\">
	<input class=\"siparisver\" name=\"siparisver\" type=\"submit\" value=\"Satın Al\"> </form>";
	
}
	
//if (isset($_POST["siparisver"])){
	
	//$customerid=$_POST["customerid"];
	

	
	




if(isset($_POST["siparisver"])){
	
$vcustomerid=$_POST["idmiz2"];

	if(isset($_POST["devicessay"])){
	$devicessay=	$_POST["devicessay"];
	
}
	
	
	$devicesad=[];
	
	$devices=[];
	

	if(isset($devicessay)){
	$toplamdevices=0;
	$devicessayim=[];
		
	for($i=0;$i<$devicessay+1;$i++){
		
		if(isset($_POST["deviceslist".$i."name"]) and isset($_POST["deviceslist".$i."no"])){
			$sipdevices=$_POST["deviceslist".$i."name"]."(".$_POST["deviceslist".$i."no"]." adet)";
			
			
			array_push($devicesad,$_POST["deviceslist".$i."name"]);
			array_push($devicessayim,$_POST["deviceslist".$i."no"]);
			
			$toplamdevices+=$_POST["deviceslist".$i."price"]*$_POST["deviceslist".$i."no"];
		}
	}
	
}
	
	
	$toplamprice=0;
	
	if(isset($toplamdevices)){
	$toplamprice+=$toplamdevices;	
	}
	
	$discount=0;
	if($toplamprice<70 && $toplamprice>50){
		$discount=0.15;
	}
	if($toplamprice>70){
		$discount=0.2;
	}if($toplamprice==50){
		$discount=0.1;
	}

	
	
	
	if(isset($electronicdevices)){
		
		$stringt = implode(',', $electronicdevices);	
		
	}
	
	$sonsiparis='';
	if(isset($stringp)){
		$sonsiparis=$sonsiparis.$stringp;
	}
	if(isset($stringt)and isset($sonsiparis)){
		$sonsiparis=$sonsiparis." ".$stringt;
	}
	if(isset($stringt) and $sonsiparis==null){
		$sonsiparis=$sonsiparis.$stringt;
	}
	if(isset($stringi)and isset($sonsiparis)){
		$sonsiparis=$sonsiparis." ".$stringi;
	}
	if(isset($stringi) and $sonsiparis==null){
		$sonsiparis=$sonsiparis.$stringi;
	}
	
	
	$toplamprice2=$toplamprice-($toplamprice*$discount);
	$bolge=$_POST["bolge"];
	$sorgu2=mysqli_fetch_array(mysqli_query($baglan,"SELECT Estimatedtime from regiontable WHERE Region='".$bolge."'"));
	$teslimsuresi=$sorgu2[0];
	$sorgu="INSERT INTO pricetable (customerid,totalprice,discount,Date) VALUES ('".$vcustomerid."','".$toplamprice."','".$discount."','".date('Y-m-d')."')";
	$sql=mysqli_query($baglan,$sorgu);
	$query=mysqli_query($baglan,"INSERT INTO custominformation (id,bolge,siparissuresi,toplamfiyat,indirim,fiyat,siparislistesi) VALUES ('".$vcustomerid."','".$_POST["bolge"]."','".$teslimsuresi."','".$toplamprice2."','".$discount."','".$toplamprice."','".$sonsiparis."')");
	//-----------------------------------------------------------------------------
	
	if(isset($devicesad)){
		$i=0;
		foreach($devicesad as $devicesim){
			$mevcutdevices=mysqli_fetch_array(mysqli_query($baglan,"select Availability from electronicdevices where Names='".$devicesim."'"));
			$kalandevices=$mevcutdevices[0]-$devicessayim[$i];
			$i++;			
			$yaz=mysqli_query($baglan,"update electronicdevices set Availability='".$kalandevices."' where Names='".$devicesim."'");
		}
	}
	
	
	echo "<table width=\"800\" border=\"1\">
  <tbody>
    <tr>
	
      <td>Siparis</td>
      <td>Fiyat</td>
      <td>İndirim</td>
      <td>Toplam Fiyat</td>
      <td>Bölge</td>
	 
	  <td>Sipariş Süresi</td>	
    </tr>";
	 
	  $siparisgetir=mysqli_query($baglan,"SELECT * FROM custominformation where sid IN ( SELECT MAX(sid) FROM custominformation where id='".$vcustomerid."' GROUP BY id )");
	  if(isset($siparisgetir)){
		  while($kayit=mysqli_fetch_array($siparisgetir)){
			 $kisim=(mysqli_query($baglan,"SELECT username from customertable WHERE customerid='".$kayit["id"]."'"));
			while($kisi=mysqli_fetch_array($kisim)) {
				echo  "<tr>
      <td>".$kisi[0]."</td>";
			} 
		  echo"
   
      <td>".$kayit["siparislistesi"]."</td>
	  <td>".$kayit["fiyat"]."TL</td>
	  <td>".$kayit["indirim"]."%</td>
	  <td>".$kayit["toplamfiyat"]."TL</td>
	  <td>".$kayit["bolge"]."</td>
	  <td>".$kayit["siparissuresi"]."</td>
      
    </tr>";  
		  }
		  
		  
	  }
	  
	  
	 
echo "		 
  </tbody>
</table>";

	
}
	
	
	
	
	
	
	
?>