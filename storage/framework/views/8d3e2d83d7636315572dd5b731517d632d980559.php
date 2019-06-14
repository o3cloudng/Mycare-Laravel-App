<?php $__env->startSection('title'); ?>
    Medication
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo e(url('/')); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">New Medication </a>
            </li>
            
          </ol>
          <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-user"></i>Add Medication</h2>
                    <?php if($errors->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <form action="<?php echo e(url('/medications/new')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                <div class="row center-block">
                    <div class="col-md-12">
                        <div class="form-group ui-widget">
                            <label>Name</label>
                            <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" name="name" type="text" id="drug_name" placeholder="Adenoscan, Ernthyomacin">
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Dosage</label>
                        <input type="text" name="dosage" class="form-control" value="<?php echo e(old('dosage')); ?>" placeholder="5 mg, 200IU">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Frequency(per day)</label>
                        <input type="text" name="frequency" class="form-control" value="<?php echo e(old('frequency')); ?>" placeholder="2 times a day...">                  
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Who prescribed it</label>
                        <input type="text" name="medical_personal"  class="form-control" value="<?php echo e(old('medical_personal')); ?>" placeholder="Dr. Victor ...">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Phone Number of Personal that prescribed the Medication</label>
                        <input type="number" name="medical_personal_phone"  class="form-control" value="<?php echo e(old('medical_personal_phone')); ?>" placeholder="+234812345678 ...">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="start_date">Start Date</label>
                        <input name="start_date" type="date" class="form-control" value="<?php echo e(old('start_date')); ?>">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="start_date">End Date</label>
                        <input name="end_date" type="date" class="form-control" value="<?php echo e(old('end_date')); ?>">
                    </div>
                    <br>
                    <button type="submit" class="btn_1 approve">Add New Medication</button>
                </div>
            </form> 
          </div>
          <!-- /row-->
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>