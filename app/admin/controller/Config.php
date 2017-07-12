<?php namespace app\admin\controller;

use houdunwang\route\Controller;
use houdunwang\request\Request;
use houdunwang\view\View;
use system\model\Config as ConfigModel;

class Config extends Controller{
    //动作
    public function setting(){
        $model = ConfigModel::find(1) ?: new ConfigModel();
        if(IS_POST){
            $post = Request::post();
            $model->content = json_encode($post,JSON_UNESCAPED_UNICODE);
            $model->save();
            return $this->setRedirect('refresh')->success('保存成功');
        }

        $model = $model['content'] ? json_decode($model['content'],true) : [];
        return View::make()->with(compact('model'));
    }
}

