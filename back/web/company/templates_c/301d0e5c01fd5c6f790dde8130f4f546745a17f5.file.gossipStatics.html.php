<?php /* Smarty version Smarty-3.0.6, created on 2013-12-12 17:49:13
         compiled from "./gossipStatics.html" */ ?>
<?php /*%%SmartyHeaderCode:1898552a98699cfe6a3-42720942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '301d0e5c01fd5c6f790dde8130f4f546745a17f5' => 
    array (
      0 => './gossipStatics.html',
      1 => 1386841749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1898552a98699cfe6a3-42720942',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在售车型</title>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('tempData')->value;?>
"></script>
<link rel="stylesheet" type="text/css" href="../../res/css/nameList.css" />
<link rel="stylesheet" href="../../res/css/datepicker.css

" type="text/css" />
<script src="../../res/js/nameList.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('tempData')->value;?>
 "></script>
<script type="text/javascript">
window.onload=function(){
	var str="<tr class='tTitle'><td class='date'>日期</td><td class='name'>姓名</td><td class='phone'>联系方式</td><td class='detail'>留言内容</td><td class='operation3'>操作</td></tr>";

	for(var i=0;i<mesJson.length;i++){
		str+="<tr><td>"+
				mesJson[i].date+"</td><td>"+
				mesJson[i].name+"</td><td>"+
				mesJson[i].contact+"</td><td>"+
				mesJson[i].cont+"</td><td>"+
				"<a onclick='return confirm(\"是否删除此留言？\")' href='operation.php?action=delMess&id="+mesJson[i].message_id+"'>删除</a></td></tr>";
	}
	$('#tbody').html(str);
}

</script>
</head>

<body>  
        <div class="carOnSellList">
		<h3 style="margin-top:10px;margin-bottom:20px; font-size:18px;">留言详情</h3>
    	<div class="carTable">
        	<table id="tbody" class="tbody" >

            </table>
      </div>
      <!--<div class="page" style="clear:both; font-size:14px; padding-top:15px;"> 
         <p class="page" align="center" id="pageShow"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
<!--</p>   <!-- 显示页码-->
      <!--</div>-->
      </div>
</body>
</html>
