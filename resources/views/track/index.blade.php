<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
	<title>首頁</title>
</head>

<body>
	<div data-role="page" id="home">
		@include('layouts.tracknav')
		@include('layouts.outlist')
		<div class="container">
			<div class="row my-5">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div>
								<h1>新增支出</h1>
								<div data-role="fieldcontain">
									<fieldset data-role="controlgroup" data-type="horizontal">
										<legend>類型:</legend>
										<input type="radio" name="items" id="itemsf" value="飲食">
										<label for="itemsf">飲食</label>
										<input type="radio" name="items" id="itemsp" value="娛樂">
										<label for="itemsp">娛樂</label>
										<input type="radio" name="items" id="itemsh" value="醫療">
										<label for="itemsh">醫療</label>
										<input type="radio" name="items" id="itemst" value="交通">
										<label for="itemst">交通</label>
									</fieldset>
								</div>
								<div class="form-group" data-role="fieldcontain">
									<label for="money">金額:</label>
									<input type="text" name="money" id="money">
								</div>
								<div class="form-group" data-role="fieldcontain">
									<label for="date">日期:</label>
									<input type="date" name="date" id="date">
								</div>
								<button type="button" class="btn btn-primary" id="ok_btn">確認</button>
								<button type="button" class="btn btn-outline-primary" id="out">取消</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@vite('resources/js/tools/out.js')
</body>


</html>
