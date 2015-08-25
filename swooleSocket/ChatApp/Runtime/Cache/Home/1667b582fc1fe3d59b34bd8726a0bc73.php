<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		*{ padding: 0; margin: 0; } 
		div{ padding: 4px 48px;} 
		body{ background: #fff; font-family: "微软雅黑"; color: #333;} 
		h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } 
		p{ line-height: 1.8em; font-size: 36px }
		form{margin: 50px 50px}
		textarea{margin: 0px 0 0 50px}
		input{margin: 0px 0px 0px 50px}
	</style>
	<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8">
	</script>
<!--	<script type="text/javascript">
		var myObj = getObj();
		function $(id) {
			return document.getElementById(id);//id 不用加引号
		}

		function getObj() {
			var obj;
			if(window.ActiveXObject){
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}else {
				obj = new XMLHttpRequest();
			}
			return obj;
			//myObj = obj;
		}

		function del() {
			var url = "<?php echo U('Index/doDel');?>";
			var data="username=<?php echo I('get.username');?>";
			myObj.open('post',url,true);
			myObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			myObj.onreadystatechange = function z(){
				if(myObj.readyState == 4){
					if(myObj.status == 200){
						var res_obj = eval("("+myObj.responseText+")");
						$('del_res').value = res_obj;
					}
				}
			};
			myObj.send(data);
		}

		function insertcon(){
			if(myObj) {
				var url = "<?php echo U('Index/insertcon');?>";
				var data = "content="+$('insertcon').value+"&sender=<?php echo I('get.username');?>";
				myObj.open('post',url,true);
				myObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myObj.onreadystatechange = function a(){
					if(myObj.readyState == 4){
						if(myObj.status == 200){
							var res_obj = eval("("+myObj.responseText+")");
							$('sendres').value = res_obj;
						}
					}
				};
				myObj.send(data);
			}
		}

		function updateContent() {
			
			if(myObj){
				var url = "<?php echo U('Index/update');?>";
				var data = "da=a";
				myObj.open('post',url,true);
				myObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myObj.onreadystatechange = chuli;
				myObj.send(data);
				
			}else{

			}
		}

		var contents="";
		function chuli() {
			if(myObj.readyState==4){
				if(myObj.status==200) {
					var res_obj = eval("("+myObj.responseText+")");
		//当res_obj为nulls时，rel_obj.length不存在，会出错Uncaught TypeError: Cannot read property 'length' of null		
		//$('chatarea').value += res_obj[i]['sender']+"("+res_obj[i]['time']+")"+": "+res_obj[i]['content']+"\r\n";			
					if(res_obj!=null && res_obj.length>0){ 
						for(var i=0;i<res_obj.length;i++){
						contents += res_obj[i]['sender']+"("+res_obj[i]['time']+")"+": "+res_obj[i]['content']+"\r\n";
						}
						$('chatarea').value = contents;
					} 
					if(res_obj == null)  {
						$('chatarea').value = "";
					}
				}
			}
		contents="";
		}
		//使用定时器 每隔5秒发送
		window.setInterval("updateContent()",2500);
	</script>
-->
	<script type="text/javascript">
  		var myObj = getObj();
  		var soc = new WebSocket("ws://127.0.0.1:9501");
  		soc.onopen = function (event) {
   			//soc.send("hello,server;this is client"); 
  		};
 		soc.onmessage = function (event) {
   			 //console.log(event.data);
   			 document.getElementById('chatarea').value += event.data;
   			 
  		};
  		
 
    	
  		function getObj() {
			var obj;
			if(window.ActiveXObject){
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}else {
				obj = new XMLHttpRequest();
			}
			return obj;
			//myObj = obj;
		}
		
		function insertcon(){
			if(myObj) {
				var url = "<?php echo U('Index/insertcon');?>";
				var data = "content="+document.getElementById('sendcon').value+"&sender=<?php echo I('get.username');?>";
				myObj.open('post',url,true);
				myObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myObj.onreadystatechange = function a(){
					if(myObj.readyState == 4){
						if(myObj.status == 200){
							var res_obj = eval("("+myObj.responseText+")");
							document.getElementById('sendres').value = res_obj;
						}
					}
				};
				myObj.send(data);
			}
		}
  		function sendcon() {
  			var myDate = new Date();
  			var Y = myDate.getFullYear(); 
  			var m = myDate.getMonth() + 1;
  			var d = myDate.getDate();
  			var H = myDate.getHours();
  			var i = myDate.getMinutes();
  			var s = myDate.getSeconds();
  			var datetime = Y+'-'+m+'-'+d+' '+H+':'+i+':'+s; 
  			var mes = "("+datetime+")<?php echo I('get.username');?>:"+document.getElementById('sendcon').value;
  			insertcon();
  			if(document.getElementById('sendres').value == "发言成功！"){
	  			soc.send(mes);
	  		}
  			
  			
  		}
  		
  		function del() {
  			document.getElementById('chatarea').value = '';
   		}
   		
   		function close(){
     　　　　	soc.close();
　　　		}
 	</script>

	<title></title>
</head>
<body  onunload="close();">
	<div style="padding: 24px 48px;"> 
		<h1>:)</h1>
		<p>你好!<b id="name"><?php echo I('get.username');?></b>！</p>
	</div>
	
	<textarea cols="50" rows="20" id="chatarea"></textarea>
	<input type="button" name="dele" id="del" value="清空聊天记录" onclick="del();"></input>
	<input style="border-width:0;color:red;margin:0 0" type="text" id="del_res" >
	<br>
	<input type="text" name="content"  id="sendcon">
	<input style="border-width:0;color:red;margin:0 0" type="text" id="sendres" >
	<input type="button" value="发送"  style="margin:0 0" onclick="sendcon();">
	<input type="button" value="断开连接" onclick="close();">
	
</body>
</html>