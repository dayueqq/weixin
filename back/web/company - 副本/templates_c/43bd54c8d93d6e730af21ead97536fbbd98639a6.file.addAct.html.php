<?php /* Smarty version Smarty-3.0.6, created on 2013-12-02 07:45:43
         compiled from "./addAct.html" */ ?>
<?php /*%%SmartyHeaderCode:15355529c3aa7bdc351-01891255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43bd54c8d93d6e730af21ead97536fbbd98639a6' => 
    array (
      0 => './addAct.html',
      1 => 1385970007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15355529c3aa7bdc351-01891255',
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
	var str='';
	var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
	for(var i=0;i<res.length;i=i+2){
		str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
    }
	$('#select1').html(str);
	
	//选择车型时自动补全车款
	$('#selectCarModel').delegate('select','change',function(){
		var id=parseInt($(this).attr('id').replace('select',''))+1;
		var faval=parseInt($(this).val());
		var str='<span><br/>车型 ：<br /></span>';
		var res=mod[faval].split(',');
		for(var i=0;i<res.length;i=i+2){
			 str+="<input class='model' type='checkbox' value='"+res[i]+"'><label>"+res[i+1]+"<br></label>" ;
		}
		$('#labelCheck'+id).html(str);
	});
	
	<?php if ($_smarty_tpl->getVariable('upAct')->value==1){?> 
	var resAct=seriesMin.split(',');
	
	var tempId=1;
	for(var mm=0;mm<resAct.length;mm=mm+2){
		if(mm!=0){
			newCarSeries();
		}
		$('#select'+tempId).val(resAct[mm]);
		var faval=parseInt(resAct[mm]);
		var firstAct=modMin[faval].split(',');
		var firstK=0;
		
		var str='<span><br/>车型 ：<br /></span>';
		var res=mod[faval].split(',');
		for(var i=0;i<res.length;i=i+2){
			if(res[i]==firstAct[firstK]){
				str+="<input class='model' checked='checked' type='checkbox' value='"+res[i]+"'><label>"+res[i+1]+"<br></label>" ;
				firstK=firstK+2;
			}else{
				str+="<input class='model' type='checkbox' value='"+res[i]+"'><label>"+res[i+1]+"<br></label>" ;
			}
		}
		$('#labelCheck'+(tempId+1)).html(str);
		tempId++;
	}
	<?php }?> 
});

   function upForm(){
	   $('#startDate').val($('#widgetField span').html().split(' —— ')[0]);
	   $('#endDate').val($('#widgetField span').html().split(' —— ')[1]);
	   alert('文件正在保存，请耐心等待');

	   var tempSer="var seriesMin='";
	   var tempStr='var modMin=new Array();';
	   for(var k=2;k<=count;k++){
		   tempFa=($('#select'+(k-1)+'').val());
		   if(k==2){
			   tempSer+=tempFa+','+($('#select'+(k-1)+' option:selected').text());
		   }else{
			   tempSer+=','+tempFa+','+($('#select'+(k-1)+' option:selected').text());
		   }
		   tempFlag=0;
		   $('#labelCheck'+k+' input').each(function(i){
			   if(this.checked){
				   if(tempFlag==0){
					   tempStr+="modMin["+tempFa+"]='"+$(this).val()+','+$('#labelCheck'+k+' label:eq('+i+')').text();
					   tempFlag=1;
				   }else{
					   tempStr+=","+$(this).val()+','+$('#labelCheck'+k+' label:eq('+i+')').text();
				   }
			   }
		   });
		   tempStr+="';";
	   }
       tempSer+="';";
	   
	   $('#tempMod').val(tempStr);
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
        <input type="hidden" id="tempMod" name="tempMod" />    <!--传递数据  -->
        <input type="hidden" id="tempSer" name="tempSer" />
         <label for="actModel">活动车系 *</label>
        <!--活动车系选择弹框-->    
  			<div id="dialog-form" title="选择车型">
 				 <p class="validateTips">可以同时添加多个车型</p>
 			     <button id="newCarModel" onClick="newCarSeries()">添加车型</button>
                 <form>
  					<fieldset id="selectCarModel">
    					<label for="series1">车系：
    					<select name="select1" id="select1" class="text ui-widget-content ui-corner-all series" style="display:inline-block;"  >

    					</select>
                        <br />
   		 				</label>
    					<label for="model1" id="labelCheck2">车型：<br />

    					</label>
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
        <input type="hidden" id="tempMod" name="tempMod" />    <!--传递数据  -->
        <input type="hidden" id="tempSer" name="tempSer" />
         <label for="actModel">活动车系 *</label>
        <!--活动车系选择弹框-->    
  			<div id="dialog-form" title="选择车型">
 				 <p class="validateTips">可以同时添加多个车型</p>
 			     <button id="newCarModel" onClick="newCarSeries()">添加车型</button>
                 <form>
  					<fieldset id="selectCarModel">
    					<label for="series1">车系：
    					<select name="select1" id="select1" class="text ui-widget-content ui-corner-all series" style="display:inline-block;"  >

    					</select>
                        <br />
   		 				</label>
    					<label for="model1" id="labelCheck2">车型：<br />
                        
    					</label>
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
