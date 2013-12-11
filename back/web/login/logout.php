<?php	
	setCookie('companyId');	
	setCookie('power');
	setCookie('isLogin');
	setCookie('carId');
	setCookie('carBrand');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
    <div style="width:800px; font-size:36px; font-family:'微软雅黑'; margin-top:100px; margin-left:auto; margin-right:auto">
       <marquee scrollAmount=4 behavior=alternate><?php echo '你好，再见!'?></marquee>    
    </div>
    <div style="width:350px; font-size:20px; font-family:'微软雅黑'; margin-top:20px; margin-left:auto; margin-right:auto">
       <marquee scrollAmount=5 width=400 height=360 direction=up>
            制作团队：</br>
            &nbsp;&nbsp;&nbsp;&nbsp;东莞大悦汽车<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:14px">制作于2013年11月——2013年12月</span>
       </marquee>
    </div>
    <div style="margin-top:20px; width:70px; margin-left:auto; margin-right:auto;"><a style="text-decoration:none; font-size:14px; color:#000" href="login.php">重新登录</a></div>
</body>
</html>