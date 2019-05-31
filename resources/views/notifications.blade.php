
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
            <li class="breadcrumb-item active">Notifications 
                 @if(session('update-notification'))
                    <div class="alert alert-success">{{session('update-notification')}}</div>
                @endif</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Notifications</h2>
            </div>
           
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center">Notification</h5>
                    @if(session('success'))
                        <script type="text/javascript">
                            toastr.success("{{ session('success') }}");
                        </script>
                    @endif
                    @if(session('error'))
                        <script type="text/javascript">
                            toastr.error("{{ session('error') }}");
                        </script>
                    @endif
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Notification</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @if($notifications->count()>0)

                            @foreach($notifications as $notification)
                                <tr>
                                    <td>{{$notification->notification}}</td>
                                    <td>{{$notification->time}}</td>
                                    <td>@if($notification->status==1)Enabled @else Disabled @endif</td>
                                    <td>
                                        <button data-id="{{$notification->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-notification" onclick=""></button>
                                        <button data-id="{{$notification->id}}" class="btn btn-sm btn-danger fa fa-trash del-notification"></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">Thwere are no notificaions</div></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="col-md-4">
                <h5 class="text-center">Add Notifications</h5>
                @if($errors->add_notifications->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->add_notification->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('add-notification'))
                    <div class="alert alert-success">{{session('add-notification')}}</div>
                @endif
                <form action="addNotification" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Notification</label>
                        <textarea class="form-control" value="{{old('notification')}}" name="notification"></textarea>
                    </div>
                    <div class="form-group">
                        <label>time</label>
                        <input class="form-control" value="{{old('time')}}" name="time" type="time">
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status" >
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
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

@section('scripts')
<script>
$(function(){
    $('.del-notification').click(function(){
        if(confirm("Do you want to delete this notification ?")){
            location = 'deleteNotification/'+$(this).data('id');
        }
    })
    $('.edit-notification').click(function(){
        location = 'editNotification/'+$(this).data('id');
    })
})
</script>
@endsection