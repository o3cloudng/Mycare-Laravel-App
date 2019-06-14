

@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        @include('layouts.service_menu')
        <!-- Icon Cards-->
        <div class="box_general padding_bottom">          
          <div class="header_box version_2">
            <h2><i class="fa fa-line-chart"></i>Blood Glucose Statistics </h2>
          </div>
          <div class="row">

             <div class="col-xl-4 col-sm-6 mb-3" style="padding-left: 10%;">
                  <canvas data-type="linear-gauge"
                    data-width="120"
                    data-height="300"
                    data-units="Blood Pressure"
                    data-min-value="0"
                    data-start-angle="90"
                    data-ticks-angle="180"
                    data-value-box="false"
                    data-max-value="200"
                    data-major-ticks="0,20,40,60,80,100,120,140,160,180,200"
                    data-minor-ticks="2"
                    data-stroke-ticks="true"
                    data-highlights='[ {"from": 140, "to": 200, "color": "rgba(200, 50, 50, .75)"}]'
                    data-color-plate="#fff"
                    data-border-shadow-width="0"
                    data-borders="true"
                    data-needle-type="arrow"
                    data-needle-width="2"
                    data-needle-circle-size="7"
                    data-needle-circle-outer="true"
                    data-needle-circle-inner="false"
                    data-animation-duration="1500"
                    data-animation-rule="linear"
                    data-bar-width="20"
                    data-value="@isset( $bgs ){{ $bgs[0]->bg }} @endisset"
                ></canvas>
              <h5 style="margin-left: -40px; margin-bottom: -20px; color: #aaa !important;">Glucose: @isset( $bgs ){{ $bgs[0]->bg }} @endisset</h5><br>
              <small class="text-center ml-4">(@isset( $bgs ){{ $bgs[0]->created_at->diffForHumans() }} @endisset)</small>
              </div>
              <div class="col-xl-8 col-sm-6 h-100">
                <!-- <div class="box_general padding_bottom"> -->
                  @if(count($bps) > 0)
                    <canvas id="bloodGlucoseGraph" width="100%" height="30" style="margin:45px 0 15px 0;height: 400px !important;"></canvas>
                    <div class="card-footer small text-muted">Last 7 Days</div>
                  @else 
                    <br>
                    <br>
                    <br>
                    <p class="text-center">No Blood Pressure Recorded Yet</p>
                  @endif
                </div>
                
              <!-- </div> -->

          </div>
        </div>


      </div>
    </div>
        <!-- /.container-fluid-->
  </div>

  </div>
</div>


@endsection
@section('scripts')
<script>

window.addEventListener('load', function() {
    // Line Graph for Blood Glucose
    var bgs = {!! json_encode($bgs) !!}
    var bgs = bgs.reverse(bgs);
    var date = [];
    var bloodGlucose = [];
    // alert(bgs[1].id);

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
            fill: true
          }
        ]
      },
      options: {
        scales: {
          xAxes: [{
            reverse: false
            }]
        }
      }
    });
});


  function gauge() {
    var gauge = new LinearGauge({
        renderTo: 'canvas-id',
        width: 120,
        height: 400,
        units: "BP",
        minValue: 0,
        startAngle: 90,
        ticksAngle: 180,
        valueBox: false,
        maxValue: 220,
        majorTicks: [
            "0",
            "20",
            "40",
            "60",
            "80",
            "100",
            "120",
            "140",
            "160",
            "180",
            "200"
        ],
        minorTicks: 2,
        strokeTicks: true,
        highlights: [
            {
                "from": 100,
                "to": 220,
                "color": "rgba(200, 50, 50, .75)"
            }
        ],
        colorPlate: "#fff",
        borderShadowWidth: 0,
        borders: false,
        needleType: "arrow",
        needleWidth: 2,
        needleCircleSize: 7,
        needleCircleOuter: true,
        needleCircleInner: false,
        animationDuration: 1500,
        animationRule: "linear",
        barWidth: 10,
        value: 35
    }).draw();
  }


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


    // Line Graph to show Blood Pressure trend

  }
  
</script>
@endsection