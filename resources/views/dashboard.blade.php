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
                    <div class="container">
                        <div class="row">
                          <div class="col-sm-12 col-xs -12 col-md-5 text-center m-3 ml-md-4 mybox shadow" id="mybox_gauge">
                                  <div class="row justify-content-center">
                                        <div class="col-xs-12 col-sm-12 col-md-4 my-auto pt-3">
                                            <h5>Systolic</h5>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8">
                                           
                                           <p style="height: 160px; overflow: hidden; margin-top: 20px;">
                                             <canvas data-type="radial-gauge"
                                             // animations
                                            animation= "true"
                                            animationDuration= "500"
                                            animationRule= 'cycle'
                                            data-width="230"
                                            data-height="230"
                                            data-units="(@isset( $bps ){{ $currentBP->systolic }} @endisset) Km/h"
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
                                                {"from": 181, "to": 220, "color": "#9D0000"},
                                                {"from": 121, "to": 180, "color": "#F1BC4E"},
                                                {"from": 0, "to": 120, "color": "#35843C"}
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
                                            data-value="@isset( $bps ){{ $currentBP->systolic }} @endisset"
                                        ></canvas>
                                           </p>
                                        </div>
                                  </div>
                              </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-5 m-3 ml-md-4 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <div class="col-xs-12 col-sm-12 col-md-4 my-auto pt-3">
                                   <h5>Diastolic</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                  <!-- <img src="img/diastolic.png" style="width: 200px !important;" class="img-fluid"/> -->
                                  <p style="height: 160px; overflow: hidden; margin-top: 20px;">
                                             <canvas data-type="radial-gauge"
                                            data-width="230"
                                            data-height="230"
                                            data-units="@isset( $bps ){{ $currentBP->diastolic }} @endisset Km/h"
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
                                            data-value="@isset( $bps ){{ $currentBP->diastolic }} @endisset"
                                        ></canvas>
                                           </p>
                                  <!-- <div class="w-70"><span class="float-left">0</span><span class="float-right">200</span></div> -->
                                  <!-- <span class=""><small>0</small></span><span class="float-right"><small>200</small></span> -->
                                  <!-- <p>&nbsp;</p> -->
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </section>
                  <section>
                      <div class="container">
                          <div class="row">
                              <div class="col-md-11 my-auto">
                                <div class="card shadow mt-4">
                                    <div class="card-header"><h2><i class="fa fa-line-chart"></i> Blood Pressure Statistics </h2></div>
                                    <div class="card-body">
                                      <div class="row">
                                       <div class="col-xl-12 col-sm-12 mb-3" >
                                        <p class="text-center mt-1 pt-0">(@isset( $bps ){{ $currentBP->created_at->diffForHumans() }} @endisset)</p>
                                      </div>
                                        <!-- </div> -->
                                        <div class="col-xl-12 col-sm-12" focusin="bloodPressure()">
                                            @if(count($bps) > 0)
                                              <canvas id="bloodPressureGraph" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
                                              <div class="card-footer small text-muted">Last 7 Days</div>
                                            @else 
                                              <br>
                                              <br>
                                              <br>
                                              <p class="text-center">No Blood Pressure Recorded Yet</p>
                                            @endif
                                          </div>
                                    </div>
                                        <!-- <img src="img/bloodPressure_Graph.png" alt="Blood Pressure Graph" class="w-100 img-fluid"> -->
                                    </div>
                                    <div class="card-footer">&nbsp;</div>
                                </div>
                              </div>
                          </div>
                      </div>
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
});
  
</script>
@endsection
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->


