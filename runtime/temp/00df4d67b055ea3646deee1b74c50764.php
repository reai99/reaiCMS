<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"E:\phpEnv\www\localhost/application/admin\view\index\admin.html";i:1582462373;s:66:"E:\phpEnv\www\localhost\application\admin\view\public\include.html";i:1577537275;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	    <title>热爱admin</title>
		<script src="/public/static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="/public/static/admin/css/style.css"/>
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
		<!--头部-->
		<div class="reai-header theme-color">
			<div class="reai-hide-sm reai-ms-menu">
				<i class="reai-ico reai-ico-shrink-right"></i>
			</div>
			<div class="reai-flex">
				<div class="flex-child reai-logo basic-color">
					热爱CMS
				</div>
				<div class="flex-child reai-head-menu basic-color reai-hide-xs">
					<ul class="reai-flex">
						<li class="flex-child reai-theme-event"><i class="reai-ico reai-ico-theme "></i>主题设置</li>
					</ul>
				</div>
				<div class="flex-child reai-user">
					<div class="reai-flex user-box">
						<div class="flex-child  basic-color text-overhidden reai-show-sm-block reai-hide-xs">zqy1239asdasdsad99</div>
						<div class="flex-child user-logo">
							<img src="/public/Ulogo/10.png" >
							</div>
							<div class="reai-user-swtich reai-flex">
							<i class="reai-ico reai-ico-triangle-d user-change-event"></i>
							</div>
							<div class="user-change-box">
							<div class="user-change-list"><a id="set-adminuser" href="javascript:void(0)">用户设置</a></div>	
							<div class="user-change-list"><a href="<?php echo $user_exchange; ?>">切换账号</a></div>	
							<div class="user-change-list"><a href="<?php echo $logout; ?>">退出账号</a></div>	
							
							</div>
					</div>
					
				</div>
			</div>
		</div>
		<!--左侧菜单栏-->
		<div class="reai-left-menu">
		<div class="reai-side-scroll theme-color-lf">
			<ul class="oneParent">
				<li><a  href="javascript:;"><span class="reai-ico reai-ico-engine"></span>基本设置<i class="reai-ico reai-ico-left"></i></a>
				<ul class="twoParent left-menu-event theme-color" >
					<li  href-url-name="/admin/index/basic"><a href="javascript:;">基本信息</a></li>
                    <li><a href="javascript:;">文章管理<i class="reai-ico reai-ico-left"></i></a>
					<ul class="threeParent left-menu-event">
					<li  href-url-name="/admin/article/addart"><a href="javascript:;">文章新建</a></li>
					<li  href-url-name="/admin/article/artadmin"><a href="javascript:;">文章管理</a></li>
					<li  href-url-name="/admin/article/addtype"><a href="javascript:;">分类管理</a></li>
					<li  href-url-name="/admin/article/addlabel"><a href="javascript:;">标签管理</a></li>
					</ul>
					</li>
					<li><a href="javascript:;">菜单栏 <i class="reai-ico reai-ico-left"></i> </a>
					 <ul class="threeParent left-menu-event">
						 <li href-url-name="/admin/menu/topmenu"> <a href="javascript:;">菜单设置</a></li>
					 </ul>
					</li>
					<li ><a href="javascript:;">前台用户<i class="reai-ico reai-ico-left"></i></a>
					<ul class="threeParent left-menu-event">
					<li  href-url-name="/admin/useradmin/userlist"><a href="javascript:;">用户管理</a></li>
					</ul>
					</li>
					<li  href-url-name="/admin/index/setlunbo"><a href="javascript:;">首页轮播</a></li>
					<li  href-url-name="/admin/index/liuyan"><a href="javascript:;">留言管理</a></li>
				</ul>
				</li>
				<li><a href="javascript:;"><span class="reai-ico reai-ico-layouts"></span>后台设置<i class="reai-ico reai-ico-left"></i></a>
				<ul class="twoParent left-menu-event theme-color">
					<li href-url-name="/admin/system/adminUser"><a href="javascript:;">管理员</a></li>
					<li href-url-name="/admin/system/createPage"><a href="javascript:;">自定义路径</a></li>
					<li href-url-name="/admin/system/adminModule"><a href="javascript:;">第三方接口</a></li>
					<li class="reai-theme-event"><a href="javascript:;">主题设置</a></li>
				</ul>
				</li>
				<li  class="left-menu-event"  href-url-name="/admin/system/rizhi"><a href="javascript:;"><span class="reai-ico reai-ico-tips"></span>查看日志</a></li>
				<li id="clear-cache"><a href="javascript:;"><span class="reai-ico reai-ico-fonts-clear"></span>缓存清除</a></li>
			</ul>
			</div>
		</div>
		<!--iframe内容显示-->
		<div class="reai-nav">
		<div class="reai-nav-title">
		 <div class="reai-title-left"><i class="reai-ico reai-ico-left"></i></div>
		 <div class="reai-title-right"><i class="reai-ico reai-ico-right"></i></div>
		 <div class="nav-home iframe-tab-open"><i class="reai-ico reai-ico-console"></i> </div>
		 <div class="reai-tab-list">
		 	<ul class="reai-add-list"></ul>
		 </div>
		</div>
		<div class="reai-iframe">
		<div class="reai-iframe-basic iframe-open">
			<div class="reai-row reai-col-space8">
			    <div class="reai-col-xs12">
			       <div class="reai-panel">
						<div class="reai-panel-title">CMS运行环境</div>
						   <div class="reai-panel-nav">
							 <table class="reai-table">
							 <tbody>
								<?php if(is_array($server_info) || $server_info instanceof \think\Collection || $server_info instanceof \think\Paginator): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                               <th><?php echo $key; ?></th><th><?php echo $vo; ?></th>
                               </tr>
							  <?php endforeach; endif; else: echo "" ;endif; ?>
							 </tbody>
							 </table>
						   </div>
			       </div>
			    </div>
			</div>
			<div class="reai-row reai-col-space8">
			    <div class="reai-col-xs12">
			       <div class="reai-panel">
						<div class="reai-panel-title">热爱后台系统</div>
						   <div class="reai-panel-nav">
							 <table class="reai-table">
							 <tbody>
                                <tr>
                               <th>版本</th><th>Reai1.0.0v</th>
                               </tr>
                               <tr>
                               <th>支持</th><th>支持IE8+,火狐,谷歌,欧朋等主流浏览器环境</th>
                               </tr>
                               <tr>
                               <th>特点</th><th>1.支持模块自定义<br>2.脚本文件小,效率高<br>3.使用方便,建站高效<br>4.更多</th>
                               </tr>
                               <tr>
                               <th>联系</th><th>QQ：1367478101</th>
                               </tr>
							 </tbody>
							 </table>
						   </div>
			       </div>
			    </div>
			</div>
			
		</div>
		</div>
		</div>
		<!--底部-->
		<div class="reai-footer">
			
		</div>
		<div class="reai-basic-hidden"></div>
		<div class="reai-theme-box">
		<div class="theme-list">
			<div class="reai-theme-child nomal"></div>
			<div class="reai-theme-text">默认</div>
		</div>
		<div class="theme-list">
			<div class="reai-theme-child theme1"></div>
			<div class="reai-theme-text">#009688</div>
		</div>
		<div class="theme-list">
			<div class="reai-theme-child theme2"></div>
			<div class="reai-theme-text">#1E9FFF</div>
		</div>
		<div class="theme-list">
			<div class="reai-theme-child theme3"></div>
			<div class="reai-theme-text">#FF5722</div>
		</div>
		<div class="theme-list">
			<div class="reai-theme-child theme4"></div>
			<div class="reai-theme-text">#FAF0E6</div>
		</div>
		<div class="theme-list">
			<div class="reai-theme-child theme5"></div>
			<div class="reai-theme-text">#8B008B</div>
		</div>
		</div>
		<script>
      reai.use('element',function(){
        reai.element.init();
	     cg_theme();
		 clear_cache();
		 document.querySelector("body").className=reai.getCookie('admin_theme');
      })
	    	  
  function clear_cache(){
	  let btn=document.querySelector("#clear-cache");
	  btn.addEventListener('click',function(){
		  reai.ajax({
			  method:'post',
			  url:'/admin/system/cache',
			  success:res=>{
				 reai.msg(res);
			  }
		  })
	  },false)
  }

		</script>
	</body>
</html>
