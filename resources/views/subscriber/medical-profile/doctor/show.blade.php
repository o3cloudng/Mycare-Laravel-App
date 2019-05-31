
@extends('layouts.dashboard')

@section('title')
{{ $doctor->name }}
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
            <li class="breadcrumb-item active">Medical Profile 
                 @if(session('update-doctor'))
                    <div class="alert alert-success">{{session('update-doctor')}}</div>
                @endif</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
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
                <div class="text-center">
                    <h3 class="text-center"> {{ $doctor->name }}</h3>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Doctors Information</h5>
                    <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @if(isset($doctor))
                              
                                <tr>
                                    <td><a href="{{ url('/doctor/'.$doctor->id) }}"> {{$doctor->name}}</a></td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->phone}}</td>
                                    <td>{{$doctor->status}}</td>
                                    <td>Action</td>
                                </tr>
                               
                            @else
                                <tr>
                                    <td colspan="3"><div class="alert alert-warning">There are no doctors</div></td>
                                </tr>
                            @endif
                    </table>
                </div>
               
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Doctor's Diagnosis Information</h5>
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
                                    
                                    <td><a href="">{{ $d->doctor->name }}</a></td>
                                    <td>
                                        @foreach($d->medications as $medication)
                                            {!! '<p>'. $medication->name .'</p>' !!}
                                        @endforeach
                                    </td>
                                    <td><button data-id="{{$d->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-diagnosis" onclick=""></button>
                                        <button data-id="{{$d->id}}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button></td>
                                    <td><a role="button" class="btn btn-danger btn-sm" href="{{ url('/diagnosis/'.$d->id.'/medication') }}">Add/Update Medication</a> </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">There are no diagnosis</div></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
         
            <!-- /row-->
          </div>
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