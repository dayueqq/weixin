<?php /* Smarty version Smarty-3.0.6, created on 2013-12-11 02:14:33
         compiled from "./message.html" */ ?>
<?php /*%%SmartyHeaderCode:2875352a7ca89a22522-25441142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8202234efced9c27c3d4d7170645663e0d9a4559' => 
    array (
      0 => './message.html',
      1 => 1386728060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2875352a7ca89a22522-25441142',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../res/css/about.css">
<title><?php echo $_smarty_tpl->getVariable('comName')->value;?>
</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('jsonfile')->value;?>
"></script>
<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideOptionMenu');
            WeixinJSBridge.call('hideToolbar');
    });

window.onload=function(){
	var str='';
	var tempY='';
	for(var i=0;i<mesJson.length;i++){
		if(tempY!=mesJson[i].date.substr(0,4)){
			tempY=mesJson[i].date.substr(0,4);
			if(i!=0){
				str+="</div>";
			}
			str+="<div><h3 id='"+mesJson[i].date.substr(0,4)+"'>"+mesJson[i].date.substr(0,4)+"</h3><li><span>"+
                    mesJson[i].date+"</span><div><p class='name'><span style='width:auto;color:#999;font-size:14px; font-style:italic; line-height:20px;margin-top:0;'>来自：</span>"+
                    mesJson[i].name+"</p><div class='dotLine'></div><p class='detail'>"+
					mesJson[i].cont+"</p></div></li>";
					
		}else{
			str+="<li><span>"+
                    mesJson[i].date+"</span><div><p class='name'><span style='width:auto;color:#999;font-size:14px; font-style:italic; line-height:20px;margin-top:0;'>来自：</span>"+
                    mesJson[i].name+"</p><div class='dotLine'></div><p class='detail'>"+
					mesJson[i].cont+"</p></div></li>";
		}
		
	}
	$('#event_list').html(str);
}

function upForm(){
	 $('#theForm').submit();
}

</script>
</head>
<body >
<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;">
		<p style="color:#fff; position:relative; font-size:16px;margin-top:12px;text-shadow:none;">车友留言</p>
        <a href="homepage.php" data-ajax="false" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>	
    </div>
    <div style="width:100%; height:47px;"></div>
<div class="box">
	<ul class="event_list" id="event_list">
		<div>
			<h3 id="2013">2013</h3>
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('info')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <span><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['date'];?>
</span>
                <div>
                    <p class="name"><span style="width:auto;color:#999;font-size:14px; font-style:italic; line-height:20px;margin-top:0;">来自：</span><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['name'];?>
</p>
                    <div class="dotLine"></div>
                    <p class="detail"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['cont'];?>
</p>
                </div>
                </li>
            <?php endfor; endif; ?>
		</div>
		<div>
			<h3 id="2012">2012</h3>
			<li>
			<span>5月15日</span>
			<div>
				<p class="name"><span style="width:auto;color:#999;font-size:14px; font-style:italic; line-height:20px;margin-top:0;">来自：</span>陈先生</p>
				<div class="dotLine"></div>
				<p class="detail">专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线专栏改版上线</p>
			</div>
			</li>	
		</div>			
	</ul>

	<div class="clearfix"></div>
	<a href="message2.html" data-rel="dialog" data-transition="pop" style="display:block;position:fixed;width:50px; height:50px; bottom:42px; border-top:#CCC 1px solid; border-right:#CCC 1px solid;border-bottom:#CCC 1px solid;background:#FFF;border-radius:5px;"><img src="../../res/img/add-massage.png" width="50" height="50" style="margin:0;padding:0;"/></a>
	</div>
    <div class="footer" style="text-shadow:none;">
    	<p class="tengxun">腾讯汽车</p>
    	<p>Copyright © 1998-2013 Tecent. All Rights Reserved</p>

    </div>


<div style="text-align:center;clear:both">

</div>
</body>
</html>