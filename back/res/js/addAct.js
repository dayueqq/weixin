// JavaScript Document


//图片上传预览功能    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 260; 
          var MAXHEIGHT = 180;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//              img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
//图片上传预览功能功能js结束

//车型选择弹框js
  $(function() {
    var series = $( "#series" ),
      	model = $( "#model" ),
        allFields = $( [] ).add( series ).add( model );
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "确认添加": function() {    
          $( this ).dialog( "close" );         
        },
        "取消": function() {
          $( this ).dialog( "close" );
        }
        },
     close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
        }
   });
 
   $( "#addCarModel" )
      .button().click(function() {
        $( "#dialog-form" ).dialog( "open" );
   });
});



    var count = 2;
  	function newCarSeries(){
		
		var formarea = document.getElementById("selectCarModel");
		//添加车系选择框
	    var label1 = document.createElement("label");	
		var select1 = document.createElement("select");
		var name = document.createElement("span");
		select1.id = "select" + count;
		
		label1.id = "label" + count;
		select1.className = "text ui-widget-content ui-corner-all series";
		
		var str='';  //

		var res=seriesJson[curCarId].split(',');
		for(var i=0;i<res.length;i=i+2){
			str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
		}
		select1.innerHTML=str;
		
		name.innerHTML="车系：";
		label1.appendChild(name);
	    label1.appendChild(select1);
		//添加车系选择框完毕
		formarea.appendChild(label1);
		count++;		
		select1.onchange=newCarModel();
		
	}
	function newCarModel()
	{
		//添加车型复选框
		var formarea = document.getElementById("selectCarModel");
		var labelCheck = document.createElement("label");
		var labelname = document.createElement("span");
		var checkBox=document.createElement("input");
		labelCheck.id= "labelCheck"+count;
		labelname.innerHTML = "<br/>车型 ：<br />";
        checkBox.setAttribute("type","checkbox");
		checkBox.className = "model";
		var checkname = document.createElement("label");
		checkname.innerHTML="车款<br />";
		labelCheck.appendChild(labelname);
		labelCheck.appendChild(checkBox);
		labelCheck.appendChild(checkname);
		formarea.appendChild(labelCheck);
	}

 //弹框js结束