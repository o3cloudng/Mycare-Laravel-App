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
	<link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/menu.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/vendors.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/icon_fonts/css/all_icons_min.css')); ?>" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">

	<script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">

	<link href="css/style/style.css" rel="stylesheet">

</head>

<body>

	<!-- <div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div> -->
	<!-- /Preload-->
<div id="main" class="mt-5 d-flex flex-column h-100">
    <section>
        <div class="container mt-md-5">
          <div class="row">
            <div class="col-md-4 ml-5 ml-sm-1"><a href="/"><img class="rounded mr-5" src="img/svg/logo.svg" /></a> <span>Hi Guest</span></div>
            <div class="col-md-3 mt-2 pull-right d-none d-sm-block"><small> Services </small></div>
            <div class="col-md-1 mt-1">
                <span class="pull-right">
                </span>
            </div>
            <div class="col-md-3 text-md-right text-center mt-2"><a href="/" class="btn btn-success btn-large shadow-sm"> Subscription expired?</a> </div>
          </div>
        </div>
      <section>
        <div class="container">
        	<div id="login">
				<div class="box_form">
	                <?php if($errors->all()): ?>
	                    <div class="alert alert-danger">
	                        <ul>
	                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <li><?php echo e($error); ?></li>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </ul>
	                  </div>
					<?php endif; ?>
					<?php if(session('status')): ?>
	                <div class="alert alert-success"><?php echo e(session('status')); ?></div>
					<?php endif; ?>
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
					<form action="<?php echo e(url('phonesignin')); ?>" method="POST">
	                    <?php echo e(csrf_field()); ?>

						<div class="divider">
							<span>Or</span>
						</div>
						<div class="form-group">
							<input type="number" value="<?php echo e(old('phone')); ?>" name="phone" class="form-control box_form" placeholder="Enter phone number" style="padding: 10px 20px !important;">
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
   
  <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
  <!-- Page level plugin JavaScript-->
  
  <script src="<?php echo e(asset('admin/vendor/datatables/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/jquery.selectbox-0.2.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/retina-replace.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/jquery.magnific-popup.min.js')); ?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('admin/js/admin.js')); ?>"></script>
  <!-- Custom scripts for this page-->
  <script src="<?php echo e(asset('admin/js/admin-charts.js')); ?>"></script>

  <!-- Javascript Functions-->
  <script src="<?php echo e(asset('admin/js/functions.js')); ?>"></script>
	<!-- COMMON SCRIPTS -->
	
	<script src="<?php echo e(asset('js/common_scripts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/functions.js')); ?>"></script>

</body>

</html>