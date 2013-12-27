<?php /* Smarty version Smarty-3.0.6, created on 2013-12-20 09:49:21
         compiled from "./addAct.html" */ ?>
<?php /*%%SmartyHeaderCode:310352b3a221139572-54933489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43bd54c8d93d6e730af21ead97536fbbd98639a6' => 
    array (
      0 => './addAct.html',
      1 => 1387460165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310352b3a221139572-54933489',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增优惠活动</title>
<link rel="stylesheet" href="../../res/css/addAct.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../../res/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../res/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../res/js/datepicker.js"></script>
<script src="../../res/js/addAct.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jsonfile')->value;?>
"></script>
<script src="../../../common/temp/brand.json"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.all.js"></script>
<script>
    window.UEDITOR_HOME_URL = "/weixin/ueditor";
</script>

<script type="text/javascript">
    var curCarId='<?php echo $_smarty_tpl->getVariable('carId')->value;?>
';
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
    
	//加载时选择车型
	var str='<label for="seriesPick">车系：<br /><input type="checkbox" class="seriesPick" id="selectAll"/><span>全部</span><br />';
	
	//判断是不是双品牌
	<?php if ($_smarty_tpl->getVariable('double')->value==1){?> 
	var carIdArr='<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'.split('@');
	var res=(seriesJson[carIdArr[0]]+','+seriesJson[carIdArr[1]]).split(',');
	<?php }else{ ?> 
	var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
	<?php }?> 
	
	for(var i=0;i<res.length;i=i+2){
		str+='<input type="checkbox" class="seriesPick" name="seriesPick" value="'+res[i]+'"/><span>'+res[i+1]+'</span><br />';
    }
	$('#selectCarSeries').html(str);

	$('#selectAll').bind('change', function(){
		if($('#selectAll').prop('checked')){
			$("input[name^='seriesPick']").each(function(){
				$(this).prop('checked',true);
			});
		}else{
			$("input[name^='seriesPick']").each(function(){
				$(this).prop('checked',false);
			});

		}
	});
	
	<?php if ($_smarty_tpl->getVariable('upAct')->value==1){?> 
	var resAct=seriesMin.split(',');
	var resIndex=0;
	$("input[name^='seriesPick']").each(function(){
		if($(this).val()==resAct[resIndex]){
			$(this).prop('checked',true);
			resIndex=resIndex+2;
		}
	});
	<?php }?> 
});

   function upForm(){
	   $('#startDate').val($('#widgetField span').html().split(' —— ')[0]);
	   $('#endDate').val($('#widgetField span').html().split(' —— ')[1]);
	   alert('文件正在保存，请耐心等待');

	   var tempSer="var seriesMin='";
	   $("input[name^='seriesPick']").each(function(i){
		   if($(this).prop('checked')){
			   tempSer+=$(this).val()+','+$('#selectCarSeries span:eq('+(i+1)+')').html()+',';
		   }
	   });
	   tempSer= tempSer.substring(0,tempSer.length-1)  //这个str就是截取的值
       tempSer+="';";
	   //alert(tempSer);
	   $('#tempSer').val(tempSer);
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
 <?php if ($_smarty_tpl->getVariable('upAct')->value==1){?> 
	<form class="addAct" id="theForm" action="operation.php?action=addUpAct&actId=<?php echo $_smarty_tpl->getVariable('info')->value['act_id'];?>
" enctype="multipart/form-data" method="post">
    	<label for="actName">活动名 *</label>
        <input type="text" name="actName" class="actName" id="actName"  value="<?php echo $_smarty_tpl->getVariable('info')->value['act_name'];?>
" /><br />
        <label for"uploadPic">宣传图 *</label>
        <input type="file" name="uploadPic" class="uploadPic" id="uploadPic" onchange="previewImage(this)" />
			<div id="preview">
  				  <img id="imghead" border=0 src="<?php echo $_smarty_tpl->getVariable('info')->value['path'];?>
" />
                  <p class="attention">注意：1.封面尺寸要求4:3<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2.推荐尺寸480*360像素</p>
			</div>
            <br /><br />
        <label for="actDescribe" >活动描述 *</label>
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
					<span><?php echo $_smarty_tpl->getVariable('info')->value['startTime'];?>
 —— <?php echo $_smarty_tpl->getVariable('info')->value['endTime'];?>
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
         <label for="actModel">活动车系 *</label>
        <!--活动车系选择弹框-->    
  			<div id="dialog-form" title="选择车型">
 				 <span class="validateTips">可以同时添加多个车型</span>
                 <form>
  					<fieldset id="selectCarSeries">				
 
   					 </fieldset>
  				</form>
			</div>
			<button id="addCarModel" class="addCarModel" style="display:inline-block;">选择车型</button>
            
  		<!--活动车型选择弹框结束-->  
        
		
    </form>
 <?php }else{ ?> 
    <form class="addAct" id="theForm" action="operation.php?action=addAct" enctype="multipart/form-data" method="post">
    	<label for="actName">活动名 *</label>
        <input type="text" name="actName" class="actName" id="actName" value="" /><br />
        <label for"uploadPic">宣传图 *</label>
        <input type="file" name="uploadPic" class="uploadPic" id="uploadPic" onchange="previewImage(this)" />
			<div id="preview">
  				  <img id="imghead" border=0 src="" />
                  <p class="attention">注意：1.封面尺寸要求4:3<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2.推荐尺寸480*360像素</p>
			</div>
            <br/><br/>
        <label for="actDescribe" >活动描述 *</label>
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"></textarea>
        <script type="text/javascript">
		    UE.getEditor("actDescribe");
	    </script>
        <br/><br/><br/><br/><br/>
        <p class="actDate">活动日期 *</p>
        <div class="tab">
			<div id="widget">
				<div id="widgetField">
					<span>2013-11-15 —— 2013-11-16</span>
                    <input type="hidden" name="startDate" id="startDate" />
                    <input type="hidden" name="endDate" id="endDate" />
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			</div>
		</div>
        <input type="hidden" id="tempSer" name="tempSer" />  <!--传递数据  -->
         <label for="actModel">活动车系 *</label>
        <!--活动车系选择弹框-->    
  			<div id="dialog-form" title="选择车型">
 				 <span class="validateTips">可以同时添加多个车型</span>
                 <form>
  					<fieldset id="selectCarSeries">				
 
   					 </fieldset>
  				</form>
			</div>
			<button id="addCarModel" class="addCarModel" style="display:inline-block;">选择车型</button>
  		<!--活动车型选择弹框结束-->  
		
    </form>
 <?php }?> 
</div>
<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview">
	<!--<img class="phoneBack" src="../../res/img/phonePreview.jpg"/>
	<iframe frameborder="0">
    </iframe>-->
</div>
<div class="clr">
</div>
<div class="saveExit">
	<a href="javascript:void(0)" onclick="upForm()" class="save">保存</a>
    <a href="#" class="exit">预览</a>
</div>

<div class="previewPage">
	
</div>
</div>
</body>
</html>
