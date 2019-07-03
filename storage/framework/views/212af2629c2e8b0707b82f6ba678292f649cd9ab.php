<?php $__env->startSection('title'); ?>
    Care Team
<?php $__env->stopSection(); ?>

<?php $__env->startSection('emergency-active'); ?>
black
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
          <div class="box_general">
                <div class="header_box">
                    <h2 class="d-inline-block">Medical Personals</h2>
                    <div class="filter">
                        <select name="orderby" class="selectbox">
                            <option value="Any time">Any time</option>
                            <option value="Latest">Latest</option>
                            <option value="Oldest">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="list_general">
                    <ul>
                        <?php if(count($users) > 0): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="box">
                                <center><img class="rounded" style="width: 50px; height: 50px; margin: auto;" src="img/avatar.png" alt=""></center>
                                <small></small>
                                <h4 class="text-center"><?php echo e($user->name); ?></h4>
                                <p class="text-center"><?php echo e($user->email); ?></p>
                                <p class="text-center"><?php echo e($user->phone); ?></p>
                                <ul class="buttons text-center">
                                    <li class="text-center"> <a href="javascript:void(0);" onclick="addUserToCareTeam(<?php echo e($user->id); ?> )" class="btn_1 gray approve wishlist_close btn2 activeLink shadow text-center"><i class="fa fa-fw fa-times-circle-o"></i> Add to Care Team </a></li>
                                </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      
                    </ul>
                </div>
            </div>
            <!-- /box_general-->
            <nav aria-label="...">
                <ul class="pagination pagination-sm add_bottom_30">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <!-- /pagination-->
         
         
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

function addUserToCareTeam(userID) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/care-team/member/new')); ?>",
                type: 'POST',
                data: {
                  user_id: userID
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result)
                    toastr.success('Congrats, You have send a request to ' + result.username)
                },
                error : function(e) {
                    console.log(e)
                    toastr.error("There was an error sending your request")
                }
              });
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>