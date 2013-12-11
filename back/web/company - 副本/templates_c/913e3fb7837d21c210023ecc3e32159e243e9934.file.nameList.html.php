<?php /* Smarty version Smarty-3.0.6, created on 2013-12-02 21:38:22
         compiled from "./nameList.html" */ ?>
<?php /*%%SmartyHeaderCode:2892529c8d4e6ba4d2-57041564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '913e3fb7837d21c210023ecc3e32159e243e9934' => 
    array (
      0 => './nameList.html',
      1 => 1385991499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2892529c8d4e6ba4d2-57041564',
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
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<script src="../../res/js/nameList.js"></script>
<script type="text/javascript" src="../../res/js/datepicker.js"></script>
<script type="text/javascript" src="../../../common/temp/brand.json"></script>
<script type="text/javascript">
$(document).ready(function(){
	//实例三
	$('#date3').DatePicker({
		flat: true,
		date: ['2009-12-28','2010-01-23'],
		current: '2010-01-01',
		calendars: 3,
		mode: 'range',
		starts: 1
	});
	//实例五
	var now3 = new Date();
	now3.addDays(-4);
	var now4 = new Date()
	$('#widgetCalendar').DatePicker({
		flat: true,
		format: 'Y-m-d',
		date: [new Date(now3), new Date(now4)],
		calendars: 3,
		mode: 'range',
		starts: 1,
		onChange: function(formated) {
			$('#widgetField span').get(0).innerHTML = formated.join(' —— ');
		}
	});
	//实例四
	$('.inputDate').DatePicker({
		format:'Y-m-d',
		date: $('#inputDate').val(),
		current: $('#inputDate').val(),
		starts: 1,
		position: 'right',
		onBeforeShow: function(){
			$('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
		},
		onChange: function(formated, dates){
			$('#inputDate').val(formated);
			$('#inputDate').DatePickerHide();
		}
	});
	//实例四
	$('.inputDate1').DatePicker({
		format:'Y-m-d',
		date: $('#inputDate1').val(),
		current: $('#inputDate1').val(),
		starts: 1,
		position: 'right',
		onBeforeShow: function(){
			$('#inputDate1').DatePickerSetDate($('#inputDate1').val(), true);
		},
		onChange: function(formated, dates){
			$('#inputDate1').val(formated);
			$('#inputDate1').DatePickerHide();
		}
	});
	var state = false;
	$('#widgetField>a').bind('click', function(){
		$('#widgetCalendar').stop().animate({height: state ? 0 : $('#widgetCalendar div.datepicker').get(0).offsetHeight}, 500);
		state = !state;
		return false;
	});
    
	//修改时间
	var date=new Date();
	if(date.getDate()<10){
		var curTime=date.getFullYear()+'-'+(date.getMonth()+1)+'-0'+date.getDate();
	    var beforeTime=date.getFullYear()+'-'+(date.getMonth())+'-0'+date.getDate();
	}else{
		var curTime=date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
	    var beforeTime=date.getFullYear()+'-'+(date.getMonth())+'-'+date.getDate();
	}
	$('#inputDate').val(curTime);
	$('#inputDate1').val(curTime);
	$('#widgetField span').html(beforeTime+' —— '+curTime)
	
	//当前是处于试驾数据库还是 预约数据库
	curData='book';
	//更改任务栏
	var str='<option>全部</option>';
	var res=seriesJson['<?php echo $_smarty_tpl->getVariable('carId')->value;?>
'].split(',');
	for(var i=0;i<res.length;i=i+2){
		str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
    }
	$('#carSeries').html(str);
	
	//改变选项栏
    $('#carSeries').change(function(){
		var faval=parseInt($('#carSeries').val());
		var str='<option>全部</option>';
		if(faval){
			var res=mod[faval].split(',');
			for(var i=0;i<res.length;i=i+2){
				 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
			}
		}
		$('#carModel').html(str);
    });

});

  function searchSql(){
	    var series=$('#carSeries option:selected').text();
	  var model=$('#carModel option:selected').text();
	  var startDate=$('#widgetField span').html().split(' —— ')[0];
	  var endDate=$('#widgetField span').html().split(' —— ')[1];
	  var willTime=$('#willBuyTime').val();
	  var conArr=new Array();
	  var conArrCont=new Array();
	  var otherCon='';
	  if(series!='全部'){
		  conArrCont[0]=series;
	  }else{
		  conArrCont[0]='0';
	  }
	  if(model!='全部'){
		  conArrCont[1]=model;
	  }else{
		  conArrCont[1]='0';
	  }
	  conArrCont[2]=startDate;
	  conArrCont[3]=endDate;
	  conArrCont[4]=willTime;
	  
	  if(curData=='book'){
		  $('#theFrame').attr('src','nameStatics.php?data='+encodeURI(conArrCont.join(',')));
	  }else if(curData=='dri'){
		  if($('#driveInput').attr("checked")){
			  conArrCont[0]='0';
		  }else{
			  conArrCont[0]=$('#driveTable #inputDate').val();
		  }
		  conArrCont[1]=$('#driveTable #carSeries option:selected').text();
		  if(conArrCont[1]=='全部'){
			  conArrCont[1]='0';
		  }
		  $('#theFrame').attr('src','nameStatics2.php?data='+encodeURI(conArrCont.join(',')));
	  }else if(curData=='service'){
		  if($('#servInput').attr("checked")){
			  conArrCont[0]='0';
		  }else{
			  conArrCont[0]=$('#inputDate1').val();
		  }
		  conArrCont[1]=$('#serviceKind option:selected').text();
		  if(conArrCont[1]=='全部'){
			  conArrCont[1]='0';
		  }else{
			  conArrCont[1]="预约"+conArrCont[1];
		  }
		  conArrCont[4]=$('#serviceState option:selected').text();
		  if(conArrCont[4]=='全部'){
			  conArrCont[4]='0';
		  }  
		  $('#theFrame').attr('src','nameStatics3.php?data='+encodeURI(conArrCont.join(',')));
	  }
	  //
  }
  
  function qieHuan(obj,type,num){
	  $('#theFrame').attr('src',obj);
	  curData=type;
	  var item1 = document.getElementById("tabBuy");
	  var item2 = document.getElementById("tabDrive");
	  var item3 = document.getElementById("tabSerive");
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive = document.getElementById("driveTable");
	  if(num==1)
	     {
		 item1.className = "tabBuySelected";
		 item2.className = "tabDrive";
		 buy.style.display="block";
		 drive.style.display="none";
		 }
	   else if(num == 2)
	     {
		  item1.className = "tabBuy";
		  item2.className = "tabDriveSelected";
		  buy.style.display="none";
		  drive.style.display="block";
		 }
	   item3.className = "tabService";
	  
	   service.style.display="none";
	  
	  
  }
  
  function exportSql(){
		  var series=$('#carSeries option:selected').text();
		  var model=$('#carModel option:selected').text();
		  var startDate=$('#widgetField span').html().split(' —— ')[0];
		  var endDate=$('#widgetField span').html().split(' —— ')[1];
		  var willTime=$('#willBuyTime').val();
		  var conArr=new Array();
		  var conArrCont=new Array();
		  var otherCon='';
		  if(series!='全部'){
			  conArrCont[0]=series;
		  }else{
			  conArrCont[0]='0';
		  }
		  if(model!='全部'){
			  conArrCont[1]=model;
		  }else{
			  conArrCont[1]='0';
		  }
		  conArrCont[2]=startDate;
		  conArrCont[3]=endDate;
		  conArrCont[4]=willTime;
	  if(curData!='service'){
		  window.location.href='download.php?type='+curData+'&data='+encodeURI(conArrCont.join(','));
	  }else if(curData=='service'){
		  conArrCont[0]=$('#inputDate1').val();
		  conArrCont[1]=$('#serviceKind option:selected').text();
		  if(conArrCont[1]=='全部'){
			  conArrCont[1]='0';
		  }else{
			  conArrCont[1]="预约"+conArrCont[1];
		  }
		  conArrCont[4]=$('#serviceState option:selected').text();
		  if(conArrCont[4]=='全部'){
			  conArrCont[4]='0';
		  }  
		  window.location.href='download.php?type=service&data='+encodeURI(conArrCont.join(','));
	  }
  }
  function changeTab()
  { 
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive =document.getElementById("driveTable");
	   service.style.display="block";
	   buy.style.display="none";
	   drive.style.display="none";
	   var item1 = document.getElementById("tabBuy");
	   var item2 = document.getElementById("tabDrive");
	   var item3 = document.getElementById("tabSerive");
	   item1.className="tabBuy";
	   item2.className="tabDrive";
	   item3.className="tabServiceSelected";
	   curData='service';
	   $('#theFrame').attr('src','nameStatics3.php');
  }
  
  function changeStatus(obj){
	  if(obj=='1'){
		  if($('#driveInput').attr('checked')){
			  $('#inputDate').attr('disabled',true);
		  }else{
			  $('#inputDate').attr('disabled',false);
		  }
	  }else{
		  if($('#servInput').attr('checked')){
			  $('#inputDate1').attr('disabled',true);
		  }else{
			  $('#inputDate1').attr('disabled',false);
		  }
	  }
  }
</script>
</head>

<body>
	<div class="carOnSellList">
    	<div class="addNewCar">
        	<a class="tabBuySelected" id="tabBuy" href="javascript:void(0)" onclick="qieHuan('nameStatics.php','book',1)" >购车报名</a>
            <a class="tabDrive" id="tabDrive" href="javascript:void(0)" onclick="qieHuan('nameStatics2.php','dri',2)" >试驾报名</a>
            <a class="tabService" id="tabSerive" href="javascript:void(0)" onclick="changeTab()" >售后预约</a>
        </div>
        <div class="carSelect">
        	<form class="searchCondition">
            <div class="tab" >
			  <div id="widget" style="height:32px;">
                <p style="float:left; margin-top:5px; margin-right:10px;">报名日期:</p>
				<div id="widgetField" style="float:left;">
					<span>2013-11-10 —— 2013-12-10</span>
					<a href="#">Select date range</a>
				</div>
				<div id="widgetCalendar">
				</div>
			   </div>
		    </div>
            
            <a class="search" href="javascript:void(0)" onclick="searchSql()">查看</a>
            <a class="export" href="javascript:void(0)" onclick="exportSql()">导出</a>
            
            <div id="buyTable" class="buyTable">
                <label for="carSeries">车系:</label>
                <select class="carSeries" name="carSeries" id="carSeries">
                    <option>全部</option>
                </select>
           
                <label for="carModel">车型:</label>
                <select class="carModel" name="carModel" id="carModel">
                   <option>全部</option>  	
                </select>
          
                <label for="willBuyTime">预计购车时间:</label>
                <select id="willBuyTime" class="willBuyTime" name="willBuyTime">
                   <option value="0">全部</option>
                   <option value="一星期内">一星期内</option>
                   <option value="一个月内">一个月内</option>
                   <option value="三个月内">三个月内</option>
                   <option value="六个月内">六个月内</option>
                   <option value="一年之内">一年之内</option>              
                </select>
            </div>
            <div id="driveTable" class="driveTable" style="display:none">
                <input type="checkbox" value="" id="driveInput" onclick="changeStatus(1)"/>全部预约日期&nbsp;&nbsp;&nbsp;&nbsp;
            	<label for="inputDate">预约日期:</label>
                <input class="inputDate" id="inputDate" value="2013-11-01">
                <label for="carSeries" style="margin-left:15px;">车系:</label>
                <select class="carSeries" name="carSeries" id="carSeries">
                    <option>全部</option>
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['name'] = 'info_id';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info_id']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('serInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                       <option value="<?php echo $_smarty_tpl->getVariable('serInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']];?>
"><?php echo $_smarty_tpl->getVariable('serInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['info_id']['index']];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            </div>
            <div id="serviceTable" class="serviceTable" style="display:none" >
                <input type="checkbox" value="" id="servInput" onclick="changeStatus(2)"/>全部预约日期&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="inputDate1">预约日期:</label>
                <input class="inputDate1" id="inputDate1" value="2013-11-01" >
           
                <label for="serviceKind" style="margin-left:20px;">服务:</label>
                <select class="serviceKindSelect" name="serviceKind" id="serviceKind">
                   <option>全部</option>  	
                   <option>维修</option>
                   <option>保养</option>
                </select>
          
                <label for="state" style="margin-left:20px;">处理情况:</label>
                <select class="state" name="state" id="serviceState">
                   <option>全部</option>
                   <option>未处理</option>
                   <option>已处理</option>              
                </select>
            </div>
           </form>
           <br />
        </div>
        <iframe id="theFrame" frameborder="0" allowtransparency="1" width="782px" height="800px" src="nameStatics.php">

    </iframe>
</div>
</body>
</html>
