@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('header')
    Blood Pressure
@endsection
@section('week')
    <button class="btn button shadow dropdown-toggle" style="inline-block" type="button" data-toggle="dropdown">Weekly
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li class="pl-3"><a href="#">Weekly</a></li>
    </ul>
    &nbsp;&nbsp;
    <button class="btn button shadow dropdown-toggle ml-2" type="button" data-toggle="dropdown" id="dropdownMenu2">1 Week
    <span class="caret"></span></button>
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
                                            <img src="img/systolic.png" style="width: 200px !important;" class="img-fluid"/>
                                              <div class="w-70"><span class="float-left">0</span><span class="float-right">200</span></div>
                                            <!-- <div id="wrapper" class="mr-5">
                                                    <svg id="meter">
                                                            <defs>
                                                                <filter id="meter_needle" x="0" y="0" width="300" height="250" filterUnits="userSpaceOnUse">
                                                                    <feOffset dy="3" input="SourceAlpha"/>
                                                                    <feGaussianBlur stdDeviation="5" result="blur"/>
                                                                    <feFlood flood-opacity="0.2"/>
                                                                    <feComposite operator="in" in2="blur"/>
                                                                    <feComposite in="SourceGraphic"/>
                                                                </filter>
                                                            </defs>
                                                        <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#meter_needle)">
                                                         --><!-- Meter Outline -->
                                                        <!-- <circle id="outline_curves" r="75" cx="50%" cy="50%" stroke="#f6f6f6" stroke-width="50" stroke-dasharray="235, 471" fill="none"> </circle> -->
                                                        
                                                        <!-- Low Range Zone (Orane) -->
                                                        <!-- <circle id="low" r="75" cx="50%" cy="50%" stroke="#F7A501" stroke-width="45" stroke-dasharray="235, 471" fill="none"></circle>
                                                         -->
                                                        <!-- Average Range Zone (Green) -->
                                                        <!-- <circle id="avg" r="75" cx="50%" cy="50%" stroke="#219106" stroke-width="45" stroke-dasharray="157, 471" fill="none"></circle>
                                                         -->
                                                        <!-- High Range Zone (Red) -->
                                                        <!-- <circle id="high"  r="75" cx="50%" cy="50%" stroke="#E04644" stroke-width="45" stroke-dasharray="117, 471" fill="none"></circle>
                                                         -->
                                                        <!-- Mask -->
                                                        <!-- <circle id="mask" r="75" cx="50%" cy="50%" stroke="#f6f6f6" stroke-width="50" stroke-dasharray="10, 471" fill="none"></circle>
                                                         -->
                                                        <!-- Outline Ends -->
                                                        <!-- <circle id="outline_ends" r="75" cx="50%" cy="50%" stroke="#f9f9f9" stroke-width="50" stroke-dasharray="2, 250" fill="none">
                                                        </circle>
                                                        </g>
                                                    </svg>
                                                </div> -->
                                        <!-- <p class="mtop"><span class="float-left align-top"><small>0</small></span>
                                            <span class="float-right align-text-top"><small>200</small></span></p> -->
                                        </div>
                                  </div>
                              </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-5 m-3 ml-md-4 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">
                                <div class="col-xs-12 col-sm-12 col-md-4 my-auto pt-3">
                                   <h5>Diastolic</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                  <img src="img/diastolic.png" style="width: 200px !important;" class="img-fluid"/>
                                  <div class="w-70"><span class="float-left">0</span><span class="float-right">200</span></div>
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
                                        <img src="img/bloodPressure_Graph.png" alt="Blood Pressure Graph" class="w-100 img-fluid">
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


@endsection
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->


