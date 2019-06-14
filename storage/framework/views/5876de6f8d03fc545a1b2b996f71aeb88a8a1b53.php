<?php $__env->startSection('title'); ?>
   Notifications
<?php $__env->stopSection(); ?>

<?php $__env->startSection('notification-active'); ?>
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
            <li class="breadcrumb-item active">Notifications 
                 <?php if(session('update-notification')): ?>
                    <div class="alert alert-success"><?php echo e(session('update-notification')); ?></div>
                <?php endif; ?></li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Notifications</h2>
            </div>
           
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center">Notification</h5>
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
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Notification</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <?php if($notifications->count()>0): ?>

                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($notification->notification); ?></td>
                                    <td><?php echo e($notification->time); ?></td>
                                    <td><?php if($notification->status==1): ?>Enabled <?php else: ?> Disabled <?php endif; ?></td>
                                    <td>
                                        <button data-id="<?php echo e($notification->id); ?>" class="btn btn-sm btn-primary fa fa-pencil edit-notification" onclick=""></button>
                                        <button data-id="<?php echo e($notification->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-notification"></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">Thwere are no notificaions</div></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>

                <div class="col-md-4">
                <h5 class="text-center">Add Notifications</h5>
                <?php if($errors->add_notifications->all()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->add_notification->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(session('add-notification')): ?>
                    <div class="alert alert-success"><?php echo e(session('add-notification')); ?></div>
                <?php endif; ?>
                <form action="addNotification" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Notification</label>
                        <textarea class="form-control" value="<?php echo e(old('notification')); ?>" name="notification"></textarea>
                    </div>
                    <div class="form-group">
                        <label>time</label>
                        <input class="form-control" value="<?php echo e(old('time')); ?>" name="time" type="time">
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status" >
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>  
                </div>
                
            </div>
            <hr>
            
            
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $('.del-notification').click(function(){
        if(confirm("Do you want to delete this notification ?")){
            location = 'deleteNotification/'+$(this).data('id');
        }
    })
    $('.edit-notification').click(function(){
        location = 'editNotification/'+$(this).data('id');
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>