<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Victor Alagwu">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - MyCarePlus</title>

  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
  <!-- Your custom styles -->
  <link href="{{asset('admin/css/admin.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/aos.css')}}" rel="stylesheet">

  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  @yield('script')
   <!-- Javascript Custom Functions-->
   <script type="module" src="{{asset('admin/js/functions.js')}}"></script>

</head>

<body>

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
  @yield('content')

  <!-- /.container-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright &#169; MyCarePlus {{date('Y')}}</small>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
   
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.selectbox-0.2.js')}}"></script>
  <script src="{{asset('admin/vendor/retina-replace.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery.magnific-popup.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
  <script src="{{asset('admin/js/aos.js')}}"></script>
  <script src="{{asset('admin/js/gauge.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/admin.js')}}"></script>
  <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <script>
    AOS.init({
      duration: 400
    });
  </script>

 
  
  @yield('scripts')
</body>

</html>