<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> - MyCarePlus</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">


    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style/bootstrap-select.min.css">
   
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/style/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('sticky-footer-navbar.css')); ?>" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">


    <script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php echo $__env->yieldContent('script'); ?>
     <!-- Javascript Custom Functions-->
     <script type="module" src="<?php echo e(asset('admin/js/functions.js')); ?>"></script>
  </head>
  <body class="d-flex flex-column h-100">
<div class="container-fliud h-100">
    <div class="row">
      <!-- WEB NAVIGATION CODE -->
        <div class="col-md-2 h-100 sticky-top hidden-md-down" id="sidebar">
            <div class="text-center">
                <a href="/subscription"><img class="img-rounded rounded mt-4" style="width: 200px; margin-left: -20px !important;" src="<?php echo e(asset('img/svg/logo.svg')); ?>" /></a>
                <br>
                <a href="/personal_profile">
                  <a href="/personal_profile">
                  <?php if(isset($subscriber->avatar)): ?>
                  <img src="<?php echo e(asset('/storage/')); ?>/<?php echo e($subscriber->avatar); ?> " class="m-1 w-75 h-75 mt-4 profile1" style="margin-left: -15px !important;" />
                  <!-- <img src="/storage/<?php echo e($subscriber->avatar); ?>" class="m-1 w-75 h-75 mt-4 profile1" style="margin-left: -15px !important;" /> -->
                  <!-- <img class="img-thumbnail" src="<?php echo e(asset('/storage/'.$subscriber->avatar)); ?>" /> -->
                  <?php else: ?>
                  <img class="m-1 w-75 h-75 mt-4 profile1" src="<?php echo e(asset('img/avatar.png')); ?>" style="margin-left: -15px !important;" />
                  <?php endif; ?>
                  <br/><br/>
                  <!-- <span>Profile</span> -->
                </a>
                <div class="text-left ml-2">
                    <a href="/dashboard" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/dashboard.svg')); ?>" class="menu_icon" /> Dashboard</a>
                    <!-- <a href="/records" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/medical_records.svg')); ?>" class="menu_icon" /> Records</a> -->
                    <a href="/med_records" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/medical_records.svg')); ?>" class="menu_icon" /> Medical Records</a>
                    <a href="/contact-team" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/contact_team.svg')); ?>" class="menu_icon" /> Contact Team</a>
                    <a href="/medical_personel" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/medical_personel.svg')); ?>" class="menu_icon" /> Medical Personal</a>
                    <a href="medications" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/medication.svg')); ?>" class="menu_icon" /> Medication</a>
                    <a href="/goals" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/goals.svg')); ?>" class="menu_icon" /> Goal</a>
                    <a href="/subscriptions" class="list-group-item"><img src="<?php echo e(asset('img/svg/icons/subscription.svg')); ?>" class="menu_icon" /> Subscription</a>
                </div>
            </div>
        </div>

        <!-- MOBILE NAVIGATION CODE -->
        <div class="col-md-10 w-100 cover-width" style="height:100%;">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark d-sm-block d-md-none">
              <!-- <a class="navbar-brand" href="/subscription">MYCAREPLUS</a> -->
              <a class="navbar-brand" href="/subscription"><img style="width: 70px; height:30px;" src="<?php echo e(asset('img/logo.jpeg')); ?>" /></a>
              <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button> -->
              <span class="align-items-center align-middle">Hi 
                                        <?php if($subscriber->name): ?>
                                           <?php echo e($subscriber->name); ?>

                                        <?php else: ?>
                                           <?php echo e($subscriber->phone); ?> 
                                        <?php endif; ?> ,</span>
                <i class="navbar-toggler-icon glyphicon glyphicon-align-right mr-3" data-toggle="collapse" data-target="#collapsibleNavbar"></i>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="/personal_profile" class="nav-link" style="margin-left: 5px;"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;&nbsp;Profile</a>
                  </li>
                  <li class="nav-item">
                    <a href="/dashboard" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/dashboard.svg')); ?>" class="menu_icon" /> Dashboard</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="/records" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/medical_records.svg')); ?>" class="menu_icon" /> Records</a>
                  </li> -->
                  <li class="nav-item">
                    <a href="/med_records" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/medical_records.svg')); ?>" class="menu_icon" /> Medical Records</a>
                  </li>
                  <li class="nav-item">
                    <a href="/contact-team" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/contact_team.svg')); ?>" class="menu_icon" /> Contact Team</a>
                  </li>
                  <li class="nav-item">
                    <a href="medical_personel" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/medical_personel.svg')); ?>" class="menu_icon" /> Medical Personal</a>
                  </li>
                  <li class="nav-item">
                    <a href="/medications" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/medication.svg')); ?>" class="menu_icon" /> Medication</a>
                  </li>
                  <li class="nav-item">
                    <a href="/goals" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/goals.svg')); ?>" class="menu_icon" /> Goal</a>
                  </li>
                  <li class="nav-item">
                    <a href="/subscriptions" class="nav-link"><img src="<?php echo e(asset('img/svg/icons/subscription.svg')); ?>" class="menu_icon" /> Subscription</a>
                  </li>
                  <li class="nav-item">
                    <!-- <a href="/subscriptions" class=""><img src="" class="menu_icon" /> Settings</a> -->
                    <a href="settings" class="nav-link" style="color: #F8A602;"><small id="settings"><img src="<?php echo e(asset('img/svg/icons/settings.svg')); ?>" id="cog" />  Settings</small></a>
                  </li>
                  <li class="nav-item">
                    <a href="/signout" class="nav-link" style="color: #F8A602;"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i> Logout</a>
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
                                      <span class="align-items-center">Hi
                                        <?php if($subscriber->name): ?>
                                           <?php echo e($subscriber->name); ?>

                                        <?php else: ?>
                                           <?php echo e($subscriber->phone); ?> 
                                        <?php endif; ?>                                    
                                          ,
                                        </span>
                                  </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 top-link">
                                    <a href="/blood_pressures" class="btn btn2 button shadow mr-2 activeBPLink">MYBP</a>
                                    <a href="/blood_glucoses" class="btn btn2 button shadow mr-2 activeBPLink">MYBG</a>
                                    <a href="/dasboard" class="btn btn2 button shadow activeBPLink">MYBUMP</a>

                                   <a href="/signout" class="float-right settings" style="color: #F8A602;"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>&nbsp;</a>
                                    <span class="float-right mr-4 logout"><a href="settings" style="color: #F8A602;"><small id="settings"><img src="img/svg/icons/settings.svg" id="cog" />  Settings</small></a></span>
                                    <!-- <a href="#" class="ml-5"><small id="settings"><i class=""></i> Bell</small></a></span> -->
                                </div>
                                <!-- <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4 text-right"><a href="#"><small id="settings"><img src="img/svg/icons/settings.svg" id="cog" />  Settings</small></a></</div> -->
                                </div>
                            </div>
                                <div class="container mt-4 mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-xs-12 col-sm-12 mx-auto col-md-4 h3 text-md-left text-sm-center">
                                          <?php echo $__env->yieldContent('header'); ?>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-8 mx-sm-auto px-auto">
                                                <?php echo $__env->yieldContent('week'); ?>
                                                <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <li class="pl-3"><a href="#">One Week</a></li>
                                                </ul> -->
                                            <!-- </span> -->
                                        </div>
                                    </div>
                                </div>
                            </section>
  <?php if(session('success')): ?>
  <script type="text/javascript">
      toastr.success("<?php echo e(session('success')); ?>");
  </script>
  <?php endif; ?>
  <?php if(session('error')): ?>
      <script type="text/javascript">
      toastr.error("<?php echo e(session('error')); ?>");
      </script>
  <?php endif; ?>
  <?php echo $__env->yieldContent('content'); ?>



 </div>
        </div>
    </div>
</div>
  <?php echo $__env->yieldContent('scripts'); ?>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="js/bootstrap-select.min.js"></script>



      <!-- Bootstrap core JavaScript-->
   
  <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
  <!-- Page level plugin JavaScript-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
  <script src="<?php echo e(asset('admin/vendor/datatables/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/jquery.selectbox-0.2.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/retina-replace.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
  <script src="<?php echo e(asset('admin/js/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/js/gauge.js')); ?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('admin/js/admin.js')); ?>"></script>
  <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <script src="<?php echo e(asset('/js/scripts.js')); ?>"></script>
    </body>
</html>