<?php $__env->startSection('title'); ?>
    Edit Blood Pressure - Personal Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <i class="fa fa-user"></i> Edit Blood Pressure 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="container">
          <div class="box_general padding_bottom">
            <div class="row heading">
                <h5 class="text-center">Update Blood Pressure</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
            
                <div class="col-md-6">
                    <?php if($errors->update_bp->all()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->update_bp->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session('update-bp')): ?>
                        <div class="alert alert-success"><?php echo e(session('update-bp')); ?></div>
                    <?php endif; ?>
                    <form action="/updateBP" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Systolic</label>
                            <input class="form-control shadow" value="<?php echo e($bp->systolic); ?>" name="systolic" type="text">
                        </div>
                        <div class="form-group">
                            <label>Diastolic</label>
                            <input class="form-control shadow"  value="<?php echo e($bp->diastolic); ?>" name="diastolic" type="text">
                        </div>
                        <div class="form-group">
                            <label>Pulse</label>
                            <input class="form-control shadow"  value="<?php echo e($bp->pulse); ?>" name="pulse" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tel</label>
                            <input class="form-control shadow"  value="<?php echo e($bp->tel); ?>" name="tel" type="text">
                        </div>
                        <div class="form-group">
                            <label>IMESI</label>
                            <input class="form-control shadow" value="<?php echo e($bp->imei); ?>"  name="imei" type="text">
                        </div>
                        <div class="form-group">
                            <label>IMSI</label>
                            <input class="form-control shadow"  value="<?php echo e($bp->imsi); ?>" name="imsi" type="text">
                        </div>
                        <div class="form-group">
                            <label>ICCID</label>
                            <input class="form-control shadow" value="<?php echo e($bp->iccid); ?>" name="iccid" type="text">
                        </div>
                        <input class="form-control" value="<?php echo e($bp->id); ?>" name="id" type="hidden">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $('.del-diagnosis').click(function(){
        if(confirm("Do you want to delete this diagnosis ?")){
            location = 'deleteDiagnosis/'+$(this).data('id');
        }
    });

    $('.edit-diagnosis').click(function(){
        location = 'editDiagnosis/'+$(this).data('id');
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>