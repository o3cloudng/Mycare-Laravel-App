<?php $__env->startSection('title'); ?>
    Medical Records
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <!-- <i class="fa fa-user"></i> --> Medical Records
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
          <div class="box_general padding_bottom">
            <div class="row">
                <h4 class="heading shadow">Cholesterol Records</h4>
            </div>
            <div class="card">
                <!-- <div class="card-header"><i class="fa fa-table"></i> Cholesterol</div> -->
                <div class="card-body">
                    <div class="row">
                <div class="col-md-8">
                   <div class="table-responsive">
                        <table class="table table-condensed table-bordered" id="cholesterolTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Total Cholesterol Value (md/dl)</th>
                                <th>Total Cholesterol Status</th>
                                <th>High Density Lipoprotein Value (mg/dl)</th>
                                <th>High Density Lipoprotein Status</th>
                                <th>Time Last Updated</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Total Cholesterol Value (md/dl)</th>
                                <th>Total Cholesterol Status</th>
                                <th>High Density Lipoprotein Value (mg/dl)</th>
                                <th>High Density Lipoprotein Status</th>
                                <th>Time Last Updated</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(isset($cholesterol)): ?>
                            <tr>
                                <td><?php echo e($cholesterol->total_cholesterol); ?></td>
                                <td><?php echo e($cholesterol->total_cholesterol_status); ?></td>
                                <td><?php echo e($cholesterol->high_density_lipoprotein); ?></td>
                                <td><?php echo e($cholesterol->hdl_status); ?></td>
                                <td><?php echo e($cholesterol->updated_at->diffForHumans()); ?></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                   </div>
                </div>
                <div class="col-md-4">
                   
                    <h5> 
                        <?php if(isset($cholesterol)): ?> 
                            Update 
                        <?php else: ?> 
                            Add 
                        <?php endif; ?> 
                        Cholesterol details
                    </h5>
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
                    <?php if($errors->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('cholesterol')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Total Cholesterol (mg/dl)</label>
                            <input class="form-control shadow" value="<?php if(isset($cholesterol)): ?> <?php echo e($cholesterol->total_cholesterol); ?> <?php endif; ?>" name="total_cholesterol" type="number" placeholder="Your Total Cholesterol">
                        </div>
                        <div class="form-group">
                            <label>High Density Lipoprotein (mg/dl)</label>
                            <input class="form-control shadow" value="<?php if(isset($cholesterol)): ?> <?php echo e($cholesterol->high_density_lipoprotein); ?> <?php endif; ?>" name="high_density_lipoprotein" type="number" placeholder="Your High Density Lipoprotein">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_1 medium btn btn2 shadow activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
                </div>
                <div class="card-footer"></div>
            </div>
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>