<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    $sql=mysql_connect('localhost','root','password');
    $db=mysql_select_db("weixin",$sql);
    mysql_query('set names utf8');
	if(isset($_POST['sub'])){
		$sql="select * from dealer_info where dealer_name='{$_POST["user"]}' and dealer_pass ='".($_POST["password"])."'";
	
		$result=mysql_query($sql);
        $num=mysql_num_rows($result);
		
		if($num> 0){
			$row=mysql_fetch_array($result); 
			$time=time()+60*60*8;
			setCookie('companyId',$row['company_id'],$time,'/');	
			setCookie('power',$row['user_type'],$time,'/');
			setCookie('isLogin','true',$time,'/');
			setCookie('carId',$row['car_id'],$time,'/');
			setCookie('carBrand',$row['car_brand'],$time,'/');
			if($row['user_type']==2){
				echo "<script>window.location.href='../company/mainbody.php'</script>"; 
			}else if($row['user_type']==1){
				echo "<script>window.location.href='../boss/'</script>"; 
			}
		}
		mysql_close();
		echo "<script>alert('用户名和密码有错误!');location.href='login.php';</script>";
	}
?>