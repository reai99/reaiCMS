<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"E:\phpEnv\www\localhost/application/admin\view\article\addtype.html";i:1578842981;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>热爱CMS——文章分类管理</title>
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
	 <div class="admin-contianer"> 
        <div class="reai-row reai-col-space8">
			<div class="reai-col-sm12">
				<div class="reai-panel">
					<div class="reai-panel-title">分类管理</div>
				    <div class="reai-panel-nav">
					<div class="reai-table-deal">
						<button type="button" class="reai-btn reai-btn-md table-event-edit">添加</button>
						<button type="button" class="reai-btn reai-btn-md reai-btn-danger table-event-del">删除</button>
					</div>
					 <table class="reai-table">
					 		<thead>
					 		  <tr class="reai-table-title">
					 		    <th width="50px"><input type="checkbox" ></th>
					 		    <th class="reai-table-sort">
					 			<span>ID</span>
					 			<i class="triangle triangle_up"></i>
					 			<i class="triangle triangle_down"></i></th>
					 			<th>分类名称</th>
								<th>cateID</th>
					 			<th class="reai-table-operat">操作</th>
					 		 </tr>
					 		</thead>
					 		<tbody></tbody>
					 </table>	
				    </div>
			    </div>
			</div>
	  <div class="reai-table-change">
		<div class="reai-row reai-form">
           <div  class="reai-form-item">
				<label class="reai-form-label">cateID</label>
				<div class="reai-input-block">
					<input type="text" name="cateid" class="reai-input">
				</div>
			</div>
			<div  class="reai-form-item">
				<label class="reai-form-label">分类名称</label>
			<div class="reai-input-block">
				<input type="text" name="typename" class="reai-input">
			</div>
		    </div>
			<div class="reai-form-item" style="text-align: center;">
				<button type="button" class="reai-btn reai-btn-md reai-btn-normal table-change-submit">提交</button>
				<button type="button" class="reai-btn reai-btn-md table-change-return">返回</button>
			</div>
	    </div>
	  </div>
		</div>	

	</div>
	<script type="text/javascript">
		reai.use('form',function(){
			reai.table({
				url:'/admin/article/addtype',
				controller:{
					operat:true, //加入每行
					del:'.table-event-del', //加入全局删除项
					edit:'.table-event-edit',//加入全局添加项
				},
			});	
		})
	</script>
	</body>
</html>
