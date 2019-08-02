@extends('layouts.dashboard')

@section('title')
    Medical Records
@endsection
@section('header')
    Medical Records
@endsection
@section('content')
               <!-- <section>
                    <div class="container">
                        <div class="row">
                          <div class="col-sm-12 col-xs -12 col-md-5 text-center m-3 ml-md-4 mybox shadow" id="mybox_gauge">
                                  <div class="row justify-content-center">
                                        
                                  </div>
                              </div>
                          <div class="col-xs-10 col-sm-10 offset-sm-1 col-md-5 m-3 ml-md-4 text-center my-auto mybox shadow" id="mybox_gauge">
                            <div class="row justify-content-center">

                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </section> -->
                  <section>
                      <div class="container">
                        <div class="row">
                          <a href="blood_pressures" class="col-md-3 col-sm-6 col-xs-6 mybox shadow m-4 d-flex align-items-center records">
                            <h2 id="h2-white">Blood Pressure</h2>
                          </a>
                          <a href="blood_glucoses" class="col-md-3 col-sm-6 col-xs-6 mybox shadow m-4 d-flex align-items-center records">
                            <h2 id="h2-white">Blood Glucose</h2>
                          </a>
                          <a href="bmi" class="col-md-3 col-sm-6 col-xs-6 mybox shadow m-4 d-flex align-items-center records">
                            <h2 id="h2-white">Body Mass Index</h2>
                          </a>
                          <a href="cholesterol" class="col-md-3 col-sm-6 col-xs-6 mybox shadow m-4 d-flex align-items-center records">
                            <h2 id="h2-white">Cholesterol</h2>
                          </a>
                        </div>
                      </div>
                  </section>
            </div>

@endsection
@section('scripts')


@endsection
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->


