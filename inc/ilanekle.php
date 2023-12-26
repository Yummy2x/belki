<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BuildUp Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="file:///C|/Users/Ahmet/Documents/Desktop/real-estate/real-estate/style.css" />
<link rel="stylesheet" type="text/css" href="file:///C|/Users/Ahmet/Documents/Desktop/real-estate/real-estate/admin.css" />
</head>
<body>
<div id="main_container">
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_editoffer_title">Ekle</div>
      <div class="right_buttons"></div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
    <form method="post" enctype="multipart/form-data">
      <div class="form_contact">
        <div class="adminform_row_contact">
          <label class="adminleft">Baslik: </label>
          <label for="txbaslik"></label>
          <input type="text" name="txbaslik" id="txbaslik" />
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">K&#305;sa &#304;&ccedil;erik: </label>
          <label for="txkisa"></label>
          <input type="text" name="txkisa" id="txkisa" />
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">&Uuml;cret: </label>
          <label for="txucret"></label>
          <input type="text" name="txucret" id="txucret" />
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">Resim: </label>
          <input type="file" name="dosya" id="dosya" />
        </div>
        <div class="adminform_row_contact">
          <p>
            <label class="adminleft">Detay: </label>
            <label for="txdetay"></label>
            <textarea name="txdetay" id="txdetay"></textarea>
            <input name="btEkle" type="submit" id="bt_ekle" value="Ekle" />
          </p>
          <p>&nbsp; </p>
        </div>
        <p>&nbsp;</p>
      </div>
      </form>
      <?php
if(isset($_POST["btEkle"]))
{
	extract($_POST);
	$kaynak=$_FILES["dosya"]["tmp_name"];
	$resim=$_FILES["dosya"]["name"];
	$boyut=$_FILES["dosya"]["size"];
	$true=$_FILES["dosya"]["type"];
	$uzanti=substr($resim,strpos($resim,".")+1);
	$yeniad=substr(uniqid(md5(rand())),0,35).'.'.$uzanti;
	$hedef="upload/";
	if($kaynak)
	{
		if($true=="upload/jpeg" || $true=="upload/png" || $true=="upload/gif") {}
		else
		{
			"Bir resim dosyasi yükleyiniz";
		}
		if($boyut<1024*1024)
		{
			if(move_uploaded_file($kaynak,$hedef.$yeniad))
			{
				$ekle=mysql_query("INSERT INTO `vt_emlak`.`ilanlar` (`id`, `baslik`, `kisa_icerik`,resim,`detay`,`ucret`) VALUES (NULL, 	                '$txbaslik', '$txkisa','upload/$yeniad','$txdetay', '$txucret')");
				if($ekle)
				{
					echo "Dosyaniz veritabanina yuklendi ve kayit eklendi";
				}
				else
				{
					echo "Dosyaniz veritabanina yüklenemedi";
				}
			}
			else
			{
				echo "Dosya yüklenemedi";
			}
		}
		else
		{
			echo "Dosya boyutu 1 mb i geçemez";
		}
	}
	else
	{
		echo "Bir dosya seçiniz";
	}

}
?>

      <p>&nbsp;</p>
    </div>
    <div class="admin_footer_help"> Admin help section here Admin help section here Admin help section here Admin help section here Admin help section here </div>
  </div>
  <!-- end of main_content -->
  <div id="footer">
    <div id="copyright">
      <div style="float:left; padding:3px;"><a href="#"><img src="file:///C|/Users/Ahmet/Documents/Desktop/real-estate/real-estate/images/footer_logo.gif" width="42" height="35" alt="" border="0" /></a></div>
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
</div>
<!-- end of main_container -->
</body>
</html>
