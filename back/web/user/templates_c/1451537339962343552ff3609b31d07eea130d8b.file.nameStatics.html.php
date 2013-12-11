<?php /* Smarty version Smarty-3.0.6, created on 2013-11-12 13:05:15
         compiled from "./nameStatics.html" */ ?>
<?php /*%%SmartyHeaderCode:297785282278b4f0031-69140669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1451537339962343552ff3609b31d07eea130d8b' => 
    array (
      0 => './nameStatics.html',
      1 => 1384261513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '297785282278b4f0031-69140669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在售车型</title>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../res/css/nameList.css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<script src="../../res/js/nameList.js"></script>
<script type="text/javascript">
        window.onload = function () {
            var tb = document.getElementById("tbody");
            var tbody = tb.getElementsByTagName("tbody")[0];
            var trs = tbody.getElementsByTagName("tr");

            for (var i = 0; i < trs.length; i++) {
                if (i % 2 != 0) {
                    trs[i].style.backgroundColor = "#fcfcfc";
                }
            }
        };
    </script>
</head>

<body>
    	<div class="carTable">
        	<table class="thead" bgcolor="#f3f3f3">
            	<tbody>
                	<tr>
                    	<td width="70px">日期
                        </td>
                        <td width="60px">品牌
                        </td>
                        <td width="60px">车系
                        </td>
                        <td width="200px">车型
                        </td>
                        <td width="60px">姓名
                        </td>
                        <td width="100px">联系方式
                        </td>
                        <td width="166px">来源活动
                        </td>
                    </tr>
                </tbody>
            </table>
        	<table id="tbody" class="tbody" >
            	<tbody>
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
                    	<td class="date"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['date'];?>

                        </td>
                        <td class="brand"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['brand'];?>

                        </td>
                        <td class="series"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['series'];?>

                        </td>
                        <td class="model"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['model'];?>

                        </td>
                        <td class="name"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['name'];?>

                        </td>
                        <td class="phone"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['telephone'];?>

                        </td>
                        <td class="source">
                            <a href="#" class="site"><?php echo $_smarty_tpl->getVariable('info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['active'];?>
</a>
                        </td>
                    </tr>
                 <?php endfor; endif; ?>
                     
                </tbody>
            </table>
      </div>
      <div class="page" style="clear:both; font-size:14px; padding-top:15px;"> 
         <p class="page" align="center"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
</p>   <!-- 显示页码-->
      </div>
      
</body>
</html>
