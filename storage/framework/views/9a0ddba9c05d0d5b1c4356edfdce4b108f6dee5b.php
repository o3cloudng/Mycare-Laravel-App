<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    Blood Glucose
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
               <section>
                    <div class="container">
                        <div class="row">
                          <div class="col-sm-12 col-xs -12 col-md-5 text-center m-3 ml-md-4 mybox shadow" id="mybox_gauge">
                                  <div class="row justify-content-center">
                                        
                                  </div>
                              </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-5 m-3 ml-md-4 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">

                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </section>
                  <section>
                      <div class="container">
                          <div class="row">
                              <div class="col-md-11 my-auto">
                                <div class="card shadow mt-4">

                                </div>
                              </div>
                          </div>
                      </div>
                  </section>
            </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->



<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>