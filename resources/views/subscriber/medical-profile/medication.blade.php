
@extends('layouts.dashboard')

@section('title')
    Medication
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
              <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                    <a href="{{ url('/diagnosis/') }}">All Diagnosis </a>
                </li>
            <li class="breadcrumb-item active">
                <a href="{{ url('/diagnosis/'.$diagnosis_id) }}">{{ $diagnosis->diagnosis }}</a>
            </li>
            
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
            </div>
            <div class="row">


                    <div class="col-md-12">
                        <h5 class="text-center">@isset($diagnosis) {{ 'Diagnosis: '. $diagnosis->diagnosis }} @endisset</h5>
                        @if(session('delete-diagnosis'))
                            <div class="alert alert-success">{{session('delete-diagnosis')}}</div>
                        @endif
                        @if(session('update-diagnosis'))
                            <div class="alert alert-success">{{session('update-diagnosis')}}</div>
                        @endif
                    <p> Medical Personnal: {{ $diagnosis->user->name }}</p>

                    </div>
                    
                </div>
    
            <!-- Medication -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Current Medications</h5>
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
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMedication">
                        Add New Medication
                    </button>
                    </div>
                    <hr>
                    
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Diagnosis</th>
                            <th>Dosage (Days)</th>
                            <th>Frequency(per day)</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                        @if ($medications->count() > 0)

                            @foreach( $medications as $medication )
                                <tr class="data-row">
                                    <td class="name">{{ $medication->name }}</td>
                                    <td class="diagnosis">@isset($medication->diagnosis->diagnosis) {{ $medication->diagnosis->diagnosis }} @endisset </td>
                                    <td class="dosage">{{ $medication->dosage }}</td>
                                    <td class="frequency">{{ $medication->frequency }}</td>
                                    <td class="duration">{{ $medication->duration }}</td>
                                    <td class="start_date">{{ $medication->start_date }}

                                    <td><button data-id="{{$medication->id}}" class="btn btn-sm btn-primary fa fa-pencil" id="edit-medication"></button>
                                        <button data-id="{{$medication->id}}" class="btn btn-sm btn-danger fa fa-trash del-medication"></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning">There are no medication</div>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

             <!-- Add Medication Modal -->
            <div class="modal fade" id="addMedication" tabindex="-1" role="dialog" aria-labelledby="addMedicationLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addMedicationLabel">Add New Medication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{ route('newMedication', $diagnosis_id) }}" method="post">
                                {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" type="text">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dosage</label>
                                            <input class="form-control" value="{{old('dosage')}}" name="dosage" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Duration(Days)</label>
                                            <input type="number" name="duration" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Frequency(per day)</label>
                                            <input class="form-control" value="{{old('frequency')}}" name="frequency"  type="text">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control" value="{{ old('start_date') }}" name="start_date" type="date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add New Medication</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <hr>
            <!-- /Add Medication Modal -->
            

            <!-- Edit Medication Modal -->
            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="edit-modal-label">Edit Medication</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="edit-form" class="form-horizontal" method="POST" action="{{ route('editMedication') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" class="form-control"  name="name" type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dosage</label>
                                        <input class="form-control" id="dosage" name="dosage" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="number" name="duration" id="duration" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Frequency</label>
                                        <input class="form-control" name="frequency"  type="text" id="frequency">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Medication</button>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            <!-- /Edit Medication -->

          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection