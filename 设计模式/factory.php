<?php 
	interface DB {
		public function connect();
		public function exec($sql);
		
	}
	
	class MysqlDB implements DB {
		public function __construct() {
			echo "this is MysqlDB.";
		}
		public function connect() {
			echo "connect to MysqlDB...";
		}
		public function exec($sql) {
			echo "using MysqlDB to exec {$sql}...";
		}
	}
	
	class  PostgreDB implements DB {
		public function __construct() {
			echo "this is  PostgreDB.";
		}
		public function connect() {
			echo "connect to  PostgreDB...";
		}
		public function exec($sql) {
			echo "using  PostgreDB to exec {$sql}...";
		}
	}
	
	class  MssqlDB implements DB {
		public function __construct() {
			echo "this is MssqlDB.";
		}
		public function connect() {
			echo "connect to MssqlDB...";
		}
		public function exec($sql) {
			echo "using MssqlDB to exec {$sql}...";
		}
	}
	
	class DBfactory {
		public static function getDB($type) {
			$class = $type.'DB';
			return new $class;
		}
	}
	
	
	
	
	$mysql = DBfactory::getDB('Mysql');
	$mysql->exec('select * from user');
	
	
	
	
	
	
	
	
