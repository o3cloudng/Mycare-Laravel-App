<?php $__env->startSection('title'); ?>
    Goals
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Goals</li>
          </ol>
            <div class="box_general padding_bottom">
                <a href="#defaultBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Default Blood Pressure Goal</a>
                <a href="#setBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Custom Blood Pressure Goal</a>
                <a href="#setBodyMGoal" class="btn_1 gray"><i class="fa fa-deviantart"></i> Body Mass Goal</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors->all()): ?>
                        <div class="alert alert-danger">
                            <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="box_general" id="defaultBloodPGoal">
                    <div class="header_box">
                        <h2 class="d-inline-block">Default Blood Pressure Goals</h2>
                    </div>
                    <div class="list_general">
                        <ul>
                            <li>
                                
                                <small></small>
                                <h6>Systolic > 120 but < 129 and Diastolic < 80</h6>
                                
                                <ul class="buttons">
                                    <li><a href="#0" class="btn_1 gray approve wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Approve</a></li>
                                </ul>
                            </li>
                            <li>
                                
                                <small></small>
                                <h6>Systolic > 120 and Diastolic < 80</h6>
                                <p>Time: <br></p>
                                
                                <ul class="buttons">
                                    <li><a href="#0" class="btn_1 gray approve wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Approve</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <?php
                    $weekMap = [
                    1 => 'Sunday',
                    2 => 'Monday',
                    3 => 'Tuesday',
                    4 => 'Wednesday',
                    5 => 'Thursday',
                    6 => 'Friday',
                    7 => 'Saturday',
                ];
                ?>  
             <!-- Blood Pressure -->
             <div class="box_general padding_bottom" id="setBloodPGoal">
                    <div class="header_box">
                        <h5><i class="fa fa-user"></i> Blood Pressure Goal </h5>
                    </div>
                    <div class="list_general">
                        <ul>
                            <li>
                                <a href="" class="btn_1 green approve" data-toggle="modal" data-target="#setBloodLimitGoal"><i class="fa fa-fw fa-pencil"></i>Set Goal</a>
                                <ul class="booking_details">
                                    <li><small>Normal Blood Pressure Rate: Systolic < 120 and Diastolic < 80</small></li>
                                    <li><small>At Risk (Prehypertension): Systolic >= 120 and Diastolic >= 80</small></li>
                                    <li><small>High: Systolic >= 140 and Diastolic <= 90</small></li>
                                </ul>
                                
                                <ul class="booking_details">
                                        <li><strong>Systolic</strong> <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->systolic); ?> <?php else: ?> No Value <?php endif; ?> </li>
                                        <li><strong>Diastolic</strong> <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->diastolic); ?> <?php else: ?> No Value <?php endif; ?></li>
                                        <li><strong>Frequency</strong> <?php if(isset($bloodPressureGoal)): ?> <?php echo e(ucfirst($bloodPressureGoal->frequency)); ?> <?php else: ?> No Value <?php endif; ?></li>
                                    </ul>
                                <ul class="buttons">
                                    <?php if(isset($bloodPressureGoal)): ?>
                                        <?php if($bloodPressureGoal->status == 'activate'): ?>
                                            <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</a></li> 
                                        <?php else: ?>
                                             <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
    
                
            <!-- Body Mass -->
            <div class="box_general padding_bottom" id="setBodyMGoal">
                <div class="header_box">
                    <h5><i class="fa fa-user"></i> Body Mass Index Goal </h5>
                </div>
                <div class="list_general">
                    <ul>
                        <li>
                            <a href="" class="btn_1 green approve" data-toggle="modal" data-target="#setBMIGoal"><i class="fa fa-fw fa-pencil"></i>Set Goal</a>
                            <ul class="booking_details">
                                <li><small>Underweight:  Less than 18.5</small></li>
                                <li><small>Normal weight: 18.5 - 24.9</small></li>
                                <li><small>Overweight: 25 - 29.9</small></li>
                                <li><small>Obesity: BMI of 30 or greater</small></li>
                            </ul>
                            <hr>
                            <h6>Current Body Mass Index Goal Details</h6>
                            <ul class="booking_details">
                                  
                                <?php if(isset($bmiGoal)): ?>
                                    <li><strong>Weight</strong> <?php echo e($bmiGoal->weight); ?></li>
                                    <li><strong>Height</strong> <?php echo e($bmiGoal->height); ?></li>
                                    <li><strong>Body Mass Index</strong> <?php echo e($bmiGoal->bmi); ?></li>
                                    <li><strong>Frequency</strong> <?php echo e(ucfirst($bmiGoal->frequency)); ?></li>
                                    <li><strong>Time</strong> <?php echo e($bmiGoal->hour.':00:00'); ?></li>
                                    <?php if($bmiGoal->frequency == 'weekly'): ?> 
                                        <li><strong>Week Day</strong> <?php echo e(ucfirst($weekMap[$bmiGoal->weekDay])); ?></li>
                                    <?php elseif($bmiGoal->frequency == 'monthly'): ?>
                                        <li><strong>Month Day</strong> <?php echo e($bmiGoal->monthDay); ?></li>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li><strong>Weight</strong> No Weight Recorded Yet</li>
                                    <li><strong>Height</strong> No Height Recorded Yet</li>
                                    <li><strong>Body Mass Index</strong> No Goal Set Yet</li>
                                    <li><strong>Frequency</strong> Nothing</li>
                                    <li><strong>Time</strong> </li>
                                
                                <?php endif; ?>
                            </ul>
                            <ul class="buttons">
                                    <?php if(isset($bmiGoal)): ?>
                                    <?php if($bmiGoal->status == 'activate'): ?>
                                        <li><button id="activateOrDeactivateBMI" data-id=<?php echo e($bmiGoal->id); ?> class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</button></li> 
                                    <?php else: ?>
                                         <li><button id="activateOrDeactivateBMI" data-id=<?php echo e($bmiGoal->id); ?>  class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</button></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
          <!-- /row-->

             
        </div>
        <!-- /.container-fluid-->
    </div>

        <!-- Body Mass Index Goal Modal -->
        <div class="modal fade" id="setBMIGoal" tabindex="-1" role="dialog" aria-labelledby="setBMIGoalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="setBMIGoalLabel">Set Body Mass Index Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    
                    <form action="<?php echo e(url('setBmiGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Height</label>
                                        <input class="form-control" value="" name="height" type="number" step="any">
                                        <!-- value = <?php echo e("$ bmiGoal->height"); ?> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <small>Measurement Unit (ft/cm)</small>
                                            <select name="height_unit" class="form-control" style="font-size: 80%; font-weight: 400;" required>
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
                                        <input name="weight" type="number" value=" $bmiGoal->weight" class="form-control" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <small>Measurement Unit (lbs/kg)</small>
                                            <select name="weight_unit" class="form-control" style="font-size: 80%; font-weight: 400;" required>
                                               <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                               <option value="lbs">Pounds</option>
                                               <option value="kg">Kilogram</option>
                                            </select>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Frequency</label>
                                        <select class="form-control" name="frequency" onchange="changePlan(value);" required>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Hour</label>
                                        <input type="time" name="hour" id="" value="$bmiGoal->hour }}" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 hideCol" id="dayOfWeek">
                                        <label for="">Day of the week </label>
                                        <select class="form-control" name="weekDay">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="1">Sunday</option>
                                            <option value="2">Monday</option>
                                            <option value="3">Tuesday</option>
                                            <option value="4">Wednesday</option>  
                                            <option value="5">Thursday</option>
                                            <option value="6">Friday</option>
                                            <option value="7">Saturday</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 hideCol" id="dayOfMonth">
                                            <label for="">Day of the Month</label>
                                            <select class="form-control" name="monthDay">
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="1">Day 1</option>
                                                <option value="2">Day 2</option>
                                                <option value="3">Day 3</option>  
                                                <option value="4">Day 4</option>
                                                <option value="5">Day 5</option>
                                                <option value="6">Day 6</option>
                                                <option value="7">Day 7</option>
                                                <option value="8">Day 8</option>
                                                <option value="9">Day 9</option>
                                                <option value="10">Day 10</option>  
                                                <option value="11">Day 11</option>
                                                <option value="12">Day 12</option>
                                                <option value="13">Day 13</option>
                                                <option value="14">Day 14</option>\
                                                <option value="15">Day 15</option>
                                                <option value="16">Day 16</option>
                                                <option value="17">Day 17</option>  
                                                <option value="18">Day 18</option>
                                                <option value="19">Day 19</option>
                                                <option value="20">Day 20</option>
                                                <option value="21">Day 21</option>
                                                <option value="22">Day 22</option>
                                                <option value="23">Day 23</option>  
                                                <option value="24">Day 24</option>
                                                <option value="25">Day 25</option>
                                                <option value="26">Day 26</option>
                                                <option value="27">Day 27</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 gray approve">Set BMI Goal</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
        </div>
        <!-- /Body Mass Index Goal Modal -->

        <!-- Blood Pressure (Systolic/Diastolic) -->
        <div class="modal fade" id="setBloodLimitGoal" tabindex="-1" role="dialog" aria-labelledby="setBloodLimitGoalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="setBPGoalLabel">Set Blood Pressure Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    
                    <form action="<?php echo e(url('setBPGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Systolic</label>
                                        <input class="form-control" value="<?php echo e(old('systolic')); ?>" name="systolic" type="number" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Diastolic</label>
                                        <input class="form-control" value="<?php echo e(old('diastolic')); ?>" name="diastolic" type="number" step="any">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Frequency</label>
                                        <select class="form-control" name="frequency" onchange="changeBPGoalPlan(value)" required>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Hour</label>
                                        <input type="time" name="hour" id="" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 hideCol" id="dayOfWeekBP">
                                        <label for="">Day of the week </label>
                                        <select class="form-control" name="weekDay">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="1">Sunday</option>
                                            <option value="2">Monday</option>
                                            <option value="3">Tuesday</option>
                                            <option value="4">Wednesday</option>  
                                            <option value="5">Thursday</option>
                                            <option value="6">Friday</option>
                                            <option value="7">Saturday</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 hideCol" id="dayOfMonthBP">
                                            <label for="">Day of the Month</label>
                                            <select class="form-control" name="monthDay">
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="1">Day 1</option>
                                                <option value="2">Day 2</option>
                                                <option value="3">Day 3</option>  
                                                <option value="4">Day 4</option>
                                                <option value="5">Day 5</option>
                                                <option value="6">Day 6</option>
                                                <option value="7">Day 7</option>
                                                <option value="8">Day 8</option>
                                                <option value="9">Day 9</option>
                                                <option value="10">Day 10</option>  
                                                <option value="11">Day 11</option>
                                                <option value="12">Day 12</option>
                                                <option value="13">Day 13</option>
                                                <option value="14">Day 14</option>\
                                                <option value="15">Day 15</option>
                                                <option value="16">Day 16</option>
                                                <option value="17">Day 17</option>  
                                                <option value="18">Day 18</option>
                                                <option value="19">Day 19</option>
                                                <option value="20">Day 20</option>
                                                <option value="21">Day 21</option>
                                                <option value="22">Day 22</option>
                                                <option value="23">Day 23</option>  
                                                <option value="24">Day 24</option>
                                                <option value="25">Day 25</option>
                                                <option value="26">Day 26</option>
                                                <option value="27">Day 27</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 gray approve">Set Blood Pressure Goal</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
        </div>
        <!-- /Blood Pressure -->
       
<?php $__env->stopSection(); ?>

<script>
  function changePlan(value) {
            if(value === 'daily') {
                $('#dayOfWeek').addClass('hideCol');
                $('#dayOfMonth').addClass('hideCol');
            }

            if (value === 'weekly') {
                $('#dayOfWeek').removeClass('hideCol');
                $('#dayOfMonth').addClass('hideCol');
            }

            if (value === 'monthly') {
                $('#dayOfWeek').addClass('hideCol');
                $('#dayOfMonth').removeClass('hideCol');
            }
        }

        // Blood Pressure Goal Plan
        function changeBPGoalPlan(value) {
            if(value === 'daily') {
                $('#dayOfWeekBP').addClass('hideCol');
                $('#dayOfMonthBP').addClass('hideCol');
            }

            if (value === 'weekly') {
                $('#dayOfWeekBP').removeClass('hideCol');
                $('#dayOfMonthBP').addClass('hideCol');
            }

            if (value === 'monthly') {
                $('#dayOfWeekBP').addClass('hideCol');
                $('#dayOfMonthBP').removeClass('hideCol');
            }
            console.log('Running');
        }
</script>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>