<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/weixin/back/libs/Smarty.class.php";
  
  $smarty=new Smarty;
  $smarty->left_delimiter = '<!--{'; 
  $smarty->right_delimiter = '}-->';
?> 