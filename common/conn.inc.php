<?php
  if(!$_COOKIE['isLogin']){
	 echo "<script>alert('请先登陆');window.location.href='../login/login.php'</script>";  //避免使用 header()函数跳转
  }
?> 