<?php /* Smarty version Smarty-3.0.6, created on 2013-12-12 23:12:42
         compiled from "./nameStatics3.html" */ ?>
<?php /*%%SmartyHeaderCode:818852a9d26a9e9702-50624359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0c85dc7dc42f640b21ea2b7c4cca3c393c9c38a' => 
    array (
      0 => './nameStatics3.html',
      1 => 1385989527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '818852a9d26a9e9702-50624359',
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
<link rel="stylesheet" type="text/css" href="../../res/css/nameList.css" />
<link rel="stylesheet" href="../../res/css/datepicker.css

" type="text/css" />
<script src="../../res/js/nameList.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('tempData')->value;?>
 "></script>
<script type="text/javascript">
	window.onload = function () {
		pageQie(0);
		var tb = document.getElementById("tbody");
		var tbody = tb.getElementsByTagName("tbody")[0];
		var trs = tbody.getElementsByTagName("tr");

		for (var i = 0; i < trs.length; i++) {
			if (i % 2 != 0) {
				trs[i].style.backgroundColor = "#fcfcfc";
			}
		}
		
	};
	
	<?php if ($_smarty_tpl->getVariable('choice')->value=='0'){?> 
	function pageQie(page){
		var str="<tbody><tr class='tTitle'><td class='date'>"+"报名日期"+"</td><td class='serviceKind'>"+
					 "服务类型"+"</td><td class='carNum'>"+
					 "车牌号"+"</td><td class='bookDate'>"+
					 "预约日期"+"</td><td class='bookTime'>"+
					 "预约时间"+"</td><td class='name'>"+
					 "姓名"+"</td><td class='phone'>"+
					 "联系方式"+"</td><td class='operation2'>操作</td></tr>";
					 "预约时间"+"</td></tr>";
		var show=10;
		for(var i=page*show;i<(page+1)*show&&i<dataJson.length;i++){
			str+="<tr><td class='date'>"+dataJson[i].date+"</td><td class='serviceKind'>"+
					 dataJson[i].type+"</td><td class='carNum'>"+
					 dataJson[i].license+"</td><td class='bookDate'>"+
					 dataJson[i].bookDate+"</td><td class='bookTime'>"+
					 dataJson[i].bookTime+"</td><td class='name'>"+
					 dataJson[i].name+"</td><td class='phone'>"+
					 dataJson[i].contact+"</td><td class='operation2'>";
					 if(dataJson[i].status==0){
						 str+="<a onclick='return confirm(\"是否标记为已处理？\")' href='operation.php?action=dealSer&id="+dataJson[i].service_id+"'>标记为已处理";
					 }else{
						 str+="<a onclick='return confirm(\"是否标记为未处理？\")' href='operation.php?action=dealSerReg&id="+dataJson[i].service_id+"'>已处理";
					 }
					 str+="</a>&nbsp;&nbsp;<a onclick='return confirm(\"是否删除此服务报名？\")' href='operation.php?action=deleSer&id="+dataJson[i].service_id+"'>删除</a>"+
					 "</td>"+
				 +"</tr>"	;
		}
		str+="</tbody>";
		$('#tbody').html(str);
		
		var numPage=Math.ceil(dataJson.length/show);
		var pageStr='';
		for(var k=1;k<=numPage;k++){
			pageStr+="<a href='javascript:void(0)' onclick='pageQie("+(k-1)+")'>"+k+"</a>";
		}
		$('#pageShow').html(pageStr);
	}
	<?php }else{ ?> 
	data=decodeURI('<?php echo $_smarty_tpl->getVariable('choice')->value;?>
');
	dataArr=data.split(',');
    
	var m=0;
	var finalJson=new Array();
    for(var k=0;k<dataJson.length;k++){
		flag=0;
		//先筛选日期
		if(new Date(dataArr[2])<=new Date(dataJson[k].date)){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&new Date(dataArr[3])>=new Date(dataJson[k].date)){
			flag=1;
		}else{
			flag=0;
		}
		//alert(flag+' k: '+k);
		if(flag==1&&dataArr[0]=='0'){
			flag=1;
		}else if(flag==1&&dataArr[0]==dataJson[k].bookDate){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&dataArr[1]=='0'){
			flag=1;
		}else if(flag==1&&dataArr[1]==dataJson[k].type){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&dataArr[4]=='0'){
			flag=1;
		}else if(flag==1){
			if(dataArr[4]=='未处理'){
				if(dataJson[k].status=='0'){
					flag=1;
				}else{
					flag=0;
				}
			}else{
				if(dataJson[k].status=='1'){
					flag=1;
				}else{
					flag=0;
				}
			}
		}else{
			flag=0;
		}
		
		//	
		if(flag==1){
			finalJson[m]=dataJson[k];
			m++
		}
	}
	function pageQie(page){
		var str="<tbody><tr class='tTitle'><td class='date'>"+"报名日期"+"</td><td class='serviceKind'>"+
					 "服务类型"+"</td><td class='carNum'>"+
					 "车牌号"+"</td><td class='bookDate'>"+
					 "预约日期"+"</td><td class='bookTime'>"+
					 "预约时间"+"</td><td class='name'>"+
					 "姓名"+"</td><td class='phone'>"+
					 "联系方式"+"</td><td class='operation2'>操作</td></tr>";
					
		var show=10;
		for(var i=page*show;i<(page+1)*show&&i<finalJson.length;i++){
			str+="<tr><td class='date'>"+finalJson[i].date+"</td><td class='serviceKind'>"+
			         finalJson[i].type+"</td><td class='carNum'>"+
					 finalJson[i].license+"</td><td class='bookDate'>"+
					 finalJson[i].bookDate+"</td><td class='bookTime'>"+
					 finalJson[i].bookTime+"</td><td class='name'>"+
					 finalJson[i].name+"</td><td class='phone'>"+
					 finalJson[i].contact+"</td><td class='operation2'>";
					 if(finalJson[i].status==0){
						 str+="<a onclick='return confirm(\"是否标记为已处理？\")' href='operation.php?action=dealSer&id="+finalJson[i].service_id+"'>标记为已处理";
					 }else{
						 str+="<a onclick='return confirm(\"是否标记为未处理？\")' href='operation.php?action=dealSerReg&id="+dataJson[i].service_id+"'>已处理";
					 }
					 str+="</a>&nbsp;&nbsp;<a onclick='return confirm(\"是否删除此服务报名？\")' href='operation.php?action=deleSer&id="+finalJson[i].service_id+"'>删除</a>"+
					 "</td>"+
				 +"</tr>"	;
		}
		str+="</tbody>";
		$('#tbody').html(str);
		
		var numPage=Math.ceil(m/show);
		var pageStr='';
		for(var k=1;k<=numPage;k++){
			pageStr+="<a href='javascript:void(0)' onclick='pageQie("+(k-1)+")'>"+k+"</a>";
		}
		$('#pageShow').html(pageStr);
	}
	<?php }?> 
</script>
</head>

<body>
    	<div class="carTable">
        	<table id="tbody" class="tbody" >
            	<tr class="tTitle">
                	<td class="date">报名日期</td>
                    <td class="serviceKind">服务种类</td>
                    <td class="carNum">车牌号</td>
                    <td class="bookDate">预约日期</td>
                    <td class="bookDate">预约时间</td>
                    <td class="name">姓名</td>
                    <td class="phone">联系方式</td>
                    <td class="operation2">操作</td>                   
                </tr>
            </table>
      </div>
      <div class="page" style="clear:both; font-size:14px; padding-top:15px;"> 
         <p class="page" align="center" id="pageShow"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
</p>   <!-- 显示页码-->
      </div>
      
</body>
</html>
