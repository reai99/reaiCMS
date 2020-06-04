<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Search extends Controller
{
	protected function _initialize()
	{
		$status= index_login_ckeck();
		if(!$status){
		 $findname=db('user')->where('status',0)->where('password',session('index_user'))->find();
		 $this->assign(array('user'=>$findname));
		}	
	 }
	public function index(){
		if(input('param.search')!=null){$data=input('param.search');}else{$data="";}
		$req=input('param.');
		if(isset($req['maxnum'])&&isset($req['index']))
		{$limitData=($req['index']-1)*$req['maxnum'].','.$req['maxnum'];}
		else{$limitData="*";}
		$article=db('article')->limit($limitData)->where('title','like','%'.$data.'%')->select();
		foreach($article as $key=> $vo) $article[$key]["label"]=explode(",",$vo["label"]);
		$search=array('length'=>db('article')->where('title','like','%'.$data.'%')->count(),'name'=>$data);
		$this->assign(array(
		'basic'=>getbasic(),
		'total'=>statistics(),
		'article'=>$article,
		'search'=>$search,
		));
		return $this->fetch();
	}
	 
}