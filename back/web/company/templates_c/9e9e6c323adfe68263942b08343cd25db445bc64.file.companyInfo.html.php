<?php /* Smarty version Smarty-3.0.6, created on 2013-12-06 18:01:50
         compiled from "./companyInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:3033752a1a08e139128-24914748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e9e6c323adfe68263942b08343cd25db445bc64' => 
    array (
      0 => './companyInfo.html',
      1 => 1386324039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3033752a1a08e139128-24914748',
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
<link rel="stylesheet" href="../../res/css/companyInfo.css"type="text/css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../../ueditor/ueditor.all.js"></script>
<script>
    window.UEDITOR_HOME_URL = "/weixin/ueditor";
</script>
<script src="../../res/js/companyInfo.js" type="text/javascript"></script>
<script type="text/javascript">
  function upForm(){
	  $('#theForm').submit();
  }
</script>

</head>

<body>

<div class="addActivity">
<div class="goBack">
</div>
<div class="infoForm">
	<form id="theForm" class="addAct" action="operation.php?action=upComInfo" enctype="multipart/form-data" method="post">
    	<label for="actName">公司名称 *</label>
        <input type="text" name="actName" class="actName" id="actName" value="<?php echo $_smarty_tpl->getVariable('info')->value['company_name'];?>
" /><br />
        <label for"uploadPic">店面图片 *</label>
        <input type="file" name="uploadPic" class="uploadPic" id="uploadPic" onchange="previewImage(this)" />
			<div id="preview">
  				  <img id="imghead" border=0 src="<?php echo $_smarty_tpl->getVariable('info')->value['pic'];?>
" />
                  <p class="attention">注意：1.封面尺寸要求4:3<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2.推荐尺寸480*360像素</p>
			</div>
            </br>
            </br>
        <label for="actDescribe" >公司简介 *</label></br>
       	<textarea name="actDescribe" class="actDescribe" id="actDescribe"  placeholder="最多支持300个文字"><?php echo $_smarty_tpl->getVariable('info')->value['company_info'];?>
</textarea>
         <script type="text/javascript">
		    UE.getEditor("actDescribe");
	    </script>
		<p class="phone" >客服电话 *</p>
        <input type="text" name="customPhone" class="customPhone" id="customPhone" placeholder="请输入联系号码" value="<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" />
        <p style="font-size:12px; color:#999;">400电话及分机号请按照如下格式填写："4008888888，8889"</p>
        <p class="help" >救援电话 *</p>
        <input type="text" name="helpPhone" class="customPhone" id="customPhone2" placeholder="请输入救援热线" value="<?php echo $_smarty_tpl->getVariable('info')->value['helpPhone'];?>
" />
    </form>
</div>
<div class="addActArrow">
	<img src="../../res/img/addActArrow.png" />
</div>
<div class="pagePreview" style="background:url('../../res/img/phonePreview.png') no-repeat;">
	<!--<div class="test" style="width:245px;height:356px;overflow:hidden; margin-top:138px;margin-left:26px;">
	<iframe id="preview_page" name="preview" frameborder="0" src="../../../user/web/user/companyInfo.html" >
    </iframe>
    </div>-->
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
