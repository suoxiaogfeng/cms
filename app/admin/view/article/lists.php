<extend file='resource/view/admin/article'/>
<block name="content">

    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li <if value="Request::get('recycle') == 0"> class="active" </if> ><a href="{{u('lists',['recycle'=>0])}}">文章列表</a></li>
        <li <if value="Request::get('recycle') == 1"> class="active" </if>><a href="{{u('lists',['recycle'=>1])}}">回收站</a></li>
        <li><a href="{{u('post')}}">保存文章</a></li>
    </ul>
    <!-- TAB CONTENT -->
    <div class="tab-content">
        <div class="active tab-pane fade in" id="tab1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="30">ID</th>
                    <th>标题</th>
                    <th>阅读量</th>
                    <th>所属栏目</th>
                    <th>排序值</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                    <foreach from="$data" value="$v">
                        <tr>
                            <td>{{$v['aid']}}</td>
                            <td>{{$v['title']}}</td>
                            <td>{{$v['click']}}</td>
                            <td>{{$v['category_cid']}}</td>
                            <td>{{$v['orderby']}}</td>
                            <td>
                                <if value="Request::get('recycle') == 0">
                                    <a href="{{u('post',['aid'=>$v['aid']])}}" class="btn btn-primary btn-xs">编辑</a>
                                    <a href="{{u('remove',['aid'=>$v['aid']])}}" class="btn btn-danger btn-xs">删除</a>
                                    <else/>
                                    <a href="{{u('recover',['aid'=>$v['aid']])}}" class="btn btn-warning btn-xs">还原</a>
                                    <a href="javascript:if(confirm('确定删除吗？')) location.href='{{u('realRemove',['aid'=>$v['aid']])}}';" class="btn btn-danger btn-xs">删除</a>

                                </if>

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

