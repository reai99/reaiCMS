<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Log;
class Menu extends Api{
    protected function _initialize(){
	    login_ckeck();
	 }
	 
   public function topMenu(){
		if(request()->isAjax()){
		$data=input('param.');
	    if($data['way']==3){
	       $type=Db::name('menu')->field('id,order,menuname,url')->limit(0,10)->select();
		   $res=array('code'=>3,"data"=>$type);
		    echo json_encode($res);
			die;
	    }else if($data['way']==1){
			 $insertData=array(
			   'menuname'=>trim($data['menuname']),
			   'url'=>trim($data['url']),
			   'order'=>$data['order'],
			 );
			 Db::name('menu')->insert($insertData);
			 $res=array('code'=>1,'msg'=>'数据插入成功!!!');
			 Log::record('新增菜单栏数据【'.trim($data['menuname']).'】','messege');
			 echo json_encode($res);die; 
		    }else if($data['way']==2){
	         $updata=Db::name('menu')->where('order',trim($data['order']))->update(['menuname'=>trim($data['menuname']),'url'=>$data['url']]);
	         if($updata){
				$res=array('code'=>2,'msg'=>'数据更新成功!!!');
				 Log::record('将序号为'.trim($data['order']).'菜单名改为:【'.trim($data['menuname']).'】','messege');
				 }
	         else{$res=array('code'=>-3,'msg'=>'更新异常！！！');}
	         echo json_encode($res);die;
			}else if($data['way']==-1){
				$del=Db::name('menu')->delete(trim($data['id']));
				$res=array('code'=>-1,'msg'=>'删除成功');
				Log::record('删除了ID='.$data['id'].'对应的菜单','messege');
				echo json_encode($res);die;
			}
	  }
		return $this->fetch();
	}

}