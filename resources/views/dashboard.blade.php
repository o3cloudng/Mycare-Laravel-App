<?php
$active = 'mybp';
?>
@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('header')
    Blood Pressure
@endsection
@section('week')
    <!-- <button class="btn button shadow dropdown-toggle" style="inline-block" type="button" data-toggle="dropdown">Weekly
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li class="pl-3"><a href="#">Weekly</a></li>
    </ul>
    &nbsp;&nbsp;
    <button class="btn button shadow dropdown-toggle ml-2" type="button" data-toggle="dropdown" id="dropdownMenu2">1 Week
    <span class="caret"></span></button> -->
@endsection
@section('content')
               <section>
                    <div class="container" style="margin-top: -20px !important;">
                        <div class="row">
                          <div class="col-sm-12 col-xs-12 col-md-3 text-center py-3 m-3 mybox shadow" id="mybox_gauge">
                                  <div class="row justify-content-center">
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-4 my-auto pt-3">
                                            <h5>Systolic</h5>
                                        </div> -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <!-- data-units="(@isset( $currentBP->systolic ){{ $currentBP->systolic }} @endisset) Km/h" -->
                                            <h5>Systolic</h5>
                                           
                                           <p style="height: 120px; overflow: hidden; margin-top: 20px;">
                                             <canvas data-type="radial-gauge"
                                             // animations
                                            animation= "true"
                                            animationDuration= "500"
                                            animationRule= 'cycle'
                                            data-width="170"
                                            data-height="170"
                                            data-units="@if(!empty($currentBP->systolic))
                                                            {{ $currentBP->systolic }}
                                                        @else
                                                            {{ 0 }}
                                                        @endif"
                                            data-min-value="0"
                                            data-start-angle="90"
                                            data-ticks-angle="180"
                                            data-value-box="false"
                                            data-max-value="220"
                                            data-color-needle="#666"
                                            data-color-needle-end="#111"
                                            data-major-ticks="0,20,40,60,80,100,120,140,160,180,200,220"
                                            data-minor-ticks="2"
                                            data-stroke-ticks="true"
                                            data-highlights='[
                                                {"from": 181, "to": 220, "color": "red"},
                                                {"from": 121, "to": 180, "color": "yellow"},
                                                {"from": 0, "to": 120, "color": "green"}
                                            ]'
                                            data-color-plate="#fcfcfc"
                                            data-border-shadow-width="0"
                                            data-borders="false"
                                            data-needle-type="arrow"
                                            data-needle-width="5"
                                            data-needle-circle-size="7"
                                            data-needle-circle-outer="true"
                                            data-needle-circle-inner="false"
                                            data-animation-duration="1500"
                                            data-animation-rule="linear"
                                            data-value="@if(!empty($currentBP->systolic))
                                                            {{ $currentBP->systolic }}
                                                        @else
                                                            {{ 0 }}
                                                        @endif"
                                        ></canvas>
                                           </p>
                                        </div>
                                  </div>
                              </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-3 m-3 py-3 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <!-- <div class="col-xs-12 col-sm-12 col-md-4 my-auto pt-3">
                                   <h5>Diastolic</h5>
                                </div> -->
                                <h5>Diastolic</h5>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <!-- <img src="img/diastolic.png" style="width: 200px !important;" class="img-fluid"/> -->
                                  <p style="height: 120px; overflow: hidden; margin-top: 20px;">
                                             <canvas data-type="radial-gauge"
                                            data-width="170"
                                            data-height="170"
                                            data-units="@if(!empty($currentBP->diastolic))
                                                            {{ $currentBP->diastolic }}
                                                        @else
                                                            {{ 0 }}
                                                        @endif"
                                            data-min-value="0"
                                            data-start-angle="90"
                                            data-ticks-angle="180"
                                            data-value-box="false"
                                            data-max-value="140"
                                            data-color-needle="#666"
                                            data-color-needle-end="#111"
                                            data-major-ticks="0,20,40,60,80,100,120,140"
                                            data-minor-ticks="2"
                                            data-stroke-ticks="true"
                                            data-color-minor-ticks="#ddd"
                                            data-highlights='[
                                                {"from": 91, "to": 140, "color": "red"},
                                                {"from": 81, "to": 90, "color": "yellow"},
                                                {"from": 0, "to": 80, "color": "green"}
                                            ]'
                                            data-color-plate="#fcfcfc"
                                            data-border-shadow-width="0"
                                            data-borders="false"
                                            data-needle-type="arrow"
                                            data-needle-width="5"
                                            data-needle-circle-size="7"
                                            data-needle-circle-outer="true"
                                            data-needle-circle-inner="false"
                                            data-animation-duration="1500"
                                            data-animation-rule="linear"
                                            data-value="@if(!empty($currentBP->diastolic))
                                                            {{ $currentBP->diastolic }}
                                                        @else
                                                            {{ 0 }}
                                                        @endif"
                                        ></canvas>
                                           </p>
                                </div>
                            </div>
                          </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-4 m-3 py-3 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <h5>Blood Pressure</h5>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <h1 style="height: 120px; overflow: hidden; margin-top: 20px; margin-bottom: -35px;">
                                    @isset($bps){{ $currentBP->systolic }}/{{ $currentBP->diastolic }}@endisset
                                  </h1>
                                  <b>BP Goal - @isset($bps){{ $bps[0]->systolic }}/{{ $bps[0]->diastolic }}@endisset </b>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-3 m-3 py-3 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <h5>Blood Glucose</h5>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <h1 style="height: 120px; overflow: hidden; margin-top: 20px; margin-bottom: -35px;">
                                    @isset($bg_today){{ $bg_today }}@endisset mg/dl
                                           </h1>
                                  <b>BG Goal - @isset($bloodGlucoseGoal){{ $bloodGlucoseGoal->bg_goal }}@endisset</b>
                                </div>
                            </div>
                          </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-3 m-3 py-3 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <h5>Choleserol</h5>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <h1 style="height: 120px; overflow: hidden; margin-top: 20px; margin-bottom: -35px;">
                                    @isset($cholesterol){{ $cholesterol->total_cholesterol }}@endisset
                                           </h1>
                                     <b>@isset($cholesterol){{ $cholesterol->total_cholesterol_status }}@endisset</b>
                                           <!-- <b>Current Cholesterol - </b> -->
                                </div>
                            </div>
                          </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-4 m-3 py-3 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <h5>Body Mass Index</h5>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <h1 style="height: 120px; overflow: hidden; margin-top: 20px; margin-bottom: -35px;">
                                    @isset($bmi)
                                      {{ number_format($bmi->bmi, 2) }}
                                   </h1>
                                  <b > 
                                    BMI Goal - @isset($bmi_goal){{ number_format($bmi_goal->bmi, 2) }}@endisset
                                  </b> 
                                    @endisset
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </section>
                  <section class="container">
                    <div class="col-md-11">
                      
                      <div class="row m-4 p-4 d-flex justify-content-center">
                        <button type="button" class="btn shadow default" data-toggle="modal" data-target="#BP">BP Recent History</button>&nbsp;
                        <button type="button" class="btn shadow default" data-toggle="modal" data-target="#BG">Blood Glucose History</button>&nbsp;
                        <button type="button" class="btn shadow default" data-toggle="modal" data-target="#BMI">Body MAss Index</button>&nbsp;
                        <!-- <button type="button" class="btn shadow default">Cholesterol</button>&nbsp; -->
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</div>

<!--  Modal begin here -->

<!-- The Modal -->
<div class="modal fade" id="BP" tabindex="-1" role="dialog" aria-labelledby="addBloodPressureLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addMedicationLabel"><i class="fa fa-line-chart"></i> Blood Pressure recent history</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-2x fa-times" aria-hidden="true"></i>
          </button>
          </div>
          <div class="modal-body">
            <section>
                <!-- <p class="text-center">
                  @if(!empty($currentBP->diastolic))
                      {{ $currentBP->created_at->diffForHumans() }}
                  @else
                      {{ 0 }}
                  @endif
                </p> -->
                <!-- </div> -->
                <div class="col-xl-12 col-sm-12" focusin="bloodPressure()">
                    @if(count($bps) > 0)
                      <canvas id="bloodPressureGraph"></canvas>
                      <div class="card-footer small text-muted">Last 7 Days</div>
                    @else 
                      <br/>
                      <p class="text-center">No Blood Pressure Recorded Yet</p>
                    @endif
          </section>
          </div>  
      </div>
  </div>
</div> <!-- End Blood Pressure History -->

<!-- Blood Glucose -->
<div class="modal fade" id="BG" tabindex="-1" role="dialog" aria-labelledby="addBloodGlucoseLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addMedicationLabel"><i class="fa fa-line-chart"></i> Blood Glucose recent history</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-2x fa-times" aria-hidden="true"></i>
          </button>
          </div>
          <div class="modal-body">
            <section>
                <div class="col-xl-12 col-sm-12" focusin="bloodPressure()">
                    @if(count($bgs) > 0)
                      <canvas id="bloodGlucoseGraph"></canvas>
                      <div class="card-footer small text-muted">Last 7 Days</div>
                    @else 
                      <br/>
                      <p class="text-center">No Blood Glucose Recorded Yet</p>
                    @endif
          </section>
          </div>  
      </div>
  </div>
</div>

<!-- Boby Mass Index Graph -->
<div class="modal fade" id="BMI" tabindex="-1" role="dialog" aria-labelledby="addBloodGlucoseLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addMedicationLabel"><i class="fa fa-line-chart"></i> Body Mass Index History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-2x fa-times" aria-hidden="true"></i>
          </button>
          </div>
          <div class="modal-body">
            <section>
                <div class="col-xl-12 col-sm-12" focusin="">
                    {{-- $bmi_history --}}
                    @if($bmi_history)
                      <canvas id="bmi"></canvas>
                      <div class="card-footer small text-muted">Last 7 Days</div>
                    @else 
                      <br/>
                      <p class="text-center">No Body Mass Index Recorded Yet</p>
                    @endif
          </section>
          </div>  
      </div>
  </div>
</div>


@endsection
@section('scripts')
<script>
  window.addEventListener('load', function() {
    var bps = {!! json_encode($bps) !!}
    // var bps = bps.reverse(bps);
    var systolicData = [];
    var diastolicData = [];
    var date = [];
    // console.log(bps);

    for (var x = 0; x < bps.length; x++) {
      systolicData.push(bps[x]['systolic']);
      diastolicData.push(bps[x]['diastolic']);
      var day = new Date(bps[x]['created_at']);
      var days = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];

      date.push(days[day.getDay()]);
    }
    let bpLine = document.getElementById('bloodPressureGraph');
    let bpLineGraph = new Chart(bpLine, {
      type: 'line',
      data: {
        labels: date,
        datasets: [{ 
            data: systolicData,
            label: "Systolic",
            borderColor: "#3e95cd",
            fill: true
          }, { 
            data: diastolicData,
            label: "Diastolic",
            borderColor: "#8e5ea2",
            fill: true
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Systolic and Diabolistic'
        }
      }
    });

//      Blood Glucose
    var bgs = {!! json_encode($bgs) !!}
    var bgData = [];
    var date = [];
    // console.log(bgs);

    for (var x = 0; x < bgs.length; x++) {
      bgData.push(bgs[x]['bg']);

      var day = new Date(bgs[x]['created_at']);
      var days = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];

      date.push(days[day.getDay()]);
    }
    let bgLine = document.getElementById('bloodGlucoseGraph');
    let bgLineGraph = new Chart(bgLine, {
      type: 'line',
      data: {
        labels: date,
        datasets: [{ 
            data: bgData,
            label: "Blood Glucose",
            borderColor: "#3e95cd",
            fill: true
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Blood Glucose'
        }
      }
    });
//      Body Mass Index
    var bmi = {!! json_encode($bmi_history) !!}
    var bmiData = [];
    var date = [];

    for (var x = 0; x < bmi.length; x++) {
      bmiData.push(bmi[x]['bmi']);

      var day = new Date(bmi[x]['created_at']);
      var days = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];

      date.push(days[day.getDay()]);
    }
    // console.log(bmi);
    let bmiLine = document.getElementById('bmi');
    let bmiLineGraph = new Chart(bmiLine, {
      type: 'line',
      data: {
        labels: date,
        datasets: [{ 
            data: bmiData,
            label: "Body Mass Index",
            borderColor: "#3e95cd",
            fill: true
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Body Mass Index'
        }
      }
    });
});

  
</script>
@endsection
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->


