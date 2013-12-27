<?php /* Smarty version Smarty-3.0.6, created on 2013-12-26 09:39:21
         compiled from "./writeMess.html" */ ?>
<?php /*%%SmartyHeaderCode:1895752bbf949020274-49235274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d095bfd6adb24543b0699e3c633f11e0a270733' => 
    array (
      0 => './writeMess.html',
      1 => 1388049878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1895752bbf949020274-49235274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<title>留言提交</title>
<head>
</head>
<body >
<form id="theForm" action="operation.php?action=addMessage" enctype="multipart/form-data" method="post" data-ajax="false">
<input type="hidden" name="comId" value="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
">
<label for="name" style="color:#FFF;margin-left:5%; margin-top:5%;">称呼：</label>
<input type="text" name="name" id="name" data-mini="true" placeholder="例：陈先生 非必填 " style="width:90%;margin:0 auto;"/>
<label for="phone" style="color:#FFF;margin-left:5%;margin-top:5%;">联系方式*：</label>
<input type="text" name="phone" id="phone" data-mini="true" placeholder="例： 18888888888 必填" style="width:90%;margin:0 auto;"/>
<label for="detail" style="color:#FFF; margin-left:5%; margin-top:5%;">您的留言*:</label>
<textarea name="detail" id="detail" data-mini="true" placeholder="在此填写您的宝贵意见 必填" style="height:150px;width:90%;margin:0 auto;"/>
<div class="btn" style="width:60%;margin:0 auto;">
<a href="index.html" data-role="button" data-inline="true" data-theme="c" data-rel="back"  data-corners="true" data-shadow="true" data-iconshadow="true" >取消</a>
<a href="javascript:void(0)" data-role="button" data-inline="true" data-theme="b" data-corners="true" data-shadow="true" data-iconshadow="true" onClick="upForm()">提交</a> 
</div>
</form>
</body></html>
