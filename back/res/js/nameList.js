// JavaScript Document
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
	
	//判断是不是双品牌
	<!--{if $double==1}--> 
	var carIdArr='<!--{$carId}-->'.split('@');
	var res=(seriesJson[carIdArr[0]]+','+seriesJson[carIdArr[1]]).split(',');
	<!--{else if}--> 
	var res=seriesJson['<!--{$carId}-->'].split(',');
	<!--{/if}--> 

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
	  }else if(curData=='groupBuy'){
		  $('#theFrame').attr('src','nameStatics4.php?data='+encodeURI(conArrCont.join(',')));
	  }
	  //
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
	  }else if(curData=='groupBuy'){
		  window.location.href='download.php?type=groupBuy&data='+encodeURI(conArrCont.join(','));
	  }
  }
  //购车报名+试驾报名 选项卡切换
    function qieHuan(obj,type,num){
	  $('#theFrame').attr('src',obj);
	  curData=type;
	  var item1 = document.getElementById("tabBuy");
	  var item2 = document.getElementById("tabDrive");
	  var item3 = document.getElementById("tabSerive");
	  var item4 = document.getElementById("tabGroupBuy");
	  var item5 = document.getElementById("tabReplace");
	  var item6 = document.getElementById("tabInsurance");
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
	   item4.className = "tabGroupBuy";
	   item5.className = "tabReplace";
	   item6.className = "tabInsurance";
	   var searchCondition = document.getElementById("widget");
	   searchCondition.style.display="block";
  }
  //预约售后 选项卡切换
  function changeTab()
  { 
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive =document.getElementById("driveTable");
	   var item1 = document.getElementById("tabBuy");
	   var item2 = document.getElementById("tabDrive");
	   var item3 = document.getElementById("tabSerive");
	   var item4 = document.getElementById("tabGroupBuy");
	   var item5 = document.getElementById("tabReplace");
	   var item6 = document.getElementById("tabInsurance");
	   buy.style.display="none";
	   drive.style.display="none";
	   service.style.display="block";
	   var searchCondition = document.getElementById("widget");
	   searchCondition.style.display="block";
	   item1.className="tabBuy";
	   item2.className="tabDrive";
	   item4.className="tabGroupBuy";
	   item3.className="tabServiceSelected";
	   item5.className="tabReplace";
	   item6.className="tabInsurance";
	   curData='service';
	   $('#theFrame').attr('src','nameStatics3.php');
  }
  //团购报名 选项卡切换
   function changeTab1()
  { 
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive =document.getElementById("driveTable");
	   var item1 = document.getElementById("tabBuy");
	   var item2 = document.getElementById("tabDrive");
	   var item3 = document.getElementById("tabSerive");
	   var item4 = document.getElementById("tabGroupBuy");
	   var item5 = document.getElementById("tabReplace");
	   var item6 = document.getElementById("tabInsurance");
	   service.style.display="none";
	   buy.style.display="block";
	   drive.style.display="none";
	   var searchCondition = document.getElementById("widget");
	   searchCondition.style.display="block";
	   item1.className="tabBuy";
	   item2.className="tabDrive";
	   item3.className="tabService";
	   item4.className="tabGroupBuySelected";
	   item5.className="tabReplace";
	   item6.className="tabInsurance";
	   curData='groupBuy';
	   $('#theFrame').attr('src','nameStatics4.php');
  }
  //二手车置换 选项卡切换
   function changeTab2()
  { 
  	   var item1 = document.getElementById("tabBuy");
	   var item2 = document.getElementById("tabDrive");
	   var item3 = document.getElementById("tabSerive");
	   var item4 = document.getElementById("tabGroupBuy");
	   var item5 = document.getElementById("tabReplace");
	   var item6 = document.getElementById("tabInsurance");
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive =document.getElementById("driveTable");
	   service.style.display="none";
	   buy.style.display="none";
	   drive.style.display="none";
	   var searchCondition = document.getElementById("widget");
	   searchCondition.style.display="none";
	   item1.className="tabBuy";
	   item2.className="tabDrive";
	   item3.className="tabService";
	   item4.className="tabGroupBuy";
	   item5.className="tabReplaceSelected";
	   item6.className="tabInsurance";
	   curData='groupBuy';
	   $('#theFrame').attr('src','nameStatics5.html');
  }
  //保险续保 选项卡切换
   function changeTab3()
  { 
       var item1 = document.getElementById("tabBuy");
	   var item2 = document.getElementById("tabDrive");
	   var item3 = document.getElementById("tabSerive");
	   var item4 = document.getElementById("tabGroupBuy");
	   var item5 = document.getElementById("tabReplace");
	   var item6 = document.getElementById("tabInsurance");
	   var service=document.getElementById("serviceTable");
	   var buy =document.getElementById("buyTable");
	   var drive =document.getElementById("driveTable");
	   service.style.display="none";
	   buy.style.display="none";
	   drive.style.display="none";
	   var searchCondition = document.getElementById("widget");
	   searchCondition.style.display="none";
	   item1.className="tabBuy";
	   item2.className="tabDrive";
	   item3.className="tabService";
	   item4.className="tabGroupBuy";
	   item5.className="tabReplace";
	   item6.className="tabInsuranceSelected";
	   curData='groupBuy';
	   $('#theFrame').attr('src','nameStatics6.html');
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
