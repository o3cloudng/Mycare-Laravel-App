
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MYCARE ADMIN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style/bootstrap-select.min.css">
   
    <!-- Custom styles for this template -->
    <link href="css/style/style.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
<div class="container-fliud h-100">
    <div class="row">
        <div class="col-md-2 h-100 sticky-top" id="sidebar">
            <div class="text-center">
                <a href="/subscription"><img class="img-rounded rounded mt-4" src="img/svg/logo.svg" /></a>
                <br>
                <img class="profile mt-3" src="img/profile.png" /><br/><br/>
                <span>Profile</span>
                <div class="text-left ml-2">
                    <a href="#" class="list-group-item"><img src="img/svg/icons/dashboard.svg" class="menu_icon" /> Dashboard</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/medical_records.svg" class="menu_icon" /> Medical Records</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/contact_team.svg" class="menu_icon" /> Care Team</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/medical_personel.svg" class="menu_icon" /> Medical Personal</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/medication.svg" class="menu_icon" /> Medication</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/goals.svg" class="menu_icon" /> Goal</a>
                    <a href="#" class="list-group-item"><img src="img/svg/icons/subscription.svg" class="menu_icon" /> Subscription</a>
                </div>
            </div>
            <!-- <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p> -->
        </div>
        <div class="col-md-10" style="height:100%;">
                <div id="mainOne" class="">
                        <section>
                            <div class="container mt-4">
                                <div class="row">
                                <div class="col-md-3 ml-4 mt-1">  Hi +234 8045654325,</div>
                                <div class="col-md-4">
                                    <a href="#" class="btn btn2 button shadow mr-2 activeBPLink">MYBP</a>
                                    <a href="#" class="btn btn2 button shadow mr-2">MYBG</a>
                                    <a href="#" class="btn btn2 button shadow mr-2">MYBUMP</a>
                                </div>
                                <div class="col-md-3 text-right"><a href="#"></a><img src="img/svg/icons/settings.svg" id="cog" />  <small>Settings</small></</div>
                                </div>
                            </div>
                        </section>
                        <section>
                                <div class="container mt-4 mb-2">
                                    <div class="row">
                                    <div class="col-md-3 ml-4"> <h3>Blood Pressure</h3></div>
                                    <div class="col-md-3 mt-1">
                                        <span class="float-left">
                                            <select class="selectpicker bg-light list-inline">
                                                <option value="/mybp">Weekly</option>
                                                <!-- <option value="/mybg">MYBG</option>
                                                <option value="/mybump">MYBUMP</option> -->
                                            </select>
                                        </span>
                                    </div>
                                    <div class="col-md-2 mt-1">
                                            <span class="float-right">
                                                <select class="selectpicker bg-light list-inline">
                                                    <option value="/mybp">1 Week Ago</option>
                                                    <!-- <option value="/mybg">MYBG</option>
                                                    <option value="/mybump">MYBUMP</option> -->
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </section>
                          <section>
                            <div class="container">
                                <div class="row">
                                  <div class="col-md-5 text-center my-3 ml-4 mybox shadow" id="mybox_gauge">
                                      <div class="container">
                                          <div class="row">
                                                <div class="col-md-4 my-auto align-middle">
                                                    <h5>Systolic</h5>
                                                </div>
                                                <div class="col-md-8">
                                                        <div id="wrapper" class="mr-5">
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
                                                                    <!-- Meter Outline -->
                                                                    <circle id="outline_curves" r="75" cx="50%" cy="50%" stroke="#f6f6f6" stroke-width="50" stroke-dasharray="235, 471" fill="none"> </circle>
                                                                    
                                                                    <!-- Low Range Zone (Yellow) -->
                                                                    <circle id="low" r="75" cx="50%" cy="50%" stroke="#FDE47F" stroke-width="45" stroke-dasharray="235, 471" fill="none"></circle>
                                                                    
                                                                    <!-- Average Range Zone (Blue) -->
                                                                    <circle id="avg" r="75" cx="50%" cy="50%" stroke="#7CCCE5" stroke-width="45" stroke-dasharray="157, 471" fill="none"></circle>
                                                                    
                                                                    <!-- High Range Zone (Red) -->
                                                                    <circle id="high"  r="75" cx="50%" cy="50%" stroke="#E04644" stroke-width="45" stroke-dasharray="117, 471" fill="none"></circle>
                                                                    
                                                                    <!-- Mask -->
                                                                    <circle id="mask" r="75" cx="50%" cy="50%" stroke="#f6f6f6" stroke-width="50" stroke-dasharray="50, 471" fill="none"></circle>
                                                                    
                                                                    <!-- Outline Ends -->
                                                                    <circle id="outline_ends" r="75" cx="50%" cy="50%" stroke="#f9f9f9" stroke-width="50" stroke-dasharray="2, 250" fill="none">
                                                                    </circle>
                                                
                                                                  <!-- <path id="meter_needle" d="M44.775,82.56h0l77.1,138.464a5.9,5.9,0,0,1-2.66,7.977h0a5.871,5.871,0,0,1-7.932-2.658Z" fill="#495265" />  -->
                                                                  </g>
                                                                </svg>
                                                              </div>
                                                    <p class="mtop"><span class="float-left align-top"><small>0</small></span>
                                                        <span class="float-right align-text-top"><small>200</small></span></p>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-5 ml-3 text-center my-3 mybox shadow" id="mybox_gauge">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 my-auto">
                                               <h5>Diastolic</h5>
                                            </div>
                                            <div class="col-md-8">
                                              <img src="img/diastolic.png" style="width: 100%; margin-bottom: -60px;" />
                                              <span class="float-left"><small>0</small></span><span class="float-right"><small>200</small></span>
                                              <p>&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                          </section>
                          <section>
                              <div class="container">
                                  <div class="row">
                                      <div class="col-md-11">
                                        <div class="card shadow mt-4">
                                            <div class="card-header"><h2><i class="fa fa-line-chart"></i> Blood Pressure Statistics </h2></div>
                                            <div class="card-body">
                                                <img src="img/bloodPressure_Graph.png" alt="Blood Pressure Graph" class="w-100">
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

<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->

<!-- <footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/bootstrap-select.min.js"></script>
    </body>
</html>
