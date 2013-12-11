<?php /* Smarty version Smarty-3.0.6, created on 2013-10-19 01:38:48
         compiled from "./dealerinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:214195261e2a819c247-02093446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84c449c5dc03ba215a740d9d912652da7a546a2' => 
    array (
      0 => './dealerinfo.html',
      1 => 1382146716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214195261e2a819c247-02093446',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>经销商信息</title>
<link href="../../res/css/dealer/dealerinfo.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="info">
      <table width="100%" border="1">
        <tr>
          <td>经销商</td>
          <td>所在城市</td>
          <td>所在地区</td>
          <td>联系方式</td>
          <td>礼品1</td>
          <td>礼品2</td>
          <td>礼品3</td>
        </tr>
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
            <tr>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['name'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['city'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['place'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['cont'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['gift1'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['gift2'];?>
</td>
              <td><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['gift3'];?>
</td>
            </tr>
        <?php endfor; endif; ?>
      </table>
      <div style="clear:both; font-size:14px; padding-top:15px;"> 
         <p class="page" align="center"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
</p>   <!-- 显示页码-->
      </div>
  </div>
</body>
</html>
