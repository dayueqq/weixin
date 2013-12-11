<?php /* Smarty version Smarty-3.0.6, created on 2013-11-11 12:53:29
         compiled from "./addcar.html" */ ?>
<?php /*%%SmartyHeaderCode:285055280d349789783-96872042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed25402e9d814cb794f6987b7dc9330dc9c1cdd4' => 
    array (
      0 => './addcar.html',
      1 => 1383125980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285055280d349789783-96872042',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加活动汽车</title>
<link href="../../res/css/carinfo/addcar.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js "></script>
<script type="text/javascript">
   function check(){
	   var temp=$('.cartype table tr td select').find("option:selected").text();  //获取Select选择的Text 
	   $('.dealername').val(temp);
	   $('#theForm').submit();
   }
</script>

<body>

  <form id="theForm" action="upcar.php" method="post" enctype="multipart/form-data" class="cartype">
      <table width="90%" border="1">
        <tr>
          <td>活动名称</td>
          <td><input type="text" name="active" /></td>
        </tr>
        <tr>
          <td width="100px">经销商名称</td>
          <td>
             <select style="margin-left:10px" name="dealer">
                <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['name'] = 'dealer_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('dealer')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dealer_id']['total']);
?>
                   <option value="<?php echo $_smarty_tpl->getVariable('dealer')->value[$_smarty_tpl->getVariable('smarty')->value['section']['dealer_id']['index']]['dealerid'];?>
"><?php echo $_smarty_tpl->getVariable('dealer')->value[$_smarty_tpl->getVariable('smarty')->value['section']['dealer_id']['index']]['name'];?>
</option>
                <?php endfor; endif; ?>
             </select>
             <input type="hidden" class="dealername" name="dealername" />
          </td>
        </tr>
        <tr>
          <td>品牌</td>
          <td><input type="text" name="brand" /></td>
        </tr>
        <tr>
          <td>汽车图片</td>
          <td><input type="file" name="pic" /></td>
        </tr>
        <tr>
        <tr>
          <td>车型</td>
          <td><input type="text" name="design" /></td>
        </tr>
        <tr>
          <td>车款</td>
          <td><input type="text" name="type" /></td>
        </tr>
        <tr>
          <td>原价</td>
          <td><input type="text" name="price" />万元</td>
        </tr>
        <tr>
          <td>活动价</td>
          <td><input type="text" name="discount" />万元</td>
        </tr>
        <tr>
          <td>汽车数量</td>
          <td><input type="text" name="amount" /></td>
        </tr>
        <tr>
           <td align="right" colspan="2"><input style="width:100px" type="button" onclick="check()" value="添加活动汽车" /></td>
        </tr>
      </table>
      
  </form>
</body>
</html>
