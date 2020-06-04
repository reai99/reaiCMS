<?php
namespace app\install\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    protected function _initialize()
    {
        // 检测程序安装
        if (is_file(ROOT_PATH . 'reai/install.lock')) {
            echo '程序已经安装！';
            exit();
        }
    }
    public function index()
    {
		session('installStep',0);
		session('error',false);
        return $this->fetch();
    }
  public function one(){
	  if(session('installStep')!=0&&session('installStep')!=1){return $this->redirect('index/index');}
   if(request()->isPost()){
	 if(session("error")==false){
		session('installStep',1);
		$data=array('code'=>1,'msg'=>'检验通过');
	 }else{
		 $data=array('code'=>-1,'msg'=>'验证失败,请检查各项数据状态是否通过');
	 }
	 echo json_encode($data);
   }else{
	   session("error",false); //初始session
	   $this->assign(array(
	   'env' =>check_env(),
	   'dirfile'=>check_dirfile(),
	   'fun'=>check_fun()
	   ));
	   return $this->fetch("index/step1");
   }  
  }
  public function two($sql=null,$admin=null){
      if(session('installStep')!=1){return $this->redirect('index/index');}
	  if(request()->isAjax()){ 	
		$info = array();$db=array();
		list($info['username'],$info['password'],$info['repassword']) = explode(",", $admin);
	    list($db['type'], $db['hostname'], $db['database'], $db['username'], $db['password'],$db['hostport'], $db['prefix'])=explode(",",$sql);
		foreach($db as $vo){
		if(empty($vo)){$data=array('code'=>-2,'msg'=>'数据库信息填写为空');echo json_encode($data); die;}
		}
		foreach($info as $vo){
		if(empty($vo)){$data=array('code'=>-1,'msg'=>'管理员信息填写为空');echo json_encode($data); die;}
		}
	   if($info['password']==$info['repassword']){
		  $data=array('code'=>1,'msg'=>'数据校验正确');
	      session('installStep',2);
		  session('admin_info',$info);
		  session('sql_info',$db);
	     }else{
		   $data=array('code'=>0,'msg'=>'两次密码输入不相');
		   }  

          $database=$db['database'];
          unset($db['database']);
          $connect  = Db::connect($db);
          $sql = "CREATE DATABASE IF NOT EXISTS `{$database}` DEFAULT CHARACTER SET utf8";
           if(!$connect->execute($sql)){
			$data=array('code'=>-3,'msg'=>'链接数据库失败');
			 }
          echo json_encode($data);
		
	  }else{
		   	  return $this->fetch("index/step2"); 
	  }

  }
  public function three(){
	if(session('installStep')!=2){return $this->redirect('index/step2');}
	  $sql_info=session('sql_info');
	  write_database($sql_info);  //写数据库文件
	  $connect = Db::connect($sql_info); 
	 create_tables($connect, $sql_info['prefix']);
	 register_administrator($connect,$sql_info['prefix']);
	 session('installStep',3);
  	 return $this->fetch("index/step3");
  }
  public function four(){
	  if(session('installStep')==3){
		session('installStep',null);
		session('error',null);
		session('sql_info',null);
		$mainFile=fopen(INSTALL_APP_PATH.'reai/install.lock','w+');
		fwrite($mainFile,'lock');	
		fclose($mainFile);
		$host = $_SERVER["HTTP_HOST"]; //主机
		$name = $_SERVER['SCRIPT_NAME'];//地址
        $admin_path = str_replace("install.php", "admin", $name);
        $index_path = str_replace("install.php", "index.php", $name);
        $admin_url = "http://".$host.$admin_path;
        $index_url = "http://".$host.$index_path;
        $this->assign('admin_url',$admin_url);
        $this->assign('index_url',$index_url);
		return $this->fetch("index/step4");
	  }else{
		  return $this->fetch("index/index");
	  }

  }

}
