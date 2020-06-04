<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class User extends Controller
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
		  if($data['status']==1){
		     $findname=db('user')->where('status',0)->where('username',safe_replace($data['username']))->find();
			 if($findname){
				 if(md5(md5($data['password']).$findname['encrypt'])==$findname['password']){
					 $res=array('msg'=>'登录成功','code'=>1);
					session('index_user',md5(md5($data['password']).$findname['encrypt']));
					session('index_login_time',request()->time());
					
				 }else{
					 $res=array('msg'=>'密码错误','code'=>-1);
				 }
			 }else{
				 $res=array('msg'=>'账号不存在','code'=>-2);
			 }
            echo json_encode($res);die;
		  }else if($data['status']==0){
		   $findname=db('user')->where('status',0)->where('username',safe_replace($data['username']))->find(); 
		   $findemail=db('user')->where('status',0)->where('email',safe_replace($data['email']))->find();
		   if(!$findname){
			   if(!$findemail){
				   $encrypt=create_randomstr();
				   if(check_email($data['email'])){
					   $insert=array(
					   'username'=>safe_replace($data['username']),
					   'password'=>md5(md5($data['password']).$encrypt),
					   'email'=>$data['email'],
					   'status'=>0,
					   'ip'=>$_SERVER["REMOTE_ADDR"],
					   'time'=>request()->time(),
					   'encrypt'=>$encrypt,
					   );
					   db('user')->insert($insert);
					   $res=array('msg'=>'注册成功!!!','code'=>2);
				   }else{
					   $res=array('msg'=>'邮箱不合法','code'=>-3);  
				   }  
			   }else{
				 $res=array('msg'=>'邮箱已经被注册','code'=>-4);  
			   }
		   }else{
			   $res=array('msg'=>'账号已经被注册','code'=>-5);
		   }
		  }
		   echo json_encode($res);die;
	   }
	   $this->assign(array(
	   'basic'=>getbasic(),
	   'total'=>statistics(),
	   ));
	   return $this->fetch();
   }
}