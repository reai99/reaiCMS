<?php
namespace app\Common\taglib;
use think\template\TagLib;
use think\Db;
class Customtag extends TagLib
{
	protected $tags=[
		'artlabel'=>['attr'=>'name,num,order','close'=>1],
		'arttype'=>['attr'=>'name,num,order','close'=>1],
		'artlist'=>['attr'=>'name,num,star,order,type','close'=>1],
		'liuyan'=>['attr'=>'name,num,oder,uid','close'=>1],
		'menu'=>['attr'=>'name,mun,order','close'=>1],
	];

	public function tagArtlist($tag,$content){
		if(isset($tag['star'])){$recommend='->where("recommend",'.$tag['star'].')';}else{$recommend="";}
		$num= isset($tag['num'])?$tag['num']:0;
		$order=isset($tag['order'])?$tag['order']:'desc';
		if(isset($tag['type'])){$type='->where("cateid",'.$tag['type'].')';}else{$type="";}
		$parseStr   = '<?php ';
		$parseStr  .= '$__LIST__ = db(\'article\')'.$recommend.$type.'->order("id '.$order.'")->limit("'.$num.'")->select();';
		$parseStr  .='foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);';
		$parseStr  .= '?>{volist name="__LIST__" id="'. $tag['name'] .'"}';
		$parseStr  .= $content;
		$parseStr  .= '{/volist}';
		$this->tpl->parse($parseStr);
		return $parseStr;
	}
	public function tagArtlabel($tag, $content) {
        $num        = isset($tag['num'])?$tag['num']:0;
		$order=isset($tag['order'])?$tag['order']:'desc';
		$parseStr   = '<?php ';
        $parseStr  .= '$__LIST__ = db(\'artlabel\')->order("id '.$order.'")->limit("'.$num.'")->select();';
        $parseStr  .= '?>{volist name="__LIST__" id="'. $tag['name'] .'"}';
        $parseStr  .= $content;
        $parseStr  .= '{/volist}';
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
   public function tagArttype($tag,$content){
	     $num   = isset($tag['num'])?$tag['num']:0;
		 $order=isset($tag['order'])?$tag['order']:'desc';
		 $parseStr   = '<?php ';
		 $parseStr  .= '$__LIST__ = db(\'arttype\')->order("id '.$order.'")->limit("'.$num.'")->select();';
		 $parseStr  .= '?>{volist name="__LIST__" id="'. $tag['name'] .'"}';
		 $parseStr  .= $content;
		 $parseStr  .= '{/volist}';
		 $this->tpl->parse($parseStr);
		 return $parseStr;
   }
   public function tagLiuyan($tag,$content){
	  $num        = isset($tag['num'])?$tag['num']:0;
	  $order=isset($tag['order'])?$tag['order']:'desc';
	  if(isset($tag['uid'])){$uid='->where("uid",'.$tag['uid'].')';}else{$uid="";}
	  $parseStr   = '<?php ';
	  $parseStr  .= '$__LIST__ = db(\'liuyan\')'.$uid.'->order("id '.$order.'")->limit("'.$num.'")->select();';
	  $parseStr  .= '?>{volist name="__LIST__" id="'. $tag['name'] .'"}';
	  $parseStr  .= $content;
	  $parseStr  .= '{/volist}';
	  $this->tpl->parse($parseStr);
	  return $parseStr; 
   }
   public function tagMenu($tag,$content){
	  $num        = isset($tag['num'])?$tag['num']:0;
	  $order=isset($tag['order'])?$tag['order']:'desc';
	  $parseStr   = '<?php ';
	  $parseStr  .= '$__LIST__ = db(\'menu\')->order("order '.$order.'")->limit("'.$num.'")->select();';
	  $parseStr  .= '?>{volist name="__LIST__" id="'. $tag['name'] .'"}';
	  $parseStr  .= $content;
	  $parseStr  .= '{/volist}';
	  $this->tpl->parse($parseStr);
	  return $parseStr; 
   }
}