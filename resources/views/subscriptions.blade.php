@extends('layouts.dashboard')

@section('title')
    Subscriptions
@endsection
@section('header')
   <!-- <i class="fa fa-user"></i> --> Subscription Data
@endsection

@section('content')
    <div class="container">
            <div class="row heading shadow-sm">
              <div class="col-md-9">
                <h4 class="">Subscriptions</h4>
              </div>
            </div>
            <div class="row">
              {{--@isset( $subscription )
                @if($subscription[0]->subscriptionExpiryDate)
                  {{ $subscription[0]->subscriptionExpiryDate  }} 
                @else
                  now()->toDateTimeString('Y-m-d')        
                @endif
              @endisset--}}
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row table-responsive">
                <div class="col-md-8">
                    <!-- <h5 class="text-center"></h5> -->
                    <table class="table table-bordered" id="medicationTable">
                        <thead>
                          <tr>
                            <th>Phone </th>
                            <th>Services</th>
                            <th>Service ID</th>
                            <th>Sub Period</th>
                            <th>Sub Amount</th>
                            <th>Sub Date</th>
                            <th>Sub Expire</th>
                            <th>Sub Expire</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <td>@isset( $subscriber ){{ $subscriber->phone  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionServiceName  }} @endisset  </td>
                        
                            <td>@isset( $subscription ){{ $subscription[0]->serviceID  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionPeriod  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionAmount  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionReqTime  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionExpiryDate  }} @endisset  </td>
                            <td>@isset( $subscription ){{ $subscription[0]->subscriptionExpiryDate  }} @endisset  </td>
                        </tr>
                        </tbody>
                        <thead>
                          <tr>
                            <th>Phone </th>
                            <th>Services</th>
                            <th>Service ID</th>
                            <th>Sub Period</th>
                            <th>Sub Amount</th>
                            <th>Sub Date</th>
                            <th>Sub Expire</th>
                            <th>Sub Expire</th>
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