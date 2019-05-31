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

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">
      <img src="{{ asset('img/logo.jpeg') }}" data-retina="true" alt="" width="163" height="36">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link" href="/personal_profile">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Personal Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Medical Records">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMedicalRecords" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-user-md"></i>
                <span class="nav-link-text">Medical Records</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMedicalRecords">
                <li><a href=" {{ url('blood_pressures') }} ">Blood Pressure</a></li>
                <li><a href=" {{ url('blood_glucoses') }} ">Blood Glucose</a></li>
                <li><a href=" {{ url('bmi') }} ">Body Mass Index</a></li>
                <li><a href=" {{ url('cholesterol') }} ">Cholesterol</a></li>
            </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="/contact-team">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Contact Team
            </span>
          </a>
        </li>
        {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="/care-team">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Care Team
            </span>
          </a>
        </li> --}}
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="/medical_personal">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Medical Personal
            </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
            <a class="nav-link" href="/medications">
              <i class="fa fa-fw fa-calendar-check-o"></i>
              <span class="nav-link-text">Medication
              </span>
            </a>
          </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="/goals">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Goals
            </span>
          </a>
        </li>

        {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
          <a class="nav-link" href="{{ url('diagnosis') }}">
            <i class="fa fa-fw fa-medkit"></i>
            <span class="nav-link-text">All Diagnosis</span>
          </a>
        </li>
         --}}
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
          <a class="nav-link" href="/subscriptions">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Subscription</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
<!-- TOP NAV MENU -->
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-fw fa-bell-slash"></i>
                <span class="nav-link-text">Age: {{ !empty($subscriber->age) ? $subscriber->age : 'N/A'}}</span>
              </a>
        </li> --> 
        <li class="nav-item" title="My Settings">
            <a class="nav-link ">
              <span class="nav-link-text">Welcome {{ Auth::user()->name }}</span>
            </a>
          </li>
          <li class="nav-item" title="My Settings">
            <a class="nav-link "  href="/settings">
              <i class="fa fa-fw fa-cogs"></i>
              <span class="nav-link-text">Settings</span>
            </a>
          </li> 
          <style>
            .notification {
              /*background-color: #555;
              color: white;
              text-decoration: none;
              padding: 15px 26px;
              position: relative;
              display: inline-block;
              border-radius: 2px;*/
            }

            .notification .badge {
              position: absolute;
              top: -10px;
              right: -10px;
              padding: 5px 10px;
              border-radius: 50%;
              background-color: red;
              color: white;
            }
          </style>      
       
        <li class="nav-item" >
            <a class="nav-link" href="/notifications" class="notification">
                <span class="rounded-circle" style="border: 1px solid #ccc; padding:3px 3px;">
                  <i class="fa fa-fw fa-bell-slash"></i>
                </span>
                <!-- <span class="nav-link-text">Notification</span> -->
                <span class="badge rounded-circle" style="padding: 3px; position: relative;top: -15px; right: 4px;background: red;color: white; border: 1px solid red;">3</span>
              </a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="/personal_profile">
                  <span class="nav-link-text"><img class="img-responsive rounded-circle" style="width: 25px;margin-top: 0px;padding-bottom: 0px; background: white;" src="{{ isset($subscriber->avatar) ? asset('/img/'.$subscriber->avatar): asset('/img/avatar.png') }}" /></span>
                </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#"
                onclick="event.preventDefault();
                              document.getElementById('signout-form').submit();" class="nav-link logout"> 
              <span class="d-none d-sm-inline-block"></span>
              <i class="fa fa-fw fa-sign-out"></i>{{ __('') }}
          </a>
        </li>
        <form id="signout-form" action="{{ route('subscriberLogout') }}" method="POST" style="display: none;">
            {{-- @csrf --}}
            {{ csrf_field() }}
        </form>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->
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
  <script src="{{asset('admin/js/aos.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/admin.js')}}"></script>
  <script>
    AOS.init({
      duration: 400
    });
  </script>

 
  
  @yield('scripts')
</body>

</html>