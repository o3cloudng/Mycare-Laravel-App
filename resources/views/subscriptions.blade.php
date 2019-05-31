
@extends('layouts.dashboard')

@section('title')
    Personal Profile
@endsection

@section('subscription-active')
black
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Subscriptions</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Subscription Data</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Subscriptions</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>Pull</th>
                            <th>User</th>
                            <th>Last Charge</th
                        </tr>
                    </table>
                    
                </div>
                
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