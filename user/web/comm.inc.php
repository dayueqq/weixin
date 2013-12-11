<?php
  //判断是否有选择经销商
  if(!isset($_COOKIE['comId'])){
	  echo "<script>window.location.href='http://115.29.184.11/weixin/user/web/user/homepage.php'</script>";
  }
?> 