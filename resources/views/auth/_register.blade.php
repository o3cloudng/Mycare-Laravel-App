<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>MyCarePlus Signup</title>

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
						<h1>Register</h1>
						<div class="box_form">
                            @if($errors->all())
                                <div class="alert alert-danger">
                                    <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                    </ul>
                              </div>
                            @endif
							@if(session('success'))
								<script type="text/javascript">
									toastr.success("{{ session('status') }}");
								</script>
							@endif
							<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
								<div class="divider">
									<span>Or</span>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Name">
									</div>
									<div class="row">
										<div class="form-group col-6">
											<input name="phone" value="{{old('phone')}}" type="text" class="form-control" placeholder="Phone">
										</div>
										<div class="form-group col-6">
											<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="Email Address">
										</div>
									</div>
                                    
                                   <div class="row">
									<div class="form-group col-6">
                                        <input name="password" type="password" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group col-6">
                                        <input name="confirm_password" type="password" class="form-control" placeholder="Confirm password">
                                    </div>
								   </div>
                                    
                                </div>
                               
								<div class="form-group text-center add_top_20">
									<input class="btn_1 medium" type="submit" value="Signup">
								</div>
							</form>
						</div>
						<p class="text-center link_bright">Already have an account?
							<a href="signin">
								<strong>Login</strong>
							</a>
						</p>
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
