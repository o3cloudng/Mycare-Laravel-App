@extends('layouts.dashboard')

@section('title')
    Goals
@endsection
@section('header')

@endsection
@section('content')

    <div class="container">
            <!-- <div class="box_general padding_bottom">
                <a href="#defaultBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Default Blood Pressure Goal</a>
                <a href="#setBloodPGoal" class="btn_1 gray"><i class="fa fa-user"></i> Custom Blood Pressure Goal</a>
                <a href="#setBodyMGoal" class="btn_1 gray"><i class="fa fa-deviantart"></i> Body Mass Goal</a>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
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

                        <form action="{{ url('setBPGoal') }}" method="POST">
                            {{csrf_field()}}
                            <input value="120" name="systolic" type="hidden" step="any">
                            <input value="80" name="diastolic" type="hidden" step="any">
                            <input value="daily" name="frequency" type="hidden" step="any">
                            <input value="<?php echo date('Y-m-d'); ?>" name="start_date" type="hidden" step="any">
                            <input value="<?php echo (new DateTime('+7 day'))->format('Y-m-d H:i:s'); ?>" name="end_date" type="hidden" step="any">
                            <input type="hidden" value="08:00" name="hour" required>
                            <button href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</button>
                        </form>
                        <!-- <a href="#0" class="btn_1 shadow btn gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a> -->
                    </p>
                </div>
                <div class="col-sm-12 col-md-3 mb-3 text-center corner table-bordered bg-white p-4">
                    <p>
                        <h4>BG Goal</h4>
                        <small>Set 85 mg/dl</small>
                        <br/>
                        <br/>
                        <form action="{{ url('setBGGoal') }}" method="POST">
                            {{csrf_field()}}
                            <input value="85" name="bg_goal" type="hidden" step="any">
                            <input value="daily" name="frequency" type="hidden" step="any">
                            <input value="<?php echo date('Y-m-d'); ?>" name="start_date" type="hidden" step="any">
                            <input value="<?php echo (new DateTime('+7 day'))->format('Y-m-d H:i:s'); ?>" name="end_date" type="hidden" step="any">
                            <input type="hidden" value="08:00" name="hour" required>
                            <button href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</button>
                        </form>
                    </p>
                </div>
                <div class="col-sm-12 col-md-3 mb-3 text-center corner table-bordered bg-white p-4">
                    <p>
                        <h4>BMI Goal</h4>
                        <small>Normal BMI: 18.5 - 24.9</small>
                        <br/>
                        <small>Set: 20</small>
                        <br/>
                        <form action="{{ url('setBmiGoal') }}" method="POST">
                            {{csrf_field()}}
                            <input value="20" name="bmi" type="hidden" step="any">
                            <input value="daily" name="frequency" type="hidden" step="any">
                            <input value="<?php echo date('Y-m-d'); ?>" name="start_date" type="hidden" step="any">
                            <input value="<?php echo (new DateTime('+7 day'))->format('Y-m-d H:i:s'); ?>" name="end_date" type="hidden" step="any">
                            <input type="hidden" value="08:00" name="hour" required>
                            <button href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</button>
                        </form>
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
                                {{-- <figure><img src="img/avatar1.jpg" alt=""></figure> --}}
                                <small></small>
                                
                                {{-- <a href="#0" class="btn_1 gray"><i class="fa fa-fw fa-user"></i> View profile</a> --}}
                                <p>
                                    
                                </p>
                            </li>
                            <li>
                                {{-- <figure><img src="img/avatar1.jpg" alt=""></figure> --}}
                                <small></small>
                                <p>
                                    <h5>Systolic < 120 and Diastolic < 80</h5>
                                    <br/>
                                    <a href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-plus-circle"></i> Approve</a>
                                </p>

                                {{-- <p><a href="#0" class="btn_1 btn shadow gray approve wishlist_close"><i class="fa fa-fw fa-user"></i> View profile</a></p> --}}
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
                                @if(isset($bloodPressureGoal)) {{ $bloodPressureGoal->systolic }} @else No Value @endif </li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Diastolic</strong> <br/> 
                                @if(isset($bloodPressureGoal)) {{ $bloodPressureGoal->diastolic }} @else No Value @endif</li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Frequency</strong> <br/> 
                                @if(isset($bloodPressureGoal)) {{ ucfirst($bloodPressureGoal->frequency) }} @else No Value @endif</li>
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
                                    @isset($bloodPressureGoal)
                                        @if($bloodPressureGoal->status == 'activate')
                                            <li><br><a href="#0" class="btn_1 btn btn-inverse btn2 shadow gray"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</a></li> 
                                        @else
                                             <li><a href="#0" class="btn_1 btn btn2 shadow gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</a></li>
                                        @endif
                                    @endisset
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
                                @if(isset($bloodGlucoseGoal)) {{ $bloodGlucoseGoal->bg_goal }} @else No Value @endif </li>
                            <!-- <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Diastolic</strong> <br/> 
                                @if(isset($bloodGlucoseGoal)) {{ $bloodGlucoseGoal->diastolic }} @else No Value @endif</li>
                            <li class="text-center round_box activeBPLink text-white justify-content-center">
                                <br><strong>Frequency</strong> <br/> 
                                @if(isset($bloodGlucoseGoal)) {{ ucfirst($bloodGlucoseGoal->frequency) }} @else No Value @endif</li> -->
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
                                        @isset($bloodGlucoseGoal)
                                            @if($bloodGlucoseGoal->status == 'activate')
                                                <li><br><a href="#0" class="btn_1 btn btn-inverse btn2 shadow gray"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</a></li> 
                                            @else
                                                 <li><a href="#0" class="btn_1 btn btn2 shadow gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</a></li>
                                            @endif
                                        @endisset
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
                            <hr/>
                            <div class="list_general">
                                <ul class="d-flex justify-content-around">
                                    <li class="text-center round_box activeBPLink text-white justify-content-center" style="margin-left: -40px;">
                                        <br><strong>BMI Goal</strong> <br>
                                        @if(isset($bmiGoal)) {{ $bmiGoal->bmi }} @else No Value @endif </li>
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
                                        @isset($bmiGoal)
                                            <table class="table table-bordered table-stripped">
                                                <tr><th><strong>Weight</strong></th><td> {{ $bmiGoal->weight }}</td></tr>
                                                <tr><th><strong>Height</strong></th><td> {{ $bmiGoal->height }}</td></tr>
                                                <tr><th><strong>Body Mass Index</strong></th><td>{{ $bmiGoal->bmi }}</td></tr>
                                                <tr><th><strong>Frequency</strong></th><td> {{ ucfirst($bmiGoal->frequency) }}</td></tr>
                                                <tr><th><strong>Time</strong></th><td> {{ $bmiGoal->hour.':00:00' }}</td></tr>
                                                @if($bmiGoal->frequency == 'weekly') 
                                                    <tr><th><strong>Week Day</strong></th><td> {{ ucfirst($weekMap[$bmiGoal->weekDay]) }}</td></tr>
                                                @elseif($bmiGoal->frequency == 'monthly')
                                                    <tr><th><strong>Month Day</strong></th><td> {{ $bmiGoal->monthDay }}</td></tr>
                                                @else
                                                @endif
                                            @else
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
                                            
                                            @endisset
                                    </li>
                                </ul>
                                <p class="buttons">
                                    @isset($bmiGoal)
                                        @if($bmiGoal->status == 'activate')
                                            <li><button id="activateOrDeactivateBMI" data-id={{ $bmiGoal->id }} class="btn_1 gray"><i class="fa fa-fw fa-times-circle-o"></i> Deactivate</button></li> 
                                        @else
                                             <li><button id="activateOrDeactivateBMI" data-id={{ $bmiGoal->id }}  class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Activate</button></li>
                                        @endif
                                    @endisset
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            



                @php
                    $weekMap = [
                    1 => 'Sunday',
                    2 => 'Monday',
                    3 => 'Tuesday',
                    4 => 'Wednesday',
                    5 => 'Thursday',
                    6 => 'Friday',
                    7 => 'Saturday',
                ];
                @endphp  

             
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
                    
                    <form action="{{ url('setBmiGoal') }}" method="POST">
                            {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                @if(!isset($bmiGoal))
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <label>Height</label>
                                        <input class="form-control shadow" value="@isset($bmiGoal->height){{ $bmiGoal->height }}@endisset" name="height" type="number" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <small>Measurement Unit (ft/cm)</small>
                                            <select name="height_unit" class="form-control shadow" style="font-size: 80%; font-weight: 400;" required>
                                                <option value="cm">Centimeter</option>
                                                <option value="feet">Feet</option>
                                            </select>
                                    </div>
                                </div> -->
                                @else
                                    <!-- <input class="form-control shadow" value="@isset($bmiGoal->height){{ $bmiGoal->height }}@endisset" name="height" type="hidden" step="any"> -->
                                @endif
                                
                                <span>
                                
                            </span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>BMI</label>
                                        <input name="bmi" type="number" value="@isset($bmiGoal){{ $bmiGoal->bmi }}@endisset" class="form-control shadow" step="any">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <label>Weight</label>
                                        <input name="weight" type="number" value="@isset($bmiGoal){{ $bmiGoal->weight }}@endisset" class="form-control shadow" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Unit (lbs/kg)</label>
                                            <select name="weight_unit" class="form-control shadow" style="font-size: 80%; font-weight: 400;" required>
                                               <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                               <option value="lbs">Pounds</option>
                                               <option value="kg">Kilogram</option>
                                            </select>
                                        
                                    </div>
                                </div> -->
                                
                            </div>
                           <!--  <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Frequency</label>
                                        <select class="form-control shadow" name="frequency" onchange="changePlan(value);" required>
                                            <option value="@isset($bmiGoal){{ $bmiGoal->frequency }}@endisset">@isset($bmiGoal){{ $bmiGoal->frequency }}@endisset</option>
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
                                <button type="button" class="btn_1 btn btn2 shadow default gray" data-dismiss="modal">Close</button>
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
                    
                    <form action="{{ url('setBGGoal') }}" method="POST">
                            {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Blood Glucose Goal</label>
                                        <input name="bg_goal" type="number" value="@isset($bloodGlucoseGoal->bg_goal){{ $bloodGlucoseGoal->bg_goal }}@endisset" class="form-control shadow" step="any">
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
                                <button type="button" class="btn_1 btn btn2 shadow default gray" data-dismiss="modal">Close</button>
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
                    
                    <form action="{{ url('setBPGoal') }}" method="POST">
                            {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Systolic</label>
                                        <input class="form-control shadow" value="{{ old('systolic') }}" name="systolic" type="number" step="any">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Diastolic</label>
                                        <input class="form-control shadow" value="{{ old('diastolic') }}" name="diastolic" type="number" step="any">
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
                                <button type="button" class="btn_1 btn btn2 shadow default gray" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 shadow activeBPLink gray approve">Set Blood Pressure Goal</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
        </div>
        <!-- /Blood Pressure -->
       
@endsection

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