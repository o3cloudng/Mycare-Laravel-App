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
                <a href="<?php echo e(url('/diagnosis/')); ?>">All Diagnosis </a>
            </li>
            
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
            </div>
            <?php if($errors->all()): ?>
                <div class="alert alert-danger">
                    <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="text-left">
                <a href="<?php echo e(url('medications/new')); ?>" class="btn_1 approve">
                    Add New Medication
                </a>
                
            </div>
          </div>
            
          <div class="box_general padding_bottom">
            <!-- Medication -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="medicationTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Dosage (Days)</th>
                                <th>Frequency(per day)</th>
                                <th>Prescribed By</th>
                                <th>Medical Personal Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Dosage (Days)</th>
                                <th>Frequency(per day)</th>
                                <th>Prescribed By</th>
                                <th>Medical Personal Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $medications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="data-row">
                                <td class="id"><?php echo e($medication->id); ?></td>
                                <td class="name"><?php echo e($medication->name); ?></td>
                                <td class="dosage"><?php echo e($medication->dosage); ?></td>
                                <td class="frequency"><?php echo e($medication->frequency); ?></td>
                                <td class="medical_personal"><?php echo e($medication->medical_personal); ?></td>
                                <td class="medical_personal_phone"><?php echo e($medication->medical_personal_phone); ?></td>
                                <td class="start_date"><?php echo e($medication->start_date); ?></td>
                                <td class="end_date"><?php echo e($medication->end_date); ?></td>
                                <td><button data-id="<?php echo e($medication->id); ?>" class="btn btn-sm btn-primary fa fa-pencil" id="edit-medication"></button>
                                    <button data-id="<?php echo e($medication->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-medication"></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
             <!-- Add Medication Modal -->
            <div class="modal fade" id="addMedication" tabindex="-1" role="dialog" aria-labelledby="addMedicationLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addMedicationLabel">Add New Medication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="" method="post">
                                <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" name="name" type="text" id="drug_name">
                                            <?php if($errors->has('name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dosage</label>
                                            <input class="form-control" value="<?php echo e(old('dosage')); ?>" name="dosage" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Duration(Days)</label>
                                            <input type="number" name="duration" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Frequency(per day)</label>
                                            <input class="form-control" value="<?php echo e(old('frequency')); ?>" name="frequency"  type="text">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control" value="<?php echo e(old('start_date')); ?>" name="start_date" type="date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn_1 delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 approve">Add New Medication</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <hr>
            <!-- /Add Medication Modal -->
            

            <!-- Edit Medication Modal -->
            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-modal-label">Edit Medication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="edit-form" class="form-horizontal" method="POST" action="<?php echo e(url('/medications/edit')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" class="form-control"  name="name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dosage</label>
                                        <input type="text" name="dosage" id="dosage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Frequency (per Day)</label>
                                        <input type="text" name="frequency" id="frequency" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medical Personal</label>
                                        <input type="text" name="medical_personal" id="medical_personal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medical Personal Phone</label>
                                        <input type="text" name="medical_personal_phone" id="medical_personal_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Medication</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /Edit Medication -->

          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>