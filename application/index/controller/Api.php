<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Api extends Controller
{
	
	public function classify($labelname=null,$cateid=null,$recommend=null){
		$map=array();
		if(isset($labelname)){$map['label']=['like','%'.$labelname.'%'];}
		if(isset($cateid)){$map['cateid']=$cateid;}
		if(isset($recommend)){$map['recommend']=$recommend;}
		$req=input('param.');
		if(isset($req['maxnum'])&&isset($req['index'])){
			$limitData=($req['index']-1)*$req['maxnum'].','.$req['maxnum'];
		}else{$limitData="*";}
		$data=db('article')->where($map)->limit($limitData)->select();
		foreach($data as $key=> $vo) $data[$key]["label"]=explode(",",$vo["label"]);
		$artData=array('length'=>db('article')->where($map)->count(),'data'=>$data);
		$this->assign(array(
		'basic'=>getbasic(),
		'total'=>statistics(),
		'article'=>$artData,
		));
	  return $this->fetch('classify/index');	
	}


}