<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Api extends Controller{
	
	public function getDataList($name,$field="*",$limit="*")
	{
		$data=Db::name($name)->field($field)->order('id','asc')->limit($limit)->select();
		return $data;
	}
    public function getIdData($name,$id){
		$data=Db::name($name)->where('id',$id)->find();
		return $data;
	}
	public function searchData($name,$air,$value,$field="*", $limit="*"){
		$data=Db::name($name)->where($air,'like',$value)->field($field)->order('id','asc')->limit($limit)->select();
		return $data;
	}
	public function getRecommendData($name,$air,$id,$field="*",$limit="*"){
		$data=Db::name($name)->where($air,$id)->field($field)->order('id','asc')->limit($limit)->select();
		return $data;
	}
}