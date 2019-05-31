<?php



?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>MyCarePlus Forgot Password</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->

	<div id="page">
		
		<!-- /header -->

		<main>
			<div class="bg_color_2">
				<div class="container margin_60_35">
					<div id="login">
						<div class="container margin_60_35 col-md-offset-4 text-center"><img src="{{asset('img/logo.jpeg')}}" width="100px" class="img-responsive"></div>
							<div class="box_form">
								@if($errors->all())
									<div class="alert alert-danger">
										<ul class="list-group">
									@foreach($errors->all() as $error)
										<li class="list-group-item">{{$error}}</li>
									@endforeach
										</ul>
								</div>
								@endif
							
                            
								<form action="{{ url('reset_password/'.$token) }}" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name="email" type="email">
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input class="form-control" name="password" type="password">
									</div>
									<div class="form-group">
										<label>Confirm New Password</label>
										<input class="form-control" name="password_confirmation"  type="password">
									</div>
									<div class="form-group text-center add_top_20">
										<input class="btn_1 medium" type="submit" value="Update">
									</div>
								</form>
							</div>
						</div>
						
					</div>
					<!-- /login -->
				</div>
			</div>
		</main>
		<!-- /main -->

		
		<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS 
	<script data-cfasync="false" src="http://www.ansonika.com/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>-->
	<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>

</body>

</html>