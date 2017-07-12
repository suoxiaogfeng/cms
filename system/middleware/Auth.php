<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;
use houdunwang\session\Session;

class Auth implements Middleware{
	//执行中间件
	public function run($next) {
         if(!Session::get('user')){
         	return message('请登陆',__WEB__ . '/login');
         }
         $next();
	}
}