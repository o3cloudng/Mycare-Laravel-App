<?php $__env->startSection('title'); ?>
    Goals
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
            <!-- <div class="box_general padding_bottom">
                <a href="#defaultBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Default Blood Pressure Goal</a>
                <a href="#setBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Custom Blood Pressure Goal</a>
                <a href="#setBodyMGoal" class="btn_1 gray"><i class="fa fa-deviantart"></i> Body Mass Goal</a>
            </div> -->
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
            <div class="row heading shadow-sm">
                <h2 class="d-inline-block"><!-- <i class="fa fa-user"></i> --> Set Goals</h2>
            </div>
            <div class="row d-flex justify-content-around mb-5">
                <div class="col-sm-12 col-md-3 mb-3 text-center corner table-bordered bg-white p-4">
                    <p style="display: block;">
                        <h4>BP Goal</h4>
                        <small>Systolic - 120 and Diastolic - 80</small>
                        <br/>
                        <br/>

                        <form action="<?php echo e(url('setBPGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input value="120" name="systolic" type="hidden" step="any">
                            <input value="80" name="diastolic" type="hidden" step="any">
                            <input value="daily" name="frequency" type="hidden" step="any">
                            <!-- <select class="form-control shadow" name="frequency" onchange="changeBPGoalPlan(value)" required>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                            </select> -->
                            <input type="hidden" value="08:00" name="hour" required>
                            <button href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</button>
                        </form>
                        <!-- <a href="#0" class="btn_1 shadow btn gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a> -->
                    </p>
                </div>
                <div class="col-sm-12 col-md-3 mb-3 text-center corner table-bordered bg-white p-4">
                    <p>
                        <h4>BG Goal</h4>
                        <small>Non-diabetic 80-99 mg/dl</small>
                        <br/>
                        <small>Type 1-2 80-130 mg/dl</small>
                        <br/>
                        <a href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a>
                    </p>
                </div>
                <div class="col-sm-12 col-md-3 mb-3 text-center corner table-bordered bg-white p-4">
                    <p>
                        <h4>BMI Goal</h4>
                        <small>Normal weight: 18.5 - 24.9</small>
                        <br/>
                        <br/>
                        <a href="#0" data-toggle="modal" data-target="#setBMIGoal" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a>
                    </p>
                </div>
            </div>

           <!--  <div class="row">
                    <div class="list_general goal_list">
                        <ul>
                            <li>
                                <p style="display: block;">
                                    <h5>Systolic > 120 but < 129 and Diastolic < 80</h5>
                                    <br/>
                                    <a href="#0" class="btn_1 shadow btn gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a>
                                </p>
                                
                                <small></small>
                                
                                
                                <p>
                                    
                                </p>
                            </li>
                            <li>
                                
                                <small></small>
                                <p>
                                    <h5>Systolic < 120 and Diastolic < 80</h5>
                                    <br/>
                                    <a href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a>
                                </p>

                                
                            </li>
                           
                        </ul>
                    </div>
                </div> -->

            <div class="row">
                <div class="col-sm-12 col-md-6">
                <!-- <div class="col-md-12"> -->
                    <div class="card shadow corner mb-5">
                        <div class="card-body">
                            <!-- <div class="box_general padding_bottom" id="setBloodPGoal"> -->
                    <div class="header_box">
                        <h5><i class="fa fa-user"></i> Blood Pressure Goal </h5>
                    </div>
                    <hr/>
                    <div class="list_general" style="margin-left: -30px;">
                        <ul class="d-flex justify-content-around">
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Systolic</strong> <br>
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->systolic); ?> <?php else: ?> No Value <?php endif; ?> </li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Diastolic</strong> <br/> 
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->diastolic); ?> <?php else: ?> No Value <?php endif; ?></li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Frequency</strong> <br/> 
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e(ucfirst($bloodPressureGoal->frequency)); ?> <?php else: ?> No Value <?php endif; ?></li>
                        </ul>
                        <p class="text-center ml-5">
                            <a href="" class="btn_1 btn btn2 shadow activeBPLink approve align-center" data-toggle="modal" data-target="#setBloodLimitGoal"><i class="fa fa-fw fa-pencil"></i>Set BP Goal</a>
                        </p>
                                <ul class="booking_details">
                            <ul class="booking_details list-group bg-white mt-2 list-group-items">
                                <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>Normal Blood Pressure Rate: Systolic < 120 and Diastolic < 80</small></li>
                                <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>At Risk (Prehypertension): Systolic >= 120 and Diastolic >= 80</small></li>
                                <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>High: Systolic >= 140 and Diastolic <= 90</small></li>
                            </ul>


                        <ul>
                            <li>
                                <p class="text-center">
                                    <ul class="buttons">
                                    <?php if(isset($bloodPressureGoal)): ?>
                                        <?php if($bloodPressureGoal->status == 'activate'): ?>
                                            <li><br><a href="#0" class="btn_1 btn btn-inverse btn2 shadow gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</a></li> 
                                        <?php else: ?>
                                             <li><a href="#0" class="btn_1 btn btn2 shadow gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                                </p>
                            </li>
                        </ul>
                    </div>
                <!-- </div> -->
                        </div>                    
            </div>

            <div class="card shadow corner mb-5">
                        <div class="card-body">
                            <!-- <div class="box_general padding_bottom" id="setBloodPGoal"> -->
                    <div class="header_box">
                        <h5><i class="fa fa-user"></i> Blood Glucose Goal </h5>
                    </div>
                    <hr/>
                    <div class="list_general" style="margin-left: -30px;">
                        <ul class="d-flex justify-content-around">
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>BG Goal</strong> <br>
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->systolic); ?> <?php else: ?> No Value <?php endif; ?> </li>
                            <!-- <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Diastolic</strong> <br/> 
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bloodPressureGoal->diastolic); ?> <?php else: ?> No Value <?php endif; ?></li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Frequency</strong> <br/> 
                                <?php if(isset($bloodPressureGoal)): ?> <?php echo e(ucfirst($bloodPressureGoal->frequency)); ?> <?php else: ?> No Value <?php endif; ?></li> -->
                        </ul>
                        <p class="text-center ml-5">
                            <a href="" class="btn_1 btn btn2 shadow activeBPLink approve align-center" data-toggle="modal" data-target="#setBGGoal"><i class="fa fa-fw fa-pencil"></i>Set BG Goal</a>
                        </p>
                        <div class="p-3">
                            <table class="table table-condensed table-stripped table-bordered ml-3 table-responsive">
                            <thead>
                                <tr>
                                    <th>Target Level by Type</th>
                                    <th>Fasting/Upon waking</th>
                                    <th>Before meal/Pr prandial</th>
                                    <th>After meal/Post prandial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Non-diabetic</td><td>80-99 mg/dl</td><td>80-99 mg/dl</td><td>80-140 mg/dl</td>
                                </tr>
                                <tr>
                                    <td>Type 1 & Type 2 Adult</td><td>80-130 mg/dl</td><td>80-130 mg/dl</td><td>80-180 mg/dl</td>
                                </tr>
                                <tr>
                                    <td>Type 1 Child adolescent</td><td>80-130 mg/dl</td><td>80-130 mg/dl</td><td>80-180 mg/dl</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <ul>
                            <li>
                                <p class="text-center">
                                    <ul class="buttons">
                                        <?php if(isset($bloodPressureGoal)): ?>
                                            <?php if($bloodPressureGoal->status == 'activate'): ?>
                                                <li><br><a href="#0" class="btn_1 btn btn-inverse btn2 shadow gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</a></li> 
                                            <?php else: ?>
                                                 <li><a href="#0" class="btn_1 btn btn2 shadow gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </p>
                            </li>
                        </ul>
                    </div>
                <!-- </div> -->
                        </div>                    
            </div>


                </div>
                <div class="col-sm-12 col-md-6 top_mobile_margin">
                    <div class="card corner">
                        <div class="card-body">
                            <div class="header_box">
                                <h5>
                                    <i class="fa fa-user"></i> Body Mass Index Goal 
                                </h5>
                            </div>
                            <div class="list_general">
                                <ul class="d-flex justify-content-around">
                                    <li class="text-center round_box activeBPLink text-white justify-content-center" style="margin-left: -40px;">
                                        <br><strong>BMI Goal</strong> <br>
                                        <?php if(isset($bloodPressureGoal)): ?> <?php echo e($bmiGoal->bmi); ?> <?php else: ?> No Value <?php endif; ?> </li>
                                </ul>
                                <p class="text-center"><a href="" class="btn_1 activeBPLink approve btn btn2 shadow" data-toggle="modal" data-target="#setBMIGoal"><i class="fa fa-fw fa-pencil"></i> Set BMI Goal</a></p>
                                <ul>
                                    <li style="margin-left: -30px;">
                                        <ul class="booking_details list-group bg-white mt-2 list-group-items">
                                            <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>Underweight:  Less than 18.5</small></li>
                                            <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>Normal weight: 18.5 - 24.9</small></li>
                                            <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>Overweight: 25 - 29.9</small></li>
                                            <li class="list-group-item" style="background: #ffffff !important; color: #333 !important;"><small>Obesity: BMI of 30 or greater</small></li>
                                        </ul>
                                        <hr>
                                        <h6>Current Body Mass Index Goal Details</h6>
                                        <?php if(isset($bmiGoal)): ?>
                                            <table class="table table-bordered table-stripped">
                                                <tr><th><strong>Weight</strong></th><td> <?php echo e($bmiGoal->weight); ?></td></tr>
                                                <tr><th><strong>Height</strong></th><td> <?php echo e($bmiGoal->height); ?></td></tr>
                                                <tr><th><strong>Body Mass Index</strong></th><td><?php echo e($bmiGoal->bmi); ?></td></tr>
                                                <tr><th><strong>Frequency</strong></th><td> <?php echo e(ucfirst($bmiGoal->frequency)); ?></td></tr>
                                                <tr><th><strong>Time</strong></th><td> <?php echo e($bmiGoal->hour.':00:00'); ?></td></tr>
                                                <?php if($bmiGoal->frequency == 'weekly'): ?> 
                                                    <tr><th><strong>Week Day</strong></th><td> <?php echo e(ucfirst($weekMap[$bmiGoal->weekDay])); ?></td></tr>
                                                <?php elseif($bmiGoal->frequency == 'monthly'): ?>
                                                    <tr><th><strong>Month Day</strong></th><td> <?php echo e($bmiGoal->monthDay); ?></td></tr>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                            </table>
                                            <table class="table table-bordered table-stripped">
                                                <thead>
                                                    <tr><th><strong>Weight</strong></th><td>No Weight Recorded Yet</td></tr>
                                                    <tr><th><strong>Height</strong></th><td>No Height Recorded Yet</td></tr>
                                                    <tr><th><strong>Body Mass Index</strong></th><td>No Goal Set Yet</td></tr>
                                                    <tr><th><strong>Frequency</strong></th><td>Nothing</td></tr>
                                                    <tr><th><strong>Frequency</strong></th><td>Nothing</td></tr>
                                                </thead>
                                            </table>
                                                <!-- <li><strong>Weight</strong> No Weight Recorded Yet</li>
                                                <li><strong>Height</strong> No Height Recorded Yet</li>
                                                <li><strong>Body Mass Index</strong> No Goal Set Yet</li>
                                                <li><strong>Frequency</strong> Nothing</li>
                                                <li><strong>Time</strong> </li> -->
                                            
                                            <?php endif; ?>
                                    </li>
                                </ul>
                                <p class="buttons">
                                    <?php if(isset($bmiGoal)): ?>
                                        <?php if($bmiGoal->status == 'activate'): ?>
                                            <li><button id="activateOrDeactivateBMI" data-id=<?php echo e($bmiGoal->id); ?> class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</button></li> 
                                        <?php else: ?>
                                             <li><button id="activateOrDeactivateBMI" data-id=<?php echo e($bmiGoal->id); ?>  class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</button></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
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
             <!-- <div class="box_general padding_bottom" id="setBloodPGoal">
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
                </div> -->
    
                
            <!-- Body Mass -->
            <!-- <div class="box_general padding_bottom" id="setBodyMGoal">
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
            </div> -->
          <!-- /row-->

             
        </div>
        <!-- /.container-fluid-->


        <!-- Body Mass Index Goal Modal -->
        <div class="modal fade" id="setBMIGoal" tabindex="-1" role="dialog" aria-labelledby="setBMIGoalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="setBMIGoalLabel">Set Body Mass Index Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                    </button>
                    </div>
                    
                    <form action="<?php echo e(url('setBmiGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                <?php if(!isset($bmiGoal->height)): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Height</label>
                                        <input class="form-control shadow" value="<?php if(isset($bmiGoal->height)): ?><?php echo e($bmiGoal->height); ?><?php endif; ?>" name="height" type="number" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <small>Measurement Unit (ft/cm)</small>
                                            <select name="height_unit" class="form-control shadow" style="font-size: 80%; font-weight: 400;" required>
                                                <option value="cm">Centimeter</option>
                                                <option value="feet">Feet</option>
                                            </select>
                                    </div>
                                </div>
                                <?php else: ?>
                                    <input class="form-control shadow" value="<?php if(isset($bmiGoal->height)): ?><?php echo e($bmiGoal->height); ?><?php endif; ?>" name="height" type="hidden" step="any">
                                <?php endif; ?>
                                
                                <span>
                                
                            </span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Weight</label>
                                        <input name="weight" type="number" value="<?php if(isset($bmiGoal)): ?><?php echo e($bmiGoal->weight); ?><?php endif; ?>" class="form-control shadow" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Unit (lbs/kg)</label>
                                            <select name="weight_unit" class="form-control shadow" style="font-size: 80%; font-weight: 400;" required>
                                               <!-- <option value="" selected="selected" disabled="disabled">-- Select One --</option> -->
                                               <option value="lbs">Pounds</option>
                                               <option value="kg">Kilogram</option>
                                            </select>
                                        
                                    </div>
                                </div>
                                
                            </div>
                           <!--  <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Frequency</label>
                                        <select class="form-control shadow" name="frequency" onchange="changePlan(value);" required>
                                            <option value="<?php if(isset($bmiGoal)): ?><?php echo e($bmiGoal->frequency); ?><?php endif; ?>"><?php if(isset($bmiGoal)): ?><?php echo e($bmiGoal->frequency); ?><?php endif; ?></option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" id="" value="" class="form-control shadow" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" id="" value="" class="form-control shadow" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 btn btn2 shadow default gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 shadow activeBPLink gray approve">Set BMI Goal</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
        </div>
        <!-- /Body Mass Index Goal Modal -->

        <!-- Blood Glucose -->
        <div class="modal fade" id="setBGGoal" tabindex="-1" role="dialog" aria-labelledby="setBMIGoalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="setBMIGoalLabel">Set Blood Glucose Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                    </button>
                    </div>
                    
                    <form action="<?php echo e(url('setBGGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Blood Glucose Gloa</label>
                                        <input name="BG_Goal" type="number" value="<?php if(isset($BG_Goal)): ?><?php echo e($BG_Goal); ?><?php endif; ?>" class="form-control shadow" step="any">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" id="" value="" class="form-control shadow" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" id="" value="" class="form-control shadow" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 btn btn2 shadow default gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 shadow activeBPLink gray approve">Set Blood Glucose Goal</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
        </div>
        <!-- /Blood Glucose -->

        <!-- Blood Pressure (Systolic/Diastolic) -->
        <div class="modal fade" id="setBloodLimitGoal" tabindex="-1" role="dialog" aria-labelledby="setBloodLimitGoalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="setBPGoalLabel">Set Blood Pressure Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                    </button>
                    </div>
                    
                    <form action="<?php echo e(url('setBPGoal')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Systolic</label>
                                        <input class="form-control shadow" value="<?php echo e(old('systolic')); ?>" name="systolic" type="number" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Diastolic</label>
                                        <input class="form-control shadow" value="<?php echo e(old('diastolic')); ?>" name="diastolic" type="number" step="any">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Frequency</label>
                                        <select class="form-control shadow" name="frequency" onchange="changeBPGoalPlan(value)" required>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <!-- Hidden Hour -->
                                    <input type="hidden" value="08:00" name="hour" id="" class="form-control shadow" required>
                                    <!-- <div class="col-md-4">
                                        <label>Hour</label>
                                        <input type="hidden" value="08:00" name="hour" id="" class="form-control shadow" required>
                                    </div> -->
                                    <!-- <div class="col-md-4 hideCol" id="dayOfWeekBP">
                                        <label for="">Day of the week </label>
                                        <select class="form-control shadow" name="weekDay">
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
                                            <select class="form-control shadow" name="monthDay">
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
                                        </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 btn btn2 shadow default gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 shadow activeBPLink gray approve">Set Blood Pressure Goal</button>
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