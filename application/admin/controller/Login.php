<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Log;
class Login extends Controller
{
	public function index(){
		if(request()->isAjax()){
		$admin=input('param.');
		$data= Db::name('user')->where('username',$admin['username'])->find();
		if($data){
			if(md5(md5($admin['password']).$data['encrypt'])==$data['password']){
				$msg=array('code'=>1,'msg'=>'登录成功!!!');
				session('cms_admin_user',md5(md5($admin['username']).$data['encrypt']));
				session('cms_login_time',request()->time());
				Log::record('管理员【'.$admin['username'].'】登陆了后台','messege');
			}else{
				$msg=array('code'=>0,'msg'=>'密码不正确!!!');
			}
		}else{
			$msg=array('code'=>-1,'msg'=>'密码错误!!!');
		}
		echo json_encode($msg);
		exit;
		}
		return $this->fetch("index/login");
	}
	

}