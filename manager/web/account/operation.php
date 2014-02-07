<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  //include $common_path.'SqlQuery.php';
  //$sqlQuery=new SqlQuery();
  try{
	 $pdo=new PDO("mysql:host=localhost;dbname=weixin","root","root");
  }catch(PDOException $e){
	 echo $e->getMessage();
  }
  $action=$_GET['action'];  //操作指令
  
  if($action=='addAcc'){   //添加经销商   #####################  
    $stmt=$pdo->prepare("insert into dealer_info(company_id,user_type,dealer_name,dealer_pass,car_id,car_brand) values(?,?,?,?,?,?)");
	
    $stmt->bindParam(1,$uid);
    $stmt->bindParam(2,$power);
    $stmt->bindParam(3,$name);
    $stmt->bindParam(4,$pass);
	$stmt->bindParam(5,$car_id);
	$stmt->bindParam(6,$brandN);
	
	$uid=uniqid();
    $power="2";
    $name=$_POST['user'];
	$pass=$_POST['pass'];
	$car_id=$_POST['selectId'];
    $brandN=$_POST['brandN'];
	
    if($stmt->execute()){
        $stmt=$pdo->prepare("insert into company_info(company_id,company_name,car_id,car_brand,mapUrl,mapNor,mapWes) values(?,?,?,?,?,?,?)");
		$stmt->bindParam(1,$uid);
		$stmt->bindParam(2,$name);
		$stmt->bindParam(3,$car_id);
		$stmt->bindParam(4,$brandN);
		$stmt->bindParam(5,$_POST['mapUrl']);
		$stmt->bindParam(6,$_POST['mapNorth']);
		$stmt->bindParam(7,$_POST['mapEast']);
		
		if($stmt->execute()){
			echo "<script>alert('成功添加经销商!经销商 ID :$uid');location.href='http://88auto.com.cn/weixin/back/web/login/login.php';</script>";//echo "最后插入的ID：".$pdo->lastInsertId();
		}else{
			echo "<script>alert('经销商添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
    }else{
        echo "<script>alert('经销商添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }

	  //end
  }
  mysql_close();

?>