@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('content')
      <div class="container">
          <div class="row">
             <div class="col-xl-5 col-sm-12 mb-3" >
              <p class="text-center mt-1 pt-0">(@isset( $bps ){{ $currentBP->created_at->diffForHumans() }} @endisset)</p>
            </div>
              <!-- </div> -->
              <div class="col-xl-7 col-sm-12" focusin="bloodPressure()">
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
