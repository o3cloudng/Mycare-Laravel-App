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

	<link href="css/style/style.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" style="border: 1px solid #efefef; box-shadow: 1px 2px 5px #eee;">
  <div class="container">
  <a href="/"><img style="width: 80px; height:40px;" src="{{ asset('img/logo.jpeg') }}" /></a>
    <span style="color: black;">Hi Guest</span>
  <div>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item"></li>
      <li class="nav-item"></li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="/" class="btn btn-success btn-large activate"> Subscription expired?</a>
    </form>
  </div>
  </div>
</nav>
<div id="main" class="mt-1 d-flex flex-column h-100">
        <div class="container mt-5">
        	<div id="login">
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
					<form action="{{ url('phonesignin') }}" method="POST">
	                    {{csrf_field()}}
						<div class="divider">
							<span>Or</span>
						</div>
						<div class="form-group">
							<input type="number" value="{{ old('phone') }}" name="phone" class="form-control box_form" placeholder="Enter phone number" style="padding: 10px 20px !important;">
						</div>
						<div class="form-group text-center add_top_20">
							<input class="btn_1 medium btn btn2 button activeBPLink" style="padding: 10px 20px; !important" type="submit" value="Login">
						</div>
					</form>
						
				</div>
			</div>
			<!-- /login -->
                             
        </div>
        
      </section>
</div>

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