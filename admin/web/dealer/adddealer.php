<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $smarty->display($html_path.'adddealer.html');
  mysql_close();
?>