<?php $__env->startSection('title'); ?>
    Body Mass Index
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bmi-active'); ?>
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
            <li class="breadcrumb-item active">Body Mass Index 
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
                <div class="text-right">
                    <button type="button" class="btn_1" data-toggle="modal" data-target="#addBodyMass">
                        Add New Body Mass Index
                    </button>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Body Mass Indexes</h5>
                   
                    <?php if($errors->all()): ?>
                    <div class="alert alert-danger">
                        <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                    <table class="table table-striped table-bordered" id="bodyMassIndexTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(isset($body_mass_indexes)): ?>
                                <?php $__currentLoopData = $body_mass_indexes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bmi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="data-row">
                                        <td class="weight"><?php echo e($bmi->weight); ?></td>
                                        <td class="height"><?php echo e($bmi->height); ?></td>
                                        <td><?php echo e(number_format($bmi->bmi, 1)); ?></td>
                                        <td><?php echo e($bmi->status); ?></td>
                                        <td><?php echo e($bmi->risk); ?></td>
                                        <td>
                                            
                                            <button data-id="<?php echo e($bmi->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-bmi"></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>
            <hr>

            <!-- Add New Body Mass Index -->
            <div class="modal fade" id="addBodyMass" tabindex="-1" role="dialog" aria-labelledby="addBodyMassLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addBodyMassLabel">Add Body Mass Index</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    
                        <?php if($errors->add_bmi->all()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->add_bmi->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(session('add-bmi')): ?>
                            <div class="alert alert-success"><?php echo e(session('add-bmi')); ?></div>
                        <?php endif; ?>
                        <form action="<?php echo e(url('addBmi')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                                <div class="form-group">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Height</label>
                                            <input class="form-control" value="<?php echo e(old('height')); ?>" name="height" type="number" step="any">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Measurement Unit (ft/cm)</label>
                                            <select name="height_unit" class="form-control" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="feet">Feet</option>
                                                <option value="cm">Centimeter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span>
                                    
                                </span>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Weight</label>
                                            <input class="form-control" value="<?php echo e(old('weight')); ?>" name="weight" type="number" step="any">
                                        </div>
                                        <div class="col-sm-6">
                                                <label>Measurement Unit (lbs/kg)</label>
                                            <select name="weight_unit" class="form-control" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="lbs">Pounds</option>
                                                <option value="kg">Kilogram</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn_1 gray approve">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- /Body Mass Index -->
                        <!-- /box_general-->


   <!-- Edit Medication Modal -->
   <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit-modal-label">Edit Body Mass Index</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="edit-form" class="form-horizontal" method="POST" action="<?php echo e(url('/updateBmi')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                        <input class="form-control" name="id" type="hidden" id="id">
                    <div class="form-group">
                        <label>Height (cm)</label>
                        <input class="form-control" name="height" type="number" id="height">
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input class="form-control" name="weight" type="number" id="weight">
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1 delete" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn_1 approve">Edit Body Mass Index</button>
                </div>
            </form>
            
            
          </div>
        </div>
      </div>
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>