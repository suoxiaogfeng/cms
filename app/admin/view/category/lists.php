<extend file='resource/view/admin/article'/>
<block name="content">

    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('lists')}}">栏目列表</a></li>
        <li><a href="{{u('post')}}">保存栏目</a></li>
    </ul>
    <!-- TAB CONTENT -->
    <div class="tab-content">
        <div class="active tab-pane fade in" id="tab1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="30">ID</th>
                    <th>名称</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                    <foreach from="$data" value="$v">
                        <tr>
                            <td>{{$v['cid']}}</td>
                            <td>{{$v['_catname']}}</td>
                            <td>
                                <a href="{{u('post',['cid'=>$v['cid']])}}" class="btn btn-primary btn-xs">编辑</a>
                                <a href="javascript:if(confirm('确定删除吗？')) location.href='{{u('remove',['cid'=>$v['cid']])}}';" class="btn btn-danger btn-xs">删除</a>
                            </td>
                        </tr>
                    </foreach>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="tab2">
            <h2>Tab2</h2>
            <p>Lorem ipsum.</p>
        </div>

    </div>

</block>

