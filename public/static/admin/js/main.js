window.onload=function(){
   new reaiBasic();
   new leftMenuChange();
   new iframeChange();
}

function reaiBasic(){
	this.sliderBorder();
	this.titleLeftMenu();
	this.userChange();
}
function iframeChange(){
	this.init();
}
function leftMenuChange(){
   this.init()
}

reaiBasic.prototype={
	sliderBorder:function(){
		let headMenu=document.querySelectorAll(".reai-head-menu li");
		for (let i = 0; i < headMenu.length; i++) {
			headMenu[i].addEventListener('click',function(){
				for (let j= 0; j < headMenu.length; j++) {headMenu[j].className="flex-child";}
				this.className="flex-child menu-seleted";
			},false)
		}
	},
	titleLeftMenu:function(){
			   let Menu=document.querySelector('.reai-ms-menu');
			   let airMenu=document.querySelector(".reai-left-menu");
			   let hiddenBox=document.querySelector(".reai-basic-hidden");
			   Menu.status=false;
			   let _this=this;
			   Menu.addEventListener('click',function(){
				   if(!this.status){
					 this.querySelector('i').className="reai-ico reai-ico-spread-left"; 
					   airMenu.className="reai-left-menu left-menu-open";
					   hiddenBox.className="reai-basic-hidden hidden-open";
					  this.status=true;
					  let __this=this;
				    hiddenBox.onclick=function(){clickHidden(__this);this.onclick=null;} 
				   }else{
                     clickHidden(this)
				   }
				   
			   },false);
			  function clickHidden(e){
				  e.querySelector('i').className="reai-ico reai-ico-shrink-right";
				  airMenu.className="reai-left-menu";
				  hiddenBox.className="reai-basic-hidden";
				  e.status=false;
			  }
	},
	userChange:function(){
		let btn=document.querySelector(".user-change-event");
		let win=document.querySelector(".user-change-box");
		let body=document.querySelector("body")
		btn.addEventListener('click',function(e){
		e.stopPropagation()
		win.classList.add("hidden-open");
			body.onclick=function(){
				win.classList.remove("hidden-open");
				body.onclick=null;
			}		
		},false)
	}
	
}


leftMenuChange.prototype={
         init:function(){
           this.nowOpenObj={};
           this.tree=[];
           this.getDom();
           this.listEvent();
         },
         getDom:function(){
           let menuOne=document.querySelectorAll(".reai-left-menu .oneParent>li");
           for(let j=0;j<menuOne.length;j++){
           	let data1 =[],data={};
           	let menuTwo=menuOne[j].querySelectorAll(".twoParent>li")
           	 for(let i=0;i<menuTwo.length;i++){
                  if(menuTwo[i].querySelector("ul")!=null){
                  	let obj={}
            		obj.dom=menuTwo[i];
            		obj.status=0;
            		obj.childUl=menuTwo[i].querySelector("ul");
            		obj.childLength=menuTwo[i].querySelectorAll("li").length;
            		 data1.push(obj);
                     }
           	        }
           	if(menuOne[j].querySelector("ul")!=null){
                 data.status=0; data.dom=menuOne[j];
                 data.childLength=menuTwo.length;
                 data.childUl=menuOne[j].querySelector("ul");
                 data.children=data1;
                 this.tree.push(data)
           	      }
           }

            },

        listEvent:function(){
        	let _this=this;
        	for(let i=0;i<this.tree.length;i++){
        		 this.tree[i].dom.querySelector('a').index=i;
        	     this.tree[i].dom.querySelector('a').addEventListener('click',function(e){
        	        e.stopPropagation(); 
        	       _this.changeClass(this.index);  
        	  },false)
        	 for(let j=0;j<this.tree[i].children.length;j++){
        	 	this.tree[i].children[j].dom.querySelector('a').twoindex=j;
        	 	this.tree[i].children[j].dom.querySelector('a').index=i;
              this.tree[i].children[j].dom.querySelector('a').addEventListener('click',function(e){
              	e.stopPropagation(); 
              	_this.changeClass(this.index,this.twoindex);
              },false)
        	 }
        	}
        },
        changeClass:function(index,twoindex=''){
        	let _this=this;
        	let twoHeight=0;
        	if(typeof(twoindex)=='number'){
        		if(this.tree[index].children[twoindex].status==0){
        		 this.tree[index].children[twoindex].childUl.style.height=this.tree[index].children[twoindex].childLength*45+"px";
        		 this.tree[index].children[twoindex].dom.querySelector('i').className="reai-ico reai-ico-down";
        	     this.tree[index].children[twoindex].status=1;
        		}else{
                    this.tree[index].children[twoindex].childUl.style="";
                    this.tree[index].children[twoindex].dom.querySelector('i').className="reai-ico reai-ico-left";
                    this.tree[index].children[twoindex].status=0;
        		}
        	 this.tree[index].status=0
        	}
        	if(this.tree[index].status==0){
        	for(let i=0;i<this.tree[index].children.length;i++){
        	twoHeight=this.tree[index].children[i].status*this.tree[index].children[i].childLength*45+twoHeight;
             } 
             this.tree[index].childUl.style.height=this.tree[index].childLength *45+twoHeight+"px";
             this.tree[index].dom.querySelector('i').className="reai-ico reai-ico-down";
             this.tree[index].status=1;
        	}else{
        		this.tree[index].childUl.style="";
        		this.tree[index].dom.querySelector('i').className="reai-ico reai-ico-left";
        		this.tree[index].status=0;
        	}
          
   
          

        }

};




/**
 * this.index 记录当前tab打开位置   this.openTab 记录打开tab  this.openIframe记录打开iframe
 * list中 status是否打开，dom元素，urlName对应地址名 
 * list.dom中 index索引，urlName对应地址名 
 * tab中 index记录自身索引，listIndex记录tab对呀list索引
 */

iframeChange.prototype={
	init:function(){
		this.homeMenu={};
		this.homeMenu.title=document.querySelector('.reai-nav-title .nav-home');
        this.homeMenu.dom=document.querySelector('.reai-iframe-basic');
        this.homeMenu.status=true;
		let vessel=[];
		let list1=document.querySelectorAll(".reai-left-menu .twoParent.left-menu-event>li");
        let  list2=document.querySelectorAll(".reai-left-menu .oneParent>.left-menu-event");
		for (let i = 0; i < list1.length; i++) {
		   if(list1[i].querySelectorAll(".threeParent.left-menu-event").length==0){
			   let linkUrl=list1[i].getAttribute('href-url-name');
		   	if(linkUrl){
				let obj={};obj.status=0;obj.dom=list1[i];
				   obj.urlName=linkUrl;
				   vessel.push(obj);
			}
		   }else{
		   	let threeChild=list1[i].querySelectorAll(".threeParent.left-menu-event>li");
		   	for(let j=0;j<threeChild.length;j++){
				let linkUrl=threeChild[j].getAttribute('href-url-name')
		   		if(linkUrl){
					let obj={};obj.status=0;obj.dom=threeChild[j];
					obj.urlName=linkUrl;
					vessel.push(obj);
				}
		   	}
		   }
			}
	
       for (let i = 0; i < list2.length; i++) {let obj={};obj.status=0;obj.dom=list2[i];obj.urlName=list2[i].getAttribute('href-url-name'); vessel.push(obj)}
		this.menuList=vessel;
		this.openTab=[]; //当前打开tab
		this.openIframe=[];//当前打开iframe
		this.leftListOn();
		let _this=this;
		this.homeMenu.title.addEventListener('click',function(){
			this.className="nav-home iframe-tab-open";
			_this.homeMenu.dom.className="reai-iframe-basic iframe-open";
			let tab=_this.getTabList();//初始化TAB
           let iframe=document.querySelectorAll(".reai-iframe .reai-iframe-child");
           for(let i=0;i<iframe.length;i++){iframe[i].classList.remove('iframe-open');}
		},false);
		
	},
	getTabList:function(){
		let vessel=[];
		let tab1=document.querySelectorAll(".reai-add-list li");
		for (let i = 0; i < tab1.length; i++) {
			let obj={};
            tab1[i].className="";
            obj.tab=tab1[i];
			vessel.push(obj);
		}
		return vessel
	},
	leftListOn:function(){
		let list=this.menuList;
		let leftList=document.querySelector('.reai-left-menu');
		let hiddenBox=document.querySelector(".reai-basic-hidden");
		let _this=this;
		this.listOn=true; //列表点击状态开关
		for (let i = 0; i < list.length; i++) {
			list[i].dom.index=i;
			list[i].dom.urlName=list[i].urlName; 
			list[i].dom.iframeStaus=false;  //iframe状态开关
			list[i].dom.addEventListener('click',function(){
			   leftList.classList.remove('left-menu-open');
               hiddenBox.classList.remove('hidden-open');
               document.querySelector('.reai-ms-menu i').className="reai-ico reai-ico-shrink-right";
               document.querySelector('.reai-ms-menu').status=false;
				let obj=list[this.index];
				if(_this.listOn){
					_this.listOn=false;
					if(obj.status==0&&_this.openTab.indexOf(this.index)){
						_this.addTab(this.innerText,this.index);
						if(!this.iframeStaus){this.iframeStaus=true;_this.addIframe(this.urlName,this.index)}
						_this.clearTabClass(_this.openTab.length-1);
						//_this.clearIframeClass(this.index);
						obj.status=1;

					}else{
						for (let i=0;i<_this.openTab.length;i++) {if(this.index==_this.openTab[i]) {_this.clearTabClass(i);}}
					//	_this.clearIframeClass(this.index);
					}
					_this.listOn=true;
				}
			},false)
		}
	},
	addTab:function(name,listIndex){
		let _this=this;
		let tabList=document.querySelector(".reai-add-list");
		let li=document.createElement("li"); 
		let span=document.createElement("span"); span.innerText=name;
		let ico=document.createElement("i"); ico.className="reai-ico reai-ico-close";
		li.appendChild(span);li.appendChild(ico);tabList.appendChild(li);
		let index=this.openTab.length;
		li.index=index;  
		li.listIndex=listIndex;  
		this.addTabStatus=true;  //增加tab状态开关
		this.openTab.push(listIndex)
		li.addEventListener("click",changeLiClass,false);
		ico.addEventListener('click',function(e){
		   e.stopPropagation(); 
		   if(_this.addTabStatus){
			   _this.addTabStatus=false
			   li.removeEventListener('click',changeLiClass);
			   this.parentElement.remove();
			   _this.openTab.splice(this.parentElement.index,1);
			   if(tabList.children.length>=1){
			   		if(this.parentElement.index==0&&this.parentElement.index==_this.index){   _this.clearTabClass(0);  }
			   		else if(this.parentElement.index==_this.index){ _this.clearTabClass(this.parentElement.index-1); } 
			   		else if(this.parentElement.index<_this.index){_this.index--;}
			   }else{_this.clearIframeClass(0);_this.homeMenu.dom.classList.add('iframe-open');_this.homeMenu.title.classList.add('iframe-tab-open');  }
			   	_this.menuList[listIndex].status=0;  //修改对应list的status
			   for(let i=0;tabList.children.length>i;i++){tabList.children[i].index=i;} //重置tab索引
			   _this.addTabStatus=true;
		   }
		},false);	
		function changeLiClass(e){
			 let nowIndex=e.target.parentElement.index!=undefined?e.target.parentElement.index:index; //获取当前索引
			_this.clearTabClass(nowIndex);
			//_this.clearIframeClass(listIndex);
		}
	},
	clearTabClass:function(index){
	this.index=index;
	 let list=this.getTabList();	
	 document.querySelector(".nav-home").className="nav-home";
	 if(list.length>0) {list[index].tab.className="iframe-tab-open";this.clearIframeClass(list[index].tab.listIndex);}
	 this.homeMenu.dom.classList.remove('iframe-open');
	},
    addIframe:function(urlName,listIndex){
		let url=urlName+".html";
		let iframeBox=document.querySelector(".reai-iframe");
		let div=document.createElement('div');
		let iframe="<iframe src='"+url+"' width='100%' height='100%'  marginheight='0' marginwidth='0' frameborder='0'></iframe>";
		div.className="reai-iframe-child";
		iframeBox.appendChild(div);
	       div.innerHTML=iframe;
		this.openIframe.push(listIndex);
	},
	clearIframeClass:function(index){
		let iframeBox=document.querySelectorAll(".reai-iframe-child");
		for (let i = 0; i < iframeBox.length; i++) {iframeBox[i].className="reai-iframe-child";}
		if(this.openIframe.length>=1&&this.openTab.length>0){
		for (let i = 0; i < this.openIframe.length; i++) {
		if(this.openIframe[i]==index){
		 iframeBox[i].className="reai-iframe-child iframe-open";
		if(this.stausIndex&&this.stausIndex!=index){
			iframeBox[i].querySelector("iframe").src=iframeBox[i].querySelector("iframe").getAttribute('src');this.stausIndex=index;}
		  break;  }
		   }
	    }			 
	},
}
/**
 *theme
 */
     function cg_theme(){
		 let theme=document.querySelectorAll(".reai-theme-event");
		 let colorCard=document.querySelector(".reai-theme-box");
		 let colorList=Array('','theme-one','theme-two','theme-three','theme-four','theme-five');
		 let color=colorCard.querySelectorAll('.reai-theme-child');
		 let body=document.querySelector("body");
		 for(let i=0;i<theme.length;i++){
		 	  theme[i].addEventListener('click',function(e){
				e.stopPropagation();
			if(colorCard.status==undefined||colorCard.status==false){
				colorCard.classList.add('theme-open');
				colorCard.status=true;
				for(let j=0;j<color.length;j++){
					color[j].index=j;
					color[j].onclick=function(e){
						e.stopPropagation();
						reai.setCookie('admin_theme',colorList[this.index]);
						body.className=reai.getCookie('admin_theme');
					}
				}
				body.onclick=function(){
					colorCard.classList.remove('theme-open');
					for(let j=0;j<color.length;j++){color[j].onclick=null;}
					colorCard.status=false;
					body.onclick=null;
				}
			}else{
				colorCard.classList.remove('theme-open');
				for(let j=0;j<color.length;j++){color[j].onclick=null;}
				colorCard.status=false;
			}	 
			  },false)   
		 }
	 }