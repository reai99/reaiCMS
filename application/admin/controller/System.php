<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Log;
class System extends Controller
{
    protected function _initialize(){
	    login_ckeck();
	 }
	 
	 function adminModule(){
		return  $this->fetch('index/module');
	 }
	/**
	 * 日志
	 */
	function rizhi(){
			if(request()->isAjax()){
				$mess=file_get_contents(ROOT_PATH . 'logs/single.log');
				$mess=str_replace(array('\n','\r'),"",$mess);
				$mess=str_replace('"{',"{",$mess);
				$mess=str_replace('}"',"}",$mess);
				$mess=trim($mess);
				echo $mess; die;
			}

		return  $this->fetch();
	} 
	 
/**
 * 缓存清理
 */	
	function cache(){
		$path=RUNTIME_PATH;
		delFile($path);
		echo "清除缓存成功!!!!";
	}
/**
 * 后台登录user
 * way 3:访问时获取数据 -1:删除数据 1:新增数据 2:修改数据 -2:用户已存在 -3:异常
 */
	function adminUser(){
		if(request()->isAjax()){
			$data=input('param.');
			if($data['way']==3){
				$user=Db::name('user')->where('status',1)->field('id,username,email,time,ip')->limit(0,10)->select();
			   foreach($user as $key=> $vo){$user[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
			   $res=array('code'=>3,'data'=>$user);
	           echo json_encode($res);
				die;
			}else if($data['way']==-1){
			$user=Db::name('user')->delete($data['id']);
			$res=array('code'=>-1,'msg'=>'删除成功');
			Log::record('删除了ID='.$data['id'].'对应的管理员','messege');
			echo json_encode($res);die;
			}
			else if($data['way']==1){
			$user=Db::name('user')->where('status',1)->field('username')->select();
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
			 'status'=>1,
			 'ip'=>$_SERVER["REMOTE_ADDR"]
			 ];
			Db::name('user')->insert($insertData);
			$res=array('code'=>1,'msg'=>'数据插入成功!!!');
			 Log::record('新增管理员【'.trim($data['username']).'】','messege');
			echo json_encode($res);die;
			}
            else if($data['way']==2){
			  $encrypt=create_randomstr();
	          $updateData=array(
			  'password'=>md5(md5($data['password']).$encrypt),
			  'email' =>$data['email'],
			  'encrypt'=>$encrypt,
			  );
			  $updata=Db::name('user')->where('status', 1)->where('username',trim($data['username']))->update($updateData);
			  if($updata){
				 $res=array('code'=>2,'msg'=>'数据更新成功!!!');
				 Log::record('【'.trim($data['username']).'】进行了密码修改','messege');  
				   }
			  else{$res=array('code'=>-3,'msg'=>'更新异常！！！');}
				echo json_encode($res);die;
			 }
		}
      return $this->fetch('index/adminUser');
	}
	public function createPage(){
		return $this->fetch('index/createpage');
	}
}