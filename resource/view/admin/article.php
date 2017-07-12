<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>后盾网 - HDCMS开源免费内容管理系统</title>
    <meta name="csrf-token" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="{{__ROOT__}}/node_modules/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/node_modules/hdjs/css/font-awesome.min.css" rel="stylesheet">


    <script>
        //模块配置项
        var hdjs = {
            //框架目录
            'base': '{{__ROOT__}}/node_modules/hdjs',
            //上传文件后台地址
            'uploader': '?s=component/upload/uploader',
            //获取文件列表的后台地址
            'filesLists': '?s=component/upload/filesLists',
        };
    </script>
    <script src="{{__ROOT__}}/node_modules/hdjs/app/util.js"></script>
    <script src="{{__ROOT__}}/node_modules/hdjs/require.js"></script>
    <script src="{{__ROOT__}}/node_modules/hdjs/config.js"></script>

    <link href="{{__ROOT__}}/resource/css/hdcms.css" rel="stylesheet">

</head>
<body class="site">
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="{{__ROOT__}}" target="_blank">
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
                            {{Session::get('user.username')}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{u('user.changePassword')}}">修改密码</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="{{u('user.logout')}}">退出</a></li>
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
                        <a href="{{u('category.lists')}}">栏目列表</a>
                    </li>
                    <li class="list-group-item" id="30">
                        <a href="{{u('category/post')}}">栏目添加</a>
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
                        <a href="{{u('article.lists')}}">文章列表</a>
                    </li>
                    <li class="list-group-item" id="30">
                        <a href="{{u('article/post')}}">文章添加</a>
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
                        <a href="{{u('config.setting')}}">网站配置</a>
                    </li>
                    <li class="list-group-item" id="3">
                        <a href="{{u('user.changePassword')}}">修改密码</a>
                    </li>
                </ul>


                <!----------返回模块列表 start------------>
                <!--模块列表-->
                <!--模块列表 end-->
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            <blade name="content"/>
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