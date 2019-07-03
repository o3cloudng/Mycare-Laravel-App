<?php $__env->startSection('title'); ?>
    Records
<?php $__env->stopSection(); ?>

<?php $__env->startSection('record-active'); ?>
black
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2><i class="fa fa-user"></i> Medical Data</h2>
                <div class="text-right">
                    <button type="button" class="btn btn2 button shadow mx-auto activeBPLink" data-toggle="modal" data-target="#addBloodPressure">
                        Add New Blood Pressure
                    </button>
                </div>
                <?php if(session('success')): ?>
                    <script type="text/javascript">
                        toastr.success("<?php echo e(session('success')); ?>");
                    </script>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <script type="text/javascript">
                        toastr.error("<?php echo e(session('error')); ?>");
                    </script>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Blood Pressure Records</h5>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Systolic</th>
                                <th>Diastolic</th>
                                <th>Pulse</th>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>Tel</th>
                                <th>ICCID</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php if($bps->count()>0): ?>
                            <?php $__currentLoopData = $bps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><?php echo e($bp->systolic); ?></td>
                                    <td><?php echo e($bp->diastolic); ?></td>
                                    <td><?php echo e($bp->pulse); ?></td>
                                    <td><?php echo e($bp->imei); ?></td>
                                    <td><?php echo e($bp->imsi); ?></td>
                                    <td><?php echo e($bp->tel); ?></td>
                                    <td><?php echo e($bp->iccid); ?></td>
                                    <td><?php echo e(\App\Http\Utility::dateToWords($bp->created_at)); ?></td>
                                    <td><button data-id="<?php echo e($bp->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-bp" onclick=""></button>
                                        <button data-id="<?php echo e($bp->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bp"></button></td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning">There are no Blood Pressure readings</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
               
            </div>
          </div>
          <!-- /box_general-->
          <!-- Blood Pressure -->
          <div class="modal fade" id="addBloodPressure" tabindex="-1" role="dialog" aria-labelledby="addBloodPressureLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addMedicationLabel">Add New Blood Pressure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                   
                    <form action="<?php echo e(url('/addBP')); ?>" method="POST">
                        <div class="modal-body">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Systolic</label>
                                    <input class="form-control shadow" value="<?php echo e(old('systolic')); ?>" name="systolic" type="text">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Diastolic</label>
                                    <input class="form-control shadow"  value="<?php echo e(old('diastolic')); ?>" name="diastolic" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pulse</label>
                                    <input class="form-control shadow"  value="<?php echo e(old('pulse')); ?>" name="pulse" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tel</label>
                                    <input class="form-control shadow"  value="<?php echo e(old('tel')); ?>" name="tel" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>IMEI</label>
                                    <input class="form-control shadow" value="<?php echo e(old('imei')); ?>"  name="imei" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>IMSI</label>
                                    <input class="form-control shadow"  value="<?php echo e(old('imsi')); ?>" name="imsi" type="text">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label>ICCID</label>
                                    <input class="form-control shadow" value="<?php echo e(old('iccd')); ?>" name="iccid" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn2 button shadow mx-auto red" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Add New Blood Pressure</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>
          <!-- /Blood Pressure -->
          <div class="box_general padding_bottom">
                
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center">Blood Glucose Records</h5>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Blood Glucose</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php if($bgs->count()>0): ?>
                        <?php $__currentLoopData = $bgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            <tr>
                            <td><?php echo e($bg->bg); ?></td>
                            <td><?php echo e(\App\Http\Utility::dateToWords($bg->created_at)); ?></td>
                            <td><button data-id="<?php echo e($bg->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-bg" onclick=""></button>
                                <button data-id="<?php echo e($bg->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bg"></button></td>
                        </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <thead>
                            <tr>
                            <td colspan="8">
                                <div class="alert alert-warning">There are no BG readings</div>
                            </td>
                        </tr>
                        </thead>
                    <?php endif; ?>
                    </table>
                    
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">Add BG</h5>
                    <?php if($errors->add_bg->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->add_bg->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session('add-bg')): ?>
                        <div class="alert alert-success"><?php echo e(session('add-bg')); ?></div>
                    <?php endif; ?>
                    <form action="addBG" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Blood Glucose</label>
                            <input class="form-control shadow" value="<?php echo e(old('BP')); ?>" name="bp" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
          </div> 
          <!-- /row-->
         
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $('.del-bp').click(function(){
        if(confirm("Do you want to delete this Blood Pressure reading ?")){
            location = 'deleteBP/'+$(this).data('id');
        }
    })
    $('.edit-bp').click(function(){
        location = 'editBP/'+$(this).data('id');
    })

    $('.del-bg').click(function(){
        if(confirm("Do you want to delete this Blood Glucose reading ?")){
            location = 'deleteBG/'+$(this).data('id');
        }
    })
    $('.edit-bg').click(function(){
        location = 'editBG/'+$(this).data('id');
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>