<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - MyCarePlus</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">


    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style/bootstrap-select.min.css">
   
    <!-- Custom styles for this template -->
    <link href="css/style/style.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">


    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('script')
     <!-- Javascript Custom Functions-->
     <script type="module" src="{{asset('admin/js/functions.js')}}"></script>
  </head>
  <body class="d-flex flex-column h-100">
<div class="container-fliud h-100">
    <div class="row">
        <div class="col-md-2 h-100 sticky-top hidden-md-down" id="sidebar">
            <div class="text-center">
                <a href="/subscription"><img class="img-rounded rounded mt-4" src="img/svg/logo.svg" /></a>
                <br>
                <a href="/personal_profile"><img class="profile mt-3" src="img/profile.png" /></a><br/><br/>
                <span>Profile</span>
                <div class="text-left ml-2">
                    <a href="/dashboard" class="list-group-item"><img src="img/svg/icons/dashboard.svg" class="menu_icon" /> Dashboard</a>
                    <a href="/records" class="list-group-item"><img src="img/svg/icons/medical_records.svg" class="menu_icon" /> Medical Records</a>
                    <a href="/contact-team" class="list-group-item"><img src="img/svg/icons/contact_team.svg" class="menu_icon" /> Care Team</a>
                    <a href="/medical_personel" class="list-group-item"><img src="img/svg/icons/medical_personel.svg" class="menu_icon" /> Medical Personal</a>
                    <a href="medications" class="list-group-item"><img src="img/svg/icons/medication.svg" class="menu_icon" /> Medication</a>
                    <a href="/goals" class="list-group-item"><img src="img/svg/icons/goals.svg" class="menu_icon" /> Goal</a>
                    <a href="/subscriptions" class="list-group-item"><img src="img/svg/icons/subscription.svg" class="menu_icon" /> Subscription</a>
                </div>
            </div>
            <!-- <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p> -->
        </div>
        <div class="col-md-10 w-100" style="height:100%;">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark d-sm-block d-md-none">
              <!-- <a class="navbar-brand" href="/subscription">MYCAREPLUS</a> -->
              <a class="navbar-brand" href="/subscription"><img style="width: 70px; height:30px;" src="img/logo.jpeg" /></a>
              <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button> -->
              <span class="align-items-center align-middle">Hi +234 8045654325,</span>
                <i class="navbar-toggler-icon glyphicon glyphicon-align-right mr-3" data-toggle="collapse" data-target="#collapsibleNavbar"></i>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="/personal_profile">
                      <img class="profile mt-3 align-sm-center mx-auto" src="img/profile.png" /><br/><br/>
                      <span class="mx-auto align-sm-center">Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/dashboard" class="nav-link"><img src="img/svg/icons/dashboard.svg" class="menu_icon" /> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="/records" class="nav-link"><img src="img/svg/icons/medical_records.svg" class="menu_icon" /> Medical Records</a>
                  </li>
                  <li class="nav-item">
                    <a href="/contact-team" class="nav-link"><img src="img/svg/icons/contact_team.svg" class="menu_icon" /> Care Team</a>
                  </li>
                  <li class="nav-item">
                    <a href="medical_personel" class="nav-link"><img src="img/svg/icons/medical_personel.svg" class="menu_icon" /> Medical Personal</a>
                  </li>
                  <li class="nav-item">
                    <a href="/medications" class="nav-link"><img src="img/svg/icons/medication.svg" class="menu_icon" /> Medication</a>
                  </li>
                  <li class="nav-item">
                    <a href="/goals" class="nav-link"><img src="img/svg/icons/goals.svg" class="menu_icon" /> Goal</a>
                  </li>
                  <li class="nav-item">
                    <a href="/subscriptions" class="nav-link"><img src="img/svg/icons/subscription.svg" class="menu_icon" /> Subscription</a>
                  </li>

                </ul>
              </div>  
            </nav>
                <div id="mainOne" class="">
                        <section>
                            <div class="container mt-4">
                                <div class="row d-flex justify-content-center">
                                <div class="col-sm-12 col-md-4">
                                    <div class="row d-none d-xs-none d-md-block">
                                        <div class="col-6">
                                  <a id="mlogo" href="/subscription"><img class="w-50" src="img/logo.jpeg" /></a>  
                                  </div>
                                  <div class="col-6">
                                      <span class="align-items-center align-middle">Hi +234 8045654325,</span>
                                  </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <a href="/dashboard" class="btn btn2 button shadow mr-2 activeBPLink">MYBP</a>
                                    <a href="/mybg" class="btn btn2 button shadow mr-2 blue">MYBG</a>
                                    <a href="/mybump" class="btn btn2 button shadow mr-2 green">MYBUMP</a>

                                    <span class="float-right"><a href="#"><small id="settings"><img src="img/svg/icons/settings.svg" id="cog" />  Settings</small></a>
                                    <!-- <a href="#" class="ml-5"><small id="settings"><i class=""></i> Bell</small></a></span> -->
                                </div>
                                <!-- <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4 text-right"><a href="#"><small id="settings"><img src="img/svg/icons/settings.svg" id="cog" />  Settings</small></a></</div> -->
                                </div>
                            </div>
                                <div class="container mt-4 mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-xs-10 col-sm-10 mx-auto col-md-4 h3 text-md-left text-xs-center">
                                          @yield('header')
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-8 mx-auto px-auto">
                                                @yield('week')
                                                <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <li class="pl-3"><a href="#">One Week</a></li>
                                                </ul> -->
                                            <!-- </span> -->
                                        </div>
                                    </div>
                                </div>
                            </section>
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



 </div>
        </div>
    </div>
</div>
  @yield('script')
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="js/bootstrap-select.min.js"></script>



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
    </body>
</html>