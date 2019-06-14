<?php $__env->startSection('title'); ?>
    Edit Blood Glucose - Personal Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('medical-active'); ?>
black
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?php echo e(url('/blood_glucoses')); ?>">Blood Glucoses</a></li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Medical Records</h2>
            </div>
           
            <div class="row">
            
                <div class="col-md-6 col-md-offset-3">
                        
                    <h5 class="text-center">Update Blood Glucose</h5>
                    <?php if($errors->update_bg->all()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->update_bg->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session('update-bg')): ?>
                        <div class="alert alert-success"><?php echo e(session('update-bg')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('updateBG')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label>Glucose</label>
                                <input class="form-control" value="<?php echo e($bg->bg); ?>" name="blood_glucose" type="text">
                            </div>
                            <input type="hidden" name="id" value="<?php echo e($bg->id); ?>">
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                </div>
                
            </div>
            <hr>
            
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $('.del-diagnosis').click(function(){
        if(confirm("Do you want to delete this diagnosis ?")){
            location = 'deleteDiagnosis/'+$(this).data('id');
        }
    })
    $('.edit-diagnosis').click(function(){
        location = 'editDiagnosis/'+$(this).data('id');
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>