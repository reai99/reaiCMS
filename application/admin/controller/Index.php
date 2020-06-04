<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Api
{
    protected function _initialize(){
	   login_ckeck();
	 }
    public function index()
    {
		$server_info  = [
				'运行环境'     => PHP_OS.' '.$_SERVER["SERVER_SOFTWARE"],
				'PHP运行方式'  => php_sapi_name(),
				'上传附件限制' => ini_get('upload_max_filesize'),
				'执行时间限制' => ini_get('max_execution_time').'秒',
				'磁盘剩余空间 '=> round((@disk_free_space(".")/(1024*1024)),2).'M',
					    ];
		$this->assign('server_info',$server_info);
		$this->assign(array(
		'logout'=>'admin/common/logout',
		'user_exchange'=>'admin/login',
		));
        return $this->fetch('admin');
    }
	public function basic(){
		$select=Db::name('basic')->find();
		if(request()->isAjax()){
		$weblogo=request()->file('weblogo');
		$basicData=input('param.');
		unset($basicData['weblogo']);
		if($select['template']!=trim($basicData['template'])){changeTemp(trim($basicData['template']));}
		if(isset($weblogo)){
			$info = $weblogo->move(ROOT_PATH . 'public' . DS . 'system/weblogo','logo.png');
			$basicData['weblogo']=DS . 'public' . DS . 'system/weblogo/'.$info->getSaveName();
		}
		  foreach($basicData as $key=>$vo){$basicData[$key]=strip_tags($vo);}
			if(!$select){
				$insert=Db::name('basic')->insert($basicData);
			}else{
				Db::name('basic')->where('basicid',1)->update($basicData);
			}
	        $return=array('code'=>1,'msg'=>'修改成功');
			Log::record('基本信息被修改','messege');
			echo json_encode($return);
			die;
		}
		$this->assign(array(
		'basic'=>$select,
		'template'=>getDirName('template'),
		));
		return $this->fetch();
	}

	public function liuyan(){
		tableDeal('liuyan','content|username','id,username,content,time');
		return $this->fetch();
	}
    public function setlunbo(){
		if(request()->isAjax()){
			$data=input('param.');
			if($data['way']==3){
				$artcle=$this->getRecommendData('article','recommend',5,'id,title,author,time,type');
				foreach($artcle as $key=> $vo){$artcle[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
				$res=array('code'=>3,"data"=>$artcle);
				echo json_encode($res);die;
			}else if($data['way']==4){
				$artcle=Db::name('article')->where('recommend',5)->where('title|author|label|type','like',"%".$data['search']."%")->field('id,title,author,time,type')->select();
				 if(sizeof($artcle)>0){
				    foreach($artcle as $key=> $vo){$artcle[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
					$res=array('code'=>3,'msg'=>'搜索“'.$data['search'].'”结果共“'.sizeof($artcle).'”条',"data"=>$artcle);
				  }else{
					$res=array('code'=>-4,'msg'=>'搜索结果为空!!!',"data"=>$artcle);}
					 echo json_encode($res);die;  
				
			}else if($data['way']==-1){
				$arr=explode(',',$data['id']);
				for($i=0;$i<sizeof($arr);$i++){
					Db::name('article')->where('id',$arr[$i])->update(['recommend'=>1]);
					}
				$res=array('code'=>-1,'msg'=>'移除成功');
				Log::record('移除了ID='.$data['id'].'的文章作为轮播','messege');
				echo json_encode($res);die;
			}
		}
		return $this->fetch();
	}
}
