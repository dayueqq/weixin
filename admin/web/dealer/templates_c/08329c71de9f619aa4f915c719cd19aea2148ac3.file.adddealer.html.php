<?php /* Smarty version Smarty-3.0.6, created on 2013-10-30 08:25:48
         compiled from "./adddealer.html" */ ?>
<?php /*%%SmartyHeaderCode:184355270c28c7328a2-85367515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08329c71de9f619aa4f915c719cd19aea2148ac3' => 
    array (
      0 => './adddealer.html',
      1 => 1383121344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184355270c28c7328a2-85367515',
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
<link href="../../res/css/dealer/adddealer.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <form action="updealer.php" method="post" enctype="multipart/form-data" class="dealertype">
      <table width="90%" border="1">
        <tr>
          <td width="100px">经销商名称</td>
          <td><input type="text" name="name" /></td>
        </tr>
        <tr>
          <td>所在城市</td>
          <td><input type="text" name="city" /></td>
        </tr>
        <tr>
          <td>所在地区</td>
          <td><input type="text" name="place" /></td>
        </tr>
        <tr>
          <td>联系方式</td>
          <td><input type="text" name="contact" /></td>
        </tr>
        <tr>
          <td>经销商官网</td>
          <td><input type="text" name="url" /></td>
        </tr>
        <tr>
          <td>优惠礼品</td>
          <td><input class="gift" type="checkbox" name="gift[]" value="0" />礼品1
              <input class="gift" type="checkbox" name="gift[]" value="1" />礼品2
              <input class="gift" type="checkbox" name="gift[]" value="2" />礼品3 </td>
        </tr>
        <tr>
           <td align="right" colspan="2"><input style="width:100px" type="submit" value="添加经销商" /></td>
        </tr>
      </table>
      
  </form>
</body>
</html>
