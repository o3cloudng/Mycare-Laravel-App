
@extends('layouts.dashboard')

@section('title')
   Notifications
@endsection

@section('notification-active')
black
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Notification
                 @if(session('update-notification'))
                    <div class="alert alert-success">{{session('update-notification')}}</div>
                @endif</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Edit Notification</h2>
            </div>
           
            <div class="row">
               
                <div class="col-md-4 offset-md-4">
                <h5 class="text-center">Update Notification</h5>
                @if($errors->update_notification->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->update_notification->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('update-notification'))
                    <div class="alert alert-success">{{session('update-notification')}}</div>
                @endif
                <form action="/updateNotification" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Notification</label>
                        <textarea class="form-control" value="" name="notification">{{$notification->notification}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>time</label>
                        <input class="form-control" value="{{$notification->time}}" name="time" type="time">
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control"  name="status">
                            <option value="{{$notification->status}}">@if($notification->status==1)Enable @else Disable @endif</option>
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{$notification->id}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>  
                </div>
                
            </div>
            <hr>
            
            
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
