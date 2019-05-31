
@extends('layouts.dashboard')

@section('title')
    Personal Profile
@endsection

@section('settings-active')
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
            <li class="breadcrumb-item active">Settings</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Settings</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h6 class="text-center">Notifications Mycare plus only sends you important updates to help you advance</h6>
                    Emergency Contact: Notify when something goes wrong
                  
                                </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <h6 class="text-center">Turn on/off the notifications below</h6>
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="enableNotification" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="enable_notification" value="1">
                                    <input type="submit" class="btn btn-primary" value="Enable">
                                </form>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <form action="disableNotification" method="POST">
                                    {{csrf_field()}}
                                        <input type="hidden" name="enable_notification" value="0">
                                        <input type="submit" class="btn btn-danger" value="Disabled">
                                </form>
                            </div>
                        </div>      
                    <!-- /row-->
            </div>
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection