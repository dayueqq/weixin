<?php /* Smarty version Smarty-3.0.6, created on 2014-01-23 22:24:13
         compiled from "./newAcc.html" */ ?>
<?php /*%%SmartyHeaderCode:2004452e1260db0ef04-32253279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6663287d87b088de86711bf2820221e85c64af1f' => 
    array (
      0 => './newAcc.html',
      1 => 1390487026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2004452e1260db0ef04-32253279',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加经销商</title>
<script src="../../../common/temp/brand.json"></script>
<script src="../../res/js/jquery-1.4.2.min.js"></script>
<script language="javascript">
 window.onload=function(){
	var str="";
	for(var i=0;i<brandJson.length;i++){
		str+="<option value='"+brandJson[i].split(",")[0]+"'>"+brandJson[i].split(",")[1]+"</option>";
	}
	$('#selectBrand').html(str);
 }
 
 function check(){
	 $('#selectId').val($('#selectBrand').val().replace("_",""));
	 $('#brandN').val($('#selectBrand option:selected').text());
	 if($('#user').val()==""){
		 alert("请填用户名");
		 return false;
	 }
	 if($('#pass').val()==""){
		 alert("请填密码");
		 return false;
	 }
 }
</script>
</head>

<body>
<form action="operation.php?action=addAcc" method="post" enctype="multipart/form-data" onsubmit="return check()" >
  <table width="350px" align="center" style="margin-top:50px; border:#0C6 1px solid">
   <caption style="font-weight:bold; font-size:24px;">添加经销商</caption>
     <tr>
        <td width="20%" align="right">用户名</td>
        <td><input type="text" width="150" name="user" id="user" /></td>
     </tr>
     <tr>
        <td align="right">密码</td>
        <td><input type="text" width="150" name="pass" id="pass" /></td>
     </tr>
     <tr>
        <td align="right">汽车品牌</td>
        <td>
           <select id="selectBrand">
              
           </select>
           <input type="hidden" id="selectId" name="selectId" />
           <input type="hidden" id="brandN" name="brandN" />
        </td>
     </tr>
     <tr>
        <td align="right">mapUrl</td>
        <td><input type="text" width="150" name="mapUrl" /></td>
     </tr>
     <tr>
        <td align="right">mapNorth</td>
        <td><input type="text" width="150" name="mapNorth" /></td>
     </tr>
     <tr>
        <td align="right">mapEast</td>
        <td><input type="text" width="150" name="mapEast" /></td>
     </tr>
     <tr>
        <td colspan="2" align="right"><input type="submit" value="添加" onclick="confirm('是否添加此经销商？')" /></td>
     </tr>
  </table>
</form>
</body>
</html>
