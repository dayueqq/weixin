<?php /* Smarty version Smarty-3.0.6, created on 2013-12-15 09:51:42
         compiled from "./carDriveList.html" */ ?>
<?php /*%%SmartyHeaderCode:926852ad0b2e452431-04734028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eed5ef4776f3cb06fb243c35c61776d68e6a999' => 
    array (
      0 => './carDriveList.html',
      1 => 1384590746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '926852ad0b2e452431-04734028',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>试驾车型列表</title>
<link rel="stylesheet" href="../../res/css/activity.css" type="text/css" />
<script type="text/javascript" src="../../res/js/activity.js"></script>
</head>

<body>
<!--activity modify-->
<ul class="activityContanor">
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
	<li class="actAdded"  onmouseout="closeVessel('operate<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index'];?>
');" onmouseover="openVessel('operate<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index'];?>
');">
    		<div id="operate<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index'];?>
" class="operate" onmouseout="closeVessel('operate<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index'];?>
');" style="display:none;">
            	<div class="opacityLayer">
                	 <div class="innerCase"></div>
    				 <a class="actModify" href="addDrive.php?driId=<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['drive_id'];?>
"></a>
                     <a class="actDelete" onclick="return confirm('是否删除此试驾信息')" href="operation.php?action=delDri&driId=<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['drive_id'];?>
"></a>
                </div>   
            </div>
    		<div class="actPic">
        	<div class="actImg">
            	<img class="actCar" src="../../res/img/actCar.png"/>
             	<div class="mengban">
            		<p><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['model'];?>
</p>
            	</div>  
            </div>          
      		</div>
        <div class="actDescribe">
        	<p><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['actDescribe'];?>
</p>
        </div>
    </li>
 <?php endfor; endif; ?> 
	

    <li class="actNew">
    	<a href="addDrive.php" class="addAct" title="新增优惠活动"></a>
    </li>
    
    <div class="page" style="clear:both; font-size:14px; padding-top:5px"> 
       <p class="page" align="center"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
</p>   <!-- 显示页码-->
    </div>

</ul>
<!--activity modify-->


</body>
</html>
