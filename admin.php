<?php
include "baglanti.php";
@session_start();
ob_start();
?>
<?php
if(empty($_SESSION["giris"]))
{
	echo "Giris yapilamadi";
	header("location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Emlak</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
    <div class="menu">
      <ul>
        <li><a href="?sayfa=ilanekle">Ilan ekle</a></li>
        <li><a href="?sayfa=ilanlar">Tüm ilanlar
          <!--[if IE 7]><!-->
          </a>
          <!--<![endif]-->
          <!--[if lte IE 6]><table><tr><td><![endif]-->
          <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li><a href="?sayfa=cikis">Çıkış
          <!--[if IE 7]><!-->
          </a>
          <!--<![endif]-->
          <!--[if lte IE 6]><table><tr><td><![endif]-->
          <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li><a href="?sayfa=anasayfa">Anasayfa</a></li>
       <li></li>
      </ul>
    </div>
  </div>
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_index_title">Ayarlama yapin</div>HOSGELDINIZ
      <div class="right_buttons">
        <div class="right_button"><a href="#">Add new offer</a></div>
        <div class="right_button"><a href="#">Delete Selected</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div id="admin_search_tab">
      <label class="search" style="padding-top:3px;">Search an offer: </label>
      <label class="search">
      <input type="text" name="search" class="search_input" />
      </label>
      <label class="search"><a href="#"><img src="images/adminicons/search.png" alt="" border="0" /></a> </label>
    </div>
    <div class="table_grid">
      <table cellspacing="0" cellpadding="0">
<tr>
          <th style="width:10px;">Sec</th>
          <th style="width:20px;"><a href="#" class="pink">ID</a></th>
          <th style="width:50px;"><a href="#" class="pink">Resim</a></th>
          <th style="width:auto;"><a href="#" class="pink">Baslik</a></th>
          <th style="width:auto;"><a href="#" class="pink">Aciklama</a></th>
          <th style="width:100px;"><a href="#" class="pink">Fiyat</a></th>
          <th style="width:50px;"><a href="#" class="pink">Duzenle</a></th>
          <th style="width:50px;"><a href="#" class="pink">Sil</a></th>
        </tr>
        <p>
          <?php
		$taban=mysql_query("select * from ilanlar ");
	while($listele=mysql_fetch_array($taban))
	{
		echo '<tr class="even">
          <td><input type="checkbox" name="checkbox" /></td>
          <td>'.$listele["id"].'</td>
          <td><img alt="" src="'.$listele["resim"].'" width="53" height="39" border="0" /></td>
          <td>'.$listele["baslik"].'</td>
          <td>'.$listele["detay"].'</td>
          <td><strong>'.$listele["ucret"].'</strong></td>
          <td><a href="?islem=duzenle&id='.$listele["id"].'"><img alt="" src="images/adminicons/edit.png" width="22" height="22" border="0" /></a></td>
          <td><a href="?islem=sil&id='.$listele["id"].'"><img alt="" src="images/adminicons/delete.png" width="24" height="24" border="0" /></a></td>
        </tr>';
	}
		?>
        <?php
		if(isset($_GET["sayfa"]))
		{
			$sayfa=$_GET["sayfa"];
			switch($sayfa) {
			case "ilanekle":include("inc/ilanekle.php");break;
			case "ilanlar":header("location:admin.php");break;
			case "cikis":include("inc/cikis.php");break;
			case "anasayfa":header("location:index.php");break;
			}
		}
		
		?>
          <?php
		if(isset($_GET["islem"]))
		{
			$islem=$_GET["islem"];
			switch($islem) 
			{
				case "sil":
				if(isset($_GET["id"]))
				{
					$hid=$_GET["id"];
				}
					$sorgu=mysql_query("DELETE FROM `vt_emlak`.`ilanlar` WHERE `ilanlar`.`id` =$hid");	
			
				if($sorgu){
				echo "Kayit silindi";header("location:admin.php");}
				else
				echo "Kayit silinemedi";
				break;
				case "duzenle":
				if(isset($_GET["id"]))
					{$hid=$_GET["id"];}
					echo '<form method="post" action="" enctype="multipart/form-data">
<div class="form_contact">
  <div class="adminform_row_contact">
    <label class="adminleft">Ba&#351;l&#305;k: </label>
    <label for="textfield"></label>
    <input type="text" name="txbaslik" id="textfield" />
          </div>
  <div class="adminform_row_contact">
    <label class="adminleft">K&#305;sa i&ccedil;erik: </label>
    <label for="textfield2"></label>
    <input type="text" name="txkisa" id="textfield2" />
          </div>
  <div class="adminform_row_contact">
            <label class="adminleft">&Uuml;cret: </label>
            <label for="textfield3"></label>
            <input type="text" name="txucret" id="textfield3" />
          </div>
          <div class="adminform_row_contact">
            <label class="adminleft">Resim: </label>
            <input type="file" name="dosya" id="dosya"/>
          </div>
          <div class="adminform_row_contact">
            <label class="adminleft">Detay: </label>
            <label for="textfield4"></label>
            <textarea name="txdetay" id="textfield4"></textarea>
          </div>
          <div style="float:right; padding:10px 25px 0 0;">
            <input type="submit" name="btGuncelle" id="btGuncelle" value="G&uuml;ncelle" />
          </div>
</div>
</form>';
if(isset($_POST["btGuncelle"]))
{
	extract($_POST);
	$sorgu=mysql_query("UPDATE `vt_emlak`.`ilanlar` SET `baslik` = '$txbaslik', `kisa_icerik` = '$txkisa', `detay` = '$txdetay', `ucret` = '$txucret' WHERE `ilanlar`.`id` =$hid");
	if($sorgu)
	{
		echo "Kayıt başarıyla güncellendi";
		header("location:admin.php");
	}
	else
	echo "Kayıt ne yazıktır ki güncellenemedi";
	
}
break;
                     
				}
		}	
		?>
        </p>
<p>&nbsp;</p>
<div class="admin_footer_help">Ho&#351;geldiniz admin sayfas&#305; istedi&#287;iniz ayarlamalar&#305; diledi&#287;iniz gibi yapabilirsiniz.</div>
  <!-- end of main_content -->
  <div id="footer">
    <div id="copyright">
      <div style="float:left; padding:3px;"><a href="#"><img src="images/footer_logo.gif" width="42" height="35" alt="" border="0" /></a></div>
      <div style="float:left; padding:14px 10px 10px 10px;"> Company name.&copy; All Rights Reserved 2008 - By <a href="http://csscreme.com" style="color:#772c17;">csscreme</a></div>
    </div>
    <ul class="footer_menu">
      <li><a href="#" class="nav_footer"> Home </a></li>
      <li><a href="#" class="nav_footer"> Selling Homes </a></li>
      <li><a href="#" class="nav_footer"> Buying Homes </a></li>
      <li><a href="#" class="nav_footer"> Renting Homes</a></li>
      <li><a href="#" class="nav_footer"> RSS </a></li>
      <li><a href="#" class="nav_footer"> Contact </a></li>
    </ul>
</div>
<!-- end of main_container -->
</body>
</html>
