<?php /* Smarty version Smarty-3.0.6, created on 2013-12-12 17:13:29
         compiled from "./addDrive.html" */ ?>
<?php /*%%SmartyHeaderCode:299252a97e3953b5f3-56757379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4a7998f2dc265a8e63ba5d7e6289298849c2035' => 
    array (
      0 => './addDrive.html',
      1 => 1385968726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299252a97e3953b5f3-56757379',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增预约试驾</title>
<link rel="stylesheet" href="../../res/css/addDrive.css" type="text/css" />
<script src="../../res/js/addDrive.js" type="text/javascript"></script>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.all.js"></script>
<script>
    window.UEDITOR_HOME_URL = "/weixin/ueditor";
</script>
<script type="text/javascript">
   function upForm(){
	   if($('#actDescribe').val()==''){
		   alert('请输入试驾活动说明');
		   return false;
	   }
	   $('#theForm').submit();
   }
</script>

</head>

<body>
<div class="addActivity">
<div class="goBack">
	
</div>
<div class="infoForm">
<?php if ($_smarty_tpl->getVariable('upDri')->value==1){?> 
	<form class="addAct" id="theForm" action="operation.php?action=addUpDri&driId=<?php echo $_smarty_tpl->getVariable('info')->value['drive_id'];?>
" enctype="multipart/form-data" method="post">
		<label for="actDescribe" style="margin-left:12px;">试驾说明 *</label><br />
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"><?php echo $_smarty_tpl->getVariable('info')->value['actDescribe'];?>
</textarea>
         <script type="text/javascript">
		    UE.getEditor("actDescribe");
	    </script>
    </form>
 <?php }else{ ?> 
    <form class="addAct" id="theForm" action="operation.php?action=addDrive" enctype="multipart/form-data" method="post">
		<label for="actDescribe" style="margin-left:12px;">试驾说明 *</label><br />
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"></textarea>
         <script type="text/javascript">
		    var editor = new UE.ui.Editor({initialFrameHeight:200,initialFrameWidth:300});
			editor.render("actDescribe");
	    </script>
    </form>
 <?php }?> 
</div>

<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview" style="background:url('../../res/img/phonePreview.png') no-repeat;">
	<!--<div class="test" style="width:245px;height:356px;overflow:hidden; margin-top:138px;margin-left:26px;">
	<iframe id="preview_page" name="preview" frameborder="0" src="../../../user/web/user/carDrive.html" >
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
