<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
	<title>收入</title>
</head>

<body>
	<div data-role="page" id="home">
        @include('layouts.tracknav')
		@include('layouts.inlist')
		<div class="container">
			<div class="row my-5">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div>
								<h1>新增收入</h1>

								<div class="form-group" data-role="fieldcontain">
									<label for="money">金額:</label>
									<input type="text" name="money" id="money">
								</div>
								<div class="form-group" data-role="fieldcontain">
									<label for="date">日期:</label>
									<input type="date" name="date" id="date">
								</div>
								<button type="button" class="btn btn-primary" id="ok_btn">確認</button>
								<button type="button" class="btn btn-outline-primary" id="in">取消</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @vite('resources/js/tools/in.js')
</body>


</html>