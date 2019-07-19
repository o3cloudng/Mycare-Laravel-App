<?php $__env->startSection('title'); ?>
    Subscriptions
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
   <i class="fa fa-user"></i> Subscription Data
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
            <div class="row heading shadow-sm">
              <div class="col-md-9">
                <h4 class="">Subscriptions</h4>
              </div>
            </div>
            <div class="row">
              <?php if(isset( $subscription )): ?>
                <?php if($subscription[0]->subscriptionExpiryDate): ?>
                  <?php echo e($subscription[0]->subscriptionExpiryDate); ?> 
                <?php else: ?>
                  now()->toDateTimeString('Y-m-d')        
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="card">
              <div class="card-header">
                <div class="">Subscriptions</div>
              </div>
              <div class="card-body">
                <div class="row table-responsive">
                <div class="col-md-8">
                    <!-- <h5 class="text-center"></h5> -->
                    <table class="table table-bordered" id="medicationTable">
                        <thead>
                          <tr>
                            <th>Phone </th>
                            <th>Services</th>
                            <th>Service ID</th>
                            <th>Sub Period</th>
                            <th>Sub Amount</th>
                            <th>Sub Date</th>
                            <th>Sub Expire</th>
                            <th>Sub Expire</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <td><?php if(isset( $subscriber )): ?><?php echo e($subscriber->phone); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionServiceName); ?> <?php endif; ?>  </td>
                        
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->serviceID); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionPeriod); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionAmount); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionReqTime); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionExpiryDate); ?> <?php endif; ?>  </td>
                            <td><?php if(isset( $subscription )): ?><?php echo e($subscription[0]->subscriptionExpiryDate); ?> <?php endif; ?>  </td>
                        </tr>
                        </tbody>
                        <thead>
                          <tr>
                            <th>Phone </th>
                            <th>Services</th>
                            <th>Service ID</th>
                            <th>Sub Period</th>
                            <th>Sub Amount</th>
                            <th>Sub Date</th>
                            <th>Sub Expire</th>
                            <th>Sub Expire</th>
                          </tr>
                        </thead>
                    </table>
                    
                </div>
                <div class="col-md-4">&nbsp;</div>
                
            </div>
          </div>
          <div class="card-footer">&nbsp;</div>
              </div>
            </div>
          <!-- /box_general-->
          <div class="box_general padding_bottom">
                
           
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>