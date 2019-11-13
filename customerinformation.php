<?php
include "config.php";





?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<table width="200" border="1">
  <tbody>
    <tr>
	<td>Sipariş Veren</td>
      <td>Sipariş Listesi</td>
      <td>Fiyat</td>
      <td>İndirim</td>
      <td>Toplam Fiyat</td>
      <td>Bölge</td>
	 
	  <td>Sipariş Süresi</td>	
    </tr>
	  <?php
	  $siparisgetir=mysqli_query($baglan,"SELECT * from custominformation");
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
	  
	  
	 
		  ?>
  </tbody>
</table>

	
</body>
</html>