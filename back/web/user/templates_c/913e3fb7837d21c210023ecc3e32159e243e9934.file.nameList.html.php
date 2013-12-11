<?php /* Smarty version Smarty-3.0.6, created on 2013-11-12 14:07:27
         compiled from "./nameList.html" */ ?>
<?php /*%%SmartyHeaderCode:151815282361f0c7a22-60322658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '913e3fb7837d21c210023ecc3e32159e243e9934' => 
    array (
      0 => './nameList.html',
      1 => 1384265243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151815282361f0c7a22-60322658',
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
<script type="text/javascript">
$(document).ready(function(){
	//实例三
	$('#date3').DatePicker({
		flat: true,
		date: ['2009-12-28','2010-01-23'],
		current: '2010-01-01',
		calendars: 3,
		mode: 'range',
		starts: 1
	});
	//实例五
	var now3 = new Date();
	now3.addDays(-4);
	var now4 = new Date()
	$('#widgetCalendar').DatePicker({
		flat: true,
		format: 'Y-m-d',
		date: [new Date(now3), new Date(now4)],
		calendars: 3,
		mode: 'range',
		starts: 1,
		onChange: function(formated) {
			$('#widgetField span').get(0).innerHTML = formated.join(' —— ');
		}
	});
	var state = false;
	$('#widgetField>a').bind('click', function(){
		$('#widgetCalendar').stop().animate({height: state ? 0 : $('#widgetCalendar div.datepicker').get(0).offsetHeight}, 500);
		state = !state;
		return false;
	});
	

});
</script>
</head>

<body>
	<div class="carOnSellList">
    	<div class="addNewCar">
        	<a class="tabBuy" href="#" >购车报名</a>
            <a class="tabDrive" href="#">试驾报名</a>
        </div>
        <div class="carSelect">
        	<form class="searchCondition">
           	<label for="carSeries">车系:</label>
            <select class="carSeries" name="carSeries">
        		<option>- 请选择 - </option>
            	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('carInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $_smarty_tpl->getVariable('carInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['car_id'];?>
"><?php echo $_smarty_tpl->getVariable('carInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['name'];?>
</option>
                <?php endfor; endif; ?>
           </select>
       
           <label for="carModel">车型:</label>
           <select class="carModel" name="carModel">
        	   <option>- 请选择 - </option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>     	
          </select>
      
            <label for="actName">活动:</label>
            <select class="actName" name="actName">
        	   <option>- 请选择 - </option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>
               <option>2013款2.2L手动豪华版</option>     	
          </select>
            <div class="tab">
			  <div id="widget">
				<div id="widgetField">
					<span>2011 , 一月 1 — 2012 , 一月 11</span>
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			   </div>
		    </div>
           </form>
           <a class="search" href="#">查看</a>
           <a class="export" href="#">导出</a>
           <br />
        </div>
        <iframe frameborder="0" allowtransparency="1" width="782px" height="800px" src="nameStatics.php">

    </iframe>
</div>
</body>
</html>
