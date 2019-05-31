<?php $__env->startSection('title'); ?>
    MYBUMP
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
          <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>
        <!-- /.container-fluid-->
  <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> <h2><?php echo e($blog->title); ?><small> &nbsp;<?php echo e($blog->slug); ?> </small></h2></div>
                  <div class="card-body">
                      <p><?php echo e($blog->content); ?></p>
                  </div>
                  <div class="card-footer small text-muted">Blood Pressure</div>
                </div>
                 <!-- /tables-->
              </div>
          </div>
  </div>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>