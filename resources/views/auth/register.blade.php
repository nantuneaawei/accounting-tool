<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
        <title>註冊</title>
    </head>
<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>註冊</h1>
		</div>
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="Register_Email">信箱:</label>
				<input type="text" name="Register_Email" id="Register_Email" placeholder="請輸入信箱">
			</div>
			<div id="err_Email"></div>
			<div data-role="fieldcontain">
				<label for="Register_Password">密碼:</label>
				<input type="password" name="Register_Password" id="Register_Password" placeholder="字數4~8個字">
			</div>
			<div id="err_password"></div>
			<div data-role="fieldcontain">
				<label for="Register_pwd2">確認密碼:</label>
				<input type="password" name="Register_pwd2" id="Register_pwd2" placeholder="確認密碼">
			</div>
			<div id="err_pwd2"></div>
			<div data-role="fieldcontain">
				<label for="Register_Nickname">暱稱:</label>
				<input type="text" name="Register_Nickname" id="Register_Nickname" placeholder="請輸入暱稱">
			</div>
			<div id="err_Nickname"></div>

			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="a" data-icon="delete" onclick="history.back()">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" data-icon="check" id="register_ok">確認</a>
				</div>
			</div>

		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			
		</div>
	</div>
</body>
@vite('resources/js/auth/register.js')
</html>