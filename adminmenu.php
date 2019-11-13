<?php 
include "config.php";
$hata="";

if(isset($_GET["id"])){
	$customerid=$_GET["id"];
	
	
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
</head>
	
<body id="anatema">
		<form action="#" method="post">
		
         <select name="secim" id="select">
           <option value="yok">Seçiminiz</option>
           <option value="kul">Kullanıcılar</option>
           <option value="urun">Ürünler</option>
           <option value="rapor">Raporlar</option>
         </select>
			<input type="submit" name="gonder" value="Görüntüle" />
		  <span style="color: red;"><?php echo $hata; ?></span>
</form>
	
		
        
		
		    
	      
</body>
	</html>


<?php






if (isset($_POST["gonder"])){
	if ($_POST["secim"]=="kul"){
		echo "<table border=\"1\" >
		  <tbody>
		    <tr>
			<td>Sıra No</td>
		      <td>Kullanıcı ID</td>
		      <td>Kullanıcı Adı</td>
		      <td colspan=\"2\">Sifresi</td>
	        </tr>";
	$sor=mysqli_query($baglan,"select * from customertable");
	$say=0;	
		while($kayit=mysqli_fetch_array($sor)){
			$say++;
			echo "<tr>
			  <td>".$say."</td>
		      <td>".$kayit["customerid"]."</td>
		      <td>".$kayit["username"]."</td>
		      <td>".$kayit["password"]."</td>
			  
			  <td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"silinecek\" value=".$kayit["customerid"]."> <input type=\"submit\" value=\"sil\" name=\"sil\" /></form>
	        </tr>";
		}
		echo "</tbody>
</table>";
	
	
}
}

if(isset($_POST["sil"])){
	$sill=mysqli_query($baglan,"delete from customertable where customerid='".$_POST["silinecek"]."'");
		if($sill)	{echo "<table border=\"1\" >
		  <tbody>
		    <tr>
			 <td>Sıra No</td>
		      <td>Kullanıcı ID</td>
		      <td>Kullanıcı Adı</td>
		      <td colspan=\"2\">Adersi</td>
	        </tr>";
	$sor=mysqli_query($baglan,"select * from customertable");
					 $say=0;
		while($kayit=mysqli_fetch_array($sor)){
			$say++;
			echo "<tr>
				<td>".$say."</td>
		      <td>".$kayit["customerid"]."</td>
		      <td>".$kayit["username"]."</td>
		      <td>".$kayit["password"]."</td>
			  
			  <td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"silinecek\" value=".$kayit["customerid"]."> <input type=\"submit\" value=\"sil\" name=\"sil\" /></form>
	        </tr>";
		}
		echo "</tbody>
</table>";
}}
if (isset($_POST["gonder"])){
	if ($_POST["secim"]=="yok"){
		$hata="Lütfen Seçiminizi Yapınız";
		
		
		
}}
if (isset($_POST["gonder"])){
	if ($_POST["secim"]=="urun"){
	 	
		echo " <form action=\"#\" method=\"post\">
				
				<input type=\"radio\" name=\"radio\" value=\"devices\">ElectronicDevices</br>
				<input type=\"submit\" name=\"goruntule\" value=\"Ekle\">
				</form>";
		
		
		
	}}

//Deviceslar
if(isset($_POST["guncellet4"])){
	$sor=mysqli_query($baglan,"UPDATE electronicdevices set Names='".$_POST["Names"]."',price='".$_POST["price"]."',Availability='".$_POST["avaliable"]."' where Names='".$_POST["devicesguncelle"]."'");
	
	
	
}
if(isset($_POST["guncellet3"])){
	$sor=mysqli_query ($baglan,"SELECT * from electronicdevices where Names='".$_POST["guncelledevices"]."'");
	while($kayit=mysqli_fetch_array($sor)){
		echo "
	<form action=\"#\" method=\"post\">
		Devices Name:<input type=\"text\" name=\"Names\" value=\"".$kayit["Names"]."\">
		Price:<input type=\"text\" name=\"price\"value=\"".$kayit["price"]."\">
		Availability:<input type=\"text\" name=\"avaliable\"value=\"".$kayit["Availability"]."\">
		<input type=\"hidden\" name=\"devicesguncelle\" value=\"".$kayit["Names"]."\">
		<input type=\"submit\" name=\"guncellet4\" value=\"guncelle\"></form></br>";
		
		
	}	
		echo "<table border=\"1\" >
		  <tbody>
		    <tr>
			<td>Sıra No</td>
		      <td>Devices Name</td>
		      <td>Price</td>
		      <td>Availability</td>
			  <td colspan=\"2\"> İşlemler</td>
	        </tr>";
		
	$sor=mysqli_query($baglan,"select * from electronicdevices");
	$say=0;	
		while($kayit=mysqli_fetch_array($sor)){
			$say++;
			echo "<tr>
			  <td>".$say."</td>
		      <td>".$kayit["Names"]."</td>
		      <td>".$kayit["price"]."</td>
		      <td>".$kayit["Availability"]."</td>
			  <td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"silinecek\" value=\"".$kayit["Names"]."\"> <input type=\"submit\" value=\"sil\" name=\"sildevices\" /></form>
		<td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"guncelledevices\" value=\"".$kayit["Names"]."\"> <input type=\"submit\" value=\"güncelle\" name=\"guncelle3\" /></form>
			  
			  
	        </tr>";
		}
		echo "</tbody>
</table>";
	
	
}
if(isset($_POST["goruntule"])){
	if($_POST["radio"]=="devices"){
	echo "<form action=\"#\" method=\"post\">
		Devices Name:<input type=\"text\" name=\"Names\">
		Price:<input type=\"text\" name=\"price\">
		Availability:<input type=\"text\" name=\"avaliable\">
		
		<input type=\"submit\" name=\"goruntule2\" value=\"Ekle\"></br>";
		echo "<table border=\"1\" >
		  <tbody>
		    <tr>
			<td>Sıra No</td>
		      <td>Devices Name</td>
		      <td>Price</td>
		      <td>Availability</td>
			  <td colspan=\"2\"> İşlemler</td>
	        </tr>";
		
	$sor=mysqli_query($baglan,"select * from electronicdevices");
	$say=0;	
		while($kayit=mysqli_fetch_array($sor)){
			$say++;
			echo "<tr>
			  <td>".$say."</td>
		      <td>".$kayit["Names"]."</td>
		      <td>".$kayit["price"]."</td>
		      <td>".$kayit["Availability"]."</td>
			  <td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"silinecek\" value=\"".$kayit["Names"]."\"> <input type=\"submit\" value=\"sil\" name=\"sildevices\" /></form>
		<td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"guncelledevices\" value=\"".$kayit["Names"]."\"> <input type=\"submit\" value=\"güncelle\" name=\"guncellet3\" /></form>
			  
			  
	        </tr>";
		}
		echo "</tbody>
</table>";
		

		
		
		
	}
}
if(isset($_POST["sildevices"])){
	$sill=mysqli_query($baglan,"delete from electronicdevices where Names='".$_POST["silinecek"]."'");
		if($sill)	{echo "<table border=\"1\" >
		
		  <tbody>
		    <tr>
			<td>Sıra No</td>
		      <td>Devices Name</td>
		      <td>Price</td>
		      <td>Availability</td>
			  <td colspan=\"2\"> İşlemler</td>
	        </tr>";
	$sor=mysqli_query($baglan,"select * from electronicdevices");
	$say=0;	
		while($kayit=mysqli_fetch_array($sor)){
			$say++;
			echo "<tr>
			  <td>".$say."</td>
		      <td>".$kayit["Names"]."</td>
		      <td>".$kayit["price"]."</td>
		      <td>".$kayit["Availability"]."</td>
			  <td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"silinecek\" value=".$kayit["Names"]."> <input type=\"submit\" value=\"sil\" name=\"sildevices\" /></form>
		<td><form action=\"#\" method=\"post\"><input type=\"hidden\" name=\"guncelledevices\" value=".$kayit["Names"]."> <input type=\"submit\" value=\"güncelle\" name=\"guncellet\" /></form>
			  
			  
	        </tr>";
		}
		echo "</tbody>
</table>";
}}




if(isset($_POST["goruntule2"])){
	$sor=mysqli_query($baglan, "INSERT INTO electronicdevices (Names,price,Availability) VALUES ('".$_POST["Names"]."','".$_POST["price"]."','".$_POST["avaliable"]."')");
	
}


if (isset($_POST["gonder"])){
	if ($_POST["secim"]=="rapor"){
		echo "<form action=\"#\" method=\"post\">Start Date:<input type=\"date\" name=\"ilktarih\">
  <br>End Date:<input type=\"date\" name=\"sontarih\">
  <input type=\"submit\" name=\"hesapla\" Value=\"Hesapla\"></form>  
  ";
	}}
if(isset($_POST["hesapla"])){
	$sor1=mysqli_query($baglan,"SELECT * FROM pricetable WHERE Date BETWEEN '".$_POST["ilktarih"]."' and '".$_POST["sontarih"]."'");
	$gross=0;
	$net=0;
	while($kayit=mysqli_fetch_array($sor1)){
	$gross+=$kayit["totalprice"];
		
	$net+=($kayit["totalprice"]-($kayit["totalprice"]*$kayit["discount"]));
	}
	
	echo "Start Date:<input type=\"date\" name=\"ilktarih1\" disabled=\"disabled\"value=\"".$_POST["ilktarih"]."\">
  <br>End Date:<input type=\"date\" name=\"sontarih1\"disabled=\"disabled\"value=\"".$_POST["sontarih"]."\"><br>
  Total Sale:<input type=\"text\" name=\"tatal\"disabled=\"disabled\"value=\"".$gross."\"><br>
  Gross Profit:<input type=\"text\" name=\"gross\"disabled=\"disabled\" value=\"".$gross."\"><br>
  Net Income:<input type=\"text\" name=\"net\"disabled=\"disabled\"value=\"".$net."\">";
	$gir=mysqli_query($baglan,"insert into ProfitTable (totalsale,grosssale,netincome,startdate,enddate) values ('".$gross."','".$gross."','".$net."','".$_POST["ilktarih"]."','".$_POST["sontarih"]."')");
}


?>