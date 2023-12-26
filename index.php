<?php
@session_start();
include "baglanti.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Emlak</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8";/>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="resimler/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
    <div class="menu">
      <ul>
        <li><a href="?sayfa=anasayfa">Anasayfa</a></li>
        <li><a href="?sayfa=soneklenen">Son Eklenenler</a>
        </li>
        <li><a href="?sayfa=tumilanlar">Tüm Ilanlar </a>
        <li>
          <?php if(!empty($_SESSION["giris"]))
		{
			echo  '<li><a href="?sayfa=cikis">Cikis</a>';
			echo  '<li><a href="?sayfa=adminkisim">Admin ilan</a>';
		}
		else
		{
			echo '<li><a href="?sayfa=giris">Giris</a>';
		}
		?>
      </ul>
    </div>
  </div>
  <div id="main_content"><form method="post" action="">
    <div class="column1">
      <div class="left_box">
        <div class="top_left_box"> </div>
        <div class="center_left_box">
          <div class="box_title">Arama yap:</div>
          <div class="form">
            <div class="form_row">
              <label class="left">&#304;lan başlığı: </label>
              <label for="textfield"></label>
              <input type="text" name="txbaslik" id="textfield" />
            </div>
            <div class="form_row">
              <label class="left">Fiyat( En düşük): </label>
              <label for="textfield2"></label>
              <input type="text" name="txfiyat" id="textfield2" />
            </div>
            <div class="form_row">
            </div>
            <div style="float:right; padding:10px 25px 0 0;">
              <input type="submit" name="btAra" id="btAra" value="Ara" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
	if(isset($_POST["btAra"]))
	{
	   extract($_POST);
	   $sorgu=mysql_query("select * from ilanlar where baslik like '%$txbaslik%'");
	   $satir=mysql_num_rows($sorgu);
	   echo "<br>";
	   if($satir>0)
	{
		   	while($listele=mysql_fetch_array($sorgu))
	   {
		 echo '<div class="column4"><div class="title">
         <p>Arama Sonuçları</p>
          <p>   </p>
         </div>';
	  	  echo '<div class="offer_box_wide"> <a href="#"><img src='.$listele["resim"].' width="130" height="98" class="img_left" alt="" 					       	border="0" /></a>
          <div class="offer_info"> <span>'.$listele["baslik"].'</span>
          <p class="offer">'.$listele["kisa_icerik"].'</p>
          <div class="more"><a href="#">...more</a></div>
          </div>
      	  </div>';
	   }
	}
	   else
	   {
		   echo "Kayıt bulunamadı";
	   }
	   
	}	
	?>
    </form>
  <!-- end of column one --><!-- end of column two --><!-- end of column three -->
<div class="column4"><div class="title">
        <p>İçerik</p>
        <p>   </p>
      </div>
  <p>
  <br>
  <?php
include "baglanti.php";
@session_start();
?>
  <?php
if(isset($_GET["sayfa"]))
{
	$sayfa=$_GET["sayfa"];
	switch($sayfa)
	{
		case "tumilanlar": include ("tumilanlar.php"); break;
		case "giris": include ("giris.php"); break;
		case "soneklenen": include ("soneklenen.php"); break;
		case "cikis":include("inc/cikis.php");break;
		case "adminkisim":header("location:admin.php");break;
		default: include ("anasayfa.php");
		}
	
	}
else{
	include ("anasayfa.php");
	
	}

?>
    
    
    
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><!-- end of column four --><!-- end of main_content -->
</p>
<div id="footer">
  <div id="copyright">
      <div style="float:left; padding:3px;"><a href="#"><img src="resimler/footer_logo.gif" width="42" height="35" alt="" border="0" /></a></div>
      <div style="float:left; padding:14px 10px 10px 10px;"> Company name.&copy; All Rights Reserved 2008 - By <a href="http://csscreme.com" style="color:#772c17;">csscreme</a></div>
    </div>
<!-- end of main_container --></div>

</body>
</html>
