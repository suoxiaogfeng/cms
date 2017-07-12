<extend file='resource/view/admin/article'/>
<block name="content">
	<!-- TAB NAVIGATION -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#">修改密码</a></li>
	</ul>
	<form onsubmit="post(event)">

		<div class="form-group">
			<label>用户名</label>
			<input type="text" class="form-control" disabled value="{{Session::get('user.username')}}" required>
		</div>

		<div class="form-group">
			<label for="exampleInputFile">旧密码</label>
            <input name="password" type="password" class="form-control" value="" required>

		</div>
        <div class="form-group">
            <label for="exampleInputFile">新密码</label>
            <input name="password1" type="password" class="form-control" value="" required>

        </div>
        <div class="form-group">
            <label for="exampleInputFile">确认密码</label>
            <input name="password2" type="password" class="form-control" value="" required>

        </div>


		<button type="submit" class="btn btn-primary">保存</button>
	</form>
    <script>
        function post(event) {
            event.preventDefault();
            require(['util'], function (util) {
                util.submit({
                    successUrl:"{{u('user.logout')}}"
                });
            });
        }
    </script>
</block>

