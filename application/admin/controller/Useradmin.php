<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Useradmin extends Api
{
  public function userlist(){
	  if(request()->isAjax()){
	  	$data=input('param.');
	  	if(isset($data['way'])){
	  	   if($data['way']==3){
			  if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum']; }else{$limit='*';}
			 if(isset($data['search'])){
				 $total=sizeof(Db::name('user')->where('status',0)->where('username|email','like',"%".$data['search']."%")->select()); 
				 $user=Db::name('user')->where('status',0)->where('username|email','like',"%".$data['search']."%")->field('id,username,email,time')->limit($limit)->select();
			 }else{
				$total=sizeof($this->getRecommendData('user','status',0,'id,username,email,time'));
				$user=$this->getRecommendData('user','status',0,'id,username,email,time',$limit); 
			 }
	  		 foreach($user as $key=> $vo){$user[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
	  		 $res=array('code'=>3,"data"=>$user,'total'=>$total);
	  		 echo json_encode($res);die;
	  	  }else if($data['way']==4){
			  $total=sizeof(Db::name('user')->where('status',0)->where('username|email','like',"%".$data['search']."%")->select()); 
			  if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum']; }else{$limit='*';}
			  $user=Db::name('user')->where('status',0)->where('username|email','like',"%".$data['search']."%")->field('id,username,email,time')->limit($limit)->select();
			  if(sizeof($user)>0){
			  	foreach($user as $key=> $vo){$user[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
			    $res=array('code'=>4,'msg'=>'搜索“'.$data['search'].'”结果共“'.$total.'”条',"data"=>$user,'total'=>$total);
			  }
			  else{$res=array('code'=>-4,'msg'=>'搜索结果为空!!!',"data"=>$user,'total'=>$total);}
			  echo json_encode($res);die;  
		  }else if($data['way']==-1){
	  	     $user=Db::name('user')->delete($data['id']);
	  	     $res=array('code'=>-1,'msg'=>'删除成功');
	  	     echo json_encode($res);die;
	  	  }else if($data['way']==1){
			 $user=Db::name('user')->where('status',0)->field('username')->select();
			 foreach($user as $vo){
				   if($vo['username']==trim($data['username'])){
				   $res=array('code'=>-2,'msg'=>'用户已存在');
				   echo json_encode($res);die;
                   }
			  }
			$encrypt=create_randomstr();
			$insertData = [
			'username' =>trim($data['username']),
			'password' => md5(md5($data['password']).$encrypt),
			 'email' =>$data['email'],
			 'time' =>request()->time(),
			 'encrypt'=>$encrypt,
			 'status'=>0,
			 'ip'=>$_SERVER["REMOTE_ADDR"]
			 ];
			Db::name('user')->insert($insertData);
			$res=array('code'=>1,'msg'=>'数据插入成功!!!');
			echo json_encode($res);die;
			}
            else if($data['way']==2){
			  $encrypt=create_randomstr();
	          $updateData=array(
			  'password'=>md5(md5($data['password']).$encrypt),
			  'email' =>$data['email'],
			  'encrypt'=>$encrypt,
			  );
			  $updata=Db::name('user')->where('status', 0)->where('username',trim($data['username']))->update($updateData);
			  if($updata){$res=array('code'=>2,'msg'=>'数据更新成功!!!'); }
			  else{$res=array('code'=>-3,'msg'=>'更新异常！！！');}
				echo json_encode($res);die;
			 }
	  	}
	  }
	  return $this->fetch();
  }	
	
	
	}