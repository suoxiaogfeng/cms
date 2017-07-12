<?php namespace app\admin\controller;

use houdunwang\route\Controller;
use houdunwang\request\Request;
use houdunwang\view\View;
use system\model\Article as ArticleModel;
use system\model\Category;


class Article extends Common
{
    //动作
    /**
     * 文章列表
     */
    public function lists()
    {
        //1如果GET没有获得数据，就给一个空
        $recycle = Request::get('recycle', '');
        //如果recycle有的话，那么就是查询回收站内容
        $where = $recycle ? 'isrecycle=1' : 'isrecycle=0';
        $data = ArticleModel::field('*,article.orderby as ao')->orderBy('article.orderby','ASC')->where($where)->join('category','category_cid','=','cid')->paginate(v('config.rows'));
        //1加载模板，显示
        return View::make()->with(compact('data'));
    }


    /**
     *
     *
     * 添加和编辑
     *
     *
     */
    public function post()
    {
        //1获得文章的ID
        //2当修改的时候会用到这个ID，通过这个找文章
        $aid = Request::get('aid');
        //1如果是编辑通过find获得模型，如果是添加重新实例化模型
        //2如果aid中有值 ，就是要修改这个ID的内容，如果没有就重新创建一个文章
        $model =$aid? ArticleModel::find('$aid') : new ArticleModel();
        //1判断是否POST提交
        if (IS_POST) {
            //1获得提交过来的数据
            //2当修改或添加的内容会存放到这个变量里，显示页面用
            $post=Request::post();
            //1save同时具有添加和编辑的动作
            //2不管是编辑还是添加都是通过这个动作来完成提交
            $model->save($post);
            //1当修改或添加成功的时候，提示成功，并跳转
            //2说明已经完成操作
            return $this->setRedirect(u('lists'))->success('保存成功');
        }
        //1获得所属栏目的数据
        //2
        $catData = Category::getTreeData();
        //p($catData);
        //1加载模板，显示页面
        return view(''.compact('catData','model'));

    }


    /**
     * 删除列表放到回收站
     */
    public function remove()
    {
        //获得要删除的ID，并把isrecycle标为1，放到回站
        ArticleModel::find(Request::get('aid'))->save(['isrecycle' => 1]);
        //
        return $this->setRedirect(u('lists'))->success('删除成功');
    }

    /**
     * 还原回收站
     */
    public function recover()
    {
        ArticleModel::find(Request::get('aid'))->save(['isrecycle' => 0]);
        return $this->setRedirect(u('lists'))->success('还原成功');

    }

    /**
     * 删除回收站
     */
    public function realRemove()
    {

        ArticleModel::find(Request::get('aid'))->destory();
        return $this->setRedirect(u('lists'))->success('删除成功');

    }
}