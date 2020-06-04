<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Article extends Controller
{
	protected function _initialize(){
		   $status= index_login_ckeck();
		  if(!$status){
		   $findname=db('user')->where('status',0)->where('password',session('index_user'))->find();
		   $this->assign(array('user'=>$findname));
		  }	
	}
	
    public function index($pid){
		
		if(isset($pid)){
		$select=db('article')->where('id',$pid)->find();
		if(isset($select)){
		$liuyan=input('param.');
		if(empty($liuyan['index'])||empty($liuyan['maxnum'])){$page='0,6';}else{$page=($liuyan['index']-1)*$liuyan['maxnum'].','.$liuyan['maxnum'];}
		 $liuyan['length']=db('liuyan')->where('status',1)->where('uid',$pid)->count();
		 $select['label']=explode(',',$select['label']);
		 db('article')->where('id',$pid)->setInc('traffic');
		 $this->assign(array(
		 'basic'=>getbasic(),
		 'article'=>$select,
		 'total'=>statistics(),
		 'pid'=>$pid,
		 'liuyan'=>$liuyan,
		 'page'=>$page
		 ));
		 return $this->fetch();	
		}
		
		}
		
	}	

}