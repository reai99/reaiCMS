<?php
  function index_login_ckeck(){
	if (!session('index_user')||request()->time() - session('index_login_time') > 4*60*60) {
		session('index_user',null);
		session('index_login_time',null);
		return true;
	}else{return false;}
  }
  
  