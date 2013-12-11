<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/weixin/admin/libs/Smarty.class.php";
  
  $smarty=new Smarty;
  $smarty->left_delimiter = '<!--{'; 
  $smarty->right_delimiter = '}-->';
?> 