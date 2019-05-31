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
	<link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/menu.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/vendors.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/icon_fonts/css/all_icons_min.css')); ?>" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

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
				padding-top: 1px !important;
				padding-bottom: 10px !important;
				margin: -5px auto !important;
			}
		</style>

		<main>
			<div class="bg_color_2">
				<div class="container margin_60_35">
					<div id="login">
						<!-- <h1>Register</h1> -->
						<div class="container margin_60_35 col-md-offset-4 text-center"><img src="<?php echo e(asset('img/logo.jpeg')); ?>" width="150px" class="img-responsive  my-0"></div>
						<div class="box_form my-0">
                            <?php if($errors->all()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                              </div>
                            <?php endif; ?>
							<?php if(session('success')): ?>
								<script type="text/javascript">
									toastr.success("<?php echo e(session('status')); ?>");
								</script>
							<?php endif; ?>
							<form action="signup" method="post">
                                <?php echo e(csrf_field()); ?>

								<div class="divider">
									<span>Or</span>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input name="name" value="<?php echo e(old('name')); ?>" type="text" class="form-control" placeholder="Name">
									</div>
                                    <div class="form-group col-md-12">
                                        <input name="email" value="<?php echo e(old('email')); ?>" type="text" class="form-control" placeholder="Email Address">
									</div>
									<div class="row">
										<div class="form-group col-6">
											<input name="phone" value="<?php echo e(old('phone')); ?>" type="text" class="form-control" placeholder="Phone">
										</div>
										<div class="form-group col-6">
											<select name="user_role" class="form-control">
												<option value="subscriber">Subscriber</option>
												<option value="doctor">Doctor</option>
												<option value="Nutritionist">Nutritionist</option>
												<option value="health_coach">Health Coach</option>
												<option value="physical_trainer">Physical Trainer</option>
											</select>
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
	<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common_scripts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/functions.js')); ?>"></script>



</body>

</html>