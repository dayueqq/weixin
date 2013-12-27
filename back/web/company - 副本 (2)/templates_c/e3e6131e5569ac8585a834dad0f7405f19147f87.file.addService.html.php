<?php /* Smarty version Smarty-3.0.6, created on 2013-12-14 14:49:19
         compiled from "./addService.html" */ ?>
<?php /*%%SmartyHeaderCode:1275352abff6f8f2518-43870931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3e6131e5569ac8585a834dad0f7405f19147f87' => 
    array (
      0 => './addService.html',
      1 => 1387003451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1275352abff6f8f2518-43870931',
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
<link rel="stylesheet" href="../../res/css/addService.css" type="text/css" />
<script src="../../res/js/addService.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="../../res/js/jquery-1.9.1.js"></script>
<script>
    window.UEDITOR_HOME_URL = "/weixin/ueditor";
	
	function upForm(){
	   $('#theForm').submit();
   }
   
</script>

</head>

<body>
<div class="addActivity">
<div class="infoForm">
 <?php if ($_smarty_tpl->getVariable('upSer')->value==1){?> 
	<form class="addAct" id="theForm" action="operation.php?action=addUpService" enctype="multipart/form-data" method="post">
    	<label for="maintain_intro" style="margin-left:12px;">保养简介 *<br />
        <textarea name="maintain_intro" id="maintain_intro" class="maintain_intro" placeholder="请输入保养条款"><?php echo $_smarty_tpl->getVariable('info')->value['maintain'];?>
</textarea> 
	    <script type="text/javascript">
   			 var editor = new UE.ui.Editor({initialFrameHeight:140,initialFrameWidth:300
			 });
    	     editor.render("maintain_intro");
        </script><br />
        <br />
        <br />
		<label for="repair_intro" style="margin-left:12px;">维修介绍 *<br />
       	<textarea name="repair_intro" class="repair_intro" id="repair_intro"  placeholder="请输入维修条款"><?php echo $_smarty_tpl->getVariable('info')->value['fixed'];?>
</textarea>
        <script type="text/javascript">
   			 var editor = new UE.ui.Editor({initialFrameHeight:140,initialFrameWidth:300
			 });
    	     editor.render("repair_intro");
        </script>
    </form>
 <?php }else{ ?> 
    <form class="addAct" id="theForm" action="operation.php?action=addService" enctype="multipart/form-data" method="post">
    	<label for="maintain_intro" style="margin-left:12px;">保养简介 *<br />
        <textarea name="maintain_intro" id="maintain_intro" class="maintain_intro" placeholder="请输入保养条款"></textarea> 
	    <script type="text/javascript">
   			 var editor = new UE.ui.Editor({initialFrameHeight:140,initialFrameWidth:300
			 });
    	     editor.render("maintain_intro");
        </script><br />
        <br />
        <br />
		<label for="repair_intro" style="margin-left:12px;">维修介绍 *<br />
       	<textarea name="repair_intro" class="repair_intro" id="repair_intro"  placeholder="请输入维修条款"></textarea>
        <script type="text/javascript">
   			 var editor = new UE.ui.Editor({initialFrameHeight:140,initialFrameWidth:300
			 });
    	     editor.render("repair_intro");
        </script>
    </form>
 <?php }?> 
</div>

<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview" style="background:url('../../res/img/phonePreview.png') no-repeat;">
	<!--<div class="test" style="width:245px;height:356px;overflow:hidden; margin-top:138px;margin-left:26px;">
	<iframe id="preview_page" name="preview" frameborder="0" src="../../../user/web/user/service.html" >
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
