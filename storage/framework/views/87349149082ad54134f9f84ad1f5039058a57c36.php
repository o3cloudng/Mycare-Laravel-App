<?php $__env->startSection('title'); ?>
    Welcome
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <?php echo $__env->make('layouts.service_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Icon Cards-->
        <div class="box_general padding_bottom">
          <div class="row my-auto">
               <div class="col-xl-3 col-sm-6 mb-3 offset-sm-1">
                  <div class="card dashboard text-white bg-default o-hidden h-100" >
                    <div class="card-body">
                      <div class="card-body-icon">
                        <i class="fa fa-heartbeat"></i>
                      </div>
                      <div class="mr-5" style="padding-bottom: -50px !important;">
                        <h5>MY BLOOD PRESSURE </h5>
                      </div>
                    </div>
                    <div class="card-footer">
                      <p class="text-white text-center">
                        My Blood Pressure (MYBP) <br/>
                        Monitor your blood pressure and avoid the risk of Hypertension
                      </p>
                    </div>
                    <div class="card-footer text-center">
                      <a href="mybp" class="btn btn-secondary"> Continue</a>
                    </div>
                  </div>
                </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card dashboard text-white bg-default o-hidden h-100" >
                    <div class="card-body">
                      <div class="card-body-icon">
                        <i class="fa fa-stethoscope"></i>
                      </div>
                      <div class="mr-5" style="padding-bottom: -50px !important;">
                        <h5>MY BLOOD GLUCOSE </h5>
                      </div>
                  <p class="text-center"></p>
                    </div>
                    <div class="card-footer">
                      <p class="text-white text-center">
                        My Blood Glucose (MYBG) <br/>
                        Monitor your blood glucose level and avoid the risk of Diabetes
                      </p>
                    </div>
                    <div class="card-footer text-center">
                      <a href="mybg" class="btn btn-secondary"> Continue</a>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-default o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <!-- <i class="fa fa-fw fa-heart"></i> -->
                    <i class="fa fa-heart"></i>
                </div>
                <div class="mr-5" style="padding-bottom: -50px !important;">
                  <h5>MYBUMP </h5>
                </div>              
              </div>
                <div class="card-footer">
                  <p class="text-white text-center">
                    My BUMP <br/>
                    Monitor your blood glucose level and avoid the risk of Diabetes
                  </p>
                </div>
                <div class="card-footer text-center">
                  <a href="mybump" class="btn btn-secondary align-center"> Continue</a>
                </div>
            </div>
          </div>

          </div>
 
          </div>
      </div>
    </div>
        <!-- /.container-fluid-->
  </div>

  <!-- Select services modal on page ready -->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addEmergencyLabel">Service subscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form action="<?php echo e(url('')); ?>" method="POST">  
                  <?php echo e(csrf_field()); ?>

              <div class="modal-body">
                <p class="text-center">Kindly subscribe to your prefered service</p>
                <div class="row">
                  <form method="get">
                  <div class="form-group d-flex">  
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBloodPressure.png')); ?>" />
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBloodGlucose.png')); ?>" />
                      <input type="checkbox" name="chk2" id="item4" value="val2" class="hidden" autocomplete="off">
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                    <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBUMP.png')); ?>" />
                    <input type="checkbox" name="chk3" id="item4" value="val3" class="hidden" autocomplete="off">
                  </label>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="modal-footer">
                  <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>

                  <input type="submit" value="Submit" class="btn_1 blue">
                  
                  </form>
              </div>
            </div>
          </form> 
      </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>