<?php
use think\Db;

  function login_ckeck(){
	if (!session('cms_admin_user')||request()->time() - session('cms_login_time') > 4*60*60) {
	    session('cms_admin_user', null);
		session('cms_login_time', null);
	   	header('Location: /admin/Login/index.html');
	   }
    }
  
    function getDirName($path){
      $handle = opendir($path);
	  $temp=array();
      if ($handle) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {array_push($temp,$item);}
        }
        closedir($handle);
        }
		return $temp;
	}
    function changeTemp($value){
	    $get_database = file_get_contents(ROOT_PATH . 'reai/template.tpl');
		$get_database = str_replace("{template}", $value, $get_database);
		file_put_contents(APP_PATH . DS .'index/config.php', $get_database);
      }
	function tableDeal($name,$air,$field){
		$data=input('param.');
		if(isset($data['way'])){
		   if($data['way']==3){
			   if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum'];}else{$limit='*';}
			   if(isset($data['search'])){
				$artcle=Db::name($name)->where($air,'like','%'.$data['search'].'%')->field($field)->limit($limit)->select();
				$total=sizeof(Db::name($name)->where($air,'like','%'.$data['search'].'%')->field($field)->select());
			   }else{
				  $total=sizeof(Db::name($name)->field($field)->select());
				  $artcle=Db::name($name)->field($field)->limit($limit)->select();  
			   }
			foreach($artcle as $key=> $vo){$artcle[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
			$res=array('code'=>3,"data"=>$artcle,'total'=>$total);
			echo json_encode($res);die;
		  }else if($data['way']==4){
			  $total=sizeof(Db::name($name)->where($air,'like',"%".$data['search']."%")->select());
			  if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum']; }else{$limit='*';}
			  $user=Db::name($name)->where($air,'like',"%".$data['search']."%")->field($field)->limit($limit)->select();
			  if(sizeof($user)>0){
			  	foreach($user as $key=> $vo){$user[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
			    $res=array('code'=>4,'msg'=>'搜索“'.$data['search'].'”结果共“'.$total.'”条',"data"=>$user,'total'=>$total);
			  }
			  else{$res=array('code'=>-4,'msg'=>'搜索结果为空!!!',"data"=>$user,'total'=>$total);}
			  echo json_encode($res);die;  
		  }
		  else if($data['way']==-1){
		  $artcle=Db::name($name)->delete($data['id']);
		  $res=array('code'=>-1,'msg'=>'删除成功');
		  echo json_encode($res);die;
		  }
		}
	}
 

	