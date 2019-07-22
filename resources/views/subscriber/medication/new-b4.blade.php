
@extends('layouts.dashboard')

@section('title')
    Medications
@endsection
@section('header')
   <i class="fa fa-user"></i> Medications
@endsection
@section('content')
        <div class="container">
            <div class="box_general padding_bottom">
            @if($errors->all())
                <div class="alert alert-danger">
                    <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                    </ul>
                </div>
            @endif
            <div class="header_box version_2">
                <div class="row heading">
                    <div class="col-md-9">
                      <h4 class="">Medication</h4>
                    </div>
                    <div class="col-md-3">
                      <a href="{{ url('medications/new') }}" class="btn_1 approve blue shadow btn btn2 button float-right">
                            Add New Medication
                        </a>
                        {{-- <button href="" class="btn_1 approve" data-toggle="modal" data-target="#addMedication">
                                Add New Medication
                        </button> --}}
                    </div>    
                </div>
            </div>
            <div class="text-left">
                
            </div>
          </div>
            
          
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-table"></i> Medications</h5>
                </div>
                <div class="card-body">
                                <!-- Medication -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="medicationTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Dosage (Days)</th>
                                <th>Frequency(per day)</th>
                                <th>Prescribed By</th>
                                <th>Medical Personal Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Dosage (Days)</th>
                                <th>Frequency(per day)</th>
                                <th>Prescribed By</th>
                                <th>Medical Personal Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
                </div>
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
                        <form action="" method="post">
                                {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" type="text" id="drug_name">
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
                                <button type="button" class="btn_1 delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 approve">Add New Medication</button>
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
                    <form id="edit-form" class="form-horizontal" method="POST" action="{{ url('/medications/edit') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" class="form-control"  name="name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dosage</label>
                                        <input type="text" name="dosage" id="dosage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Frequency (per Day)</label>
                                        <input type="text" name="frequency" id="frequency" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medical Personal</label>
                                        <input type="text" name="medical_personal" id="medical_personal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medical Personal Phone</label>
                                        <input type="text" name="medical_personal_phone" id="medical_personal_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
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
@endsection