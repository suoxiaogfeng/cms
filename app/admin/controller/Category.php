<?php namespace app\admin\controller;

use houdunwang\route\Controller;
use houdunwang\request\Request;
use houdunwang\view\View;
use system\model\Category as CategoryModel;

//1栏目的添加修改
class Category extends Controller
{
    //1创建一个方法显示栏目里的所有内容
    public function lists()
    {
        //1获取栏目中的数据
        $data = CategoryModel::getTreeData();
        //显示到页面中
        return View::make()->with(compact('data'));
    }


    //栏目的添加和编辑
    public function post()
    {
        $cid = Request::get('cid');
        //如果是编辑通过find获得模型，如果是添加重新实例化模型
        $model = CategoryModel::find($cid) ?: new CategoryModel();
        if (IS_POST) {
            //save同时具有添加和编辑的动作
            $model->save(Request::post());
            //跳转
            return $this->setRedirect(u('lists'))->success('保存成功');
        }
        //所属栏目（父级栏目）不能是自己也不能是自己的子栏目
        $catData = CategoryModel::getNoMine($cid);
        return View::make()->with(compact('catData', 'model'));

    }

    /**
     * 栏目删除
     */
    public function remove()
    {
        $cid = Request::get('cid');
        //判断是否有子栏目
        if (CategoryModel::where('pid', $cid)->first()) {
            return $this->setRedirect('back')->success('请先删除子栏目');
        }
        //删除栏目
        CategoryModel::find($cid)->destory();
        return $this->setRedirect(u('lists'))->success('删除成功');
    }
}