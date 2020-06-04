

function template(){}

template.prototype={
	login:function(){
					let box=document.querySelector(".reai-login-box");
					let box_child=document.querySelectorAll('.login-container');
					let btns=document.querySelectorAll(".reai-login-event");
					let to_change=document.querySelectorAll(".reai-change-event");
					let click=false;
					btns[1].addEventListener('click',function(){
						box.classList.add("reai-login-switch");
					box_child[0].querySelector('.login-submit').classList.remove('reai-form');
					box_child[1].querySelector('.login-submit').classList.add('reai-form');
					});
					btns[0].addEventListener('click',function(){
						box.classList.remove("reai-login-switch");
						box_child[1].querySelector('.login-submit').classList.remove('reai-form');
						box_child[0].querySelector('.login-submit').classList.add('reai-form');
					})
					to_change[0].addEventListener('click',function(e){
						if(!click){
							click=true;
							let num=0;
							box_child[0].style="display:block;z-index:20";
							let timer=setInterval(function(){
								e.preventDefault();
							num=num+0.02;box.style.transform="rotateY("+num+"rad)"; 
							if(num>=3.14){clearInterval(timer);click=false;}
							if(num>=1.57){box_child[0].style="display:none";box_child[1].style="";}
							},1);
						}
					},false);
					to_change[1].addEventListener('click',function(e){
						if(!click){
						click=true;
						let num=3.14;
						box_child[1].style="display:block;z-index:20";
						let timer=setInterval(function(){
							e.preventDefault();
						num=num-0.02;box.style.transform="rotateY("+num+"rad)"; 
						if(num<=0){clearInterval(timer);click=false;}
						if(num<=1.57){box_child[1].style="display:none";box_child[0].style="";}
						},1);
						}
					},false);
	}
	
}