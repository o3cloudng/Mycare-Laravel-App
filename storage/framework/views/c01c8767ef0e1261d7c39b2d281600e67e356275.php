<?php $__env->startSection('title'); ?>
    404 Error
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('week'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
               <section>
                <div class="container">
                  <div class="row mt-5  justify-content-center">
                      <img src="<?php echo e(asset('/img/svg/error_page.svg')); ?>" />                    
                  </div>
                  <div class="row mx-auto">
                    <h3 class="align-items-center text-center" style="margin-left: 45% !important;">Oops!</h3>
                  </div>
                  <div class="row justify-content-center mx-auto">                    
                    <p>You are not Currently Subscribed to this Service, Click the Button below to subscribe now</p>
                  </div>
                  <div class="row mx-auto"> 
                    <a href="/activate" class="btn btn2 button shadow mr-2 activeBPLink mx-auto">Acitvate Account</a>
                  </div>
                  <div class="row justify-content-center"> 
                    <a href="javascript:history.back()" class="mt-1"><img style="width: 15px; height: 10px;" src="<?php echo e(asset('/img/back.png')); ?>" /> Back</a>
                  </div>

                </div>

                    
               </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->



<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>