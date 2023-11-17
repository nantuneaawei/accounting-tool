<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
		@vite('resources/css/login.css')
        <title>登入</title>
    </head>
<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>登入</h1>
		</div>
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="Login_Email">信箱:</label>
				<input type="text" name="Login_Email" id="Login_Email" placeholder="字數4~8個字">
			</div>
			<div id="err_Email"></div>
			<div data-role="fieldcontain">
				<label for="Login_Password">密碼:</label>
				<input type="password" name="Login_Password" id="Login_Password" placeholder="字數4~8個字">
			</div>
			<div id="err_password"></div>
			<div data-role="fieldcontain">
				<label for="Login_pwd2">確認密碼:</label>
				<input type="password" name="Login_pwd2" id="Login_pwd2" placeholder="確認密碼">
			</div>
			<div id="err_pwd2"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="a" data-icon="plus" id="Login_Register">註冊</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" data-icon="check" id="Login_btn">登入</a>
				</div>
			</div>
			<!-- <div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6 text-right">
							<a href="" class="btn btn-link custom-right-button">忘記密碼</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<!-- 忘記密碼表單 -->
				</div>
			</div> -->
		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			
		</div>
	</div>
    @vite('resources/js/login.js')
</body>
</html>