<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>腾讯悦车微信平台</title>
<style type="text/css">
.bg01{
	margin: 0;
	padding:0;
}


.background{
	position: fixed; top: 0; left: 0; width: 100%; height: 100%;z-index: -10;
}
#content{
	background: #FFF;
	width:30%;
	height:280px;
	border-radius:3px;
	float:right;
	margin-right: 14%;
	margin-top:10%;
	font-family: "微软雅黑";
}
.title{
	width:70%;
	float: left;
	font-size: 22px;
	margin:15px auto 40px 20px;
}
.title p{
	float: left;
	margin: 0;
	padding: 0;
	color: #444444;
}
.items{
	border:solid 1px #CCC;
	width:60%;
	height:35px;
	margin:15px auto 0 auto;
	font-size: 15px;
	color: #000;
	font-family: "微软雅黑";
	padding: 2px 10px;
	border-radius:3px;
}
input:focus{
	 outline: 1px solid #8aa6ee;
    -moz-outline-radius: 3px;
}
#sub{
	width: 30%;
	height:32px;
	color: #FFF;
	font-family: "微软雅黑";
	font-size: 18px;
	font-weight: bold;
	background: #7bd01d;
	border:none;
	border-radius:3px;
	margin-top:15px;
	margin-left:17%;
	
}
.footer{
	width: 100%;
	height:70px;
	background: #000;
	opacity: 0.66;
	position: fixed;
	bottom: 0;
	line-height: 14px;
}
.footer p{
	color:#FFF;
	font-size: 12px;
	text-align: center;
}
.footer a{
	color: #fff;
}
</style>
</head>

<body class="bg01">
		<img src="../../res/img/back5.jpg"class="background">
      <div id="content">
      <form action="login2.php" method="post" enctype="multipart/form-data">
        <div class="section" align="center">
        	<div class="title"><p>经销商登录</p></div>
        	<div id="section_items">
                <input id="name" class="items" name="user" placeholder="帐号" onfocus="changeOutline1()"><br />
                <input id="password" class="items" name="password" type="password" onfocus="changeOutline2()"placeholder="密码">
          </div>
        </div>
        <div id="btn_box">
        	<input id="sub" type="submit" name="sub" value="登 录" onmouseover="changeColor1()" onmouseout="changeColor2()">
        </div>
      </form>
	</div>  
	<div class="clr"></div>
	<div class="footer">
    	<p>腾讯汽车东莞站 | <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备13075948号</a></p>
      <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>      
    </div>
    <script type="text/javascript">
		document.getElementById("sub").onclick = function() {
			var name = document.getElementById("name").value;
			var password = document.getElementById("password").value;
			if(name == "") {
				alert("姓名不能为空！");
				return false;
			}
			if(password == "") {
				alert("手机不能为空！"); 
				return false;
			}
		}
		function changeOutline1() {
			document.getElementById("name").style.outlineColor = "#8aa6ee";
		}
		function changeOutline2() {
			document.getElementById("password").style.outlineColor = "#8aa6ee";
		}
		function changeColor1(){
			document.getElementById("sub").style.background="#7dc810";		
		}
		function changeColor2(){
			document.getElementById("sub").style.background="#7bd01d";		
		}
	</script>
</body>
</html>