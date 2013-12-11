<?php /* Smarty version Smarty-3.0.6, created on 2013-12-02 07:19:32
         compiled from "./addCar.html" */ ?>
<?php /*%%SmartyHeaderCode:8505529c34845f8245-23137907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '928f79ef82f9f768925d6d9af388c42237ec5ec2' => 
    array (
      0 => './addCar.html',
      1 => 1385968736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8505529c34845f8245-23137907',
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
<link rel="stylesheet" href="../../res/css/addCar.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('carJson')->value;?>
"></script>
<script src="../../res/js/addCar.js" type="text/javascript"></script>
<script src="../../../common/temp/brand.json"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//更改任务栏
	var str='<option>- 请选择 -</option>';
	var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
	for(var i=0;i<res.length;i=i+2){
		<?php if ($_smarty_tpl->getVariable('addCar')->value==1){?> 
		if(res[i+1]=='<?php echo $_smarty_tpl->getVariable('info')->value['series'];?>
'){
			str+="<option selected='selected' value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		}else{
			str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		}
		<?php }else{ ?> 
		str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		<?php }?> 
    }
	$('#carSeries').html(str);
	
	//改变选项栏
    $('#carSeries').change(function(){
		var faval=parseInt($('#carSeries').val());
		var str='<option>- 请选择 -</option>';
		if(faval){
			var res=mod[faval].split(',');
			for(var i=0;i<res.length;i=i+2){
				 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
			}
		}
		$('#carModel').html(str);
		$('#guidePrice1').html('');
    });
	//提取配置信息
	$('#carModel').change(function(){
		var faval=parseInt($('#carModel').val());
		for(var k=0;k<modJson.length;k++){
			if(modJson[k][0]==faval){
				$('#guidePrice1').html('&nbsp;&nbsp;'+modJson[k][4]);
				$('#guidePrice').val(modJson[k][4]);
				$('#picVal').val(modJson[k][5]);
				break;
			}
		}
    });
	
    //如果是再编辑
    <?php if ($_smarty_tpl->getVariable('addCar')->value==1){?> 
		var faval=parseInt($('#carSeries').val());
		var str='<option>- 请选择 -</option>';
		var res=mod[faval].split(',');
		for(var i=0;i<res.length;i=i+2){
			 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		}
		$('#carModel').html(str);
	
	    $("#carModel option[value='<?php echo $_smarty_tpl->getVariable('info')->value['car_id'];?>
']").attr("selected","selected");
		var faval=parseInt($('#carModel').val());
		for(var k=0;k<modJson.length;k++){
			if(modJson[k][0]==faval){
				$('#guidePrice1').html('&nbsp;&nbsp;'+modJson[k][4]);
				$('#guidePrice').val(modJson[k][4]);
				$('#picVal').val(modJson[k][5]);
				break;
			}
		}
    <?php }?> 
});
  
   function upForm(){
	   $('#carSerName').val($('#carSeries option:selected').text());
	   $('#carIdName').val($('#carModel option:selected').text());
	   $('#theForm').submit();
   }
</script>

</head>

<body>
<div class="addActivity">
<div class="goBack">
	<a href="carOnSell.php">返回</a>
</div>
<div class="infoForm">
 <?php if ($_smarty_tpl->getVariable('addCar')->value==1){?> 
	<form class="addAct" id="theForm" action="operation.php?action=addUpCar&onId=<?php echo $_smarty_tpl->getVariable('info')->value['onsell_id'];?>
" enctype="multipart/form-data" method="post">
    	<div class="carBrand">
    	<label for="actName">品牌 *</label>
        <p style="display:inline-block;"><?php echo $_smarty_tpl->getVariable('carBrand')->value;?>
</p>
        </div>
        <label for="carSeries" style="margin-left:38px;">车系 *</label>
        <select class="carSeries" name="carSeries" id="carSeries">
        	
        </select>
        <input type="hidden" id="carSerName" name="carSerName" />
        <br />
        <label for="carModel" style="margin-left:38px;">车型 *</label>
        <select class="carModel" name="carModel" id="carModel">
        	<option>- 请选择 -</option>
        </select>
        <input type="hidden" id="carIdName" name="carIdName" />
        <br />
        <div class="guidePrice">
        <label for="carGuidePrice">行情指导价 *</label>
        <p style="display:inline-block; color:#999;" id="guidePrice1"></p>
        <input type="hidden" id="guidePrice" name="guidePrice" />
        <input type="hidden" id="picVal" name="picVal" />
        </div>
        <label for="carActPrice">优惠幅度 *</label>
        <input class="carActPrice" name="carActPrice" placeholder="请输入优惠幅度"  value="<?php echo $_smarty_tpl->getVariable('info')->value['discount'];?>
"/>
        <p style="display:inline-block;">万</p>
    </form>
 <?php }else{ ?> 
    <form class="addAct" id="theForm" action="operation.php?action=addCar" enctype="multipart/form-data" method="post">
    	<div class="carBrand">
    	<label for="actName">品牌 *</label>
        <p style="display:inline-block;"><?php echo $_smarty_tpl->getVariable('carBrand')->value;?>
</p>
        </div>
        <label for="carSeries" style="margin-left:38px;">车系 *</label>
        <select class="carSeries" name="carSeries" id="carSeries">
        	
        </select>
        <input type="hidden" id="carSerName" name="carSerName" />
        <br />
        <label for="carModel" style="margin-left:38px;">车型 *</label>
        <select class="carModel" name="carModel" id="carModel">
        	<option>- 请选择 -</option>
        </select>
        <input type="hidden" id="carIdName" name="carIdName" />
        <br />
        <div class="guidePrice">
        <label for="carGuidePrice">行情指导价 *</label>
        <p style="display:inline-block; color:#999;" id="guidePrice1"></p>
        <input type="hidden" id="guidePrice" name="guidePrice" />
        <input type="hidden" id="picVal" name="picVal" />
        </div>
        <label for="carActPrice">优惠幅度 *</label>
        <input class="carActPrice" name="carActPrice" placeholder="请输入优惠幅度"  value=""/>
        <p style="display:inline-block;">万</p>
    </form>
 <?php }?> 
</div>

<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview" style="background:url('../../res/img/phonePreview.jpg') no-repeat;">
	<!--<div class="test" style="width:202px;height:356px;overflow:hidden; margin-top:94px;margin-left:21px;">
	<iframe id="preview_page" name="preview" frameborder="0" src="../../../user/web/user/carOnSell.html" >
    </iframe>
    </div>-->
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
