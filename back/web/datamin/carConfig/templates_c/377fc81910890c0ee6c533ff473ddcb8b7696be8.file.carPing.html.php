<?php /* Smarty version Smarty-3.0.6, created on 2013-11-19 06:10:23
         compiled from "./carPing.html" */ ?>
<?php /*%%SmartyHeaderCode:31698528b00cf648f91-23075285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '377fc81910890c0ee6c533ff473ddcb8b7696be8' => 
    array (
      0 => './carPing.html',
      1 => 1384841418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31698528b00cf648f91-23075285',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../../../user/res/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('file')->value;?>
"></script>
<script language="javascript">
 window.onload=function(){

	  //alert(config.result.paramtypeitems[0].paramitems[1].name);
     var obj=config.result.paramtypeitems[0];
	 //alert(obj.paramitems[1].valueitems[0].specid);
	 //alert(obj.valueitems[0].value);
	alert('<?php echo $_smarty_tpl->getVariable('file')->value;?>
');
	 var arr=new Array();
	 for(var i=0;i<obj.paramitems[1].valueitems.length;i++){//alert(obj.paramitems[1].valueitems[i].specid);
		 arr[i]=new Array(obj.paramitems[1].valueitems[i].specid,obj.paramitems[0].valueitems[i].value,'A 奥迪','<?php echo $_smarty_tpl->getVariable('carName')->value;?>
',obj.paramitems[1].valueitems[i].value,'','','','');
		 
	 }
	   /*$.post("carConfig.php",{'arr':arr},function(data){
		   //alert(data);
	  });*/
 }

</script>
<title>无标题文档</title>
</head>




<body>
</body>
</html>
