<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Log;
class Article extends Api
{
   protected function _initialize(){
	    login_ckeck();
	 }
	public function addart(){
		if(request()->isAjax()){
			$coverimg=request()->file('coverimg');
			$slideimg=request()->file('slideimg');
			$file=request()->file('file');
			$data=input('param.');
			unset($data['coverimg']);unset($data['slideimg']);unset($data['file']);
			if(isset($coverimg)){
				$info = $coverimg->move(ROOT_PATH . 'public' . DS . 'artimg');
				$data['coverimg']=DS . 'public' . DS . 'artimg/'.$info->getSaveName();
			}	
			if(isset($slideimg)){
				$info= $slideimg->move(ROOT_PATH . 'public' . DS . 'artimg');
				$data['slideimg']=DS . 'public' . DS . 'artimg/'.$info->getSaveName();
			}
			if(isset($file)){
				$fileInfo=$file->getInfo();
				$info= $file->move(ROOT_PATH . 'public' . DS . 'accessory',$fileInfo['name']);
				$data['file']=DS . 'public' . DS . 'accessory/'.$info->getSaveName();
				$data['filename']=$fileInfo['name'];
				$data['filesize']=$fileInfo['size'];
			}
			$data['time']=request()->time();
			if($data['label']==""){ unset($data['label']);}
			$typearr=explode('|',$data['type']);
			$data['type']=$typearr[0];$data['cateid']=$typearr[1];
			$insert=Db::name('article')->insert($data);
			if($insert){
				$msg=array('code'=>1,'msg'=>'新建成功!!!');
				Log::record('新建了标题为:【'.$data['title'].'】的文章','messege');
				}
			else{$msg=array('code'=>-1,'msg'=>'数据插入异常');}
			echo json_encode($msg);
			die;
		}
		$this->assign(array(
		'labellist'=>$this->getDataList('artlabel'),
		'typelist' =>$this->getDataList('arttype'),
		));
		return $this->fetch();
	}
	public function artadmin(){
		if(request()->isAjax()){
			$data=input('param.');
			if(isset($data['way'])){
			   if($data['way']==3){
				   if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum'];}else{$limit='*';}
				   if(isset($data['search'])){
					$artcle=$this->searchData('article','title|recommend|author|label|type',"%".$data['search']."%",'id,title,author,recommend,time,type',$limit);
					$total=sizeof($this->searchData('article','title|recommend|author|label|type',"%".$data['search']."%"));
				   }else{
					  $total=sizeof($this->getDataList('article','id,title,author,recommend,time,type'));
					  $artcle=$this->getDataList('article','id,title,author,recommend,time,type',$limit);  
				   }
				foreach($artcle as $key=> $vo){$artcle[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
				$res=array('code'=>3,"data"=>$artcle,'total'=>$total);
				echo json_encode($res);die;
			  }else if($data['way']==4){
				  $total=sizeof(Db::name('article')->where('title|recommend|author|label|type','like',"%".$data['search']."%")->select());
				  if(isset($data['maxnum'])&&isset($data['index'])){$limit=$data['maxnum']*($data['index']-1).','.$data['maxnum']; }else{$limit='*';}
				  $user=Db::name('article')->where('title|recommend|author|label|type','like',"%".$data['search']."%")->field('id,title,author,recommend,time,type')->limit($limit)->select();
				  if(sizeof($user)>0){
				  	foreach($user as $key=> $vo){$user[$key]['time']=date('Y-m-d H:i:s', $vo['time']);}
				    $res=array('code'=>4,'msg'=>'搜索“'.$data['search'].'”结果共“'.$total.'”条',"data"=>$user,'total'=>$total);
				  }
				  else{$res=array('code'=>-4,'msg'=>'搜索结果为空!!!',"data"=>$user,'total'=>$total);}
				  echo json_encode($res);die;  
			  }
			  else if($data['way']==-1){
			  $artcle=Db::name('article')->delete($data['id']);
			  $res=array('code'=>-1,'msg'=>'删除成功');
			  Log::record('删除了ID='.$data['id'].'对应的文章','messege');
			  echo json_encode($res);die;
			  }
			}
		}
		return $this->fetch();
	}
	public function editart($id=""){
		if(request()->isAjax()){
			$data=input('param.');
			$coverimg=request()->file('coverimg');
			$slideimg=request()->file('slideimg');
			$file=request()->file('file');
			unset($data['coverimg']);unset($data['slideimg']);unset($data['file']);
          if(isset($data['id'])){
			  $findId=$data['id'];
			  unset($data['id']);
			  $typearr=explode('|',$data['type']);
			  $data['type']=$typearr[0];$data['cateid']=$typearr[1];
			  $getData=Db::name("article")->where('id',$findId)->field('coverimg,slideimg')->find();
			  if(isset($coverimg)){
				  if($getData['coverimg']){
				    $cover=explode(DS,$getData['coverimg']);
					$coverimg->move(ROOT_PATH . 'public' . DS . 'artimg'. DS .$cover[3],$cover[4]);
				  }else{
					  $info = $coverimg->move(ROOT_PATH . 'public' . DS . 'artimg');
					  $data['coverimg']=DS . 'public' . DS . 'artimg' . DS .$info->getSaveName();
				  }
			  }	
		   if(isset($slideimg)){
			   if($getData['slideimg']){
				 $slide=explode(DS,$getData['slideimg']);
				 $slideimg->move(ROOT_PATH . 'public' . DS . 'artimg'. DS .$slide[3],$slide[4]);
				}else{
				  $info = $slideimg->move(ROOT_PATH . 'public' . DS . 'artimg');
				   $data['slideimg']=DS . 'public' . DS . 'artimg' . DS .$info->getSaveName();
				}				
			}	
			if(isset($file)){
				 $fileInfo=$file->getInfo();
				 $info= $file->move(ROOT_PATH . 'public' . DS . 'accessory',$fileInfo['name']);
				 $data['file']=DS . 'public' . DS . 'accessory/'.$info->getSaveName();
				 $data['filename']=$fileInfo['name'];
				 $data['filesize']=$fileInfo['size'];			
				}	
			  Db::name('article')->where('id',$findId)->update($data);
			  $msg=array('code'=>1,'msg'=>'数据更新成功');
			  Log::record('编辑了ID='.$findId.'对应的文章','messege');
			  }else{
				  $msg=array('code'=>-1,'msg'=>'服务异常,请求id存在问题');
			  }
			echo json_encode($msg);
			die;
		}
		$artcle=array();
		if(!empty($id)){
		   $artcle=$this->getIdData('article',$id);
		   $artcle['label']=explode(',',$artcle['label']);
		}
		$this->assign(array(
		'labellist'=>$this->getDataList('artlabel'),
		'typelist' =>$this->getDataList('arttype'),
		'artlist'=>$artcle
		));
		return $this->fetch();
	}
	public function addtype(){
		if(request()->isAjax()){
		$data=input('param.');
	    if($data['way']==3){
	       $type=Db::name('arttype')->field('id,typename,cateid')->limit(0,10)->select();
		   $res=array('code'=>3,"data"=>$type);
		    echo json_encode($res);
			die;
	    }else if($data['way']==1){
			$type=Db::name('arttype')->field('cateid,typename')->select();
			foreach($type as $vo){
			if($vo['cateid']==trim($data['cateid'])){
				$res=array('code'=>-2,'msg'=>'cateID已存在');
				echo json_encode($res);die;
			   }
			if($vo['typename']==trim($data['typename'])){
				$res=array('code'=>-2,'msg'=>'分类名称已存在');
				echo json_encode($res);die;
			   }
			 }
			 $insertData=array(
			   'typename'=>trim($data['typename']),
			   'cateid'=>trim($data['cateid']),
			   'url'=>'/index/api/classify/cateid/'.trim($data['cateid']).'.html',
			 );
			 Db::name('arttype')->insert($insertData);
			 $res=array('code'=>1,'msg'=>'数据插入成功!!!');
			 Log::record('新增了分类:【'.trim($data['typename']).'】','messege');
			 echo json_encode($res);die; 
		    }else if($data['way']==2){
	         $updata=Db::name('arttype')->where('cateid',trim($data['cateid']))->update(['typename'=>trim($data['typename'])]);
	         if($updata){
				 $res=array('code'=>2,'msg'=>'数据更新成功!!!'); 
				 Log::record('将ID='.$data['cateid'].'分类名改为:【'.trim($data['typename']).'】','messege');
				 }
	         else{$res=array('code'=>-3,'msg'=>'更新异常！！！');}
	         echo json_encode($res);die;
			}else if($data['way']==-1){
				$del=Db::name('arttype')->delete(trim($data['id']));
				$res=array('code'=>-1,'msg'=>'删除成功');
				 Log::record('删除了ID='.$data['id'].'对应的分类','messege');
				echo json_encode($res);die;
			}
	  }
		return $this->fetch();
	}
	public function addlabel(){
	  if(request()->isAjax()){
		$data=input('param.');
	    if($data['way']==3){
	       $type=Db::name('artlabel')->field('id,labelname,labelid')->limit(0,10)->select();
		   $res=array('code'=>3,'data'=>$type);
		    echo json_encode($res);
			die;
	    }else if($data['way']==1){
			$type=Db::name('artlabel')->field('labelid,labelname')->select();
			foreach($type as $vo){
			if($vo['labelid']==trim($data['labelid'])){
				$res=array('code'=>-2,'msg'=>'labelID已存在');
				echo json_encode($res);die;
			   }
			if($vo['labelname']==trim($data['labelname'])){
				$res=array('code'=>-2,'msg'=>'标签名称已存在');
				echo json_encode($res);die;
			   }
			 }
			 $insertData=array(
			   'labelname'=>trim($data['labelname']),
			   'labelid'=>trim($data['labelid']),
			   'url'=>'/index/api/classify/labelname/'.trim($data['labelname']).'.html',
			 );
			 Db::name('artlabel')->insert($insertData);
			 $res=array('code'=>1,'msg'=>'数据插入成功!!!');
			 Log::record('新增了标签:【'.trim($data['labelname']).'】','messege');
			 echo json_encode($res);die; 
		    }else if($data['way']==2){
	         $updata=Db::name('artlabel')->where('labelid',trim($data['labelid']))->update(['labelname'=>trim($data['labelname'])]);
			 if($updata){
				 $res=array('code'=>2,'msg'=>'数据更新成功!!!');
				 Log::record('将ID='.$data['labelid'].'标签名改为:【'.trim($data['labelname']).'】','messege'); 
				  }
	         else{$res=array('code'=>-3,'msg'=>'更新异常！！！');}
	         echo json_encode($res);die;
			}else if($data['way']==-1){
				$del=Db::name('artlabel')->delete(trim($data['id']));
				$res=array('code'=>-1,'msg'=>'删除成功');
				Log::record('删除了ID为='.$data['id'].'对应的标签','messege');
				echo json_encode($res);die;
			}
	  }
		return $this->fetch();
	}
}