<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"E:\phpEnv\www\localhost/application/admin\view\index\setlunbo.html";i:1577804348;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>热爱CMS——轮播列表</title>
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
	<body>
		<div class="admin-contianer">
		   <div class="reai-row reai-col-space8">
					<div class="reai-col-sm12">
						<div class="reai-panel">
							<div class="reai-panel-title">轮播列表</div>
						    <div class="reai-panel-nav">
							<div class="reai-table-deal">
							   <button type="button" class="reai-btn reai-btn-md reai-btn-danger table-event-del">批量删除</button>
							<div class="reai-art-search">
								<div class="reai-input-inline">
									<input type="text" class="reai-input search-input" placeholder="请输入搜索内容" />
								</div>
							</div>
							</div>
							 <table class="reai-table">
							 		<thead>
							 		  <tr class="reai-table-title">
							 		    <th width="50px"><input type="checkbox" ></th>
							 		    <th class="reai-table-sort">
							 			<span>ID</span>
							 			<i class="triangle triangle_up"></i>
							 			<i class="triangle triangle_down"></i></th>
							 			<th>文章名称</th>
							 			<th>作者</th>
							 			<th>发布时间</th>
							 			<th>分类</th>
							 		 </tr>
							 		</thead>
							 		<tbody></tbody>
							 </table>	
						    </div>
					    </div>
					</div>
			</div>
		</div>	
			<script type="text/javascript">
				reai.use('form',function(){
					reai.table({
						url:'/admin/index/setlunbo',
						bindsearch:{dom:'.search-input',type:'input'},
						controller:{
							del:'.table-event-del', //加入全局删除项
						},
					});	
					});	
			</script>
	</body>
</html>
