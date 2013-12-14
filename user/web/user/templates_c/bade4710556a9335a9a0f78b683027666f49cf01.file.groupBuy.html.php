<?php /* Smarty version Smarty-3.0.6, created on 2013-12-14 12:47:42
         compiled from "./groupBuy.html" */ ?>
<?php /*%%SmartyHeaderCode:2940252ac536ebf29c8-69034385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bade4710556a9335a9a0f78b683027666f49cf01' => 
    array (
      0 => './groupBuy.html',
      1 => 1387025168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2940252ac536ebf29c8-69034385',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="title" content="微信微店">
<meta name="apple-touch-fullscreen" content="YES">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $_smarty_tpl->getVariable('comName')->value;?>
</title>
<script type="text/javascript" src="../../res/js/groupBuy.js"></script>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jsonfile')->value;?>
"></script>
<script src="../../../common/temp/brand.json"></script>
<link rel="stylesheet" href="../../res/css/groupBuy.css">
<script language="javascript">
 window.onload=function(){
	 //修改父节点iframe高度
	hashH = document.documentElement.scrollHeight; 
	urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
	document.getElementById("iframeC").src=urlC+"#"+hashH; 
	
	//更改任务栏
	var str='<option>- 请选择 -</option>';
	var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
	for(var i=0;i<res.length;i=i+2){
		str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
    }
	$('#carSeries').html(str);
	
	//改变选项栏
    $('#carSeries').change(function(){
		var faval=parseInt($('#carSeries').val());
		var str='<option>- 请选择 -</option>';
		var res=mod[faval].split(',');
		for(var i=0;i<res.length;i=i+2){
			 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		}
		$('#carModel').html(str);
    });
	
	$.ajax({ 
		url:'<?php echo $_smarty_tpl->getVariable('xmlFile')->value;?>
', 
		type: 'GET', 
		dataType: 'xml',
		timeout: 1000, 
		error: function(xml){ 
			  $('#rankList').html('');
		}, 
		success: function(xml){ 
			   var xmlArr=new Array();
			   $(xml).find("item").each(function(i){ 
			       xmlArr[i]=new Array();
				   xmlArr[i][0]=$(this).children("carid").text(); //取文本 
				   xmlArr[i][1]=$(this).children("name").text(); //取文本 
				   xmlArr[i][2]=$(this).children("num").text(); //取文本  
			   });// alert(xmlArr);
			   
			   xmlArr.sort(function(a,b){return b[2]-a[2]});
			   var tempStr='';
			   for(var i=0;i<xmlArr.length;i++){
				   if(i<3){
				       tempStr+="<li><div class='position'><img src='../../res/img/list-icon1.jpg'/>";
				   }else{
					   tempStr+="<li><div class='position'><img src='../../res/img/list-icon2.jpg'/>";
				   }
				   tempStr+="<p class='rankNum'>01</p></div><div class='content'><span class='rankcar'>"+xmlArr[i][1]+"</span><span class='rankPeople'>("+xmlArr[i][2]+"人)</span></div></li>";
			   }
			   tempStr+="<p class='clear'></p>";
			   $('#rankList').html(tempStr);
		} 
	});

 }

 function upForm(){
	 var name = document.getElementById("name").value;
	 var phone = document.getElementById("custom").value;
	 var carSeries = document.getElementById("carSeries").value;
	 var carModel = document.getElementById("carModel").value;
	 if(name==''){
		alert("请填写姓名");
		return false;
	 }
	 if(phone==''){
		alert("请填写电话");
		return false;
	 }
	 if(carSeries=='请选择车系'){
		alert("请选择车系");
		return false;
	 }
	 if(carModel=='请选择车型'){
		alert("请选择车型");
		return false;
	 }
	 $('#carSerName').val($('#carSeries option:selected').text());
	 $('#carIdName').val($('#carModel option:selected').text());
	 $('#theForm').submit();
 }
</script>
<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
</script>
</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center; z-index:77;">
		<p style="color:#fff; font-size:18px; position:relative;">团购报名</p>
        <a href="activityList.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
        <a href="homepage.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:85%; margin-top:8px;"><img src="../../res/img/home.png" width="33" height="33"/></a>		
    </div>
    <div style="width:100%; height:47px;"></div>
    <div class="rules">
           <p class="actName">奥迪团购奥迪百团大战火热进行中</p>
           <p class="actTime">2013-12-11 至 2013-12-20</p>
        <div class="dot-line">
        </div>
        <div class="describe">
        <?php echo $_smarty_tpl->getVariable('info')->value['actDescribe'];?>

        </div>
    </div>
    <div class="phone">
    	<span>立即报名，获知团购优惠价</span>
    </div>

    <div class="signup">
    	<p class="ensure">请填写有效联系方式，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form id="theForm" class="signup-form" action="operation.php?action=upGro&comId=<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['car_brand'];?>
" name="brand">
        <select name="carSeries" class="carSeries" id="carSeries"  onFocus="changeOutline3()" >
            <option selected="1">请选择车系</option>
        </select>
            <input type="hidden" value="" name="carSerName" id="carSerName">
        <select name="carModel" class="carModel" id="carModel"  onFocus="changeOutline2()" >
            <option selected="1">请选择车型</option>
        </select>
        <select name="willBuyTime" class="willBuyTime" id="willBuyTime" onFocus="changeOutline3()">
        	<option selected="1">请选择时间</option>
            <option value="一星期内">一星期内</option>
            <option value="一个月内">一个月内</option>
            <option value="三个月内">三个月内</option>
            <option value="六个月内">六个月内</option>
            <option value="一年之内">一年之内</option>
        </select>
        <input name="name" class="name" id="name" placeholder="请输入您的姓名  如：陈先生" onFocus="changeOutline0()"  ><br />
        <input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br /> 
            <input type="hidden" id="carIdName" name="carIdName" />
            <input type="hidden" name="actName" value="<?php echo $_smarty_tpl->getVariable('info')->value['act_name'];?>
" />
        </form>
        <a href="javascript:void(0)" onClick="upForm()" class="submit">立即报名</a>
    </div>
    <div class="phone">
    	<span>团购报名排行版</span>
    </div>
    <div class="rank">
       <ul class="rankList" id="rankList">
       		
            
       </ul>
    </div>
    <div class="phone">
    	<span>推荐阅读</span>
    </div>
    <div class="reading">
    	<ul>
          <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('actInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['total']);
?>
        	<li>
              <a href="actSignup.php?actId=<?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_id'];?>
#mp.weixin.qq.com" class="readTitle">
<?php echo $_smarty_tpl->getVariable('actInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']]['act_name'];?>
</a>
            </li>
          <?php endfor; endif; ?> 
         
        </ul>
    </div>
    <div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>

    
    <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe>    
</body>
</html>
