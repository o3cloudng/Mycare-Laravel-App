<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .check
{
  opacity:0.5;
  color:#996;
}
.img-check:hover {
  cursor: pointer;
}
.hidden {
  visibility: hidden;
}
</style>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Nutritionist Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="box_general padding_bottom" data-aos="fade-right">
          <div class="row">
            <h1>Nutritionist Dashboard</h1>
            <!-- <div class="col-xl-6 col-sm-6 mb-6">
              <h6 style="color: #eb6b2c !important;" class="text-center">Current Body Mass Index (BMI)</h6>
                
                  <p class="text-center"><a href="<?php echo e(url("bmi")); ?>" class="btn_1 gray approve">View History</a></p>
            </div> -->
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                        <i class="fa fa-fw fa-caret-up"></i>
                     
                  </div>
                  <div class="mr-5">
                    <h5>Blood Pressure </h5>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /cards -->

        <!-- /.container-fluid-->
  </div>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>