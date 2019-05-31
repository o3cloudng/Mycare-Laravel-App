
@extends('layouts.dashboard')

@section('title')
    Medical Profile
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
            <li class="breadcrumb-item active">Diagnosis
                 @if(session('update-doctor'))
                    <div class="alert alert-success">{{session('update-doctor')}}</div>
                @endif</li>
          </ol>
        
          @if($errors->all())
                <div class="alert alert-danger">
                    <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                    </ul>
                </div>
            @endif
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2 class="text-left"><i class="fa fa-user"></i>Profile details</h2>
              <h3 class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDiagnosis">
                    Add New Diagnosis
                </button>
              </h3>
              
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Current Diagnosis</h5>
                    @if(session('delete-diagnosis'))
                        <div class="alert alert-success">{{session('delete-diagnosis')}}</div>
                    @endif
                    @if(session('update-diagnosis'))
                    <div class="alert alert-success">{{session('update-diagnosis')}}</div>
                @endif
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Diagnosis</th>
                            <th>Doctor</th>
                            <th>Medication</th>
                            <th>Actions</th>
                            <th>Add Medications</th>
                        </tr>
                        @if( $diagnosis->count() > 0 )

                            @foreach($diagnosis as $d)
                                <tr>
                                    <td><a href="{{ url('/diagnosis/'.$d->id) }}"> {{ $d->diagnosis }}</a></td>
                                    
                                    <td><a href="">{{ $d->user->name }}</a></td>
                                    <td>
                                        @foreach($d->medications as $medication)
                                            {!! '<p>'. $medication->name .'</p>' !!}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- <button data-id="{{$d->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-diagnosis" onclick=""></button> --}}
                                        <button data-id="{{$d->id}}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button></td>
                                    <td><a role="button" class="btn btn-info btn-sm" href="{{ url('/diagnosis/'.$d->id.'/medication') }}">Medication</a> </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><div class="alert alert-warning">There are no diagnosis</div></td>
                            </tr>
                        @endif
                    </table>
                </div>
                
            </div>


            <!-- Diagnosis Modal -->
            <div class="modal fade" id="addDiagnosis" tabindex="-1" role="dialog" aria-labelledby="addDiagnosisLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addDiagnosisLabel">Add New Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{ url('/diagnosis/new') }}" method="post">
                        {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Diagnosis</label>
                            <input class="form-control" value="{{old('diagnosis')}}" name="diagnosis" type="text">
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="populatedDoctor">
                                <div class="form-group">
                                    <label for="user_id">Medical Personnal</label>
                                    <select name="user_id" class="form-control">
                                        <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name .' | '. ucfirst(($user->getRoleNames())[0]) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <span><a id="addUser" role="button" class="btn btn-primary btn-sm" style="color: #fff;
                            ">Add Medical Personnal</a></span>
                            <br>
                        <div class="medical" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="" name="name" type="text">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="" name="email"  type="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="" name="phone"  type="number">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New Diagnosis</button>
                    </div>
                </form> 
                </div>
                </div>
            </div>

             
           
            
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
