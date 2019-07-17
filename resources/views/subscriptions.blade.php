@extends('layouts.dashboard')

@section('title')
    Subscriptions
@endsection
@section('header')
   <i class="fa fa-user"></i> Subscription Data
@endsection

@section('content')
    <div class="container">
            <div class="row heading">
              <div class="col-md-9">
                <h4 class="">Subscriptions</h4>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <div class="">Subscriptions</div>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-8">
                    <!-- <h5 class="text-center"></h5> -->
                    <table class="table table-bordered" id="medicationTable">
                        <thead>
                          <tr>
                            <th>Phone </th>
                            <th>Services</th>
                            <th>Sub Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>{{ $subscriber->phone }}</th>
                            <th>{{ $subscriber->phone }}</th>
                            <th>{{ $subscriber->phone }}</th>
                        </tr>
                          <tr>
                            <th colspan="3">{{ $subscription[0]->subscriptionServiceName  }}</th>
                        </tr>
                        </tbody>
                        <thead>
                          <tr>
                            <th>Pull</th>
                            <th>User</th>
                            <th>Last Charge</th>
                          </tr>
                        </thead>
                    </table>
                    
                </div>
                <div class="col-md-4">&nbsp;</div>
                
            </div>
          </div>
          <div class="card-footer">&nbsp;</div>
              </div>
            </div>
          <!-- /box_general-->
          <div class="box_general padding_bottom">
                
           
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection