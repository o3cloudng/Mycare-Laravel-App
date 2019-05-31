<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .check
{
  opacity:0.5;
  color:#996;
}
.img-check:hover {
  cursor: pointer;
}
.hidden {
  visibility: hidden;
}
</style>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Health Coach Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <!-- <div class="box_general padding_bottom" data-aos="fade-right">
          <div class="row">
            <h1>Admin Dashboard</h1>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                        <i class="fa fa-fw fa-caret-up"></i>
                     
                  </div>
                  <div class="mr-5">
                    <h5>Blood Pressure </h5>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div> -->
          <!-- <div class="continer">
            <div class="row">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>  
                <?php echo e($user->name); ?><br/>
                </p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> -->
        <!-- /cards -->

        <!-- /.container-fluid-->
  <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> <h2>Health Coach List</h2></div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="bloodPressureTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>DOB</th>
                              <th>Action</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>DOB</th>
                              <th>Action</th>
                              <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="user<?php echo e($user->id); ?>">
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->active); ?></td>
                                <td><?php echo e($user->role); ?></td>
                                <td><?php echo e(\App\Http\Utility::dateToWords($user->created_at)); ?></td>
                                <td><button data-id="<?php echo e($user->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-user" onclick=""></button>
                                    <button data-id="<?php echo e($user->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-user"></button>
                                    <!-- <a href="<?php echo e($user->id); ?>" class="btn btn-sm btn-ifo fa fa-trash del-user"></a> -->
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
  </div>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>