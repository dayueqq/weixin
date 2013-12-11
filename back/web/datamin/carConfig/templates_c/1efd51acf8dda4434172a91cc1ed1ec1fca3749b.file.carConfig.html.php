<?php /* Smarty version Smarty-3.0.6, created on 2013-11-19 06:11:13
         compiled from "./carConfig.html" */ ?>
<?php /*%%SmartyHeaderCode:25763528b01016d73e9-56741743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1efd51acf8dda4434172a91cc1ed1ec1fca3749b' => 
    array (
      0 => './carConfig.html',
      1 => 1384841470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25763528b01016d73e9-56741743',
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
<script language="javascript">
 window.onload=function(){
	 var cont=eval('(' + '<?php echo $_smarty_tpl->getVariable('info')->value;?>
' + ')');
	 var conArr=new Array();
	 var conContArr=new Array();
	 for(var k=0;k<cont.length;k++){
		 conArr[k]=cont[k][0];
		 conContArr[k]=cont[k][1];
	 }

	 for(var i=0;i<conArr.length;i++){
		 if(conArr[i]=='538'||conArr[i]=='692'){
		 $.post("claw.php",{'id':conArr[i],'carName':conContArr[i]},function(data){alert(data);
				 var cont=eval('(' + data + ')');
			     $('#theFrame').attr('src','carPing.php?file='+cont[2]+'&carName='+cont[1]);
		 });	  
		 }
	 }
	 
 }

</script>
<title>无标题文档</title>
</head>
<body>
<iframe id="theFrame" width="800" height="200" src=""></iframe>
</body>
</html>
