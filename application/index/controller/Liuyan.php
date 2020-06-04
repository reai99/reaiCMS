<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Liuyan extends Controller
{
	protected function _initialize(){
		   $status= index_login_ckeck();
			if(!$status){
			 $findname=db('user')->where('status',0)->where('password',session('index_user'))->find();
			 $this->assign(array('user'=>$findname));
			}	
	}
	
	public function index(){
		if(request()->isAjax()){
			$data=input('param.');
			$data['time']=request()->time();
			$data['ip']=$_SERVER["REMOTE_ADDR"];
			db('liuyan')->insert($data);
			$res=array('code'=>1,'msg'=>'留言成功!!!');
			echo json_encode($res);
			die;
		}
		$liuyan=input('param.');
		if(empty($liuyan)){$page='0,6';}else{$page=($liuyan['index']-1)*$liuyan['maxnum'].','.$liuyan['maxnum'];}
		$liuyan['length']=db('liuyan')->where('status',1)->where('uid',0)->count();
		$this->assign(array(
		'basic'=>getbasic(),
		'total'=>statistics(),
		'liuyan'=>$liuyan,
		'page'=>$page
		));
		return $this->fetch();
	}
	
}