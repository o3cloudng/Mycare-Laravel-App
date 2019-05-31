
@extends('layouts.dashboard')

@section('title')
Blood Pressure
@endsection

@section('record-active')
black
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blood Pressure 
                
            </li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Blood Pressure</h2>
                <div class="text-right">
                    <button type="button" class="btn_1" data-toggle="modal" data-target="#addBloodPressure">
                        Add New Blood Pressure 
                    </button>
                </div>
            </div>
          </div>
          <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> Blood Pressure Records</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="bloodPressureTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th>Systolic</th>
                              <th>Diastolic</th>
                              <th>Pulse</th>
                              <th>IMEI</th>
                              <th>IMSI</th>
                              <th>Tel</th>
                              <th>ICCID</th>
                              <th>Created at</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Systolic</th>
                              <th>Diastolic</th>
                              <th>Pulse</th>
                              <th>IMEI</th>
                              <th>IMSI</th>
                              <th>Tel</th>
                              <th>ICCID</th>
                              <th>Created at</th>
                              <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @foreach($bps as $bp)
                            <tr class="bp{{$bp->id}}">
                                <td>{{ $bp->systolic }}</td>
                                <td>{{ $bp->diastolic }}</td>
                                <td>{{ $bp->pulse }}</td>
                                <td>{{ $bp->imei }}</td>
                                <td>{{ $bp->imsi }}</td>
                                <td>{{ $bp->tel }}</td>
                                <td>{{ $bp->iccid }}</td>
                                <td>{{\App\Http\Utility::dateToWords($bp->created_at)}}</td>
                                <td><button data-id="{{$bp->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bp" onclick=""></button>
                                    <button data-id="{{$bp->id}}" class="btn btn-sm btn-danger fa fa-trash del-bp"></button>
                                    <!-- <a href="{{$bp->id}}" class="btn btn-sm btn-ifo fa fa-trash del-bp"></a> -->
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Blood Pressure</div>
                </div>
                 <!-- /tables-->
              </div>
          </div>
          <!-- /box_general-->
          <!-- Blood Pressure -->
          <div class="modal fade" id="addBloodPressure" tabindex="-1" role="dialog" aria-labelledby="addBloodPressureLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addMedicationLabel">Add New Blood Pressure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                   
                    <form action="{{ url('/addBP') }}" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Systolic</label>
                                    <input class="form-control" value="{{old('systolic')}}" name="systolic" type="text">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Diastolic</label>
                                    <input class="form-control"  value="{{old('diastolic')}}" name="diastolic" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pulse</label>
                                    <input class="form-control"  value="{{old('pulse')}}" name="pulse" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tel</label>
                                    <input class="form-control"  value="{{old('tel')}}" name="tel" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>IMEI</label>
                                    <input class="form-control" value="{{old('imei')}}"  name="imei" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>IMSI</label>
                                    <input class="form-control"  value="{{old('imsi')}}" name="imsi" type="text">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label>ICCID</label>
                                    <input class="form-control" value="{{old('iccd')}}" name="iccid" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn_1 gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 gray approve">Add New Blood Pressure</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>
          <!-- /Blood Pressure -->
       
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
