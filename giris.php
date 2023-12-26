<?php
include "baglanti.php";
@session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>



<body>

<form name="form1" method="post" action="">

<div id="main_content">
    <div class="admin_login">
      <div class="left_box">
<div class="top_left_box"> </div>
        <div class="center_left_box">
          <div class="box_title"><span>Giris</span> </div>
          <div class="form">
            <div class="form_row">
              <label class="left">Kullanici Adi: </label>
              <input name="txkad" type="text" class="form_input" id="txkad"/>
            </div>
            <div class="form_row">
              <label class="left">Sifre: </label>
              <input name="txsifre" type="password" class="form_input" id="txsifre"/>
            </div>
            <div style="float:right; padding:10px 25px 0 0;">
              <input type="submit" name="bt_giris" id="bt_giris" value="Giris">
            </div>
          </div>
        </div>
</form>


<?php

 if(isset($_POST["bt_giris"])){
	 extract($_POST);
	 $sorgu=mysql_query("SELECT * FROM `uye` WHERE `kullanici`='$txkad' && `sifre`='$txsifre'");
	 $satir=mysql_num_rows($sorgu);
	 if($satir) 
	 {
		 $_SESSION["giris"]=$txkad;
		 echo "Giriş yapıldı";
		 header("location:index.php");
	  }
	  else
	  {
	     echo "Kullanıcı adı veya şifre yanlış";
	  }
	 
	 
	 
	 
 }

?>


</body>
</html>