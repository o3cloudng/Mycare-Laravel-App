<?php $__env->startSection('title'); ?>
    Care Team
<?php $__env->stopSection(); ?>

<?php $__env->startSection('emergency-active'); ?>
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
            <li class="breadcrumb-item active">Care Team</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Care Team</h2>
            </div>
            <!-- Doctor -->
            <div class="row">
                <div class="col-md-12">
                    <?php if(session('error')): ?>
                        <script type="text/javascript">
                            toastr.error("<?php echo e(session('error')); ?>");
                        </script>
                    <?php elseif(Session::has('success')): ?>
                        <script type="text/javascript">
                            toastr.success("<?php echo e(session('success')); ?>");
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
                    <div class="text-right"> <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUser">Add New Care Team Member</button></div>
                    <hr>
                    <table class="table table-striped" id="careTeamTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $careTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $careTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href=""> <?php echo e($careTeam->user->name); ?> </a></td>
                                    <td><?php echo e(ucfirst($careTeam->user->roles()->first()->name)); ?></td>
                                    <td><?php echo e($careTeam->user->email); ?></td>
                                    <td><?php echo e($careTeam->user->phone); ?></td>
                                    <td>
                                        <a href="#0" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Remove as CareTeam Member</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr />

           
            <hr />

          </div>
          <!-- /box_general-->
             <!-- User Modal -->
            <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addEmergencyLabel">Add User Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="<?php echo e(url('/care-team')); ?>" method="POST">  
                                <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                                 
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="" name="name" type="text">
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="" name="email"  type="email">
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control <?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" value="" name="phone"  type="number">
                                            <?php if($errors->has('name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->name); ?>"><?php echo e(ucfirst($role->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User Contact</button>
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

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $('.del-user').click(function(){
        if(confirm("Do you want to delete this Medical Personal, and all his/her diagnosis and medications ?")){
            location = 'user/' + $(this).data('id') + '/delete';
        }
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>