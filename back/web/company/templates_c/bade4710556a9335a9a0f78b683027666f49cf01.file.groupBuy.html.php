<?php /* Smarty version Smarty-3.0.6, created on 2013-12-14 13:20:58
         compiled from "./groupBuy.html" */ ?>
<?php /*%%SmartyHeaderCode:2118552abeaba2168b2-38269704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bade4710556a9335a9a0f78b683027666f49cf01' => 
    array (
      0 => './groupBuy.html',
      1 => 1386998278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2118552abeaba2168b2-38269704',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增团购活动</title>
<link rel="stylesheet" href="../../res/css/addAct.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../../res/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../res/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../res/js/datepicker.js"></script>
<script src="../../res/js/addAct.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.all.js"></script>
<script>
    window.UEDITOR_HOME_URL = "/weixin/ueditor";
</script>

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
    
	<?php if ($_smarty_tpl->getVariable('upGro')->value==0){?> 
	//修改时间
	var date=new Date();
	if(date.getDate()<10){
		var curTime=date.getFullYear()+'-'+(date.getMonth()+1)+'-0'+date.getDate();
	    var beforeTime=date.getFullYear()+'-'+(date.getMonth())+'-0'+date.getDate();
	}else{
		var curTime=date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
	    var beforeTime=date.getFullYear()+'-'+(date.getMonth())+'-'+date.getDate();
	}
	$('#widgetField span').html(beforeTime+' —— '+curTime)
	<?php }?> 
});

   function upForm(){
	   $('#startDate').val($('#widgetField span').html().split(' —— ')[0]);
	   $('#endDate').val($('#widgetField span').html().split(' —— ')[1]);
	   
	   $('#theForm').submit();
   }
   
   
</script>

</head>

<body>
<div class="addActivity">
<div class="goBack">
	<a href="Activity.php">返回</a>
</div>
<div class="infoForm">
 <?php if ($_smarty_tpl->getVariable('upGro')->value==1){?> 
	<form class="addAct" id="theForm" action="operation.php?action=addUpGroup" enctype="multipart/form-data" method="post">
        <label for="actDescribe" >团购活动描述 *</label>
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"><?php echo $_smarty_tpl->getVariable('info')->value['actDescribe'];?>
</textarea>
        <script type="text/javascript">
		    UE.getEditor("actDescribe");
	    </script>
        <br/><br/><br/><br/><br/>
        <p class="actDate">活动日期*</p>
        <div class="tab">
			<div id="widget">
				<div id="widgetField">
					<span><?php echo $_smarty_tpl->getVariable('info')->value['startDate'];?>
 —— <?php echo $_smarty_tpl->getVariable('info')->value['endDate'];?>
</span>
                    <input type="hidden" name="startDate" id="startDate" />
                    <input type="hidden" name="endDate" id="endDate" />
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			</div>
		</div>
        <input type="hidden" id="tempSer" name="tempSer" />  <!--传递数据  -->	
    </form>
 <?php }else{ ?> 
    <form class="addAct" id="theForm" action="operation.php?action=addGroup" enctype="multipart/form-data" method="post">
        <label for="actDescribe" >团购活动描述 *</label>
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"></textarea>
        <script type="text/javascript">
		    UE.getEditor("actDescribe");
	    </script>
        <br/><br/><br/><br/><br/>
        <p class="actDate">活动日期*</p>
        <div class="tab">
			<div id="widget">
				<div id="widgetField">
					<span> —— </span>
                    <input type="hidden" name="startDate" id="startDate" />
                    <input type="hidden" name="endDate" id="endDate" />
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			</div>
		</div>
        <input type="hidden" id="tempSer" name="tempSer" />  <!--传递数据  -->	
    </form>
 <?php }?> 
</div>
<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview">
	<img class="phoneBack" src="../../res/img/phonePreview.jpg"/>
	<iframe frameborder="0">
    </iframe>
</div>
<div class="clr">
</div>
<div class="saveExit">
	<a href="javascript:void(0)" onclick="upForm()" class="save">保存</a>
    <a href="#" class="exit">预览</a>
</div>

</div>
</body>
</html>
