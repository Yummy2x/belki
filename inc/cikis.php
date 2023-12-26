<?php
@session_start();
session_destroy();
echo "Başarıyla çıkış yapıldı";
header("location:index.php");
?>