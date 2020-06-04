<?php
namespace app\admin\controller;
use think\Controller;

class Common extends Controller
{
	public function logout(){
	session('cms_admin_user', null);
	session('cms_login_time', null);	
	$this->redirect(url('Login/index'));
	}
	
	}