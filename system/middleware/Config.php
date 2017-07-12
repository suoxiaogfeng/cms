<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;
use system\model\Config as ConfigModel;

class Config implements Middleware{
	//执行中间件
	public function run($next) {
		$data = ConfigModel::find(1)->pluck('content');
		v('config',json_decode($data,true));
		$next();
	}
}