<?php
include "baglanti.php";
@session_start();
?>
 <?php
	  $taban=mysql_query("select * from ilanlar order by id desc limit 0,4");
	while($listele=mysql_fetch_array($taban))
	{
	  
	  echo '<div class="offer_box_wide"> <a href="#"><img src='.$listele["resim"].' width="130" height="98" class="img_left" alt="" border="0" /></a>
        <div class="offer_info"> <span>'.$listele["baslik"].'</span>
          <p class="offer">'.$listele["kisa_icerik"].'</p>
          <div class="more"><a href="#">...more</a></div>
        </div>
      </div>';
	}
	
	  ?>