
@extends('layouts.dashboard')

@section('title')
    Personal Profile
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
            <li class="breadcrumb-item active">Add listing</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Medical Profile</h2>
            </div>
           
            <div class="row">
            
                <div class="col-md-6 col-md-offset-3">
                        
                    <h5 class="text-center">Update Diagnosis</h5>
                    @if($errors->update_diagnosis->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->update_diagnosis->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('add-diagnosis'))
                        <div class="alert alert-success">{{session('update-diagnosis')}}</div>
                    @endif
                    <form action="/updateDiagnosis" method="post">
                        {{csrf_field()}}
                       
                        <div class="form-group">
                            <label>Diagnosis</label>
                            <input class="form-control" value="{{$diagnosis->diagnosis}}" name="diagnosis" type="text">
                        </div>
                        <div class="form-group">
                            <label>Medication</label>
                            <input class="form-control" value="{{$diagnosis->medication_id}}" name="medication_id" type="text">
                        </div>
                        <input class="" value="{{$diagnosis->id}}" name="id"  type="hidden">

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