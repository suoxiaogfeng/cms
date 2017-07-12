<extend file='resource/view/admin/article'/>
<block name="content">
	<!-- TAB NAVIGATION -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#">网站配置</a></li>
	</ul>
	<form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">站点配置</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>网站名称(webname)</label>
                    <input type="text" class="form-control" name="webname" value="{{$model['webname']}}">
                    <span class="help-block">用{ {v('config.webname')} }来调用</span>

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">网站关键字</label>
                    <textarea name="keywords" class="form-control" cols="30" rows="5">{{$model['keywords']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">网站描述</label>
                    <textarea name="description" class="form-control" cols="30" rows="5">{{$model['description']}}</textarea>
                    <p class="help-block">栏目描述用于列表页的meta描述标签的内容，或者作为栏目的页面的一个描述</p>
                </div>
                <div class="form-group">
                    <label>icp备案号</label>
                    <input type="text" class="form-control" name="icp" value="{{$model['icp']}}">
                </div>
                <div class="form-group">
                    <label>客服电话</label>
                    <input type="text" class="form-control" name="phone" value="{{$model['phone']}}">
                </div>
                <div class="form-group">
                    <label>微信公众号</label>
                    <input type="text" class="form-control" name="wechat" value="{{$model['wechat']}}">
                </div>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">文章配置</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>分页条数</label>
                    <input type="number" class="form-control" name="rows" value="{{$model['rows']}}">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">保存</button>
	</form>
</block>

