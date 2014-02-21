<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 19:45:15
         compiled from "./homepage.html" */ ?>
<?php /*%%SmartyHeaderCode:706353073c4b23c8e3-59140765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '179e0fbcc43af84c5acb6f70504b699d6236c5f7' => 
    array (
      0 => './homepage.html',
      1 => 1392983112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '706353073c4b23c8e3-59140765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="title" content="微信微店">
<title><?php echo $_smarty_tpl->getVariable('info')->value['company_name'];?>
</title>
<meta name="apple-touch-fullscreen" content="YES">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<script type="text/javascript" src="../../res/js/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="../../res/css/mqq_reset.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../res/css/3gqq_index.css" />
<link rel="stylesheet" type="text/css" href="../../res/css/homepage.css"/>
</head>
<body class="loading">

<div class="main" >
    <!--focus picture begin-->
	<div class="pro-switch" > 
		<div class="slider">
			<div class="flexslider">
				<ul class="slides">
                  <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('actInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total']);
?>
					<li>
						<div class="img">
                        	<a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-actSignup-<?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_id'];?>
.html" style=" text-decoration:none;display:block;">
                            	<img class="bannerPic" src="<?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['path'];?>
" height=240 alt="">
                                <div class="mengban">
                                   <p class="actName"><?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_name'];?>
</p>
                                   <p class="actTime">
                                   		活动时间：<?php if ($_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['startTime']==$_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['endTime']){?>
                                                      <?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['startTime'];?>

                                                <?php }else{ ?>
                                                      <?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['startTime'];?>
 至 <?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['endTime'];?>

                                                <?php }?>
                                   </p>
        						</div>                             
                            </a>
                        </div>
					</li>
                  <?php endfor; endif; ?> 
				</ul>
			</div>
		</div>
	</div>
	<!--focus picture end-->
    

    
    <dl class="homeList">
        <dd class="left">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-activityList.html" >
        		<img src="../../res/img/homepage-bonus.png" border="0">
            	<p>优惠活动</p>
            </a>
        </dd>
        <dd class="right">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-groupbuy.html" target="_self">
        		<img src="../../res/img/homepage-groupBuy.png" border="0">
            	<p>团购报名</p>
            </a>
        </dd>
        <dd class="left2">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-carDrive.html" target="_self">
        		<img src="../../res/img/car-drive.png" border="0">
            	<p>预约试驾</p>
            </a>
        </dd>
         <dd class="right2">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-service.html" target="_self">
        		<img src="../../res/img/homepage-service.png" border="0">
            	<p>售后预约</p>
            </a>
        </dd>
        <dd class="left">
           <a  href="<?php echo $_smarty_tpl->getVariable('info')->value['mapUrl'];?>
" target="_self">
        		<img src="../../res/img/homepage-navMap.png" border="0">
            	<p>一键导航</p>
            </a>
        	
        </dd>
        <dd class="right">
            <a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-companyInfo.html" target="_self">
        		<img src="../../res/img/company-info.png" border="0">
            	<p>公司简介</p>
            </a>
        </dd>
        <dd class="left2">
        	<a  href="http://app.eclicks.cn/violation2/webapp/index?appid=10" target="_self">
        		<img src="../../res/img/search.png" border="0">
            	<p>违章查询</p>
            </a>
        </dd>
        <dd class="right2">
        	<a  href="http://car.m.yiche.com/qichedaikuanjisuanqi/" target="_self">
        		<img src="../../res/img/priceCul.png" border="0">
            	<p>车贷计算</p>
            </a>
        </dd>
        <dd class="left">
        	<a  href="tel:<?php echo $_smarty_tpl->getVariable('info')->value['helpPhone'];?>
" target="_self">
        		<img src="../../res/img/help.png" border="0">
            	<p>道路救援</p>
            </a>
        </dd>
        <dd class="right">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-message.html">
        		<img src="../../res/img/homepage-customerMessage.png" border="0">
            	<p>客户留言</p>
            </a>
        </dd>
        <dd class="left2">
        	<a  href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-replace.html" target="_self">
        		<img src="../../res/img/waiting.png" border="0">
            	<p>敬请期待</p>
            </a>
        </dd>
        <dd class="right2">
        	<a  href="baoxian.html" target="_self">
        		<img src="../../res/img/waiting.png" border="0">
            	<p>敬请期待</p>
            </a>
        </dd>
        <!--
        <dd class="left">
        	<a  href="javascrpit:void(0)">
        		<img src="../../res/img/waiting.png" border="0">
            	<p>个人中心</p>
            </a>
        </dd>
        
        -->
        <div class="clear"></div>
    </dl>
    
</div>
<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
</div>
<iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe>
<script defer src="../../res/js/slider.js"></script> 
<script type="text/javascript">
    $(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  
<script type="text/javascript"> 
function sethash(){
    hashH = document.documentElement.scrollHeight; 
    urlC = "http://115.28.168.60/test/agent.html";//"http://gd.qq.com/zt2013/addga/index.htm"; 
    document.getElementById("iframeC").src=urlC+"#"+hashH;
}
window.onload=sethash;
</script>
</body>
</html>
