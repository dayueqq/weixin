<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 16:31:48
         compiled from "./nameList.html" */ ?>
<?php /*%%SmartyHeaderCode:706753070ef40a0ca5-29056374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '913e3fb7837d21c210023ecc3e32159e243e9934' => 
    array (
      0 => './nameList.html',
      1 => 1392971482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '706753070ef40a0ca5-29056374',
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
<script type="text/javascript" src="../../res/js/datepicker.js"></script>
<script type="text/javascript" src="../../../common/temp/brand.json"></script>
</head>

<body>
	<div class="carOnSellList">
    	<div class="addNewCar">
        	<a class="tabBuySelected" id="tabBuy" href="javascript:void(0)" onclick="qieHuan('nameStatics.php','book',1)" >购车报名</a>
            <a class="tabDrive" id="tabDrive" href="javascript:void(0)" onclick="qieHuan('nameStatics2.php','dri',2)" >试驾报名</a>
            <a class="tabService" id="tabSerive" href="javascript:void(0)" onclick="changeTab()" >售后预约</a>
            <a class="tabGroupBuy" id="tabGroupBuy" href="javascript:void(0)" onclick="changeTab1()" >团购报名</a>
            <a class="tabReplace" id="tabReplace" href="javascript:void(0)" onclick="changeTab2()" >二手置换</a>
            <a class="tabInsurance" id="tabInsurance" href="javascript:void(0)" onclick="changeTab3()" >续保统计</a>
        </div>
        <div class="carSelect">
        	<form class="searchCondition" id="searchform">
            <div class="tab" >
			  <div id="widget" style="height:32px;" >
                <p style="float:left; margin-top:5px; margin-right:10px;">报名日期:</p>
				<div id="widgetField" style="float:left;">
					<span>2013-11-10 —— 2013-12-10</span>
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			   </div>
		    </div>
            
            <a class="search" href="javascript:void(0)" onclick="searchSql()">查看</a>
            <a class="export" href="javascript:void(0)" onclick="exportSql()">导出</a>
            
            <div id="buyTable" class="buyTable">
                <label for="carSeries">车系:</label>
                <select class="carSeries" name="carSeries" id="carSeries">
                    <option>全部</option>
                </select>
           
                <label for="carModel">车型:</label>
                <select class="carModel" name="carModel" id="carModel">
                   <option>全部</option>  	
                </select>
          
                <label for="willBuyTime">预计购车时间:</label>
                <select id="willBuyTime" class="willBuyTime" name="willBuyTime">
                   <option value="0">全部</option>
                   <option value="一星期内">一星期内</option>
                   <option value="一个月内">一个月内</option>
                   <option value="三个月内">三个月内</option>
                   <option value="六个月内">六个月内</option>
                   <option value="一年之内">一年之内</option>              
                </select>
            </div>
            <div id="driveTable" class="driveTable" style="display:none">
                <input type="checkbox" value="" id="driveInput" onclick="changeStatus(1)"/>全部预约日期&nbsp;&nbsp;&nbsp;&nbsp;
            	<label for="inputDate">预约日期:</label>
                <input class="inputDate" id="inputDate" value="2013-11-01">
                <label for="carSeries" style="margin-left:15px;">车系:</label>
                <select class="carSeries" name="carSeries" id="carSeries">
                    <option>全部</option>
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('serInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                       <option value="<?php echo $_smarty_tpl->getVariable('serInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']];?>
"><?php echo $_smarty_tpl->getVariable('serInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            </div>
            <div id="serviceTable" class="serviceTable" style="display:none" >
                <input type="checkbox" value="" id="servInput" onclick="changeStatus(2)"/>全部预约日期&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="inputDate1">预约日期:</label>
                <input class="inputDate1" id="inputDate1" value="2013-11-01" >
           
                <label for="serviceKind" style="margin-left:20px;">服务:</label>
                <select class="serviceKindSelect" name="serviceKind" id="serviceKind">
                   <option>全部</option>  	
                   <option>维修</option>
                   <option>保养</option>
                </select>
          
                <label for="state" style="margin-left:20px;">处理情况:</label>
                <select class="state" name="state" id="serviceState">
                   <option>全部</option>
                   <option>未处理</option>
                   <option>已处理</option>              
                </select>
            </div>
            
           </form>
           <br />
        </div>
        <iframe id="theFrame" frameborder="0" allowtransparency="1" width="782px" height="800px" src="nameStatics.php">

    </iframe>
</div>
</body>
</html>
