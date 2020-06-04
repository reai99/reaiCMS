<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"E:\phpEnv\www\localhost/application/admin\view\system\rizhi.html";i:1582465926;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>热爱CMS——日志</title>
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
					<div class="reai-panel-title">近期日志</div>
				    <div class="reai-panel-nav">
					 <table class="reai-table">
					 		<thead>
					 		  <tr class="reai-table-title">
					 		    <th width="50px"><input type="checkbox" ></th>
					 		    <th class="reai-table-sort">
					 			<span>ID</span>
					 			<i class="triangle triangle_up"></i>
					 			<i class="triangle triangle_down"></i></th>
					 			<th>ip</th>
                                <th>操作内容</th>
								<th>时间</th>
					 		 </tr>
					 		</thead>
					 		<tbody>
								
							</tbody>					
					 </table>	
						 <div style="text-align: center;"><div class="reai-page"></div></div>
				    </div>
			    </div>
			</div>
		</div>	
	</div>
	</body>
	<script type="text/javascript">
		reai.use('form',function(){
			let  data=[];
			let pagemun=10;
			reai.ajax({
				method:'post',
				url:"/admin/system/rizhi",
				dataOpen:true,
				success:res=>{
                   let  z=res.split('"}');
					 for(let i=0;i<z.length-1;i++){
						z[i]=z[i]+'"}';
						z[i]=JSON.parse(z[i]);
						let obj={};
						obj.id=i+1;
						obj.ip=z[i].ip;
						obj.message=z[i].messege;
						obj.time=z[i].timestamp;
						data.unshift(obj)
					 }
				}
			})
			reai.table({data:data.slice(0,pagemun).reverse()});
			reai.paging([
				{
					total:data.length,
					maxnum:pagemun,
					distance:5,
					callback:res=>{
						reai.table({data:data.slice((res-1)*pagemun,res*pagemun).reverse()});
					}
				}
			])
		});

	</script>
</html>
