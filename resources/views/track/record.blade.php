<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
	<title>財務分析</title>
</head>

<body>
	<div data-role="page" id="home">
        @include('layouts.tracknav')
		<div class="container">
			<div class="row down">
				<div class="col-md-4">
					<div class="card h-100" style="background-color: rgb(236, 55, 55);">
						<div class="card-body d-flex align-items-center">
							<i class="fa-solid fa-users fa-5x text-primary"></i>
							<div class="text-center w-100">
							<h3>總支出</h3>
							<h3>{{ $allout }}$</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card h-100" style="background-color: rgb(9, 243, 67);">
						<div class="card-body d-flex align-items-center">
							<i class="fa-solid fa-user-plus fa-5x text-danger"></i>
							<div class="text-center w-100">
							<h3>總收入</h3>
							<h3>{{ $allin }}$</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card h-100" style="background-color: rgb(12, 207, 233);">
						<div class="card-body d-flex align-items-center">
							<i class="fa-solid fa-eye fa-5x text-success"></i>
							<div class="text-center w-100">
							<h3>總金額</h3>
							<h3>{{ $total }}$</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.outlist')
		@include('layouts.inlist')
	</div>
</body>


</html>