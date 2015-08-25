<?php
	class Danli {
		private static $instance = null; 	//$_instance必须声明为静态的私有变量
		private static $pdo;
		private function __construct() {  	//构造函数和析构函数必须声明为私有,防止外部程序new
			self::$pdo = new PDO("mysql:host=localhost;dbname = chatroom","root","");

			echo "数据库创建成功!";
		}
		
		public static function getInstance() {//getInstance()方法必须设置为公有静态的,必须调用此方法以返回实例的一个引用
			if(is_null(self::$instance)) {    //::操作符只能访问静态变量和静态函数
				self::$instance = new self;
			return self::$instance;
			}
		} 
			
		public function query($sql) {
			$res = self::$pdo->query($sql);
			echo "sql语句执行成功!";
			return $res;
		}
	}
	
	
	$db = Danli::getInstance();
	$res = $db->query("select * from chat_user");
