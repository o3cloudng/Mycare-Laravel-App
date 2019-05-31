
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
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
            </div>
           
            <div class="row">
                <div class="col-md-8">
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
                            <th>Medication</th>
                            <th>Actions</th>
                        </tr>
                        @if($user_diagnosis->count()>0)

                            @foreach($user_diagnosis as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->diagnosis }}</td>
                                    <td>
                                        @foreach($subscriber->medications as $medication)
                                            {!! '<p>'. $medication->name .'</p>' !!}
                                        @endforeach
                                    </td>
                                   
                                    <td><button data-id="{{$subscriber->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-diagnosis" onclick=""></button>
                                        <button data-id="{{$subscriber->id}}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">There are no diagnosis</div></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="col-md-4">
                <h5 class="text-center">Add Diagnosis</h5>
                @if($errors->add_diagnosis->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->add_diagnosis->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('add-diagnosis'))
                    <div class="alert alert-success">{{session('add-diagnosis')}}</div>
                @endif
                <form action="{{ url('addDiagnosis') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Diagnosis</label>
                        <input class="form-control" value="{{old('diagnosis')}}" name="diagnosis" type="text">
                    </div>
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>  
                </div>
                
            </div>
<hr>
            <!-- Medication -->
            <div class="row">
                <div class="col-md-9">
                    <h5 class="text-center">Current Medications</h5>
                    @if(session('delete-diagnosis'))
                        <div class="alert alert-success">{{session('delete-diagnosis')}}</div>
                    @endif
                    @if(session('update-diagnosis'))
                    <div class="alert alert-success">{{session('update-diagnosis')}}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Diagnosis</th>
                            <th>Dosage</th>
                            <th>Frequency</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                        @if ($medications->count() > 0)

                            @foreach( $medications as $medication )
                                <tr>
                                    <td>{{ $medication->name }}</td>
                                    <td>@isset($medication->diagnosis->diagnosis) {{ $medication->diagnosis->diagnosis }} @endisset </td>
                                    <td>{{ $medication->dosage }}</td>
                                    <td>{{ $medication->frequency }}</td>
                                    <td>{{ $medication->duration }}</td>
                                    <td>{{ $medication->start_date }}

                                    <td><button data-id="{{$medication->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-diagnosis" onclick=""></button>
                                        <button data-id="{{$medication->id}}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7"><div class="alert alert-warning">There are no medication</div></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="col-md-3">
                <h5 class="text-center">Add Medication</h5>
                <form action="{{ url('/addMedication') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" value="{{old('name')}}" name="name" type="text">
                    </div>
                    <div class="form-group">
                        <label>Diagnosis</label>
                        <select class="form-control" name="diagnosis_id">
                            @foreach ($user_diagnosis as $diagnosis)
                            <option value="{{ $diagnosis->id }}">{{ $diagnosis->diagnosis }}</option>
                            @endforeach
                        </select>
                            
                    </div>
                    <div class="form-group">
                        <label>Dosage</label>
                        <input class="form-control" value="{{old('dosage')}}" name="dosage" type="text">
                    </div>
                    <div class="form-group">
                        <label for="doctor_id">Doctor</label>
                        <select name="doctor_id" id="" class="form-control">
                            @foreach ($doctors as $doctor)
                              <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Frequency</label>
                        <input class="form-control" value="{{old('frequency')}}" name="frequency"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="number" name="duration" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input class="form-control" value="{{ old('start_date') }}" name="start_date" type="date">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Medication</button>
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