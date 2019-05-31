
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
            <li class="breadcrumb-item active"> {{ $diagnosis->diagnosis }}
                 @if(session('update-doctor'))
                    <div class="alert alert-success">{{session('update-doctor')}}</div>
                @endif</li>
          </ol>
        
            @if(session('error'))
                <div class="alert alert-success">{{session('error')}}</div>
            @endif
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2 class="text-left"><i class="fa fa-user"></i>Profile details</h2>
              <h3 class="text-right">
              
              </h3>
              
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Current Diagnosis</h5>
                    @if(session('delete-diagnosis'))
                        <script type="text/javascript">
                            toastr.error("{{ session('delete-diagnosis') }}");
                        </script>
                        
                    @endif
                    @if(session('update-diagnosis'))
                        <script type="text/javascript">
                            toastr.info("{{ session('update-diagnosis') }}");
                        </script>
                    
                    @endif
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Diagnosis</th>
                            <th>Medical Personnal</th>
                            <th>Medication</th>
                            <th>Actions</th>
                            <th>Add Medications</th>
                        </tr>
                        @if( isset($diagnosis) )
                            <tr>
                                <td><a href="{{ url('/diagnosis/'.$diagnosis->id) }}"> {{ $diagnosis->diagnosis }}</a></td>
                                
                                <td><a href="{{ url('/user/'.$diagnosis->user->id) }}">{{ $diagnosis->user->name }}</a></td>
                                <td>
                                    @foreach($diagnosis->medications as $medication)
                                        {!! '<p>'. $medication->name .'</p>' !!}
                                    @endforeach
                                </td>
                                <td><button data-id="{{ $diagnosis->id }}" class="btn btn-sm btn-primary fa fa-pencil edit-diagnosis" onclick=""></button>
                                    <button data-id="{{ $diagnosis->id }}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button></td>
                                <td><a role="button" class="btn btn-info btn-sm" href="{{ url('/diagnosis/'.$diagnosis->id.'/medication') }}">Medication</a> </td>
                                </tr>
                        @else
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">There are no diagnosis</div></td>
                            </tr>
                        @endif
                    </table>
                </div>
                
            </div>


           
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection