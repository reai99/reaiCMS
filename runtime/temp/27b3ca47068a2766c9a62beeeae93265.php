<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\phpEnv\www\localhost/application/admin\view\useradmin\userlist.html";i:1577804379;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>热爱CMS——用户列表</title>
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
					<div class="reai-panel-title">前台用户列表</div>
				    <div class="reai-panel-nav">
					<div class="reai-table-deal">
						<button type="button" class="reai-btn reai-btn-md table-event-edit">添加用户</button>
						<button type="button" class="reai-btn reai-btn-md reai-btn-danger table-event-del">批量删除</button>
					   <div class="reai-art-search">
					   	<div class="reai-input-inline">
					   		<input type="text" class="reai-input search-input" placeholder="请输入搜索内容" autocomplete="off"
							 readonly  onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly',true);"/>
					   	</div>
						<button type="button" class="reai-btn reai-btn art-search search-event">搜索</button>
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
					 			<th>用户名</th>
                                <th>邮箱</th>
								<th>注册时间</th>
					 			<th class="reai-table-operat">操作</th>
					 		 </tr>
					 		</thead>
					 		<tbody></tbody>					
					 </table>	
						 <div style="text-align: center;"><div class="reai-page"></div></div>
				    </div>
			    </div>
			</div>
		<div class="reai-table-change">
				<div class="reai-row reai-form">
					<div  class="reai-form-item">
						<label class="reai-form-label">用户名</label>
					<div class="reai-input-block">
						<input type="text" name="username" class="reai-input">
					</div>
				    </div>
					<div class="reai-row reai-form">
						<div  class="reai-form-item">
							<label class="reai-form-label">email</label>
						<div class="reai-input-block">
							<input type="text" name="email" class="reai-input">
						</div>
					    </div>
					<div  class="reai-form-item">
						<label class="reai-form-label">密码</label>
					<div class="reai-input-block">
						<input type="password" name="password" class="reai-input">
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
	</body>
	<script type="text/javascript">
		reai.use('form',function(){
			reai.table({
			   paging:{
				   distance:5,
				   maxnum:5,
				   index:1,
			   },
				url:'/admin/useradmin/userlist',
				controller:{
					operat:true, //加入每行
					del:'.table-event-del', //加入全局删除项
					edit:'.table-event-edit',//加入全局添加项
				},
				bindsearch:{dom:'.search-event',type:'click'},
			});	
			
		});

	</script>
</html>
