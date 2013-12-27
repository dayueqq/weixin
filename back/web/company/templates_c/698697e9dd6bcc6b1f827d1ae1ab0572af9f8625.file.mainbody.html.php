<?php /* Smarty version Smarty-3.0.6, created on 2013-12-24 10:34:38
         compiled from "./mainbody.html" */ ?>
<?php /*%%SmartyHeaderCode:1332152b8f2be16b9b2-58727774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '698697e9dd6bcc6b1f827d1ae1ab0572af9f8625' => 
    array (
      0 => './mainbody.html',
      1 => 1387852476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1332152b8f2be16b9b2-58727774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>悦车微信管理平台</title>
<link rel="stylesheet" href="../../res/css/mainbody.css"  type="text/css" />
<link rel="stylesheet" href="../../res/css/menu.css" type="text/css" />
<script src="../../res/js/mainbody.js" type="text/javascript"></script>
<script src="../../res/js/menu.js" type="text/javascript"></script>
</head>

<body class="bg">
<!--header begin-->
<div class="header">
	<div class="headerInfo">
		<div class="headerImg">
    		<a href="#" class="homepage"><img border="0" class="homeLabel" src="../../res/img/header-name.jpg" style="position:relative; top:7px;" /></a>
   		</div>
    	<div class="userInfo">
            	<p class="userName"><?php echo $_smarty_tpl->getVariable('info')->value['company_name'];?>
</p>
                <img class="userClassImg" src="../../res/img/header-vip.jpg"/>
                <span>|</span>
                <a class="userExit" href="../login/login.php">退出</a>
    	</div>
	</div>
	<div class="headerUnderline">
    </div>
</div>
<!--header end-->

<!--mainbody begin-->
<div class="mainBody">
<!--leftnav begin-->
	<div class="leftNav">
    	<ul class="menu">
      		<li class="level1"><a href="#none"><img border="0" src="../../res/img/leftNavHome.gif" style="display:inline; float:left; margin:8px 20px 0 20px" />微店设置</a>
            	<ul class="level2">
          			<li><a href="Activity.php" target="leftBody" >优惠活动</a></li>
                    <!--
          			<li><a href="carOnSell.php" target="leftBody" >在售车型</a></li>
                    -->
                    <li><a href="groupBuy.php" target="leftBody" >团购设置</a></li>
          			<li><a href="addDrive.php" target="leftBody" >预约试驾</a></li>
                    <li><a href="addService.php" target="leftBody" >预约售后</a></li>
                    <li><a href="companyInfo.php" target="leftBody" >公司信息</a></li>
                    
        		</ul>
            </li>
            <!--
      		<li class="level1"><a href="#none"><img border="0" src="../../res/img/leftNavWeixin.gif" style="display:inline; float:left; margin:8px 17px 0 20px" />微信回复</a>
        		<ul class="level2">
          			<li><a href="#none">微信回复</a></li>
          			<li><a href="#none">微信回复</a></li>
          			<li><a href="#none">微信回复</a></li>
        		</ul>              
      		</li>
            -->
            <li class="level1"><a href="#none"><img border="0" src="../../res/img/leftNavStatics.gif" style="display:inline; float:left; margin:8px 22px 0 22px" />报名统计</a>
        		<ul class="level2">
          			<li><a href="nameList.php" target="leftBody" >报名信息</a></li>
                    <!--
          			<li><a href="#none">分析报表</a></li>
          			<li><a href="#none">客户数据</a></li>
                    -->
        		</ul>
      		</li>
            <li class="level1"><a href="#none"><img border="0" src="../../res/img/leftNavCustom.jpg" style="display:inline; float:left; margin:5px 24px 0 20px" />客户服务</a>
            	<ul class="level2">
          			<li><a href="gossipStatics.php" target="leftBody" >客户留言</a></li>
        		</ul>
            </li>
       </ul>
  	</div>
<!--leftnav end-->
<!--rightbody begin-->
	<iframe class="activity" id="leftBody" name="leftBody" allowtransparency="1" scrolling="no" frameborder="0" width="829px" height="800px" src="" ></iframe>
<!--rightbody end-->
</div>
<!--mainbody end-->

<!--footer-->
<div class="footer">
</div>
<!--footer-->

</body>
</html>
