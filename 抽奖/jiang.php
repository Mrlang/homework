<?php
	//假设数据表：choujiang
	//    type      num
	//	 iphone      5
if(isset($_POST['submit'])) {
	$dsn = 'mysql:host=localhost;dbname=choujiang';
	$username = 'root';
	$password = '';
	$pdo = new PDO($dsn,$username,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
	$sql = 'LOCK TABLE choujiang WRITE';
	$pdo->exec($sql);
	try{
		$pdo->beginTransaction();
		$sql = "select num from choujiang where type = 'iphone'";
		$res = $pdo->query($sql)->fetch(PDO::FETCH_NUM);
		$num = $res[0];
		if($num > 0) {	
			$sql = "update choujiang set num = num-1 where type = 'iphone'";
			$pdo->exec($sql);
			$result = "从剩余{$num}iphone中抽中1台！";
		}else {
			$result = "没抽中...";
		}
		sleep(8);//故意放慢执行，此时打开其它多个网页抽奖
		$pdo->commit();
		
	}catch(PDOException $e) {
		$pdo->rollBack();
		$result = "没抽中..."; 
	}
	$sql = "UNLOCK TABLES";
	$pdo->exec($sql);
	echo "$result"; 
}
?>
