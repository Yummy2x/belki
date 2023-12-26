<?php
$baglanti=mysql_connect("localhost","root","");
mysql_select_db("vt_emlak");
mysql_query("set names utf8");
mysql_query("set character set utf8");
mysql_query("set collation_connection='utf8_turkish_ci'");
/*if(!$baglanti)
{
	die("Bağlantı Sağlanmadı".mysql_error());
	
	}
else{echo "Bağlantı Sağlandı";}
*/




?>