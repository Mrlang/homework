	<?php
	class server {
		private $server;
		public $connections;

		public function __construct() {
			$this->server = new swoole_websocket_server('127.0.0.1',9501);
			$this->server->set(array(
				'worker_num' => 8,
		        'daemonize' => false,
		        'max_request' => 10000,
		        'dispatch_mode' => 1,
		        'debug_mode'=> 1
			));
			$this->server->on('start',array($this,'onStart'));
			$this->server->on('open',array($this,'onOpen'));
			$this->server->on('message',array($this,'onMessage'));
			$this->server->on('close',array($this,'onClose'));
			
			
			$this->server->start();
		}

		public function onStart() {
			echo "this is function 'onStart':server start\n";
		}
		
		public function onOpen(swoole_websocket_server $server, $request) {
		 	file_put_contents( __DIR__ .'/log.txt' , $request->fd);
		 	$m = file_get_contents( __DIR__ .'/log.txt');
    		echo "this is function 'onOpen'.\nconnect with client {$request->fd} \n";
    		var_dump($server);
    		var_dump($request);
    		echo "sending message to all...\n";
    		for ($i=1 ; $i<= $m ; $i++) {
       			 if($server->push($i, "welecom client {$request->fd} to our chatrrom!\n"))
       			 	echo "send successuflly to client {$request->fd}\n";
       			 
       		}
			
		}
		
		public function onMessage(swoole_websocket_server $server, $frame) {
			echo "this is function 'onMessage'\nserver has receive message from client {$frame->fd}, \ndata:{$frame->data}\n";
   	 		$m = file_get_contents( __DIR__ .'/log.txt');
   	 		echo "send message to all...\n";
   	 		var_dump($server);
   	 		var_dump($frame);
   	 		for ($i=1 ; $i<= $m ; $i++) {
       			 if($server->push($i, "{$frame->data}\n" ))
       			 	echo "send successuflly to client {$frame->fd}\n";
       			 
   			 }

    		//$frame->fd 是客户端id，$frame->data是客户端发送的数据
    		//服务端向客户端发送数据是用 $server->push( '客户端id' ,  '内容')
		}
		
		public function onClose($ser, $fd) {
			echo "client {$fd} has closed\n";
		}
		public function onError(){
			echo "error!\n";
		}
	}	
	
	$serv = new server();
	
		
