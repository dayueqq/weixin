<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 08:41:03
         compiled from "./carDrive.html" */ ?>
<?php /*%%SmartyHeaderCode:204065307111f1d0af5-35659108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e6f62362ff94db5e17351eda2068563fd5d1263' => 
    array (
      0 => './carDrive.html',
      1 => 1387983694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204065307111f1d0af5-35659108',
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
<script type="text/javascript" src="../../res/js/carDrive.js"></script>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" href="../../res/css/carDrive.css">
<script src="../../../common/temp/brand.json"></script>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
function upForm(){
	 var name = document.getElementById("name").value;
	 var phone = document.getElementById("custom").value;
	 var date = document.getElementById("date").value;
	 if(name==''){
		alert("请填写姓名");
		return false;
	 }
	 if(phone==''){
		alert("请填写电话");
		return false;
	 }
	 if(date==''){
		alert("请填写预约日期");
		return false;
	 }

	 $('#carSerName').val($('#carSeries option:selected').text());
	 $('#carModName').val($('#carModel option:selected').text());
	 $('#theForm').submit();
}
</script>

</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;">
		<p style="color:#fff; position:relative;">试驾报名</p>
        <a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-homepage.html" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
    </div>
    <div style="width:100%; height:47px;"></div>
	<div class="carName">
    	<p>微信试驾报名，享购车大优惠</p>
    </div>
    <div class="rules">
    	<p class="title">试驾优惠及规则说明</p>
        <div class="dot-line">
        </div>
        <div class="describe">
        <?php echo $_smarty_tpl->getVariable('carInfo')->value['actDescribe'];?>

        </div>
    </div>
    <div class="phone">
    	<img class="phone-pic" src="../../res/img/phone-icon.png">
        <a href="tel:<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
" class="phone-num">询问客服： <?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
</a>
    </div>
    
    <div class="signup">
    	<p class="ensure">请填写有效联系方式，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form class="signup-form" id="theForm" action="operation.php?action=addDriCar" enctype="multipart/form-data" method="post">
         <select name="carSeries" class="carSeries" id="carSeries"  onFocus="changeOutline3()" >
            <option selected="1">请选择车系</option>
        </select>
        <input type="hidden" value="" name="carSerName" id="carSerName">
        <input type="hidden" value="" name="carModName" id="carModName">
        <input type="hidden" name="carBrand" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['car_brand'];?>
">
        <input type="hidden" name="comId" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
">
 
 		<select class="carModel" id="date" name="bookTime">
        </select>
        <input name="name" class="name" id="name" placeholder="请输入您的姓名 如：陈先生" onFocus="changeOutline0()"  ><br />
        <input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br />
        </form>
        <a href="javascript:void(0)" class="submit" onClick="upForm()">立即报名</a>
    </div>
	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
    <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe> 
    <script>
	window.onload = produceDate();
		function produceDate(){
			 //修改父节点iframe高度
	          hashH = document.documentElement.scrollHeight; 
	          urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
	          document.getElementById("iframeC").src=urlC+"#"+hashH; 
			//更改任务栏
			var str='<option>请选择车系</option>';
			
			//判断是不是双品牌
			<?php if ($_smarty_tpl->getVariable('double')->value==1){?> 
			var carIdArr='<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'.split('@');
			var res=(seriesJson[carIdArr[0]]+','+seriesJson[carIdArr[1]]).split(',');
			<?php }else{ ?> 
			var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
			<?php }?> 
	
			for(var i=0;i<res.length;i=i+2){
				str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" 
			}
			$('#carSeries').html(str);
			
			//改变选项栏
			$('#carSeries').change(function(){
				var faval=parseInt($('#carSeries').val());
				var str='<option>请选择车系</option>';
				if(faval){
					var res=mod[faval].split(',');
					for(var i=0;i<res.length;i=i+2){
						 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
					}
				}
				$('#carModel').html(str);
			});

			var item = document.getElementById("date");
			var time = new Date();
			var year = time.getYear()+1900;
			var month = time.getMonth()+1;
			var myday = new Date(year, month, 0).getDate(); 
			var i = time.getDate();
			var leftday = myday - i + 1;
			var temp = document.createElement("option");
			temp.innerHTML = "请选择预约日期";
			temp.value = "";
			item.appendChild(temp);
			if(month < 10)
				month = '0' + month; 
			for(i; i<=myday; i++)
			{
				
				var sb = document.createElement("option");
				if(i < 10)
				{
				var temp= '0'+i;
				sb.setAttribute("value",year+'-'+month+'-'+temp);
				sb.innerHTML=year+'-'+month+'-'+temp;
				}
				else
				{
				sb.setAttribute("value",year+'-'+month+'-'+i);
				sb.innerHTML=year+'-'+month+'-'+i;
				}			
				item.appendChild(sb);	
			}
			//处理到达12月后下一年的情况
			if(month == 12)
				{
					year = year ++;
					month= '0'+(month-11);
				}
			else
				{
					month++;
					if(month < 10)
					month = '0'+month;
				}
			for(var j = 1; j<=(30-leftday);j++)
			{
				var sb = document.createElement("option");
				if(j < 10)
				{
				var temp= '0'+j;
				sb.setAttribute("value",year+'-'+month+'-'+temp);
				sb.innerHTML=year+'-'+month+'-'+temp;
				}
				else
				{
				sb.setAttribute("value",year+'-'+month+'-'+j);
				sb.innerHTML=year+'-'+month+'-'+j;
				}			
				item.appendChild(sb);	
				
			}
			
		}
</script>
</body>
</html>
