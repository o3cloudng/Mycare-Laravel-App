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
            <h2><i class="fa fa-line-chart"></i>Blood Pressure Statistics </h2>
          </div>
          <div class="row">
             <div class="col-xl-5 col-sm-12 mb-3" >
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             <script type="text/javascript">
                google.charts.load('current', {'packages':['gauge']});
                google.charts.setOnLoadCallback(drawChart);
                google.charts.setOnLoadCallback(drawChartDiastolic);

                var bps = {!! json_encode($bps) !!}
                var sysData = bps[0].systolic;
                var diasData = bps[0].diastolic;

                function drawChart() {

                  var data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['Systolic', sysData]
                    ]);

                  var options = {
                    width: 400, height: 210,
                    redFrom: 140, redTo: 200,
                    yellowFrom:120, yellowTo: 140,
                    greenFrom:60, greenTo: 120,
                    minorTicks: 10,
                    max: 200
                  };

                  var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                  chart.draw(data, options);
                }

                function drawChartDiastolic() {

                  var data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['Diastolic', diasData]
                    ]);

                  var options = {
                    width: 400, height: 210,
                    redFrom: 90, redTo: 100,
                    yellowFrom:80, yellowTo: 90,
                    greenFrom:50, greenTo: 80,
                    minorTicks: 10,
                    max: 100
                  };

                  var chart_diastolic = new google.visualization.Gauge(document.getElementById('chart_div_sys'));

                  chart_diastolic.draw(data, options);
                }
              </script>
              <p class="text-center mt-1 pt-0">(@isset( $bps ){{ $currentBP->created_at->diffForHumans() }} @endisset)</p>
              <div class="col-xl-3 col-sm-6" id="chart_div" style="float: left;"></div>
              <div class="col-xl-3 col-sm-6" id="chart_div_sys" style="float: left; margin-left: 25%;"></div>
            </div>
              <!-- </div> -->
              <div class="col-xl-7 col-sm-12" focusin="bloodPressure()">
                <!-- <button class="btn"  onclick="bloodPressure()"> Click me </button> -->
                <!-- <div class="box_general padding_bottom"> -->
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
                
              <!-- </div> -->

          </div>
        </div>


      </div>
    </div>
        <!-- /.container-fluid-->
  <!-- </div>

  </div>
</div> -->

@endsection
@section('scripts')
<script>
  window.addEventListener('load', function() {
    // console.log('All assets are loaded');
    // alert("All assets are loaded");

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
