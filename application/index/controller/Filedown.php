<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Filedown extends Controller
{

	public function index()
	{
		$time=input('param.uptime');
        $url=db('article')->where('time',$time)->field('file')->find();
		if(isset($url)){
			db('article')->where('time',$time)->setInc('download');
			echo "<script>window.open('". DS .str_replace('\\','/',$url['file'])."','_self')</script>";
			dump('文件已下载!!!');
		}else{
			dump('下载文件未找到!!!!');
		}
		
	 }

	}