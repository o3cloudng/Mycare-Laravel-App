<?php $__env->startSection('title'); ?>
    Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <i class="fa fa-user"></i> Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <div class="row">
                    <h4 class="heading">Settings</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h6 class="">Notifications Mycare plus only sends you important updates to help you advance</h6>
                    Emergency Contact: Notify when something goes wrong
                  
                </div>
                <div class="col-md-4">
                    <h6 class="text-left mb-3">Turn on/off the notifications below</h6>
                    <?php if($errors->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                    <?php endif; ?>
                        <div class="row">
                            <!-- <div class="form-group col-md-6">
                                <form action="enableNotification" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="enable_notification" value="1">
                                    <input type="submit" class="btn btn-primary" value="Enable">
                                </form>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <form action="disableNotification" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="enable_notification" value="0">
                                        <input type="submit" class="btn btn-danger" value="Disabled">
                                </form>
                            </div> -->
                            <div class="form-group col-md-6 text-center">
                                <form action="disableNotification" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                        <label class="switch">
                                          <input type="checkbox" checked name="toggle_settings" value="ON">
                                          <span class="slider round"></span>
                                        </label> <br/>
                                        <input type="submit" class="btn activeBPLink btn2 shadow" value="Enable">
                                </form>
                            </div>
                        </div>      
                    <!-- /row-->
            </div>
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>