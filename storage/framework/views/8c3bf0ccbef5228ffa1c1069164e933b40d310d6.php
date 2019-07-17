<?php $__env->startSection('title'); ?>
    Blood Pressure
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <i class="fa fa-user"></i> Medical Record
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <div class="row heading shadow-sm">
                <div class="col-sm-12 col-md-9 text-sm-center text-md-left">
                  <h4 class="">Blood Pressure</h4>
                </div>
                <div class="col-sm-12 col-md-3">
                  <button type="button" class="btn_1 btn btn2 button shadow activeBPLink float-right text-sm-center" data-toggle="modal" data-target="#addBloodPressure">
                        Add New Blood Pressure <i class="fa fa-plus"></i>
                    </button>
                </div>    
            </div>
            </div>
          </div>
          <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> Blood Pressure Records</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="bloodPressureTable" width="100%" cellspacing="0">
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
                        <tfoot>
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
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $bps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bp<?php echo e($bp->id); ?>">
                                <td><?php echo e($bp->systolic); ?></td>
                                <td><?php echo e($bp->diastolic); ?></td>
                                <td><?php echo e($bp->pulse); ?></td>
                                <td><?php echo e($bp->imei); ?></td>
                                <td><?php echo e($bp->imsi); ?></td>
                                <td><?php echo e($bp->tel); ?></td>
                                <td><?php echo e($bp->iccid); ?></td>
                                <td><?php echo e(\App\Http\Utility::dateToWords($bp->created_at)); ?></td>
                                <td><!-- <button data-id="<?php echo e($bp->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-bp"></button>
                                    <button data-id="<?php echo e($bp->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bp"></button> -->
                                    <a href="editBP/<?php echo e($bp->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-bp"></a>
                                    <a href="deleteBP/<?php echo e($bp->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bp"></a>
                                  </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Blood Pressure</div>
                </div>
                 <!-- /tables-->
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
                                <button type="button" class="btn_1 btn btn2 button shadow default gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink gray approve">Add New Blood Pressure</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>
          <!-- /Blood Pressure -->
       
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>