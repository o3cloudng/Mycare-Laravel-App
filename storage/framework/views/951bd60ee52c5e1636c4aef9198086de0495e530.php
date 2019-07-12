<?php $__env->startSection('title'); ?>
    Edit Blood Glucose - Personal Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <i class="fa fa-user"></i> Edit Blood Glucose 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">  
    <div class="row heading">
        <h5 class="">Update Blood Glucose</h5>
    </div>         
            <div class="card">
                <div class="card-header">
                    Glucose
                </div>
                <div class="car-body">
                    <div class="row">
            
                <div class="col-md-6">
                        
                    
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
                                <label></label>
                                <input class="form-control shadow" value="<?php echo e($bg->bg); ?>" name="blood_glucose" type="text">
                            </div>
                            <input type="hidden" name="id" value="<?php echo e($bg->id); ?>">
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn2 shadow activeBPLink">Update</button>
                            </div>
                        </form>
                </div>
                
            </div>
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