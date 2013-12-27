<?php /* Smarty version Smarty-3.0.6, created on 2013-12-12 17:13:04
         compiled from "./Activity.html" */ ?>
<?php /*%%SmartyHeaderCode:1408352a97e2070fcc1-55648068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2165c82acba9b0e5210c1cbd511b20c9db570565' => 
    array (
      0 => './Activity.html',
      1 => 1385267346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1408352a97e2070fcc1-55648068',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优惠活动</title>
<link rel="stylesheet" href="../../res/css/activity.css" type="text/css" />
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
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
    				 <a class="actModify" href="addAct.php?actId=<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_id'];?>
"></a>
                     <a class="actDelete" onclick="return confirm('是否删除此优惠信息')" href="operation.php?action=delAct&actId=<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_id'];?>
"></a>
                </div>   
            </div>
    		<div class="actPic">
        	<div class="actImg">
            	<img class="actCar" src="<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['path'];?>
"/>
             	<div class="mengban">
            		<p class="mengban-title"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_name'];?>
</p>
            	</div>  
            </div>          
      		</div>
        <div class="actDescribe">
        	<?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['actDescribe'];?>

        </div>
    </li>
  <?php endfor; endif; ?> 

   <?php if ($_smarty_tpl->getVariable('actNew')->value==1){?> 
    <li class="actNew">
    	<a href="addAct.php" class="addAct" title="新增优惠活动"></a>
    </li>
   <?php }?> 
</ul>
<!--activity modify-->
</body>
</html>
