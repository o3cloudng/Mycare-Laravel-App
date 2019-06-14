<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
element.style {
font-size: 0px;
}
</style>
    <div class="content-wrapper">
      <div class="container-fluid">
        <?php echo $__env->make('layouts.service_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Icon Cards-->
        <div class="box_general padding_bottom">
          <div class="row">

             <div class="col-xl-3 col-sm-6 mb-3" style="margin: auto -40px 0px 40px;">
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
                    data-value="<?php if(isset( $currentBP )): ?><?php echo e($currentBP->systolic); ?> <?php endif; ?>"
                ></canvas>
              <h5 style="margin-left: -40px; margin-bottom: -20px; color: #aaa !important;">Current BP: <?php if(isset( $currentBP )): ?><?php echo e($currentBP->systolic); ?>/<?php echo e($currentBP->diastolic); ?> (<?php echo e($currentBloodPressure); ?>) <?php endif; ?></h5><br>
              <small class="text-center ml-4">(<?php if(isset( $bps )): ?><?php echo e($currentBP->created_at->diffForHumans()); ?> <?php endif; ?>)</small>
              </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card dashboard text-white bg-info o-hidden h-100 bg-warning" >
                    <div class="card-body">
                      <div class="card-body-icon">
                          <?php if( $currentBloodPressure == 'At Risk (Prehypertension)'): ?> 
                            <i class="fa fa-fw fa-caret-up"></i>
                          <?php elseif($currentBloodPressure == 'Normal'): ?>
                            <i class="fa fa-fw fa-caret-down"></i>
                          <?php else: ?> 
                            <i class="fa fa-fw fa-caret-up"></i>
                          <?php endif; ?>
                      </div>
                      <div class="mr-5">
                        <h5>Blood <br/>Glucose </h5>
                        <p><h1 class="text-center text-white mt-5"><?php echo e(isset( $bgs[0]->bg ) ? $bgs[0]->bg : "N/A"); ?></h1></p>
                      </div>
                        <p>
                          <h6 class="text-center text-white my-auto">
                            <?php if($bgs[0]->bg < 101): ?>
                              Normal
                            <?php elseif(($bgs[0]->bg > 100) && ($bgs[0]->bg < 126)): ?>
                              Pre-Diabetes
                            <?php elseif($bgs[0]->bg > 125): ?>
                              Daibetes
                            <?php else: ?>
                              N/A
                            <?php endif; ?>
                          </h6>
                        </p>
                  <p class="text-center">(<?php echo e(isset( $bgs_last ) ? $bgs[0]->created_at->diffForHumans() : "N/A"); ?>)</p>
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
                  <p><h1 class="text-white text-center mt-5"><?php if(isset( $bmi->bmi )): ?><?php echo e($bmi->bmi); ?> <?php endif; ?></h1></p>
                </div>              
                  <p><h6 class="text-white text-center"><?php if(isset( $bmi->bmi )): ?><?php echo e($bmi->status); ?> <?php endif; ?></h6></p>
              <p class="text-center">( <?php echo e(isset( $bmi ) ? $bmi->created_at->diffForHumans() : "N/A"); ?>)</p>
              </div>
            </div>
          </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-heart"></i>
                  </div>
                <div class="mr-5" >
                  <h5 style="color: white !important;">Cholesterol</h5>
                  <p><h1 class="text-white text-center mt-5"><?php echo e(isset( $cholesterol ) ? $cholesterol->total_cholesterol : "N/A"); ?> /  
                    <?php echo e(isset( $cholesterol ) ? $cholesterol->high_density_lipoprotein : "N/A"); ?></h1></p>
                </div>
                  <p><h6 class="text-white text-center my-auto"><?php echo e(isset( $cholesterol ) ? $cholesterol->total_cholesterol_status : "N/A"); ?></h6></p> 
              <p class="text-center">( <?php echo e(isset( $cholesterol ) ? $cholesterol->created_at->diffForHumans() : "N/A"); ?>)</p>
                </div>
              </div>
            </div>

          </div>
        </div>

       <!--  <div class="box_general padding_bottom" data-aos="fade-right">
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100 bg-warning" >
                <div class="card-body">
                  <div class="card-body-icon">
                      <?php if( $currentBloodPressure == 'At Risk (Prehypertension)'): ?> 
                        <i class="fa fa-fw fa-caret-up"></i>
                      <?php elseif($currentBloodPressure == 'Normal'): ?>
                        <i class="fa fa-fw fa-caret-down"></i>
                      <?php else: ?> 
                        <i class="fa fa-fw fa-caret-up"></i>
                      <?php endif; ?>
                  </div>
                  <div class="mr-5">
                    <h5>Blood Pressure </h5>
                    <p><?php if(isset( $bgs[0]->bg )): ?><?php echo e($bgs[0]->bg); ?> <?php endif; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-info o-hidden h-100 bg-warning" >
                <div class="card-body">
                  <div class="card-body-icon">
                      <?php if( $currentBloodPressure == 'At Risk (Prehypertension)'): ?> 
                        <i class="fa fa-fw fa-caret-up"></i>
                      <?php elseif($currentBloodPressure == 'Normal'): ?>
                        <i class="fa fa-fw fa-caret-down"></i>
                      <?php else: ?> 
                        <i class="fa fa-fw fa-caret-up"></i>
                      <?php endif; ?>
                  </div>
                  <div class="mr-5">
                    <h5>Blood Glucose </h5>
                    <p><?php if(isset( $bgs[0]->bg )): ?><?php echo e($bgs[0]->bg); ?> <?php endif; ?></p>
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
                  <p><?php if(isset( $bmi->bmi )): ?><?php echo e($bmi->bmi); ?> <?php endif; ?></p>
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
        </div> -->
        <!-- /cards -->
            <!-- <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100">
                <div class="card-body" style="height: 300px !important;">
                    <div id="chart-container">Fusion</div>
                  </div>
                </div>
              </div> -->
 



        <div class="box_general padding_bottom" data-aos="fade-left">
            <div class="header_box version_2">
              <h2><i class="fa fa-line-chart"></i>Blood Pressure Statistics </h2>
            </div>
            <?php if(count($bps) > 0): ?>
              <canvas id="bloodPressureGraph" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
              <div class="card-footer small text-muted">Last 7 Days</div>
            <?php else: ?> 
              <br>
              <br>
              <br>
              <p class="text-center">No Blood Pressure Recorded Yet</p>
            <?php endif; ?>
          </div>

          <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <h2><i class="fa fa-line-chart"></i>Blood Glucose</h2> 
              </div>      
              <?php if(count($bps) > 0): ?>
                <canvas id="bloodGlucoseGraph" width="100%" height="30"></canvas>
              <?php else: ?> 
                <br>
                <br>
                <br>
                <p class="text-center">No Blood Glucose Recorded Yet</p>
              <?php endif; ?>
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
          <form action="<?php echo e(url('')); ?>" method="POST">  
                  <?php echo e(csrf_field()); ?>

              <div class="modal-body">
                <p class="text-center">Kindly subscribe to your prefered service</p>
                <div class="row">
                  <form method="get">
                  <div class="form-group d-flex">  
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBloodPressure.png')); ?>" />
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                      <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBloodGlucose.png')); ?>" />
                      <input type="checkbox" name="chk2" id="item4" value="val2" class="hidden" autocomplete="off">
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="btn btn-info">
                    <img class="img-thumbnail img-check rounded-circle" src="<?php echo e(asset('img/myBUMP.png')); ?>" />
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>


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

  FusionCharts.ready(function() {
  var chart = new FusionCharts({
      type: 'vled',
      renderAt: 'chart-container',
      width: '150',
      height: '250',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "theme": "fusion",
          "caption": "BP",
          "lowerLimit": "0",
          "upperLimit": "100",
          "lowerLimitDisplay": "Too low",
          "upperLimitDisplay": "Too high",
          "numberSuffix": "%",
          "showValue": "1",
          "valueFontSize": "12",
          "showhovereffect": "1",
          "chartBottomMargin": "20",
          "theme": "fusion"
        },
        "colorRange": {
          "color": [{
              "minValue": "0",
              "maxValue": "45",
              "code": "#e44a00"
            },
            {
              "minValue": "45",
              "maxValue": "75",
              "code": "#f8bd19"
            },
            {
              "minValue": "75",
              "maxValue": "100",
              "code": "#6baa01"
            }
          ]
        },
        "value": "52"
      }

    })
    .render();
});


  function subscription() {
    $("#subscribe").modal('show');

    $(".img-check").click(function(){
        $(this).toggleClass("check");
      });
  }
  // setTimeout(subscription, 2000);


  window.onload = function(e) {

    var bmi = <?php echo json_encode($bmi); ?>


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

    var bps = <?php echo json_encode($bps); ?>

    // var bps = bps.reverse(bps);
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
    })

    // Line Graph for Blood Glucose
    var bgs = <?php echo json_encode($bgs); ?>

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
        // title: {
        //   display: true,
        //   reverse: true,
        //   text: 'Blood Glucose'
        // }
      }
    });

    // Line Graph to show Blood Pressure trend

  }
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>