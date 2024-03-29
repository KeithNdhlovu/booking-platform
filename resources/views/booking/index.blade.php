<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<title>{{ config('app.name', Lang::get('titles.app')) }}</title>

	<!-- endinject -->
	<link rel="shortcut icon" href="favicon.png">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('landing/css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-xs-4"></div>
					@if ($errors->any())
						<div class="col-xs-7 col-xs-offset-1">
							<div class="form-group">
								@foreach ($errors->all() as $error)
									<span class="help-block">
										<label style="color: #ee6527;" class="error">{{ $error }}</label>
									</span>
								@endforeach
							</div>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="booking-cta">
							<h1>Book your flight today</h1>
							<p>Check the availability of your flights, by provinding us with your trip information, otherwise go back by clicking the home button.</p>
							<div class="form-btn">
								<button id="back-button" class="home-btn">Home</button>
							</div>
						</div>
					</div>
					<div class="col-xs-7 col-xs-offset-1">
						<div class="booking-form">
							{!! Form::open(['route' => 'availability', 'novalidate'=>'novalidate', 'id'=>'availability', 'role' => 'form', 'method' => 'POST'] ) !!}
								<div class="form-group">
									<div class="form-checkbox">
										<label for="roundtrip">
											<input type="radio" id="roundtrip" name="tripType" value="return">
											<span></span>Return
										</label>
										<label for="one-way">
											<input type="radio" id="one-way" name="tripType" value="oneway">
											<span></span>One way
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flying from</span>
											<select name="origin" class="form-control">
												<option value="">---</option>
												@foreach($airports as $airport)
													<option value="{{ $airport->code }}">({{ $airport->code }})&nbsp;{{ $airport->name }}</option>
												@endforeach
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flying to</span>
											<select name="destination" class="form-control">
												<option value="">---</option>
												@foreach($airports as $airport)
													<option value="{{ $airport->code }}">({{ $airport->code }})&nbsp;{{ $airport->name }}</option>
												@endforeach
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Departing</span>
											<input name="depart_date" class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Returning</span>
											<input name="return_date" class="form-control" type="date" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Adults (18+)</span>
											<select name="adult_count" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Children (0-17)</span>
											<select name="children_count" class="form-control">
												<option>0</option>
												<option>1</option>
												<option>2</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn">Show flights</button>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var button = document.getElementById("back-button")
		button.addEventListener('click', function() {
			window.location.href = "{{ url('/') }}";
		})
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>