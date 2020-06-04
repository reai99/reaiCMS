<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"E:\phpEnv\www\localhost/application/admin\view\article\addart.html";i:1580713152;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\editart.html";i:1580713626;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\ueditor.html";i:1577463912;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>热爱CMS——新添文章</title>
       <script src="/public/static/common/js/reai.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/reai.ico.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/reai.min.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/style.css"/>
<style type="text/css">
	.iframe-return{position: absolute;right: 0;top: 0;}
		.admin-contianer{padding:15px 10px;background: #f8f8f8;height: 100%;min-height: 100vh;box-sizing: border-box;}
		.reai-table-deal{height: 40px;line-height: 40px;position: relative;}
		.reai-art-search{position: absolute;top: 0;right: 0; width: 200px;height: 40px;}
		.reai-art-search .reai-input-inline{width:100%;line-height: 40px;}
		.reai-art-search .reai-input-inline .reai-input{box-sizing: border-box;}
		.reai-art-search .art-search{position: absolute;top: 4px;right:0;height: 33px!important;line-height: 33px;}
</style>
	</head>
	<body>
        <div class="iframe-main-box">
			<div class="iframe-main-title">新添文章</div>
                           <div class="reai-form">
								<div class="reai-form-item">
									<label class="reai-form-label">文章标题</label>
									<div class="reai-input-block">
										<input type="text" name="title" class="reai-input" value='<?php if(isset($artlist)): ?> <?php echo $artlist['title']; endif; ?>'  autocomplete="off" placeholder="文章标题">
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">关键词</label>
									<div class="reai-input-block">
										<input type="text" name="keywords" class="reai-input" value='<?php if(isset($artlist)): ?> <?php echo $artlist['keywords']; endif; ?>' autocomplete="off" placeholder="关键词">
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">文章描述</label>
									<div class="reai-input-block">
										<input type="text" name="description" class="reai-input" value='<?php if(isset($artlist)): ?> <?php echo $artlist['description']; endif; ?>' autocomplete="off" placeholder="文章描述">
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">作者</label>
									<div class="reai-input-inline">
										<input type="text" name="author" class="reai-input" value='<?php if(isset($artlist)): ?> <?php echo $artlist['author']; endif; ?>' autocomplete="off" placeholder="请输入内容">
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">文章标签</label>
									<div class="reai-input-block">
										<div class="reai-form-checkbox" name="label">
											<?php if(is_array($labellist) || $labellist instanceof \think\Collection || $labellist instanceof \think\Paginator): $i = 0; $__LIST__ = $labellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<div class="input-checkbox" value="<?php echo $vo['labelname']; ?>" ><span><?php echo $vo['labelname']; ?></span><i class="reai-ico reai-ico-ok"></i></div>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">封面图</label>
									<div class="reai-input-block">
									<div class="reai-file" name="coverimg" value="点击此处上传封面图"></div>
									<?php if(isset($artlist['coverimg'])): ?> 
									<a style="color:red;font-size:12px;text-decoration: underline;" href="<?php echo $artlist['coverimg']; ?>" target="_blank">查看已传</a>
									<?php else: ?>
									 <span style="color:red;font-size:12px;">未上传</span>
									<?php endif; ?>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">轮播图</label>
									<div class="reai-input-block">
									<div class="reai-file" name="slideimg" value="点击此处上传轮播图"></div>
									<?php if(isset($artlist['slideimg'])): ?>
									<a style="color:red;font-size:12px;" href="<?php echo $artlist['slideimg']; ?>" target="_blank">查看已传</a>
									<?php else: ?>
									 <span style="color:red;font-size:12px;">未上传</span>
									<?php endif; ?>
									</div>
								</div>
                                  <div class="reai-form-item">
									<label class="reai-form-label">推荐等级</label>
									<div class="reai-input-block">
										<div class="reai-form-select" name="recommend" select='<?php if(isset($artlist)): ?> <?php echo $artlist['recommend']-1; endif; ?>' >
											<div class="reai-select-title">
												<input  type="text" placeholder="请选择" readonly/>
												<i class="reai-ico reai-ico-left"></i>
											</div>
											<dl class="reai-select-list">
												<dd class="reai-select-tips select-list-open">请选择</dd>
												<dd>1级——普通推文</dd>
												<dd>2级——精选推文</dd>
												<dd>3级——热门推文</dd>
												<dd>4级——置顶推文</dd>
												<dd>5级——轮播设置</dd>
											</dl>
										</div>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">文章分类</label>
									<div class="reai-input-block">
										<div class="reai-form-select" name="type" select='<?php if(isset($artlist)): if(is_array($typelist) || $typelist instanceof \think\Collection || $typelist instanceof \think\Paginator): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($artlist) and ($vo['typename'] == $artlist['type'])): ?> <?php echo $key; else: endif; endforeach; endif; else: echo "" ;endif; endif; ?>'>
											<div class="reai-select-title">
												<input  type="text" placeholder="请选择" readonly/>
												<i class="reai-ico reai-ico-left"></i>
											</div>
											<dl class="reai-select-list">
												<dd class="reai-select-tips select-list-open">请选择</dd>
												<?php if(is_array($typelist) || $typelist instanceof \think\Collection || $typelist instanceof \think\Paginator): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
												<dd value="<?php echo $vo['typename']; ?>|<?php echo $vo['cateid']; ?>"><?php echo $vo['typename']; ?></dd>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</dl>
										</div>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">附件</label>
									<div class="reai-input-block">
									<div class="reai-file" name="file" value="点击此处上附件" size="20000000" type=""></div>
									<?php if(isset($artlist['file'])): ?>
									<a style="color:red;font-size:12px;" href="<?php echo $artlist['file']; ?>" target="_blank">查看已传</a>
									<?php else: ?>
									 <span style="color:red;font-size:12px;">未上传</span>
									<?php endif; ?>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">文章状态</label>
									<div class="reai-input-inline">
										<div class="reai-form-switch" name="status" select='<?php if(isset($artlist)): ?><?php echo $artlist['status']; else: ?>true<?php endif; ?>'>
											<div class="form-switch-box">
											<span class="form-switch-slid"></span><i>OFF</i>
										</div>
										</div>
									</div>
								</div>
								<div class="reai-form-item">
									<label class="reai-form-label">内容</label>
									<div class="reai-input-block">
			                    <script id="editor" type="text/plain" style="height:200px;width: 100%;"></script>
									</div>
								</div>
								<script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.all.min.js"> </script>
 <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<link rel="stylesheet" href="/public/static/ueditor/themes/iframe.css">
<script type="text/javascript">
       var ue = UE.getEditor('editor');

    </script>
								
								

		 <div class="reai-form-item" style="text-align: center;">
		 <button type="button" class="reai-btn reai-form-submit">发布文章</button>
		 </div>
		 </div>
	    </div>
		<script type="text/javascript">
			reai.use('form',function(){	
				let form=reai.form;
				let file;
				reai.file({
					limit:{type:"image/png,image/jpeg"},
					callback:res=>{file=res;},
					});
				form.submit('.reai-form-submit',function(data){
					ue.ready(function(){
						if(ue.hasContents()){
							var content = ue.getContent();
							for (let i in file) {data[i]=file[i];}
							data.content=content;
							reai.ajax({
								url:'/admin/article/addart',
								method:'post',
								data:data,
								dataType:'json',
								success:res=>{
							    if(res.code==1){setTimeout(function(){location.reload()},1000)}
									reai.msg(res.msg);
								},
								error:res=>{
									reai.msg(res)
								}
							})
						}else{
							reai.msg('内容为空!!!');
							return false;
						}	
					})
				
				});
				form.checkbox([{name:'label'}]);
				form.select([{name:"recommend",value:[1,2,3,4,5]},{name:'type'}]);
				form.offOn([{name:'status',}])
			})
		</script>
	</body>
</html>
