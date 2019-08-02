<?php $__env->startSection('title'); ?>
    Blood Glucose
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <!-- <i class="fa fa-user"></i> --> Medical Record 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">         
          <!-- /Blood Pressure -->
          <div class="box_general padding_bottom">
            <div class="row">
                <h4 class="heading shadow-sm">Blood Glucose</h4>
            </div>
            <div class="card">
               <!--  <div class="card-header"><i class="fa fa-table"></i> Blood Glucose</div> -->
                <div class="card-body">
                    <div class="row">
                <div class="col-md-8">
                    <table class="table table-condensed table-bordered" id="bloodGlucoseTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Blood Glucose</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Blood Glucose</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $bgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($bg->bg); ?></td>
                                <td><?php echo e(\App\Http\Utility::dateToWords($bg->created_at)); ?></td>
                                <!-- <td><button data-id="<?php echo e($bg->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-bg"></button> -->
                                   <td> <a href="editBG/<?php echo e($bg->id); ?>" class="btn btn-sm bg-white edit-bg"><i class="fa fa-pencil"></i></a>
                                    <a href="deleteBG/<?php echo e($bg->id); ?>" class="btn btn-sm bg-white del-bg delete"><i class="fa fa-trash"></i></a>
                                    <!-- <button data-id="<?php echo e($bg->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bg"></button></td> -->
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-md-4">
                    <h5 class="">Add Blood Glucose</h5>
                    <?php if($errors->add_bg->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->add_bg->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('addBG')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Blood Glucose</label>
                            <input class="form-control shadow" value="<?php echo e(old('bp')); ?>" name="bp" type="number" placeholder="Blood Glucose">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_1 gray approve btn btn2 button shadow activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
                </div>
                <!-- <div class="card-footer"></div> -->
            </div>
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>