
@extends('layouts.dashboard')

@section('title')
    Body Mass Index
@endsection

@section('bmi-active')
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
            <li class="breadcrumb-item active">Body Mass Index 
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Profile details</h2>
                <div class="text-right">
                    <button type="button" class="btn_1" data-toggle="modal" data-target="#addBodyMass">
                        Add New Body Mass Index
                    </button>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Body Mass Indexes</h5>
                   
                    @if($errors->all())
                    <div class="alert alert-danger">
                        <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                        </ul>
                    </div>
                @endif
                    <table class="table table-striped table-bordered" id="bodyMassIndexTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(isset($body_mass_indexes))
                                @foreach ($body_mass_indexes as $bmi)
                                    <tr class="data-row">
                                        <td class="weight">{{ $bmi->weight }}</td>
                                        <td class="height">{{ $bmi->height }}</td>
                                        <td>{{  number_format($bmi->bmi, 1) }}</td>
                                        <td>{{ $bmi->status }}</td>
                                        <td>{{ $bmi->risk }}</td>
                                        <td>
                                            {{-- <button data-id="{{ $bmi->id }}" class="btn btn-sm btn-primary fa fa-pencil" id="edit-bmi"></a> --}}
                                            <button data-id="{{ $bmi->id }}" class="btn btn-sm btn-danger fa fa-trash del-bmi"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                       
                    </table>
                </div>
            </div>
            <hr>

            <!-- Add New Body Mass Index -->
            <div class="modal fade" id="addBodyMass" tabindex="-1" role="dialog" aria-labelledby="addBodyMassLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addBodyMassLabel">Add Body Mass Index</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    
                        @if($errors->add_bmi->all())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->add_bmi->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('add-bmi'))
                            <div class="alert alert-success">{{session('add-bmi')}}</div>
                        @endif
                        <form action="{{ url('addBmi') }}" method="POST">
                                {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Height</label>
                                            <input class="form-control" value="{{old('height')}}" name="height" type="number" step="any">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Measurement Unit (ft/cm)</label>
                                            <select name="height_unit" class="form-control" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="feet">Feet</option>
                                                <option value="cm">Centimeter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span>
                                    
                                </span>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Weight</label>
                                            <input class="form-control" value="{{old('weight')}}" name="weight" type="number" step="any">
                                        </div>
                                        <div class="col-sm-6">
                                                <label>Measurement Unit (lbs/kg)</label>
                                            <select name="weight_unit" class="form-control" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="lbs">Pounds</option>
                                                <option value="kg">Kilogram</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn_1 gray approve">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- /Body Mass Index -->
                        <!-- /box_general-->


   <!-- Edit Medication Modal -->
   <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit-modal-label">Edit Body Mass Index</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="edit-form" class="form-horizontal" method="POST" action="{{ url('/updateBmi') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                        <input class="form-control" name="id" type="hidden" id="id">
                    <div class="form-group">
                        <label>Height (cm)</label>
                        <input class="form-control" name="height" type="number" id="height">
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input class="form-control" name="weight" type="number" id="weight">
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1 delete" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn_1 approve">Edit Body Mass Index</button>
                </div>
            </form>
            
            
          </div>
        </div>
      </div>
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection