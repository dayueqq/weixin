<?php /* Smarty version Smarty-3.0.6, created on 2013-11-11 14:19:18
         compiled from "cartype.html" */ ?>
<?php /*%%SmartyHeaderCode:78645280e7665c42d5-82422952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd690c12f02c27b3feb0050acac9e92eb66b44da4' => 
    array (
      0 => 'cartype.html',
      1 => 1384179554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78645280e7665c42d5-82422952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加车型车系</title>
<link href="../../res/css/cartype.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js "></script>
<script language="javascript">
   /*$('.cartype table tr td .button').each(function(i){
	   value=f;
	   $.post("upcartype.php",{'val':val},function(){

       });
   });*/
   window.onload=function(){
	   $('#type').change(function(){
		   $.post("cartype.php?level=2",{'father':$(this).val()},function(data){
			   //alert(data);
			   var resp=data.split("@/@");
			   var str='';
			   for(var i=0;i<resp.length;i++){
				   var temp=resp[i].split("@@");
				   str+="<option value='"+temp[0]+"'>"+temp[1]+"</option>" ;
			   }
			   $('#series').html(str);
           });
	   });
	   
	   
	   $(".button:eq(0)").click( function() {
		   $.post("upcartype.php?level=1",{'name':$('input:eq(0)').val()},function(data){
			   if(data==1){
				   alert('添加成功');
				   location.reload();
			   }else{
				   alert('添加失败');
			   }
		   });
       });
	   $(".button:eq(1)").click( function() {
		   $.post("upcartype.php?level=2",{'name':$(this).parent().find('input:eq(0)').val(),'father':$(this).parent().find('select').val()},function(data){
			   if(data==1){
				   alert('添加成功');
				   location.reload();
			   }else{
				   alert('添加失败');
			   }
		   });
       });
	   $(".button:eq(2)").click( function() {
		   $.post("upcartype.php?level=3",{'name':$(this).parent().find('input:eq(0)').val(),'father':$('#series').val()},function(data){
			   if(data==1){
				   alert('添加成功');
				   location.reload();
			   }else{
				   alert('添加失败');
			   }
		   });
       });
   }
</script>
</head>

<body>
  
  <div class="cartype">
      <table width="90%" border="1">
        <tr>
          <td width="100px">添加品牌</td>
          <td><input class="brand" type="text" name="brand" /><input class="button" type="button" value="添加" /></td>
        </tr>
        <tr>
          <td>添加车型</td>
          <td>
             <select name="type">
                <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['name'] = 'type_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('type')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('type')->value[$_smarty_tpl->getVariable('smarty')->value['section']['type_id']['index']]['id'];?>
"><?php echo $_smarty_tpl->getVariable('type')->value[$_smarty_tpl->getVariable('smarty')->value['section']['type_id']['index']]['name'];?>
</option> 
                <?php endfor; endif; ?>
             </select>
             <input type="text" name="series" /><input class="button" type="button" value="添加" />
          </td>
        </tr>
        <tr>
          <td>添加车款</td>
          <td>
             <select id="type" name="type">
                <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['name'] = 'type_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('type')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['type_id']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('type')->value[$_smarty_tpl->getVariable('smarty')->value['section']['type_id']['index']]['id'];?>
"><?php echo $_smarty_tpl->getVariable('type')->value[$_smarty_tpl->getVariable('smarty')->value['section']['type_id']['index']]['name'];?>
</option> 
                <?php endfor; endif; ?>
             </select>
             <select id="series">
             </select>
             <input type="text" name="type" /><input class="button" type="button" value="添加" />
          </td>
        </tr>
        <tr>
          <td>汽车图片</td>
          <td><input type="file" />
        </tr>
        <tr>
          <td>汽车配置</td>
          <td><input type="text" />
        </tr>
      </table>
  </div>
</body>
</html>
