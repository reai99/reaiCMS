<?php
namespace app\Socket\controller;
use Workerman\Worker;
class Socket{
	public function index()
	{
	 $ws_worker = new Worker("websocket://localhost:2346");
	 $ws_worker->name = 'MyWebsocketWorker';
	 $ws_worker->count = 0;
	 $ws_worker->onWorkerStart = function($worker)
	 {
	   echo "Worker starting...\n";
	 };
	 
	 // 当收到客户端发来的数据后返回hello $data给客户端
	 $ws_worker->onMessage = function($connection, $data)
	 {
	     // 向客户端发送hello $data
	     $connection->send('hello ' . $data);
	 };
	
	    // 运行worker
	    Worker::runAll();
}
	
	
	
}