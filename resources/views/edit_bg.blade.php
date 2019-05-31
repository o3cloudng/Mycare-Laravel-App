
@extends('layouts.dashboard')

@section('title')
    Edit Blood Glucose - Personal Profile
@endsection

@section('medical-active')
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
            <li class="breadcrumb-item active"><a href="{{ url('/blood_glucoses') }}">Blood Glucoses</a></li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Medical Records</h2>
            </div>
           
            <div class="row">
            
                <div class="col-md-6 col-md-offset-3">
                        
                    <h5 class="text-center">Update Blood Glucose</h5>
                    @if($errors->update_bg->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->update_bg->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('update-bg'))
                        <div class="alert alert-success">{{session('update-bg')}}</div>
                    @endif
                    <form action="{{ url('updateBG') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Glucose</label>
                                <input class="form-control" value="{{$bg->bg}}" name="blood_glucose" type="text">
                            </div>
                            <input type="hidden" name="id" value="{{ $bg->id }}">
                            
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

@section('scripts')
<script>
$(function(){
    $('.del-diagnosis').click(function(){
        if(confirm("Do you want to delete this diagnosis ?")){
            location = 'deleteDiagnosis/'+$(this).data('id');
        }
    })
    $('.edit-diagnosis').click(function(){
        location = 'editDiagnosis/'+$(this).data('id');
    })
})
</script>
@endsection