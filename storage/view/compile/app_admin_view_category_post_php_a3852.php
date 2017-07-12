<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>后盾网 - HDCMS开源免费内容管理系统</title>
    <meta name="csrf-token" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="<?php echo __ROOT__?>/node_modules/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo __ROOT__?>/node_modules/hdjs/css/font-awesome.min.css" rel="stylesheet">


    <script>
        //模块配置项
        var hdjs = {
            //框架目录
            'base': '<?php echo __ROOT__?>/node_modules/hdjs',
            //上传文件后台地址
            'uploader': '?s=component/upload/uploader',
            //获取文件列表的后台地址
            'filesLists': '?s=component/upload/filesLists',
        };
    </script>
    <script src="<?php echo __ROOT__?>/node_modules/hdjs/app/util.js"></script>
    <script src="<?php echo __ROOT__?>/node_modules/hdjs/require.js"></script>
    <script src="<?php echo __ROOT__?>/node_modules/hdjs/config.js"></script>

    <link href="<?php echo __ROOT__?>/resource/css/hdcms.css" rel="stylesheet">

</head>
<body class="site">
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="<?php echo __ROOT__?>" target="_blank">
                            <i class="fa fa-reply-all"></i> 返回首页
                        </a>
                    </li>

                    <li class="top_menu active">
                        <a href="?s=site/entry/home&siteid=11&mark=platform" class="quickMenuLink">
                            <i class="'fa-w fa fa-comments-o"></i> 文章管理 </a>
                    </li>
                    <li class="top_menu">
                        <a href="?s=site/entry/home&siteid=11&mark=platform" class="quickMenuLink">
                            <i class="'fa-w fa fa-comments-o"></i> 微信管理 </a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            <?php echo Session::get('user.username')?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo u('user.changePassword')?>">修改密码</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo u('user.logout')?>">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="search-menu">
            </div>
            <!--扩展模块动作 start-->
            <div class="panel panel-default">
                <!--系统菜单-->


                <div class="panel-heading">
                    <h4 class="panel-title">栏目管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="3">
                        <a href="<?php echo u('category.lists')?>">栏目列表</a>
                    </li>
                    <li class="list-group-item" id="30">
                        <a href="<?php echo u('category/post')?>">栏目添加</a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">文章管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="3">
                        <a href="<?php echo u('article.lists')?>">文章列表</a>
                    </li>
                    <li class="list-group-item" id="30">
                        <a href="<?php echo u('article/post')?>">文章添加</a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">系统管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="3">
                        <a href="<?php echo u('config.setting')?>">网站配置</a>
                    </li>
                    <li class="list-group-item" id="3">
                        <a href="<?php echo u('user.changePassword')?>">修改密码</a>
                    </li>
                </ul>


                <!----------返回模块列表 start------------>
                <!--模块列表-->
                <!--模块列表 end-->
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
	<!-- TAB NAVIGATION -->
	<ul class="nav nav-tabs" role="tablist">
		<li class=""><a href="<?php echo u('lists')?>">栏目列表</a></li>
		<li class="active"><a href="<?php echo u('post')?>">保存栏目</a></li>
	</ul>
	<form action="" method="post">
<input type='hidden' name='csrf_token' value=''/>

        <div class="form-group">
            <label>所属栏目</label>
            <select name="pid" class="form-control">
                <option value="0">顶级栏目</option>
                <?php if(is_array($catData) || is_object($catData)){foreach ($catData as $v){?>
                    <option value="<?php echo $v['cid']?>" <?php echo $v['_disabled']?>  <?php if($model['pid'] == $v['cid']){?>
                selected
               <?php }?> ><?php echo $v['_catname']?></option>
                <?php }}?>
            </select>
        </div>
		<div class="form-group">
			<label>栏目名称</label>
			<input type="text" class="form-control" name="catname" value="<?php echo $model['catname']?>">
		</div>
        <div class="form-group">
            <label for="">缩略图</label>
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" name="thumb" readonly="" value="<?php echo $model['thumb']?>">
                    <div class="input-group-btn">
                        <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                    </div>
                </div>
                <div class="input-group" style="margin-top:5px;">
<!--                    default_pic是自定义函数，在哪里呢？自己找！-->
                    <img src="<?php echo default_pic($model['thumb'])?>" class="img-responsive img-thumbnail" width="150">
                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                </div>
            </div>
            <script>
                //上传图片
                function upImage(obj) {
                    require(['util'], function (util) {
                        options = {
                            multiple: false,//是否允许多图上传
                            //data是向后台服务器提交的POST数据
                            data:{name:'后盾人',year:2099},
                        };
                        util.image(function (images) {          //上传成功的图片，数组类型

                            $("[name='thumb']").val(images[0]);
                            $(".img-thumbnail").attr('src', images[0]);
                        }, options)
                    });
                }

                //移除图片
                function removeImg(obj) {
                    $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                    $(obj).parent().prev().find('input').val('');
                }
            </script>
        </div>

		<div class="form-group">
			<label for="exampleInputFile">栏目描述</label>
			<textarea name="description" class="form-control" cols="30" rows="5"><?php echo $model['description']?></textarea>
			<p class="help-block">栏目描述用于列表页的meta描述标签的内容，或者作为栏目的页面的一个描述</p>
		</div>
		<div class="form-group">
			<label for="">栏目跳转地址</label>
			<input type="text" name="linkurl" class="form-control" value="<?php echo $model['linkurl']?>">
		</div>
		<div class="form-group">
			<label for="">排序</label>
			<input type="number" name="orderby" class="form-control" value="<?php echo $model['orderby']?>">
		</div>

		<button type="submit" class="btn btn-primary">保存</button>
	</form>

        </div>

    </div>

</div>
<div class="master-footer">
    <a href="http://www.houdunwang.com">猎人训练</a>
    <a href="http://www.hdphp.com">开源框架</a>
    <a href="http://bbs.houdunwang.com">后盾论坛</a>
    <br>
    Powered by hdcms v2.0 © 2014-2019 cms.nickblog.cn runtime: 0.08
</div>

<script>
    require(['bootstrap']);
</script>
<!--右键菜单添加到快捷导航-->
<div id="context-menu">
    <ul class="dropdown-menu" role="menu">
        <li><a tabindex="-1" href="#">添加到快捷菜单</a></li>
    </ul>
</div>
<!--右键菜单删除快捷导航-->
<div id="context-menu-del">
    <ul class="dropdown-menu" role="menu">
        <li><a tabindex="-1" href="#">删除菜单</a></li>
    </ul>
</div>
<!--底部快捷菜单导航-->
<script src="http://www.houdunwang.com/resource/js/menu.js"></script>
<script src="http://www.houdunwang.com/resource/js/quick_navigate.js"></script>

</body>
</html>

<style>
    table {
        table-layout: fixed;
    }
</style>


