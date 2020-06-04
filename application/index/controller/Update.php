<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Update extends Controller
{
	protected function _initialize()
	{
	  // 检测程序安装
	 if (!is_file(ROOT_PATH . 'reai/install.lock')) {
	     header('Location: /install.php');die;
	  }
		$status= index_login_ckeck();
		if(!$status){
		 $findname=db('user')->where('status',0)->where('password',session('index_user'))->find();
		 $this->assign(array('user'=>$findname));
		}	
	 }
	public function index()
	{
		$this->assign(array(
		'basic'=>getbasic(),
		'total'=>statistics(),
		));
		 return $this->fetch('create/update');
	 }

	}