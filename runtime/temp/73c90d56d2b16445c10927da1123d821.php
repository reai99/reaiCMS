<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:57:"E:\phpEnv\www\localhost\template/default/index\index.html";i:1579962418;s:61:"E:\phpEnv\www\localhost\template\default\include\include.html";i:1578714720;s:60:"E:\phpEnv\www\localhost\template\default\include\header.html";i:1580367918;s:60:"E:\phpEnv\www\localhost\template\default\include\footer.html";i:1579002862;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $basic['webname']; ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="<?php echo $basic['keywords']; ?>"/>
		<meta name="Description" content="<?php echo $basic['description']; ?>"/>
		 <script src="/public/static/common/js/reai.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/reai.ico.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/reai.min.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/common/css/style.css"/>
		 <link rel="stylesheet" type="text/css" href="/template/default/common/css/style.css"/>
	</head>
	<body>
     <div class="header">
		<div class="box-lg header-box">
			<div class="header-box-nav">
				<div class="logo"><img src="<?php echo $basic['weblogo']; ?>" alt=""></div>
				<div class="header-cotrol">
					<i class="list-event  reai-ico reai-ico-spread-left"></i>
					<div class="header-list">
					<ul>
					<?php $__LIST__ = db('menu')->order("order desc")->limit("4")->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li>
						<a href="<?php echo $vo['url']; ?>" target="_self"><?php echo $vo['menuname']; ?></a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>	
					</ul>
					<div class="header-search">
						<input type="text" class="reai-input" placeholder="请输入搜索内容">
						<i class="reai-ico reai-ico-search"></i>
					</div>
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript">
	let search_btn=document.querySelector(".header-search .reai-ico");
    search_btn.addEventListener('click',function(){
	   let search=document.querySelector(".header-search input");
	   let url='/index/search?search='+search.value;
	   window.location.href=url;
	})
	let open_list=document.querySelector(".list-event");
	let list=document.querySelector('.header-list');
	let body=document.querySelector('body');
	open_list.addEventListener('click',function(){
		let _this=this;
		if(!this.windowOpen){
			list.classList.add('header-list-open');
			this.windowOpen=true;
			this.classList.replace('reai-ico-spread-left','reai-ico-shrink-right')
		    let div=document.createElement('div');
			this.hiddenDom=div;
		    div.className="background-hidden";
			body.appendChild(div);
			div.addEventListener('click',function(){
				list.classList.remove('header-list-open');
				_this.classList.replace('reai-ico-shrink-right','reai-ico-spread-left');
				this.remove();
				_this.windowOpen=false;
			},false)
		}else{
			list.classList.remove('header-list-open');
			this.classList.replace('reai-ico-shrink-right','reai-ico-spread-left');
			this.hiddenDom.remove();
			this.windowOpen=false;
		}
	},false)
	
</script>
		<div class="nav">
			<?php if($basic['lbstatus']=='true'): ?>
			<div class="box-lg swiper">
				<div class="reai-swiper swiper-touch" autoplay="6000"  indicator-dots="true"  control="true"  >
					<?php $__LIST__ = db('article')->where("recommend",5)->order("id desc")->limit("5")->select();foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="swiper-item">
				        <img style="width: 100%;height: 100%;" src=" <?php echo $vo['slideimg']; ?>" alt="">
					</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>	
			</div>
			<?php endif; ?>
			<div class="box-lg recommend-list">
				<?php $__LIST__ = db('article')->where("recommend",4)->order("id desc")->limit("4")->select();foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="artlist-child reai-col-md6 reai-col-sm12">
					<div class="artlist-nav-box display">
				     <div class="art-img display-child"><img src="<?php echo $vo['coverimg']; ?>" alt=""></div>
					 <div class="art-nav display-child">
						 <div class="art-nav-item art-contro-first display">
							<div class="art-title display-child coverhidden"> <a href="/index/article/index/pid/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a> </div>
							<div class="art-time display-child coverhidden"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></div>
						 </div>
						 <div class="art-nav-item coverhidden">
						 	作者: <span><?php echo $vo['author']; ?></span>
						 </div>
						 <div class="art-nav-item coverhidden">
							类型: <span class="art-type">   <?php echo $vo['type']; ?></span>
						 </div>
						 <div class="art-nav-item coverhidden">	
								标签: 
							<?php foreach($vo['label'] as $label): ?> 
								<span class="art-label"><?php echo $label; ?></span>
							<?php endforeach; ?>
						 </div>
					 </div>
					</div>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="box-lg article-box display">
				<div class="display-child art-left">
				<div class="art-list-box">
					<div class="article-header">
						最新文章 <span>NEW</span>
						<a class="art-more" href="/index/api/classify.html">更多</a>
					</div>
					<?php $__LIST__ = db('article')->order("id desc")->limit("4")->select();foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="artlist-child reai-col-md6 reai-col-sm12">
						<div class="artlist-nav-box display">
					     <div class="art-img display-child"><img src="<?php echo $vo['coverimg']; ?>" alt=""></div>
						 <div class="art-nav display-child">
							 <div class="art-nav-item art-contro-first display">
								<div class="art-title display-child coverhidden"><a href="/index/article/index/pid/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a></div>
								<div class="art-time display-child coverhidden"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></div>
							 </div>
							 <div class="art-nav-item coverhidden">
							 	作者: <span><?php echo $vo['author']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">
								类型: <span class="art-type"><?php echo $vo['type']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">	
									标签: 
								<?php foreach($vo['label'] as $label): ?> 
									<span class="art-label"><?php echo $label; ?></span>
								<?php endforeach; ?>
							 </div>
						 </div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="art-list-box">
					<div class="article-header">
						热门推文 <span>HOT</span>
						<a class="art-more" href="/index/api/classify/recommend/3.html">更多</a>
					</div>
					<?php $__LIST__ = db('article')->where("recommend",3)->order("id desc")->limit("0")->select();foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="artlist-child reai-col-md6 reai-col-sm12">
						<div class="artlist-nav-box display">
					     <div class="art-img display-child"><img src="<?php echo $vo['coverimg']; ?>" alt=""></div>
						 <div class="art-nav display-child">
							 <div class="art-nav-item art-contro-first display">
								<div class="art-title display-child coverhidden"><a href="/index/article/index/pid/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a></div>
								<div class="art-time display-child coverhidden"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></div>
							 </div>
							 <div class="art-nav-item coverhidden">
							 	作者: <span><?php echo $vo['author']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">
								类型: <span class="art-type"><?php echo $vo['type']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">	
									标签: 
								<?php foreach($vo['label'] as $label): ?> 
									<span class="art-label"><?php echo $label; ?></span>
								<?php endforeach; ?>
							 </div>
						 </div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>	
                 <div class="art-list-box">
					<div class="article-header">
						精选推文 <span>精</span>
						<a class="art-more" href="/index/api/classify/recommend/2.html">更多</a>
					</div>
					<?php $__LIST__ = db('article')->where("recommend",2)->order("id desc")->limit("0")->select();foreach($__LIST__ as $key=> $vo) $__LIST__[$key]["label"]=explode(",",$vo["label"]);if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="artlist-child reai-col-md6 reai-col-sm12">
						<div class="artlist-nav-box display">
					     <div class="art-img display-child"><img src="<?php echo $vo['coverimg']; ?>" alt=""></div>
						 <div class="art-nav display-child">
							 <div class="art-nav-item art-contro-first display">
								<div class="art-title display-child coverhidden"><a href="/index/article/index/pid/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a></div>
								<div class="art-time display-child coverhidden"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></div>
							 </div>
							 <div class="art-nav-item coverhidden">
							 	作者: <span><?php echo $vo['author']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">
								类型: <span class="art-type"><?php echo $vo['type']; ?></span>
							 </div>
							 <div class="art-nav-item coverhidden">	
									标签: 
								<?php foreach($vo['label'] as $label): ?> 
									<span class="art-label"><?php echo $label; ?></span>
								<?php endforeach; ?>
							 </div>
						 </div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>	
				</div>
				<div class="display-child art-right reai-hide-xs"> 
				<div class="reai-panel" style="height: 240px;">
					<div class="reai-panel-title">统计</div>
					<div class="reai-panel-nav">
					 <div class="panel-today">
						 <div class="panel-item1">今日发文: <span class="red"><?php echo $total['today']['artcount']; ?></span> </div>
						 <div class="panel-item1">今日留言: <span class="red"><?php echo $total['today']['lycount']; ?></span> </div>
						 <div class="panel-item1">今日流量: <span class="red"><?php echo $total['all']['flowcount']; ?></span> </div>
					 </div>
						<div class="panel-all">
							<div class="panel-item">总文章 <br><span class="red"><?php echo $total['all']['artcount']; ?></span></div>
							<div class="panel-item">总留言<br><span class="red"><?php echo $total['all']['lycount']; ?></span></div>
							<div class="panel-item">总流量<br><span class="red"><?php echo $total['all']['flowcount']; ?></span></div>
						</div>
					</div>
				</div>
				<div class="reai-panel" >
					<div class="reai-panel-title">文章分类列表</div>
					<div class="reai-panel-nav">
                        <ul class="art-list">
							<?php $__LIST__ = db('arttype')->order("id desc")->limit("4")->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li class="art-list-child"> <a  href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['typename']; ?> </a></li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
					</div>
				</div>
				<div class="reai-panel" >
					<div class="reai-panel-title">文章标签列表</div>
					<div class="reai-panel-nav">
				       <?php $__LIST__ = db('artlabel')->order("id desc")->limit("100")->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				               <span class="label-child"><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['labelname']; ?></a></span>
				                  <?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class="reai-panel" >
					<div class="reai-panel-title">最新留言</div>
					<div class="reai-panel-nav">
						<ul class="liuyan-list">	
				       <?php $__LIST__ = db('liuyan')->order("id desc")->limit("5")->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				        <li>
							<div class="ly-title">
							<div class="ly-user-name">用户: <span class="red"><?php echo $vo['username']; ?></span></div>
							<div class="ly-time"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></div>
							</div>
							<div class="ly-content">内容:<?php echo $vo['content']; ?></div>
						</li>
				       <?php endforeach; endif; else: echo "" ;endif; ?>
					   </ul>
					</div>
				</div>
			 </div>
			</div>	
		</div>
		<div class="footer">
		 <div class="copyright">
			 <?php echo $basic['copyright']; ?>
		 </div>
		<div class="footer-bottom">©2020 ZREAI.COM 版权所有|<a href="">热爱CMS</a> </div>
</div>
	</body>
	<script type="text/javascript">
		reai.use('swiper',function(){
			
		})
	</script>
</html>
