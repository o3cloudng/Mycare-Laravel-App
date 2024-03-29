<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>MyCarePlus signin</title>

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
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">

	<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- YOUR CUSTOM CSS -->
	<link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->

	<div id="page">
		
		<!-- /header -->
		<style>
			.margin_60_35 {
				padding: 8px !important;
			}
		</style>

		<main>
			<div class="bg_color_2">
				<div class="container margin_60_35">
					<div id="login">
						<div class="container margin_60_35 col-md-offset-4 text-center"><img src="{{asset('img/logo.jpeg')}}" width="150px" class="img-responsive"></div>
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
							@if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
							@endif
							@if(session('success'))
								<script type="text/javascript">
									toastr.success("{{ session('success') }}");
								</script>
							@endif
							@if(session('error'))
								<script type="text/javascript">
									toastr.error("{{ session('error') }}");
								</script>
							@endif
							<form action="{{ url('signin') }}" method="POST">
                                {{csrf_field()}}
								<div class="divider">
									<span>Or</span>
								</div>
								<div class="form-group">
									<input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email/Phone">
								</div>
								<div class="form-group">
									<input type="password" value="" name="password" class="form-control" placeholder="Password">
								</div>
								<div class="row">
									<div class="col-md-5">
										<a href="{{ url('/verifyEmailPage') }}" class="text-left">
											<small class="text-left">Forgot password?</small>
										</a>
									</div>
									<div class="col-md-7">
										<a href="{{ route('login') }}" class="text-right">
											<small class="text-right">Login as a Medical Personnal</small>
										</a>
									</div>
								</div>
								<div class="form-group text-center add_top_20">
									<input class="btn_1 medium" type="submit" value="Login">
								</div>
							</form>
								
						</div>
						<p class="text-center link_bright">Do not have an account yet?
							<a href="signup">
								<strong>Register now!</strong>
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


  <!-- Bootstrap core JavaScript-->
   
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Page level plugin JavaScript-->
  {{-- <script src="{{asset('admin/vendor/chart.js/Chart.js')}}"></script> --}}
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.selectbox-0.2.js')}}"></script>
  <script src="{{asset('admin/vendor/retina-replace.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.magnific-popup.min.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/admin.js')}}"></script>
  <!-- Custom scripts for this page-->
  <script src="{{asset('admin/js/admin-charts.js')}}"></script>

  <!-- Javascript Functions-->
  <script src="{{asset('admin/js/functions.js')}}"></script>
	<!-- COMMON SCRIPTS -->
	
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>

</body>

</html>