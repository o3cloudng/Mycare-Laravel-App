
@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('content')
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
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="box_general padding_bottom" data-aos="fade-right">
          <div class="row">
            <!-- <div class="col-xl-6 col-sm-6 mb-6">
              <h6 style="color: #eb6b2c !important;" class="text-center">Current Body Mass Index (BMI)</h6>
                {{-- <canvas id="bmi_donut" width="300" height="300"></canvas> --}}
                  <p class="text-center"><a href="{{ url("bmi") }}" class="btn_1 gray approve">View History</a></p>
            </div> -->
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                      @if( $currentBloodPressure == 'Normal') 
                        <i class="fa fa-fw fa-caret-up"></i>
                      @elseif ($currentBloodPressure == 'At Risk (Prehypertension)')
                        <i class="fa fa-fw fa-caret-down"></i>
                      @else 
                        <i class="fa fa-fw fa-caret-up"></i>
                      @endif
                  </div>
                  <div class="mr-5">
                    <h5>Blood Pressure </h5>
                    <p>@isset( $currentBP->systolic ){{ $currentBloodPressure .' - '. $currentBP->systolic.'/'.$currentBP->diastolic }} @endisset</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100 bg-warning" >
                <div class="card-body">
                  <div class="card-body-icon">
                      @if( $currentBloodPressure == 'At Risk (Prehypertension)') 
                        <i class="fa fa-fw fa-caret-up"></i>
                      @elseif ($currentBloodPressure == 'Normal')
                        <i class="fa fa-fw fa-caret-down"></i>
                      @else 
                        <i class="fa fa-fw fa-caret-up"></i>
                      @endif
                  </div>
                  <div class="mr-5">
                    <h5>Blood Glucose </h5>
                    <p>@isset( $bgs[0]->bg ){{ $bgs[0]->bg }} @endisset</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-heart"></i>
                </div>
                <div class="mr-5">
                  <h5>Body Mass Index </h5>
                  <p>@isset( $bmi->bmi ){{ $bmi->bmi }} @endisset</p>
                </div>              
              </div>
            </div>
          </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-heart"></i>
                  </div>
                <div class="mr-5" ><h5 style="color: white !important;">Cholesterol</h5></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /cards -->

        {{-- Auth::user() --}}

        <div class="box_general padding_bottom" data-aos="fade-left">
            <div class="header_box version_2">
              <h2><i class="fa fa-line-chart"></i>Blood Pressure Statistics </h2>
            </div>
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

          <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <h2><i class="fa fa-line-chart"></i>Blood Glucose</h2> 
              </div>      
              @if(count($bps) > 0)
                <canvas id="bloodGlucoseGraph" width="100%" height="30"></canvas>
              @else 
                <br>
                <br>
                <br>
                <p class="text-center">No Blood Glucose Recorded Yet</p>
              @endif
            </div>
          </div>
      </div>
    </div>
        <!-- /.container-fluid-->
  </div>

  <!-- Select services modal on page ready -->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addEmergencyLabel">Service subscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form action="{{ url('') }}" method="POST">  
                  {{ csrf_field() }}
              <div class="modal-body">
                <p class="text-center">Kindly subscribe to your prefered service</p>
                <div class="row">
                  <form method="get">
                  <div class="form-group d-flex">  
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="{{ asset('img/myBloodPressure.png') }}" />
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="{{ asset('img/myBloodGlucose.png') }}" />
                      <input type="checkbox" name="chk2" id="item4" value="val2" class="hidden" autocomplete="off">
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                    <img class="img-thumbnail img-check rounded-circle" src="{{ asset('img/myBUMP.png') }}" />
                    <input type="checkbox" name="chk3" id="item4" value="val3" class="hidden" autocomplete="off">
                  </label>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="modal-footer">
                  <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>

                  <input type="submit" value="Submit" class="btn_1 blue">
                  
                  </form>
              </div>
            </div>
          </form> 
      </div>
  </div>
</div>


@endsection
@section('scripts')
<script>

  function subscription() {
    $("#subscribe").modal('show');

    $(".img-check").click(function(){
        $(this).toggleClass("check");
      });
  }
  // setTimeout(subscription, 2000);


  window.onload = function(e) {

    var bmi = {!! json_encode($bmi) !!}

    var bloodMassIndexValue = bmi.bmi;
    if (bloodMassIndexValue < 18.5) {
      var bloodMassIndexStatus = 'Underweight';
      var donutColor = 'yellow';
    } 
    if ( (18.5 <= bloodMassIndexValue) && (bloodMassIndexValue <= 24.9) ) {
      var bloodMassIndexStatus = 'Healthy';
      var donutColor = 'green';
    } 
    if (bloodMassIndexValue >= 25) {
      var bloodMassIndexStatus = 'Overweight';
      var donutColor = 'red';
    } 
    
    //Plugin for center text
    Chart.pluginService.register({
      beforeDraw: function (chart) {
        if (chart.config.options.elements.center) {
          //Get ctx from string
          var ctx = chart.chart.ctx;

          //Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2)
          //Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight);

          //Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = 20+"px " + fontStyle;
          ctx.fillStyle = color;

          //Draw text in center
          ctx.fillText(txt, centerX, centerY);
        }
      }
    });

    //TODO: Use chartjs-plugin-datalabels
    // var bmiDonut = document.getElementById('bmi_donut');
    //     bmiDonut.getContext("2d");
    // var bmiDonutChart = new Chart(bmiDonut, {
    //   type: 'doughnut',
    //   data: {
    //     labels: [bloodMassIndexStatus, ''],
    //     datasets: [{
    //         label: bloodMassIndexStatus,
    //         data: [bloodMassIndexValue, 100-bloodMassIndexValue],
    //         backgroundColor: [
    //           donutColor
    //         ],
    //         borderWidth: 1
    //     }]
    //   },
    //   options: {
    //     rotation:  -Math.PI,
    //     circumference: Math.PI,
    //     elements: {
    //       center: {
    //         text:  bloodMassIndexStatus + ' | ' + bloodMassIndexValue +'%',
    //         color: '#36A2EB', //Default black
    //         fontStyle: 'Arial', //Default Arial
    //       }
    //     },
    //     cutoutPercentage: 80, //Here for innerRadius. It's already exists
    //     // outerRadius: 30,//Here for outerRadius
    //   }
    // });




    // Line Graph for Blood Pressure 

    var bps = {!! json_encode($bps) !!}
    var bps = bps.reverse(bps);
    var systolicData = [];
    var diastolicData = [];
    var date = [];

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
            fill: false
          }, { 
            data: diastolicData,
            label: "Diastolic",
            borderColor: "#8e5ea2",
            fill: false
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Systolic and Diabolistic'
        }
      }
    })

    // Line Graph for Blood Glucose
    var bgs = {!! json_encode($bgs) !!}
    var bgs = bgs.reverse(bgs);
    var date = [];
    var bloodGlucose = [];

    for (var x = 0; x < bgs.length; x++) {
      bloodGlucose.push(bgs[x]['bg']);
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
            data: bloodGlucose,
            label: "Glucose",
            borderColor: "#3e95cd",
            fill: false
          }
        ]
      },
      options: {
        scales: {
          xAxes: [{
            reverse: false
            }]
        }
        // title: {
        //   display: true,
        //   reverse: true,
        //   text: 'Blood Glucose'
        // }
      }
    })

    // Line Graph to show Blood Pressure trend

  }
  
</script>
@endsection